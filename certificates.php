<?php
	$title = "Сертификаты поставщиков кировской фабрики ПРЕСТОЛ столы и стулья";
	$description = "Сертификаты поставщиков кировской фабрики ПРЕСТОЛ столы и стулья";
	$path = "/certificates";
	include "header.php";

	$groups = array(
		"Бумажно-слоистые пластики (покрытие столешницы)" => array(
			array("Slotex.pdf", "Слотекс (Россия)"),
			array("Arpa.pdf", "Arpa (Италия)"),
			array("EGGER.pdf", "EGGER (Австрия)"),
		),
		"МДФ (столешница)" => array(
			array("MDF.pdf", "Кроностар"),
		),
		"Лакокрасочное покрытие" => array(
			array("paintwork.pdf", "Hesse (Германия)"),
		),
		"Клей" => array(
			array("glue.pdf", "Kleiberit (Германия)"),
		),
		"Ткани" => array(
			array("textile.pdf", "Сертификат на обивочные ткани"),
		),
	);
?>

<div class="container page-top">
	<?php breadcrumbs(array(array("Главная", "/"), array("Сертификаты"))); ?>

	<div class="page-head">
		<h1>Сертификаты <em>наших поставщиков</em></h1>
		<p>Для производства мебели требуется большое количество самых разнообразных материалов и комплектующих: фанера, мебельный пластик, МДФ, фурнитура, ткань и прочее. «Престол» работает со многими поставщиками как российскими, так и зарубежными. Вся закупаемая продукция либо сертифицирована, либо не нуждается в обязательной сертификации в соответствии с действующим законодательством РФ.</p>
	</div>

	<?php foreach ($groups as $group => $docs) { ?>
	<h2 style="font-size: 1.4rem; margin-top: 32px"><?=h($group)?></h2>
	<div class="docs">
		<?php foreach ($docs as $d) { ?>
		<a class="doc" href="/files/<?=h(rawurlencode($d[0]))?>" target="_blank"><?=icon("file")?><span><?=h($d[1])?><small>PDF</small></span></a>
		<?php } ?>
	</div>
	<?php } ?>
</div>

<?php
	include "footer.php";
?>
