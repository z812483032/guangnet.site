<?php 
  require_once('database.php');
	$db = new MyDB();
	$user = $_REQUEST['user'];
	$text = $_REQUEST['text'];
	$strSQL = "select * from rtable where (Rsno like '%$text%' or RCsno like '%$text%' or RHsno like '%$text%' or Rshop like '%$text%' or Rprice like '%$text%' or Rnum like '%$text%' or Rdate like '%$text%') and Ruser='$user' order by Rdate";
	$result = $db->GetData($strSQL);
	$i =1;
	while($obj = $result->fetch_object()){
		 $idss = $obj->Rid;
		 echo "<tr>";
		 echo "<td>{$i}</td>";
		 echo "<td>{$obj->Rdate}</td>";
		 echo "<td>{$obj->Rsno}</td>";
		 echo "<td>{$obj->RCsno}</td>";
		 echo "<td>{$obj->RHsno}</td>";
		 echo "<td>{$obj->Rshop}</td>";
		 echo "<td>{$obj->Rprice}</td>";
		 echo "<td>{$obj->Rnum}</td>";
		 //echo "<td>{$obj->Rdate}</td>";
		 echo "<td><a id='r$idss' onClick=\"openPut(this.id);\"><span class=\"glyphicon glyphicon-wrench\"></span>修改 </a><a id='s$idss' onClick=\"openOut(this.id);\"><span class=\"glyphicon glyphicon-trash\"></span>删除 </a></td>";
		 echo "</tr>";
		 $i = $i+1;
		 }
?>