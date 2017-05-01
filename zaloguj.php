<?php
	// Realizacja zalogowania do systemu
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	
	if ((!isset ($_POST['email'])) || (!isset($_POST['password'])))			
	{
		header('Location: index.php');
		exit();
	}	
	
	require_once "connect.php";
	
	if ($connect->connect_errno != 0) {
		echo "Error: ".$connect->connect_errno;
	} 	else {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$email = htmlentities($email, ENT_QUOTES, "UTF-8");
			$password = htmlentities($password, ENT_QUOTES, "UTF-8");
			
			$hash_password = md5($password);
			// Logowanie do systemu z mechanizmem obrony przed atakami typu SQL injections
			if ($result = $connect->query(sprintf("SELECT id, name, lastname, type, therapist 
				FROM accounts WHERE email = '%s' 
				AND password = '%s'", mysqli_real_escape_string($connect, $email), 
				mysqli_real_escape_string($connect, $hash_password)))) 
			{
				$ilu_userow = $result->num_rows;
				// Jeżeli istnieje użytkownik o podanych powyżej danych
				if ($ilu_userow > 0) {
					$_SESSION['zalogowany'] = true;
					$_SESSION['email'] = $email;
					
					$row = $result->fetch_assoc();
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['name'];
					$_SESSION['userlastname'] = $row['lastname'];
					$_SESSION['type'] = $row['type'];
					$_SESSION['therapist'] = $row['therapist'];
					
					unset($_SESSION['blad']);
					// Przekierowanie do odpowiedniego panelu w zależności od typu konta
					$result->close();
					if ($_SESSION['type'] == "user") {
						header('Location: panelo.php');
					} else if ($_SESSION['type'] == "parent") {
						header('Location: panelr.php');
					} else if ($_SESSION['type'] == "teacher") {
						header('Location: panelt.php');
					}
				} else {
				$_SESSION['blad'] = '<span style = "color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				}
			}
		}
		$connect->close();
?>


