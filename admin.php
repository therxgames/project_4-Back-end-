<?php 
 require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	
<?php
		$title = "Туристическое агенство";
		require_once "blocks/head.php" ;
	?>
</head>
<body>
	
	<?php require_once "/blocks/header.php"; ?>

	<script type="text/javascript">

	function openbox(id){
	    display = document.getElementById(id).style.display;

	    display=='block' ?
	       document.getElementById(id).style.display='none'
	    :
	       document.getElementById(id).style.display='block';
	    
	}
	</script>


	<a href="#" onclick="openbox('div_tour'); return false" class="button_tour">
		<h1 style="margin: 30px;">
			Туры
		</h1>
	</a>
	




	<div id = 'div_tour'>





	<a href="#" onclick="openbox('add_tour'); return false" class="button_tour">Добавить тур</a><br>

	<div id="add_tour">

	
	<?php
	echo "<form action = '' method='post'>";
	
	echo "<p>Тип тура </p>";
	echo "<select name = 'tour_type'>";
	$type_tour =  R::getALL('select  type_tour.type,type_tour.id from type_tour');


	    foreach ($type_tour as $type_tour) {
	      	echo "<option value = ".$type_tour['id'].">" .$type_tour['type']. "</option>";
	      }

	echo "</select><br>";

	echo "<p>Город </p>";
	echo "<select name = 'gorod'>";
	$gorod =  R::getALL('select  gorog.name,gorog.id from gorog');


	    foreach ($gorod as $gorod) {
	      	echo "<option value = ".$gorod['id'].">" .$gorod['name']. "</option>";
	      }
	echo "</select><br>";


	echo "<p>Отель </p>";
	echo "<select name = hotel>";
	$hotel =  R::getALL('select  hotel.names,hotel.id from hotel');


	    foreach ($hotel as $hotel) {
	      	echo "<option value = ".$hotel['id'].">" .$hotel['names']. "</option>";
	      }
	  

	echo "</select><br>";

	echo "<p>Цена тура</p>";
	echo "<input type = number size = 10 name = 'price'><br>";
	echo "<p>Дата начала</p>";
	echo "<input type= 'text' name= 'date_begin' placeholder='YYYY-MM-DD' required pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}'><br>";
	echo "<p>Дата конца</p>";
	echo "<input type= 'text' name= 'date_end' placeholder='YYYY-MM-DD' required pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}'><br>";
	echo "<input type = submit value = 'Добавить' name = 'exet'><br>";
	echo "</form>";
	echo "</div>";

	if(isset($_POST['exet'])){

		
		$tour_type = $_POST['tour_type'];
		$gorod = $_POST['gorod'];
		$hotel = $_POST['hotel'];

		$admin = R::dispense('tour');
				$admin->type_tour = $tour_type;
				$admin->date_begin = $_POST['date_begin'];
				$admin->date_end = $_POST['date_end'];
				$admin->price = $_POST['price'];
				$admin->hotel = $hotel;
				$admin->gorod = $gorod;
				R::store($admin);
		echo ($admin)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
	}

	

	?>

	
	
	
	<a href="#" onclick="openbox('change_tour'); return false" class="button_tour">Изменить тур</a>
	<?php


		$red = R::exec('select type_tour.type,gorog.name,hotel.names,tour.price,tour.date_begin,tour.date_end
				from tour 
				inner join hotel on tour.hotel=hotel.id 
				inner join gorog on tour.gorod=gorog.id
				inner join type_tour on tour.type_tour=type_tour.id');

		echo "<div id='change_tour'>";
			echo "<form action = '' method='post'>";
	
			echo "<p>ID</p>";
			echo "<select name = 'id'>";
			$id =  R::getALL('select  tour.id from tour');


			    foreach ($id as $id) {
			      	echo "<option value = ".$id['id'].">" .$id['id']. "</option>";
			      }

			echo "</select><br>";


			echo "<p>Тип тура </p>";
			echo "<select name = 'tour_type_change'>";
			$type_tour_change =  R::getALL('select  type_tour.type,type_tour.id from type_tour');


			    foreach ($type_tour_change as $type_tour_change) {
			      	echo "<option value = ".$type_tour_change['id'].">" .$type_tour_change['type']. "</option>";
			      }

			echo "</select><br>";

			echo "<p>Город </p>";
			echo "<select name = 'gorod_change'>";
			$gorod_change =  R::getALL('select  gorog.name,gorog.id from gorog');


			    foreach ($gorod_change as $gorod_change) {
			      	echo "<option value = ".$gorod_change['id'].">" .$gorod_change['name']. "</option>";
			      }
			echo "</select><br>";


			echo "<p>Отель </p>";
			echo "<select name = hotel_change>";
			$hotel_change =  R::getALL('select  hotel.names,hotel.id from hotel');


			    foreach ($hotel_change as $hotel_change) {
			      	echo "<option value = ".$hotel_change['id'].">" .$hotel_change['names']. "</option>";
			      }
			  

			echo "</select><br>";

			echo "<p>Цена тура</p>";
			echo "<input type = number size = 10 name = 'price_change'><br>";
			echo "<p>Дата начала</p>";
			echo "<input type= 'text' name= 'date_begin_change' placeholder='YYYY-MM-DD' required pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}'><br>";
			echo "<p>Дата конца</p>";
			echo "<input type= 'text' name= 'date_end_change' placeholder='YYYY-MM-DD' required pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}'><br>";
			echo "<input type = submit value = 'Изменить' name = 'change'><br>";
			echo "</form>";

			if(isset($_POST['change'])){
			$id = $_POST['id'];
			$red = R::load('tour',$id);
			$red->type_tour = $_POST['tour_type_change'];
			$red->date_begin = $_POST['date_begin_change'];
			$red->date_end = $_POST['date_end_change'];
			$red->price = $_POST['price_change'];
			$red->hotel = $_POST['hotel_change'];
			$red->gorod = $_POST['gorod_change'];
				R::store($red);
				
		echo ($red)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при изменении данных";

		}

		echo "</div>";


	?>

	<div class="available_tours">
	<?php echo '<table border="1">';

	
	$sql= R::getALL('select  tour.id,type_tour.type,gorog.name,hotel.stars,hotel.names,tour.price,hotel.price2,tour.date_begin,tour.date_end
				from tour 
				inner join hotel on tour.hotel=hotel.id 
				inner join gorog on tour.gorod=gorog.id
				inner join type_tour on tour.type_tour=type_tour.id
				 ');
			

			
			if($sql){
			echo "<tr>";
			echo "<th>ID</th>" ;
			echo "<th>Тип тура</th>";
			echo "<th>Город</th>"; 
			echo "<th>Название отеля</th>";
			echo "<th>Цена тура</th>"; 
			echo "<th>Дата начала</th>";
			echo "<th>Дата конца</th>";
			echo "<th></th>";
			echo "<th></th>";
			echo "</tr>";
				foreach ($sql as $sql) {

			echo "<tr>";
			echo "<th>" .  $sql['id'] . "</th>" ;
			echo "<th>" . $sql['type'] . "</th>";
			echo "<th>" . $sql['name'] . "</th>"; 
			echo "<th>" . $sql['names'] . "</th>";
			echo "<th>" . $sql['price'] . "</th>"; 
			echo "<th>" . $sql['date_begin'] . "</th>";
			echo "<th>" . $sql['date_end'] . "</th>";
			echo "<th><a href='?del_id= ".$sql['id']."'>Удалить</a></th>";
			echo "</tr>";
				

			}

		}

	echo "</table>";
	echo "</div>";


	if (isset($_GET['del_id'])) {
		$del = R::exec('SET foreign_key_checks = 0; Delete from tour where id = ?',array($_GET['del_id']));

		if (isset($del)) {

			echo ($del)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
		} }?>
	
	</div>

	</div>



	<a href="#" onclick="openbox('div_city'); return false" class="button_tour"><h1 style="margin: 30px;">Города</h1></a>
	


	<div id="div_city">

	<a href="#" onclick="openbox('add_city'); return false" class="button_tour">Добавить город</a><br>
	

	<div id="add_city">

	
	<?php
	echo "<form action = '' method='post'>";
	
	echo "<p>Город</p>";
	echo "<input type = text size = 10 name = 'city'><br>";
	echo "<p>Страна</p>";

	echo "<select name = city_land>";
	$city_land =  R::getALL('select  land.names,land.id from land  ');

	foreach ($city_land as $city_land) {
			      	echo "<option value = ".$city_land['id'].">" .$city_land['names']. "</option>";
			      }
			  

			echo "</select><br>";

	echo "<p>Изображение</p>";
	echo "<input type = text size = 10 name = 'image'><br>";
	echo "<p>Описание города</p>";
	echo "<textarea rows='10' cols='45' name = 'description' ></textarea><br>";
	 
	echo "<input type = submit value = 'Добавить' name = 'add_city'><br>";
	echo "</form>";

	if(isset($_POST['add_city'])){

		
		$city_land = $_POST['city_land'];


		$gorog = R::dispense('gorog');
		
		$gorog->name = $_POST['city'];
		$gorog->land = $city_land;
		$gorog->image = $_POST['image'];
		$gorog->description = $_POST['description'];
				R::store($gorog);
		echo ($gorog)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
	}

	?>

	
	</div>
	
	<a href="#" onclick="openbox('change_city'); return false" class="button_tour">Изменить город</a>
	<?php

		echo "<div id='change_city'>";
			echo "<form action = '' method='post'>";
	
			echo "<p>ID</p>";
			echo "<select name = 'id'>";
			$id =  R::getALL('select  gorog.id from gorog');


			    foreach ($id as $id) {
			      	echo "<option value = ".$id['id'].">" .$id['id']. "</option>";
			      }

			echo "</select><br>";

			echo "<p>Город</p>";
			echo "<input type= 'text' name= 'city_change'><br>";


			echo "<p>Страна </p>";
			echo "<select name = land_change>";

			$land_change =  R::getALL('select  land.names,land.id from land ');


			    foreach ($land_change as $land_change) {
			      	echo "<option value = ".$land_change['id'].">" .$land_change['names']. "</option>";
			      }
			  

			echo "</select><br>";

			echo "<p>Изображение</p>";
			echo "<input type = text size = 30 name = 'image'><br>";

			echo "<p>Описание</p>";
			echo "<textarea rows='10' cols='45' name = 'description'></textarea><br>";
			echo "<input type = submit name = 'submit_land' value = 'Изменить'><br>";
			

			if(isset($_POST['submit_land'])){


			$id = $_POST['id'];
			$red = R::load('gorog',$id);
			
			$red->name = $_POST['city_change'];
			$red->land = $_POST['land_change'];
			$red->image = $_POST['image'];
			$red->description = $_POST['description'];

				R::store($red);
				
		echo ($red)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при изменении данных";

		}

		echo "</div>";

		?>

	<div class="available_tours">
	<?php echo '<table border="1">';

	
	$sql= R::getALL('select  gorog.id,gorog.name,land.names,gorog.image,gorog.description
				from gorog
				inner join land on gorog.land=land.id 
				
				 ');
			

			
			if($sql){
			echo "<tr>";
			echo "<th>ID</th>" ;
			echo "<th>Город</th>"; 
			echo "<th>Страна</th>";
			echo "<th>Изображение</th>"; 
			echo "<th>Описание</th>";
			echo "</tr>";
				foreach ($sql as $sql) {

			echo "<tr>";
			echo "<th>" .  $sql['id'] . "</th>" ;
			echo "<th>" . $sql['name'] . "</th>"; 
			echo "<th>" . $sql['names'] . "</th>";
			echo "<th>" . $sql['image'] . "</th>";
			echo "<th>" . $sql['description'] . "</th>";
	
			echo "<th colspan='2'><a href='?del_id= ".$sql['id']."'>Удалить</a></th>";
			echo "</tr>";
				

			}

		}

	echo "</table>";
	echo "</div>";


	if (isset($_GET['del_id'])) {
		$del = R::exec('SET foreign_key_checks = 0; Delete from gorog where id = ?',array($_GET['del_id']));

		if (isset($del)) {

			echo ($del)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
		} }?>
	
	</div>






	<a href="#" onclick="openbox('div_land'); return false" class="button_tour"><h1 style="margin: 30px;">Страны</h1></a>

	
	<div id="div_land">
	

	
	<a href="#" onclick="openbox('add_land'); return false" class="button_tour">Добавить страну</a><br>

	<div id="add_land">

	<?php
	echo "<form action = '' method='post'>";
	
	echo "<p>Страна</p>";

	echo "<input type= 'text' name= 'land_name'><br>";
	echo "<input type = submit value = 'Добавить' name = 'exet_land'><br>";
	echo "</form>";

	if(isset($_POST['exet_land'])){


		$land = R::dispense('land');
				$land->names = $_POST['land_name'];
				R::store($land);
		echo ($land)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
	}

	?>
	</div>

	<a href="#" onclick="openbox('change_land'); return false" class="button_tour">Изменить страну</a><br>

	<div id="change_land">

	<?php

	$land_change = R::getALL('select land.names,land.id from land');

	echo "<form action = '' method='post'>";
	
	echo "<p>Страна</p>";

	echo "<p>ID</p>";
			echo "<select name = 'id'>";
			    foreach ($land_change as $land_change) {
			      	echo "<option value = ".$land_change['id'].">" .$land_change['id']. "</option>";
			      }

			echo "</select><br>";
	echo "<input type= 'text' name= 'land_name'><br>";
	echo "<input type = submit value = 'Изменить' name = 'change_land'><br>";
	echo "</form>";

	if(isset($_POST['change_land'])){


		$id = $_POST['id'];
			$change = R::load('land',$id);
			$change->names = $_POST['land_name'];
			R::store($change);
		echo ($change)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
	}

	?>
	</div>

	<div class="available_tours">
	<?php echo '<table border="1">';

	


	$land= R::getALL('select  land.id,land.names from land');
			

			
			if($land){
			echo "<tr>";
			echo "<th>ID</th>" ;
			echo "<th colspan = 2>Страна</th>";
			echo "</tr>";
				foreach ($land as $land) {

			echo "<tr>";
			echo "<th>" .  $land['id'] . "</th>" ;
			echo "<th>" . $land['names'] . "</th>";
			echo "<th><a href='?del_id_land= ".$land['id']."'>Удалить</a></th>";
			echo "</tr>";
				

			}

		}

	echo "</table>";
	echo "</div>";



	if (isset($_GET['del_id_land'])) {
		$del_land = R::exec('SET foreign_key_checks = 0; Delete from land where id = ? ',array($_GET['del_id_land']) );

		if (isset($del_land)) {

			echo ($del_land)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
		} }


    ?>


		
	</div>










	<a href="#" onclick="openbox('div_hotel'); return false" class="button_tour"><h1 style="margin: 30px;">Отели</h1></a>
	

	<div id="div_hotel">


	<a href="#" onclick="openbox('add_hotel'); return false" class="button_tour">Добавить отель</a><br>
	

	<div id="add_hotel">

	
	<?php
	echo "<form action = '' method='post'>";
	
	echo "<p>Название отеля</p>";
	echo "<input type = text name = 'add_names'><br>";
	echo "<p>Количество звезд</p>";
	echo "<input type = number name = 'add_stars'><br>";
	echo "<p>Город отеля</p>";
	$city = R::getALL('select gorog.id,gorog.name from gorog');
			echo "<select name = 'city'>";
			    foreach ($city as $city) {
			      	echo "<option value = ".$city['id'].">" .$city['name']. "</option>";
			      }

	echo "</select><br>";
	echo "<p>Тип размещения</p>";
	$type = R::getALL('select type_razmeshcheniya.type_razm, type_razmeshcheniya.id from type_razmeshcheniya');
			echo "<select name = 'type'>";
			    foreach ($type as $type) {
			      	echo "<option value = ".$type['id'].">" .$type['type_razm']. "</option>";
			      }

	echo "</select><br>";
	echo "<p>Цена</p>";
	echo "<input type = number name = 'price'><br>";
	echo "<p>Изображение</p>";
	echo "<input type = file name = 'image'><br>";
	echo "<input type = submit value = 'Добавить' name = 'add_hotel'><br>";
	echo "</form>";

	if(isset($_POST['add_hotel'])){

		$hotel = R::dispense('hotel');

		$hotel->names = $_POST['add_names'];
		$hotel->stars = $_POST['add_stars'];
		$hotel->gorod = $_POST['city'];
		$hotel->type_razmeshcheniya = $_POST['type'];
		$hotel->price2 = $_POST['price'];
		$hotel->image = $_POST['image'];


		R::store($hotel);
		

		echo ($hotel)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
	}

	?>

	
	</div>
	
	
	<a href="#" onclick="openbox('change_hotel'); return false" class="button_tour">Изменить отель</a>

	<?php
		echo "<div id='change_hotel'>";
			echo "<form action = '' method='post'>";
	
			echo "<p>ID</p>";
			echo "<select name = 'id'>";
			$id =  R::getALL('select  hotel.id from hotel');


			    foreach ($id as $id) {
			      	echo "<option value = ".$id['id'].">" .$id['id']. "</option>";
			      }

			echo "</select><br>";

			echo "<p>Название отеля</p>";
			echo "<input type = text name = 'add_names'><br>";
			echo "<p>Количество звезд</p>";
			echo "<input type = number name = 'add_stars'><br>";
			echo "<p>Город отеля</p>";
			$city = R::getALL('select gorog.id,gorog.name from gorog');
					echo "<select name = 'city'>";
					    foreach ($city as $city) {
					      	echo "<option value = ".$city['id'].">" .$city['name']. "</option>";
					      }

			echo "</select><br>";
			echo "<p>Тип размещения</p>";
			$type = R::getALL('select type_razmeshcheniya.type_razm, type_razmeshcheniya.id from type_razmeshcheniya');
					echo "<select name = 'type'>";
					    foreach ($type as $type) {
					      	echo "<option value = ".$type['id'].">" .$type['type_razm']. "</option>";
					      }

			echo "</select><br>";
			echo "<p>Цена</p>";
			echo "<input type = number name = 'price'><br>";
			echo "<p>Изображение</p>";
			echo "<input type = file name = 'image'><br>";
			echo "<input type = submit name = 'change_hotel' value = 'Изменить'><br>";
			

			if(isset($_POST['change_hotel'])){


			$id = $_POST['id'];
			$red = R::load('hotel',$id);
			
			$red->names = $_POST['add_names'];
			$red->stars = $_POST['add_stars'];
			$red->gorod = $_POST['city'];
			$red->type_razmeshcheniya = $_POST['type'];
			$red->price2 = $_POST['price'];
			$red->image = $_POST['image'];



				R::store($red);
				
		echo ($red)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при изменении данных";

		}

		echo "</div>";

		?>

	<div class="available_tours">
	<?php echo '<table border="1">';

	
	$hotel= R::getALL('select hotel.id,hotel.names,hotel.stars,gorog.name,type_razmeshcheniya.type_razm,hotel.price2,hotel.image from hotel inner join gorog on hotel.gorod=gorog.id inner join type_razmeshcheniya on hotel.type_razmeshcheniya=type_razmeshcheniya.id
				
				 ');
			

			
			if($hotel){
			echo "<tr>";
			echo "<th>ID</th>" ;
			echo "<th>Название</th>"; 
			echo "<th>Количество звезд</th>"; 
			echo "<th>Город</th>";
			echo "<th>Тип размещения</th>"; 
			echo "<th>Цена</th>";
			echo "<th>Изображение</th>";
			echo "</tr>";
				foreach ($hotel as $hotel) {

			echo "<tr>";
			echo "<th>" .  $hotel['id'] . "</th>" ;
			echo "<th>" . $hotel['names'] . "</th>"; 
			echo "<th>" . $hotel['stars'] . "</th>";
			echo "<th>" . $hotel['name'] . "</th>";
			echo "<th>" . $hotel['type_razm'] . "</th>";
			echo "<th>" . $hotel['price2'] . "</th>";
			echo "<th>" . $hotel['image'] . "</th>";
	
			echo "<th colspan='2'><a href='?del_id= ".$hotel['id']."'>Удалить</a></th>";
			echo "</tr>";
				

			}

		}

	echo "</table>";
	echo "</div>";


	if (isset($_GET['del_id'])) {
		$del = R::exec('SET foreign_key_checks = 0; Delete from gorog where id = ?',array($_GET['del_id']));

		if (isset($del)) {

			echo ($del)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
		} }?>

	</div>




















	<a href="#" onclick="openbox('div_type_tour'); return false" class="button_tour"><h1 style="margin: 30px;">Тип тура</h1></a>
	

	<div id="div_type_tour">


	<a href="#" onclick="openbox('add_type'); return false" class="button_tour">Добавить тип тура</a><br>

	<div id="add_type">

	<?php

	echo "<form action = '' method='post'>";
	
	echo "<p>Тип тура</p>";

	echo "<input type= 'text' name= 'type_name'><br>";
	echo "<input type = submit value = 'Добавить' name = 'add_type'><br>";
	echo "</form>";

	if(isset($_POST['add_type'])){

		R::ext('xdispense', function($table_name){
		return R::getRedBean()->dispense($table_name);
		});
		
		$type = R::xdispense('type_tour');

		$type->type = $_POST['type_name'];

		R::store($type);

		echo ($type)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";

	}

	?>
	</div>

	<a href="#" onclick="openbox('change_type'); return false" class="button_tour">Изменить тип тура</a><br>

	<div id="change_type">

	<?php

	$type_change = R::getALL('select type_tour.type,type_tour.id from type_tour');

	echo "<form action = '' method='post'>";
	
	echo "<p>ID</p>";
			echo "<select name = 'type_id'>";
			    foreach ($type_change as $type_change) {
			      	echo "<option value = ".$type_change['id'].">" .$type_change['id']. "</option>";
			      }

			echo "</select><br>";
	echo "<input type= 'text' name= 'type_name'><br>";
	echo "<input type = submit value = 'Изменить' name = 'change_type'><br>";
	echo "</form>";

	if(isset($_POST['change_type'])){


		$type_id = $_POST['type_id'];
			$change_type = R::load('type_tour',$type_id);
			$change_type->type = $_POST['type_name'];
			R::store($change_type);
		echo ($change_type)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
	}

	?>
	</div>


	<div class="available_tours">
	<?php echo '<table border="1">';

	


	$type= R::getALL('select  type_tour.id,type_tour.type from type_tour');
			

			
			if($type){
			echo "<tr>";
			echo "<th>ID</th>" ;
			echo "<th colspan = 2>Тип тура</th>";
			echo "</tr>";
				foreach ($type as $type) {

			echo "<tr>";
			echo "<th>" .  $type['id'] . "</th>" ;
			echo "<th>" . $type['type'] . "</th>";
			echo "<th><a href='?del_id_type= ".$type['id']."'>Удалить</a></th>";
			echo "</tr>";
				

			}

		}

	echo "</table>";
	echo "</div>";



	if (isset($_GET['del_id_type'])) {
		$del_type = R::exec('SET foreign_key_checks = 0; Delete from land where id = ?',array($_GET['del_id_type']));

		if (isset($del_type)) {

			echo ($del_type)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
		} }


    ?>
	</div>







	
<!--
	<a href="#" onclick="openbox('div_type_razm'); return false" class="button_tour"><h1 style="margin: 30px;">Тип размещения</h1></a>
	

	<div id="div_type_razm">



	<a href="#" onclick="openbox('add_razm'); return false" class="button_tour">Добавить тип размещения</a><br>

	<div id="add_razm">

	<?php
	/*
	echo "<form action = '' method='post'>";
	
	echo "<p>Тип размещения</p>";

	echo "<input type= 'text' name= 'type_razm'><br>";
	echo "<input type = submit value = 'Добавить' name = 'add_razm'><br>";
	echo "</form>";

	if(isset($_POST['add_razm'])){

		R::ext('xdispense', function($table_name){
		return R::getRedBean()->dispense($table_name);
		});
		
		$razm = R::xdispense('type_razmeshcheniya');

		$razm->type_razm = $_POST['type_razm'];

		R::store($razm);

		echo ($razm)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
	}
*/
	?>
	</div>

	<a href="#" onclick="openbox('change_razm'); return false" class="button_tour">Изменить тип размещения</a><br><br>

	<div id="change_razm">

	<?php
/*
	$type_razm = R::getALL('select type_razmeshcheniya.id, type_razmeshcheniya.type_razm from type_razmeshcheniya');

	echo "<form action = '' method='post'>";
	
	echo "<p>ID</p>";
			echo "<select name = 'type_razm'>";
			    foreach ($type_razm as $type_razm) {
			      	echo "<option value = ".$type_razm['id'].">" .$type_razm['id']. "</option>";
			      }

			echo "</select><br>";
	echo "<p>Тип размещения</p>";
	echo "<input type= 'text' name= 'razm_name'><br>";
	echo "<input type = submit value = 'Изменить' name = 'change_razm'><br>";
	echo "</form>";

	if(isset($_POST['change_razm'])){


		$type_razm = $_POST['type_razm'];
			$change_razm = R::load('type_razmeshcheniya',$type_razm);
			$change_razm->type_razm = $_POST['razm_name'];
			R::store($change_razm);
		echo ($change_razm)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
	}
*/
	?>
	</div>


	<div class="available_tours">
	<?php/* echo '<table border="1">';

	


	$razm= R::getALL('select  type_razmeshcheniya.id,type_razmeshcheniya.type_razm from type_razmeshcheniya');
			

			
			if($type){
			echo "<tr>";
			echo "<th>ID</th>" ;
			echo "<th colspan = 2>Тип тура</th>";
			echo "</tr>";
				foreach ($razm as $razm) {

			echo "<tr>";
			echo "<th>" .  $razm['id'] . "</th>" ;
			echo "<th>" . $razm['type_razm'] . "</th>";
			echo "<th><a href='?del_id_razm= ".$razm['id']."'>Удалить</a></th>";
			echo "</tr>";
				

			}

		}

	echo "</table>";
	echo "</div>";



	if (isset($_GET['del_id_razm'])) {
		$del_razm = R::exec('SET foreign_key_checks = 0; Delete from type_razmeshcheniya where id = ?',array($_GET['del_id_razm']));

		if (isset($del_razm)) {

			echo ($del_razm)?"<script>document.location.replace('admin.php');</script>":"Произошла ошибка при добавлении данных";
		} }

*/
    ?>
-->
	</div>
</div>

	<?php require_once "blocks/footer.php" ?>

</body>
</html>