<?php
	$title = $_GET["title"];
	require("conn.php");
	$sql_message = "select formname from formmessage where title='". $title ."';";
	$result_message = mysqli_query($link,$sql_message ) or die("Query failed : " . mysqli_error($link));
	$row_message = mysqli_fetch_all($result_message);
	$form = $row_message[0][0];
	$formname = substr($form,0,strpos($form,'.'));
	$sql_drop = "drop table ".$formname.";";
	$result_message = mysqli_query($link,$sql_drop ) or die("Query failed : " . mysqli_error($link));
	$sql_message_delete = "delete from formmessage where formname='".$form."';";
	$result_message_delete = mysqli_query($link,$sql_message_delete ) or die("Query failed : " . mysqli_error($link));
	if(!unlink('../form/'.$form)){
		echo ("Error deleting $file");
	}else{
		echo ("Deleted $file");
	}
?>