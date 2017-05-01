<?php
	// Formularz rejestracji rodzica wraz z możliwością wyrażenia zgody na przetwarzanie danych osobowych używany w register.php
	header('Content-Type: text/html; charset=utf-8');
	
	echo "<br><label><h5>Rodzic:</h5>";
	echo "<input class='parent' type = 'text' name = 'pname' placeholder = 'Imię rodzica' value ='' size = '30' maxlength = '25' required = 'required'></input>";
	echo "<input class='parent' type = 'text' name = 'plastname' placeholder = 'Nazwisko rodzica' value ='' size = '30' maxlength = '50' required = 'required'></input>";
	echo "<input class='parent' type = 'email' id = 'pemail' name = 'pemail' placeholder = 'E-mail rodzica' value ='' size = '30' maxlength = '255' pattern = '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required = 'required'></input>";
	echo "<input class='parent' type = 'password' name = 'ppassword' placeholder = 'Hasło rodzica' value ='' size = '30' minlength = '5' maxlength = '16' required = 'required'></input>";
	echo "<div id='checkProcessing2'>
			<input type='checkbox' name='checkboxProcessing3' id='checkboxProcessing3' />
				Wyrażam zgodę na przetwarzanie danych osobowych dziecka przez (TU BĘDZIE NAZWA FIRMY I SIEDZIBA) w celu (TU BĘDZIE CEL). 
				Oświadczam, że znam prawo do wglądu, zmiany i żądania zaprzestania przetwarzania swoich danych. Dane podaję dobrowolnie.
			</div>";
	echo "</label><br />";
?>