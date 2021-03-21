<?php require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "Отели";
		require_once "blocks/head.php" ;

	?>

</head>
<body>
	
	<?php require_once "blocks/header.php";	



	
	echo '<div id = "countries">';
	echo '<h1 style = "text-align:center;" >Наши отели</h1><br><br>';

	
	$hotel = R::getAll('  select  hotel.names,hotel.image,gorog.name,hotel.description,hotel.stars,hotel.price2   from  hotel 
		inner join gorog on hotel.gorod=gorog.id');

	foreach ($hotel as $hotel) {
				echo "<div class='hotel'>";
				echo "<a href = 'tours.php' title = 'Найти тур'><button class='find_tour'>" .  $hotel['names'] . " - " . $hotel['name'] ." - "
				. $hotel['stars']. "&#9733;</button></a>" ;
				echo "<div class = 'about' >";
				echo "<img  src='" . $hotel['image'] . "'   alt='' align=left width = 500px heigth = 400px class='rightimg' /> ";
				echo "<p class = 'description'>" . $hotel['description'] . "</p>";
				echo "</div></div>";
			}



	echo '</div>'

?>

		<?php require_once "blocks/footer.php" ?>

</body>
</html>