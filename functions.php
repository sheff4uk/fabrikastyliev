<?php
// Общие функции сайта. Подключается до вывода HTML (header.php, feedback.php).
require_once __DIR__ . "/config.php";
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

define("SITE_URL", "https://fabrikaprestol.ru");
define("SITE_PHONE", "+79091317732");
define("SITE_PHONE_TEXT", "+7 909 131-77-32");
define("SITE_EMAIL", "fabrikaprestol@gmail.com");
define("SITE_ADDRESS", "610044, г. Киров, ул. Луганская, 59");
if (!defined("RECAPTCHA_SITEKEY")) {
	define("RECAPTCHA_SITEKEY", "6LdZB-oUAAAAAA8oV4Sht3IvE0F0_VfkZ6arlTjd");
}

// Механизмы раздвижки столов: ключи массива цен в data.php
$mechanisms = array(
	1 => array("Нераздвижной", ""),
	2 => array("Раздвижной «Люкс»", "Неподвижная царга, две половины столешницы скользят на металлических шариковых направляющих. Одна вставка 35, 42 или 48 см в зависимости от формы и размера стола.", "images/люкс.jpg"),
	3 => array("Раздвижной «Сигма»", "Раздвигающаяся царга на металлических направляющих. Вмещает две или три вставки по 40, 50 или 60 см в зависимости от размера стола и фурнитуры.", "images/сигма.jpg"),
);

// Функция отправки сообщения телеграм боту
function message_to_telegram($text) {
	// Для локальной проверки: если в config.php задан TELEGRAM_LOG, заявка пишется в файл, а не в Telegram
	if (defined("TELEGRAM_LOG")) {
		file_put_contents(TELEGRAM_LOG, $text . "\n----\n", FILE_APPEND);
		return;
	}
	$ch = curl_init();
	curl_setopt_array(
		$ch,
		array(
			CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_TIMEOUT => 10,
			CURLOPT_POSTFIELDS => array(
				'chat_id' => TELEGRAM_CHATID,
				'parse_mode' => 'HTML',
				'text' => $text,
			),
		)
	);
	curl_exec($ch);
}

// Красивые адреса: /table, /table/teo, /chair/bingo, /gallery …
function product_url($key, $type) {
	return "/{$type}/{$key}";
}

function list_url($type) {
	return "/{$type}";
}

// Постоянный редирект (301) со старого адреса (product.php?name=…, gallery.php) на новый.
// Только для GET/HEAD: отправку форм не перенаправляем, иначе браузер потеряет данные.
function redirect_to_canonical($path, $drop = array()) {
	$method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : "GET";
	if ($method !== "GET" && $method !== "HEAD") {
		return;
	}
	if (parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) === $path) {
		return;
	}
	$query = array_diff_key($_GET, array_flip($drop));
	header("Location: " . $path . ($query ? "?" . http_build_query($query) : ""), true, 301);
	exit;
}

// Экранирование для вывода в HTML
function h($s) {
	return htmlspecialchars((string)$s, ENT_QUOTES, "UTF-8");
}

// 19000 -> "19 000"
function rub($n) {
	return number_format($n, 0, "", " ");
}

// Адрес для возврата после отправки формы: только пути этого сайта
function safe_local_url($url) {
	$url = str_replace(array("\r", "\n"), "", (string)$url);
	if ($url === "" || $url[0] !== "/" || substr($url, 0, 2) === "//" || strpos($url, "\\") !== false) {
		return "/";
	}
	return $url;
}

// URL файла с кодированием каждого сегмента (в именах есть пробелы и кириллица)
function img_url($path) {
	return "/" . implode("/", array_map("rawurlencode", explode("/", ltrim($path, "/"))));
}

// Уменьшенная копия изображения (создаётся tools/make-thumbs.sh), иначе оригинал
function thumb($path, $w) {
	$t = "images/thumbs/{$w}/" . preg_replace("~^images/~", "", ltrim($path, "/")) . ".webp";
	return img_url(is_file(__DIR__ . "/" . $t) ? $t : $path);
}

// Склонение после числа: plural(21, "модель", "модели", "моделей") -> "модель"
function plural($n, $one, $few, $many) {
	$n = abs($n) % 100;
	if ($n >= 11 && $n <= 14) return $many;
	$n %= 10;
	return $n == 1 ? $one : ($n >= 2 && $n <= 4 ? $few : $many);
}

// +79195241680 -> +7 919 524-16-80
function phone_text($tel) {
	return preg_replace('~^\+7(\d{3})(\d{3})(\d{2})(\d{2})$~', '+7 $1 $2-$3-$4', $tel);
}

// srcset из уменьшенных копий: "url 640w, url 1280w"
function srcset($path, $widths = array(640, 1280)) {
	return implode(", ", array_map(function ($w) use ($path) { return thumb($path, $w) . " {$w}w"; }, $widths));
}

// Версия статического файла по времени изменения, чтобы сбрасывать кэш браузера
function asset($path) {
	$file = __DIR__ . "/" . ltrim($path, "/");
	return "/" . ltrim($path, "/") . (is_file($file) ? "?v=" . filemtime($file) : "");
}

// Поиск модели по ключу: array(тип, данные) или null
function product_find($name) {
	global $products;
	foreach ($products as $t => $list) {
		if (is_string($name) && array_key_exists($name, $list)) {
			return array($t, $list[$name]);
		}
	}
	return null;
}

function product_min_price($v) {
	return is_array($v[4]) ? min($v[4]) : $v[4];
}

function product_max_price($v) {
	return is_array($v[4]) ? max($v[4]) : $v[4];
}

// Фото модели из images/prodlist/<ключ>/, главное фото первым
function product_photos($key) {
	$dir = "images/prodlist/{$key}/";
	if (!is_dir(__DIR__ . "/" . $dir)) {
		return array();
	}
	$files = array_values(preg_grep('~\.(jpeg|jpg|png)$~i', scandir(__DIR__ . "/" . $dir)));
	usort($files, function ($a, $b) use ($key) {
		return ($b === "{$key}.jpg") - ($a === "{$key}.jpg") ?: strnatcmp($a, $b);
	});
	return array_map(function ($f) use ($dir) { return $dir . $f; }, $files);
}

function product_main_photo($key) {
	$main = "images/prodlist/{$key}/{$key}.jpg";
	return is_file(__DIR__ . "/" . $main) ? $main : "images/prodlist/{$key}.jpg";
}

// Метки для фильтров каталога
function product_tags($type, $v) {
	$tags = array($type);
	if (!empty($v[5])) $tags[] = "new";
	if ($type == "table") {
		$tags[] = (isset($v[4][2]) || isset($v[4][3])) ? "razdv" : "nerazdv";
		if (strpos($v[1], "Ø") !== false) $tags[] = "round";
		if (mb_stripos($v[0], "журнальный") !== false) $tags[] = "coffee";
	}
	else {
		if (mb_stripos($v[0], "барный") !== false) $tags[] = "bar";
		if (mb_stripos($v[0], "поворотный") !== false) $tags[] = "swivel";
	}
	return $tags;
}

function mb_ucfirst($s) {
	return mb_strtoupper(mb_substr($s, 0, 1, "UTF-8"), "UTF-8") . mb_substr($s, 1, null, "UTF-8");
}

// "белый + золотая патина" -> "цвета «белый» с золотой патиной"; "венге" -> "цвета «венге»"
function product_color_phrase($color) {
	if ($color === "") return "";
	if (mb_strpos($color, "+") !== false) {
		list($base, $finish) = array_map("trim", explode("+", $color, 2));
		$finishMap = array("золотая патина" => "золотой патиной", "серебрянная патина" => "серебряной патиной");
		$finishPhrase = isset($finishMap[$finish]) ? $finishMap[$finish] : mb_strtolower($finish, "UTF-8");
		return "цвета «{$base}» с {$finishPhrase}";
	}
	return "цвета «{$color}»";
}

// Описание конструкции по составу материалов — свой вариант фразы на каждую комбинацию, встречающуюся в каталоге
function product_material_phrase($materials, $type) {
	$m = mb_strtolower($materials, "UTF-8");
	$hasMassiv = mb_strpos($m, "массив") !== false;
	$hasShponMdf = mb_strpos($m, "шпон") !== false && mb_strpos($m, "мдф") !== false;
	$hasAbs = mb_strpos($m, "abs-пластик") !== false;
	$hasMetalNogi = mb_strpos($m, "металлические ноги") !== false;
	$hasGnutokleen = mb_strpos($m, "гнутоклееные") !== false;
	$hasMetal = mb_strpos($m, "металл") !== false;

	if ($type == "table") {
		if (mb_strpos($m, "кромка-радиус") !== false) {
			return "столешница с мягкой кромкой-радиусом, царга оклеена натуральным шпоном — без острых углов и с чётким рисунком дерева";
		}
		if (mb_strpos($m, "мебельным пластиком") !== false) {
			return "ноги металлические, царговый пояс — МДФ, облицованный мебельным пластиком: простой уход и строгий минималистичный силуэт";
		}
		if ($hasMassiv && $hasShponMdf) {
			return "ноги — массив дерева, царговый пояс оклеен натуральным шпоном по МДФ: выглядит как цельный массив, но легче и доступнее по цене";
		}
		if ($hasAbs && $hasShponMdf) {
			return "ноги отлиты из ударопрочного ABS-пластика с резным декором, царговый пояс — шпонированный МДФ: классический силуэт без цены массива";
		}
		if ($hasMetalNogi) {
			return "тонкие металлические ноги с порошковой покраской — устойчивы к влажной уборке, подходят современной кухне";
		}
		if (trim($m) === "массив") {
			return "вся конструкция — массив дерева: традиционная сборка, которую можно повторно шлифовать и реставрировать";
		}
		if (trim($m) === "мдф") {
			return "каркас и ноги — МДФ: стабильный материал, не боится перепадов влажности на кухне";
		}
		if (trim($m) === "шпон+мдф") {
			return "каркас из МДФ, оклеенного натуральным шпоном — сохраняет рисунок дерева при стабильной геометрии столешницы";
		}
		return "ноги и каркас — " . $m;
	}
	else {
		if ($hasMassiv && $hasGnutokleen) {
			return "каркас — массив, спинка из гнутоклееного шпона: классическая технология, которая держит форму гнутых деталей десятилетиями";
		}
		if ($hasGnutokleen && $hasMetal) {
			return "гнутоклееные детали из шпона на металлическом основании — лёгкий профиль и плавный поворот сиденья";
		}
		if ($hasGnutokleen && !$hasMassiv) {
			return "гнутоклееные детали из шпона — точёный профиль спинки при меньшем весе, чем у цельного массива";
		}
		if (trim($m) === "массив") {
			return "каркас, сиденье и спинка — массив дерева: прочная традиционная сборка";
		}
		if ($hasMassiv && $hasAbs) {
			return "каркас — массив, передние ноги — ударопрочный ABS-пластик с лакированной отделкой: нарядный вид без цены цельного массива";
		}
		if ($hasAbs) {
			return "корпус — ударопрочный ABS-пластик с лакированной отделкой: лёгкий и простой в уходе";
		}
		return $m;
	}
}

// Имя механизма без кавычек: 'Раздвижной «Люкс»' -> 'Люкс'
function mechanism_label($fullName) {
	return preg_match('~«([^»]+)»~u', $fullName, $m) ? $m[1] : $fullName;
}

function product_mechanism_phrase($product, $mechanisms) {
	$prices = $product[4];
	$has2 = isset($prices[2]);
	$has3 = isset($prices[3]);
	if (!$has2 && !$has3) {
		return "Столешница нераздвижная — цельная и жёсткая, без люфта по шву.";
	}
	$labels = array();
	if ($has2) $labels[] = mechanism_label($mechanisms[2][0]);
	if ($has3) $labels[] = mechanism_label($mechanisms[3][0]);
	$list = implode("» или «", $labels);
	return "Раздвигается по механизму «{$list}»: столешница увеличивается, когда за стол садится больше гостей.";
}

// Разные формулировки призыва к действию: детерминированный выбор по ключу модели, чтобы текст не менялся между запросами
function product_pick_phrase($bank, $key) {
	return $bank[crc32($key) % count($bank)];
}

// Расширенное SEO-описание модели для карточки товара (несколько предложений по реальным характеристикам)
function product_description($key, $type, $product, $mechanisms) {
	$name = $product[0];
	$size = $product[1];
	$color = $product[2];
	$materials = $product[3];
	$colorPhrase = product_color_phrase($color);

	if ($type == "table") {
		$isCoffee = mb_stripos($name, "журнальный") !== false;
		$isConsole = mb_stripos($name, "консоль") !== false;
		$kindWord = $isCoffee ? "журнальный столик" : ($isConsole ? "консольный стол" : (mb_strpos($size, "Ø") !== false ? "круглый кухонный стол" : "прямоугольный кухонный стол"));

		$ctaBank = array(
			"Изготовим «{$name}» в нужном размере и декоре — параметры уточняются при заказе.",
			"Этот {$kindWord} делаем под заказ: нужный размер и декор столешницы подбираются индивидуально.",
			"Размер и декор «{$name}» можно изменить под ваш интерьер — варианты смотрите в фирменных салонах.",
		);

		$sentences = array(
			"«{$name}» — {$kindWord}" . ($colorPhrase ? ", {$colorPhrase}" : "") . ", от мебельной фабрики «Престол».",
			mb_ucfirst(product_material_phrase($materials, "table")) . ".",
			$isCoffee ? "" : product_mechanism_phrase($product, $mechanisms),
			product_pick_phrase($ctaBank, $key),
		);
	}
	else {
		$kindWord = mb_stripos($name, "банкетка") !== false ? "банкетка"
			: (mb_stripos($name, "пуфик") !== false ? "пуфик"
			: (mb_stripos($name, "растущий") !== false ? "растущий стул для ребёнка"
			: (mb_stripos($name, "кресло") !== false ? "кресло"
			: (mb_stripos($name, "барный") !== false ? "барный стул" : "стул"))));

		$ctaBank = array(
			"Обивку и цвет каркаса «{$name}» подбираем под заказ — ткани и образцы покраски смотрите в фирменных салонах.",
			"Ткань и цвет «{$name}» — на выбор: сотни образцов обивки доступны в фирменных салонах фабрики.",
			"Для «{$name}» можно выбрать любую ткань обивки из нашего каталога образцов в салонах.",
		);

		$feature = "";
		if ($kindWord === "барный стул") $feature = "Высота сидения увеличена под барную стойку или кухонный остров.";
		elseif ($kindWord === "растущий стул для ребёнка") $feature = "Высота сиденья регулируется по росту ребёнка — стул растёт вместе с ним.";
		elseif (mb_stripos($name, "поворотн") !== false || mb_strpos($name, "360") !== false) $feature = "Сиденье поворотное — удобно разворачиваться у стола без лишних движений.";

		$sentences = array(
			"«{$name}» — {$kindWord}" . ($colorPhrase ? ", {$colorPhrase}" : "") . ", от мебельной фабрики «Престол».",
			mb_ucfirst(product_material_phrase($materials, "chair")) . ".",
			$feature,
			product_pick_phrase($ctaBank, $key),
		);
	}

	return trim(implode(" ", array_filter($sentences)));
}

// Карточка модели в каталоге
function product_card($key, $v, $type) {
	$price = rub(product_min_price($v));
	$pref = is_array($v[4]) ? "от " : "";
	$size = preg_replace("~<br>.*$~", "", $v[1]);
	$img = product_main_photo($key);
	?>
	<article class="card" data-tags="<?=h(implode(" ", product_tags($type, $v)))?>" data-price="<?=product_min_price($v)?>">
		<a class="card__link" href="<?=h(product_url($key, $type))?>">
			<div class="card__img">
				<img src="<?=thumb($img, 640)?>" alt="<?=h(($type == "table" ? "Стол " : "") . $v[0])?>" width="640" height="640" loading="lazy" decoding="async">
				<?php if (!empty($v[5])) { ?><span class="badge">Новинка</span><?php } ?>
			</div>
			<div class="card__body">
				<h3 class="card__title"><?=h($v[0])?></h3>
				<p class="card__meta"><?=strip_tags($size)?></p>
				<p class="card__price"><?=$pref?><b><?=$price?></b>&nbsp;₽</p>
			</div>
		</a>
	</article>
	<?php
}

// Форма заявки. Обрабатывается в feedback.php
function lead_form($model = "", $title = "Рассчитаем стоимость", $lead = "Оставьте телефон — специалист фабрики перезвонит, поможет подобрать размер, декор и ткань.", $location = null) {
	$location = safe_local_url($location === null ? $_SERVER["REQUEST_URI"] : $location);
	?>
	<form class="lead-form" method="post" action="/feedback?location=<?=h(rawurlencode($location))?>" onsubmit="ym(50341759, 'reachGoal', 'FEEDBACK'); return true;">
		<?php if ($title !== null) { ?>
		<div class="lead-form__head">
			<h2 class="lead-form__title"><?=$title?></h2>
			<p class="lead-form__lead"><?=h($lead)?></p>
		</div>
		<?php } ?>
		<div class="lead-form__grid">
			<label class="field">
				<span>Имя</span>
				<input type="text" name="client" required autocomplete="name">
			</label>
			<label class="field">
				<span>Телефон</span>
				<input type="tel" name="mtel" required autocomplete="tel" inputmode="tel" placeholder="+7 (___) ___ __ __" data-phone>
			</label>
			<label class="field field--wide">
				<span>Город</span>
				<select name="city" required>
					<option value="">Выберите город</option>
					<option value="Киров">Киров</option>
					<option value="Екатеринбург">Екатеринбург</option>
					<option value="Нижний Новгород">Нижний Новгород</option>
					<option value="Другой">Другой (напишите в сообщении)</option>
				</select>
			</label>
			<label class="field field--wide">
				<span>Сообщение</span>
				<textarea name="text" rows="3" placeholder="Размер стола, декор, ткань, количество стульев…"><?=($model !== "" ? h("Интересует модель «{$model}»") : "")?></textarea>
			</label>
		</div>
		<input type="hidden" name="model" value="<?=h($model)?>">
		<div class="g-recaptcha" data-sitekey="<?=RECAPTCHA_SITEKEY?>"></div>
		<div class="lead-form__foot">
			<button class="btn btn--accent" type="submit" name="submit" value="1">Жду звонка</button>
			<p class="lead-form__note">Нажимая кнопку, вы соглашаетесь на обработку персональных данных для связи с вами.</p>
		</div>
	</form>
	<?php
}

// Тёмный блок заявки с формой (якорь #zayavka)
function lead_section($model = "", $heading = "Рассчитаем стоимость <em>вашего</em> стола", $text = "Цена зависит от размера, формы столешницы и механизма раздвижки. Оставьте телефон — специалист фабрики перезвонит и поможет с выбором.") {
	?>
	<section class="section" id="zayavka">
		<div class="container">
			<div class="lead">
				<div class="lead__text">
					<h2><?=$heading?></h2>
					<p><?=h($text)?></p>
					<div class="lead__contacts">
						<a href="tel:<?=SITE_PHONE?>"><?=icon("phone")?><?=SITE_PHONE_TEXT?></a>
						<!-- <a href="https://t.me/+eNYAT_b6x2pkYjE6" target="_blank" rel="nofollow noopener"><?=icon("telegram")?>Telegram</a> -->
						<a href="/price.pdf" target="_blank"><?=icon("file")?>Прайс-лист с 1 августа 2026 (PDF)</a>
					</div>
				</div>
				<?php lead_form($model, null); ?>
			</div>
		</div>
	</section>
	<?php
}

// Страница 404 для несуществующих моделей и разделов
function not_found() {
	http_response_code(404);
	include __DIR__ . "/404.php";
	exit;
}

// Иконки (вместо Font Awesome)
function icon($name) {
	$paths = array(
		"phone" => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/>',
		"arrow" => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		"arrow-left" => '<path d="M19 12H5M11 6l-6 6 6 6"/>',
		"pin" => '<path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/>',
		"mail" => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
		"file" => '<path d="M14 3H6a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8z"/><path d="M14 3v5h5M9 13h6M9 17h6"/>',
		"menu" => '<path d="M4 7h16M4 12h16M4 17h16"/>',
		"close" => '<path d="M6 6l12 12M18 6 6 18"/>',
		"ruler" => '<path d="M3 17 17 3l4 4L7 21z"/><path d="m7 13 2 2M10 10l2 2M13 7l2 2"/>',
		"palette" => '<path d="M12 3a9 9 0 1 0 0 18c1.1 0 2-.9 2-2 0-.5-.2-1-.5-1.3-.3-.4-.5-.8-.5-1.3 0-1.1.9-2 2-2h2.3A4.7 4.7 0 0 0 22 9.7C22 5.9 17.5 3 12 3z"/><circle cx="7.5" cy="11.5" r="1"/><circle cx="10" cy="7.5" r="1"/><circle cx="15" cy="7.5" r="1"/>',
		"factory" => '<path d="M3 21V10l6 4V10l6 4V6l6 3v12z"/><path d="M7 18h2M12 18h2M17 18h2"/>',
		"truck" => '<path d="M3 6h11v10H3zM14 10h4l3 3v3h-7"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/>',
		"shield" => '<path d="M12 3 5 6v6c0 4.4 3 7.6 7 9 4-1.4 7-4.6 7-9V6z"/><path d="m9 12 2 2 4-4"/>',
	);
	$brands = array(
		"vk" => '<path fill="currentColor" stroke="none" d="M13.2 18.5c-6.3 0-9.9-4.3-10-11.5h3.2c.1 5.3 2.4 7.5 4.2 8V7h3v4.5c1.8-.2 3.7-2.3 4.3-4.5h3c-.5 2.8-2.5 4.9-4 5.7 1.5.7 3.8 2.5 4.7 5.8h-3.3c-.7-2.2-2.5-3.9-4.7-4.2v4.2z"/>',
		"telegram" => '<path fill="currentColor" stroke="none" d="M20.7 4.3 2.9 11.2c-1.2.5-1.2 1.2-.2 1.5l4.6 1.4 1.8 5.4c.2.6.4.8.9.8.4 0 .6-.2.9-.4l2.2-2.1 4.6 3.4c.8.5 1.4.2 1.6-.8l3-14.2c.3-1.2-.5-1.8-1.6-1.3zM8.6 13.7l9.3-5.9c.5-.3.9-.1.5.2l-7.9 7.2-.3 3.3z"/>',
	);
	$body = isset($paths[$name]) ? $paths[$name] : (isset($brands[$name]) ? $brands[$name] : "");
	return '<svg class="icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $body . '</svg>';
}

// Хлебные крошки: массив [текст, ссылка], последний элемент без ссылки
function breadcrumbs($items) {
	global $path;
	$ld = array();
	echo '<nav class="crumbs" aria-label="Навигация"><ol>';
	foreach ($items as $i => $it) {
		$last = $i == count($items) - 1;
		echo "<li>" . ($last ? "<span aria-current=\"page\">" . h($it[0]) . "</span>" : "<a href=\"" . h($it[1]) . "\">" . h($it[0]) . "</a>") . "</li>";
		$ld[] = array("@type" => "ListItem", "position" => $i + 1, "name" => $it[0], "item" => SITE_URL . (isset($it[1]) ? $it[1] : (isset($path) ? $path : $_SERVER["REQUEST_URI"])));
	}
	echo "</ol></nav>";
	json_ld(array("@context" => "https://schema.org", "@type" => "BreadcrumbList", "itemListElement" => $ld));
}

function json_ld($data) {
	echo '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) . "</script>\n";
}
