<?php
	include "catalog.php";
	$title = "Контакты кировской фабрики ПРЕСТОЛ столы и стулья";
	$description = "Адрес кировской фабрики ПРЕСТОЛ столы и стулья";
	$path = "/contact";
	include "header.php";
?>

<div class="container page-top">
	<?php breadcrumbs(array(array("Главная", "/"), array("Контакты"))); ?>

	<div class="page-head">
		<h1>Контакты</h1>
		<p>Позвоните на производство или представителю в вашем городе. Адреса салонов — на странице <a href="/address">«Где купить»</a>.</p>
	</div>

	<div class="contact-grid">
		<div class="contact-card">
			<dl>
				<div>
					<dt>Адрес производства</dt>
					<dd>г. Киров, ул. Луганская, 59</dd>
				</div>
				<?php foreach ($representatives as $r) { ?>
				<div>
					<dt><?=h($r[0])?></dt>
					<dd>
						<a href="tel:<?=$r[1]?>"><?=phone_text($r[1])?></a>
						<?php if ($r[2]) { ?><a class="messenger" href="<?=h($r[2])?>" target="_blank" rel="nofollow noopener" aria-label="ВКонтакте"><?=icon("vk")?></a><?php } ?>
						<!-- <?php if ($r[3]) { ?><a class="messenger" href="<?=h($r[3])?>" target="_blank" rel="nofollow noopener" aria-label="Telegram"><?=icon("telegram")?></a><?php } ?> -->
						<?php if ($r[4]) { ?><a class="messenger" href="<?=h($r[4])?>" target="_blank" rel="nofollow noopener" aria-label="MAX"><img src="/MAX.svg" alt="" width="20" height="20"></a><?php } ?>
					</dd>
				</div>
				<?php } ?>
				<div>
					<dt>Email</dt>
					<dd><a href="mailto:<?=SITE_EMAIL?>"><?=SITE_EMAIL?></a></dd>
				</div>
			</dl>
		</div>
		<div class="map-frame">
			<iframe src="https://yandex.ru/map-widget/v1/?z=12&amp;ol=biz&amp;oid=157680774230" title="Фабрика «Престол» на Яндекс.Картах" loading="lazy"></iframe>
		</div>
	</div>
</div>

<?php
	include "footer.php";
?>
