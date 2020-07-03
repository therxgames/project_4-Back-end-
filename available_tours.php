<?php require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>



<?php

	  

		$title = "Туристическое агенство";
		require_once "blocks/head.php" ;
	?>
</head>
<body>
	
	<?php require_once "/blocks/header.php";?>


	<?php



		$course = $_POST['question1'];

		$course2 = $_POST['question2'];

		$course3 = $_POST['question3'];

		$course4 = $_POST['question4'];

		$course5 = $_POST['question5'];

		
			$sql= R::getALL('select  tour.id,type_tour.type,gorog.name,hotel.stars,hotel.names,tour.price,hotel.price2,tour.date_begin,tour.date_end
				from tour 
				inner join hotel on tour.hotel=hotel.id 
				inner join gorog on tour.gorod=gorog.id
				inner join type_tour on tour.type_tour=type_tour.id
				where type_tour.id= '.$course3.' && gorog.id= '.$course.' && hotel.stars = '.$course2.' ');
			

			
			if($sql){

				foreach ($sql as $sql) {
			$tour_id = $sql['id'];
			$city = $sql['name'];
			$hotel_stars = $course2;
			$hotel_name = $sql['names'];
			$type_tour = $sql['type'];

			$date_begin = $sql['date_begin'];
			$date_end = $sql['date_end'];
				
			$price_hotel = $course5*$sql['price2'];


			$summa = $sql['price']*$course4 + $price_hotel;


				echo "<div style = 'margin-top:10%;margin-bottom:20%; padding-bottom:2%; '>";
				echo "<h1 class = description>Доступен тур в <a href = 'lands.php'>" . $sql['name']. "</a>. " . $course2 . "-х звездочный отель <a href = 'hotels.php'>" .$sql['names'] ."</a>";
				echo " Цена тура - " . $summa ."$";
				echo " Дата начала тура - " . $date_begin;
				echo " Дата конца тура - " . $date_end ;
				echo "<a href='bought_tour.php?city=".$city."&hotel_stars=".$hotel_stars."&hotel_name=".$hotel_name."&type_tour=".$type_tour."
				&summa=".$summa."&id=".$tour_id."'><button type='submit' name='buy_tour' class = 'buy_tour'>Забронировать тур</button></a><br></h1></div>";
				
			} 
			


				
				


				} else{
				echo "<div class = 'roflan_pominki' ";
				echo "<p>Упс!Туров не найдено<br></p>";
				echo "</div>";
				echo "<div id = 'img_rp'>";
				echo "<img src = 'images/roflan_pominki.jpeg' height = 300px width = 300px;>";
				echo "</div>";
				echo "<br>";
				echo "<button class = 'back'><a href ='tours.php' style = 'color:white'>Назад</a></button>";
				echo "<br>";
			}
			
	?>




	

			

		

		



	

	<?php require_once "blocks/footer.php" ?>


</body>
</html>