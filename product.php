<?php
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
			<li><i class="fas fa-long-arrow-alt-left"></i></li>
			<li><a href="/prodlist.php?type=<?=$type?>"><?=$type_name?></a></li>
			<li><i class="fas fa-long-arrow-alt-left"></i></li>
			<li><b id="<?=$name?>" style="padding-top: 60px;"><?=$product[0]?></b></li>
		</ul>

		<section style="margin-bottom: 10px; text-align: center;">
			<a href="product.php?name=<?=$a[$prev]?>">Предыдущий товар</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="product.php?name=<?=$a[$next]?>">Следующий товар</a>
		</section>

		<div id="prod_wr">
			<section id="prod_photo">
				<div class="slider">
					<ul class="bxslider">
					<?php
						// Извлекаем из папки слайды
						$dir = "images/prodlist/{$name}/";
						//$cdir = scandir($dir);
						$cdir = preg_grep('~\.(jpeg|jpg|png)$~', scandir($dir));
						foreach ($cdir as $key => $value) {
							if (!in_array($value,array(".",".."))) {
								echo "<li><img alt='{$product[0]}' src='".$dir.$value."?v=1' /></li>";
							}
						}
					?>
					</ul>
					<div id="bx-pager">
					<?php
						$i = 0;
						foreach ($cdir as $key => $value) {
							if (!in_array($value,array(".",".."))) {
								echo "<a data-slide-index='{$i}' href=''><img alt='{$product[0]}' src='".$dir.$value."?v=1' /></a>";
								$i++;
							}
						}
					?>
					</div>
				</div>
				<div style="margin: 30px 0;">
					<h3 class="price">Изготавливаем мебель на заказ по индивидуальным параметрам.</h3>
					<div style="display: flex;">
						<a href="/feedback.php?location=<?=$_SERVER['REQUEST_URI']?>&model=<?=$product[0]?>" style="background: #fd8134; color: #fff; text-decoration: none; padding: 10px; border-radius: 10px; white-space: nowrap; float: left; margin: 5px;">Оставить заявку</a>
						<div style="margin: 14px 0;">
							<i class="fas fa-long-arrow-alt-left"></i>
							С вами свяжется специалист для уточнения деталей.
						</div>
					</div>
				</div>
			</section>

			<section id="prod_description">
				<h2><?=$product[0]?></h2>

				<?php
					if ($type == "table") {
						?>
						<p><b>Популярные декоры столешниц:</b></p>
						<div class="mtslider">
							<div><img src="/images/hpl/8803440787486.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/W1000_38' target='_blank'>EGGER W1000 ST38 Белый премиум</a>"></div>
							<div><img src="/images/hpl/8803465691166.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/W1100_9' target='_blank'>EGGER W1100 ST9 Белый альпийский</a>"></div>
							<div><img src="/images/hpl/20470-800x800.jpg" title="arcobaleno 2047 Кантри"></div>
							<div><img src="/images/hpl/3230_S_Дуб-Сонома-светлый.jpg" title="Слотекс 3230/S Дуб Сонома светлый"></div>
							<!-- <div><img src="/images/hpl/1050-313x500-c-default.jpg" title="ASD 1050 Белый"></div> -->
							<div><img src="/images/hpl/8803449045022.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1180_37' target='_blank'>EGGER H1180 ST37 Дуб Галифакс натуральный</a>"></div>
							<!-- <div><img src="/images/hpl/1039P.jpeg" title="ASD 1039 Ванильный"></div> -->
							<div><img src="/images/hpl/3847_S_zlcdu-kzwrn_A4.jpg" title="Слотекс 3847/S Венге Линум"></div>
							<div><img src="/images/hpl/8803456319518.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/U104_9' target='_blank'>EGGER U104 ST9 Алебастр белый</a>"></div>
							<!-- <div><img src="/images/hpl/3162.jpg" title="ASD 3162 WGR 2 Дуб текстурный"></div> -->
							<!-- <div><img src="/images/hpl/1039_FLR.jpg" title="ASD 1039 FLR Ваниль флора"></div> -->
							<div><img src="/images/hpl/14-01037-005_10141541_Altai_Laerche-1-800x800.jpg" title="arcobaleno 2045 Лиственница"></div>
							<div><img src="/images/hpl/2017-800x800.jpg" title="arcobaleno 2017 Венге"></div>
							<!-- <div><img src="/images/hpl/1050_CRC.jpg" title="ASD 1050 CRC Белый керамика"></div> -->
							<div><img src="/images/hpl/8803451207710.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1424_22' target='_blank'>EGGER H1424 ST22 Файнлайн крем</a>"></div>
							<div><img src="/images/hpl/8803456450590.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/U108_9' target='_blank'>EGGER U108 ST9 Ванильный жёлтый</a>"></div>
							<div><img src="/images/hpl/8803456516126.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/U113_9' target='_blank'>EGGER U113 ST9 Коттон бежевый</a>"></div>
							<div><img src="/images/hpl/8803451338782.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1486_36' target='_blank'>EGGER H1486 ST36 Сосна Пасадена</a>"></div>
							<div><img src="/images/hpl/8803448717342.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1145_10' target='_blank'>EGGER H1145 ST10 Дуб Бардолино натуральный</a>"></div>
							<!-- <div><img src="/images/hpl/1572-M_Antique_White_4.jpg" title="Wilsonart 1572-60 ANTIQUE WHITE"></div> -->
							<div><img src="/images/hpl/1111_1_%D0%91%D0%B5%D0%BB%D1%8B%D0%B9.jpg" title="Слотекс 1111/S Белый"></div>
							<div><img src="/images/hpl/3331_S_puft-ovldllbl_A4.jpg" title="Слотекс 3331/S Клен Ванкувер"></div>
							<div><img src="/images/hpl/8803457237022.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/U222_9' target='_blank'>EGGER U222 ST9 Крем бежевый</a>"></div>
							<div><img src="/images/hpl/8803448324126.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1113_10' target='_blank'>EGGER H1113 ST10 Дуб Канзас коричневый</a>"></div>
							<div><img src="/images/hpl/8803448520734.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H1122_22' target='_blank'>EGGER H1122 ST22 Древесина белая</a>"></div>
							<div><img src="/images/hpl/3830_C_%D0%9F%D0%B8%D0%BD%D0%BE.jpg" title="Слотекс 3830/C Пино"></div>
							<div><img src="/images/hpl/0028_lu_vg.jpg" title="Arpa 0028 fin. lucida"></div>
							<div><img src="/images/hpl/8803454943262.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H3395_12' target='_blank'>EGGER H3395 ST12 Дуб Корбридж натуральный</a>"></div>
							<div><img src="/images/hpl/0008_C_zjp-uikrp_A4.jpg" title="Слотекс 0008/C Дуб-белый"></div>
							<div><img src="/images/hpl/8803455467550.jpeg" title="<a href='https://www.egger.com/shop/ru_RU/interior/decor-detail/H3433_22' target='_blank'>EGGER H3433 ST22 Сосна Аланд полярная</a>"></div>
						</div>
						<p><b style="color: #C00000;">Важно!</b> Отображение цвета на вашем мониторе может отличаться от реального цвета.</p>

						<!-- <p><b>Производители пластиков:</b> <a href="https://www.egger.com/shop/ru_RU/interior/decors" target="_blank" rel="noopener">EGGER (Австрия)</a>, <a href="http://arcoplastica.ru/decors/" target="_blank" rel="noopener">arcobaleno (Россия)</a>, <a href="http://www.slotex.ru/products/decor/" target="_blank" rel="noopener">Слотекс (Россия)</a>, <a href="http://www.asdlaminat.com/search/decor-and-design" target="_blank" rel="noopener">ASD (Турция)</a>, <a href="https://www.arpaindustriale.com/en/aps/general-collection" target="_blank" rel="noopener">Arpa (Италия)</a>, <a href="https://www.wilsonart.com/laminate/design-library" target="_blank" rel="noopener">Wilsonart (США)</a>.</p> -->

						<p><b>Под заказ индивидуальный размер и цвет стола.</b></p>
						<?php
					}
					if ($type == "chair") {
						?>
						<p><b>Популярная обивочная ткань:</b></p>
						<div class="mtslider">
							<div><img src="/images/tex/Suffle latte.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Suffle latte</p>"></div>
							<div><img src="/images/tex/Vatican cream.jpg" title="Жаккард<p style='font-size: 1.5em; margin: 0;'>Vatican cream</p>"></div>
							<div><img src="/images/tex/Teddy 305.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Teddy 305</p>"></div>
							<div><img src="/images/tex/Levays 12.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Левайс 12</p>"></div>
							<div><img src="/images/tex/Lambre 01.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Lambre 01</p>"></div>
							<div><img src="/images/tex/Tenerife beige.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Tenerife beige</p>"></div>
							<div><img src="/images/tex/Cosmo moonlight.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Cosmo moonlight</p>"></div>
							<div><img src="/images/tex/Nebby 305.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 305</p>"></div>
							<div><img src="/images/tex/Lambre 04.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Lambre 04</p>"></div>
							<div><img src="/images/tex/Nebby 014.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 014</p>"></div>
							<div><img src="/images/tex/Nebby 211.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 211</p>"></div>
							<div><img src="/images/tex/Nebby 019.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 019</p>"></div>
							<div><img src="/images/tex/Nebby 245.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 245</p>"></div>
							<div><img src="/images/tex/Nebby 915.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 915</p>"></div>
							<div><img src="/images/tex/Nebby 304.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 304</p>"></div>
							<div><img src="/images/tex/Nebby 231.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 231</p>"></div>
							<div><img src="/images/tex/Lambre 15.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Lambre 15</p>"></div>
							<div><img src="/images/tex/Lambre 16.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Lambre 16</p>"></div>
							<div><img src="/images/tex/Florida latte.jpg" title="Жаккард<p style='font-size: 1.5em; margin: 0;'>Florida latte</p>"></div>
							<div><img src="/images/tex/Estetica mineral shell.jpg" title="Шенилл<p style='font-size: 1.5em; margin: 0;'>Estetica mineral shell</p>"></div>
							<div><img src="/images/tex/Сlever Romb brown.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Сlever Romb brown</p>"></div>
							<div><img src="/images/tex/FLY col 20.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>FLY col 20</p>"></div>
							<div><img src="/images/tex/Triumf chocolate.jpg" title="Искусственная замша<p style='font-size: 1.5em; margin: 0;'>Triumf chocolate</p>"></div>
							<div><img src="/images/tex/Nebby 235.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 235</p>"></div>
							<div><img src="/images/tex/Palermo 223 mouse.jpg" title="Шенилл<p style='font-size: 1.5em; margin: 0;'>Palermo 223 mouse</p>"></div>
							<div><img src="/images/tex/Suffle mocco.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>Suffle mocco</p>"></div>
							<div><img src="/images/tex/Nebby 221.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Nebby 221</p>"></div>
							<div><img src="/images/tex/Teddy 007.jpg" title="Велюр<p style='font-size: 1.5em; margin: 0;'>Teddy 007</p>"></div>
							<div><img src="/images/tex/Elefante 11.jpg" title="Флок<p style='font-size: 1.5em; margin: 0;'>Elefante 11</p>"></div>
							<div><img src="/images/tex/VINUELA 2 beige.jpg" title="Шенилл<p style='font-size: 1.5em; margin: 0;'>VINUELA 2 beige</p>"></div>
							<div><img src="/images/tex/FLY col 03.jpg" title="Микровелюр<p style='font-size: 1.5em; margin: 0;'>FLY col 03</p>"></div>
							<div><img src="/images/tex/Vatican chocolate.jpg" title="Жаккард<p style='font-size: 1.5em; margin: 0;'>Vatican chocolate</p>"></div>
						</div>
						<p><b style="color: #C00000;">Важно!</b> Отображение цвета на вашем мониторе может отличаться от реального цвета.</p>

						<!-- <p><b>Поставщики тканей:</b> <a href="https://www.ltex.ru/textile?c=1" target="_blank" rel="noopener">Лэзертач</a>, <a href="https://favorittextil.ru/katalog/mebelnye-tkani" target="_blank" rel="noopener">Фаворит</a>, <a href="https://viptextil.ru/material" target="_blank" rel="noopener">VIP-Текстиль</a>, <a href="https://ametist-store.ru/catalog/materialy-dlya-mebeli/mebelnye-tkani/" target="_blank" rel="noopener">Домфорт</a>.</p> -->

						<p><b>Под заказ на выбор ткань и цвет изделия.</b></p>
						<?php
					}
				?>

				<p><b>Цена:</b>
				<?php
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
							$price = number_format($v, 0, '', ' ');
							echo "<span style='margin-top: 10px;'>от <b class='price' style='font-size: 2em'>{$price}</b> р. {$mech}</span>";
						}
						echo "<br><span style='color: #911;'>Для вычисления точной стоимости нужно учесть требуемый размер стола и другие параметры.</span>";
					}
					if ($type == "chair") {
						$price = number_format($product[4], 0, '', ' ');
						echo "<span style='margin-top: 10px;'><b class='price' style='font-size: 2em'>{$price}</b> р.</span>";
					}
				?>
				</p>

				<p><b>Размеры:</b><span><?=$product[1]?></span></p>

				<p><b>Материалы:</b><span><?=$product[3]?></span></p>
				<?php
					if ($type == "table") {
						echo "<p><b>Столешница:</b><span>МДФ покрытая мебельным пластиком</span></p>";
					}
				?>
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

<?php
	include "footer.php";
?>
