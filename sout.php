<?php
	$title = "Сводные данные о результатах проведения специальной оценки условий труда";
	$description = "Сводные данные о результатах проведения специальной оценки условий труда";
	$path = "/sout";
	include "header.php";
?>

<div class="container page-top">
	<?php breadcrumbs(array(array("Главная", "/"), array("СОУТ"))); ?>

	<div class="page-head">
		<h1>Специальная оценка <em>условий труда</em></h1>
		<p>Сводные данные о результатах проведения специальной оценки условий труда.</p>
	</div>

	<div class="docs">
		<a class="doc" href="<?=img_url("files/Сводная ведомость результатов проверки специальной оценки условий труда.pdf")?>" target="_blank"><?=icon("file")?><span>Сводная ведомость результатов проверки специальной оценки условий труда<small>PDF</small></span></a>
		<a class="doc" href="<?=img_url("files/Перечень рекомендуемых мероприятий по улучшению условий труда.pdf")?>" target="_blank"><?=icon("file")?><span>Перечень рекомендуемых мероприятий по улучшению условий труда<small>PDF</small></span></a>
	</div>
</div>

<?php
	include "footer.php";
?>
