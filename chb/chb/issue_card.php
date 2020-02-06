<?php
    session_start();
    $issuer=$_SESSION['name'];
	$db = mysqli_connect('localhost', 'chb', 'chb19980505','chb');
	$id=1;
	
	if(isset($_GET['page'])&&(int)$_GET['page']>0)
		$page=$_GET['page'];
	else $page=1;	

	$pageSize=20;
	$result=mysqli_query($db,"select * from table_card where issuer='$issuer'");
	$count=mysqli_num_rows($result);
	$pageCount=ceil($count/$pageSize);
	if($pageCount==0){
		$pageCount=1;
	}
	$start=($page-1)*$pageSize;
	$result1=mysqli_query($db,"select * from table_card where issuer='$issuer' limit $start,$pageSize");


	$id=1;
	echo"<h3 align=center>曾经发布过的校园卡信息</h3>";
    echo "<form method='post' action=''>";
	echo "<table>";
	echo"<tr><th width='70'>删除</th><th width='70'>序号</th><th width='70'>类型</th><th width='70'>姓名</th><th width='70'>学号</th><th width='120'>卡号</th><th width='130'>地点</th><th width='130'>联系方式</th><th width='130'>时间</th>";
	while($row=mysqli_fetch_row($result1)){
		if($id%2==0){
	       echo "<tr><td><input type='checkbox' name='selected[]' value='$row[0]'></td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[9]</td></tr>";
		}
		else{
			echo "<tr bgcolor='#7cfc00'><td><input type='checkbox' name='selected[]' value='$row[0]'></td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[9]</td></tr>";
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
	 echo " $page/$pageCount 页<br/>";
	 echo "<input type='submit' value='确定删除'>";
	 echo "</p>";
	 echo "</form>";
?>
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
			line-height: 2em;
		}
			  body{
		background: url("images/5.jpg");
			
		}


	</style>


 <?php
	  $db = mysqli_connect('localhost', 'chb', 'chb19980505','chb');
      $snoArr=$_POST['selected'];
      
      if(isset($snoArr)){
	  $snos=implode(",",$snoArr);
      	
      }
	  $sql="delete from table_card where card_id in($snos)";
	  $result=mysqli_query($db,$sql);


?>
