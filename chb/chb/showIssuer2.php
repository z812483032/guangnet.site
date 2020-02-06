
<style>
	.head{width:25%;}
</style>

<?php
	//header("content-type:text/html;charset='utf-8'");
	//$con = mysql_connect("localhost","root","");
  $con = mysqli_connect('localhost', 'chb', 'chb19980505','chb');



	if (!$con)
	  {
	  die('Could not connect: ' . mysqli_error());
	  }
	//数据库：app_lostandfind;表：table_ele;y

	$issuer=$_REQUEST['issuer'];
	$page=$_GET['page'];
	$result=mysqli_query($con,"SELECT * FROM user_code where username='$issuer'");
	$info=mysqli_fetch_array($result);

	echo"
	<table border='1' width='100%' cellpadding='3' cellspacing='0' style='text-align:center'>
	<caption>详细信息<br><br></caption>
	<tr>
	<td class='head'><font size='7'>姓名</font></td>
	<td><font size='7'>".$info['name']."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>性别</font></td>
	<td><font size='7'>".$info['sex']."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>学号</font></td>
	<td><font size='7'>".$info['number']."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>手机号</font></td>
	<td><font size='7'>".$info['phone']."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>学院</font></td>
	<td><font size='7'>".$info['academy']."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>专业</font></td>
	<td><font size='7'>".$info['major']."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>班级</font></td>
	<td><font size='7'>".$info['class']."</font></td>
	</tr>
	<tr>
	<td colspan='2'><br><a href='javascript:showData2(".$page.")'>返回</a></td>
	</tr>
	";

?>