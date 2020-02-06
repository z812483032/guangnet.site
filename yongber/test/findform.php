<?php
	require('mysql.php');
	$title = $_POST['title'];
	$username = $_POST['username'];
	$strSQL = sprintf("Select formnumber from user where username='%s'",$username);
	$myDB = new MyDB();
	$result = $myDB ->GetData($strSQL);
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
		$strSQL1 = sprintf("Select title,customer,gotime,addtime,complate,id from $form");
		$myDB = new MyDB();
		$result1 = $myDB -> GetData($strSQL1);
		$data1 = $result1->fetch_all();
		$array[$arraynumber] = $data1[0][0];
		$arraynumber++;
		$array[$arraynumber] = $data1[0][1];
		$arraynumber++;
		$array[$arraynumber] = $data1[0][2];
		$arraynumber++;
		$array[$arraynumber] = $data1[0][3];
		$arraynumber++;
		$array[$arraynumber] = $data1[0][4];
		$arraynumber++;
		$array[$arraynumber] = $data1[0][5];
		$arraynumber++;
		}
	}
	
	$temp = 0;
	$temp1 = 0;
	for($j = 0; $j<$arraynumber;$j++){
	if($temp == 0){
		if(strstr($array[$j],$title) != null){
			if($temp1 == 0){
			echo $array[$j].",";
			$temp1++;
			}else{
			echo ",".$array[$j].",";
			}
			echo $array[$j+1].",";
			echo $array[$j+2].",";
			echo $array[$j+3].",";
			echo $array[$j+4].",";
			echo $array[$j+5];
		}
	}
		$temp++;
		if($temp == 6){
			$temp = 0;
		}
	}
?>