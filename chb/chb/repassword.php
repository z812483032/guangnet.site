<?php
header("Content-type:text/html;charset=utf-8");


	$db = mysqli_connect('localhost', 'chb', 'chb19980505','chb');
	$name=$_GET["username"];
	$password=$_GET["password"];
	
	$sql="update user_code set password='$password' where username='$name'";

	mysqli_query($db,$sql);

?>