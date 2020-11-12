<?
	include "data.php";
	$title = "ПРЕСТОЛ столы и стулья официальный сайт кировской фабрики";
	$description = "Торговый каталог Мебельной фабрики Престол. Столы и стулья для кухни по индивидуальным заказам.";
	include "header.php";

	// Отправка сообщения
	if( trim($_POST["question"]) ) {
		$response = $_POST["g-recaptcha-response"];
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = [
			'secret' => RECAPTCHA_SECRET,
			'response' => $response
		];
		$options = [
			'http' => [
				'method' => 'POST',
				'content' => http_build_query($data)
			]
		];
		$context  = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captcha_success=json_decode($verify);
		if ($captcha_success->success==false) {
			echo "Проверка reCAPTCHA не пройдена!";
		}
		else if ($captcha_success->success==true) {
			$chars = array("+", " ", "(", ")"); // Символы, которые требуется удалить из строки с телефоном
			$mtel = str_replace($chars, "", $_GET["mtel"]);

			// Получаем информацию по заказу
			$query = "
				SELECT MIN(OD.OD_ID) OD_ID
					,GROUP_CONCAT(distinct OD.Code) `code`
					,GROUP_CONCAT(distinct ClientName) `client`
					,DATE_FORMAT(MAX(StartDate), '%d.%m.%Y') sd_format
					,DATE_FORMAT(MAX(EndDate), '%d.%m.%Y') ed_format
					,GROUP_CONCAT(distinct CT.City) city
					,GROUP_CONCAT(distinct SH.Shop) shop
				FROM OrdersData OD
				JOIN Shops SH ON SH.SH_ID = OD.SH_ID
				JOIN Cities CT ON CT.CT_ID = SH.CT_ID
				WHERE OD.StartDate IS NOT NULL
					AND OD.ReadyDate IS NULL
					AND OD.DelDate IS NULL
					AND OD.mtel LIKE '{$mtel}'
			";
			$res = mysqli_query( $mysqli, $query ) or die("Invalid query: " .mysqli_error( $mysqli ));
			$row = mysqli_fetch_array($res);

			$message = "<a href='https://kis.fabrikaprestol.ru/orderdetail.php?id={$row["OD_ID"]}'><b>{$row["code"]}</b></a> ← ссылка\n<b>Клиент:</b> {$row["client"]} {$_GET["mtel"]}\n<b>Салон:</b> {$row["city"]} {$row["shop"]}\n<b>Продажа:</b> {$row["sd_format"]}\n<b>Сдача:</b> {$row["ed_format"]}\n<b>Вопрос:</b> {$_POST["question"]}";

			// Отправляем сообщение при помощи телеграм бота
			message_to_telegram($message);
			$_SESSION["alert"] = "Благодарим за обращение! С Вами обязательно свяжуться.";

			exit ('<meta http-equiv="refresh" content="0; url=order_status.php?mtel='.$_GET["mtel"].'">');
		}
	}
?>

<style>
	.ui-progressbar {
		position: relative;
	}
	.progress-label {
		position: absolute;
		left: calc(50% - 70px);
		top: 4px;
		font-weight: bold;
		text-shadow: 1px 1px 0 #fff;
		color: #fd8134;
	}
</style>

<section style="background-color: #653033; padding: 100px 0; color: white; text-align: center; font-size: 1em;">
	<section class="page">
		<?
		if($_GET["mtel"]) {
			echo "<h2>Добрый день!</h2>";
			echo "<h3>Вот что нам удалось найти по Вашему заказу:</h3>";

			$chars = array("+", " ", "(", ")"); // Символы, которые требуется удалить из строки с телефоном
			$mtel = str_replace($chars, "", $_GET["mtel"]);

			$query = "
				SELECT OD.OD_ID
					,OD.Code
					,CONCAT(CL.color, IF(CL.clear, ' <i>с эффектом дерева</i>', ' непрозрачная эмаль')) color
					,DATE_FORMAT(StartDate, '%d.%m.%Y') StartDate_format
					,DATE_FORMAT(EndDate, '%d.%m.%Y') EndDate_format
				FROM OrdersData OD
				LEFT JOIN Colors CL ON CL.CL_ID = OD.CL_ID
				WHERE OD.StartDate IS NOT NULL
					AND OD.ReadyDate IS NULL
					AND OD.DelDate IS NULL
					AND OD.mtel LIKE '{$mtel}'
			";
			$res = mysqli_query( $mysqli, $query ) or die("Invalid query: " .mysqli_error( $mysqli ));
			if( mysqli_num_rows($res) ) {
				while( $row = mysqli_fetch_array($res) ) {
					echo "<div style='padding: 10px; border-radius: 20px; box-shadow: 0px 0px 15px #fc9; margin-bottom: 40px;'>";
					echo "<p style='float: right;'><b style='font-size: 2.5em;'>{$row["Code"]}</b><br>Код набора</p>";
					echo "<h3 style='text-align: left;'><b>Дата заключения договора:</b> <n style='color: #fc9;'>{$row["StartDate_format"]}</n></h3>";
					echo "<h3 style='text-align: left;'><b>Дата сдачи по договору:</b> <n style='color: #fc9;'>{$row["EndDate_format"]}</n></h3>";
					if( $row["color"] ) echo "<h3 style='text-align: left;'><b>Цвет краски:</b> <n style='color: #fc9;'>{$row["color"]}</n></h3>";
					$query = "
						SELECT ODD.ODD_ID
							,IF(ODD.Amount > 1, CONCAT(ODD.Amount, ' шт.'), '') amount
							,Zakaz(ODD.ODD_ID) zakaz
							,Progress(ODD.ODD_ID) progress
							,PM.code
							,CONCAT(MT.Material, ' (', SH.Shipper, ')') Material
							,IF(SH.mtype = 1, 'Ткань:', 'Пластик:') mtype
						FROM OrdersDataDetail ODD
						LEFT JOIN ProductModels PM ON PM.PM_ID = ODD.PM_ID
						LEFT JOIN Materials MT ON MT.MT_ID = ODD.MT_ID
						LEFT JOIN Shippers SH ON SH.SH_ID = MT.SH_ID
						WHERE ODD.OD_ID = {$row["OD_ID"]}
					";
					$subres = mysqli_query( $mysqli, $query ) or die("Invalid query: " .mysqli_error( $mysqli ));
					while( $subrow = mysqli_fetch_array($subres) ) {
						echo "<div style='display: table; width: 100%; text-align: left;'>";
						echo ($subrow["code"] ? "<img style='width: 100px; float: left; margin-right: 20px; margin: 0 20px 20px 0; border-radius: 10px; box-shadow: 5px 5px 15px #333;' src='https://fabrikaprestol.ru/images/prodlist/{$subrow["code"]}.jpg'/>" : "");
						?>
						<script>
							$( function() {
								var progressbar = $( "#progressbar<?=$subrow["ODD_ID"]?>" ),
									progressLabel = $( "#progressbar<?=$subrow["ODD_ID"]?> .progress-label" );

								progressbar.progressbar({
									value: false,
									change: function() {
										progressLabel.text("Готовность: " + progressbar.progressbar( "value" ) + "%" );
									}
								});

								function progress() {
									var val = progressbar.progressbar( "value" ) || 0;

									progressbar.progressbar( "value", val + 2 );

									if ( val < <?=$subrow["progress"]?> ) {
										setTimeout( progress, 10 );
									}
								}

								setTimeout( progress, 1000 );
							} );
						</script>
						<div id="progressbar<?=$subrow["ODD_ID"]?>" style="width: calc(100% - 125px);"><div class="progress-label">Загрузка...</div></div>
						<?
						echo "<p><b>{$subrow["zakaz"]} <n style='font-size: 1.5em;'>{$subrow["amount"]}</n></b></p>";
						if( $subrow["Material"] ) echo "<p><b>{$subrow["mtype"]}</b> <n style='color: #fc9;'>{$subrow["Material"]}</n></p>";
						echo "</div>";
					}
					echo "</div>";
				}
				?>
				<form method="post" action="?mtel=<?=$_GET["mtel"]?>">
					<textarea name="question" style="width: 100%; border-radius: 20px; padding: 10px; box-sizing: border-box;" rows="5" placeholder="Задать вопрос по заказу"></textarea>

					<div class="captcha_wrapper" style="width: 304px; margin: 20px auto;">
						<script src='https://www.google.com/recaptcha/api.js'></script>
						<div class="g-recaptcha" data-sitekey="6LdZB-oUAAAAAA8oV4Sht3IvE0F0_VfkZ6arlTjd"></div>
					</div>

					<input type="submit" style="color: #fff; background: #C00000; padding: 10px; text-decoration: none; border-radius: 10px; border: none; font-size: 1.2em;" value="Отправить">
				</form>
				<?
			}
			else {
				echo "<h1 style='color: #fc9; line-height: 2em;'>К сожалению, с этим номером телефона не связан ни один из производимых заказов.</h1>";
				echo "<a href='order_status.php'>Попробуйте ввести другой номер телефона</a>";
			}
		}
		else {
			?>
			<form style="text-align: center; margin: 100px 0">
				<h1 style="color: #fc9; line-height: 2em;">Введите номер телефона,<br>который Вы сообщали при заключении договора.</h1>
				<input type="text" id="mtel" name="mtel" style="font-size: 2em; width: 300px;" value="" autocomplete="on" placeholder="Моб. телефон">
				<br>
				<br>
				<br>
				<input type="submit" style="color: #fff; background: #C00000; padding: 10px; text-decoration: none; border-radius: 10px; border: none; font-size: 1.2em;" value="Вперед!">
			</form>
			<?
		}
		?>
	</section>
</section>

<script>
	$(function() {
		$("form").on("submit", function() {
			if( !grecaptcha.getResponse() ) {
				alert('Вы не заполнили поле Я не робот!');
				return false;
			}
		});
	});
</script>

<?
	include "footer.php";
?>
