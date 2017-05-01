<!-- Strona odpowiedzialna za wyświetlanie wyników w postaci wykresów na koncie rodzica -->

<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();		
	
	if (!isset ($_SESSION['zalogowany']))								
	{
		header('Location: index.php');
		exit();
	}
?>

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
	    <script src='js/Chart.js'></script>
		<script src='js/legend.js'></script>
	
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#usera").ready(function() {
					var user = $("#usera").val();
					var game = $("#game").val();

					$("#wykres").load("wykres.php?email=" + user + "&game=" + game);
				});

				$("#usera").change(function() {
					var user = $("#usera").val();
					var game = $("#game").val();
				
					$("#wykres").load("wykres.php?email=" + user + "&game=" + game);
				});

				$("#game").change(function() {
					var user = $("#usera").val();
					var game = $("#game").val();
				
					$("#wykres").load("wykres.php?email=" + user + "&game=" + game);
				});
			});
		</script>
	
		<?php
			require_once "connect.php"; 

			if ($connect->connect_error!=0) 
			{
				die("Connection failed: " . $connect->connect_error);
			} else 
			{
				$id = $_SESSION['id'];

				$names = array();
				$lastnames = array();
				$emails = array();

				$sql = "SELECT name, lastname, email FROM accounts WHERE parent = '$id'";

				if ($result = $connect->query($sql)) {
					$rows = $result->num_rows;
					while ($row = $result->fetch_assoc()) {
					$names[] = $row['name'];
					$lastnames[] = $row['lastname'];
					$emails[] = $row['email'];
					}
				}
			}
			$connect->close();
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
				    <h3>Panel rodzica</h3>
				</div>
			</div>
	    </header>
	    
	    <!-- Wybór użytkownika, gry oraz wyświetlenie wykresów -->
	    <div id="content">
		    <div class="row align-center">
				<div class="small-12 medium-6 large-6 columns" id="types">
					<label><h5>Dane użytkownika:</h5></label>
					<select id="usera" name = "user" class = "types">
						<?php
							if ($rows > 0) {
								for ($i = 0; $i < $rows; $i++) {
								echo "<option value='$emails[$i]'>$names[$i] $lastnames[$i]</option>";
								}
							} else {
								echo "<option>Brak podopiecznych</option>";
							}
						?>
					</select>			
				</div>
				<div class="small-12 medium-6 large-6 columns" id="games">
					<label><h5>Gra:</h5>
						<select id="game" name = "game" class = "types">
							<option value="Zgadnij_i_leć">Zgadnij i leć</option>	
							<option value="Żabka">Żabka</option>
						</select>
					</label>
				</div>
			</div>
			
			<div id="wykres"></div>
		</div>

		<footer>2015 &copy; Politechnika Gdańska. Wszelkie prawa zastrzeżone.</footer>

		<!-- Deklaracja skryptów JS -->
		<script src="js/vendor/jquery.min.js"></script>
	    <script src="js/vendor/what-input.min.js"></script>
	    <script src="js/foundation.min.js"></script>
	    <script src="js/app.js"></script>
	</body>
</html>