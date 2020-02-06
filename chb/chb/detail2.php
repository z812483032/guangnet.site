
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
	//数据库：app_lostandfind;表：table_ele;

	$ele_id=$_GET['ele_id'];
	$page=$_GET['page'];
	$result=mysqli_query($con,"SELECT * FROM table_ele where ele_id=$ele_id");
	$info=mysqli_fetch_row($result);
    $zip="\"$info[12]\"";


	echo"
	<table border='1' width='100%' cellpadding='3' cellspacing='0' style='text-align:center'>
	<caption>详细信息<br><br></caption>
	<tr>
	<td class='head'><font size='7'>类型</font></td>
	<td><font size='7'>".$info[1]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>物品</font></td>
	<td><font size='7'>".$info[2]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>品牌</font></td>
	<td><font size='7'>".$info[3]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>颜色</font></td>
	<td><font size='7'>".$info[4]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>描述</font></td>
	<td><font size='7'>".$info[5]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>手机</font></td>
	<td><font size='7'>".$info[7]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>地点</font></td>
	<td><font size='7'>".$info[6]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>留言</font></td>
	<td><font size='7'>".$info[8]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>日期</font></td>
	<td><font size='7'>".$info[10]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>发布者</font></td>
	<td><a href='javascript:showIssuer2(".$zip.",".$page.");'>$info[12]</a></td>
	</tr>
	
	<tr>
	<td colspan='2'><br><a href='javascript:showData2(".$page.")'>返回</a></td>
	</tr>
	";

		
?>
