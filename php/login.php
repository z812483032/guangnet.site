<?php
	$username = $_GET["username"];
	$password = $_GET["password"];
	$severname = 'localhost';
	$conn = new MySQLi($severname,'guangnet_site','JsCtmce84hiXaiLh','guangnet_site');
	if($conn->connect_error){
		die("链接失败:".$conn->connect_error);
	}
	$sql_select = "select username from login where username='".$username."' and password='".$password."';";
	$result = mysqli_query($conn,$sql_select);
	$rows = mysqli_num_rows($result);
	if($rows>0){
		echo "登录成功";
	}else{
		echo "登陆失败";
	}
?>