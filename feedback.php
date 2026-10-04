<?php
require_once "functions.php";

$location = safe_local_url(isset($_GET["location"]) ? $_GET["location"] : "/");

if (isset($_POST["submit"])) {
	$f = array();
	foreach (array("client", "mtel", "city", "text", "model") as $k) {
		$f[$k] = isset($_POST[$k]) && is_string($_POST[$k]) ? trim($_POST[$k]) : "";
	}

	$data = [
		'secret' => RECAPTCHA_SECRET,
		'response' => isset($_POST["g-recaptcha-response"]) ? $_POST["g-recaptcha-response"] : ""
	];
	$options = [
		'http' => [
			'method' => 'POST',
			'header' => 'Content-Type: application/x-www-form-urlencoded',
			'content' => http_build_query($data)
		]
	];
	$context  = stream_context_create($options);
	$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
	$captcha_success = json_decode($verify);

	$error = "";
	if (!$captcha_success || $captcha_success->success == false) {
		$error = "Проверка «Я не робот» не пройдена. Отметьте галочку и отправьте заявку ещё раз.";
	}
	elseif ($f["client"] === "" || $f["mtel"] === "") {
		$error = "Укажите имя и телефон, чтобы мы могли с вами связаться.";
	}
	if ($error) {
		$_SESSION["form_error"] = $error;
		$_SESSION["form_data"] = $f;
		header("Location: /feedback?location=" . rawurlencode($location));
		exit;
	}

	// Проверка на спам
	if (stripos($f["text"], 'http') === false && stripos($f["text"], '@') === false) {
		// Отправляем сообщение при помощи телеграм бота
		$message = "<b>Заявка с сайта:</b>\n" . h($f["client"]) . "\n" . h($f["mtel"]) . "\n" . h($f["city"]) . "\n" . h($f["text"]);
		if ($f["model"] !== "" && mb_stripos($f["text"], $f["model"]) === false) {
			$message .= "\nМодель: " . h($f["model"]);
		}
		$message .= "\nСтраница: " . h(SITE_URL . $location);
		message_to_telegram($message);
		$_SESSION["alert"] = "Благодарим за обращение! С вами обязательно свяжутся.";
	}

	header("Location: " . $location);
	exit;
}

$title = "Заказать звонок";
$description = "Оставьте телефон — специалист мебельной фабрики «Престол» перезвонит и рассчитает стоимость.";
$path = "/feedback";
$error = isset($_SESSION["form_error"]) ? $_SESSION["form_error"] : "";
$saved = isset($_SESSION["form_data"]) ? $_SESSION["form_data"] : array();
unset($_SESSION["form_error"], $_SESSION["form_data"]);
$model = isset($saved["model"]) ? $saved["model"] : (isset($_GET["model"]) && is_string($_GET["model"]) ? mb_substr($_GET["model"], 0, 100) : "");
$has_lead = true;
include "header.php";
?>

<section class="section" id="zayavka">
	<div class="container">
		<div class="lead">
			<div class="lead__text">
				<h1>Оставьте номер — <em>мы перезвоним</em></h1>
				<p>Специалист фабрики ответит на вопросы, поможет подобрать модель, размер, декор и ткань и рассчитает стоимость.</p>
				<div class="lead__contacts">
					<a href="tel:<?=SITE_PHONE?>"><?=icon("phone")?><?=SITE_PHONE_TEXT?></a>
					<!-- <a href="https://t.me/+eNYAT_b6x2pkYjE6" target="_blank" rel="nofollow noopener"><?=icon("telegram")?>Telegram</a> -->
					<a href="/price.pdf" target="_blank"><?=icon("file")?>Прайс-лист с 1 августа 2026 (PDF)</a>
				</div>
			</div>
			<div>
				<?php if ($error) { ?><p class="form-error" role="alert"><?=h($error)?></p><?php } ?>
				<?php lead_form($model, null, "", $location); ?>
			</div>
		</div>
	</div>
</section>

<?php if ($saved) { ?>
<script>
	// Возвращаем введённые данные после неудачной проверки
	(function (d) {
		var form = document.querySelector(".lead-form");
		for (var k in d) {
			var el = form.elements[k];
			if (el) el.value = d[k];
		}
	})(<?=json_encode($saved, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)?>);
</script>
<?php } ?>

<?php
	include "footer.php";
?>
