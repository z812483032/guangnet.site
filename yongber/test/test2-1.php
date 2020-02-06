<?php
	require('mysql.php');
	$username = $_POST['username'];
	
	$strSQL = sprintf("Select * from user Where username = '%s'",$username);
	$myDB = new MyDB();
	$result = $myDB ->GetData($strSQL);
?>