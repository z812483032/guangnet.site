<?php
	//构建页面
	require_once("conn.php");
	$query = "SELECT id,introduce,username,title FROM form";
    $result = mysqli_query($link,$query) or die("Query failed : " . mysqli_error($link));
    
	$formname_data = '';
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$time = date("Y/m/d");
		$id = $row['id'];
		$introduce = $row['introduce'];
		$introduce = html_entity_decode($introduce);
		$title = $row['title'];
		$username = $row["username"];
		$path="../form/form$id.html";
		$formname = "form$id.html";
		$formname_data = "form$id";
		$fp=fopen("template.html","r"); //只读打开模板
		$str=fread($fp,filesize("template.html"));//读取模板中内容
		$str=str_replace("{introduce}",$introduce,$str);//替换内容
		$str=str_replace("{title}",$title,$str);
		$str=str_replace("col-sm-2","col-sm-3",$str);
		$str=str_replace("col-sm-7","col-sm-8",$str);
		fclose($fp);
		$handle=fopen($path,"w"); //写入方式打开新闻路径
		fwrite($handle,$str); //把刚才替换的内容写进生成的HTML文件
		fclose($handle);
		$sql_delete = "delete from form where id='$id'";
		mysqli_query($link,$sql_delete) or die("Query failed : " . mysqli_error($link));//把已经生成文件的条目删除
		$sql_insert_new = "insert into formarray(username,formname) values ('$username','$formname')";
		mysqli_query($link,$sql_insert_new) or die("Query failed : " . mysqli_error($link));
		$sql_insert_message = "insert into formmessage(username,formname,title,time) values ('$username','$formname','$title','$time')";
		mysqli_query($link,$sql_insert_message) or die("Query failed : " . mysqli_error($link));
	}
	mysqli_free_result($result);

	echo $formname;
	
	//构建数据库
	$ip = 'input';
	$getinput = '/name="(.*)"/isU';
	preg_match_all($getinput,$str,$matches);
	$data = array();
	$temp = "id int(6) AUTO_INCREMENT primary key";
	$lenth = count($matches[1]);
	for($i=0;$i<$lenth;$i++){
		$data[$i] = $matches[1][$i];
		if($pos = strpos($matches[1][$i],'[]')){
					$matches[1][$i] = substr($matches[1][$i],0,strpos($matches[1][$i],'[]'));
					echo $matches[1][$i];
				}
		if($lenth==1){
			$temp = $temp ;
		}else if($i>0 && $matches[1][$i]==$matches[1][$i-1]){
			$temp = $temp ;
		}else if($i<$lenth-1){
			if($matches[1][$i]==$matches[1][$i+1] && $i==$lenth-2){
				$temp = $temp .','. $matches[1][$i] ." varchar(50)";
			}else{
				$temp = $temp .','. $matches[1][$i]." varchar(50)";
			}
		}else if($i=$lenth-1){
			
			$temp = $temp .','. $matches[1][$i] ." varchar(50)";
		}
	}

	$sql_create_table = 'create table '.$formname_data."($temp)";

	$result = mysqli_query($link,$sql_create_table) or die("Query failed : " . mysqli_error($link));
	mysqli_close($link);
?>