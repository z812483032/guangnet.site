<?php 
    require_once('database.php');
    $db = new MyDB();
    $id = $_REQUEST['id'];
	$id = intval($id);
	$str = "select * from stable where Sid='$id' ";
	$result = $db->GetData($str);
	$date = "";
    $shop ="";
	$price = "";
	$num = "";
    //$type = "";
    while($obj = $result->fetch_object()){
               $date = $obj->Sdate;
               $shop = $obj->Scustmer;
			   $price = $obj->Sprice;
			   $num = $obj->Snum;
			   //$type = $obj->Htype;
               }	
     echo $date,'!',$shop,'!',$price,'!',$num;	 
?>