Zawarto�� poszczeg�lnych plik�w:

check.php		Sprawdzenie, czy podany adres mailowy podany w formularzu rejestracji osoby wspomaganej/terapeuty jest zaj�ty, u�ywany w register.php
checkp.php		Sprawdzenie, czy podany adres mailowy podany w formularzu rejestracji rodzica jest zaj�ty, u�ywany w register.php
connect.php		Nawi�zywanie po��czenia z baz� danych
games.php		Wy�wietlenie dost�pnych gier na koncie osoby wspomaganej
gamesr.php		Wy�wietlenie dost�pnych gier na koncie rodzica
gamest.php		Wy�wietlenie dost�pnych gier na koncie terapeuty
getparam.php		Pobieranie z bazy danych etykiet z parametrami warunkuj�cymi zmian� trudno�ci gry terapeutycznej, u�ywany w scorest.php
index.php		Strona g��wna systemu internetowego
logout.php		Realizacja wylogowania z gry
messages.php		Wysy�anie i odbieranie wiadomo�ci, u�ywane s� nast�puj�ce skrypty: parent.php, sendmsg.php, napisz.php, recmsg.php
myscores.php		Strona odpowiedzialna za wy�wietlanie wynik�w w postaci wykres�w na koncie osoby wspomaganej
napisz.php		Za�adowanie formularza umo�liwiaj�cego napisanie wiadomo�ci przez terapeut�, u�ywany w messages.php
panelo.php		Wy�wietlenie panelu widocznego po zalogowaniu osoby wspomaganej
panelr.php		Wy�wietlenie panelu widocznego po zalogowaniu rodzica
panelt.php		Wy�wietlenie panelu widocznego po zalogowaniu terapeuty
parent.php		Wybranie rodzica jako odbiorc� wiadomo�ci, u�ywany w messages.php
parentform.php		Formularz rejestracji rodzica wraz z mo�liwo�ci� wyra�enia zgody na przetwarzanie danych osobowych u�ywany w register.php
recmsg.php		Obs�uga nieprzeczytanych wiadomo�ci, u�ywany w messages.php
register.php		Formularz rejestracji u�ytkownik�w wraz z pobraniem deklaracji wyra�aj�cej/nie wyra�aj�cej zgody na przetwarzanie danych osobowych,
			sprawdzeniem, czy dany adres mailowy jest zaj�ty oraz ustawieniem parametr�w pocz�tkowych gry terapeutycznej
scoresr.php		Strona odpowiedzialna za wy�wietlanie wynik�w w postaci wykres�w na koncie rodzica
scorest.php		Strona odpowiedzialna za wy�wietlanie wynik�w w postaci wykres�w na koncie terapeuty
sendmsg.php		Wys�anie wiadomo�ci, u�ywany w messages.php
settings.php		Zmiana parametr�w warunkuj�cych poziom trudno�ci gry terapeutycznej, u�ywany w scorest.php
therapistsform.php	Wy�wietlenie dost�pnych terapeut�w w postaci rozwijanej listy w trakcie rejestracji
wykres.php		Generowanie wykres�w, u�ywany w myscores.php, scoresr.php, scorest.php
zaloguj.php		Realizacja zalogowania do systemu


unity/addresult.php	Wpisywanie do bazy danych uzyksanych wynik�w w grze terapeutycznej
unity/connect.php	Nawi�zywanie po��czenia z baz� danych
unity/login.php		Logowanie do gry z uwierzytelnianiem na podstawie bazy danych
unity/parameters.php	Pobranie parametr�w warunkuj�cych poziom trudno�ci gry, zapsanie ich w formacie JSON oraz przes�anie do gry terapeutycznej
unity/scores.php	Pobranie wynik�w ostatnio rozegranej gry, zapsanie ich w formacie JSON oraz przes�anie do gry terapeutycznej