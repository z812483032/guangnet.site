<?php 
    require_once('database.php');
    $db = new MyDB();
    $id = $_REQUEST['id'];
	$id = intval($id);
	$str = "select * from house where Cid='$id' ";
	$result = $db->GetData($str);
	$name = "";
    $num ="";
    //$type = "";
    while($obj = $result->fetch_object()){
               $name = $obj->Cname;
               $num = $obj->Cmessage;
			   //$type = $obj->Htype;
               }	
     echo $name,'!',$num;	 
?>