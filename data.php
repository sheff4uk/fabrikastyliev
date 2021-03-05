<?

$type = array(
	"table" => array("Столы", "стол", "Столы для кухни от кировской фабрики ПРЕСТОЛ", "Каталог столов для кухни от производителя Престол"),
	"chair" => array("Стулья", "стул", "Стулья и кресла от кировской фабрики ПРЕСТОЛ", "Каталог стульев и кресел от производителя Престол")
);

$products = array(
	"table" => array(
		"charli-s" => array("Чарли-С", "от 80х60 до 150х100 см", "клен ванкувер", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 14500, 2 => 22000, 3 => 31500)),
		"alex" => array("Алекс", "от 110х70 до 150х100 см", "венге", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 20000, 2 => 26500)),
		"avatar" => array("Аватар", "от 110х70 до 170х100 см", "венге", "шпон+МДФ", array(1 => 16500, 2 => 23000, 3 => 29500)),
		"johny" => array("Джонни", "от 100х70 до 150х100 см", "беленый дуб", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 14500, 2 => 22000, 3 => 29500)),
		"niko" => array("Нико", "от 110х70 до 170х100 см", "венге", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 20500, 2 => 27500, 3 => 34000)),
		"niko-v" => array("Нико-В", "от 110х70 до 170х100 см", "белый", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 23500, 2 => 30500, 3 => 37000)),
		"charli-m" => array("Чарли-М", "от 80х60 до 150х100 см", "белый", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 14500, 2 =>22000, 3 => 31500)),
		"ivan" => array("Иван", "от Ø107 до Ø120 см", "венге", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 21000, 2 => 27500, 3 => 36000)),
		"ivan-d" => array("Иван-Д", "от Ø107 до Ø120 см", "венге", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 21000, 2 => 27500, 3 => 36000), 1),
		"ivan-v" => array("Иван-В", "от Ø115 до Ø120 см", "венге", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 24000, 2 => 30500, 3 => 39000)),
		"vinni" => array("Винни раздвижной", "от Ø70 до Ø100 см", "слоновая кость", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(2 => 24000)),
		"vinninr" => array("Винни нераздвижной", "от 80х60 до 110х80 см", "вишня моргана", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 17500)),
		"rihard" => array("Рихард", "от 110х70 до 170х100 см", "белый + золотая патина", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 23500, 2 => 34000, 3 => 40500)),
		"ludovikplus" => array("Людовик плюс", "от 130х80 до 190х100 см", "белый + золотая патина", "ABS-пластик (ноги), шпон+МДФ (царговый пояс)", array(1 => 30000, 2 => 38500, 3 => 45000)),
		"kaizer" => array("Кайзер", "от Ø110 до Ø120 см", "белый + золотая патина", "ABS-пластик (ноги), шпон+МДФ (царговый пояс)", array(1 => 36500, 2 => 43000)),
		"console" => array("Стол - консоль", "от 50х90 до 50х100 см", "кремовый", "шпон+МДФ", array(3 => 34000)),
		"gulliver-maxi" => array("Гулливер макси", "от 180х100 до 210х110 см", "белый + золотая патина", "МДФ", array(3 => 57000)),
		"gulliver" => array("Гулливер", "от 180х100 до 210х110 см", "белый + золотая патина", "МДФ", array(1 => 39000, 2 => 46000), 1),
		"max" => array("Макс", "от 150х90 до 240х120 см", "венге", "массив березы", array(1 => 29500, 2 => 36000)),
		"elephant" => array("Элефант", "от 150х90 до 240х120 см", "венге", "массив березы", array(1 => 29500, 2 => 36000), 1),
		"elvis" => array("Элвис", "от 100х70 до 120х80 см", "", "металл (ноги), МДФ покрытая мебельным пластиком (царговый пояс)", array(1 => 10000, 2 => 15000)),
		"ludovik" => array("Людовик", "от 110х70 до 150х90 см", "черный + серебрянная патина", "ABS-пластик (ноги), шпон+МДФ (царговый пояс)", array(1 => 25500, 2 => 32000)),
		"monarh" => array("Монарх", "260х120 см", "белый + золотая патина", "ABS-пластик (ноги), шпон+МДФ (царговый пояс)", array(1 => 75000, 3 => 88000), 1),
		"premier" => array("Премьер", "Ø120 см", "белый + золотая патина", "ABS-пластик (ноги), шпон+МДФ (царговый пояс)", array(1 => 54000, 2 => 60500), 1),
//		"trumo" => array("Трюмо", "100х62 см", "белый + золотая патина", "ABS-пластик", array(1 => 30000), 1),
		"ampir" => array("Ампир журнальный", "от 70х50 до 100х60 см<br>высота 54 см", "кремовый + золотая патина", "ABS-пластик (ноги), шпон+МДФ (царговый пояс)", array(1 => 16500), 1),
		"cesar" => array("Цезарь журнальный", "от 70х50 до 100х60 см<br>высота 60 см", "белый + золотая патина", "массив березы (ноги), шпон+МДФ (царговый пояс)", array(1 => 13000)),
		"classic" => array("Классик журнальный", "от 70х50 до 100х60 см<br>Высота 64 см", "белый", "массив березы", array(1 => 12000)),
		"avatarmini" => array("Аватар-мини журнальный", "от 70х50 до 100х60 см", "венге", "шпон+МДФ", array(1 => 9500))
	),
	"chair" => array(
		"valli" => array("Валли", "Ширина: 43 см<br>Высота: 92 см<br>Глубина: 53 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, массив березы", 5500),
		"osvald" => array("Освальд пуговицы", "Ширина: 43 см<br>Высота: 86 см<br>Глубина: 57 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, металлические трубы", 6000, 1),
		"osvaldromb" => array("Освальд ромб", "Ширина: 43 см<br>Высота: 86 см<br>Глубина: 57 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, металлические трубы", 6000, 1),
		"orfey" => array("Орфей", "Ширина: 47 см<br>Высота: 95 см<br>Глубина: 50 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, массив березы", 6500, 1),
		"orfey-t" => array("Орфей-Т", "Ширина: 47 см<br>Высота: 95 см<br>Глубина: 50 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, металлические трубы", 7000, 1),
		"ostin" => array("Остин", "Ширина: 60 см<br>Высота: 84 см<br>Глубина: 50 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, массив березы", 6500, 1),
//		"ostin-m" => array("Остин-М", "Ширина: 60 см<br>Высота: 84 см<br>Глубина: 50 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, металлические полозья", 6500, 1),
		"ostin-t" => array("Остин-Т", "Ширина: 60 см<br>Высота: 84 см<br>Глубина: 50 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, металлические трубы", 7000, 1),
		"oskar" => array("Оскар", "Ширина: 58 см<br>Высота: 80 см<br>Глубина: 50 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, массив березы", 6500, 1),
		"oskar-t" => array("Оскар-Т", "Ширина: 58 см<br>Высота: 80 см<br>Глубина: 50 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, металлические трубы", 7000, 1),
		"zhan" => array("Жан", "Ширина: 57 см<br>Высота: 83 см<br>Глубина: 45 см<br>Высота сидения: 45 см", "ольха", "гнутоклееные детали из шпона, массив березы", 5000, 1),
		"shevalie" => array("Шевалье", "Ширина: 47 см<br>Высота: 91 см<br>Глубина: 57 см<br>Высота сидения: 45 см", "вишня моргана", "массив березы", 5300),
		"vikont" => array("Виконт", "Ширина: 47 см<br>Высота: 91 см<br>Глубина: 57 см<br>Высота сидения: 45 см", "вишня моргана", "массив березы", 6300),
		"chester" => array("Честер", "Ширина: 80 см<br>Высота: 81 см<br>Глубина: 74 см<br>Высота сидения: 45 см", "венге", "массив березы", 13000, 1),
		"mishel" => array("Мишель", "Ширина: 42 см<br>Высота: 101 см<br>Глубина: 51 см<br>Высота сидения: 45 см", "венге", "массив березы", 4900),
		"resnichka" => array("Ресничка", "Ширина: 38 см<br>Высота: 92 см<br>Глубина: 48 см<br>Высота сидения: 45 см", "ольха", "массив березы", 5600),
		"alf" => array("Альф", "Ширина: 38 см<br>Высота: 85 см<br>Глубина: 48 см<br>Высота сидения: 45 см", "орех", "массив березы", 3800),
		"medal" => array("Медальон", "Ширина: 49 см<br>Высота: 96 см<br>Глубина: 54 см<br>Высота сидения: 45 см", "белый + золотая патина", "массив бука", 12000, 1),
		"lui" => array("Луи", "Ширина: 48 см<br>Высота: 112 см<br>Глубина: 58 см<br>Высота сидения: 45 см", "белый + золотая патина", "ABS-пластик", 13500),
		"richard" => array("Ричард", "Ширина: 69 см<br>Высота: 110 см<br>Глубина: 50 см<br>Высота сидения: 45 см", "белый + золотая патина", "ABS-пластик", 16500, 1),
		"haip" => array("Хайп", "Ширина: 43 см<br>Высота: 95 см<br>Глубина: 49 см<br>Высота сидения: 45 см", "вишня классическая", "массив березы", 4700),
		"riko" => array("Рико", "Ширина: 44 см<br>Высота: 105 см<br>Глубина: 52 см<br>Высота сидения: 45 см", "венге", "массив березы", 5000),
		"noi" => array("Ной", "Ширина: 43 см<br>Высота: 99 см<br>Глубина: 50 см<br>Высота сидения: 45 см", "беленный дуб", "массив березы", 4000),
		"elegant" => array("Элегант", "Ширина: 46 см<br>Высота: 104 см<br>Глубина: 52 см<br>Высота сидения: 45 см", "венге", "массив березы", 5300),
		"markiz" => array("Маркиз", "Ширина: 48 см<br>Высота: 91 см<br>Глубина: 58 см<br>Высота сидения: 45 см", "белый + золотая патина", "ABS-пластик (передние ноги), массив березы", 7000),
		"flash" => array("Флэш", "Ширина: 42 см<br>Высота: 103 см<br>Глубина: 51 см<br>Высота сидения: 45 см", "беленный дуб", "массив березы", 4000),
		"relax" => array("Релакс", "Ширина: 55 см<br>Высота: 77 см<br>Глубина: 65 см<br>Высота сидения: 45 см", "венге", "массив березы", 5500),
		"orfeybar" => array("Орфей барный", "Ширина: 43 см<br>Высота: 105 см<br>Глубина: 41 см<br>Высота сидения: 70 см", "венге", "гнутоклееные детали из шпона, массив березы", 8500, 1),
		"mishelbar" => array("Мишель барный", "Ширина: 42 см<br>Высота: 105 см<br>Глубина: 52 см<br>Высота сидения: 70 см", "венге", "массив березы", 6100),
		"casper" => array("Каспер", "Ширина: 42 см<br>Высота: 93 см<br>Глубина: 38 см<br>Высота сидения: 85 см", "венге", "гнутоклееные детали из шпона, массив березы", 4400, 1),
		"vikontkr" => array("Виконт кресло", "Ширина: 66 см<br>Высота: 91 см<br>Глубина: 57 см<br>Высота сидения: 45 см<br>Высота подлокотников: 68 см", "венге", "массив березы", 7500),
		"viola" => array("Виола", "Ширина: 115 см<br>Высота: 98 см<br>Глубина: 46 см<br>Высота сидения: 45 см", "белый", "массив березы", 13500),
		"haipbar" => array("Хайп барный", "Ширина: 42 см<br>Высота: 103 см<br>Глубина: 44 см<br>Высота сидения: 70 см", "венге", "массив березы", 6500),
		"amadei" => array("Амадей", "Ширина: 46 см<br>Высота: 96 см<br>Глубина: 49 см<br>Высота сидения: 45 см", "белый + золотая патина", "массив березы", 6200),
		"shevaliekr" => array("Шевалье кресло", "Ширина: 66 см<br>Высота: 91 см<br>Глубина: 57 см<br>Высота сидения: 45 см<br>Высота подлокотников: 68 см", "венге", "массив березы", 6500),
//		"versalplus" => array("Версаль плюс", "Ширина: 52 см<br>Высота: 97 см<br>Глубина: 64 см<br>Высота сидения: 45 см", "белый + золотая патина", "ABS-пластик, фанера", 13000),
		"markizkr" => array("Маркиз кресло", "Ширина: 66 см<br>Высота: 91 см<br>Глубина: 58 см<br>Высота сидения: 45 см<br>Высота подлокотников: 68 см", "белый + золотая патина", "ABS-пластик (передние ноги), массив березы", 8200),
//		"emil" => array("Эмиль", "Ширина: 42 см<br>Высота: 91 см<br>Глубина: 53 см<br>Высота сидения: 45 см", "вишня классическая", "массив березы", 4200),
		"kvadro" => array("Квадро", "Ширина: 34 см<br>Высота сидения: 45 см", "белый", "массив березы", 2000),
		"jambo" => array("Джамбо", "Ширина: 35 см<br>Высота сидения: 45 см", "венге", "массив березы", 2200),
		"rondo" => array("Рондо", "Ширина: 35 см<br>Высота сидения: 45 см", "венге", "массив березы", 1600),
		"rondosoft" => array("Рондо мягкий", "Ширина: 35 см<br>Высота сидения: 45 см", "венге", "массив березы", 2200, 1),
		"rondobar" => array("Рондо барный", "Ширина: 35 см<br>Высота сидения: 70 см", "белый", "массив березы", 2800),
		"rondobarsoft" => array("Рондо мягкий барный", "Ширина: 35 см<br>Высота сидения: 75 см", "белый", "массив березы", 3300, 1),
		"pufik" => array("Пуфик", "Ширина: 54 см<br>Глубина: 42 см<br>Высота сидения: 45 см", "белый", "массив березы", 4700),
		"exclusive" => array("Эксклюзив", "Ширина: 54 см<br>Глубина: 42 см<br>Высота сидения: 45 см", "белый + золотая патина", "ABS-пластик (ноги), массив березы", 5600),
		"skamia" => array("Скамья", "Ширина: 65 см<br>Высота: 54 см<br>Глубина: 45 см<br>Высота сидения: 45 см", "белый", "массив березы", 4700),
		"maestro" => array("Маэстро банкетка", "Ширина: 37 см<br>Высота сидения: 45 см", "белый + золотая патина", "массив березы", 5000),
		"compliment" => array("Комплимент банкетка", "Ширина: 35 см<br>Высота сидения: 40 см", "белый + золотая патина", "ABS-пластик", 6000),
		"plechnitsa" => array("Плечница", "Ширина: 47 см<br>Высота: 97 см<br>Глубина: 30 см", "венге, белый", "массив березы", 2000),
		"tsvetochnitsa" => array("Цветочница", "Высота: 110 см", "белый + золотая патина", "ABS-пластик", 11000),
		"podstavka" => array("Подставка для цветов", "Высота: 85 см", "белый + золотая патина", "массив березы, МДФ", 2200)
	)
);

?>
