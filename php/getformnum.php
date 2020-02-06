<?php
	$formname_all = $_GET["formname"];
	require("conn.php");
	$formname = substr($formname_all,0,strpos($formname_all,'.'));
	$sql_row_num = "select * from ".$formname;
	$result = mysqli_query($link,$sql_row_num);
	$rows = mysqli_affected_rows($link);
	echo $rows;
?>