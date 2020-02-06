<?php
	require('mysql.php');
	$id = $_POST['id'];
	$username = $_POST['username'];
	$form = ''.$username.'form'.$id.'';
	$strSQL = sprintf("drop table $form");
	$myDB = new MyDB();
	$myDB ->ExecSQL($strSQL);
?>