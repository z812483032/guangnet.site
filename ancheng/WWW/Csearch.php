<?php 
    require_once('database.php');
	$db = new MyDB();
	$user = $_REQUEST['user'];
	$text = $_REQUEST['text'];
	$strSQL = "select * from house where (Csno like '%$text%' or Cname like '%$text%' or Cmessage like '%$text%') and Cuser='$user' order by Csno";
	$result = $db->GetData($strSQL);
	$i =1;
	while($obj = $result->fetch_object()){
		  $idss = $obj->Cid;
		 echo "<tr>";
		 echo "<td>{$i}</td>";
		 echo "<td>{$obj->Csno}</td>";
		 echo "<td>{$obj->Cname}</td>";
		 echo "<td>{$obj->Cmessage}</td>";
		 echo "<td><a id='r$idss' onClick=\"openPut(this.id);\"><span class=\"glyphicon glyphicon-wrench\"></span>修改 </a><a id='s$idss' onClick=\"openOut(this.id);\"><span class=\"glyphicon glyphicon-trash\"></span>删除 </a></td>";
		 echo "</tr>";
		 $i = $i+1;
		 }
?>