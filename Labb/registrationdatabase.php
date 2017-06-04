<?php 
		$mysqli = mysqli_connect('localhost', 'root', '', 'labben');
		$salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
		$users=mysqli_real_escape_string($mysqli, $_POST["user"]);
		$mail=mysqli_real_escape_string($mysqli, $_POST["mail"]);
		//ändra till mail från epost
		$password=mysqli_real_escape_string($mysqli,$_POST["password"]);
		$hash=crypt($password,$salt);

		$_sql=mysqli_query($mysqli, "SELECT users, epost FROM comments WHERE epost='$mail'");
		//ändra efter where till mail

	if (mysqli_num_rows($_sql)>=1)
	{
		echo "Epost finns redan!";
	}
	else if(!preg_match('/[0-9]/', $password)){
		echo "Lösenordet är inte starkt nog.";
	}

	else 
{
		$sql=mysqli_query($mysqli, "INSERT INTO user (users, epost, password, salt)
		/* om fel user skall bli users */
		VALUES ('$users', '$epost', '$hash', '$salt')");
		//om fel byt ut epost till mail
		header("Location: index.php");
	}
?>