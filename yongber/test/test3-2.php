<?php
	require('mysql.php');
	$username = $_POST['username'];
	$strSQL = sprintf("Select question from user Where username = '%s'",$username);
	$myDB = new MyDB();
	$result = $myDB ->GetData($strSQL);
	$data = $result->fetch_all();
	$data1 = array();
	$data1["question"] = $data[0][0];
	echo json_encode($data1);
?>