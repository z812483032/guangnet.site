<?php 
    require_once('database.php');
	$db = new MyDB();
	$data = array();
	$records = 8;
	$user = $_REQUEST['user'];
	$page = 1;//初始状态，默认第一页
	$str = "select * from rtable where Ruser='$user'";
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
	 $strSQL = "select * from rtable where Ruser='$user' order by Rdate,Rsno,RCsno,RHsno limit $nStart,$records";
	 $result = $db->GetData($strSQL);
	 $i = $nStart+1;
	 //$data["retu"] = "";
	 echo $num,'!',$page,'!';
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