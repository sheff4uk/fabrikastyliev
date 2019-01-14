<?
	include "data.php";
	$name = $_GET["name"];
	foreach ($type as $k => $v) {
		if (array_key_exists($name, $products[$k])) {
			$type = $k;
			$type_name = $v[0];
			$type_n = $v[1];
		}
	}
	$product = $products[$type][$name];

	$title = $product[0];
	$description = $type_n." ".$product[0];
	include "header.php";

	$a = array_keys($products[$type]);
	$count = count($products[$type]);
	$pos = array_search ($name,$a);
	$prev = ($pos == 0) ? ($count - 1) : ($pos - 1);
	$next = ($pos == $count - 1) ? 0 : ($pos + 1);
	$pic = "<img src='images/m_logo.png' style='vertical-align: middle;' title='Фирменный салон &laquo;Престол: столы и стулья&raquo;'>";
?>

<section id="main">
	<section class="page">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li>/</li>
			<li><a href="/prodlist.php?type=<?=$type?>"><?=$type_name?></a></li>
			<li>/</li>
			<li><b id="<?=$name?>" style="padding-top: 60px;"><?=$product[0]?></b></li>
		</ul>
		<div id="prod_wr">
			<section id="prod_photo">
				<img src='images/prodlist/<?=$name?>.jpg'>
			</section>

			<section id="prod_description">
				<h2><?=$product[0]?></h2>
				<p><b>Размеры:</b><span><?=$product[1]?></span></p>
<!--				<p><b>Цвет:</b> <?=$product[2]?></p>-->
				<p><b>Материалы:</b><span><?=$product[3]?></span></p>
				<?
					if ($type == "table") {
						echo "<p><b>Столешница:</b><span>МДФ покрытая мебельным пластиком</span></p>";
					}
				?>
				<p><b>Цена:</b>
				<?
					if ($type == "table") {
						foreach ($product[4] as $k => $v) {
							if ($k == 1) {
								$mech = "нераздвижной";
							}
							elseif ($k == 2) {
								$mech = "раздвижной <m><a style='cursor: pointer; text-decoration: underline;'>люкс</a><span class='mech'>Неподвижная царга. Две половины столешницы скользят на металлических шариковых направляющих. Одна вставка размером <b>[35, 42, 48] см</b> в зависимости от формы столешницы и размера стола.<br><img src='images/люкс.jpg'></span></m>";
							}
							elseif ($k == 3) {
								$mech = "раздвижной <m><a style='cursor: pointer; text-decoration: underline;'>сигма</a><span class='mech'>Раздвигающаяся царга из металлических направляющих. Вмещается две или три вставки по <b>[40, 50, 60] см</b> в зависимости от размера стола и вида применяемой фурнитуры.<br><img src='images/сигма.jpg'></span></m>";
							}
							echo "<span>от <b class='price'>{$v}<sup>*</sup></b> руб. {$mech}</span>";
						}
						echo "<br>Конечная цена товара формируется в результате просчета заказа по индивидуальным размерам";
					}
					if ($type == "chair") {
						echo "<span><b class='price'>{$product[4]}<sup>*</sup></b> руб.</span>";
					}
				?>
				</p>
				<p>* данная цена действительна только в фирменных салонах <a href="address.php">Престол: столы и стулья</a>, помеченных знаком <?=$pic?></p>
				<?
					if ($type == "table") {
						echo "<p>Под заказ индивидуальный размер и цвет стола по каталогам пластиков <a href='http://www.plastics-foils.ru/products/18/' target='_blank'>LeMark</a>, <a href='http://www.slotex.ru/products/decor/collection/index.php?ID=9' target='_blank'>Slotex</a>";
					}
					if ($type == "chair") {
						echo "<p>Под заказ на выбор ткань и цвет стула по каталогам пластиков  <a href='http://www.plastics-foils.ru/products/18/' target='_blank'>LeMark</a>, <a href='http://www.slotex.ru/products/decor/collection/index.php?ID=9' target='_blank'>Slotex</a>";
					}
				?>
<!--				<p><a href="/price.pdf" target="_blank">Скачать подробный прайс</a></p>-->
			</section>
		</div>
	</section>

	<a href="product.php?name=<?=$a[$prev]?>" id="prev" title="Предыдущий <?=$type_n?>">
		<i class="fas fa-chevron-circle-left fa-3x"></i>
	</a>
	<a href="product.php?name=<?=$a[$next]?>" id="next" title="Следующий <?=$type_n?>">
		<i class="fas fa-chevron-circle-right fa-3x"></i>
	</a>
</section>

<?
	include "footer.php";
?>
