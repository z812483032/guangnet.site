<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>提交结果</title>
<?php
	$comingUrl =  $_SERVER['HTTP_REFERER'];
	$arr1 = parse_url($comingUrl);
	$arr2 = pathinfo($arr1['path']);
	$filename = $arr2["filename"];
	require("../php/conn.php");
	$sql_col = "SELECT COLUMN_NAME FROM information_schema.COLUMNS
WHERE TABLE_SCHEMA = 'guangnet_site' AND TABLE_NAME = '$filename'";
	$result = mysqli_query($link,$sql_col) or die("Query failed : " . mysqli_error($link));
	$col_name = array();
	$col_data = array();
	$array_col = array();
	$cnt=0;
	$cnt_array=0;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		foreach($row as $i){
			if($cnt>0){
				if(is_array($_POST[$i])){
					$col_name[$cnt] = $i;
					$col_data[$cnt]=implode(",",$_POST[$i]);
				}else{
					$col_name[$cnt] = $i;
					$col_data[$cnt] = $_POST[$i];
				}
			}
			$cnt ++;
		}
	}
	$colname ='';
	$colval ='';
	
	for($i=1;$i<$cnt;$i++){
		if($i<$cnt-1){
			$colname = $colname . $col_name[$i] . " , ";
		}else{
			$colname = $colname . $col_name[$i] ;
		}
	}
	for($i=1;$i<$cnt;$i++){
		if($i<$cnt-1){
			$colval = $colval . " ' ". $col_data[$i]. " ' " . " , ";
		}else{
			$colval = $colval . " ' ". $col_data[$i]. " ' " ;
		}
	}
	$sql_insert = "insert into $filename($colname) values($colval)";
	
	$result_insert = mysqli_query($link,$sql_insert) or die("Query failed : " . mysqli_error($link));
	echo mysqli_error($link);
	mysqli_close($link);
?>

</head>

<body>
	<h1 class='text-center'>提交成功！</h1>
	
</body>
</html>