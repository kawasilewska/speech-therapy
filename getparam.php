<?php
	// Pobieranie z bazy danych etykiet z parametrami warunkującymi zmianę trudności gry terapeutycznej
	require_once "connect.php";

	if ($connect->connect_error!=0) 
	{
		die("Connection failed: " . $connect->connect_error);
	} else 
	{
		$email = $_REQUEST['email'];
		$game = $_REQUEST['game'];

		$sql = "SELECT param1, param2 FROM settings WHERE email = '$email' AND game = '$game'";

		if ($result = $connect->query($sql)) {
			while ($row = $result->fetch_assoc()) {
				$param1 = $row['param1'];
				$param2 = $row['param2'];
			}
		}

		$sql = "SELECT param1Text, param2Text FROM games WHERE name = '$game'";

		if ($result = $connect->query($sql)) {
			while ($row = $result->fetch_assoc()) {
				$param1Text = $row['param1Text'];
				$param2Text = $row['param2Text'];
			}
		}
	}

	$data = array($param1, $param2, $param1Text, $param2Text);
	echo json_encode($data);
	$connect->close();
?>

