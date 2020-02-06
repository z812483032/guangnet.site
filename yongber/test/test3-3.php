<?php
	require('mysql.php');
	$username = $_POST['username'];
	$answer = $_POST['answer'];
	$strSQL = sprintf("Select * from user Where username = '%s' And answer = '%s'",$username,$answer);
	$myDB = new MyDB();
	$result = $myDB ->GetData($strSQL);
	if($result->num_rows == 0)
	{
		echo 0;
	}else{
		echo 1;
	}
?>