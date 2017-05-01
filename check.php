<?php
	// Sprawdzenie, czy podany adres mailowy podany w formularzu rejestracji osoby wspomaganej/terapeuty jest zajęty, używany w register.ph
	require_once "connect.php"; 

	$email = $_POST['email'];
	
	$sql = "SELECT id FROM accounts WHERE email = '$email';";

	if ($result = $connect->query($sql)) {
		$count = $result->num_rows;
	}
	echo $count;
	$connect->close();
?>