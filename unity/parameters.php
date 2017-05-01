<?php
	header('Content-type: text/html; charset=utf-8');
	require_once 'connect.php';

	$email = $_REQUEST["email"];
	$game = $_REQUEST["game"];

	$sql = "SELECT param1, param2, date FROM settings WHERE email = '$email' AND game = '$game';";

	$result = $connect->query($sql);

	while ($data = mysqli_fetch_assoc($result)) {
		$parameters = array("minBlowStrength" => $data["param1"], "speed" => $data["param2"], "date" => $data["date"]);
	}

	$json = $parameters;

	header('content-type: application/json');
	echo json_encode($json, JSON_FORCE_OBJECT);

	mysqli_close($connect);
?>