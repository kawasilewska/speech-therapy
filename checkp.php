<?php
	// Sprawdzenie, czy podany adres mailowy podany w formularzu rejestracji rodzica jest zajęty, używany w register.php
	require_once "connect.php"; 

	$email = $_POST['email'];
	
	$sql = "SELECT id FROM accounts WHERE email = '$email';";

	if ($result = $connect->query($sql)) {
		$count = $result->num_rows;
	}
	echo $count;
	$connect->close();
?>