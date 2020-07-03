<?php require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "Авторизация";
		require_once "blocks/head.php" ;

	?>

</head>
<body>
	
	<?php 
		require_once "/blocks/header.php" ;	
	?>



	<div id="wrapper">

	<?php
		

		$data = $_POST;

		if(isset ($data['do_autorisation']))
		{
			$errors = array();
			$user = R::findOne( 'clients', 'login = ?' , array($data['login']) );

			if($user){

				if(password_verify( $data['password'] , $user -> password )){

					$_SESSION['logged_user'] = $user;
					echo '<br><div class="reg">Вы авторизовались. Ваш логин - '. $data['login'] .'</div><br><br>';

				}	
				else{
					$errors[] = 'Пароль введен неправильно!!!';
				}
			}

			else{
				$errors[] = 'Пользователь с таким логином не найден!!!'; }

			if($errors){

			echo '<br><div class="reg">'.array_shift($errors).'</div><br><br>';

			}

		}



	?>

		<form action="autorisation.php" method="POST" class="form">


			<p>
				<p><strong>Введите ваш логин</strong></p>
				<input type="text" name="login" value="<?php echo @$data['login'] ?>">
			</p>

			<p>
				<p><strong>Введите ваш пароль</strong></p>
				<input type="password" name="password" value="<?php echo @$data['password'] ?>">
			</p>


			<button type="submit" name="do_autorisation" class="find_tour" id="autor">Авторизоваться</button><br>
		</form>


		
		<a href="index.php"><button type="submit" class="back">Назад на главную</button></a>
			

	</div>

		<?php
		
		require_once "blocks/footer.php" ;

	?>



	

</body>
</html>