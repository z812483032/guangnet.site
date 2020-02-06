<?php
	require('mysql.php');
	$username = $_POST['username'];
	$addtitle = $_POST['addtitle'];
	$addnumber = $_POST['addnumber'];
	$addpnm = $_POST['addpnm'];
	$addcustomer = $_POST['addcustomer'];
	$addfabric = $_POST['addfabric'];
	$adddate1 = $_POST['adddate1'];
	$array = $_POST['array'];
	$arraylength = $_POST['arraylength'];
	
	$newarray = explode(",", $array);
	$temp = 0;
	$color = "";
	$number = "";
	$size = "";
	for($j = 0;$j<$arraylength;$j++){
		if($temp == 0){
			if($j == $arraylength - 3){
				$color = $color.$newarray[$j];
			}else{
				$color = $color.$newarray[$j].",";
			}
		}
		if($temp == 1){
			if($j == $arraylength - 2){
				$size = $size.$newarray[$j];
			}else{
				$size = $size.$newarray[$j].",";
			}
		}
		if($temp == 2){
			if($j == $arraylength - 1){
				$number = $number.$newarray[$j];
			}else{
				$number = $number.$newarray[$j].",";
			}
		}
		$temp++;
		if($temp == 3){
			$temp = 0;
		}
	}
	
	$colorarray = explode(",",$color);
	$sizearray = explode(",",$size);
	$numberarray = explode(",",$number);
	$strSQL = sprintf("Select formnumber from user where username='%s'",$username);
	$myDB = new MyDB();
	$result = $myDB -> GetData($strSQL);
	$data = $result->fetch_all();
	$i = $data[0][0] + 1;
	$form = $username."form".(string)$i;
	$strSQL1 = sprintf("Create Table $form(id int,title varchar(255) primary key,allnumber int,pnm varchar(255),customer varchar(255),fabric varchar(255),gotime date,addtime date,color varchar(255),size varchar(255),number varchar(255),complate int)");
	$myDB -> ExecSQL($strSQL1);
	$strSQL2 = sprintf("Insert into $form values('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',0)",(string)$i,$addtitle,$addnumber,$addpnm,$addcustomer,$addfabric,$adddate1,date("Y-m-d"),$color,$size,$number);
	$myDB -> ExecSQL($strSQL2);
	

	$strSQL3 = sprintf("Update user set formnumber='%s' where username='%s'",$i,$username);
	$myDB -> ExecSQL($strSQL3);
	
	//找到不同颜色
	$differentnumber = 0;
	$alltotal = 0;
	$total = 0;
	$table = "";
	$colornumber = array_count_values($colorarray);
	foreach($colornumber as $k => $v){
			$differentcolor[$differentnumber] = $k;
			$differentnumber++;
	}
	for($j1 = 0;$j1<$differentnumber;$j1++){
		for($j2 = 0;$j2 <count($colorarray);$j2++){
			if($colorarray[$j2] == $differentcolor[$j1]){
				$table = $table."<tr>
          		<td>$colorarray[$j2]</td>
                <td>$sizearray[$j2]</td>
                <td>$numberarray[$j2]</td>
          	</tr>
			<td><hr/></td>
          	<td><hr/></td>
          	<td><hr/></td>";
				$total = $total + (int)$numberarray[$j2];
				$alltotal = $alltotal + (int)$numberarray[$j2];
			}
			if($j2 == count($colorarray)-1){
				$table = $table."<tr>
          		<td><b>合计</b></td>
                <td></td>
                <td><b>$total</b></td>
          	</tr>
			<td><hr/></td>
          	<td><hr/></td>
          	<td><hr/></td>";
				$total = 0;
				}
		}
	}
	
	//找到不同的尺码
	$differentnumber1 = 0;
	$total1 = 0;
	$table1 = "";
	$sizenumber = array_count_values($sizearray);
	foreach($sizenumber as $k1 => $v1){
			$differentsize[$differentnumber1] = $k1;
			$differentnumber1++;
	}
	for($i1 = 0;$i1<$differentnumber1;$i1++){
			for($i2 = 0;$i2 < count($sizearray);$i2++){
				if($sizearray[$i2] == $differentsize[$i1]){
				$table1 = $table1."<tr>
          		<td>$sizearray[$i2]</td>
                <td>$colorarray[$i2]</td>
                <td>$numberarray[$i2]</td>
          	</tr>
			<td><hr/></td>
          	<td><hr/></td>
          	<td><hr/></td>";
				$total1 = $total1 + (int)$numberarray[$i2];
				}
				if($i2 == count($sizearray)-1){
				$table1 = $table1."<tr>
          		<td><b>合计</b></td>
                <td></td>
                <td><b>$total1</b></td>
          	</tr>
			<td><hr/></td>
          	<td><hr/></td>
          	<td><hr/></td>";	
				$total1 = 0;
				}
			}
		}
	
	$maintitle = ''.$username.'form'.$i.'';
	$addtime = date("Y-m-d");
	$path = 'w/'.$username.'form'.$i.'.html';
	$fp = fopen("demo.html","r");
	$str = fread($fp,filesize("demo.html"));
	$str = str_replace("{maintitle}",$maintitle,$str);
	$str = str_replace("{title}",$addtitle,$str);
	$str = str_replace("{complate}","未完成",$str);
	$str = str_replace("{number}",$addnumber,$str);
	$str = str_replace("{fabric}",$addfabric,$str);
	$str = str_replace("{gotime}",$adddate1,$str);
	$str = str_replace("{addtime}",$addtime,$str);
	$str = str_replace("{pnm}",$addpnm,$str);
	$str = str_replace("{customer}",$addcustomer,$str);
	$str = str_replace("{table}",$table,$str);
	$str = str_replace("{table1}",$table1,$str);
	$str = str_replace("{total}",$alltotal,$str);
	fclose($fp);
	$handle = fopen($path,"w");
	fwrite($handle,$str);
	fclose($handle);
	
	echo $i;
?>