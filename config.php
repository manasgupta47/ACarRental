<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "cars_data";
	
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Failed:" . $conn->connect_error;
	}
?>
