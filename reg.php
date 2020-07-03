<?php require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "Регистрация";
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
		if(isset($data['do_signup']))
		{


			$errors = array();
			if(trim($data['login']) == ''){
				$errors[] = 'Введите логин!!!';
			}
			if(trim($data['name']) == ''){
				$errors[] = 'Введите Имя!!!';
			}
			if(trim($data['surname']) == ''){
				$errors[] = 'Введите Фамилию!!!';
			}
			if(trim($data['email']) == ''){
				$errors[] = 'Введите email!!!';
			}
			if(trim($data['phone']) == ''){
				$errors[] = 'Введите ваш номер телефона!!!';
			}

			if($data['password'] == ''){
				$errors[] = 'Введите пароль!!!';
			}


			if($data['password_2'] != $data['password']){
				$errors[] = 'Ваши пароли не совпадают!!!';
			}

			if(R::count('clients' , "login = ?", array($data['login'])) > 0 )

			 {
			 	$errors[] = 'Пользователь с таким логином уже существует!!!';
			 }

			 if(R::count('clients' , "email = ?", array($data['email'])) > 0 )

			 {
			 	$errors[] = 'Пользователь с таким email уже существует!!!';
			 }



			if(empty($errors)){
				echo '<br><div class="reg">Вы зарегистрировалить. Ваш логин - '. $data['login'] .'</div><br><br>';
				$user = R::dispense('clients');
				$user->login = $data['login'];
				$user->name = $data['name'];
				$user->surname = $data['surname'];
				$user->email = $data['email'];
				$user->phone = $data['phone'];
				$user->password = password_hash($data['password'],PASSWORD_DEFAULT);
				R::store($user);
				



			}else
			{
			echo '<br><div class="reg">'.array_shift($errors).'</div><br><br>';
			}
		}
		?>


		<form action="reg.php" method="POST" class="form">


			<p>
				<p><strong>Введите ваш логин</strong></p>
				<input type="text" name="login" value="<?php echo @$data['login'] ?>">
			</p>
			<p>
				<p><strong>Введите ваше имя</strong></p>
				<input type="text" name="name" value="<?php echo @$data['name'] ?>">
			</p>
			<p>
				<p><strong>Введите вашу фамилию</strong></p>
				<input type="text" name="surname" value="<?php echo @$data['surname'] ?>">
			</p>
			<p>
				<p><strong>Введите ваш email</strong></p>
				<input type="email" name="email" value="<?php echo @$data['email'] ?>">
			</p>
			<p>
				<p><strong>Введите ваш номер телефона</strong></p>
				<input type="password" name="phone" value="<?php echo @$data['phone'] ?>">
			</p>
			<p>
				<p><strong>Введите ваш пароль</strong></p>
				<input type="text" name="password" value="<?php echo @$data['password'] ?>">
			</p>
			<p>
				<p><strong>Введите ваш пароль еще раз</strong></p>
				<input type="password" name="password_2" value="<?php echo @$data['password_2'] ?>">
			</p><br>
			<button type="submit" name="do_signup" class="find_tour">Зарегистрироваться</button><br>
		</form>


		
		<a href="index.php"><button type="submit" class="back">Назад на главную</button></a>
			

	</div>

		<?php
		require_once "blocks/footer.php" ;

	?>



	

</body>
</html>