<footer>
	<div class="page">
		<section class="footer-section-navigation">
			<img src="images/logo_gray.png" alt="Мебельная фабрика ПРЕСТОЛ">
<!--			<span class="copyright">2011-<?=( date("Y") )?> &copy; ООО "Престол"</span>-->
			<span class="address copyright">610044, г. Киров, ул. Луганская 59</span>
<!--			<a href="tel:89091317732" class="footer_phone">8 (909) 131-77-32</a>-->
		</section>
		<section class="footer-section-navigation">
			<nav class="footer_menu">
				<ul>
					<li><a href="prodlist.php?type=table">СТОЛЫ</a></li>
					<li><a href="prodlist.php?type=chair">СТУЛЬЯ</a></li>
					<li><a href="address.php">ГДЕ КУПИТЬ</a></li>
					<li><a href="contact.php">КОНТАКТЫ</a></li>
					<li><a href="about.php">О НАС</a></li>
					<li><a href="gallery.php">ГАЛЕРЕЯ</a></li>
					<li><a href="certificates.php">СЕРТИФИКАТЫ</a></li>
					<li><a href="sout.php">СОУТ</a></li>
				</ul>
			</nav>
		</section>
		<section class="footer-section-navigation social">
			<p>Присоединяйтесь к нам в соц. сетях</p>
			<ul>
				<li>
					<a class="vk social_icon" href="https://vk.com/f_prestol" target="_blank" rel="nofollow noopener">
						<i class="fab fa-vk"></i>
					</a>
				</li>
			</ul>
			<br>
			<br>
			<a href="https://webmaster.yandex.ru/siteinfo/?site=https://fabrikaprestol.ru"><img width="88" height="31" alt="" border="0" src="https://yandex.ru/cycounter?https://fabrikaprestol.ru&theme=light&lang=ru"/></a>
		</section>
	</div>
</footer>

<!-- VK Widget -->
<div id="vk_community_messages"></div>

<?php
if( $_SESSION["alert"] ) {
	?>
	<script>
		$(document).ready(function() {
			ym(50341759,'reachGoal','FEEDBACK');
			alert('<?=$_SESSION["alert"]?>');
		});
	</script>

	<?php
	unset($_SESSION["alert"]);
}
?>

</body>
</html>
