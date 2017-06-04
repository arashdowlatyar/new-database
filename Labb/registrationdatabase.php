<?php 
	$mysqli = mysqli_connect('localhost', 'root', '', 'labben');
	$salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
	$username = mysqli_real_escape_string($mysqli, $_POST["username"]);
	$email = mysqli_real_escape_string($mysqli, $_POST["email"]);
	$password = mysqli_real_escape_string($mysqli, $_POST["password"]);
	$hash = crypt($password, $salt);

	$query = mysqli_query($mysqli, "SELECT username, email FROM users WHERE email ='$email'");

	if (mysqli_num_rows($query)>=1) {
		echo "Epost finns redan!";
	}
	else if (!preg_match('/[0-9]/', $password)) {
		echo "Lösenordet är inte starkt nog.";
	} else {
		$sql = mysqli_query($mysqli, "INSERT INTO users (username, email, password, salt)
		VALUES ('$username', '$email', '$hash', '$salt')");
		header("Location: index.php");
	}
?>