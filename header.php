<?
include "config.php";
session_start();

// Функция отправки сообщения телеграм боту
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
				'parse_mode' => HTML,
				'text' => $text,
			),
			CURLOPT_PROXY => PROXY_SERVER,
			CURLOPT_PROXYUSERPWD => PROXY_USER,
			CURLOPT_PROXYTYPE => CURLPROXY_SOCKS5,
			CURLOPT_PROXYAUTH => CURLAUTH_BASIC,
		)
	);
	curl_exec($ch);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?=$title?></title>

	<meta name="theme-color" content="#653033"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="yandex-verification" content="b4130eb718677801" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" charset="utf-8"/>
	<meta name="description" content="<?=$description?>">
	<meta name="keywords" content="мебель, журнальные столы, столы, стулья, стул, стол, мебель для дома, престол, фабрикастульев, журнальный стол, кресла, журнальный столик, кухонный стол, стол на кухню">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="/css/style.css?v=29">
	<link rel="stylesheet" type='text/css' href="js/ui/jquery-ui.css">
	<link rel='stylesheet' type='text/css' href='css/loading.css'>
	<link type="text/css" rel="stylesheet" href="/css/jquery.bxslider.css?v=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--	<script src="/js/jquery-1.11.3.min.js"></script>-->
	<script src="js/ui/jquery-ui.js"></script>
	<script src="/js/jquery.bxslider.js?v=1"></script>
	<script src="/js/script.js?v=4"></script>
	<script src="/js/easing.js"></script>
	<script src="/js/jquery.ui.totop.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
	<script>
		$(document).ready(function(){
			$('#main').fadeIn('slow');
			$('footer').fadeIn('slow');
			$('#loading').hide();

			$("#mtel").mask("+7 (999) 999 99 99");
		});
	</script>

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
		(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		ym(50341759, "init", {
			clickmap:true,
			trackLinks:true,
			accurateTrackBounce:true,
			webvisor:true
		});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/50341759" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->

</head>

<body>
	<!-- Open API VK -->
	<div id="vk_api_transport"></div>
	<script type="text/javascript">
		window.vkAsyncInit = function() {
			VK.init({apiId: 7216520});
			VK.Widgets.CommunityMessages("vk_community_messages", 171248798, {disableExpandChatSound: "1",tooltipButtonText: "Есть вопрос?"});
			VK.Retargeting.Init('VK-RTRG-500735-818ez');
		};

		setTimeout(function() {
			var el = document.createElement("script");
			el.type = "text/javascript";
			el.src = "https://vk.com/js/api/openapi.js?162";
			el.async = true;
			document.getElementById("vk_api_transport").appendChild(el);
		}, 0);
	</script>
	<!-- /Open API VK -->

	<div id="loading" class='uil-default-css' style='transform:scale(1); position: absolute; left: calc(50% - 100px); top: calc(50% - 100px);'><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(0deg) translate(0,-60px);transform:rotate(0deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(30deg) translate(0,-60px);transform:rotate(30deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(60deg) translate(0,-60px);transform:rotate(60deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(90deg) translate(0,-60px);transform:rotate(90deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(120deg) translate(0,-60px);transform:rotate(120deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(150deg) translate(0,-60px);transform:rotate(150deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(180deg) translate(0,-60px);transform:rotate(180deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(210deg) translate(0,-60px);transform:rotate(210deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(240deg) translate(0,-60px);transform:rotate(240deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(270deg) translate(0,-60px);transform:rotate(270deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(300deg) translate(0,-60px);transform:rotate(300deg) translate(0,-60px);border-radius:10px;position:absolute;'></div><div style='top:80px;left:93px;width:14px;height:40px;background:#653033;-webkit-transform:rotate(330deg) translate(0,-60px);transform:rotate(330deg) translate(0,-60px);border-radius:10px;position:absolute;'></div></div>

	<header>
		<nav id="nav">
			<div class="menu__icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="page">
				<ul>
					<li><a href="address.php">Где купить</a></li>
					<li><a href="contact.php">Контакты</a></li>
					<li><a href="about.php">О нас</a></li>
					<li><a href="certificates.php">Сертификаты</a></li>
				</ul>
				<?
					if( !strpos($_SERVER["REQUEST_URI"], 'feedback.php') ) {
						echo "<a href='/feedback.php?location={$_SERVER['REQUEST_URI']}' style='color: #fff; background: #fd8134;'><i class='fas fa-phone'></i> Заказать звонок</a>";
					}
					//if( !strpos($_SERVER["REQUEST_URI"], 'order_status.php') ) {
						echo "<a href='/order_status.php' style='color: #fff; background: #C00000;'><i class='fas fa-info'></i> Статус заказа</a>";
					//}
				?>
<!--				<a href="tel:89091317732" class="footer_phone">8 (909) 131-77-32</a>-->
			</div>
		</nav>
		<div id="sub_nav">
			<ul>
					<li><a href="prodlist.php?type=table">Столы</a></li>
					<li></li>
					<li><a href="prodlist.php?type=chair">Стулья</a></li>
			</ul>
		</div>
		<p class="logo">
			<a href="/" title="На главную"><img src="images/logo.svg" alt="Мебельная фабрика ПРЕСТОЛ"></a>
		</p>
	</header>
