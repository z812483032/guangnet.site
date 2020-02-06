<?php
	require('mysql.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	$strSQL = sprintf("Insert into user values('%s','%s','%s','%s',0,'%s',null,0)",$username,$password,$question,$answer,date('Y-m-d H:i:s'));
	$myDB = new MyDB();
	$result = $myDB ->ExecSQL($strSQL);
?>