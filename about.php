<?
	$title = "О нас";
	$description = "О компании Престол";
	include "header.php";
?>

<section id="main">
	<section class="page">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li>/</li>
			<li><b>О нас</b></li>
		</ul>
		<h1>О нас</h1>
		<div style="line-height: 1.5em; text-align: justify">
			<p>Престол - это дружный профессиональный коллектив, который производит для Вас качественные столы и стулья при помощи современного оборудования.</p>

			<p>Наша компания более 20 лет занимается изготовлением мебели. Высокое качество, новейшие технологии и материалы, контроль на каждом этапе работы превращают фабрику в одного из лидеров производства столов и стульев в регионе.</p>

			<p>Мы производим мебель по индивидуальным заказам, предлагая на выбор широкий ассортимент цветовых решений и материалов, а так же различные размеры.</p>
		</div>
		<div class="slider">
		<?
			// Извлекаем из папки слайды
			$dir = 'images/slider/';
			$cdir = scandir($dir);
			foreach ($cdir as $key => $value) {
				if (!in_array($value,array(".",".."))) {
					echo "<div><img src='".$dir.$value."'></div>";
				}
			}
		?>
		</div>
	</section>
</section>

<script>
	$(function(){
		$('.slider').bxSlider({
			mode: 'fade',
			auto: true,
			autoControls: true
		});
	});
</script>

<?
	include "footer.php";
?>
