<?php
header("Content-type:text/html;charset=utf-8");
$db = mysqli_connect('localhost', 'chb', 'chb19980505','chb');
	$username=$_REQUEST["username"];
	$sql="select * from user_code where username='$username'";
	$result=mysqli_query($db,$sql);
	$a=mysqli_num_rows($result);

	if(mysqli_num_rows($result)>0){
		echo "该用户名已被注册";  //输出1表示已被注册
	}
	else{
	   echo "该用户名可以注册";
	}
?>
