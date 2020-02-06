<?php 
   require_once('database.php');
    $db = new MyDB();
    $id = $_REQUEST['id'];
	$id = intval($id);
	$str = "select * from rtable where Rid='$id' ";
	$result = $db->GetData($str);
	$date = "";
    $shop ="";
	$price = "";
	$num = "";
    //$type = "";
    while($obj = $result->fetch_object()){
               $date = $obj->Rdate;
               $shop = $obj->Rshop;
			   $price = $obj->Rprice;
			   $num = $obj->Rnum;
			   //$type = $obj->Htype;
               }	
     echo $date,'!',$shop,'!',$price,'!',$num;	 
?>