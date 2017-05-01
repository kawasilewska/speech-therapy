<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl">

<head>
	<!-- Deklaracja metadanych -->
	<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>eDmuch | Rejestracja</title>

    <!-- Deklaracja arkuszy stylów -->
    <link rel="stylesheet" type="text/css" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/style_register.css" />

    <!-- Deklaracja czcionek -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin-ext' rel='stylesheet' type='text/css'>

	<?php
		header('Content-Type: text/html; charset=utf-8');
		require_once "connect.php"; 

		if ($connect->connect_error) {
			die("Connection failed: " . $connect->connect_error);
		} else {
			// Pobieranie adresu IP
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
			    $ip = $_SERVER['REMOTE_ADDR'];
			}
			// Jeżeli wciśnięto przycisk WYSLIJ
			if (@$_POST['submit']) {
				$type = $_POST['type'];
				$name = $_POST['name'];
				$lastname = $_POST['lastname'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$therapist = $_POST['therapist'];

				$hash_password = md5($password);

				// Jeżeli rejestruje się osoba wspomagana
				if ($type == "user") {
					// Jeżeli ma zostać utworzone konto rodzica
					if (isset($_POST['checkboxParent']))
					{
						$pname = $_POST['pname'];
						$plastname = $_POST['plastname'];
						$pemail = $_POST['pemail'];
						$ppassword = $_POST['ppassword'];
						$hash_ppassword = md5($ppassword);

						// Jeżeli wyrażono zgodę na przetwarzanie danych osobowych
						if (isset($_POST['checkboxProcessing'])) {
							$sql = "INSERT INTO declarations (declaration_type, client_ip_address, type) VALUES (1, '$ip', 'user')";
							$connect->query($sql);
							
							$sql = "INSERT INTO declarations (declaration_type, client_ip_address, type) VALUES (3, '$ip', 'parent')";
							$connect->query($sql);
							
						} else if(isset($_POST['checkboxProcessing2'])) {	// Jeżeli wykorzystywane będą wymyślone dane osobowe
							$sql = "INSERT INTO declarations (declaration_type, client_ip_address, type) VALUES (2, '$ip', 'user')";
							$connect->query($sql);

							$sql = "INSERT INTO declarations (declaration_type, client_ip_address, type) VALUES (2, '$ip', 'parent')";
							$connect->query($sql);
						}
						// Pobranie id deklaracji rodzica
						$sql = "SELECT id FROM declarations WHERE client_ip_address = '$ip' AND type = 'parent'";
						if ($result = $connect->query($sql)) {
							while ($row = $result->fetch_assoc()) {
								$decid = $row['id'];
							}
						}

						// Wpisanie danych osobowych rodzica do bazy danych
						$sql1 = "INSERT INTO accounts (name, lastname, email, password, type, declaration_id)
							VALUES ('$pname', '$plastname', '$pemail', '$hash_ppassword', 'parent', '$decid');";
						$connect->query($sql1);

						// Pobranie id rodzica na podstawie jego adresu mailowego
						$sql2 = "SELECT id FROM accounts WHERE email='$pemail';";
						if ($result = $connect->query($sql2)) {
							while ($row = $result->fetch_assoc()) {
								$parentid = $row['id'];
							}
						}

						// Pobranie id deklaracji osoby wspomaganej
						$sql3 = "SELECT id FROM declarations WHERE client_ip_address = '$ip' AND type = 'user'";
						if ($result = $connect->query($sql3)) {
							while ($row = $result->fetch_assoc()) {
								$decid = $row['id'];
							}
						}

						// Wpisanie danych osobowych osoby wspomaganej do bazy danych
						$sql4 = "INSERT INTO accounts (name, lastname, email, password, type, therapist, parent, declaration_id)
							VALUES ('$name', '$lastname', '$email', '$hash_password', '$type', '$therapist', '$parentid', '$decid');";
						$connect->query($sql4);

						// Ustawienie osobie wspomaganej parametrów początkowych gry terapeutycznej
						$sql5 = "INSERT INTO settings (email, game, param1, param2) VALUES ('$email', 'Zgadnij_i_lec', 90, 15)";
						$connect->query($sql5);

					} else {	// Jeżeli nie będzie tworzone konto rodzica
						// Sprawdzenie statusu zgody na przetwarzanie danych osobowych - osoba wspomagana
						if (isset($_POST['checkboxProcessing'])) {
							$sql = "INSERT INTO declarations (declaration_type, client_ip_address, type) VALUES (1, '$ip', 'user')";
							$connect->query($sql);
						} else if (isset($_POST['checkboxProcessing2'])) {
							$sql = "INSERT INTO declarations (declaration_type, client_ip_address, type) VALUES (2, '$ip', 'user')";
							$connect->query($sql);
						}

						// Pobranie id deklaracji użytkownika rejestrującego się bez rodzica
						$sql2 = "SELECT id FROM declarations WHERE client_ip_address = '$ip' AND type = 'user'";
						if ($result = $connect->query($sql2)) {
							while ($row = $result->fetch_assoc()) {
								$decid = $row['id'];
							}
						}

						// Wpisanie danych osobowych osoby wspomaganej do bazy danych
						$sql3 = "INSERT INTO accounts (name, lastname, email, password, type, therapist, declaration_id)
							VALUES ('$name', '$lastname', '$email', '$hash_password', '$type', '$therapist', '$decid');";
						$connect->query($sql3);

						// Ustawienie osobie wspomaganej parametrów początkowych gry terapeutycznej
						$sql4 = "INSERT INTO settings (email, game, param1, param2) VALUES ('$email', 'Zgadnij_i_lec', 90, 15)";
						$connect->query($sql4);
					}		
				} else if ($type == "teacher") { // Jeżeli rejestruje się terapeuta
					// Sprawdzenie statusu zgody na przetwarzanie danych osobowych - terapeuta
					if (isset($_POST['checkboxProcessing'])) {
						$sql = "INSERT INTO declarations (declaration_type, client_ip_address, type) VALUES (1, '$ip', 'teacher')";
						$connect->query($sql);
					} else if (isset($_POST['checkboxProcessing2'])) {
						$sql2 = "INSERT INTO declarations (declaration_type, client_ip_address, type) VALUES (2, '$ip', 'teacher')";
						$connect->query($sql2);
					}

					// Pobranie id deklaracji terapeuty
					$sql3 = "SELECT id FROM declarations WHERE client_ip_address = '$ip' AND type = 'teacher'";
						if ($result = $connect->query($sql3)) {
							while ($row = $result->fetch_assoc()) {
								$decid = $row['id'];
							}
						}

					// Wpisanie danych osobowych terapeuty do bazy danych
					$sql4 = "INSERT INTO accounts (name, lastname, email, password, type, declaration_id)
					VALUES ('$name', '$lastname', '$email', '$hash_password', '$type', '$decid');";
					$connect->query($sql4);
				}

				header('Location: index.php');
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
				<h1>Zarejestruj się</h1>
			</div>
		</div>
		<div class="row" id="b">
			<div class="small-12 medium-12 large-12 columns">
				<h3>Wypełnij poniższe pola, aby móc w pełni korzystać z serwisu</h3>
			</div>
		</div>
	</header>
	<br>
	
	<!-- Okno formularza rejestracji -->
	<div class="row align-center">
    	<div class="column small-12 medium-12 large-5" id="outer">
	    	<div id="content">
		    	<form method="post">
		    		<label><h5>Typ konta:</h5>
						<select  id="type" name = "type" class = "types">
							<option value = "user">osoba wspomagana</option>
							<option value = "teacher">terapeuta</option>
						</select>
					</label>
					<!-- Lista dostępnych terapeutów zawarta w therapistform.php -->
					<div id="therapists"></div>
					<!-- Pola formularza rejestracji -->
					<label><input type = "text" name = "name" placeholder = "Imię" value = "" size = "30" maxlength = "25" required pattern="[A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ]{2,}"/></label>
					<label><input type = "text" name = "lastname" placeholder = "Nazwisko" value ="" size = "30" maxlength = "50" required pattern="[A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ -]{2,}"/></label>
					<label><input type = "email" id="email" name = "email" placeholder = "E-mail" value = "" size = "30" maxlength = "255" required pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" /></label>
					<label><input type = "password" name = "password" placeholder = "Hasło" size = "30" minlength = "5" maxlength = "16" required /></label>
					<!-- Możliwość dodania konta rodzica -->
					<div id="checkParent"><input type="checkbox" name="checkboxParent" id="checkboxParent" />Dodaj konto rodzica</div>
					<br>
					<!-- Wyrażenie/nie wyrażenie zgody na przetwarzanie danych osobowych -->
					<div id="checkProcessing">
						<input type="checkbox" name="checkboxProcessing" id="checkboxProcessing" />
							Wyrażam zgodę na przetwarzanie moich danych osobowych  przez (TU BĘDZIE NAZWA FIRMY I SIEDZIBA) w celu (TU BĘDZIE CEL). 
							Oświadczam, że znam prawo do wglądu, zmiany i żądania zaprzestania przetwarzania swoich danych. Dane podaję dobrowolnie.	
						<br><br>
						<input type='checkbox' name='checkboxProcessing2' id='checkboxProcessing2' />
						Jeśli nie chcesz podawać danych osobowych możesz założyć konto z wymyślonym imieniem i nazwiskiem mającymi charakter pseudonimu oraz z podaniem nazwy adresu email nie zawierającym prawdziwych danych osobowych 
						(np. imienia czy nazwiska). Wówczas prosimy o potwierdzenie deklaracji: Oświadczam, że podane przeze mnie dane osobowe są nieprawdziwe, a adres email nie zawiera informacji stanowiących danych osobowych i jednocześnie 
						wyrażam zgodę na jego wykorzystanie dla celów (TU BĘDZIE CEL). Oświadczam, że znam prawo do wglądu, zmiany i żądania zaprzestania przetwarzania danych. Dane podaję dobrowolnie.
					</div>
					<!-- Formularz rejestracji rodzica zawarty w parentform.php -->
					<div id="parents"></div>
					<!-- Przycisk umożliwiający przesłanie do bazy danych -->
					<input type = "submit" name="submit" id = "submit" value = "Wyślij" />
				</form>
	    	</div>
		</div>				
	</div>
	<br>
	
	<footer>2015 &copy; Politechnika Gdańska. Wszelkie prawa zastrzeżone.</footer>

	<!-- Deklaracja skryptów JS -->
	<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
    <script type="text/javascript" src="js/vendor/what-input.min.js"></script>
    <script type="text/javascript" src="js/foundation.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>

    <script type="text/javascript">
		$(document).ready(function() {
			/* Jeżeli wybrano osobę wspomaganą pokaż i załaduj rozwijaną listę zawierającą terapeutów oraz pokaż checkbox umożliwiający dodanie konta rodzica */
			if ($("#type").val() == "user") {
				$("#therapists").show();
				$("#therapists").load("therapistsform.php");
				var checkbox = document.getElementById("checkParent");
				checkbox.style.display = "inline";
			}
			/* Jeżeli wybrano terapeutę ukryj dostępnych terapeutów oraz checkbox */
			$("#type").change(function() {
				if ($("#type").val() != "user") {
					$("#therapists").hide();
					checkbox.style.display = "none";
					$("#parents").hide();
				} else {
					$("#therapists").show();
					checkbox.style.display = "inline";
				}
			});
			/* Obsługa pól wyboru decyzji związanej z przetwarzaniem danych osobowych */
			$("#checkboxProcessing").on('click', function() {
				if(document.getElementById('checkboxProcessing').checked) {
					$("#checkboxProcessing2").prop('checked', false); 
					$("#checkboxProcessing3").prop('checked', true);
				} 
			});
			$("#checkboxProcessing2").on('click', function() {
				if(document.getElementById('checkboxProcessing2').checked) {
					$("#checkboxProcessing").prop('checked', false); 
					$("#checkboxProcessing3").prop('checked', false);
				} 
			});

			$("#checkboxParent").change(function () {
				var checked = $(this).prop('checked');
				/* Wyświetlenie formularza rejestracji rodzica, deklaracja zgody na przetwarzanie danych osobowych */
				if (checked) {
					$("#parents").show();
					$("#parents").load("parentform.php", function() {
						$("#checkboxProcessing3").on('click', function() {
							if(document.getElementById('checkboxProcessing3').checked) {
								$("#checkboxProcessing").prop('checked', true);
								$("#checkboxProcessing2").prop('checked', false); 
							} 
						});
						/* Sprawdzenie, czy podany adres mailowy rodzica jest zajęty */
						$("#pemail").blur(function(){
	        			var email = $("#pemail").val();
	        			console.log(email);
	        			$.ajax({
	        				url: "checkp.php",
							type: "POST",
							data: {
								email: email
							},
							success: function(data){
								if (data > 0) {
									alert("Podany adres e-mail jest zajęty");
									$("#submit").hide();
								} else if (data == 0) {
								$("#submit").show();
								}
	      					} 
	        			});
	    			});
					});
				} else {$("#parents").hide();}
			});
		});
	</script>
	
	<script type="text/javascript">
	$(document).ready(function()
	{
		/* Sprawdzenie, czy podany adres mailowy osoby wspomaganej/terapeuty jest zajęty */
		$("#email").blur(function(){
        	var email = $("#email").val();
        	$.ajax({
        		url: "check.php",
				type: "POST",
				data: {
					email: email
				},
				success: function(data){
					if (data > 0) {
						alert("Podany adres e-mail jest zajęty");
						$("#submit").hide();
					} else if (data == 0) {
						$("#submit").show();
					}
      			}
        	});
    	});
	});
		
	</script>
</body>
</html>