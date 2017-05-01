<?php 
        header('Content-type: text/html; charset=utf-8');
		require_once 'connect.php';
		
		$game = $_REQUEST['game'];
		$email = $_REQUEST["email"];
		$points1 = $_REQUEST["points1"];
		$points2 = $_REQUEST["points2"];
		$points3 = $_REQUEST["points3"];
		$totalPoints = $_REQUEST["totalPoints"];
		$btime = $_REQUEST["btime"];
		$hash = $_REQUEST["hash"];
 
        $secretKey="ibmiwm";

        $real_hash = md5($game . $email . $points1 . $points2 . $points3 . $totalPoints . $btime . $secretKey); 
        if ($real_hash == $hash) {
            $sql = "INSERT INTO results (game, email, points1, points2, points3, totalPoints, btime) VALUES ('$game', '$email', '$points1', '$points2', '$points3', '$totalPoints', '$btime')"; 
            $connect->query($sql);
        } 
		$connect->close();
?>