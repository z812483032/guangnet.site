<?php
    require_once('database.php');
    $db = new MyDB();
	$id = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$type = $_REQUEST['type'];
	$num = $_REQUEST['num'];
	$user = $_REQUEST['user'];
	$id = intval($id);
	$num = intval($num);
	$SQL = "update goods set Hname='$name',Htype='$type',Hnum='$num' where Hid='$id'";
	$db->GetData($SQL);
	//echo $num;
	$records = 8;
       $page =1;
       $strA = "select * from goods where Huser='$user'";
       $res = $db->GetData($strA);
       $numA = $res->num_rows;
      if(isset($_REQUEST['page']) ===true){ $page = $_REQUEST['page'];}
      if($page > ceil($numA/$records)){$page--;}
      $nStart = ($page-1)*$records;
       if($nStart+$records >$numA-1){
	     $records = $numA-$nStart;
	     }
      $strSQLA = "select * from goods where Huser='$user' order by HCsno,Hsno limit $nStart,$records";
	 $resultA = $db->GetData($strSQLA);
	 $i = $nStart+1;
	 //$data["retu"] = "";
	 //echo $num,'!',$page,'!';
	 while($obj = $resultA->fetch_object()){
		 $idss = $obj->Hid;
		 echo "<tr>";
		 echo "<td>{$i}</td>";
		 echo "<td>{$obj->HCsno}</td>";
		 echo "<td>{$obj->Hsno}</td>";
		 echo "<td>{$obj->Hname}</td>";
		 echo "<td>{$obj->Hnum}</td>";
		 echo "<td>{$obj->Htype}</td>";
		 echo "<td><a id='r$idss' onClick=\"openPut(this.id);\"><span class=\"glyphicon glyphicon-plus-sign\"></span>入库 </a><a id='s$idss' onClick=\"openOut(this.id);\"><span class=\"glyphicon glyphicon-minus-sign\"></span>出库 </a><a id='x$idss' onClick=\"openFix(this.id);\"><span class=\"glyphicon glyphicon-wrench\"></span>修改 </a></td>";
		 echo "</tr>";
		 //$td = $string1.$string2.$string3.$string4.$string5.$string6.$string7.$string8.$string9;
		 //$data["retu"] = $td+$data["retu"];
		 $i = $i+1;
		 }
?>