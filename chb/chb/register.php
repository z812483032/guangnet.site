<?php
header("Content-type:text/html;charset=utf-8");

	$db = mysqli_connect('localhost', 'chb', 'chb19980505','chb');
	$name=$_GET["username"];
	$password=$_GET["password"];
    $identity=$_GET["identity"];
	
	$sql="insert into user_code(username,password,identity) values('$name','$password','$identity')";

	mysqli_query($db,$sql);

?>