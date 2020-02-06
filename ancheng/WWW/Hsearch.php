<?php 
    require_once('database.php');
	$db = new MyDB();
	$user = $_REQUEST['user'];
	$text = $_REQUEST['text'];
	$strSQL = "select * from goods where (Hsno like '%$text%' or HCsno like '%$text%' or Hname like '%$text%' or Htype like '%$text%' or Hnum like '%$text%') and Huser='$user' order by HCsno,Hsno";
	$result = $db->GetData($strSQL);
	$i =1;
	while($obj = $result->fetch_object()){
		 $idss = $obj->Hid;
		 echo "<tr>";
		 echo "<td>{$i}</td>";
		 echo "<td>{$obj->HCsno}</td>";
		 echo "<td>{$obj->Hsno}</td>";
		 echo "<td>{$obj->Hname}</td>";
		 echo "<td>{$obj->Hnum}</td>";
		 echo "<td>{$obj->Htype}</td>";
		 echo "<td><a id='r$idss' onClick='openPut(r$idss);'><span class=\"glyphicon glyphicon-plus-sign\"></span>入库 </a><a id='s$idss' onClick='openOut(s$idss);'><span class=\"glyphicon glyphicon-minus-sign\"></span>出库 </a><a id='x$idss' onClick='openFix(x$idss);'><span class=\"glyphicon glyphicon-wrench\"></span>修改 </a></td>";
		 echo "</tr>";
		 //$td = $string1.$string2.$string3.$string4.$string5.$string6.$string7.$string8.$string9;
		 //$data["retu"] = $td+$data["retu"];
		 $i = $i+1;
		 }
?>