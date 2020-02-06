<?php
header("Content-type:text/html;charset=utf-8");
$db = mysqli_connect('localhost', 'chb', 'chb19980505','chb');
	
    $username=$_REQUEST["username"];
    $code=$_REQUEST["code"];
	$sql="select * from user_code where username='$username' and identity='$code'";
	$result=mysqli_query($db,$sql);

	if(mysqli_num_rows($result)>0){
		echo "身份验证成功";  //输出1表示已被注册
	}
	else{
	   echo "身份验证失败";
	}
?>
