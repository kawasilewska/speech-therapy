<?php
	// Wyświetlenie dostępnych terapeutów w postaci rozwijanej listy w trakcie rejestracji
	header('Content-Type: text/html; charset=utf-8');
	require_once 'connect.php';
	
	$ids = array();
	$names = array();
	$lastnames = array();
	
	$sql = "SELECT id, name, lastname FROM accounts WHERE type = 'teacher'";
	
	if ($result = $connect->query($sql)) {
		$rows = $result->num_rows;
		while ($row = $result->fetch_assoc()) {
			$ids[] = $row['id'];
			$names[] = $row['name'];
			$lastnames[] = $row['lastname'];
		}
	}

	echo "<label><h5>Terapeuta:</h5>";
	echo "<select name='therapist' class='types'>";
	if ($rows > 0) {
		for ($i = 0; $i < $rows; $i++) {
			echo "<option value='$ids[$i]'>$names[$i] $lastnames[$i]</option>";
		}
	} else {
		echo '<option>Brak terapeutów</option>';
	}
	echo "</select>";
	echo "</label><br>";
	
	$connect->close();
?>