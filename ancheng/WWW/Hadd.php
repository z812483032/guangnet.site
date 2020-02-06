<?php
    require_once('database.php');
	$db = new MyDB();
	$user = $_REQUEST['Huser'];//用户名
	$hsno = $_REQUEST['Hsno'];//货物编号
	$csno = $_REQUEST['Csno'];//仓库号
	$name = $_REQUEST['Hname'];//货物名称
	$num = $_REQUEST['Hnum'];//货物类型
	$rsno = $_REQUEST['Rsno'];//入库单号
	$date = $_REQUEST['Hdate'];//入库时间
	$shop = $_REQUEST['Hshop'];//供应商
	$type = $_REQUEST['Htype'];//货物类型
	$price = $_REQUEST['Hprice'];//入库价格
	//$page = $_REQUEST['page'];
	$String1  = "select * from rtable where Ruser='$user' and Rsno='$rsno'";
	$term = $db->GetData($String1);
	if($term->num_rows != 0 || $rsno==""){echo 0,'!';}
	if($term->num_rows ==0){echo 1,'!';}
	if($hsno ==""){echo 0,'!';}
	if($hsno != ""){echo 1,'!';}
	$String2 = "select * from house where Cuser='$user' and Csno='$csno'";
	$term1 = $db->GetData($String2);
	if($term1->num_rows ==0 || $csno==""){echo 0,'!';}
	if($term1->num_rows !=0){echo 1,'!';}
	if($name ==""){echo 0,'!';}
	if($name !=""){echo 1,'!';}
	if($price ==""){echo 0,'!';}
	if($price !=""){echo 1,'!';}
	if($shop ==""){echo 0,'!';}
	if($shop !=""){echo 1,'!';}
	if($date ==""){echo 0,'!';}
	if($date !=""){echo 1,'!';}
	if($num ==""){echo 0,'!';}
	if($num !=""){echo 1,'!';}
	if($term->num_rows !=0){return;}
	if($hsno ==""){return;}
	if($term1->num_rows ==0){return;}
	if($name ==""){return;}
	if($price ==""){return;}
	if($shop ==""){return;}
	if($date ==""){return;}
	if($num ==""){return;}
	
	//检查仓库里是否已经有某种货物
	$str1 = sprintf("Select * From goods Where Huser='%s' and Hsno='%s' and HCsno='%s'" ,$user,$hsno,$csno);
	$res1 = $db->GetData($str1);
	//某种货物在仓库里已存在
	if($res1->num_rows != 0){
		$str = sprintf("update goods set Hnum = Hnum+'%s' where Huser='%s' and Hsno='%s' and HCsno='%s'",intval($num),$user,$hsno,$csno);
		$db->GetData($str);
		//echo 1;
		//return;
		}
	if($res1->num_rows ==0){
		$strinto = "insert into goods(Huser,HCsno,Hsno,Hname,Hnum,Htype) values('$user','$csno','$hsno','$name','$num','$type')";
		$db->GetData($strinto);
		}
   $strInsert = "insert into rtable(Ruser,Rsno,RHsno,RCsno,Rshop,Rprice,Rnum,Rdate) values('$user','$rsno','$hsno','$csno','$shop','$price','$num','$date') ";
   $db->GetData($strInsert);
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