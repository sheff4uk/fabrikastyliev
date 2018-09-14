<?
	include "data.php";

	$type_name = $type[$_GET["type"]][0];

	$title = $type_name;
	include "header.php";

?>

<section id="main">
<section class="page">
	<ul class="breadcrumbs">
		<li><a href="/">Главная</a></li>
		<li>/</li>
		<li><b><?=$type_name?></b></li>
	</ul>
	<div class="prod_list_wrap">

	<?
		foreach ($products[$_GET["type"]] as $k => $v) {
			echo "
				<div class='prod_cell'>
					<a href='product.php?name={$k}'>
						<div class='prod_cell_img_wrap'>
							<img src='images/prodlist/{$k}.png'>
						</div>
						<p>{$v[0]}</p>
					</a>
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
