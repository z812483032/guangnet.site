<?php 
    //$db = @new mysqli('127.0.0.1','root','123456','my'); 
   //if($db->connect_error)
       //die('链接错误'.$db->connect_error);
    $user = $_GET['user'];
	$psw = $_GET['psw'];
	require_once('database.php');
	$db = new MyDB();
	//查询是否可登录
	$str1 = sprintf("Select * From user Where user='%s' and psw='%s'",$user,$psw);
    //$res1 = $db->query($str1);
	$res1 = $db->GetData($str1);
	if($res1->num_rows !=0){
		echo 0;
		}
	//查询登录用户是否存在
    $str2 = sprintf("Select * From user Where user='%s'",$user);
    //$res2 = $db->query($str2);
	$res2 = $db->GetData($str2);
	if($res2->num_rows == 0){
		echo 1;
		}
	//密码错误
	if($res2->num_rows !=0 && $res1->num_rows ==0){
		echo 2;
		}	
?>