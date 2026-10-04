<?php
	include "data.php";
	include "catalog.php";
	$title = "О нас — мебельная фабрика ПРЕСТОЛ, Киров";
	$description = "О мебельной фабрике ПРЕСТОЛ: более 25 лет производим столы и стулья по индивидуальным заказам.";
	$path = "/about";
	include "header.php";

	$dir = "images/slider/";
	$slides = array_values(preg_grep('~\.(jpe?g|png|webp)$~i', scandir(__DIR__ . "/" . $dir)));
	natsort($slides);
	$shops_count = 0;
	foreach ($shops as $list) $shops_count += count($list);
	$models_count = count($products["table"]) + count($products["chair"]);
?>

<div class="container page-top">
	<?php breadcrumbs(array(array("Главная", "/"), array("О нас"))); ?>

	<div class="split">
		<div class="split__text">
			<span class="eyebrow">О фабрике</span>
			<h1>Престол — <em>столы и стулья</em> из Кирова</h1>
			<div class="prose">
				<p>Престол — это дружный профессиональный коллектив, который производит для Вас качественные столы и стулья при помощи современного оборудования.</p>
				<p>Наша компания более 25 лет занимается изготовлением мебели. Высокое качество, новейшие технологии и материалы, контроль на каждом этапе работы превращают фабрику в одного из лидеров производства столов и стульев в регионе.</p>
				<p>Мы производим мебель по индивидуальным заказам, предлагая на выбор широкий ассортимент цветовых решений и материалов, а также различные размеры.</p>
			</div>
			<dl class="stats">
				<div><dt>25+</dt><dd>лет производства</dd></div>
				<div><dt><?=$models_count?></dt><dd><?=plural($models_count, "модель", "модели", "моделей")?> в каталоге</dd></div>
				<div><dt><?=$shops_count?></dt><dd><?=plural($shops_count, "фирменный салон", "фирменных салона", "фирменных салонов")?></dd></div>
			</dl>
		</div>
		<?php if ($slides) { ?>
		<div class="split__media">
			<img src="<?=thumb($dir . reset($slides), 1280)?>" alt="Мебельная фабрика ПРЕСТОЛ (Киров)" loading="lazy">
		</div>
		<?php } ?>
	</div>

	<?php if (count($slides) > 1) { ?>
	<div class="slides">
	<?php foreach (array_slice($slides, 1) as $f) { ?>
		<a href="<?=thumb($dir . $f, 1280)?>" data-lightbox="about" data-caption="Мебельная фабрика «Престол»">
			<img src="<?=thumb($dir . $f, 640)?>" alt="Мебельная фабрика ПРЕСТОЛ (Киров)" loading="lazy" decoding="async">
		</a>
	<?php } ?>
	</div>
	<?php } ?>

	<section class="section">
		<div class="section-head">
			<h2>Документы</h2>
		</div>
		<div class="docs">
			<a class="doc" href="/certificates"><?=icon("shield")?><span>Сертификаты поставщиков<small>Пластики, МДФ, краски, клей, ткани</small></span></a>
			<!-- <a class="doc" href="/sout"><?=icon("file")?><span>Специальная оценка условий труда<small>Сводные данные СОУТ</small></span></a> -->
			<a class="doc" href="/price.pdf" target="_blank"><?=icon("file")?><span>Прайс-лист<small>Розничные цены с 1 августа 2026 года</small></span></a>
		</div>
	</section>
</div>

<?php
	include "footer.php";
?>
