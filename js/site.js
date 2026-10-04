// Престол — скрипты сайта (без зависимостей)
(function () {
	"use strict";

	var header = document.querySelector(".site-header");

	// Тень у шапки при прокрутке
	if (header) {
		var onScroll = function () { header.classList.toggle("is-scrolled", window.scrollY > 8); };
		onScroll();
		window.addEventListener("scroll", onScroll, { passive: true });
	}

	// Мобильное меню
	var burger = document.querySelector(".burger");
	if (burger && header) {
		burger.addEventListener("click", function () {
			var open = header.classList.toggle("is-open");
			burger.setAttribute("aria-expanded", open ? "true" : "false");
		});
	}

	// Маска телефона: +7 (999) 999 99 99
	document.querySelectorAll("[data-phone]").forEach(function (input) {
		input.addEventListener("input", function (e) {
			// При удалении не форматируем, иначе нельзя стереть скобку или пробел
			if (e.inputType && e.inputType.indexOf("delete") === 0) return;
			var d = input.value.replace(/\D/g, "");
			if (d[0] === "8" || d[0] === "7") d = d.slice(1);
			d = d.slice(0, 10);
			var out = "+7";
			if (d.length) out += " (" + d.slice(0, 3);
			if (d.length >= 3) out += ")";
			if (d.length > 3) out += " " + d.slice(3, 6);
			if (d.length > 6) out += " " + d.slice(6, 8);
			if (d.length > 8) out += " " + d.slice(8, 10);
			input.value = out;
		});
	});

	// reCAPTCHA подгружается при первом обращении к форме, чтобы не тормозить загрузку страницы
	var forms = document.querySelectorAll(".lead-form");
	var captchaLoaded = false;
	function loadCaptcha() {
		if (captchaLoaded) return;
		captchaLoaded = true;
		var s = document.createElement("script");
		s.src = "https://www.google.com/recaptcha/api.js";
		s.async = true;
		document.head.appendChild(s);
	}
	if (forms.length && "IntersectionObserver" in window) {
		var io = new IntersectionObserver(function (entries) {
			if (entries.some(function (en) { return en.isIntersecting; })) {
				loadCaptcha();
				io.disconnect();
			}
		}, { rootMargin: "300px" });
		forms.forEach(function (form) { io.observe(form); });
	}
	forms.forEach(function (form) {
		form.addEventListener("focusin", loadCaptcha);
		form.addEventListener("pointerenter", loadCaptcha);
		form.addEventListener("submit", function (e) {
			var widget = form.querySelector(".g-recaptcha");
			var idx = Array.prototype.indexOf.call(document.querySelectorAll(".g-recaptcha"), widget);
			if (!window.grecaptcha || !grecaptcha.getResponse(idx)) {
				e.preventDefault();
				loadCaptcha();
				var err = form.querySelector(".form-error");
				if (!err) {
					err = document.createElement("p");
					err.className = "form-error";
					form.insertBefore(err, widget);
				}
				err.textContent = "Подтвердите, что вы не робот: отметьте галочку «Я не робот».";
			}
		});
	});

	// Фильтры и сортировка каталога
	var catalog = document.querySelector("[data-catalog]");
	if (catalog) {
		var cards = Array.prototype.slice.call(catalog.querySelectorAll(".card"));
		var chips = document.querySelectorAll("[data-filter]");
		var sort = document.querySelector("[data-sort]");
		var empty = document.querySelector(".empty");
		var apply = function () {
			var active = document.querySelector("[data-filter].is-active");
			var f = active ? active.getAttribute("data-filter") : "all";
			var shown = 0;
			cards.forEach(function (c) {
				var ok = f === "all" || (" " + c.getAttribute("data-tags") + " ").indexOf(" " + f + " ") > -1;
				c.hidden = !ok;
				if (ok) shown++;
			});
			if (empty) empty.style.display = shown ? "none" : "block";
		};
		chips.forEach(function (chip) {
			chip.addEventListener("click", function () {
				chips.forEach(function (c) { c.classList.remove("is-active"); c.setAttribute("aria-pressed", "false"); });
				chip.classList.add("is-active");
				chip.setAttribute("aria-pressed", "true");
				apply();
			});
		});
		if (sort) {
			sort.addEventListener("change", function () {
				var v = sort.value;
				var sorted = cards.slice().sort(function (a, b) {
					if (v === "asc") return a.dataset.price - b.dataset.price;
					if (v === "desc") return b.dataset.price - a.dataset.price;
					return cards.indexOf(a) - cards.indexOf(b);
				});
				sorted.forEach(function (c) { catalog.appendChild(c); });
			});
		}
	}

	// Фото модели: переключение миниатюр
	var main = document.querySelector(".pgallery__main");
	if (main) {
		var mainImg = main.querySelector("img");
		document.querySelectorAll(".pgallery__thumbs button").forEach(function (btn) {
			btn.addEventListener("click", function () {
				mainImg.src = btn.getAttribute("data-src");
				main.href = btn.getAttribute("data-full");
				main.setAttribute("data-index", btn.getAttribute("data-index"));
				document.querySelectorAll(".pgallery__thumbs button").forEach(function (b) { b.setAttribute("aria-current", "false"); });
				btn.setAttribute("aria-current", "true");
			});
		});
	}

	// Просмотр фото во весь экран: ссылки [data-lightbox="группа"]
	var links = document.querySelectorAll("[data-lightbox]");
	if (links.length && window.HTMLDialogElement) {
		var dlg = document.createElement("dialog");
		dlg.className = "lightbox";
		var chev = function (path) {
			return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="' + path + '"/></svg>';
		};
		dlg.innerHTML = '<img alt="" draggable="false"><p class="lightbox__caption"></p>' +
			'<button class="lightbox__close" type="button" aria-label="Закрыть">' + chev("M6 6l12 12M18 6L6 18") + '</button>' +
			'<button class="lightbox__prev" type="button" aria-label="Предыдущее фото">' + chev("M15 4 7 12l8 8") + '</button>' +
			'<button class="lightbox__next" type="button" aria-label="Следующее фото">' + chev("M9 4l8 8-8 8") + '</button>';
		document.body.appendChild(dlg);
		var img = dlg.querySelector("img"), cap = dlg.querySelector(".lightbox__caption");
		var group = [], pos = 0;
		var show = function (i) {
			pos = (i + group.length) % group.length;
			img.src = group[pos].href;
			img.alt = cap.textContent = group[pos].caption;
			dlg.querySelector(".lightbox__prev").hidden = dlg.querySelector(".lightbox__next").hidden = group.length < 2;
		};
		// Набор фото: на странице модели — все миниатюры, иначе ссылки той же группы
		var collect = function (a) {
			var caption = a.getAttribute("data-caption") || "";
			if (a.classList.contains("pgallery__main")) {
				var thumbs = document.querySelectorAll(".pgallery__thumbs button");
				if (!thumbs.length) return [{ href: a.href, caption: caption }];
				return Array.prototype.map.call(thumbs, function (b) { return { href: b.getAttribute("data-full"), caption: caption }; });
			}
			var name = a.getAttribute("data-lightbox");
			return Array.prototype.filter.call(links, function (x) { return x.getAttribute("data-lightbox") === name; })
				.map(function (x) { return { href: x.href, caption: x.getAttribute("data-caption") || "", el: x }; });
		};
		links.forEach(function (a) {
			a.addEventListener("click", function (e) {
				e.preventDefault();
				group = collect(a);
				var start = 0;
				if (a.classList.contains("pgallery__main")) start = +a.getAttribute("data-index") || 0;
				else group.forEach(function (g, i) { if (g.el === a) start = i; });
				show(start);
				dlg.showModal();
			});
		});
		dlg.querySelector(".lightbox__close").addEventListener("click", function () { dlg.close(); });
		dlg.querySelector(".lightbox__prev").addEventListener("click", function () { show(pos - 1); });
		dlg.querySelector(".lightbox__next").addEventListener("click", function () { show(pos + 1); });
		dlg.addEventListener("click", function (e) { if (e.target === dlg && !swiped) dlg.close(); });
		dlg.addEventListener("keydown", function (e) {
			if (e.key === "ArrowLeft") show(pos - 1);
			if (e.key === "ArrowRight") show(pos + 1);
		});

		// Свайп по фото: по горизонтали — листание, по вертикали не трогаем
		var startX = 0, startY = 0, tracking = false, swiped = false;
		dlg.addEventListener("pointerdown", function (e) {
			swiped = false;
			if (e.pointerType === "mouse" || e.target.closest("button") || group.length < 2) return;
			tracking = true;
			startX = e.clientX;
			startY = e.clientY;
		});
		dlg.addEventListener("pointerup", function (e) {
			if (!tracking) return;
			tracking = false;
			var dx = e.clientX - startX, dy = e.clientY - startY;
			if (Math.abs(dx) < 40 || Math.abs(dx) < Math.abs(dy)) return;
			swiped = true;
			show(pos + (dx < 0 ? 1 : -1));
		});
		dlg.addEventListener("pointercancel", function () { tracking = false; });
	}

	// Уведомление
	var toast = document.querySelector(".toast");
	if (toast) {
		toast.querySelector("button").addEventListener("click", function () { toast.remove(); });
		setTimeout(function () { if (toast.isConnected) toast.remove(); }, 8000);
	}
})();
