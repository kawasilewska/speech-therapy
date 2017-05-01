<?php
	session_start();		
	
	if ((isset ($_SESSION['zalogowanyo'])) && ($_SESSION['zalogowanyo']==true))
	{
		header('Location: panelo.php');
		exit();
	} else if ((isset ($_SESSION['zalogowanyr'])) && ($_SESSION['zalogowanyr']==true))
		{
			header('Location: panelr.php');
			exit();
		} else if ((isset ($_SESSION['zalogowanyt'])) && ($_SESSION['zalogowanyt']==true))
			{
				header('Location: panelt.php');
				exit();
			}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl">

<head>
	<!-- Deklaracja zestawu znaków -->
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>eDmuch - nowoczesna platforma terapeutyczna</title>

	<!-- Deklaracja arkuszy stylów -->
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />

	<!-- Deklaracja czcionek -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin-ext' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id="parallax">
		<!-- Pasek górny umożliwiający rejestrację oraz logowanie -->
		<form action="zaloguj.php" method="post">
		<header id="header">
		    <div class="row">
		    	
		        	<div class="small-6 medium-2 large-4 columns">
		          		<h3>eDmuch</h3>
		        	</div>
		        	<div class="small-12 medium-3 large-2 columns">
		          		<input type="email" name="email" class="form-control" id="email" placeholder=" e-mail" required />
		        	</div>
		        	<div class="small-12 medium-3 large-2 columns">
		          		<input type="password" name="password" class="form-control" id="password" placeholder=" hasło" required />
		        	</div>
		        	<div class="small-6 medium-2 large-2 columns">
		          		<input type="submit" class="expanded button" value="Zaloguj się" />
		        	</div>
		        	<div class="small-6 medium-2 large-2 columns">
	            		<input type="submit" class="expanded button" formaction="register.php" value="Zarejestruj się" /> 
	        		</div>
		        	<?php
						if (isset($_SESSION['blad']))
							echo $_SESSION['blad'];
					?>	
		      		 
		    </div>
	  	</header>
	  	</form>
		<!-- Strona sytułowa -->
		<div class="row align-center" id="title">
			<div class="column small-12 medium-12 large-8">
			  <p id="title"><b>eDmuch - baw się, graj <br> i wspomagaj terapię mowy</b></p>
			  <p id="subtitle">Witaj na stronie internetowej serwisu wspierającego terapię mowy.
			    Głównym jego zadaniem jest pomoc i uatrakcyjnienie procesu ćwiczeń logopedycznych 
			    oraz rehabilitacji  po niedowładach twarzy poprzez kontrolowane 
			    i monitorowane ćwiczenia oddechowe.</p>
			</div>
		</div>
	</div>

	<!-- Sekcja a - Czym jest eDmuchawka -->
	<div class="row" id="seca">
		<div class="small-12 medium-12 large-12 columns">
	  		<div id="titlea">
	    		<p><b>Czym jest eDmuchawka?</b></p>
	  		</div>  
		</div>
		<div class="small-8 medium-3 large-3 columns">
	  		<img src="img/edmuchawka.png"></img>
		</div>
		<div class="small-12 medium-9 large-9 columns">
	  		<div id="desca">
	    		<p>eDmuchawka to innowacyjne urządzenie wspierające terapię mowy poprzez monitorowanie oddechu w trakcie wykonywania ćwiczeń oddechowych. Ćwiczenia te mają formę gier, 
	    		dzięki czemu proces terapeutyczny nie staje się nudny, jak w przypadku tradycyjnej terapii. Zadaniem użytkownika jest dmuchanie przez ustnik formujący strumień powietrza w zależności od wymagań gry.<br><br>
	    		eDmuchawka pozwala na terapię w gabinecie logopedy/terapeuty, domu i szkole osobom w każdym wieku. Wystarczy założyć konto na naszej platformie, pobrać wybraną z dostępnych gier, podłączyć 
	    		eDmuchawkę do komputera oraz posiadać dostęp do Internetu, aby móc w pełni korzystać z serwisu. W każdej chwili terapeuta może obejrzeć postępy swoich podopiecznych, a także wysyłać do nich wiadomości, 
	    		co jest bardzo wygodną formą komunikacji.<br /></p>
	  		</div>
		</div>
	</div>

	<!-- Sekcja b - Zastosowania eDmuchawki -->
	<div class="row" id="secb">
		<div class="small-12 medium-12 large-12 columns">
			<div id="titleb">
			    <p><b>Zastosowania eDmuchawki</b></p>
			</div>
		</div>
		<div class="small-9 medium-3 large-3 columns">
			<img src="img/secb.png"></img>
		</div>
		<div class="small-12 medium-9 large-9 columns">
		  	<div id="descb">
			    <ul>
			      <li>terapia mowy pozwalająca na eliminację bądź znaczną redukcję nosowania, jąkania oraz poprawę artykulacji</li>
			      <li>rehabilitacja mięśni twarzy i ruchomości aparatu mowy</li>
			      <li>wspomaganie diagnostyki zagrożeń udarami</li>
			      <li>terapia osób mających problemy z pamięcią, zagrożonych chorobą Alzheimera</li>
			      <li>diagnostyka układu krążenia i chorób serca</li>
			    </ul>
		  	</div>
		</div>
	</div>

	<!-- Sekcja c - Rodzaje kont -->
	<div class="row" id="secc">
		<div class="small-12 medium-12 large-12 columns">
			<div id="titlec">
	    		<p><b>Rodzaje kont</b></p>
	  		</div>
		</div>
		<div class="small-9 medium-3 large-3 columns">
	  		<img src="img/secc.jpg"></img>
		</div>
		<div class="small-12 medium-9 large-9 columns">
	  		<div id="descc">
			    <ul>
			      <li>osoba wspomagana - możliwość pobierania gier, sprawdzania swoich wyników 
			      oraz wysyłania wiadomości do swojego terapeuty</li>
			      <li>terapeuta - możliwość sprawdzania wyników swoich podopiecznych, zmieniania im poziomów trudności
			      oraz wysyłania wiadomości do rodziców oraz osób ćwiczących</li>
			      <li>rodzic - możliwość sprawdzania postępów w terapii swoich dzieci
			      oraz wysyłania wiadomości do terapeuty odpowiedzialnego za ich terapię</li>
			    </ul>
	  		</div>
		</div>
	</div>

	<!-- Sekcja d - mapa -->
	<div class="row" id="secd">
		<div id="map"></div>
	</div>

	<!-- Sekcja e - Kontakt -->
	<div class="row" id="sece">
		<div class="small-12 medium-12 large-12 columns">
			<div id="titlee">
		    	<p><b>Kontakt</b></p>
		  	</div>
		</div>
		<div class="small-12 medium-6 large-8 columns">
			<div id="desce">
		    	Wydział Elektroniki, Telekomunikacji i Informatyki<br>
		    	Politechnika Gdańska<br>
		    	Narutowicza 11/12<br>
		    	80-233 Gdańsk<br>
		  	</div>
		</div>
		<div class="small-12 medium-6 large-4 columns">
		  	<div id="con">
		    	<img id="icon" src="img/www.png" alt="www" /><span> www.domestic.gda.pl</span><br>
		    	<img id="icon" src="img/mail.png" alt="mail" /><span> domestic@biomed.eti.pg.gda.pl</span><br>
		    	<img id="icon" src="img/phone.png" alt="phone" /><span> (48) 58 347 13 84</span>
		  	</div>
		</div>
	</div>

	<footer>2016 &copy; Politechnika Gdańska. Wszelkie prawa zastrzeżone.</footer>

    <!-- Deklaracja skryptów JS -->
    <script src="js/vendor/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/map.js"></script>
    <script src="js/vendor/what-input.min.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
</body>
</html>