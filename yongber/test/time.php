<?php
	require('mysql.php');
	$username = $_POST['username'];
	
	$strSQL = sprintf("Update user Set time='%s' Where username='%s'",date('Y-m-d H:i:s'),$username);
	$strSQL1 = sprintf("Select time from user where username='%s'",$username);
	$myDB = new MyDB();
	$result1 = $myDB ->GetData($strSQL1);
	$data = $result1->fetch_all();
	$strSQL2 = sprintf("Update user set oldtime='%s' where username='%s'",$data[0][0],$username);
	$result3 = $myDB ->GetData($strSQL2);
	$result = $myDB ->ExecSQL($strSQL);
?>