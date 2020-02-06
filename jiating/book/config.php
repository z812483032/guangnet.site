<?php
header("Content-type: text/html; charset=utf-8"); 
	error_reporting(0);
	@ini_set('display_errors', 'Off');
	include( 'function.php' );

	 define('DB_HOST', 'localhost'); //数据库服务器主机地址
	 define('DB_USER', 'book'); //数据库帐号
	 define('DB_PW',  'YTMpWSbSZjbxiiYS'); //数据库密码
	 define('DB_NAME', 'book'); //数据库名

	 $con = mysql_connect(DB_HOST, DB_USER, DB_PW);
	 if (!$con)
	{
	     die('Could not connect: ' . mysql_error());
	     }
	 mysql_query("set character set 'utf8'");
	 mysql_query("set names 'utf8'");
	 mysql_select_db(DB_NAME, $con);
	 
	
?>
