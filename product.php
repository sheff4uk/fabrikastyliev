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

	$title = $type_n." ".$product[0]." от кировской фабрики ПРЕСТОЛ";
	$description = $type_n." ".$product[0]." ".$product[3];
	include "header.php";

	$a = array_keys($products[$type]);
	$count = count($products[$type]);
	$pos = array_search ($name,$a);
	$prev = ($pos == 0) ? ($count - 1) : ($pos - 1);
	$next = ($pos == $count - 1) ? 0 : ($pos + 1);
	$pic = "<img alt='Престол' src='images/m_logo.png' style='vertical-align: middle;' title='Фирменный салон &laquo;Престол: столы и стулья&raquo;'>";
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

		<section style="display: flex; justify-content: space-between;">
			<a href="product.php?name=<?=$a[$prev]?>" id="prev" title="Предыдущий <?=$type_n?>">
				<img alt="Предыдущий <?=$type_n?>" src="/images/prodlist/<?=$a[$prev]?>.jpg" alt="<?=$a[$prev]?>" style="height: 100px;">
			</a>
			<a href="product.php?name=<?=$a[$next]?>" id="next" title="Следующий <?=$type_n?>">
				<img alt="Следующий <?=$type_n?>" src="/images/prodlist/<?=$a[$next]?>.jpg" alt="<?=$a[$next]?>" style="height: 100px;">
			</a>
		</section>

		<div id="prod_wr">
			<section id="prod_photo">
				<div class="slider">
					<ul class="bxslider">
					<?
						// Извлекаем из папки слайды
						$dir = "images/prodlist/{$name}/";
						//$cdir = scandir($dir);
						$cdir = preg_grep('~\.(jpeg|jpg|png)$~', scandir($dir));
						foreach ($cdir as $key => $value) {
							if (!in_array($value,array(".",".."))) {
								echo "<li><img alt='{$product[0]}' src='".$dir.$value."' /></li>";
							}
						}
					?>
					</ul>
					<div id="bx-pager">
					<?
						$i = 0;
						foreach ($cdir as $key => $value) {
							if (!in_array($value,array(".",".."))) {
								echo "<a data-slide-index='{$i}' href=''><img alt='{$product[0]}' src='".$dir.$value."' /></a>";
								$i++;
							}
						}
					?>
					</div>
				</div>
<!--				<img src='images/prodlist/<?=$name?>.jpg'>-->
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
								$mech = "раздвижной <m><a style='cursor: pointer; text-decoration: underline;'>люкс</a><span class='mech'>Неподвижная царга. Две половины столешницы скользят на металлических шариковых направляющих. Одна вставка размером <b>[35, 42, 48] см</b> в зависимости от формы столешницы и размера стола.<br><img alt='Механизм раздвижки Люкс' src='images/люкс.jpg'></span></m>";
							}
							elseif ($k == 3) {
								$mech = "раздвижной <m><a style='cursor: pointer; text-decoration: underline;'>сигма</a><span class='mech'>Раздвигающаяся царга из металлических направляющих. Вмещается две или три вставки по <b>[40, 50, 60] см</b> в зависимости от размера стола и вида применяемой фурнитуры.<br><img alt='Механизм раздвижки Сигма' src='images/сигма.jpg'></span></m>";
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
						echo "<p>Под заказ индивидуальный размер и цвет стола по каталогам пластиков <a href='http://www.plastics-foils.ru/products/18/' target='_blank' rel='noopener'>LeMark</a>, <a href='http://www.slotex.ru/products/decor/collection/index.php?ID=9' target='_blank' rel='noopener'>Slotex</a>";
					}
					if ($type == "chair") {
						echo "<p>Под заказ на выбор ткань и цвет стула по каталогам пластиков  <a href='http://www.plastics-foils.ru/products/18/' target='_blank' rel='noopener'>LeMark</a>, <a href='http://www.slotex.ru/products/decor/collection/index.php?ID=9' target='_blank' rel='noopener'>Slotex</a>";
					}
				?>
<!--				<p><a href="/price.pdf" target="_blank" rel="noopener">Скачать подробный прайс</a></p>-->
			</section>
		</div>
	</section>
</section>

<script>
	$(function(){
		$('.bxslider').bxSlider({
			nextText: '',
			prevText: '',
			pagerCustom: '#bx-pager',
			mode: 'fade'
		});
	});
</script>

<?
	include "footer.php";
?>
