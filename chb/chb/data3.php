<script type = "text/javascript" > 
	function showData3(str) {
		var xmlHttp;
		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		}
		else {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
				document.getElementById("txtHint3").innerHTML = xmlHttp.responseText;
			}
		};
		xmlHttp.open("GET", "data3.php?page=" + str, true);
		xmlHttp.send();
	}
	function showDetail3(str1,str2) {
		var xmlHttp;
		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		}
		else {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
				document.getElementById("txtHint3").innerHTML = xmlHttp.responseText;
			}
		};
		xmlHttp.open("GET", "detail3.php?others_id=" + str1+"&page="+str2, true);
		xmlHttp.send();
	}
	
	function showPicture3(str1,str2) {
		var xmlHttp;
		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		}
		else {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
				document.getElementById("txtHint3").innerHTML = xmlHttp.responseText;
			}
		};
		xmlHttp.open("GET", "show_picture3.php?others_id=" + str1+"&page="+str2, true);
		xmlHttp.send();
	}
	
		function showIssuer3(str1,str2) {
		var xmlHttp;
		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		}
		else {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlHttp.onreadystatechange = function () {
			if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
				document.getElementById("txtHint3").innerHTML = xmlHttp.responseText;
			}
		};
		xmlHttp.open("GET", "showIssuer3.php?issuer=" + str1+"&page="+str2, true);
		xmlHttp.send();
	}
</script> 

<?php

$con = mysqli_connect("localhost","chb","chb19980505","chb");
//$con=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }




$result=mysqli_query($con,"SELECT * FROM table_others");

$nums=mysqli_num_rows($result);//取得总记录数
$pagesize=10;//设定每页的记录数
$pages=ceil($nums/$pagesize);//取得总页数
if($pages<1){$pages=1;}//设定总页数至少1页
$page=$_GET['page'];//取得传递过来的页数
if($page>$pages){$page=$pages;}//如果传递过来的页数比总页数还大，就让它等于总页数
if($page<1){$page=1;}//如果传递过来的页数小于1，就让他等于1

echo"<br>
<table border='1' width='100%' cellpadding='3' cellspacing='0' style='text-align:center'>
<tr>
<th><font size='7'>序号</font></th>
<th><font size='7'>类型</font></th>
<th><font size='7'>名称</font></th>
<th><font size='7'>联系方式</font></th>
<th><font size='7'>图片</font></th>
<th><font size='7'>详情</font></th>
</tr>";

$kaishi=($page-1)*$pagesize;//为下一步做准备，limit的初始记录
$sql="select * from table_others limit $kaishi,$pagesize";//取得记录从计算出的初始值开始，一共$pagesize条
$res=mysqli_query($con,$sql);//取得结果

while($arr=mysqli_fetch_array($res))
{
  echo "<tr>";
  echo "<td><font size='7'>" . $arr['others_id'] . "</font></td>";
  echo "<td><font size='7'>" . $arr['type_id'] . "</font></td>";
  echo "<td><font size='7'>" . $arr['name'] . "</font></td>";
  //echo "<td><font size='7' face='Times'>" . $arr['describe'] . "</font></td>";
  echo "<td><font size='7'>" . $arr['phone'] . "</font></td>";
  echo "<td><a href='javascript:showPicture3(".$arr['others_id'].",".$page.");'>>></a></td>";
  echo "<td><a href='javascript:showDetail3(".$arr['others_id'].",".$page.");'>>></a></td>";
  echo "</tr>";//输出记录的ID和标题
}
echo "</table>";

echo "<table width=90% style='text-align:center'>
<tr>
<td><a href='javascript:showData3(1);'>首页</a></td>
<td><a href='javascript:showData3(".($page-1).");'>上页</a></td>
<td>第".$page."页</td>
<td><a href='javascript:showData3(".($page+1).");'>下页</a></td>
<td><a href='javascript:showData3(".$pages.");'>尾页</a></td>
<td>$page/$pages</td>
</tr>
</table>";

mysqli_close($con);
?>

