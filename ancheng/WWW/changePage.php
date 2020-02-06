<?php 
//header("Content-type:text/html;charset=utf-8");
    require_once('database.php');
	$db = new MyDB();
	$data = array();
	$records = 8;
	$user = $_REQUEST['user'];
	$page = 1;//初始状态，默认第一页
	$str = "select * from goods where Huser='$user'";
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
	 $strSQL = "select * from goods where Huser='$user' order by HCsno,Hsno limit $nStart,$records";
	 $result = $db->GetData($strSQL);
	 $i = $nStart+1;
	 //$data["retu"] = "";
	 echo $num,'!',$page,'!';
	 while($obj = $result->fetch_object()){
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
		 //echo jsno_encode($data);
?>