<?php
	include "data.php";
	include "catalog.php";
	$title = "ПРЕСТОЛ столы и стулья официальный сайт кировской фабрики";
	$description = "Торговый каталог Мебельной фабрики Престол. Столы и стулья для кухни по индивидуальным заказам.";
	$path = "/";
	$has_lead = true;
	include "header.php";

	$shops_count = 0;
	foreach ($shops as $list) $shops_count += count($list);
	$min_table = min(array_map("product_min_price", $products["table"]));
	$min_chair = min(array_map("product_min_price", $products["chair"]));

	// Лидеры продаж
	$top = array(
		"table" => array("teo", "johny", "deni", "charli-s", "mario", "alex", "saimon"),
		"chair" => array("zero", "bingo", "resnichka", "alf", "jambo", "elegant", "shevalie", "riko", "orfey", "mishel", "rony"),
	);

	json_ld(array(
		"@context" => "https://schema.org",
		"@type" => "Organization",
		"name" => "Мебельная фабрика «Престол»",
		"url" => SITE_URL . "/",
		"logo" => SITE_URL . "/images/logo.png",
		"telephone" => SITE_PHONE,
		"email" => SITE_EMAIL,
		"address" => array("@type" => "PostalAddress", "streetAddress" => "ул. Луганская, 59", "addressLocality" => "Киров", "postalCode" => "610044", "addressCountry" => "RU"),
		"sameAs" => array("https://vk.com/f_prestol"),
	));
?>

<section class="hero">
	<div class="container">
		<div class="hero__panel">
			<div class="hero__text">
				<span class="eyebrow">Мебельная фабрика · Киров</span>
				<h1>Столы и стулья <em>под&nbsp;ваш</em> интерьер</h1>
				<p class="hero__lead">Изготавливаем мебель по индивидуальным заказам: нужный размер и форма столешницы, сотни декоров и обивочных тканей, покраска по образцу.</p>
				<div class="hero__actions">
					<a class="btn" href="/table">Выбрать стол</a>
					<a class="btn btn--ghost" href="/chair">Стулья и кресла</a>
				</div>
				<dl class="stats">
					<div><dt>25+</dt><dd>лет производства</dd></div>
					<div><dt><?=count($products["table"])?></dt><dd><?=plural(count($products["table"]), "модель", "модели", "моделей")?> столов</dd></div>
					<div><dt><?=count($products["chair"])?></dt><dd><?=plural(count($products["chair"]), "модель", "модели", "моделей")?> стульев и кресел</dd></div>
					<div><dt><?=$shops_count?></dt><dd><?=plural($shops_count, "салон", "салона", "салонов")?> в <?=count($shops)?> <?=plural(count($shops), "городе", "городах", "городах")?></dd></div>
				</dl>
			</div>
			<div class="hero__media">
				<img src="<?=thumb("images/interiors/teo-zero.jpg", 1280)?>" srcset="<?=srcset("images/interiors/teo-zero.jpg")?>" sizes="(max-width: 900px) 100vw, 55vw" alt="Стол Тео и стулья Зеро в интерьере" width="1280" height="956" fetchpriority="high">
				<a class="hero__tag" href="/table/teo">
					<img src="<?=thumb("images/prodlist/teo/teo.jpg", 320)?>" alt="" width="36" height="36">
					Новинка — стол Тео <?=icon("arrow")?>
				</a>
			</div>
		</div>
	</div>
</section>

<div class="suppliers">
	<div class="container suppliers__inner">
		<small>Материалы</small>
		<span>Egger</span><span>Arpa</span><span>Слотекс</span><span>Arcobaleno</span><span>Hesse</span><span>Kleiberit</span>
	</div>
</div>

<section class="section">
	<div class="container">
		<div class="section-head">
			<div>
				<h2>Каталог <em>фабрики</em></h2>
				<p>Каждую модель изготавливаем под заказ — в нужном размере, цвете и обивке.</p>
			</div>
			<a class="link-arrow" href="/price.pdf" target="_blank">Прайс-лист (PDF) <?=icon("arrow")?></a>
		</div>
		<div class="categories">
			<a class="cat-tile" href="/table">
				<img src="<?=thumb("images/interiors/camelot-mishel.jpg", 640)?>" srcset="<?=srcset("images/interiors/camelot-mishel.jpg")?>" sizes="(max-width: 560px) 100vw, (max-width: 900px) 50vw, 33vw" alt="" width="640" height="478" loading="lazy">
				<span class="cat-tile__arrow"><?=icon("arrow")?></span>
				<div class="cat-tile__body">
					<h3>Столы</h3>
					<p><?=count($products["table"])?> <?=plural(count($products["table"]), "модель", "модели", "моделей")?> · от <?=rub($min_table)?> ₽</p>
				</div>
			</a>
			<a class="cat-tile" href="/chair">
				<img src="<?=thumb("images/interiors/zero.jpg", 640)?>" srcset="<?=srcset("images/interiors/zero.jpg")?>" sizes="(max-width: 560px) 100vw, (max-width: 900px) 50vw, 33vw" alt="" width="640" height="478" loading="lazy">
				<span class="cat-tile__arrow"><?=icon("arrow")?></span>
				<div class="cat-tile__body">
					<h3>Стулья и кресла</h3>
					<p><?=count($products["chair"])?> <?=plural(count($products["chair"]), "модель", "модели", "моделей")?> · от <?=rub($min_chair)?> ₽</p>
				</div>
			</a>
			<a class="cat-tile" href="/gallery">
				<img src="<?=thumb("images/interiors/ivan-oskar.jpg", 640)?>" srcset="<?=srcset("images/interiors/ivan-oskar.jpg")?>" sizes="(max-width: 900px) 100vw, 33vw" alt="" width="640" height="478" loading="lazy">
				<span class="cat-tile__arrow"><?=icon("arrow")?></span>
				<div class="cat-tile__body">
					<h3>Галерея интерьеров</h3>
					<p>Готовые сочетания столов и стульев</p>
				</div>
			</a>
		</div>
	</div>
</section>

<section class="section section--alt">
	<div class="container">
		<div class="section-head">
			<div>
				<h2>Как мы <em>работаем</em></h2>
				<p>Фабрика производит столы и стулья по индивидуальным заказам. Продавец-консультант поможет оформить заказ.</p>
			</div>
		</div>
		<ol class="steps">
			<li class="step">
				<div class="step__icon"><?=icon("palette")?></div>
				<h3>Выберите модель</h3>
				<p>В каталоге или в <a href="/address">фирменном салоне</a>, где представлены все образцы материалов.</p>
			</li>
			<li class="step">
				<div class="step__icon"><?=icon("ruler")?></div>
				<h3>Задайте параметры</h3>
				<p>Размер и форма столешницы, декор пластика, ткань обивки, цвет покраски по образцу.</p>
			</li>
			<li class="step">
				<div class="step__icon"><?=icon("factory")?></div>
				<h3>Изготовим на фабрике</h3>
				<p>Производство в Кирове. Лакокрасочное покрытие немецкого производителя HESSE.</p>
			</li>
			<li class="step">
				<div class="step__icon"><?=icon("truck")?></div>
				<h3>Доставим и соберём</h3>
				<p>Доставка и сборка мебели, гарантийное и постгарантийное обслуживание.</p>
			</li>
		</ol>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-head">
			<h2>Лидеры <em>продаж</em></h2>
			<div class="chips" role="group" aria-label="Показать">
				<button class="chip is-active" type="button" data-filter="all" aria-pressed="true">Все</button>
				<button class="chip" type="button" data-filter="table" aria-pressed="false">Столы</button>
				<button class="chip" type="button" data-filter="chair" aria-pressed="false">Стулья и кресла</button>
			</div>
		</div>
		<div class="cards" data-catalog>
		<?php
			foreach ($top as $t => $keys) {
				foreach ($keys as $k) {
					if (isset($products[$t][$k])) {
						product_card($k, $products[$t][$k], $t);
					}
				}
			}
		?>
		</div>
	</div>
</section>

<section class="section section--alt">
	<div class="container">
		<div class="section-head">
			<div>
				<h2>Наша мебель <em>в интерьере</em></h2>
				<p>Сочетания столов и стульев «Престол». Нажмите на название, чтобы открыть модель.</p>
			</div>
			<a class="link-arrow" href="/gallery">Вся галерея <?=icon("arrow")?></a>
		</div>
		<div class="interiors">
		<?php foreach (array_slice($interiors, 0, 5) as $i => $it) { ?>
			<figure class="shot">
				<a href="<?=thumb("images/interiors/" . $it[0], 1280)?>" data-lightbox="interiors" data-caption="<?=h($it[1])?>">
					<img src="<?=thumb("images/interiors/" . $it[0], $i ? 640 : 1280)?>" alt="<?=h($it[1])?>" width="640" height="478" loading="lazy">
				</a>
				<figcaption>
					<b><?=h($it[1])?></b>
					<?php
						$names = array();
						foreach ($it[2] as $k) {
							$p = product_find($k);
							if ($p) $names[] = "<a href=\"" . h(product_url($k, $p[0])) . "\">" . h($p[1][0]) . "</a>";
						}
						echo implode(" · ", $names);
					?>
				</figcaption>
			</figure>
		<?php } ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split">
		<div class="split__media">
			<img src="<?=thumb("images/propertis/Decorative_laminate.jpg", 1280)?>" alt="Бумажно-слоистый пластик HPL" width="1000" height="750" loading="lazy">
		</div>
		<div class="split__text">
			<span class="eyebrow">Материалы</span>
			<h2>Столешницы из <em>пластика HPL</em></h2>
			<p>Для облицовки столешниц мы используем декоративный бумажно-слоистый пластик HPL от ведущих отечественных и иностранных производителей: <a href="https://egger-russia.ru/furniture-interior-design/filter/products-is-laminatemed/apply/" target="_blank" rel="noopener">EGGER (Австрия)</a>, <a href="https://arcoplastica.ru/decors/klassicheskaya-kollektsiya/" target="_blank" rel="noopener">arcobaleno (Россия)</a>, <a href="https://kitchen.slotex.com/decors/" target="_blank" rel="noopener">Слотекс (Россия)</a>, <a href="https://www.arpaindustriale.com/en/aps/general-collection" target="_blank" rel="noopener">Arpa (Италия)</a>. Огромный выбор декоров — дерево, камень, металлик, монохром — позволит изготовить стол, который гармонично впишется в любой интерьер.</p>
			<p>Сотни наименований тканей для обивки стульев и индивидуальный подбор краски по образцу. Все образцы материалов представлены в наших <a href="/address">фирменных салонах</a>.</p>
			<ul class="props">
				<li><img src="/images/propertis/ico_resistente_impatto.png?1" alt="" width="40" height="40" loading="lazy"><div><b>Ударопрочный</b><span>Выдерживает удары тупыми предметами без повреждений</span></div></li>
				<li><img src="/images/propertis/ico_resistente_usura_graffi.png?1" alt="" width="40" height="40" loading="lazy"><div><b>Устойчив к царапинам</b><span>Высокая плотность защищает от царапин и износа</span></div></li>
				<li><img src="/images/propertis/ico_stabile_luce.png?1" alt="" width="40" height="40" loading="lazy"><div><b>Светостойкий</b><span>Не выцветает под ультрафиолетом</span></div></li>
				<li><img src="/images/propertis/ico_facile_da_pulire.png?1" alt="" width="40" height="40" loading="lazy"><div><b>Легко чистить</b><span>Гладкая поверхность не позволяет грязи прилипать</span></div></li>
				<li><img src="/images/propertis/ico_termoresistente.png?1" alt="" width="40" height="40" loading="lazy"><div><b>Термостойкий</b><span>Широкий диапазон рабочих температур</span></div></li>
				<li><img src="/images/propertis/ico_igienico.png?1" alt="" width="40" height="40" loading="lazy"><div><b>Гигиеничный</b><span>Непористая поверхность проста в уходе</span></div></li>
				<li><img src="/images/propertis/ico_adatto_contatto_dei_cibi.png?1" alt="" width="40" height="40" loading="lazy"><div><b>Контакт с едой</b><span>Подходит для контакта с пищевыми продуктами</span></div></li>
			</ul>
		</div>
	</div>
</section>

<?php lead_section(); ?>

<section class="section section--alt">
	<div class="container">
		<div class="section-head">
			<div>
				<h2>Фирменные <em>салоны</em></h2>
				<p>Образцы мебели, декоров и тканей — вживую.</p>
			</div>
			<a class="link-arrow" href="/address">Адреса на карте <?=icon("arrow")?></a>
		</div>
		<div class="cities">
		<?php foreach ($shops as $city => $list) { ?>
			<div class="city">
				<h3><?=h($city)?></h3>
				<ul>
				<?php foreach ($list as $s) { ?>
					<li><b><?=h($s[0])?></b><?=h($s[1])?><br><a href="tel:<?=$s[2]?>"><?=phone_text($s[2])?></a></li>
				<?php } ?>
				</ul>
			</div>
		<?php } ?>
		</div>
	</div>
</section>

<?php
	include "footer.php";
?>
