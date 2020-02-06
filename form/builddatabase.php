<?php 
	require_once("../php/conn.php");
	$username = $_POST["username"];
	$idArr = $_POST["idArr"];
	$filename = $_POST["filename"];
	$text = " varchar(255) ";
	$midlle_text="";
	$length = sizeof($idArr);
	for($i=0;$i<$length;$i++){
		if($i==$length-1){
			$middle_text=$middle_text.$idArr[i].$text;
		}else{
			$middle_text=$middle_text.$idArr[i].$text.",";
		}
	}
	$sql_database = "create table ".$filename."( ".$midle_text.")";
	$result = mysqli_query($link,$sql_database) or die("Query failed : " . mysqli_error($link));
	mysqli_close($link);
?>