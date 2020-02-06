<?php
header("content-type:text/html;charset='utf-8'");
session_start();
$issuer=$_SESSION['name'];

//$con=mysql_connect("localhost","root","");
$con = mysqli_connect('localhost', 'chb', 'chb19980505','chb');


if (!$con)
  {
  die('Could not connect: ' . mysqli_error());

  }
//数据库：app_lostandfind;表：table_card;


if ($_SERVER["REQUEST_METHOD"] == "POST")//判断提交的数据是否是POST方式传来的；

{
	
	$upload_dir=getcwd();
	if(!is_dir($upload_dir))
		mkdir($upload_dir);
	
$type_id=$_POST['type_id'];
$name=$_POST['name'];
$student_number=$_POST['student_number'];
$card_number=$_POST['card_number'];
$place=$_POST['place'];
$phone=$_POST['phone'];
$word=$_POST['word'];
$date=$_POST['date'];
$tmp_path=$_FILES['upfile']['tmp_name'];
$file_name=$_FILES['upfile']['name'];
$new_path=$upload_dir."/".$file_name;
move_uploaded_file($tmp_path,$new_path);	

    
    if($type_id=="丢失")
	{
		$sql="INSERT INTO table_card (type_id,name,student_number,card_number,place,phone,word,status,time,image,issuer) VALUES ('丢失','$name','$student_number','$card_number','$place','$phone','$word','0','$date','$file_name','$issuer')";
		
		
     mysqli_query($con,$sql);
     echo"<script>alert('提交成功，我们会帮你寻找丢失的校园卡！');location.href='main_home.php'</script>";
	}
    


    if($type_id=="捡到")
	{
  $sql="INSERT INTO table_card (type_id,name,student_number,card_number,place,phone,word,status,time,image,issuer) VALUES ('捡到','$name','$student_number','$card_number','$place','$phone','$word','0','$date','$file_name','$issuer')";
     mysqli_query($con,$sql);
	 echo"<script>alert('提交成功，我们会帮助你联系失主，请保持手机畅通，谢谢！');location.href='main_home.php'</script>";

			$sql1="select * from table_card where student_number='$student_number' and type_id='丢失'";
            $rs=mysqli_query($con,$sql1);
            $info=mysql_fetch_array($rs);
            $already=$info['phone'];

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
      
          
        function check_submit(){
			if($("#select").val() =="" || $("#select").val()=="0"){  
                alert("类型选择不能为空!");  
                return false;  
            }  
            if($("#name").val() =="" || $("#name").val()=="请输入校园卡主姓名"){  
                alert("姓名不能为空！");  
                return false;  
            }  
            if($("#phone").val() =="" || $("#phone").val() =="请输入你的联系方式"){  
                alert("手机号不能为空！");  
                return false;  
            }
            if($("#student_number").val() =="" || $("#student_number").val() ==" "){  
               alert("学号不能为空！");  
               return false;  
            }
            if($("#card_number").val() =="" || $("#card_number").val() ==" "){  
               alert("卡号不能为空！");  
               return false;  
            }
        }  
          
        function mover(){  
            event.srcElement.focus();  
            event.srcElement.select();  
        }  
          
        function mclick(){  
            if(event.srcElement.value=="请输入校园卡主姓名")  
                event.srcElement.value="";  
        }  
          
        function mblur(){  
            if(event.srcElement.value=="")  
                event.srcElement.value="请输入校园卡主姓名";
        }
		
		function mclick1(){  
            if(event.srcElement.value=="请输入校园卡主学号")  
                event.srcElement.value="";  
        }  
          
        function mblur1(){  
            if(event.srcElement.value=="")  
                event.srcElement.value="请输入校园卡主学号";
        }
		
		function mclick2(){  
            if(event.srcElement.value=="请输入校园卡号")  
                event.srcElement.value="";  
        }  
          
        function mblur2(){  
            if(event.srcElement.value=="")  
                event.srcElement.value="请输入校园卡号";
        }
		function mclick3(){  
            if(event.srcElement.value=="请输入你的联系方式")  
                event.srcElement.value="";  
        }  
          
        function mblur3(){  
            if(event.srcElement.value=="")  
                event.srcElement.value="请输入你的联系方式";
        }
    </script>

</head>
<body>

<div class="container">

<h1 class="text-center">校园卡信息</h1>

<form name="form" method="post" action=""
class="form-horizontal" enctype="multipart/form-data" onsubmit="return check_submit()">

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="select">类型</label>
    <div class="col-sm-8 col-xs-8">
      <select name="type_id" class="form-control"  id="select" onmouseover="mover()">
      <option selected="selected" value="0">--请选择-- </option>
      <option value="丢失">丢失</option>
      <option value="捡到">捡到</option>
      </select>
    </div>
  </div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="name">姓名</label>
    <div class="col-sm-8 col-xs-8">
      <input  id="name" type="text" name="name" class="form-control" onmouseover="mover()" onclick="mclick()"  onblur="mblur()" value="请输入校园卡主姓名" placeholder="">
    </div>
  </div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="student_number">学号</label>
    <div class="col-sm-8 col-xs-8">
      <input  id="student_number" type="text" name="student_number" class="form-control"  placeholder="" value="请输入校园卡主学号" onmouseover="mover()" onclick="mclick1()"  onblur="mblur1()" >
    </div>
  </div>


<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="card_number">卡号</label>
    <div class="col-sm-8 col-xs-8">
      <input  id="card_number" type="text" name="card_number" class="form-control"  placeholder="" value="请输入校园卡号" onmouseover="mover()" onclick="mclick2()"  onblur="mblur2()">
    </div>
  </div>


<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="phone">手机</label>
    <div class="col-sm-8 col-xs-8">
      <input id="phone" type="text" name="phone" class="form-control" onmouseover="mover()" onclick="mclick3()"  onblur="mblur3()" value="请输入你的联系方式"  placeholder="">
    </div>
  </div>
    
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="text">地点</label>
    <div class="col-sm-8 col-xs-8">
      <input type="text" name="place" class="form-control"  placeholder="">
    </div>
  </div>
	
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="word">留言</label>
    <div class="col-sm-8 col-xs-8">
		<input type="text" name="word" id="word" class="form-control"  placeholder=""/>
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


