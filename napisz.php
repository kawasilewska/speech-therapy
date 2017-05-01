<?php 
	// Załadowanie formularza umożliwiającego napisanie wiadomości przez terapeutę
	session_start();

	$type = $_SESSION['type'];
	if ($type == "teacher")
	{
		$rows = $_SESSION['rows'];
		$to = $_SESSION['to'];
		$name = $_SESSION['name'];
		$lastname = $_SESSION['lastname'];
	}
	
	echo "<div id = 'form'>
		<header>
			<h3>Wyślij wiadomość</h3>
		</header>
		<div class = 'sep'></div>
		<div>
			<form method='post'>";
				if($type == "teacher")
				{
					echo "<label>Wybierz odbiorcę: ";
					echo "<select id = 'receiver' name='receiver' class='types'>";
					if ($rows > 0) {
						for ($i = 0; $i < $rows; $i++) {
							echo "<option value = '$to[$i]'>$name[$i] $lastname[$i]</option><br />"; 	
						}
						echo "<input id = 'sendtopar' type = 'checkbox' name = 'sendtopar' 
						value='Napisz do rodzica'>Napisz do rodzica</input><br />";
					} else {
						echo "<option>Brak odbiorców</option>";
					}	
					echo "</select>";
					echo "</label><br />";
				}
					echo "<label><input id = 'subject' type = 'text' name = 'subject' placeholder = 'Temat' maxlength='100'  required='required' /></label><br />
					<label><textarea id = 'text' name = 'text' rows = '7' cols = '40' placeholder = 'Treść wiadomości' ></textarea></label><br /> 
					<label><input id = 'submit3' type = 'submit' name='submit3' value = 'Wyślij wiadomość' /></label>
			</form>
		</div>
	</div>";
?>