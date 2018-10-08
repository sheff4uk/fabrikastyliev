<?
	include "data.php";

	$type_name = $type[$_GET["type"]][0];
	$heading = $type[$_GET["type"]][2];
	$title = $type[$_GET["type"]][0];
	$description = $type[$_GET["type"]][3];

	include "header.php";

?>

<section id="main">
<section class="page">
	<ul class="breadcrumbs">
		<li><a href="/">Главная</a></li>
		<li>/</li>
		<li><b><?=$type_name?></b></li>
	</ul>
	<h1><?=$heading?></h1>
	<div class="prod_list_wrap">

	<?
		foreach ($products[$_GET["type"]] as $k => $v) {
			echo "
				<div class='prod_cell'>
					<a href='product.php?name={$k}'>
						<div class='prod_cell_img_wrap'>
							<img src='images/prodlist/{$k}.png'>
						</div>
						<p style='margin: 30px 0 5px 0;'>{$v[0]}</p>
					</a>
					<div class='icon_wrap'>
						".($v[4] ? "<div class='ic_new'></div>" : "")."
					</div>
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
