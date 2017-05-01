<?php
	// Realizacja wylogowania z gry
	session_start();			
	session_unset();
	header('Location: index.php');
?>
