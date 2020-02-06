<?php 
   require_once('database.php');
   $db = new MyDB();
   $user = $_REQUEST['user'];
   $sno = $_REQUEST['sno'];
   $shop = $_REQUEST['shop'];
   $price = $_REQUEST['price'];
   $num = $_REQUEST['num'];
   $date = $_REQUEST['date'];
   $id = $_REQUEST['id'];
   //$page = $_REQUEST['page'];
   $strSQL = "select * from rtable where Rsno='$sno' and Ruser='$user' ";
   $result = $db->GetData($strSQL);
   if($result->num_rows !=0){
	   echo 0,'!'; 
	   }
    if($result->num_rows ==0){
		echo 1,'!';
		//$num = int($num);
		//更新货物表
		$mystr1 = sprintf("update goods set Hnum = Hnum+'%s' where Hid='%s'",intval($num),intval($id));
		$db->GetData($mystr1);
		$mystr2 = sprintf("select * from goods where Hid='%s'",intval($id));
		$myres2 = $db->GetData($mystr2);
		$Hsno = "";
        $HCsno ="";
        while($obj = $myres2->fetch_object()){
               $Hsno = $obj->Hsno;
               $HCsno = $obj->HCsno;
               }
	    $mystr3 = "insert into rtable(Ruser,Rsno,RHsno,RCsno,Rshop,Rprice,Rnum,Rdate) values('$user','$sno','$Hsno','$HCsno','$shop','$price','$num','$date') ";
		$db->GetData($mystr3);
		
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
	} 
?>