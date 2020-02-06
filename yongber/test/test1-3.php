<?php
	require('mysql.php');
	$username = $_POST['username'];
	$remeber = $_POST['remeber'];
	
	$strSQL = sprintf("Update user set remeber = '%s' Where username = '%s'",$remeber,$username);
	$myDB = new MyDB();
	$result = $myDB ->ExecSQL($strSQL);
?>