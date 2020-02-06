<?php
 $customer = $_POST['customer'];
 $array = explode(",",$customer);
 $newarray = array();
		$customername = array_count_values($array);
		foreach($customername as $k1 => $v1){
			if($v1 == 1){
				$newarray[] = $k1;}
			else{
				$newarray[] = $k1;
			}
			
		}
	for($j1 = 0;$j1<count($newarray);$j1++){
		if($j1 == count($newarray)-1){
			echo $newarray[$j1];
		}else{
			echo $newarray[$j1].",";
		}
	}
?>