<?php
	require('mysql.php');
	$username = $_POST['username'];
	$strSQL = sprintf("Select * from user Where username = '%s'",$username);
	$myDB = new MyDB();
	$result = $myDB ->GetData($strSQL);
	if($result->num_rows == 0)
	{
		echo 0;
	}else{
		echo 1;
	}
?>