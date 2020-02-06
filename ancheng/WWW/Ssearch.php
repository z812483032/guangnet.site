<?php 
    require_once('database.php');
	$db = new MyDB();
	$user = $_REQUEST['user'];
	$text = $_REQUEST['text'];
	$strSQL = "select * from stable where (Ssno like '%$text%' or SCsno like '%$text%' or SHsno like '%$text%' or Scustmer like '%$text%' or Sprice like '%$text%' or Snum like '%$text%' or Sdate like '%$text%') and Suser='$user' order by Sdate,Ssno,SCsno,SHsno ";
	$result = $db->GetData($strSQL);
	
	$i =1;
	while($obj = $result->fetch_object()){
		 $idss = $obj->Sid;
		 echo "<tr>";
		 echo "<td>{$i}</td>";
		 echo "<td>{$obj->Sdate}</td>";
		 echo "<td>{$obj->Ssno}</td>";
		 echo "<td>{$obj->SCsno}</td>";
		 echo "<td>{$obj->SHsno}</td>";
		 echo "<td>{$obj->Scustmer}</td>";
		 echo "<td>{$obj->Sprice}</td>";
		 echo "<td>{$obj->SRnum}</td>";
		 //echo "<td>{$obj->Rdate}</td>";
		 echo "<td><a id='r$idss' onClick=\"openPut(this.id);\"><span class=\"glyphicon glyphicon-wrench\"></span>修改 </a><a id='s$idss' onClick=\"openOut(this.id);\"><span class=\"glyphicon glyphicon-trash\"></span>删除 </a></td>";
		 echo "</tr>";
		 $i = $i+1;
		 }
?>