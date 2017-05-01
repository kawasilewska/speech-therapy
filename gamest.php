<?php
		session_start();		
?>
<!-- Wyświetlenie dostępnych gier na koncie terapeuty -->
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>eDmuch | Gry</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/style_games.css" />

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

    <!-- Deklaracja czcionek -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin-ext' rel='stylesheet' type='text/css'>
  </head>
  <body>

    <!-- Nagłówek -->
    <header id="header">
        <div class="row" id="a">
            <div class="small-12 medium-12 large-12 columns">
                <h2>Dostępne gry</h2>
            </div>
        </div>
        <div class="row" id="b">
            <div class="small-12 medium-12 large-12 columns">
                <h5>Poniżej znajdują się dostępne gry terapeutyczne</h5>
            </div>
        </div>
    </header>
    <!-- Wyświtlenie dostępnych gier -->
    <div class="gameone">
        <div class="row">
            <div class="small-12 medium-5 large-4 columns" id="animate">
                <img src="img/game1.png" />
                <img src="img/game2.png" />
                <img src="img/game3.png" />
                <img src="img/game4.png" />
                <img src="img/game5.png" />
                <img src="img/game6.png" />
                <img src="img/game7.png" />
                <img src="img/game9.png" />
                <img src="img/game10.png" />
            </div>
            <div class="small-12 medium-7 large-8 columns">
                <h4><b>Zgadnij i Leć</b></h4>
                <p>Interaktywna gra komputerowa umożliwiająca stymulację oddechu oraz ćwiczenie koordynacji wzrokowo - ruchowej, a także zachęcająca do nauki poprzez zabawę.
                    <br>Steruj samolotem za pomocą siły dmuchu tak, aby nie wykroczyć poza granice ekranu.  
                    <br>Wlatuj w chmurki oznaczone znakiem zapytania.
                    <br>Odpowiadaj prawidłowo na pytania zawarte w chmurkach, aby zdobywać punkty i przechodzić na kolejne poziomy.
                    <br>Każdy poziom trwa 60 sekund, a poprawna odpowiedź jest nagradzana jednym punktem.
                </p>
            </div>
        </div>
    </div>

    <footer>2015 &copy; Politechnika Gdańska. Wszelkie prawa zastrzeżone.</footer>

    <!-- Deklaracja skryptów JS -->
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/what-input.min.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/app.js"></script>

    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>

    <!-- Realizacja przejść slajdów obrazujących poszczególne etapy gry -->
    <script>
        $(document).ready(function(){
            $('#animate').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                speed: 2000,
                focusOnSelect: false,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 3000,
            });
        });
    </script>
  </body>
</html>