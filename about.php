<?
	$title = "О нас";
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

			<p>Наша компания работает более 20 лет на рынке изготовления мебели и успешно растет в этом направлении. Высокое качество, новейшие технологии и материалы, контроль качества на каждом этапе работы превращает фабрику в одного из лидеров производства столов и стульев в регионе.</p>

			<p>Мы производим мебель по индивидуальным заказам, предлагая на выбор широкий ассортимент цветовых решений и различные размеры.</p>
		</div>
		<div class="slider">
			<div><img src="images/slider/slide1.jpg" ></div>
			<div><img src="images/slider/slide2.jpg" ></div>
			<div><img src="images/slider/slide3.jpg" ></div>
			<div><img src="images/slider/slide4.jpg" ></div>
			<div><img src="images/slider/slide5.jpg" ></div>
			<div><img src="images/slider/slide6.jpg" ></div>
			<div><img src="images/slider/slide7.jpg" ></div>
			<div><img src="images/slider/slide8.jpg" ></div>
			<div><img src="images/slider/slide9.jpg" ></div>
			<div><img src="images/slider/slide10.jpg" ></div>
			<div><img src="images/slider/slide11.jpg" ></div>
			<div><img src="images/slider/slide12.jpg" ></div>
			<div><img src="images/slider/slide13.jpg" ></div>
			<div><img src="images/slider/slide14.jpg" ></div>
			<div><img src="images/slider/slide15.jpg" ></div>
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
