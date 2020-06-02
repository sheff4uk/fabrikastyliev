<?
	include "data.php";
	$title = "ПРЕСТОЛ столы и стулья официальный сайт кировской фабрики";
	$description = "Торговый каталог Мебельной фабрики Престол. Столы и стулья для кухни по индивидуальным заказам.";
	include "header.php";
?>

<section id="main">
<section class="page">
<!--
	<div style="background: lightgoldenrodyellow; border-radius: 20px; padding: 10px;">
		<h3 style="color: #911; text-align: center;">Уважаемые покупатели!</h3>
		<h3 style="line-height: 2em;">В связи со сложившейся ситуацией, вызванной коронавирусом, временно закрыты некоторые наши <a href="/address.php">фирменные салоны</a>. Но мы продолжаем работать для вас. Будем рады принять заказ на изготовление столов и стульев. Просто оставьте свой номер через форму <a href="/feedback.php?location=<?=$_SERVER['REQUEST_URI']?>" style="background: #fd8134; color: #fff; text-decoration: none; padding: 5px 10px; border-radius: 10px; white-space: nowrap;">Заказать звонок</a> и продавец-консультант перезвонит вам.</h3>
	</div>
-->

	<? include "shop_baner.php"; ?>

	<div class="prod_list_wrap">
		<a id="table" href="prodlist.php?type=table" alt="столы">
			<h2>Столы</h2>
		</a>
		<a id="chair" href="prodlist.php?type=chair" alt="стулья">
			<h2>Стулья</h2>
		</a>
	</div>

	<div style="margin: 25px; line-height: 1.5em; text-align: justify; display: table;">

		<img src="/images/propertis/textile.jpg" alt="Обивочная ткань" style="width: 50%; max-width: 300px; float: right; margin-left: 20px;">
		<p>Фабрика <b>«Престол»</b> производит столы и стулья для кухни и гостиной <b>по индивидуальным заказам</b>. Предлагается выбор из нескольких десятков моделей столов и стульев, различные размеры и формы столешниц, сотни наименований тканей для обивки, сотни вариантов декоров столешниц, индивидуальный подбор краски по образцу. Применяем лакокрасочное покрыте от ведущего немецкого производителя HESSE! Все образцы материалов представлены в наших <a href="/address.php">фирменных салонах</a>. Продавец-консультант поможет оформить заказ. Предлагаем услугу доставки и сборки нашей мебели. Предоставляем гарантийное и после гарантийное обслуживание.</p>

		<img src="/images/propertis/Decorative_laminate.jpg" alt="Бумажно-слоистый пластик HPL" style="width: 50%; max-width: 300px; float: left; margin-right: 20px;">
		<p>Для облицовки столешниц мы используем <b>декоративный бумажно-слоистый пластик HPL</b> от ведущих отечественных и иностранных производителей, таких как: <a href="https://www.egger.com/shop/ru_RU/interior/decors" target="_blank" rel="noopener">EGGER (Австрия)</a>, <a href="http://arcoplastica.ru/decors/" target="_blank" rel="noopener">arcobaleno (Россия)</a>, <a href="http://www.slotex.ru/products/decor/" target="_blank" rel="noopener">Слотекс (Россия)</a>, <a href="http://www.asdlaminat.com/search/decor-and-design" target="_blank" rel="noopener">ASD (Турция)</a>, <a href="http://lemarkllc.ru/dekory" target="_blank" rel="noopener">Lemark (Россия)</a>, <a href="https://www.arpaindustriale.com/en/aps/general-collection" target="_blank" rel="noopener">Arpa (Италия)</a>, <a href="https://www.wilsonart.com/laminate/design-library" target="_blank" rel="noopener">Wilsonart (США)</a>. Огромный выбор всевозможных декоров (дерево, камень, металлик, монохром и др.) позволит изготовить стол, который гармонично впишется в любой интерьер.</p>
	</div>

	<h2>Преимущества бумажно-слоистого пластика HPL</h2>
	<div class="prod_list_wrap">
		<div class="Property">
			<img src="/images/propertis/ico_resistente_impatto.png" alt="Ударопрочный">
			<div class="textProperty">
				<h4>Ударопрочный</h4>
				Способен выдерживать удары тупыми предметами без повреждений
			</div>
		</div>
		<div class="Property">
			<img src="/images/propertis/ico_resistente_usura_graffi.png" alt="Устойчивый к царапинам и износу">
			<div class="textProperty">
				<h4>Устойчивый к царапинам и износу</h4>
				Значительная плотность делает его устойчивым к царапинам и износу
			</div>
		</div>
		<div class="Property">
			<img src="/images/propertis/ico_stabile_luce.png" alt="Светостойкий">
			<div class="textProperty">
				<h4>Светостойкий</h4>
				Устойчив к ультрафиолетовому излучению и не подвержен обесцвечиванию
			</div>
		</div>
		<div class="Property">
			<img src="/images/propertis/ico_facile_da_pulire.png" alt="Легко чистить">
			<div class="textProperty">
				<h4>Легко чистить</h4>
				Его гладкая поверхность не позволяет грязи прилипать
			</div>
		</div>
		<div class="Property">
			<img src="/images/propertis/ico_termoresistente.png" alt="Термостойкий">
			<div class="textProperty">
				<h4>Термостойкий</h4>
				Широкий диапазон температурного применения
			</div>
		</div>
		<div class="Property">
			<img src="/images/propertis/ico_igienico.png" alt="Гигиеничный">
			<div class="textProperty">
				<h4>Гигиеничный</h4>
				Благодаря непористой поверхности он гигиеничен и прост в уходе
			</div>
		</div>
		<div class="Property">
			<img src="/images/propertis/ico_adatto_contatto_dei_cibi.png" alt="Подходит для контакта с едой">
			<div class="textProperty">
				<h4>Подходит для контакта с едой</h4>
				Будучи гигиеничным и термостойким, подходит для контакта с пищевыми продуктами
			</div>
		</div>
	</div>

<!--		<h3 style="color: #911;">Акция! Весь февраль скидка 10% на всю продукцию с выставки в наших <a style="color: #911;" href="/address.php">фирменных салонах</a>.</h3>-->

	<h2>Лидеры продаж</h2>
	<div class="prod_list_wrap">

	<?
		// Топ столов
		$toptable = array("alex", "charli-s", "niko", "johny", "max", "vinni");
		foreach ($products["table"] as $k => $v) {
			if (in_array($k, $toptable)) {
				$price = number_format(min($v[4]), 0, '', ' ');
				$pref = "от ";
				echo "
					<div class='prod_cell'>
						<a href='product.php?name={$k}'>
							<div class='prod_cell_img_wrap'>
								<img alt='{$v[0]}' src='images/prodlist/{$k}.jpg'>
							</div>
							<p style='margin: 30px 0 30px 0;'>{$v[0]}</p>
						</a>
						<div class='icon_wrap'>
							".($v[5] ? "<div class='ic_new'></div>" : "")."
						</div>
						<div style='text-align: center; position: absolute; bottom: 20px; width: 100%; white-space: nowrap;'>{$pref}<span class='price'>{$price}</span> р.</div>
						<hr>
					</div>
				";
			}
		}

		// Топ стульев
		$topchair = array("valli", "shevalie", "resnichka", "orfey", "mishel", "elegant");
		foreach ($products["chair"] as $k => $v) {
			if (in_array($k, $topchair)) {
				$price = number_format($v[4], 0, '', ' ');
				echo "
					<div class='prod_cell'>
						<a href='product.php?name={$k}'>
							<div class='prod_cell_img_wrap'>
								<img alt='{$v[0]}' src='images/prodlist/{$k}.jpg'>
							</div>
							<p style='margin: 30px 0 30px 0;'>{$v[0]}</p>
						</a>
						<div class='icon_wrap'>
							".($v[5] ? "<div class='ic_new'></div>" : "")."
						</div>
						<div style='text-align: center; position: absolute; bottom: 20px; width: 100%; white-space: nowrap;'><span class='price'>{$price}</span> р.</div>
						<hr>
					</div>
				";
			}
		}
	?>

	</div>

</section>
</section>

<?
	include "footer.php";
?>
