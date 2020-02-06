<?php
	require_once("conn.php");
	$introduce = $_POST["introduce"];
	$username = $_POST["username"];
	$title = $_POST["title"];
//	$introduce = htmlentities($introduce);
//	echo $introduce;
	if($introduce!='' && $username!=''){
		$sql_insert = "insert into form(introduce,username,title) values ('$introduce','$username','$title')";
		// $sql_insert_result = "insert into form(username,formname) values ('$username','$title')";
		// mysqli_query($link,$sql_insert_result);
		
		$result = mysqli_query($link,$sql_insert) or die("Query failed : " . mysqli_error($link));
		
	}
	require 'buildHtml.php';
?>