<?
	$title = "Галерея";
	$description = "Наши работы";
	include "header.php";
?>

<section id="main">
	<section class="page">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><i class="fas fa-long-arrow-alt-left"></i></li>
			<li><b>Галерея</b></li>
		</ul>
		<h1>Галерея</h1>
		<div class="slider" style="max-width: 600px; margin: auto;">
			<ul class="bxslider">
			<?
				// Извлекаем из папки слайды
				$dir = 'images/gallery/';
				$cdir = scandir($dir);
				foreach ($cdir as $key => $value) {
					if (!in_array($value,array(".",".."))) {
						echo "<li><img alt='Мебельная фабрика СТОЛЬНИК (Киров)' src='".$dir.$value."'></li>";
					}
				}
			?>
			</ul>
		</div>
	</section>
</section>

<script>
	$(function(){
		$('.bxslider').bxSlider({
			nextText: '',
			prevText: '',
			auto: true,
			stopAutoOnClick: true,
		});
	});
</script>

<?
	include "footer.php";
?>
