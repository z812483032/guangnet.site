<?php
	require('mysql.php');
	$form = $_POST['form'];
	$strSQL = sprintf("Select complate from $form");
	$myDB = new MyDB();
	$result = $myDB ->GetData($strSQL);
	$data = $result->fetch_all();
	echo $data[0][0];
?>