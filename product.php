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

<!--
		<section style="display: flex; justify-content: space-between;">
			<a href="product.php?name=<?=$a[$prev]?>" id="prev" title="Предыдущий <?=$type_n?>">
				<img alt="Предыдущий <?=$type_n?>" src="/images/prodlist/<?=$a[$prev]?>.jpg" alt="<?=$a[$prev]?>" style="height: 100px;">
			</a>
			<a href="product.php?name=<?=$a[$next]?>" id="next" title="Следующий <?=$type_n?>">
				<img alt="Следующий <?=$type_n?>" src="/images/prodlist/<?=$a[$next]?>.jpg" alt="<?=$a[$next]?>" style="height: 100px;">
			</a>
		</section>
-->

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

				<?
					if ($type == "table") {
						?>
						<p><b>Популярные декоры столешниц:</b></p>
						<div class="mtslider">
							<div><img src="/images/hpl/8803440787486.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/W1000_38' target='_blank'>EGGER W1000 ST38 Белый премиум</a>"></div>
							<div><img src="/images/hpl/8803465691166.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/W1100_9' target='_blank'>EGGER W1100 ST9 Белый альпийский</a>"></div>
							<div><img src="/images/hpl/20470-800x800.jpg" title="arcobaleno 2047 Кантри"></div>
							<div><img src="/images/hpl/3230_S_Дуб-Сонома-светлый.jpg" title="Слотекс 3230/S Дуб Сонома светлый"></div>
							<div><img src="/images/hpl/1050-313x500-c-default.jpg" title="ASD 1050 Белый"></div>
							<div><img src="/images/hpl/8803449045022.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1180_37' target='_blank'>EGGER H1180 ST37 Дуб Галифакс натуральный</a>"></div>
							<div><img src="/images/hpl/1039P.jpeg" title="ASD 1039 Ванильный"></div>
							<div><img src="/images/hpl/3847_S_zlcdu-kzwrn_A4.jpg" title="Слотекс 3847/S Венге Линум"></div>
							<div><img src="/images/hpl/8803456319518.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/U104_9' target='_blank'>EGGER U104 ST9 Алебастр белый</a>"></div>
							<div><img src="/images/hpl/3162.jpg" title="ASD 3162 WGR 2 Дуб текстурный"></div>
							<div><img src="/images/hpl/1039_FLR.jpg" title="ASD 1039 FLR Ваниль флора"></div>
							<div><img src="/images/hpl/14-01037-005_10141541_Altai_Laerche-1-800x800.jpg" title="arcobaleno 2045 Лиственница"></div>
							<div><img src="/images/hpl/2017-800x800.jpg" title="arcobaleno 2017 Венге"></div>
							<div><img src="/images/hpl/1050_CRC.jpg" title="ASD 1050 CRC Белый керамика"></div>
							<div><img src="/images/hpl/8803451207710.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1424_22' target='_blank'>EGGER H1424 ST22 Файнлайн крем</a>"></div>
							<div><img src="/images/hpl/8803456450590.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/U108_9' target='_blank'>EGGER U108 ST9 Ванильный жёлтый</a>"></div>
							<div><img src="/images/hpl/8803456516126.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/U113_9' target='_blank'>EGGER U113 ST9 Коттон бежевый</a>"></div>
							<div><img src="/images/hpl/pr_125.jpg" title="Lemark 0620 SH Сосна карелия бежевая"></div>
							<div><img src="/images/hpl/8803451338782.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1486_36' target='_blank'>EGGER H1486 ST36 Сосна Пасадена</a>"></div>
							<div><img src="/images/hpl/8803448717342.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1145_10' target='_blank'>EGGER H1145 ST10 Дуб Бардолино натуральный</a>"></div>
							<div><img src="/images/hpl/1572-M_Antique_White_4.jpg" title="Wilsonart 1572-60 ANTIQUE WHITE"></div>
							<div><img src="/images/hpl/1111_1_%D0%91%D0%B5%D0%BB%D1%8B%D0%B9.jpg" title="Слотекс 1111/S Белый"></div>
							<div><img src="/images/hpl/3331_S_puft-ovldllbl_A4.jpg" title="Слотекс 3331/S Клен Ванкувер"></div>
							<div><img src="/images/hpl/8803449045022.jpeg" title="<a href='' target='_blank'>EGGER U222 ST9 Крем бежевый</a>"></div>
							<div><img src="/images/hpl/8803448324126.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1113_10' target='_blank'>EGGER H1113 ST10 Дуб Канзас коричневый</a>"></div>
							<div><img src="/images/hpl/8803448520734.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1122_22' target='_blank'>EGGER H1122 ST22 Древесина белая</a>"></div>
							<div><img src="/images/hpl/3830_C_%D0%9F%D0%B8%D0%BD%D0%BE.jpg" title="Слотекс 3830/C Пино"></div>
							<div><img src="/images/hpl/0028_lu_vg.jpg" title="Arpa 0028 fin. lucida"></div>
							<div><img src="/images/hpl/8803454943262.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H3395_12' target='_blank'>EGGER H3395 ST12 Дуб Корбридж натуральный</a>"></div>
							<div><img src="/images/hpl/0008_C_zjp-uikrp_A4.jpg" title="Слотекс 0008/C Дуб-белый"></div>
							<div><img src="/images/hpl/pr_156.jpg" title="Lemark 0406 GR Травертин капучино"></div>
							<div><img src="/images/hpl/8803455467550.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H3433_22' target='_blank'>EGGER H3433 ST22 Сосна Аланд полярная</a>"></div>
						</div>
						<p><b style="color: #C00000;">Важно!</b> Отображение цвета на вашем мониторе может отличаться от реального цвета.</p>

						<p><b>Под заказ индивидуальный размер и цвет стола.</b></p>
						<?
					}
					if ($type == "chair") {
						echo "<p><b>Под заказ на выбор ткань и цвет изделия.</b></p>";
					}
				?>

				<p><b>Размеры:</b><span><?=$product[1]?></span></p>

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

		$('.mtslider').bxSlider({
			auto: true,
			stopAutoOnClick: true,
			nextText: '',
			prevText: '',
			mode: 'horizontal',
			captions: true,
			slideWidth: 600
		});
	});
</script>

<?
	include "footer.php";
?>
