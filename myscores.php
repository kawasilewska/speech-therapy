<?php
		header('Content-Type: text/html; charset=utf-8');
		session_start();		
		
		if (!isset ($_SESSION['zalogowany']))						
		{
			header('Location: index.php');
			exit();
		}
?>
<!-- Strona odpowiedzialna za wyświetlanie wyników w postaci wykresów na koncie osoby wspomaganej -->
<!DOCTYPE html>
<html lang="pl">
  	<head>
  		<!-- Deklaracja metadanych -->
	    <meta charset="utf-8" />
	    <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>eDmuch | Wyniki</title>

	    <!-- Deklaracja arkuszy stylów -->
	    <link rel="stylesheet" href="css/foundation.css" />
	    <link rel="stylesheet" href="css/app.css" />
	    <link rel="stylesheet" type="text/css" href="css/style_scores.css" />

	    <!-- Deklaracja czcionek -->
	    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin-ext' rel='stylesheet' type='text/css'>
	    <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin-ext' rel='stylesheet' type='text/css'>

	    <!-- Deklaracja skryptów JS umożliwiających wygenerowanie wykresów -->
	    <script src='Chart.js'></script>
		<script src='legend.js'></script>
	 
		<?php
			require_once "connect.php"; 

			if ($connect->connect_error!=0) 
			{
				die("Connection failed: " . $connect->connect_error);
			} else 
			{
				$email = $_SESSION['email'];
				$points1 = array();
				$points2 = array();
				$points3 = array();
				$totalPoints = array();
				$btime = array();
				$date = array();

				$sql = "SELECT points1, points2, points3, totalPoints, btime, 
				DATE(date) AS date FROM results  WHERE email = '$email'";
				
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
				$connect->close();
			}
		?>

	</head>

	<body>

	<!-- Nagłówek -->
    <header id="header">
        <div class="row" id="a">
            <div class="small-12 medium-12 large-12 columns">
                <?php
					echo "<h1>Wyniki ".$_SESSION['username']." ";
					echo $_SESSION['userlastname']. '</h1>';
				?>
            </div>
        </div>
        <div class="row" id="b">
			<div class="small-12 medium-12 large-12 columns">
			    <h3>Panel osoby wspomaganej</h3>
			</div>
		</div>
    </header>
	
	<div id="content">
		<!-- Tytuły górnych wykresów -->
		<div style = 'display: inline-block'>Suma punktów<br /><canvas id='score' width='600' height='300'></canvas></div>
		<div style = 'display: inline-block'>Czas dmuchania <br /><canvas id='btime' width='600' height='300'></canvas></div>

		<script>
			var data = {
				labels: <?php echo json_encode($date) ?>,
				datasets : [
				{
					fillColor : 'rgba(172,194,132,0.0)',
					strokeColor : '#26667F',
					pointColor : '#26667F',
					pointStrokeColor : '#26667F',
					data : <?php echo json_encode($totalPoints) ?>
				}
				]
			};

			var score = document.getElementById('score').getContext('2d');
			new Chart(score).Line(data, {
				bezierCurve : false,
			});
		</script>

		<script>
			var data = {
				labels: <?php echo json_encode($date) ?>,
				datasets : [
				{
					fillColor : 'rgba(172,194,132,0.0)',
					strokeColor : '#26667F',
					pointColor : '#26667F',
					pointStrokeColor : '#26667F',
					data : <?php echo json_encode($btime) ?>
				}
				]
			};

			var btime = document.getElementById('btime').getContext('2d');
			new Chart(btime).Line(data, {
				bezierCurve : false,
			});
		</script>

		<!-- Tytuły dolnych wykresów -->
		<br /><br /><div style = 'display: inline-block'>Punkty uzyskane w poziomie pierwszym<br /><canvas id='score1' width='400' height='200'></canvas></div>
		<div style = 'display: inline-block'>Punkty uzyskane w poziomie drugim <br /><canvas id='score2' width='400' height='200'></canvas></div>
		<div style = 'display: inline-block'>Punkty uzyskane w poziomie trzecim <br /><canvas id='score3' width='400' height='200'></canvas></div>
	
		<script>
			var data = {
				labels: <?php echo json_encode($date) ?>,
				datasets : [
				{
					fillColor : 'rgba(172,194,132,0.0)',
					strokeColor : '#26667F',
					pointColor : '#26667F',
					pointStrokeColor : '#26667F',
					data : <?php echo json_encode($points1) ?>
				}
				]
			};

			var score1 = document.getElementById('score1').getContext('2d');
			new Chart(score1).Line(data, {
				bezierCurve : false,
			});
		</script>

		<script>
			var data = {
				labels: <?php echo json_encode($date) ?>,
				datasets : [
				{
					fillColor : 'rgba(172,194,132,0.0)',
					strokeColor : '#26667F',
					pointColor : '#26667F',
					pointStrokeColor : '#26667F',
					data : <?php echo json_encode($points2) ?>
				}
				]
			};

			var score2 = document.getElementById('score2').getContext('2d');
			new Chart(score2).Line(data, {
				bezierCurve : false,
			});
		</script>

		<script>
			var data = {
				labels: <?php echo json_encode($date) ?>,
				datasets : [
				{
					fillColor : 'rgba(172,194,132,0.0)',
					strokeColor : '#26667F',
					pointColor : '#26667F',
					pointStrokeColor : '#26667F',
					data : <?php echo json_encode($points3) ?>
				}
				]
			};

			var score3 = document.getElementById('score3').getContext('2d');
			new Chart(score3).Line(data, {
				bezierCurve : false,
			});
		</script>
	</div>

		<footer>2015 &copy; Politechnika Gdańska. Wszelkie prawa zastrzeżone.</footer>

		<!-- Deklaracja skryptów JS -->
	    <script src="js/vendor/jquery.min.js"></script>
	    <script src="js/vendor/what-input.min.js"></script>
	    <script src="js/foundation.min.js"></script>
	    <script src="js/app.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	</body>
</html>