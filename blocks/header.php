
	<header>



		<div class="logo">
			    <a href = "./index.php"><img src="images/logo-white.png"></a>
		</div>

		<div id="menuHead">
			<a href="/tours.php">
				<div>Найти тур</div>
			</a>

			<a href="/lands.php">
				<div>Страны</div>
			</a>

			<a href='/hotels.php'>
				<div>Отели</div>
			</a>

			<?php
				if($_SESSION['logged_user']-> root=="1"){

					echo "<a href='./admin.php'>
					<div>Админка</div>
					</a>";

				} 
				else{
					echo "<a href='./about.php'>
					<div>О нас</div>
					</a>";
				}

			?>
		

		
		</div>

		<?php 
		if(isset($_SESSION['logged_user'])) : ?>
		
		<?php echo '<div class="regAuth" style = "color: black;  font-size:1.3em; text-align:right;"; >
		Здравствуйте  '	 .  $_SESSION['logged_user'] -> login .

		'<button class = "log_out"><a href = "logout.php" style = "padding-left:10px; font-size:0.7em;" > Выйти </a></button></div>';?>
		


		<?php else: ?>
			<div class ="regAuth">
				<a href="/autorisation.php" style="color: blue; font-weight: bold;">Авторизация</a>
				|
				<a href="/reg.php" style="color: blue; font-weight: bold;">Регистрация</a>
			</div>
		<?php endif ?>


	</header>