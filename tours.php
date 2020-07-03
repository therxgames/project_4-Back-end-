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


	<form action="available_tours.php" method="post">
	<div class='tours'>
		
		<h2 class="funny-title section-title">Выберите туры по самым низким ценам</h2>

		<button  class="buttons">Город</button>

		<button value="Тип Отеля" class="buttons">Тип отеля</button>

		<button value="Тип Тура" class="buttons">Тип тура</button>
		<button value="Количество людей"" class="buttons">Тип номера</button>

		<button value="Количество людей"" class="buttons">Количество людей</button>




		<div id="cities"">

		<?php

			$cities = R::GetALL('select gorog.name,gorog.id from gorog');

			foreach ($cities as $cities) {
	      	echo "<label><input type = 'radio' value = ".$cities['id']." name='question1' required>" .$cities['name']. "</label><br>";
	      	}
		?>
		
		
		</div>

		

		<div id="hotels" ">
		

			<label><input type = 'radio' value = "3" name='question2' required> 3 - х звездочный</label><br>
			<label><input type = 'radio' value = "4" name='question2' required> 4 - х звездочный</label><br>
			<label><input type = 'radio' value = "5" name='question2' required> 5 - ти звездочный</label><br>
	  



		</div>

		

		<div id="type_tour">
		<?php
			$type = R::GetALL('select  type_tour.type,type_tour.id from type_tour');

			foreach ($type as $type) {
	      	echo "<label><input type = 'radio' value = ".$type['id']." name='question3' required>" .$type['type']. "</label><br>";
	      	}
		?>	
		</div>

		<div id="nomer">
			
			<label><input type=radio name="question5"  value = "1" required > Одноместный </label><br>
			<label><input type=radio name="question5"  value = "2" required > Двуместный </label><br>
			<label><input type=radio name="question5"  value = "3" required > Трехместный </label><br>
			<label><input type=radio name="question5"  value = "4" required > Четырехместный </label><br>
			
		</div>

		<div id="people">
			
			<label><input type='text' pattern="[0-9]" name="question4" class="kol_people" required > </label>
			
		</div>



	</div>
	
	
		<div class="panel">
			<button type="submit" name="zak_tour" class="find_tour">Найти тур</button>
		</div>
	</form>




	<?php



		if(isset($_POST['zak_tour'])){


			if($_POST['question1']!='' && $_POST['question2']!='' && $_POST['question3']!=''  && $_POST['question4']!='' && $_POST['question5']!=''){

			require_once "available_tours.php";}
   			
			   
		
		}
		
			

		

		



	?>

	<?php require_once "blocks/footer.php" ?>


</body>
</html>