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

	<div id = 'prodano'>
	<?php
	if(isset($_SESSION['logged_user'])){


	$user = $_SESSION['logged_user'] -> id;
	$phone = R::GetAll("select clients.phone from clients where id = '".$user."' ");
	
		$date  = date('Y-m-d H:i:s');;
		$summa = $_GET['summa'];
		$tour_id = $_GET['id'];

				$sell = R::dispense('prodazha');
				$sell->price = $summa;
				$sell->date = $date;
				$sell->tour = $tour_id;
				$sell->client = $user;
				R::store($sell);


		$city = $_GET['city'];
		$hotel_stars = $_GET['hotel_stars'];
		$hotel_name = $_GET['hotel_name'];
		$type_tour = $_GET['type_tour'];

		echo "<div id = 'prodaza'>";
		echo "<p>Вы Забронировали тур в ".$city." по цене " .$summa. "$</p>";
		foreach($phone as $phone){
		echo "<p>В случае возникновения проблем, мы свяжемся позвоним вам по вашему номеру - ".$phone['phone']."</p>";}
		echo "<p>Ваш отель - " .$hotel_name."</p>";
		echo '<a href="index.php"><button type="submit" class="back">Назад на главную</button></a>';
		echo "</div>";
	}
		else{
			echo "<div class = 'roflan_pominki' ";
				echo "<p>Упс!Авторизуйтесь для бронирования тура!!!<br></p>";
				echo "</div>";
				echo "<div id = 'img_rp'>";
				echo "<img src = 'images/roflan_pominki.jpeg' height = 300px width = 300px;>";
				echo "</div>";
				echo "<br>";
				echo "<button class = 'back'><a href ='tours.php' style = 'color:white'>Назад к поиску туров</a></button>";
				echo "<br>";
		}

	?>
	</div>



	

			

		

		



	

	<?php require_once "blocks/footer.php" ?>


</body>
</html>