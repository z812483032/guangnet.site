<?php
	require('mysql.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$strSQL = sprintf("Update user set password='%s' Where username = '%s'",$password,$username);
	$myDB = new MyDB();
	$result = $myDB -> ExecSQL($strSQL);
?>