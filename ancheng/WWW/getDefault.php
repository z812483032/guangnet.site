<?php 
    require_once('database.php');
    $db = new MyDB();
    $id = $_REQUEST['id'];
	$id = intval($id);
	$str = "select * from goods where Hid='$id' ";
	$result = $db->GetData($str);
	$name = "";
    $num =0;
    $type = "";
    while($obj = $result->fetch_object()){
               $name = $obj->Hname;
               $num = $obj->Hnum;
			   $type = $obj->Htype;
               }	
     echo $name,'!',$num,'!',$type;	 
?>