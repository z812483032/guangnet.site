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
    

	echo"
	<br><br>
    <img src='$info[10]' alt='没有相关图片'>
    <br><br>
	<a href='javascript:showData1(".$page.")'>返回</a>
	";

		
?>
			