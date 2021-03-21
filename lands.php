<?php require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	
<?php
		$title = "Страны";
		require_once "blocks/head.php" ;
	?>


</head>
<body>
<style type="text/css">
	
</style>


	<?php 
	require_once "blocks/header.php";

	function dump($what){
	echo '<pre>';print_r($what);echo '/<pre>';
	}




	echo '<div id = "countries">';
	echo '<h2 style = "text-align:center; color:blue" >Города, в которые вы можете поехать</h2><br><br>';

	

		$gorog = R::getAll('  select  gorog.image,gorog.name,gorog.description,gorog.land   from  gorog ');

		$land = R::getAll('  select land.id,land.names  from  land   ');
	




	foreach ($land as $landList) {
		foreach ($gorog as $gorogList) {
			if ($gorogList['land'] == $landList['id']) {
				echo "<div class='city'>";
				/*echo "<a href = 'tour_from_lands.php?city_name=".$gorogList['name']."' ><button class='find_tour'><p>" .  $gorogList['name'] .  "</p></button></a>" ;*/
				echo "<a href = 'tours.php' title = 'Найти тур'><button class='find_tour'><p>" .  $gorogList['name'] . " (" .$landList['names'] . ")"."</p></button></a>";
				
				
				echo "<div class = 'about' >";
				echo "<img  src='" . $gorogList['image'] . "'   alt='' align=left width = '300px' heigth = '200px' class='rightimg' /> ";
				echo "<p class = description_2>" . $gorogList['description'] . "</p> </div>";
				echo "</div>";
			}
		}
				
}
	


	

echo '</div>';



	

	?>
	
         

	

	



	<?php require_once "blocks/footer.php" ?>

</body>
</html>