<?php
	$username = $_GET["username"];
	$password = $_GET["password"];
	$severname = 'localhost';
	$conn = new MySQLi($severname,'guangnet_site','JsCtmce84hiXaiLh','guangnet_site');
	if($conn->connect_error){
		die("链接失败:".$conn->connect_error);
	}
	$sql_select = "select username from login where username='".$username."';";
	$result = mysqli_query($conn,$sql_select);
	$rows = mysqli_num_rows($result);
	if($rows>0){
		echo "存在";
	}else{
		$sql_insert = "insert into login(username,password) values('".$username."','".$password."')";
		mysqli_query($conn,$sql_insert);
		echo "不存在";
	}
?>