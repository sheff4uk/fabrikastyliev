<?
	$title = "Где купить - адреса магазинов ПРЕСТОЛ столы и стулья";
	$description = "Адреса фирменных магазинов ПРЕСТОЛ столы и стулья";
	include "header.php";
?>

<section id="main">
	<section class="page">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><i class="fas fa-long-arrow-alt-left"></i></li>
			<li><b>Где купить</b></li>
		</ul>

<!--
		<div style="background: lightgoldenrodyellow; border-radius: 20px; padding: 10px;">
			<h3 style="color: #911; text-align: center;">Уважаемые покупатели!</h3>
			<h3 style="line-height: 2em;">В связи со сложившейся ситуацией, вызванной коронавирусом, временно закрыты некоторые наши фирменные салоны. Но мы продолжаем работать для вас. Будем рады принять заказ на изготовление столов и стульев. Просто оставьте свой номер через форму <a href="/feedback.php?location=<?=$_SERVER['REQUEST_URI']?>" style="background: #fd8134; color: #fff; text-decoration: none; padding: 5px 10px; border-radius: 10px; white-space: nowrap;">Заказать звонок</a> и продавец-консультант перезвонит вам.</h3>
		</div>
-->
	</section>

	<section>
		<div style="line-height: 1.5em; text-align: center">
			<h1>Где купить:</h1>
			<h4>
				Нижний Новгород
				<a class="vk social_icon" href="https://vk.com/id14124754" target="_blank" rel="nofollow noopener">
					<i class="fab fa-vk"></i>
				</a>
			</h4>
			<ul>
				<li class="shop" id="materik">
					ТЦ "Открытый Материк" - ул. Ларина, 7 <a href="tel:+79990761755">+7 999 076 17 55</a> <a href="#materik" class="map_btn" title="Посмотреть на карте"><i class="fas fa-map-marked-alt"></i> Карта</a>
					<div class="map">
						<div style="height: 400px;"><iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=111126599301" width="100%" height="400" frameborder="0"></iframe></div>
					</div>
				</li>
				<li class="shop" id="bazar">
					ТЦ «Мебельный базар» - ул. Гордеевская, 7 <a href="tel:+79697621587">+7 969 762 15 87</a> <a href="#bazar" class="map_btn" title="Посмотреть на карте"><i class="fas fa-map-marked-alt"></i> Карта</a>
					<div class="map">
						<div style="height: 400px;"><iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=1169209411" width="100%" height="400" frameborder="0"></iframe></div>
					</div>
				</li>
				<li class="shop" id="bum">
					ТЦ «БУМ» - ул. Бекетова, 13к <a href="tel:+79990760946">+7 999 076 09 46</a> <a href="#bum" class="map_btn" title="Посмотреть на карте"><i class="fas fa-map-marked-alt"></i> Карта</a>
					<div class="map">
						<div style="height: 400px;"><iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=187931418140" width="100%" height="400" frameborder="0"></iframe></div>
					</div>
				</li>
			</ul>
			<h4>Сыктывкар</h4>
			<ul>
				<li class="shop" id="gigamart">
					ТЦ «ГигаМарт» - ул. Чкалова, 38 <a href="tel:+79042213055">+7 904 221 30 55</a> <a href="#gigamart" class="map_btn" title="Посмотреть на карте"><i class="fas fa-map-marked-alt"></i> Карта</a>
					<div class="map">
						<div style="height: 400px;"><iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=1223313421" width="100%" height="400" frameborder="0"></iframe></div>
					</div>
				</li>
			</ul>
		</div>
	</section>
</section>

<script>
	$(function(){
		$("a.map_btn").on("click", function(e){
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top - 70
			}, 500);
			e.preventDefault();
			return false;
		});
	});
</script>

<?
	include "footer.php";
?>
