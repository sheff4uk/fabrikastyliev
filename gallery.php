<?php
	include "data.php";
	include "catalog.php";
	$title = "Галерея: столы и стулья ПРЕСТОЛ в интерьере";
	$description = "Фотографии столов и стульев кировской фабрики Престол в интерьерах: сочетания моделей, работы для покупателей.";
	$path = "/gallery";
	include "header.php";

	// Остальные фото: все файлы из images/gallery/
	$dir = "images/gallery/";
	$gallery = array_values(preg_grep('~\.(jpe?g|png|webp)$~i', scandir(__DIR__ . "/" . $dir)));
?>

<div class="container page-top">
	<?php breadcrumbs(array(array("Главная", "/"), array("Галерея"))); ?>

	<div class="page-head">
		<h1>Наша мебель <em>в интерьере</em></h1>
		<p>Сочетания столов и стульев «Престол». Нажмите на фото, чтобы увеличить, или на название модели, чтобы открыть её в каталоге.</p>
	</div>

	<div class="masonry">
	<?php foreach ($interiors as $it) {
		$src = "images/interiors/" . $it[0];
		$size = @getimagesize(__DIR__ . "/" . $src);
	?>
		<figure class="shot">
			<a href="<?=thumb($src, 1280)?>" data-lightbox="gallery" data-caption="<?=h($it[1])?>">
				<img src="<?=thumb($src, 640)?>" alt="<?=h($it[1])?>"<?=($size ? " width=\"{$size[0]}\" height=\"{$size[1]}\"" : "")?> loading="lazy" decoding="async">
			</a>
			<figcaption>
				<b><?=h($it[1])?></b>
				<?php
					$names = array();
					foreach ($it[2] as $k) {
						$p = product_find($k);
						if ($p) $names[] = "<a href=\"" . h(product_url($k, $p[0])) . "\">" . h(($p[0] == "table" ? "стол " : "") . $p[1][0]) . "</a>";
					}
					echo implode(" · ", $names);
				?>
			</figcaption>
		</figure>
	<?php } ?>
	</div>

	<?php if ($gallery) { ?>
	<section class="section">
		<div class="section-head">
			<div>
				<h2>Работы <em>фабрики</em></h2>
				<p>Мебель у покупателей и в салонах.</p>
			</div>
		</div>
		<div class="masonry">
		<?php foreach ($gallery as $f) {
			$src = $dir . $f;
			$size = @getimagesize(__DIR__ . "/" . $src);
		?>
			<figure class="shot">
				<a href="<?=thumb($src, 1280)?>" data-lightbox="works" data-caption="Мебельная фабрика «Престол»">
					<img src="<?=thumb($src, 640)?>" alt="Мебельная фабрика ПРЕСТОЛ (Киров)"<?=($size ? " width=\"{$size[0]}\" height=\"{$size[1]}\"" : "")?> loading="lazy" decoding="async">
				</a>
			</figure>
		<?php } ?>
		</div>
	</section>
	<?php } ?>
</div>

<?php
	lead_section("", "Понравилось <em>сочетание?</em>", "Изготовим такой же комплект в нужном размере, декоре и ткани. Оставьте телефон — специалист фабрики перезвонит.");
	include "footer.php";
?>
