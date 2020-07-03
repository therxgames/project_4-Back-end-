<?php
	require "database/db.php";
	unset($_SESSION['logged_user']);
	header("Location: /");
?>