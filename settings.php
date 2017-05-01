<?php
	// Zmiana parametrów warunkujących poziom trudności gry terapeutycznej, używany w scorest.php
	require_once "connect.php";

	if ($connect->connect_error!=0) 
	{
		die("Connection failed: " . $connect->connect_error);
	} else 
	{
		$email = $_POST['email'];
		$game = $_POST['game'];
		$param1 = $_POST['param1'];
		$param2 = $_POST['param2'];

		$sql = "UPDATE settings SET param1 ='$param1', param2 = '$param2' WHERE email = '$email' AND game = '$game'";
		$connect->query($sql);
	}
	$connect->close();
?>

