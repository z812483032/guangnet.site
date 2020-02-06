<!doctype html>
<html>
<head>
<title>详情</title>
<meta http-equiv="Content-Type" charset="utf-8">

<link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.table2excel.js"></script>

</head>

<body>
	<table class="table table2excel">
		<tr>
			<?php
				$title = $_GET["title"];
				require("conn.php");
				$sql = "select formname from formmessage where title='". $title . "';";

				$result_formname = mysqli_query($link,$sql) or die("Query failed : " . mysqli_error($link));
				$formname = mysqli_fetch_array($result_formname);
				$formname = explode(".",$formname[0]);
				$formname1 = $formname[0];
				$sql_form = "select * from $formname1";
				
				$result1 = mysqli_query($link,$sql_form) or die("Query failed : " . mysqli_error($link));
				$rows = mysqli_affected_rows($link);
				$result = mysqli_query($link,"desc $formname1") or die("Query failed : " . mysqli_error($link));
				$colums = mysqli_num_fields($result);
				$row2=mysqli_fetch_all($result);
				for($i=0;$i<count($row2);$i++){
					$temp = $row2[$i][0];
					echo "<th> $temp </th>";
				}
 

				
//				for($i=0;$i<$colums;$i++){
//					$field_name = mysql_field_name($result);
//					
//					echo"<th>$field_name</th>";
//				}
				echo"</tr>";
				while($row = mysqli_fetch_row($result1)){
					echo"<tr>";
					for($i=0;$i<count($row2);$i++){
						echo"<td contentEditable='true'>$row[$i]</td>";
					}
					echo "</tr>";
				}
				echo"</table>";
				mysqli_close($link);
				
			?>
	</table>
	<span style="position:relative;left:42%;top:70%;" >
		<a href="#" class="btn btn-info btn-lg text-center" onclick="table2Excel('<?php echo $title; ?>.xls')">
        	<span class="glyphicon glyphicon-download-alt text-center" ></span> Download-alt
    	</a><br>
    	<span style="margin-left:-80px;">
    		分享链接：<a id="shared" href="<?php echo $sharedweb ="http://guangnet.site/form/".$formname1.".html" ?>"> <?php echo $sharedweb ="http://guangnet.site/form/".$formname1.".html" ?> </a>
    	</span>
    </span>
</body>
<script>
function table2Excel(filename){
	$(".table2excel").table2excel({
		exclude: ".noExl",//class="noExl"的列不导出
		name: "Excel Document Name",
		filename: filename,//文件名称
		fileext: ".xls",//文件后缀名
		exclude_img: true,//导出图片
		exclude_links: true,//导出超链接
		exclude_inputs: true//导出输入框内容
	});
}

</script>
</html>
