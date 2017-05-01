Zawartoœæ poszczególnych plików:

check.php		Sprawdzenie, czy podany adres mailowy podany w formularzu rejestracji osoby wspomaganej/terapeuty jest zajêty, u¿ywany w register.php
checkp.php		Sprawdzenie, czy podany adres mailowy podany w formularzu rejestracji rodzica jest zajêty, u¿ywany w register.php
connect.php		Nawi¹zywanie po³¹czenia z baz¹ danych
games.php		Wyœwietlenie dostêpnych gier na koncie osoby wspomaganej
gamesr.php		Wyœwietlenie dostêpnych gier na koncie rodzica
gamest.php		Wyœwietlenie dostêpnych gier na koncie terapeuty
getparam.php		Pobieranie z bazy danych etykiet z parametrami warunkuj¹cymi zmianê trudnoœci gry terapeutycznej, u¿ywany w scorest.php
index.php		Strona g³ówna systemu internetowego
logout.php		Realizacja wylogowania z gry
messages.php		Wysy³anie i odbieranie wiadomoœci, u¿ywane s¹ nastêpuj¹ce skrypty: parent.php, sendmsg.php, napisz.php, recmsg.php
myscores.php		Strona odpowiedzialna za wyœwietlanie wyników w postaci wykresów na koncie osoby wspomaganej
napisz.php		Za³adowanie formularza umo¿liwiaj¹cego napisanie wiadomoœci przez terapeutê, u¿ywany w messages.php
panelo.php		Wyœwietlenie panelu widocznego po zalogowaniu osoby wspomaganej
panelr.php		Wyœwietlenie panelu widocznego po zalogowaniu rodzica
panelt.php		Wyœwietlenie panelu widocznego po zalogowaniu terapeuty
parent.php		Wybranie rodzica jako odbiorcê wiadomoœci, u¿ywany w messages.php
parentform.php		Formularz rejestracji rodzica wraz z mo¿liwoœci¹ wyra¿enia zgody na przetwarzanie danych osobowych u¿ywany w register.php
recmsg.php		Obs³uga nieprzeczytanych wiadomoœci, u¿ywany w messages.php
register.php		Formularz rejestracji u¿ytkowników wraz z pobraniem deklaracji wyra¿aj¹cej/nie wyra¿aj¹cej zgody na przetwarzanie danych osobowych,
			sprawdzeniem, czy dany adres mailowy jest zajêty oraz ustawieniem parametrów pocz¹tkowych gry terapeutycznej
scoresr.php		Strona odpowiedzialna za wyœwietlanie wyników w postaci wykresów na koncie rodzica
scorest.php		Strona odpowiedzialna za wyœwietlanie wyników w postaci wykresów na koncie terapeuty
sendmsg.php		Wys³anie wiadomoœci, u¿ywany w messages.php
settings.php		Zmiana parametrów warunkuj¹cych poziom trudnoœci gry terapeutycznej, u¿ywany w scorest.php
therapistsform.php	Wyœwietlenie dostêpnych terapeutów w postaci rozwijanej listy w trakcie rejestracji
wykres.php		Generowanie wykresów, u¿ywany w myscores.php, scoresr.php, scorest.php
zaloguj.php		Realizacja zalogowania do systemu


unity/addresult.php	Wpisywanie do bazy danych uzyksanych wyników w grze terapeutycznej
unity/connect.php	Nawi¹zywanie po³¹czenia z baz¹ danych
unity/login.php		Logowanie do gry z uwierzytelnianiem na podstawie bazy danych
unity/parameters.php	Pobranie parametrów warunkuj¹cych poziom trudnoœci gry, zapsanie ich w formacie JSON oraz przes³anie do gry terapeutycznej
unity/scores.php	Pobranie wyników ostatnio rozegranej gry, zapsanie ich w formacie JSON oraz przes³anie do gry terapeutycznej