<?php
	// Generowanie wykresów, używany w myscores.php, scoresr.php, scorest.php
	header('Content-Type: text/html; charset=utf-8');
	require_once 'connect.php';

	$email = $_GET['email'];
	$game = $_GET['game'];

	$points1 = array();
	$points2 = array();
	$points3 = array();
	$totalPoints = array();
	$btime = array();
	$date = array();
	
	$sql = "SELECT points1, points2, points3, totalPoints, btime, DATE(date) AS date FROM results  WHERE email = '$email' AND game = '$game';";
	
	if ($result = $connect->query($sql)) {
		while ($row = $result->fetch_assoc()) {
			$points1[] = $row['points1'];
			$points2[] = $row['points2'];
			$points3[] = $row['points3'];
			$totalPoints[] = $row['totalPoints'];
			$btime[] = $row['btime'];
			$date[] = $row['date'];
		}
	}
	echo "<br /><div style = 'display: inline-block'>Suma punktów<br />";
	echo "<canvas id='score' width='600' height='300'></canvas></div><div style = 'display: inline-block'>Czas dmuchania <br />
		  <canvas id='btime' width='600' height='300'></canvas></div>";
	echo "<script>
		var data = {

			labels: ".json_encode($date).",
			datasets : [
			{
				fillColor : 'rgba(172,194,132,0.0)',
				strokeColor : '#26667F',
				pointColor : '#26667F',
				pointStrokeColor : '#26667F',
				data : ".json_encode($totalPoints)."
			}
			]
		};

		var score = document.getElementById('score').getContext('2d');
		new Chart(score).Line(data, {
		bezierCurve : false,
		});
		</script>";

	echo "<script>
		var data = {
			labels: ".json_encode($date).",
			datasets : [
			{
				fillColor : 'rgba(172,194,132,0.0)',
				strokeColor : '#26667F',
				pointColor : '#26667F',
				pointStrokeColor : '#26667F',
				data : ".json_encode($btime)."
			}
			]
		};

		var btime = document.getElementById('btime').getContext('2d');
		new Chart(btime).Line(data, {
		bezierCurve : false,
		});
		</script>";

	echo "<br /><br /><div style = 'display: inline-block'>Punkty uzyskane w poziomie pierwszym<br />";
	echo "<canvas id='score1' width='400' height='200'></canvas></div><div style = 'display: inline-block'>Punkty uzyskane w poziomie drugim <br />
		  <canvas id='score2' width='400' height='200'></canvas></div><div style = 'display: inline-block'>Punkty uzyskane w poziomie trzecim <br />
		  <canvas id='score3' width='400' height='200'></canvas></div>";
	
	echo "<script>
		var data = {

			labels: ".json_encode($date).",
			datasets : [
			{
				fillColor : 'rgba(172,194,132,0.0)',
				strokeColor : '#26667F',
				pointColor : '#26667F',
				pointStrokeColor : '#26667F',
				data : ".json_encode($points1)."
			}
			]
		};

		var score1 = document.getElementById('score1').getContext('2d');
		new Chart(score1).Line(data, {
		bezierCurve : false,
		});
		</script>";

	echo "<script>
		var data = {
			labels: ".json_encode($date).",
			datasets : [
			{
				fillColor : 'rgba(172,194,132,0.0)',
				strokeColor : '#26667F',
				pointColor : '#26667F',
				pointStrokeColor : '#26667F',
				data : ".json_encode($points2)."
			}
			]
		};

		var score2 = document.getElementById('score2').getContext('2d');
		new Chart(score2).Line(data, {
		bezierCurve : false,
		});
		</script>";
	
	echo "<script>
		var data = {
			labels: ".json_encode($date).",
			datasets : [
			{
				fillColor : 'rgba(172,194,132,0.0)',
				strokeColor : '#26667F',
				pointColor : '#26667F',
				pointStrokeColor : '#26667F',
				data : ".json_encode($points3)."
			}
			]
		};

		var score3 = document.getElementById('score3').getContext('2d');
		new Chart(score3).Line(data, {
		bezierCurve : false,
		});
		</script>";
							
	$connect->close();
?>