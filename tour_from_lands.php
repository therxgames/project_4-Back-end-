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


	<?php  require_once "blocks/header.php"; ?>

	<?php

			$city_name = $_GET['city_name'];


			$sql= R::getALL('select  tour.id,hotel.names,gorog.name,type_tour.type,hotel.stars,tour.price,hotel.price2,tour.date_begin,tour.date_end
				from tour 
				inner join hotel on tour.hotel=hotel.id
				inner join gorog on tour.gorod=gorog.id
				inner join type_tour on tour.type_tour=type_tour.id
				where gorog.name= ?',array($city_name)) ;

			

				foreach ($sql as $sqlList) {

				
 				$summa =  $sqlList['price']+  $sqlList['price2'];

				echo "Доступен тур в " . $sqlList['name']. ". " . $sqlList['stars'] . "-х звездочный отель " .$sqlList['names'] ; 
				echo ". Тип тура - " .   $sqlList['type'];
				echo " Цена тура - " . $summa ."$";
				echo " Дата начала тура - " .  $sqlList['date_begin'];
				echo " Дата конца тура - " .$sqlList['date_end'] ;

				

				echo "<a href='bought_tour.php?city=".$sqlList['name']."&hotel_stars=".$sqlList['stars']."&hotel_name=".$sqlList['names']."
				&type_tour=".$sqlList['type']."
				&summa=".$summa."&id=".$sqlList['id']."'><button type='submit' name='buy_tour' class = 'buy_tour'>Забронировать тур</button></a><br>";

				
				
				} 
			

	?>

	
	
         

	

	



	<?php require_once "blocks/footer.php" ?>

</body>
</html>