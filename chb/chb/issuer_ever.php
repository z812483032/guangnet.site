<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
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
	
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		   $("#btn").click(function(){
             var sort = $("input[type=radio]:checked").val();
			   
    if(sort=="校园卡"){
		
		var xmlHttp;
		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		}
		else {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
				document.getElementById("div1").innerHTML = xmlHttp.responseText;
			}
		};
		xmlHttp.open("GET", "issue_card.php", true);
		xmlHttp.send();
	}

			   
   else if(sort=="电子产品"){
		var xmlHttp;
		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		}
		else {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
				document.getElementById("div1").innerHTML = xmlHttp.responseText;
			}
		};
		xmlHttp.open("GET", "issue_ele.php", true);
		xmlHttp.send();
	}
					 
  else if(sort=="生活用品"){
	  	var xmlHttp;
		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		}
		else {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
				document.getElementById("div1").innerHTML = xmlHttp.responseText;
			}
		};
		xmlHttp.open("GET", "issue_others.php", true);
		xmlHttp.send();
	}
					 
  
             });
		});
	</script>
</head>

<body>
	<h3 align=center>我发布过的失物招领信息</h3>
    <form method='post' action=''>
	   <p align=center>
	       分类:<input type='radio' name='sort' value='校园卡'  checked='checked'>校园卡
	           <input type='radio' name='sort' value='电子产品'>电子产品
	           <input type='radio' name='sort' value='生活用品'>生活用品
		   <input type="button" id="btn" value="确认">
	   </p>
	  <div align=center id="div1">
		  
	  </div>
	</form>

</body>
</html>