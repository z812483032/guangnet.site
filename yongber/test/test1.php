<?php
	require('mysql.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$strSQL = sprintf("Select * from user Where username = '%s' And password = '%s'",$username,$password);
	$myDB = new MyDB();
	$result = $myDB ->GetData($strSQL);
	if($result->num_rows == 0)
	{
		echo 0;
	}else{
		echo 1;
	}
?>