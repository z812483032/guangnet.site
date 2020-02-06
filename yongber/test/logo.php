<?php
	require('mysql.php');
	$username = $_POST['username'];
	
	$strSQL = sprintf("Select password,oldtime from user Where username='%s'",$username);
	$myDB = new MyDB();
	$result = $myDB ->GetData($strSQL);
	$data = $result->fetch_all();
	if($result->num_rows == 0)
	{
		echo 2;
	}else{
		$data1 = array();
		$data1["password"] = $data[0][0];
		$data1["oldtime"] = $data[0][1]; 
		echo json_encode($data1);
	}
?>