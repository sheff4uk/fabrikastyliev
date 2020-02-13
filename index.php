<?
	include "data.php";
	$title = "ПРЕСТОЛ столы и стулья официальный сайт кировской фабрики";
	$description = "Торговый каталог Мебельной фабрики Престол. Столы и стулья для кухни по индивидуальным заказам.";
	include "header.php";
?>

<section id="main">
<section class="page">
	<div class="prod_list_wrap">
		<a id="table" href="prodlist.php?type=table" alt="столы">
			<h2>Столы</h2>
		</a>
		<a id="chair" href="prodlist.php?type=chair" alt="стулья">
			<h2>Стулья</h2>
		</a>
		<h3 style="color: #911;">Акция! Весь февраль скидка 10% на всю продукцию с выставки в наших <a style="color: #911;" href="/address.php">фирменных салонах</a>.</h3>
	</div>

	<h1>Лидеры продаж</h1>
	<div class="prod_list_wrap">

	<?
		// Топ столов
		$toptable = array("alex", "charli-s", "niko", "johny", "max", "vinni");
		foreach ($products["table"] as $k => $v) {
			if (in_array($k, $toptable)) {
				echo "
					<div class='prod_cell'>
						<a href='product.php?name={$k}'>
							<div class='prod_cell_img_wrap'>
								<img alt='{$v[0]}' src='images/prodlist/{$k}.jpg'>
							</div>
							<p style='margin: 30px 0 5px 0;'>{$v[0]}</p>
						</a>
						<div class='icon_wrap'>
							".($v[5] ? "<div class='ic_new'></div>" : "")."
						</div>
						<hr>
					</div>
				";
			}
		}

		// Топ стульев
		$topchair = array("valli", "shevalie", "resnichka", "orfey", "mishel", "elegant");
		foreach ($products["chair"] as $k => $v) {
			if (in_array($k, $topchair)) {
				echo "
					<div class='prod_cell'>
						<a href='product.php?name={$k}'>
							<div class='prod_cell_img_wrap'>
								<img alt='{$v[0]}' src='images/prodlist/{$k}.jpg'>
							</div>
							<p style='margin: 30px 0 5px 0;'>{$v[0]}</p>
						</a>
						<div class='icon_wrap'>
							".($v[5] ? "<div class='ic_new'></div>" : "")."
						</div>
						<hr>
					</div>
				";
			}
		}
	?>

	</div>

	<div style="margin: 25px; line-height: 1.5em; text-align: justify;">
		<p>Фабрика <b>«Престол»</b> производит столы и стулья для кухни и гостиной <b>по индивидуальным заказам</b>. Предлагается выбор из нескольких десятков моделей столов и стульев, различные размеры и формы столешниц, более сотни наименований тканей для обивки, более сотни вариантов декоров столешниц (однотонные, деревянные, каменные и т.д.), индивидуальный подбор краски по образцу. Все образцы материалов представлены в наших <a href="/address.php">фирменных салонах</a>. Опытный продавец-консультант поможет оформить заказ. Предлагаем услугу доставки и сборки нашей мебели. Предоставляем гарантийное и после гарантийное обслуживание.</p>
<!--
		<p>Фабрика <b>«Престол»</b> предлагает высококачественные и эстетичные модели столов и стульев в широчайшем ассортименте. Новейшие технологии и материалы, контроль качества на каждом этапе работы позволяют относить фабрику к числу лидеров в сфере производства столов и стульев.</p>
		<p><b>Мы изготавливаем столы и стулья по индивидуальному заказу!</b></p>
-->
	</div>
</section>
</section>

<?
	include "footer.php";
?>
