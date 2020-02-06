<?php
	require('mysql.php');
	$username = $_POST['username'];
	$complate = $_POST['complate'];
	$id = $_POST['id'];
	
	$form = ''.$username.'form'.$id.'';
	if($complate == "未完成"){
	$strSQL = sprintf("Update $form set complate=1");
	$myDB = new MyDB();
	$result = $myDB ->ExecSQL($strSQL);
	echo 1;
	}
	if($complate == "已完成"){
	$strSQL = sprintf("Update $form set complate=0");
	$myDB = new MyDB();
	$result = $myDB ->ExecSQL($strSQL);
	echo 0;
	}
?>