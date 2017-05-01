<?php
	require_once 'connect.php';
		
	$email = $_REQUEST["email"];
	$password = $_REQUEST["password"];
	$hash = $_REQUEST["hash"];
	
	$secretKey="ibmiwm";
	
	$hash_password = md5($password);
	
	$real_hash = md5($email . $password . $secretKey); 
	if ($real_hash == $hash) {
		if (!$email || !$password) {
			echo "EmptyFields";
		} else {
			$sql = "SELECT type, password FROM accounts WHERE email = '$email'";
			$result = $connect->query($sql);
			$total = $result->num_rows;
			if ($total) {
				$data = $result->fetch_array();

				$type = $data['type'];

				if($type == 'user')
				{
					if ($hash_password == $data['password']) {
						echo "Success";
					} else {
						echo "WrongPassword";
					}
				} else {
					echo "NoRights";
				}
			} else {
				echo "NoSuchEmail";
			}
		}
	}
	
	$connect->close();
?>