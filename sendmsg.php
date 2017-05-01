<?php 
	/* Wysłanie wiadomości, używany w messages.php */
	require_once 'connect.php';

	$from = $_POST['from'];
	$to = $_POST['to'];
	$subject = $_POST['subject'];
	$text = $_POST['text'];

	$sql = "INSERT INTO messages (froms, tos, subject, text) 
	VALUES ('$from', '$to', '$subject', '$text')";
	$connect->query($sql);
	$connect->close();

?>