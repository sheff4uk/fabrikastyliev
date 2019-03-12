<?
	include "data.php";
	$title = "Престол: СТОЛЫ и СТУЛЬЯ для кухни и гостинной по индивидуальным заказам, официальный сайт";
	$description = "Торговый каталог Мебельной фабрики Престол. Столы и стулья для кухни.";
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
	</div>

	<h1>Лидеры продаж</h1>
	<div class="prod_list_wrap">

	<?
		// Топ столов
		$toptable = array("alex", "charli-s", "avatar", "niko");
		foreach ($products["table"] as $k => $v) {
			if (in_array($k, $toptable)) {
				echo "
					<div class='prod_cell'>
						<a href='product.php?name={$k}'>
							<div class='prod_cell_img_wrap'>
								<img src='images/prodlist/{$k}.jpg'>
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
		$topchair = array("mishel", "shevalie", "vikont", "valli");
		foreach ($products["chair"] as $k => $v) {
			if (in_array($k, $topchair)) {
				echo "
					<div class='prod_cell'>
						<a href='product.php?name={$k}'>
							<div class='prod_cell_img_wrap'>
								<img src='images/prodlist/{$k}.jpg'>
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
		<p>Фабрика <b>«Престол»</b> предлагает высококачественные и эстетичные модели столов и стульев в широчайшем ассортименте. Новейшие технологии и материалы, контроль качества на каждом этапе работы позволяют относить фабрику к числу лидеров в сфере производства столов и стульев.</p>
		<p><b>Мы изготавливаем столы и стулья по индивидуальному заказу!</b></p>
	</div>
</section>
</section>

<?
	include "footer.php";
?>
