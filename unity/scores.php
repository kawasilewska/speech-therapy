<?php
	header('Content-type: text/html; charset=utf-8');
	require_once 'connect.php';

	$email = $_REQUEST["email"];
	$game = $_REQUEST["game"];

	$sql = "SELECT points1, points2, points3, totalPoints, date FROM results WHERE email = '$email' AND game = '$game';";

	$result = $connect->query($sql);

	while ($data = mysqli_fetch_assoc($result)) {
		$scores = array("points1" => $data["points1"], "points2" => $data["points2"], "points3" => $data["points3"], "totalPoints" => $data["totalPoints"], "date" => $data["date"]);
	}

	$json = $scores;

	header('content-type: application/json');
	echo json_encode($json, JSON_FORCE_OBJECT);

	mysqli_close($connect);
?>