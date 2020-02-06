<?php
	$username = $_GET["username"];
	require("conn.php");
	$sql = "select id,title,time,formname from formmessage where username='".$username."'";
	$result = mysqli_query($link,$sql) or die("Query failed : " . mysqli_error($link));
	$rows1 = mysqli_affected_rows($link);
	$row1 = mysqli_fetch_all($result);

	for($i=0;$i<$rows1;$i++){
		$form = $row1[$i][3];
		$formname = substr($form,0,strpos($form,'.'));
		$sql_num = "select * from ".$formname;
		$result = mysqli_query($link,$sql_num) or die("Query failed : " . mysqli_error($link));
		$rows = mysqli_affected_rows($link);
		$row1[$i][0] = $rows;
	}
//	$temp1 = 0;
//	while ($row = mysqli_fetch_assoc($result)) {
//		$results[] = $row;
//		//print_r($results);
//		$form = $results[$temp1]['formname'];
//		$formname = substr($form,0,strpos($form,'.'));
//		$sql_num = "select * from ".$formname;
//		$result = mysqli_query($link,$sql_num) or die("Query failed : " . mysqli_error($link));
//		$rows = mysqli_affected_rows($link);
//		$results[0]["id"] = $rows;
//		$temp1++;
//		print_r($results);
//		//echo $results;
//	}

 	echo json_encode($row1,JSON_UNESCAPED_UNICODE);
?>