<?php
	$mysqli = mysqli_connect('localhost', 'root', '', 'labben');
	$error = $mysqli->connect_error;
	$sql = mysqli_query($mysqli, "SELECT username, email, comment FROM comments");
	
	while($rows = mysqli_fetch_assoc($sql)){
		$comments = $rows['comment'];
		$username = $rows['username'];
		$email = $rows['email'];
	echo $email."," ."<br/><br/>". $comments ."<br/> <hr/>";
	}
?>