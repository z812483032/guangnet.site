<?php
	$newpassowrd = $_GET["newpassword"];
	$oldpassword = $_GET["oldpassword"];
	$username = $_GET["username"];
	$severname = 'localhost';
	$conn = new MySQLi($severname,'guangnet_site','JsCtmce84hiXaiLh','guangnet_site');
	if($conn->connect_error){
		die("链接失败:".$conn->connect_error);
	}
	$sql_select = "select username from login where username='".$username."' and password='".$oldpassword."';";
	$result = mysqli_query($conn,$sql_select);
	$rows = mysqli_num_rows($result);
	if($rows>0){
		echo "修改成功";
		$sql_update = "update login set password='".$newpassowrd."' where username='".$username."';";
		$result = mysqli_query($conn,$sql_update);
	}else{
		echo "修改失败";
	}
?>