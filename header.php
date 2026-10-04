<?php
require_once __DIR__ . "/functions.php";

// $path — новый адрес страницы (задаётся на странице). Со старого адреса — редирект 301
if (isset($path)) {
	redirect_to_canonical($path, isset($path_drop) ? $path_drop : array());
}
if (!isset($canonical)) {
	$canonical = SITE_URL . (isset($path) ? $path : strtok($_SERVER["REQUEST_URI"], "?"));
}
if (!isset($og_image)) {
	$og_image = "/images/interiors/teo-zero.jpg";
}
// Ссылка «Оставить заявку»: на страницах с формой — к форме, иначе на страницу заявки
$lead_href = !empty($has_lead) ? "#zayavka" : "/feedback?location=" . rawurlencode(safe_local_url($_SERVER["REQUEST_URI"]));

$nav = array(
	array("/table", "Столы"),
	array("/chair", "Стулья и кресла"),
	array("/gallery", "Галерея"),
	array("/address", "Где купить"),
	array("/about", "О фабрике"),
	array("/contact", "Контакты"),
);
// Активный пункт меню: раздел каталога на странице модели, иначе адрес страницы
$current = isset($nav_current) ? $nav_current : (isset($path) ? $path : "");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=h($title)?></title>
	<meta name="description" content="<?=h($description)?>">
	<link rel="canonical" href="<?=h($canonical)?>">

	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Мебельная фабрика «Престол»">
	<meta property="og:locale" content="ru_RU">
	<meta property="og:title" content="<?=h($title)?>">
	<meta property="og:description" content="<?=h($description)?>">
	<meta property="og:url" content="<?=h($canonical)?>">
	<meta property="og:image" content="<?=h(SITE_URL . $og_image)?>">

	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" href="/icon.svg" type="image/svg+xml">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="theme-color" content="#653033">
	<meta name="yandex-verification" content="b4130eb718677801">

	<link rel="preload" href="/fonts/playfair-display-normal-cyrillic.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="/fonts/manrope-normal-cyrillic.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="stylesheet" href="<?=asset("css/site.css")?>">
	<script src="<?=asset("js/site.js")?>" defer></script>

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
	<header class="site-header">
		<div class="container site-header__inner">
			<a class="logo" href="/" title="На главную">
				<img src="/images/logo.svg" alt="Мебельная фабрика «Престол»" width="65" height="54">
			</a>
			<nav class="nav" id="nav" aria-label="Основное меню">
				<ul>
				<?php foreach ($nav as $item) { ?>
					<li><a href="<?=$item[0]?>"<?=($item[0] === $current ? ' aria-current="page"' : "")?>><?=$item[1]?></a></li>
				<?php } ?>
				</ul>
			</nav>
			<div class="header-actions">
				<a class="header-phone" href="tel:<?=SITE_PHONE?>"><?=icon("phone")?><span><?=SITE_PHONE_TEXT?></span></a>
				<a class="btn btn--accent btn--sm" href="<?=h($lead_href)?>">Оставить заявку</a>
				<button class="burger" type="button" aria-label="Меню" aria-controls="nav" aria-expanded="false">
					<span class="icon-menu"><?=icon("menu")?></span>
					<span class="icon-close"><?=icon("close")?></span>
				</button>
			</div>
		</div>
	</header>

	<?php if (!empty($_SESSION["alert"])) { ?>
	<div class="toast" role="status">
		<span><?=h($_SESSION["alert"])?></span>
		<button type="button" aria-label="Закрыть"><?=icon("close")?></button>
	</div>
	<script>ym(50341759, 'reachGoal', 'FEEDBACK');</script>
	<?php unset($_SESSION["alert"]); } ?>

	<main id="main">
