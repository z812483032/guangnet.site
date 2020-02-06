<?php 
    $user = $_GET['user'];
	$psw = $_GET['psw'];
	$question = $_GET['question'];
	$answer = $_GET['answer'];
	 require_once('database.php');
	//$db = @new mysqli('127.0.0.1','root','123456','my'); 
    //if($db->connect_error)
       //die('链接错误'.$db->connect_error);
	$str1 = sprintf("Select * From user Where user='%s'",$user);
    //$res1 = $db->query($str1);
	$db = new MyDB();
	$res1 = $db->ExecSQL($str1);
	//用户已注册
	if($res1->num_rows !=0){
		echo 0;
		}
	//用户未注册
     if($res1->num_rows ==0){
		 $strSQL = "Insert into user(user,psw,question,answer) values('$user','$psw','$question','$answer')";
	     $result = $db->ExecSQL($strSQL);
		 echo 1;
		 }
?>