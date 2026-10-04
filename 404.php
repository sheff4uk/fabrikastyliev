<?php
	include "data.php";
	require_once __DIR__ . "/functions.php";
	$title = "Страница не найдена — ПРЕСТОЛ столы и стулья";
	$description = "Торговый каталог Мебельной фабрики Престол. Столы и стулья для кухни по индивидуальным заказам.";
	if (!headers_sent()) {
		http_response_code(404);
	}
	include __DIR__ . "/header.php";
?>

<div class="container notfound">
	<b>404</b>
	<h1>Страница не найдена</h1>
	<p class="muted">Возможно, модель снята с производства или адрес набран с ошибкой.</p>
	<div class="hero__actions" style="justify-content: center">
		<a class="btn" href="/">На главную</a>
		<a class="btn btn--ghost" href="/table">Каталог столов</a>
		<a class="btn btn--ghost" href="/chair">Стулья и кресла</a>
	</div>
</div>

<?php
	include __DIR__ . "/footer.php";
?>
