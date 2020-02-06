<style>
	.head{width:25%;}
</style>

<?php
	//header("content-type:text/html;charset='utf-8'");
	//$con = mysql_connect("localhost","root","");
//    $con=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
$con = mysqli_connect('localhost', 'chb', 'chb19980505','chb');


	if (!$con)
	  {
	  die('Could not connect: ' . mysqli_error());
	  }
	//数据库：app_lostandfind;表：table_card;


	$card_id=$_GET['card_id'];
	$page=$_GET['page'];
	$result=mysqli_query($con,"SELECT * FROM table_card where card_id=$card_id");
	$info=mysqli_fetch_row($result);
    $zip="\"$info[11]\"";

   

	echo"
	<table border='1' width='100%' cellpadding='3' cellspacing='0' style='text-align:center'>
	<caption>详细信息<br><br></caption>
	<tr>
	<td class='head'><font size='7'>类型</font></td>
	<td><font size='7'>".$info[1]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>姓名</font></td>
	<td><font size='7'>".$info[2]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>学号</font></td>
	<td><font size='7'>".$info[3]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>卡号</font></td>
	<td><font size='7'>".$info[4]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>手机</font></td>
	<td><font size='7'>".$info[6]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>地点</font></td>
	<td><font size='7'>".$info[5]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>留言</font></td>
	<td><font size='7'>".$info[7]."</font></td>
	</tr>
	<tr>
	<td class='head'><font size='7'>日期</font></td>
	<td><font size='7'>".$info[9]."</font></td>
	</tr>
	
	<tr>
	<td class='head'><font size='7'>发布者</font></td>
	<td><a href='javascript:showIssuer1(".$zip.",".$page.");'>$info[11]</a></td>
	</tr>
	
    <tr>
	<td colspan='2'><br><a href='javascript:showData1(".$page.")'>返回</a></td>
	</tr>
	";

		
?>
			