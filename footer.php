	</main>

	<footer class="site-footer">
		<div class="container">
			<div class="footer-grid">
				<div>
					<a class="footer-logo" href="/"><img src="/images/logo.svg" alt="Мебельная фабрика «Престол»" width="67" height="56" loading="lazy"></a>
					<p>Столы и стулья для кухни и гостиной по индивидуальным заказам. Производство в Кирове.</p>
					<div class="socials">
						<a href="https://vk.com/f_prestol" target="_blank" rel="nofollow noopener" aria-label="ВКонтакте"><?=icon("vk")?></a>
						<!-- <a href="https://t.me/+eNYAT_b6x2pkYjE6" target="_blank" rel="nofollow noopener" aria-label="Telegram"><?=icon("telegram")?></a> -->
						<!-- <a href="https://max.ru/join/Z7rAFoeoJ8iugBoGB4L03Fr9PN-ZZpBEEZ16wu7QIWY" target="_blank" rel="nofollow noopener" aria-label="MAX"><img src="/MAX.svg" alt="" width="20" height="20" loading="lazy"></a> -->
					</div>
				</div>
				<div>
					<h4>Каталог</h4>
					<ul>
						<li><a href="/table">Столы</a></li>
						<li><a href="/chair">Стулья и кресла</a></li>
						<li><a href="/gallery">Галерея интерьеров</a></li>
						<li><a href="/price.pdf" target="_blank">Прайс-лист (PDF)</a></li>
					</ul>
				</div>
				<div>
					<h4>Фабрика</h4>
					<ul>
						<li><a href="/about">О фабрике</a></li>
						<li><a href="/address">Где купить</a></li>
						<li><a href="/certificates">Сертификаты</a></li>
						<!-- <li><a href="/sout">СОУТ</a></li> -->
						<li><a href="/contact">Контакты</a></li>
					</ul>
				</div>
				<div>
					<h4>Связаться</h4>
					<div class="footer-contacts">
						<a href="tel:<?=SITE_PHONE?>"><?=icon("phone")?><?=SITE_PHONE_TEXT?></a>
						<a href="mailto:<?=SITE_EMAIL?>"><?=icon("mail")?><?=SITE_EMAIL?></a>
						<span><?=SITE_ADDRESS?></span>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<span>© <?=date("Y")?> Мебельная фабрика «Престол», Киров</span>
				<a href="https://webmaster.yandex.ru/siteinfo/?site=https://fabrikaprestol.ru"><img width="88" height="31" alt="" src="https://yandex.ru/cycounter?https://fabrikaprestol.ru&amp;theme=dark&amp;lang=ru" loading="lazy"></a>
			</div>
		</div>
	</footer>

	<div class="mobile-cta">
		<a class="btn btn--light" href="tel:<?=SITE_PHONE?>" aria-label="Позвонить"><?=icon("phone")?></a>
		<a class="btn btn--accent" href="<?=h($lead_href)?>">Оставить заявку</a>
	</div>

	<!-- VK: сообщения сообщества и ретаргетинг. Загружаются после страницы, чтобы не тормозить её -->
	<div id="vk_api_transport"></div>
	<div id="vk_community_messages"></div>
	<script type="text/javascript">
		window.vkAsyncInit = function() {
			VK.init({apiId: 7216520});
			VK.Widgets.CommunityMessages("vk_community_messages", 171248798, {disableExpandChatSound: "1",tooltipButtonText: "Есть вопрос?"});
			VK.Retargeting.Init('VK-RTRG-500735-818ez');
		};

		window.addEventListener("load", function() {
			setTimeout(function() {
				var el = document.createElement("script");
				el.type = "text/javascript";
				el.src = "https://vk.com/js/api/openapi.js?162";
				el.async = true;
				document.getElementById("vk_api_transport").appendChild(el);
			}, 2500);
		});
	</script>
</body>
</html>
