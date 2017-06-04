<?php
		$mysqli = mysqli_connect('localhost', 'root', '', 'labben');
		$error = $mysqli->connect_error;
		$sql=mysqli_query($mysqli, "SELECT user, epost, comment FROM comments");
	while($rows=mysqli_fetch_assoc($sql)){
		$comments=$rows['comment'];
		$name=$rows['user'];
		$mail=$rows['epost'];
	echo $mail."," ."<br/><br/>".$comments ."<br/> <hr/>";
	}
?>