<?php 
	// Obsługa nieprzeczytanych wiadomości, używany w messages.php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	require_once 'connect.php';

	$to = $_SESSION['email'];
	$type = $_SESSION['type'];

	$from = array();
	$subject = array();
	$text = array();

	$sql = "SELECT froms, subject, text FROM messages WHERE tos = '$to' 
	AND read_flag = 0";
	
	if ($result = $connect->query($sql)) {
		$rows = $result->num_rows;
		while ($row = $result->fetch_assoc()) {
		$from[] = $row['froms'];
		$subject[] = $row['subject'];
		$text[] = $row['text'];
		}	
	}
	
	echo "<div id = 'form'>
		<header id='header'>
			<h3>Nieprzeczytane wiadomości</h3>
		</header>
		<div class = 'sep'></div>";

	if ($type == "user" || $type == "parent") {
		echo "<div>";
		if ($rows > 0) {
			for ($i = 0; $i < $rows; $i++) {
			echo "<h3>Od: Terapeuta</h3>";
			echo "<h3>Temat: $subject[$i]</h3>";
			echo "<h3>Treść: $text[$i]</h3>";
			}
		}
		echo "</div>";
	} else {
		echo "<div>";
		for ($i = 0; $i < $rows; $i++) {
			echo "<h3>Od: $from[$i]</h3>";
			echo "<h3>Temat: $subject[$i]</h3>";
			echo "<h3>Treść: $text[$i]</h3>";
		}
		echo "</div>";
	}
	echo "</div>
	</div>";

	$sql2 = "UPDATE messages SET read_flag = 1 WHERE tos = '$to'";
	
	$connect->query($sql2); 
	$connect->close();
?>