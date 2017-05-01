<?php
	header('Content-Type: text/html; charset=utf-8');

	session_start();	
	if (!isset ($_SESSION['zalogowany']))			
		{
			header('Location: index.php');
			exit();
		}
?>

<!-- Wysyłanie i odbieranie wiadomości -->
<!DOCTYPE html>
<html lang="pl">
 <head>
  	<!-- Deklaracja metadanych -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>eDmuch | Wiadomości</title>

    <!-- Deklaracja arkuszy stylów -->
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/style_messages.css" />

    <!-- Deklaracja czcionek -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin-ext' rel='stylesheet' type='text/css'>

	<?php 
		require_once 'connect.php';

		$from = $_SESSION['email'];
		$type = $_SESSION['type'];

		if($type == "user")
		{	
			/* Pobranie adresu mailowego terapeuty przypisanego do użytkownika */
			$therapist = $_SESSION['therapist'];
			$sql = "SELECT email FROM accounts WHERE id = '$therapist'";
			if ($result = $connect->query($sql)) {
				while ($row = $result->fetch_assoc()) {
				$to = $row['email'];
				}
			}
		} else if ($type == "parent") 
		{
			/* Pobranie id terapeuty przypisanego do dziecka */
			$id = $_SESSION['id'];
			$sql = "SELECT therapist FROM accounts WHERE parent = '$id'";
			if ($result = $connect->query($sql)) {
				while ($row = $result->fetch_assoc()) {
					$therapist = $row['therapist'];
				}
			}

			/* Pobranie adresu mailowego terapeuty przypisanego do otrzymanego powyżej id */
			$sql2 = "SELECT email FROM accounts WHERE id = '$therapist'";
			if ($result2 = $connect->query($sql2)) {
				while ($row2 = $result2->fetch_assoc()) {
					$to = $row2['email'];
				}
			}
		} else if ($type == "teacher")
		{
			$id = $_SESSION['id'];
			$to = array();
			$name = array();
			$lastname = array();

			/* Pobranie danych dotyczących wszystkich podopiecznych terapeuty */
			$sql = "SELECT email, name, lastname, parent FROM accounts WHERE therapist = '$id'";
	
			if ($result = $connect->query($sql)) {
				$_SESSION['rows'] = $result->num_rows;
				while ($row = $result->fetch_assoc()) {
				$to[] = $row['email'];
				$name[] = $row['name'];
				$lastname[] = $row['lastname'];
				$parent[] = $row['parent'];
				}
			}

			$_SESSION['to'] = $to;
			$_SESSION['name'] = $name;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['parent'] = $parent;
		}	

		$connect->close();
	?>
	<!-- Obsługa wysyłania i odbierania wiadomości, używane są następujące skrypty: parent.php, sendmsg.php, messages.php, recmsg.php -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#submit").click(function() {
				$("#pole").load("napisz.php", function() {
					$("#submit3").click(function() {
					var from = "<?php echo $from; ?>";
					var type = "<?php echo $type; ?>";
					if(type == "user" || type == "parent")
					{
						var to = "<?php if ($type == 'user' || $type == 'parent') echo $to ?>";
					} else {
						if ($("#sendtopar").prop('checked'))
						{
							var i = $("#receiver option:selected").index();
							var to;
							$.ajax({
								async: false,
								url: "parent.php",
								type: "POST",
								data: {
									io: i
								},
								success: function(data)
								{
									to = data;
								}
							});
						} else {
							var to = $("#receiver").val();
						}
						
					}
					
					var subject = $("#subject").val();
					var text = $("#text").val();
					$.ajax({
						url: "sendmsg.php",
						type: "POST",
						data: {
							from: from,
							to: to,
							subject: subject,
							text: text
						},
						success: function() {
						window.location.href = "messages.php";
						}
					});
					});
				});
			});	
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#submit2").click(function(){
				$("#pole").load("recmsg.php");
			});
		});
	</script>
</head>

<body>
	<!-- Nagłówek -->
    <header id="header">
        <div class="row" id="a">
            <div class="small-12 medium-12 large-12 columns">
                <?php
					echo "<h1>Wiadomości ".$_SESSION['username']." ";
					echo $_SESSION['userlastname']. '</h1>';
				?>
            </div>
        </div>
        <div class="row" id="b">
			<div class="small-12 medium-12 large-12 columns">
			    <h3>Tutaj możesz pisać, wysyłać i odbierać wiadomości</h3>
			</div>
		</div>
    </header>
    <br>
    <!-- Okno wysyłania/odbierania wiadowości -->
    <div id="content">
    	<div class="row">
	    	<div class="small-12 medium-12 large-12 columns">
	    		<h3>Skrzynka nadawczo-odbiorcza</h3>
	    	</div>
	    	<div class="small-12 medium-12 large-12 columns">
	    		<div class="sep"></div>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="small-12 medium-12 large-12 columns">
	          	<input id = "submit" type = "submit" name="submit" value = "Napisz wiadomość"/>
	        </div>
	        <div class="small-12 medium-12 large-12 columns">
        		<input id = "submit2" type = "submit" name = "submit2" value = "Pobierz wiadomości"/>
    		</div>
	    </div>
	    <div class="row">
	    	<div class="small-12 medium-12 large-12 columns">
	    		<div class="sep"></div>
	    	</div>
        	<div class="small-12 medium-12 large-12 columns">
	    		<div id ="pole"></div>
	    	</div>
	    </div>
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