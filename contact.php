<?
	$title = "Контакты";
	$description = "Местонахождение фабрики Престол";
	include "header.php";
?>

<section id="main">
	<section class="page">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li>/</li>
			<li><b>Контакты</b></li>
		</ul>
		<h1>Контакты</h1>
		<section class="contact1">
			<p>Адрес производства: г.Киров, ул.Луганская 59в</p>
			<p>Телефон: <a href="tel:89091317732">8 (909) 131-77-32</a></p>
			<p>Email: <a href="mailto:fabrikaprestol@gmail.com" target="_blank">fabrikaprestol@gmail.com</a></p>
		</section>
	</section>
	<div style="height: 400px; margin-bottom: -40px; text-align: center;">
		<h1 style="position: absolute; width: 100%;">Схема проезда</h1>
		<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A4413ac25e1740ad9845b18913f51b05d394299e7a1cf0112f081b405ef0d82bc&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
	</div>
</section>

<?
	include "footer.php";
?>
