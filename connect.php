<?php 
	// Nawiązywanie połączenia z bazą danych
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "edmuch";

	$connect = new mysqli($servername, $username, $password, $dbname);
	$connect->query("SET CHARSET utf8");
	$connect->query("SET NAMES `utf8` COLLATE `utf8_unicode_ci`");
?>