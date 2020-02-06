
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
	<style>
		table{
			border-collapse: collapse;
			margin: 0 auto;
		}
		
		table,th,td{
			font-size: 14px;
			border:2px solid black;	
			padding:3px 3px 3px 3px;
			text-align: center;		
		}
		
		table th{
			text-align: center;
			color: red;
			background-color: yellow;
		}
		p{
			text-align: center;
		}
		
		body{
			background-image: url("images/5.jpg");
		}
		
 }
	</style>
		
	</style>
</head>

<body>
<?php
$db = mysqli_connect('localhost', 'chb', 'chb19980505','chb');


if (!$db)
  {
  die('Could not connect: ' . mysqli_error());
  }
	
  $sort=$_GET['sort'];
  $sousuo=$_GET['q'];
	
  if(isset($_GET['page'])&&(int)$_GET['page']>0)
		$page=$_GET['page'];
	else $page=1;

	
if($sort=="校园卡"){

	$pageSize=20;
	$result=mysqli_query($db,"select * from table_card where student_number='$sousuo'");
	$count=mysqli_num_rows($result);
	$pageCount=ceil($count/$pageSize);
	if($pageCount==0){
		$pageCount=1;
	}
	$start=($page-1)*$pageSize;
	$result1=mysqli_query($db,"select * from table_card where student_number='$sousuo' limit $start,$pageSize");

	$id=1;
	echo"<h3 align=center>查询结果</h3>";
	echo "<table>";
	echo"<tr><th width='70'>序号</th><th width='70'>类型</th><th width='70'>姓名</th><th width='70'>学号</th><th width='120'>卡号</th><th width='130'>地点</th><th width='130'>联系方式</th><th width='130'>时间</th>";
	while($row=mysqli_fetch_row($result1)){
		if($id%2==0){
	       echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[9]</td></tr>";
		}
		else{
			echo "<tr bgcolor='#7cfc00'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[9]</td></tr>";
		}
		   $id++;
	}
	mysqli_free_result($result1);	
	echo "</table>";
	
    echo"<p>";
	    if($page==1)
		  echo "首页 上一页&nbsp;&nbsp;";
	    else {
		  $lastPage=$page-1;
		  echo"<a href='?page=1'>首页</a>&nbsp;&nbsp;<a href='?page=$lastPage'>上一页</a>&nbsp;&nbsp;";
		}
	
	  for($i=1;$i<=$pageCount;$i++){
		if($i==$page) echo"$i&nbsp;&nbsp;";
		else echo"<a href='?page=$i'>$i</a>&nbsp;&nbsp;";
	  }
		
		if($page==$pageCount) echo "下一页 末页&nbsp;&nbsp;";
		else {
		  $nextPage=$page+1;
		  echo"<a href='?page=$nextPage'>下一页</a>&nbsp;&nbsp;<a href='?page=$pageCount'>末页</a>&nbsp;&nbsp;";
		}	
	 echo "共 $count 条记录&nbsp;&nbsp;";
	 echo " $page/$pageCount 页";
	 echo"</p>";
	 echo"<script>alert('你可以根据查询结果的序号到校园卡栏查看更详细的信息');</script>";
}
 
else if($sort=="电子产品"){

	$pageSize=20;
	$result=mysqli_query($db,"select * from table_ele where name='$sousuo'");
	$count=mysqli_num_rows($result);
	$pageCount=ceil($count/$pageSize);
		if($pageCount==0){
		$pageCount=1;
	}
	$start=($page-1)*$pageSize;
	$result1=mysqli_query($db,"select * from table_ele where name='$sousuo' limit $start,$pageSize");

	$id=1;
	echo"<h3 align=center>查询结果</h3>";
	echo "<table>";
	echo"<tr><th width='70'>序号</th><th width='70'>类型</th><th width='70'>产品</th><th width='70'>品牌</th><th width='70'>颜色</th><th width='130'>地点</th><th width='130'>联系方式</th><th width='130'>时间</th>";
	while($row=mysqli_fetch_row($result1)){
		if($id%2==0){
	       echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[6]</td><td>$row[7]</td><td>$row[10]</td></tr>";
		}
		else{
			echo "<tr bgcolor='#7cfc00'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[6]</td><td>$row[7]</td><td>$row[10]</td></tr>";
		}
		   $id++;
	}
	mysqli_free_result($result1);	
	echo "</table>";
	
    echo"<p>";
	    if($page==1)
		  echo "首页 上一页&nbsp;&nbsp;";
	    else {
		  $lastPage=$page-1;
		  echo"<a href='?page=1'>首页</a>&nbsp;&nbsp;<a href='?page=$lastPage'>上一页</a>&nbsp;&nbsp;";
		}
	
	  for($i=1;$i<=$pageCount;$i++){
		if($i==$page) echo"$i&nbsp;&nbsp;";
		else echo"<a href='?page=$i'>$i</a>&nbsp;&nbsp;";
	  }
		
		if($page==$pageCount) echo "下一页 末页&nbsp;&nbsp;";
		else {
		  $nextPage=$page+1;
		  echo"<a href='?page=$nextPage'>下一页</a>&nbsp;&nbsp;<a href='?page=$pageCount'>末页</a>&nbsp;&nbsp;";
		}	
	 echo "共 $count 条记录&nbsp;&nbsp;";
	 echo " $page/$pageCount 页";
	 echo"</p>";
	 echo"<script>alert('你可以根据查询结果的序号到电子产品栏查看更详细的信息');</script>";
	}
	
else if($sort=="生活用品"){
	$pageSize=20;
	$result=mysqli_query($db,"select * from table_others where name='$sousuo'");
	$count=mysqli_num_rows($result);
	$pageCount=ceil($count/$pageSize);
		if($pageCount==0){
		$pageCount=1;
	}
	$start=($page-1)*$pageSize;
	$result1=mysqli_query($db,"select * from table_others where name='$sousuo' limit $start,$pageSize");


	$id=1;
	echo"<h3 align=center>查询结果</h3>";
	echo "<table>";
	echo"<tr><th width='70'>序号</th><th width='70'>类型</th><th width='70'>生活用品</th><th width='70'>使用者</th><th width='130'>地点</th><th width='130'>联系方式</th><th width='130'>时间</th>";
	while($row=mysqli_fetch_row($result1)){
		if($id%2==0){
	       echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[5]</td><td>$row[6]</td><td>$row[9]</td></tr>";
		}
		else{
			echo "<tr bgcolor='#7cfc00'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[5]</td><td>$row[6]</td><td>$row[9]</td></tr>";
		}
		   $id++;
	}
	mysqli_free_result($result1);	
	echo "</table>";
	
    echo"<p>";
	    if($page==1)
		  echo "首页 上一页&nbsp;&nbsp;";
	    else {
		  $lastPage=$page-1;
		  echo"<a href='?page=1'>首页</a>&nbsp;&nbsp;<a href='?page=$lastPage'>上一页</a>&nbsp;&nbsp;";
		}
	
	  for($i=1;$i<=$pageCount;$i++){
		if($i==$page) echo"$i&nbsp;&nbsp;";
		else echo"<a href='?page=$i'>$i</a>&nbsp;&nbsp;";
	  }
		
		if($page==$pageCount) echo "下一页 末页&nbsp;&nbsp;";
		else {
		  $nextPage=$page+1;
		  echo"<a href='?page=$nextPage'>下一页</a>&nbsp;&nbsp;<a href='?page=$pageCount'>末页</a>&nbsp;&nbsp;";
		}	
	 echo "共 $count 条记录&nbsp;&nbsp;";
	 echo " $page/$pageCount 页";
	 echo"</p>";
	 echo"<script>alert('你可以根据查询结果的序号到生活用品栏查看更详细的信息');</script>";
	}
	
	else{
		 echo"<script>alert('请先选择好失物的分类再进行搜索！');location.href='main_home.php'</script>";
	}


?>
</body>
</html>