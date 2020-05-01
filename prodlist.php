<?
	include "data.php";

	$type_name = $type[$_GET["type"]][0];
	$heading = $type[$_GET["type"]][2];
	$title = $type[$_GET["type"]][2];
	$description = $type[$_GET["type"]][3];

	include "header.php";

?>

<section id="main">
<section class="page">
	<ul class="breadcrumbs">
		<li><a href="/">Главная</a></li>
		<li><i class="fas fa-long-arrow-alt-left"></i></li>
		<li><b><?=$type_name?></b></li>
	</ul>
	<h1><?=$heading?></h1>
	<div class="prod_list_wrap">

	<?
		foreach ($products[$_GET["type"]] as $k => $v) {
			if($_GET["type"] == "table") {
				$price = number_format(min($v[4]), 0, '', ' ');
				$pref = "от ";
			}
			else {
				$price = number_format($v[4], 0, '', ' ');
			}
			echo "
				<div class='prod_cell'>
					<a href='product.php?name={$k}'>
						<div class='prod_cell_img_wrap'>
							<img alt='{$v[0]}' src='images/prodlist/{$k}.jpg'>
						</div>
						<p style='margin: 30px 0 30px 0;'>{$v[0]}</p>
					</a>
					<div class='icon_wrap'>
						".($v[5] ? "<div class='ic_new'></div>" : "")."
					</div>
					<div style='text-align: center; position: absolute; bottom: 20px; width: 100%; white-space: nowrap;'>{$pref}<span class='price'>{$price}</span> р.</div>
					<hr>
				</div>
			";
		}
	?>

	</div>
</section>
</section>

<?
	include "footer.php";
?>
