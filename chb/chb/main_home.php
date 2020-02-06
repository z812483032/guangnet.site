<?php
session_start();

if(isset($_SESSION['name'])){
	$name=$_SESSION['name'];
}
else{
echo "<script>alert('未登录用户不允许访问,请在访问本网页前先进行登录！');location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>失物招领</title>
	<meta name="description" content="Free Responsive Html5 Css3 Templates | zerotheme.com">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script language="javascript">
		function logout(){
			if(confirm("你确定要退出该账号吗？")){
				location.href="index.php";
		     }
			else{
				return;
			}
		}
		
		function about(){
		   
　　 window.open ('about.html', 'newwindow', 'height=300, width=600, top=100, left=400, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
		}
		
		function edit_data(){
　　 window.open ('user_data.php', 'newwindow', 'height=300, width=600, top=100, left=400, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
		}
		
		function issue_card(){
　　 window.open ('issue_card.php', 'newwindow', 'height=300, width=600, top=100, left=400, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
		}
		
		function issue_ele(){
　　 window.open ('issue_ele.php', 'newwindow', 'height=300, width=600, top=100, left=400, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
		}
		
		function issue_others(){
　　 window.open ('issue_others.php', 'newwindow', 'height=300, width=600, top=100, left=400, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
		}

		
		$(document).ready(function(){
		      $("#div_user").hide();
			  $("#div_issue").hide();
			
			
			$("#user").mouseover(function(){
			   $("#div_user").show();
			
			});
			
			$("#issue").mouseover(function(){
			   $("#div_issue").show();
			
			});
			
			$("#div_user").mouseleave(function(){
			  $("#div_user").hide();
			});
			
			$("#div_issue").mouseleave(function(){
			  $("#div_issue").hide();
			});
			
			
			
			$("#sort").change(function(){
				var value=$("#sort").val();
				if(value=="校园卡"){
					$("#q").attr("placeholder","请输入您的学号进行校园卡的查询");
				}
				
				if(value=="电子产品"){
					$("#q").attr("placeholder","请输入您想查询的电子产品的名称");
				}
				
				if(value=="生活用品"){
					$("#q").attr("placeholder","请输入您想查询的生活用品的名称");
				}
			 });
		});
			
	</script>
	
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	
	 <style>
	 
	 	.search-form{
			background-image: url("images/5.jpg");
		}
		
		.header_background{
			background-image: url("images/5.jpg");
			height: 30px;
		}
		.header-right{
			float: right;
			margin-top: 10px;
			margin-right: 15px;
		}
	
		#div_user,#div_issue{
			background-color: white;
			width: 80px;
			height: 80px;
			border: 1px solid gray;
			font-size: 16px;
		}
		
		.div1{
			padding-left: 5px;
			line-height: 1.7em;
		}
		
		/*.div1:hover{*/
		/*	background-color: blue;*/
		/*}*/
		
		
		

	</style>
	
</head>
<body>
<div class="header_background">
	
	<div class="header-right">
		<a href="javascript:about()">关于</a>
	</div>
	
	<div class="header-right">
		<div><a href="" id="user"><?php echo"$name" ?></a></div>
		  <div id="div_user">
		    <div class="div1"><a href="javascript:edit_data()">编辑资料</a></div>
			<div class="div1"><a href="javascript:logout()">退出账号</a></div>
	     </div>
	</div>
	
	<div class="header-right">
		<div><a href="" id="issue">发布过</a></div>
		  <div id="div_issue">
		    <div class="div1"><a href="javascript:issue_card()">校园卡</a></div>
			<div class="div1"><a href="javascript:issue_ele()">电子产品</a></div>
			<div class="div1"><a href="javascript:issue_others()">生活用品</a></div>
		  </div>
	</div>
	
</div>
<!--////////////////////////////////////Header-->
<header>
	<center>
		<div class="search-form">
			<form method="GET" action="search.php" id="search" class="f-right">
			        <select name="sort" id="sort">
					<option value="0" selected="selected">--失物的分类--</option>
				    <option value="校园卡">校园卡</option>
					<option value="电子产品">电子产品</option>
					<option value="生活用品">生活用品</option>
				</select>
				<input name="q" type="text" size="40" id="q" placeholder="你想要找什么?" />
				<input type="submit" name="Submit" id="Submit" value="搜索">
			</form>
		</div>
	</center>
	<div class="channellist">
		<ul>
			<li><a href="search1.php"><div class="ChannelIcon"><img src="images/a1.jpg"></div><div class="ChannelName">校园卡</div></a></li>
			<li><a href="search2.php"><div class="ChannelIcon"><img src="images/a2.jpg"></div><div class="ChannelName">电子产品</div></a></li>
			<li><a href="search3.php"><div class="ChannelIcon"><img src="images/a3.jpg"></div><div class="ChannelName">生活用品</div></a></li>
			<li><a href="search3.php"><div class="ChannelIcon"><img src="images/a4.jpg"></div><div class="ChannelName">银行卡</div></a></li>
			<li><a href="search2.php"><div class="ChannelIcon"><img src="images/a5.jpg"></div><div class="ChannelName">U盘</div></a></li>
			<li><a href="search3.php"><div class="ChannelIcon"><img src="images/a6.jpg"></div><div class="ChannelName">书籍</div></a></li>
			<li><a href="search3.php"><div class="ChannelIcon"><img src="images/a7.jpg"></div><div class="ChannelName">身份证</div></a></li>
			<li><a href="search3.php"><div class="ChannelIcon"><img src="images/a8.jpg"></div><div class="ChannelName">钱包</div></a></li>
			<li><a href="search3.php"><div class="ChannelIcon"><img src="images/a9.jpg"></div><div class="ChannelName">雨伞</div></a></li>
		</ul>
	</div>
</header>

<!--////////////////////////////////////Container-->
<section class="container">
	<div class="zerogrid">
		<div class="row wrap-box">
			<div class="col-1-3">
				<div class="wrap-col">
					<div class="post">
						<img src="images/2.jpg">
						<h3 align="center">校园卡</h3>
						<div class="upload" id="txtHint1">
							<?php
								include 'data1.php';
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<div class="post">
						<img src="images/3.jpg">
						<h3 align="center">电子产品</h3>
						<div class="upload" id="txtHint2">
							<?php
								include 'data2.php';
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<div class="post">
						<img src="images/4.jpg">
						<h3 align="center">生活用品</h3>
						<div class="upload" id="txtHint3">
							<?php
								include 'data3.php';
							?>
						</div>
					</div>
				</div>
			</div>
			

		</div>
	</div>
</section>

<!--////////////////////////////////////Footer-->
<footer>
	<div class="bottom-footer">
		<div class="wrap-bottom">
			©2020 - lostandfind <a href="http://www.cssmoban.com/" target="_blank" title="失物招领">失物招领</a><br/>
			联系方式：18675452875
		</div>
	</div>
</footer>

</body>
</html>