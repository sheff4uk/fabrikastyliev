<?
$title = "Заказать звонок";
$description = "Заказать звонок";
include "header.php";

if( isset($_POST["submit"]) ) {
	$message = "{$_POST["client"]}\n{$_POST["mtel"]}\n{$_POST["city"]}\n{$_POST["text"]}";
	message_to_telegram($message);
	exit ('<meta http-equiv="refresh" content="0; url=/">');
}

function message_to_telegram($text) {
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
				'text' => $text,
			),
			CURLOPT_PROXY => '185.211.246.65:34513',
			CURLOPT_PROXYUSERPWD => 'sheff4ukF1:T3v0CcL',
			CURLOPT_PROXYTYPE => CURLPROXY_SOCKS5,
			CURLOPT_PROXYAUTH => CURLAUTH_BASIC,
		)
	);
	curl_exec($ch);
}
?>
<style>
	.decor * {box-sizing: border-box;}
	body {background: #f69a73;}
	.decor {
		position: relative;
		max-width: 400px;
		margin: 50px auto 0;
		background: white;
		border-radius: 30px;
	}
	.form-left-decoration,
	.form-right-decoration {
		content: "";
		position: absolute;
		width: 50px;
		height: 20px;
		background: #f69a73;
		border-radius: 20px;
	}
	.form-left-decoration {
		bottom: 60px;
		left: -30px;
	}
	.form-right-decoration {
		top: 60px;
		right: -30px;
	}
	.form-left-decoration:before,
	.form-left-decoration:after,
	.form-right-decoration:before,
	.form-right-decoration:after {
		content: "";
		position: absolute;
		width: 50px;
		height: 20px;
		border-radius: 30px;
		background: white;
	}
	.form-left-decoration:before {top: -20px;}
	.form-left-decoration:after {
		top: 20px;
		left: 10px;
	}
	.form-right-decoration:before {
		top: -20px;
		right: 0;
	}
	.form-right-decoration:after {
		top: 20px;
		right: 10px;
	}
	.circle {
		position: absolute;
		bottom: 80px;
		left: -55px;
		width: 20px;
		height: 20px;
		border-radius: 50%;
		background: white;
	}
	.form-inner {padding: 50px;}
	.form-inner input,
	.form-inner textarea,
	.form-inner select {
		display: block;
		width: 100%;
		padding: 0 20px;
		margin-bottom: 10px;
		background: #E9EFF6;
		line-height: 40px;
		border-width: 0;
		border-radius: 20px;
		font-family: 'Roboto', sans-serif;
		outline-style:none;
		font-size: 1.1em;
	}
	.form-inner input[type="submit"] {
		margin-top: 30px;
		background: #f69a73;
		border-bottom: 4px solid #d87d56;
		color: white;
		font-size: 16px;
		cursor: pointer;
		transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-webkit-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
	}
	.form-inner input[type="submit"]:hover {opacity: .8;}
	.form-inner textarea {resize: none;}
	.form-inner h3 {
		margin-top: 0;
		font-family: 'Roboto', sans-serif;
		font-weight: 500;
		font-size: 24px;
		color: #707981;
	}
	.form-inner select {
		height: 40px;
	}
</style>

<section id="main">
	<section class="page">
		<form class="decor" method="post" autocomplete="off">
			<div class="form-left-decoration"></div>
			<div class="form-right-decoration"></div>
			<div class="circle"></div>
			<div class="form-inner">
				<h3>Оставьте номер<br>и мы Вам перезвоним</h3>
				<input type="text" name="client" autocomplete="off" required placeholder="Ваше имя">
				<input type="text" id="mtel" name="mtel" autocomplete="off" required placeholder="Мобильный телефон">
				<select name="city" required>
					<option value="">--выберите город--</option>
					<option value="Киров">Киров</option>
					<option value="Екатеринбург">Екатеринбург</option>
					<option value="Нижний Новгород">Нижний Новгород</option>
					<option value="Сыктывкар">Сыктывкар</option>
					<option value="Другой">другой (напишите в сообщении)</option>
				</select>
				<textarea name="text" rows="3" placeholder="Сообщение..."></textarea>
				<input type="submit" value="Жду звонка!" name="submit">
			</div>
		</form>
	</section>
</section>

<?
	include "footer.php";
?>
