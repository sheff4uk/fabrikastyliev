<?php
	include "data.php";
	require_once "functions.php";

	$t = isset($_GET["type"]) && is_string($_GET["type"]) ? $_GET["type"] : "";
	if (!isset($type[$t])) {
		not_found();
	}

	$type_name = $type[$t][0];
	$heading = $type[$t][2];
	$title = $type[$t][2];
	$description = $type[$t][3];
	$path = list_url($t);
	$path_drop = array("type");
	$has_lead = true;
	include "header.php";

	if ($t == "table") {
		$filters = array("all" => "Все", "razdv" => "Раздвижные", "nerazdv" => "Нераздвижные", "round" => "Круглые", "coffee" => "Журнальные", "new" => "Новинки");
		$intro = "Изготавливаем столы по индивидуальным размерам и в нужном цвете. В каталоге — цены стандартных размеров; точную стоимость рассчитаем с учётом размера, формы столешницы и механизма раздвижки.";
	}
	else {
		$filters = array("all" => "Все", "bar" => "Барные", "swivel" => "Поворотные", "new" => "Новинки");
		$intro = "Ткань обивки и цвет изделия — на выбор, под заказ. Сотни тканей и образцы покраски — в наших фирменных салонах.";
	}
?>

<div class="container page-top">
	<?php breadcrumbs(array(array("Главная", "/"), array($type_name))); ?>

	<div class="page-head">
		<h1><?=h($heading)?></h1>
		<p><?=h($intro)?></p>
	</div>

	<div class="toolbar">
		<div class="chips" role="group" aria-label="Фильтр">
		<?php foreach ($filters as $f => $label) { ?>
			<button class="chip<?=($f == "all" ? " is-active" : "")?>" type="button" data-filter="<?=$f?>" aria-pressed="<?=($f == "all" ? "true" : "false")?>"><?=$label?></button>
		<?php } ?>
		</div>
		<label>
			<span class="visually-hidden">Сортировка</span>
			<select class="select" data-sort>
				<option value="">По популярности</option>
				<option value="asc">Сначала дешевле</option>
				<option value="desc">Сначала дороже</option>
			</select>
		</label>
	</div>

	<div class="cards" data-catalog>
	<?php
		foreach ($products[$t] as $k => $v) {
			product_card($k, $v, $t);
		}
	?>
	</div>
	<p class="empty">В этой категории пока нет моделей.</p>
</div>

<?php
	if ($t == "table") {
		lead_section();
	}
	else {
		lead_section("", "Поможем <em>подобрать</em> стулья", "Подскажем по ткани, цвету и сочетанию со столом. Оставьте телефон — специалист фабрики перезвонит.");
	}
	include "footer.php";
?>
