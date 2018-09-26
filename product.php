<?
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

	$title = $product[0];
	$description = $type_n." ".$product[0];
	include "header.php";

	$a = array_keys($products[$type]);
	$count = count($products[$type]);
	$pos = array_search ($name,$a);
	$prev = ($pos == 0) ? ($count - 1) : ($pos - 1);
	$next = ($pos == $count - 1) ? 0 : ($pos + 1);
?>

<section id="main">
	<section class="page">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li>/</li>
			<li><a href="/prodlist.php?type=<?=$type?>"><?=$type_name?></a></li>
			<li>/</li>
			<li><b><?=$product[0]?></b></li>
		</ul>
		<div>
			<section id="prod_description">
				<h2><?=$product[0]?></h2>
				<p><?=$product[1]?></p>
				<p><?=$product[2]?></p>
				<h2>Цена: <span class="price"><?=$product[3]?></span> руб </h2>
				<p>Где купить:<a href="address.php"> адреса магазинов. </a></p>
				<?
					if ($type == "table") {
						echo "<p>Под заказ индивидуальный размер и цвет стола по каталогам пластиков <a href='http://www.plastics-foils.ru/products/18/' target='_blank'>LeMark</a>, <a href='http://www.slotex.ru/products/decor/collection/index.php?ID=9' target='_blank'>Slotex</a>";
					}
					if ($type == "chair") {
						echo "<p>Под заказ на выбор ткань и цвет стула по каталогам пластиков  <a href='http://www.plastics-foils.ru/products/18/' target='_blank'>LeMark</a>, <a href='http://www.slotex.ru/products/decor/collection/index.php?ID=9' target='_blank'>Slotex</a>";
					}
				?>
				<p><a href="/price.pdf" target="_blank">Скачать подробный прайс</a></p>
			</section>

			<section id="prod_photo">
				<img src='images/prodlist/<?=$name?>.png'>
			</section>
		</div>

		<div id="mech">
			<img src="images/sigma.png">
		</div>
	</section>

	<a href="product.php?name=<?=$a[$prev]?>" id="prev" title="Предыдущий <?=$type_n?>">
		<i class="fas fa-chevron-circle-left fa-3x"></i>
	</a>
	<a href="product.php?name=<?=$a[$next]?>" id="next" title="Следующий <?=$type_n?>">
		<i class="fas fa-chevron-circle-right fa-3x"></i>
	</a>
</section>

<?
	include "footer.php";
?>


<script>
	$(function() {
		$("#mech").html('<img src="images/'+$(".mech").text()+'.png">');

		$(".mech").hover(
			function() {
				$("#mech").show('fast');
			},
			function() {
				$("#mech").hide('fast');
			}
		);
	});
</script>
