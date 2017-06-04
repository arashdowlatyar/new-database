<?php
	session_start();
	$mysqli = mysqli_connect('localhost', 'root', '', 'labben');
	$username = $_POST["username"];
	$password = $_POST["pass"];
	$sql = mysqli_query($mysqli, "SELECT username, password, salt FROM users WHERE username = '$username' LIMIT 1");
	
	while ($row = mysqli_fetch_array($sql)){
	if (crypt($password, $row[2]) === $row[1]) {
		$_SESSION["user"] = $username;
		header("Location: comments.php");
	} else { 
		echo "Login not successful";
	}
}

?>
