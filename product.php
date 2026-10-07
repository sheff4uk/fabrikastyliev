<?php
	include "data.php";
	include "catalog.php";
	require_once "functions.php";

	$name = isset($_GET["name"]) && is_string($_GET["name"]) ? $_GET["name"] : "";
	$found = product_find($name);
	if (!$found) {
		not_found();
	}
	list($ptype, $product) = $found;
	$type_name = $type[$ptype][0];
	$type_n = $type[$ptype][1];

	$photos = product_photos($name);
	if (!$photos) {
		$photos = array(product_main_photo($name));
	}

	$title = $type_n." ".$product[0]." от кировской фабрики ПРЕСТОЛ";
	$description = product_description($name, $ptype, $product, $mechanisms);
	$path = product_url($name, $ptype);
	$path_drop = array("name", "type");
	$nav_current = list_url($ptype);
	$canonical = SITE_URL . $path;
	$og_image = img_url($photos[0]);
	$has_lead = true;
	include "header.php";

	// Соседние модели того же типа
	$keys = array_keys($products[$ptype]);
	$pos = array_search($name, $keys);
	$count = count($keys);
	$prev = $keys[($pos + $count - 1) % $count];
	$next = $keys[($pos + 1) % $count];

	$prices = is_array($product[4]) ? $product[4] : array($product[4]);
	$offer = count($prices) > 1
		? array("@type" => "AggregateOffer", "priceCurrency" => "RUB", "lowPrice" => min($prices), "highPrice" => max($prices), "offerCount" => count($prices))
		: array("@type" => "Offer", "priceCurrency" => "RUB", "price" => reset($prices));
	json_ld(array(
		"@context" => "https://schema.org",
		"@type" => "Product",
		"name" => mb_convert_case($type_n, MB_CASE_TITLE, "UTF-8") . " " . $product[0],
		"image" => array_map(function ($p) { return SITE_URL . img_url($p); }, array_slice($photos, 0, 3)),
		"description" => $description,
		"brand" => array("@type" => "Brand", "name" => "Престол"),
		"offers" => $offer + array("url" => $canonical),
	));
?>

<div class="container page-top">
	<?php breadcrumbs(array(array("Главная", "/"), array($type_name, list_url($ptype)), array($product[0]))); ?>

	<div class="product">
		<div class="pgallery">
			<a class="pgallery__main" href="<?=thumb($photos[0], 1280)?>" data-lightbox="product" data-index="0" data-caption="<?=h($product[0])?>">
				<img src="<?=thumb($photos[0], 1280)?>" alt="<?=h(mb_convert_case($type_n, MB_CASE_TITLE, "UTF-8") . " " . $product[0])?>" width="1000" height="1000" fetchpriority="high">
				<?php if (!empty($product[5])) { ?><span class="badge">Новинка</span><?php } ?>
			</a>
			<?php if (count($photos) > 1) { ?>
			<div class="pgallery__thumbs">
			<?php foreach ($photos as $i => $p) { ?>
				<button type="button" data-index="<?=$i?>" data-src="<?=thumb($p, 1280)?>" data-full="<?=thumb($p, 1280)?>" aria-current="<?=($i ? "false" : "true")?>" aria-label="Фото <?=($i + 1)?>">
					<img src="<?=thumb($p, 320)?>" alt="" width="84" height="84" loading="lazy">
				</button>
			<?php } ?>
			</div>
			<?php } ?>
		</div>

		<div class="pinfo">
			<span class="eyebrow"><?=h($type_name)?> · фабрика «Престол»</span>
			<h1><?=h($product[0])?></h1>

			<?php if ($ptype == "table") { ?>
				<p class="pinfo__price">от <b><?=rub(product_min_price($product))?></b> ₽</p>
				<div class="options">
				<?php foreach ($product[4] as $m => $price) {
					$mech = isset($mechanisms[$m]) ? $mechanisms[$m] : array("Вариант", "");
					if ($mech[1] === "") {
				?>
					<div class="option option--static"><span><?=h($mech[0])?></span><span class="option__price">от <?=rub($price)?> ₽</span></div>
				<?php continue; } ?>
					<details class="option">
						<summary>
							<span><?=h($mech[0])?><small>Подробнее о механизме</small></span>
							<span class="option__price">от <?=rub($price)?> ₽</span>
						</summary>
						<div class="option__body">
							<?=h($mech[1])?>
							<?php if (!empty($mech[2])) { ?><img src="<?=img_url($mech[2])?>" alt="Механизм: <?=h($mech[0])?>" loading="lazy"><?php } ?>
						</div>
					</details>
				<?php } ?>
				</div>
				<p class="note">Цена стандартного стола. Для точного расчёта учитываются размер, форма столешницы и другие параметры.</p>
			<?php } else { ?>
				<p class="pinfo__price"><b><?=rub(product_min_price($product))?></b> ₽</p>
			<?php } ?>

			<dl class="specs">
				<div><dt>Размеры</dt><dd><?=$product[1]?></dd></div>
				<div><dt>Материалы</dt><dd><?=h($product[3])?></dd></div>
				<?php if ($ptype == "table") { ?>
				<div><dt>Столешница</dt><dd>МДФ, покрытая мебельным пластиком</dd></div>
				<?php } ?>
			</dl>

			<p class="pinfo__description"><?=h($description)?></p>

			<div class="pinfo__actions">
				<a class="btn btn--accent" href="#zayavka">Рассчитать стоимость</a>
				<a class="btn btn--ghost" href="tel:<?=SITE_PHONE?>"><?=icon("phone")?><?=SITE_PHONE_TEXT?></a>
			</div>
			<p class="pinfo__note">Изготавливаем мебель на заказ по индивидуальным параметрам. <?=($ptype == "table" ? "Под заказ — индивидуальный размер и цвет стола." : "Под заказ — ткань и цвет изделия на выбор.")?></p>
		</div>
	</div>

	<section class="section">
		<?php if ($ptype == "table") { ?>
			<div class="section-head">
				<div>
					<h2>Популярные <em>декоры</em> столешниц</h2>
					<p>Бумажно-слоистый пластик HPL. Все образцы — в <a href="/address">фирменных салонах</a>.</p>
				</div>
			</div>
			<div class="swatches">
			<?php foreach ($decors as $d) { ?>
				<figure class="swatch">
					<a href="<?=thumb("images/hpl/" . $d[0], 1280)?>" data-lightbox="decors" data-caption="<?=h($d[1])?>" title="Увеличить">
						<img src="<?=thumb("images/hpl/" . $d[0], 320)?>" alt="<?=h($d[1])?>" width="132" height="132" loading="lazy">
					</a>
					<figcaption><?=($d[2] ? "<a href=\"" . h($d[2]) . "\" target=\"_blank\" rel=\"noopener\">" . h($d[1]) . "</a>" : h($d[1]))?></figcaption>
				</figure>
			<?php } ?>
			</div>
		<?php } else { ?>
			<div class="section-head">
				<div>
					<h2>Популярные <em>ткани</em> для обивки</h2>
					<p>Сотни наименований тканей — в <a href="/address">фирменных салонах</a>.</p>
				</div>
			</div>
			<div class="swatches">
			<?php foreach ($fabrics as $f) { ?>
				<figure class="swatch">
					<a href="<?=thumb("images/tex/" . $f[0], 1280)?>" data-lightbox="fabrics" data-caption="<?=h($f[2] . " — " . $f[1])?>" title="Увеличить">
						<img src="<?=thumb("images/tex/" . $f[0], 320)?>" alt="<?=h($f[1] . " " . $f[2])?>" width="132" height="132" loading="lazy">
					</a>
					<figcaption><?=h($f[2])?><small><?=h($f[1])?></small></figcaption>
				</figure>
			<?php } ?>
			</div>
		<?php } ?>
		<p class="note">Отображение цвета на вашем мониторе может отличаться от реального.</p>

		<div class="pnav">
			<a href="<?=h(product_url($prev, $ptype))?>"><?=icon("arrow-left")?><?=h($products[$ptype][$prev][0])?></a>
			<a href="<?=h(product_url($next, $ptype))?>"><?=h($products[$ptype][$next][0])?><?=icon("arrow")?></a>
		</div>
	</section>

	<section class="section" style="padding-top: 0">
		<div class="section-head">
			<h2>Другие <em>модели</em></h2>
			<a class="link-arrow" href="<?=list_url($ptype)?>">Весь каталог <?=icon("arrow")?></a>
		</div>
		<div class="cards">
		<?php
			for ($i = 1; $i <= 4 && $i < $count; $i++) {
				$k = $keys[($pos + $i) % $count];
				product_card($k, $products[$ptype][$k], $ptype);
			}
		?>
		</div>
	</section>
</div>

<?php
	if ($ptype == "table") {
		lead_section($product[0], "Рассчитаем стоимость стола <em>" . h($product[0]) . "</em>", "Назовите нужный размер, форму столешницы и декор — специалист фабрики перезвонит и рассчитает точную цену.");
	}
	else {
		lead_section($product[0], "Закажите <em>" . h($product[0]) . "</em> в нужной ткани", "Подскажем по ткани, цвету и сочетанию со столом. Оставьте телефон — специалист фабрики перезвонит.");
	}
	include "footer.php";
?>
