<?php
	header('Content-Type: text/html; charset=utf-8');
		session_start();		
		
		if (!isset ($_SESSION['zalogowany']))						//wklei?do ka?dej podstrony, kt?? mo?e zobaczy?tylko zalogowany user!!!!!!!!!			
		{
			header('Location: index.php');
			exit();
		}
?>

<!-- Wyświetlenie panelu widocznego po zalogowaniu rodzica -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl">

<head>
	<!-- Deklaracja metadanych -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>eDmuch | Panel użytkownika</title>

    <!-- Deklaracja arkuszy stylów -->
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/style_panel.css" />

    <!-- Deklaracja czcionek -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- Dane użytkownika, typ konta i przycisk umożliwiający wylogowanie się -->
	<header>
		<div class="row" id="a">
			<div class="small-12 medium-12 large-12 columns">
				<div class="small-12 medium-8 large-9 columns">
					<?php
					echo "<h1>Witaj ".$_SESSION['username']." ";
					echo $_SESSION['userlastname']. '</h1>';
					?>
				</div>
				<div class="small-12 medium-4 large-3 columns">
					<form class="" id="logout" action="logout.php" method="post" role="form">
	            		<input type="submit" class="expanded button" onCilck="logout.php" value="Wyloguj się" /> 
	            	</form> 
	            </div>
	        </div>
	    </div>
		<div class="row" id="b">
			<div class="small-12 medium-12 large-12 columns">
			    <h3>Panel rodzica</h3>
			</div>
		</div>
	</header>

	<!-- Moduły -->
	<div class="row">
		<div class="small-12 medium-12 large-12 columns">
		    <div class="options">
		        <div class="small-12 medium-4 large-4 columns">
		            <figcaption>Gry</figcaption>
		            <a href="gamesr.php"><img class="thumbnail" src="img/games.jpg" /></a>
		        </div>
		        <div class="small-12 medium-4 large-4 columns">
		            <figcaption>Wyniki</figcaption>
		            <a href="scoresr.php"><img class="thumbnail" src="img/score.jpg" /></a>
		        </div>
		        <div class="small-12 medium-4 large-4 columns">
		            <figcaption>Wiadomości</figcaption>
		            <a href="messages.php"><img class="thumbnail" src="img/messages.jpg" /></a>
		        </div>
		    </div>
		</div>
	</div>
      
  	<footer>2015 &copy; Politechnika Gdańska. Wszelkie prawa zastrzeżone.</footer>

  	<!-- Deklaracja skryptów JS -->
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/what-input.min.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>