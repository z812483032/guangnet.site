<?php
	require('mysql.php');
	$username = $_POST['username'];
	$strSQL = sprintf("Select formnumber from user where username='%s'",$username);
	$myDB = new MyDB();
	$result = $myDB -> GetData($strSQL);
	$data = $result->fetch_all();
	$formnumber = $data[0][0];
	$strSQL2 = sprintf("show tables");
	$myDB = new MyDB();
	$result2 = $myDB -> GetData($strSQL2);
	$data2 = $result2->fetch_all();
	$newarray = array();
	for($i1 = 0;$i1<count($data2);$i1++){
		$newarray[$i1] = $data2[$i1][0];
	}
	$array = array();
	$arraynumber = 0;
	for($i = $formnumber;$i > 0;$i--){
		$form = ''.$username.'form'.$i.'';
		$formnumber1 = array_count_values($newarray);
		foreach($formnumber1 as $k1 => $v1){
			if($form != $k1){
				$check = 0; 
			}
			else{
				$check = 1;
				break;
			}
		}
		if($check == 1){
			$strSQL1 = sprintf("drop table $form");
			$myDB = new MyDB();
			$result1 = $myDB -> ExecSQL($strSQL1);
			}
		}

	$strSQL = sprintf("Delete from user Where username = '%s'",$username);
	$myDB = new MyDB();
	$result = $myDB -> ExecSQL($strSQL);	
	
?>