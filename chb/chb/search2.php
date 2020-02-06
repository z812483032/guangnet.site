<?php
header("content-type:text/html;charset='utf-8'");
session_start();
$issuer=$_SESSION['name'];

$con = mysqli_connect('localhost', 'chb', 'chb19980505','chb');


if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }


if ($_SERVER["REQUEST_METHOD"] == "POST")//判断提交的数据是否是POST方式传来的；

{
$upload_dir=getcwd();
	if(!is_dir($upload_dir))
		mkdir($upload_dir);
$type_id=$_POST['type_id'];
$name=$_POST['name'];
$brand=$_POST['brand'];
$color=$_POST['color'];
$place=$_POST['place'];
$phone=$_POST['phone'];
$detail=$_POST['describe'];
$word=$_POST['word'];
$date=$_POST['date'];
$tmp_path=$_FILES['upfile']['tmp_name'];
$file_name=$_FILES['upfile']['name'];
$new_path=$upload_dir."/".$file_name;
move_uploaded_file($tmp_path,$new_path);	



    if($type_id=="丢失")
	{
		$sql="INSERT INTO table_ele (type_id, name, brand, color,detail,place,phone,word,status,time,image,issuer) VALUES ('丢失','$name','$brand','$color','$detail','$place','$phone','$word','0','$date','$file_name','$issuer')";
		
        mysqli_query($con,$sql);
 echo"<script>alert('提交成功，我们会帮你寻找丢失的 $name ！');location.href='main_home.php'</script>";
       
	}




    if($type_id=="捡到")
	{
			$sql="INSERT INTO table_ele (type_id, name, brand, color,detail,place,phone,word,status,time,image,issuer) VALUES ('捡到','$name','$brand','$color','$detail','$place','$phone','$word','0','$date','$file_name','$issuer')";
		
        mysqli_query($con,$sql);
	    echo"<script>alert('提交成功，我们会帮助你联系失主，请保持手机畅通，谢谢！');;location.href='main_home.php'</script>";   
		
	}
}	


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    label{
       font-size : 1.5em;
       text-align: right;     
	}  
	body{
		background: url("images/5.jpg");
			
		}
    </style>      
	<title>失物招领</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
   function test(){
    
    document.getElementById('手机').style.display='none';
    document.getElementById('U盘').style.display='none';
    document.getElementById('深圳通').style.display='none';
    document.getElementById('耳机').style.display='none';
    document.getElementById('kindle').style.display='none';
    document.getElementById('相机').style.display='none';
    document.getElementById('笔记本电脑').style.display='none';
    document.getElementById('平板电脑').style.display='none';
    document.getElementById('其他').style.display='none';
    var value=document.getElementById('select').value;
    document.getElementById(value).style.display='block';
   }

      
          
        function check_submit(){
			if($("#type_id").val() =="" || $("#type_id").val()=="0"){  
                alert("类型选择不能为空!");  
                return false; 
			}
            if($("#select").val() =="" || $("select").val()=="0"){  
                alert("产品名不能为空!");  
                return false;  
            }  
			
            if($("#phone").val() ==""){  
                alert("手机号不能为空！");  
                return false;  
            }  
        }  
          
  </script>
</head>
<body>

<div class="container">

<h1 class="text-center">电子产品</h1>

<form name="form" method="post" action="" class="form-horizontal" enctype="multipart/form-data" onsubmit="return check_submit()">

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="type_id">类型</label>
    <div class="col-sm-8 col-xs-8">
      <select name="type_id" class="form-control"  id="type_id" onmouseover="mover()">
      <option selected="selected" value="0">--请选择-- </option>
      <option value="丢失">丢失</option>
      <option value="捡到">捡到</option>
      </select>
    </div>
  </div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="select">产品</label>
    <div class="col-sm-8 col-xs-8">
      <select name="name" class="form-control"  id="select" onchange="test()" onmouseover="mover()">
      <option selected="selected" value="0">--请选择-- </option>
      <option value="手机">手机</option>
      <option value="U盘">U盘</option>
      <option value="相机">相机</option>
      <option value="平板电脑">平板电脑</option>
      <option value="笔记本电脑">笔记本电脑</option>
      <option value="深圳通">深圳通</option>
      <option value="耳机">耳机</option>
      <option value="kindle">kindle</option>
      <option value="其他">其他</option>
      </select>
    </div>
  </div>

<div class="form-group"  id="手机"  style="display:block">
    <label class="col-sm-3 col-xs-3 control-label" for="brand">品牌</label>
    <div class="col-sm-8 col-xs-8">
      <select id="brand" name="brand" class="form-control">
      <option selected="selected" value="0">--请选择-- </option>
      <option value="iPhone">iPhone</option>
      <option value="小米">小米</option>
      <option value="华为">华为</option>
      <option value="中兴">中兴</option>
      <option value="联想">联想</option>
      <option value="三星">三星</option>
      <option value="魅族">魅族</option>
      <option value="HTC">HTC</option>
      <option value="诺基亚">诺基亚</option>
      <option value="LG">LG</option>
      <option value="索尼">索尼</option>
      <option value="酷派">酷派</option>
      <option value="努比亚">努比亚</option>
      <option value="OPPO">OPPO</option>
      <option value="华硕">华硕</option>
      <option value="金立">金立</option>
      <option value="一加">一加</option>
      <option value="Nexus">Nexus</option>
      <option value="其他">其他</option>
      </select>
    </div>
  </div>

<div class="form-group"  id="U盘" style="display:none">
    <label class="col-sm-3 col-xs-3 control-label" for="brand">品牌</label>
    <div class="col-sm-8 col-xs-8">
      <select id="brand" name="brand" class="form-control">
      <option selected="selected" value="0">--请选择-- </option>
      <option value="金士顿">金士顿</option>
      <option value="爱国者">爱国者</option>
      <option value="朗科">朗科</option>
      <option value="清华紫光">清华紫光</option>
      <option value="台电">台电</option>
      <option value="纽曼">纽曼</option>
      <option value="威刚">威刚</option>
      <option value="闪迪">闪迪</option>
      <option value="东芝">东芝</option>
      <option value="惠普">惠普</option>
      <option value="朗科">朗科</option>
      <option value="SSK飚王">SSK飚王</option>
      <option value="索尼">索尼</option>
      <option value="方正">方正</option>
      <option value="其他">其他</option>
      </select>
    </div>
  </div>

<div class="form-group"  id="相机" style="display:none">
    <label class="col-sm-3 col-xs-3 control-label" for="brand">品牌</label>
    <div class="col-sm-8 col-xs-8">
      <select id="brand" name="brand" class="form-control">
      <option selected="selected" value="0">--请选择-- </option>
      <option value="佳能(Canon)">佳能(Canon)</option>
      <option value="尼康（Nikon）">尼康（Nikon）</option>
      <option value="索尼（SONY）">索尼（SONY）</option>
      <option value="富士（FUJIFILM）">富士（FUJIFILM）</option>
      <option value="徕卡（Leica）">徕卡（Leica）</option>
      <option value="三星（SAMSUNG）">三星（SAMSUNG）</option>
      <option value="卡西欧（CASIO）">卡西欧（CASIO）</option>
      <option value="宾得（PENTAX）">宾得（PENTAX）</option>
      <option value="柯达（Kodak）">柯达（Kodak）</option>
      <option value="通用（GE）">通用（GE）</option>
      <option value="奥林巴斯（OLYMPUS）">奥林巴斯（OLYMPUS）</option>
      <option value="哈苏（HASSELBLAD）">哈苏（HASSELBLAD）</option>
      <option value="乐魔（LOMOGRAPHY）">乐魔（LOMOGRAPHY）</option>
      <option value="海鸥（SeaGull）">海鸥（SeaGull）</option>
      <option value="其他">其他</option>
      </select>
    </div>
  </div>

<div class="form-group"  id="笔记本电脑" style="display:none">
    <label class="col-sm-3 col-xs-3 control-label" for="brand">品牌</label>
    <div class="col-sm-8 col-xs-8">
      <select id="brand" name="brand" class="form-control">
      <option selected="selected" value="0">--请选择-- </option>
      <option value="华硕（ASUS）">华硕（ASUS）</option>
      <option value="戴尔（DELL）">戴尔（DELL）</option>
      <option value="联想（Lenovo）">联想（Lenovo）</option>
      <option value="雷蛇（Razer）">雷蛇（Razer）</option>
      <option value="宏碁（acer）">宏碁（acer）</option>
      <option value="苹果（Apple）">苹果（Apple）</option>
      <option value="神舟（HASEE）">神舟（HASEE）</option>
      <option value="惠普（HP）">惠普（HP）</option>
      <option value="三星（SAMSUNG）">三星（SAMSUNG）</option>
      <option value="清华同方（THTF）">清华同方（THTF）</option>
      <option value="东芝（TOSHIBA）">东芝（TOSHIBA）</option>
      <option value="松下（Panasonic）">松下（Panasonic）</option>
      <option value="未来人类（Terrans Force）">未来人类（Terrans Force）</option>
      <option value="其他">其他</option>
      </select>
    </div>
  </div>

<div class="form-group"  id="平板电脑" style="display:none">
    <label class="col-sm-3 col-xs-3 control-label" for="brand">品牌</label>
    <div class="col-sm-8 col-xs-8">
      <select id="brand" name="brand" class="form-control">
      <option selected="selected" value="0">--请选择-- </option>
      <option value="苹果（Apple）">苹果（Apple）</option>
      <option value="微软（Microsoft）">微软（Microsoft）</option>
      <option value="小米（MI）">小米（MI）</option>
      <option value="三星（SAMSUNG）">三星（SAMSUNG）</option>
      <option value="华硕（ASUS）">华硕（ASUS）</option>
      <option value="台电（Teclast）">台电（Teclast）</option>
      <option value="戴尔（DELL）">戴尔（DELL）</option>
      <option value="联想（Lenovo）">联想（Lenovo）</option>
      <option value="华为（HUAWEI）">华为（HUAWEI）</option>
      <option value="昂达（ONDA）">昂达（ONDA）</option>
      <option value="索爱（soaiy）">索爱（soaiy）</option>
      <option value="E人E本">E人E本</option>
      <option value="七彩虹（Colorful）">七彩虹（Colorful）</option>
      <option value="诺亚舟（Noah）">诺亚舟（Noah）</option>
      <option value="其他">其他</option>
      </select>
    </div>
  </div>

<div class="form-group"  id="其他" style="display:none">
    <label class="col-sm-3 col-xs-3 control-label" for="brand">品牌</label>
    <div class="col-sm-8 col-xs-8">
      <input id="brand" type="text" name="brand" class="form-control"  placeholder="">
    </div>
  </div>

    <div id="深圳通" style="display:none"></div>
    <div id="耳机" style="display:none"></div>
    <div id="kindle" style="display:none"></div>


<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="color">颜色</label>
    <div class="col-sm-8 col-xs-8">
      <select id="color" name="color" class="form-control" >
      <option selected="selected" value="0">--请选择-- </option>
      <option value="黑">黑</option>
      <option value="白">白</option>
      <option value="红">红</option>
      <option value="橙">橙</option>
      <option value="黄">黄</option>
      <option value="蓝">蓝</option>
      <option value="绿">绿</option>
      <option value="紫">紫</option>
      <option value="其他">其他</option>
      </select>
    </div>
  </div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="describe">描述</label>
    <div class="col-sm-8 col-xs-8">
      <input type="text" id="describe" name="describe" class="form-control"  placeholder="">
    </div>
  </div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="phone">手机</label>
    <div class="col-sm-8 col-xs-8">
      <input id="phone" type="text" name="phone" class="form-control"  placeholder="请输入你的联系方式"  placeholder="" onmouseover="mover()">
    </div>
  </div>
 
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="place">地点</label>
    <div class="col-sm-8 col-xs-8">
      <input type="text" id="place" name="place" class="form-control"  placeholder="">
    </div>
  </div>
    
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="word">留言</label>
    <div class="col-sm-8 col-xs-8">
		<input type="text" id="word" name="word" class="form-control"  placeholder=""/>
    </div>
  </div>
	
<div class="form-group">
	<label class="col-sm-3 col-xs-3 control-label" for="upfile">图片</label>
	 <div class="col-sm-8 col-xs-8">
    
     <input type="file" name="upfile" id="upfile" class="form-control"/><br><br>
    </div>
 </div>
	
<div class="form-group">
	<label class="col-sm-3 col-xs-3 control-label" for="date">日期</label>
	 <div class="col-sm-8 col-xs-8">
     <input type="date" name="date" id="date" class="form-control"/><br><br>
    </div>
 </div>
	
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 col-xs-offset-2 col-xs-10">
        <input type="submit" name="submit" class="btn btn-default">
    </div>
</div>



</form>
</div>
</body>
</html>