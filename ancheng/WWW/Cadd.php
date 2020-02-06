<?php
    require_once('database.php');
	$db = new MyDB();
	$user = $_REQUEST['Huser'];//用户名
	$hsno = $_REQUEST['Hsno'];//货物编号
	$csno = $_REQUEST['Csno'];//仓库号
	$rsno = $_REQUEST['Rsno'];//入库单号
	//$page = $_REQUEST['page'];
	$String1  = "select * from house where Cuser='$user' and Csno='$rsno'";
	$term = $db->GetData($String1);
	if($term->num_rows != 0 || $rsno==""){echo 0,'!';}
	if($term->num_rows ==0){echo 1,'!';}
	if($term->num_rows !=0 || $rsno==""){return;}
	
	$SQL = "insert into house(Cuser,Csno,Cname,Cmessage) values('$user','$rsno','$csno','$hsno')";
	$db->GetData($SQL);
	$records = 8;
	//$user = $_REQUEST['user'];
	$page = 1;//初始状态，默认第一页
	$str = "select * from house where Cuser='$user'";
	$res = $db->GetData($str);
	$num = $res->num_rows;
	//$user = $_REQUEST['user'];
	//获取分页
	if(isset($_POST['page']) ===true){
		$page = $_POST['page'];
		}
	if($page > ceil($num/$records)){
		 $page--;
		 }
     $nStart = ($page-1)*$records;//开始记录
	 //检查当前页是否记录不够
	 //if($nStart ){}
	 //$data["num"] = $num;
	 //$data["currentpage"] = $page;
	 if($nStart+$records > $num-1){
		 $records = $num-$nStart;
		 }
	 //$strSQL = sprintf("Select * From goods order by HCsno,Hsno limit $nStart,$records",$user);
	 $strSQL = "select * from house where Cuser='$user' order by Csno limit $nStart,$records";
	 $result = $db->GetData($strSQL);
	 $i = $nStart+1;
	 //$data["retu"] = "";
	 //echo $num,'!',$page,'!';
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