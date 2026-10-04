<?php
	include "catalog.php";
	$title = "Где купить - адреса магазинов ПРЕСТОЛ столы и стулья";
	$description = "Адреса фирменных магазинов ПРЕСТОЛ столы и стулья";
	$path = "/address";
	include "header.php";
?>

<div class="container page-top">
	<?php breadcrumbs(array(array("Главная", "/"), array("Где купить"))); ?>

	<div class="page-head">
		<h1>Где <em>купить</em></h1>
		<p>В фирменных салонах можно посмотреть мебель вживую, выбрать декор столешницы и ткань обивки и оформить заказ с продавцом-консультантом.</p>
	</div>

	<?php foreach ($shops as $city => $list) { ?>
	<section class="city-block">
		<h2><?=h($city)?></h2>
		<div class="shop-list">
		<?php foreach ($list as $s) { ?>
			<details class="shop" id="<?=h($s[4])?>">
				<summary>
					<div><b><?=h($s[0])?></b><span><?=h($s[1])?></span></div>
					<a class="shop__phone" href="tel:<?=$s[2]?>"><?=phone_text($s[2])?></a>
					<span class="shop__map"><?=icon("pin")?>Карта</span>
				</summary>
				<iframe src="https://yandex.ru/map-widget/v1/?z=12&amp;ol=biz&amp;oid=<?=h($s[3])?>" title="<?=h($s[0] . ", " . $city)?> на Яндекс.Картах" loading="lazy"></iframe>
			</details>
		<?php } ?>
		</div>
	</section>
	<?php } ?>
</div>

<script>
	// Ссылка вида address.php#klen сразу открывает карту нужного салона
	(function () {
		var el = location.hash && document.getElementById(location.hash.slice(1));
		if (el && el.tagName === "DETAILS") el.open = true;
	})();
</script>

<?php
	include "footer.php";
?>
