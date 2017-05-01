<?php
	// Wybranie rodzica jako odbiorcę wiadomości
	session_start();
	require_once "connect.php";

	$i = $_REQUEST['io'];
	$parent = $_SESSION['parent'];

	$sql = "SELECT email FROM accounts WHERE id = '$parent[$i]'";

	if ($result = $connect->query($sql)) {
			while ($row = $result->fetch_assoc()) {
			$toparent = $row['email'];
		}
	}
	echo $toparent;

	$connect->close();

?>