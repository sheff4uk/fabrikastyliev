<?php
// Популярные декоры столешниц: файл в images/hpl/, название, ссылка на декор у производителя
$decors = array(
	array("8803440787486.jpeg", "EGGER W1000 ST38 Белый премиум", ""),
	array("8803465691166.jpeg", "EGGER W1100 ST9 Белый альпийский", ""),
	array("20470-800x800.jpg", "arcobaleno 2047 Кантри", ""),
	array("3230_S_Дуб-Сонома-светлый.jpg", "Слотекс 3230/S Дуб Сонома светлый", ""),
	array("8803449045022.jpeg", "EGGER H1180 ST37 Дуб Галифакс натуральный", ""),
	array("3847_S_zlcdu-kzwrn_A4.jpg", "Слотекс 3847/S Венге Линум", ""),
	array("8803456319518.jpeg", "EGGER U104 ST9 Алебастр белый", ""),
	array("14-01037-005_10141541_Altai_Laerche-1-800x800.jpg", "arcobaleno 2045 Лиственница", ""),
	array("2017-800x800.jpg", "arcobaleno 2017 Венге", ""),
	array("8803451207710.jpeg", "EGGER H1424 ST22 Файнлайн крем", ""),
	array("8803456450590.jpeg", "EGGER U108 ST9 Ванильный жёлтый", ""),
	array("8803456516126.jpeg", "EGGER U113 ST9 Коттон бежевый", ""),
	array("8803451338782.jpeg", "EGGER H1486 ST36 Сосна Пасадена", ""),
	array("8803448717342.jpeg", "EGGER H1145 ST10 Дуб Бардолино натуральный", ""),
	array("1111_1_Белый.jpg", "Слотекс 1111/S Белый", ""),
	array("3331_S_puft-ovldllbl_A4.jpg", "Слотекс 3331/S Клен Ванкувер", ""),
	array("8803457237022.jpeg", "EGGER U222 ST9 Крем бежевый", ""),
	array("8803448324126.jpeg", "EGGER H1113 ST10 Дуб Канзас коричневый", ""),
	array("8803448520734.jpeg", "EGGER H1122 ST22 Древесина белая", ""),
	array("3830_C_Пино.jpg", "Слотекс 3830/C Пино", ""),
	array("0028_lu_vg.jpg", "Arpa 0028 fin. lucida", ""),
	array("8803454943262.jpeg", "EGGER H3395 ST12 Дуб Корбридж натуральный", ""),
	array("0008_C_zjp-uikrp_A4.jpg", "Слотекс 0008/C Дуб-белый", ""),
	array("8803455467550.jpeg", "EGGER H3433 ST22 Сосна Аланд полярная", ""),
);

// Популярные обивочные ткани: файл в images/tex/, тип ткани, название
$fabrics = array(
	array("Suffle latte.jpg", "Микровелюр", "Suffle latte"),
	array("Vatican cream.jpg", "Жаккард", "Vatican cream"),
	array("Teddy 305.jpg", "Велюр", "Teddy 305"),
	array("Levays 12.jpg", "Микровелюр", "Левайс 12"),
	array("Lambre 01.jpg", "Микровелюр", "Lambre 01"),
	array("Tenerife beige.jpg", "Микровелюр", "Tenerife beige"),
	array("Cosmo moonlight.jpg", "Микровелюр", "Cosmo moonlight"),
	array("Nebby 305.jpg", "Велюр", "Nebby 305"),
	array("Lambre 04.jpg", "Микровелюр", "Lambre 04"),
	array("Nebby 014.jpg", "Велюр", "Nebby 014"),
	array("Nebby 211.jpg", "Велюр", "Nebby 211"),
	array("Nebby 019.jpg", "Велюр", "Nebby 019"),
	array("Nebby 245.jpg", "Велюр", "Nebby 245"),
	array("Nebby 915.jpg", "Велюр", "Nebby 915"),
	array("Nebby 304.jpg", "Велюр", "Nebby 304"),
	array("Nebby 231.jpg", "Велюр", "Nebby 231"),
	array("Lambre 15.jpg", "Микровелюр", "Lambre 15"),
	array("Lambre 16.jpg", "Микровелюр", "Lambre 16"),
	array("Florida latte.jpg", "Жаккард", "Florida latte"),
	array("Estetica mineral shell.jpg", "Шенилл", "Estetica mineral shell"),
	array("Сlever Romb brown.jpg", "Микровелюр", "Сlever Romb brown"),
	array("FLY col 20.jpg", "Микровелюр", "FLY col 20"),
	array("Triumf chocolate.jpg", "Искусственная замша", "Triumf chocolate"),
	array("Nebby 235.jpg", "Велюр", "Nebby 235"),
	array("Palermo 223 mouse.jpg", "Шенилл", "Palermo 223 mouse"),
	array("Suffle mocco.jpg", "Микровелюр", "Suffle mocco"),
	array("Nebby 221.jpg", "Велюр", "Nebby 221"),
	array("Teddy 007.jpg", "Велюр", "Teddy 007"),
	array("Elefante 11.jpg", "Флок", "Elefante 11"),
	array("VINUELA 2 beige.jpg", "Шенилл", "VINUELA 2 beige"),
	array("FLY col 03.jpg", "Микровелюр", "FLY col 03"),
	array("Vatican chocolate.jpg", "Жаккард", "Vatican chocolate"),
);

// Фирменные салоны: город => список (название, адрес, телефон, id организации в Яндекс.Картах, якорь на странице)
$shops = array(
	"Киров" => array(
		array("ТЦ «Мегадом», корпус В", "ул. Блюхера, 39", "+79195241680", "52328135488", "megadom"),
	),
	"Екатеринбург" => array(
		array("ТЦ «Клён»", "ул. П. Лумумбы, 38", "+79506329090", "45085603722", "klen"),
		array("ТЦ «Гулливер А»", "ул. 40 лет ВЛКСМ, 38Л", "+79002051927", "41645296744", "gullivera"),
		array("ТЦ «Гулливер Б»", "ул. 40 лет ВЛКСМ, 38Н", "+79000310108", "190443346780", "gulliverb"),
		array("ТЦ «ЭМА»", "Верх-Исетский бульвар, 13", "+79028792799", "224603920261", "ema"),
	),
	"Нижний Новгород" => array(
		array("ТЦ «Открытый Материк»", "ул. Ларина, 7", "+79990761755", "111126599301", "materik"),
		array("ТЦ «Мебельный базар»", "ул. Гордеевская, 7А", "+79697621587", "1169209411", "bazar"),
		array("ТЦ «БУМ»", "ул. Бекетова, 13к", "+79990760946", "187931418140", "bum"),
	),
);

// Представители фабрики
$representatives = array(
	array("Производство (Киров)", "+79091317732", "", "", ""),
	array("Представитель в Екатеринбурге", "+79089113195", "", "", ""),
	array("Представитель в Нижнем Новгороде", "+79601620881", "https://vk.ru/id14124754", "https://t.me/+eNYAT_b6x2pkYjE6", "https://max.ru/join/Z7rAFoeoJ8iugBoGB4L03Fr9PN-ZZpBEEZ16wu7QIWY"),
);

// Интерьеры для галереи: файл в images/interiors/, подпись, модели из data.php
$interiors = array(
	array("teo-zero.jpg", "Стол Тео и стулья Зеро", array("teo", "zero")),
	array("ivan-oskar.jpg", "Стол Иван и кресла Оскар", array("ivan", "oskar")),
	array("camelot-mishel.jpg", "Стол Камелот и стулья Мишель", array("camelot", "mishel")),
	array("deni-bingo.jpg", "Стол Дени и стулья Бинго 2", array("deni", "bingo")),
	array("max-shevalie.jpg", "Стол Макс и стулья Шевалье", array("max", "shevalie")),
	array("pekin-persey.jpg", "Стол Пекин и кресла Персей", array("pekin", "persey")),
	array("johny-bingo.jpg", "Стол Джонни и стулья Бинго 2", array("johny", "bingo")),
	array("ivan-v-shevalie.jpg", "Стол Иван-В и стулья Шевалье", array("ivan-v", "shevalie")),
	array("johny-valli.jpg", "Стол Джонни и стулья Валли", array("johny", "valli")),
	array("persey.jpg", "Кресла Персей", array("persey")),
	array("zero.jpg", "Стул Зеро", array("zero")),
	array("oskar.jpg", "Кресла Оскар", array("oskar")),
);
