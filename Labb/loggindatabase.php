<?php
	session_start();
		$mysqli = mysqli_connect('localhost', 'root', '', 'labben');
		$user=$_POST["user"];
		$password=$_POST["pass"];
		$sql=mysqli_query($mysqli, "SELECT users, password, salt FROM user WHERE epost='$user' LIMIT 1");
		print_r($user);

	while ($row=mysql_fetch_array($sql)){
	if (crypt($password, $row[2])==$row[1]) {

		echo "Login Successful"; 
		$_SESSION["user"]=$user;
		header("location:comments.php");
	}
	else { 
		
		echo($password)."<br/>";
		echo($row[1])."<br/>";
		echo($row[2])."<br/>";
		echo(crypt($password, $row[2]));
		echo "Login not successful";
	}
}

?>