<?php
header("content-type:text/html;charset='utf-8'");
session_start();
$issuer=$_SESSION['name'];
$con=mysqli_connect('localhost', 'chb', 'chb19980505','chb');



if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
//数据库：app_lostandfind;表：table_others;



if ($_SERVER["REQUEST_METHOD"] == "POST")//判断提交的数据是否是POST方式传来的；

{
	$upload_dir=getcwd();
	if(!is_dir($upload_dir))
		mkdir($upload_dir);
	
$type_id=$_POST['type_id'];
$name=$_POST['name'];
$user_name=$_POST['user_name'];
$describe=$_POST['describe'];
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
        mysqli_query($con,"INSERT INTO table_others (type_id, name, user_name,detail,place,phone,word,status,time,image,issuer) VALUES ('丢失','$name','$user_name','$describe','$place','$phone','$word','0','$date','$file_name','$issuer')");
	    echo"<script type='text/javascript'>alert('提交成功，我们会帮你寻找丢失的 $name ！');location.href='main_home.php'</script>";
        
	}


    if($type_id=="捡到")
	{
        mysqli_query($con,"INSERT INTO table_others (type_id, name, user_name,detail,place,phone,word,status,time,image,issuer) VALUES ('捡到','$name','$user_name','$describe','$place','$phone','$word','0','$date','$file_name','$issuer')");
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
       font-size: 1.5em;
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
            if($("#name").val() =="" || $("name").val()=="请输入物品名称"){  
                alert("物品名称不能为空！");  
                return false;  
            }  
            if($("#phone").val() ==""){  
                alert("手机号不能为空！");
                return false;  
            }
            if($("#user_name").val() ==""){  
               alert("本人姓名不能为空！");
               return false;  
            }
        }  
          

    </script>

</head>
<body>

<div class="container">

<h1 class="text-center">生活用品</h1>

<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" enctype="multipart/form-data" onsubmit="return check_submit()">


<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label">类型</label>
    <div class="col-sm-8 col-xs-8">
      <select name="type_id" class="form-control"  id="select" onmouseover="mover()">
      <option selected="selected" value="0">--请选择-- </option>
      <option value="丢失">丢失</option>
      <option value="捡到">捡到</option>
      </select>
    </div>
</div>
 
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="name">物品</label>
    <div class="col-sm-8 col-xs-8">
      <input  id="name" type="text" name="name" class="form-control" placeholder="请输入物品名称">
    </div>
</div>
 
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="user_name">姓名</label>
    <div class="col-sm-8 col-xs-8">
      <input type="text" name="user_name" class="form-control"  placeholder="请输入物品使用者">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="describe">描述</label>
    <div class="col-sm-8 col-xs-8">
      <input type="text" name="describe" id="describe" class="form-control"  placeholder="">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="place">地点</label>
    <div class="col-sm-8 col-xs-8">
      <input type="text" name="place" id="place" class="form-control"  placeholder="">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="phone">手机</label>
    <div class="col-sm-8 col-xs-8">
      <input id="phone" type="text" id="phone" name="phone" class="form-control"  placeholder="请输入你的联系方式">
    </div>
</div>  
    
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="word">留言</label>
    <div class="col-sm-8 col-xs-8">
		<input type="text" name="word" id="word" class="form-control"  placeholder="">
    </div>
  </div>
	
<div class="form-group">
	<label class="col-sm-3 col-xs-3 control-label" for="upfile">图片</label>
	 <div class="col-sm-8 col-xs-8">
    
     <input type="file" id="upfile" name="upfile" class="form-control"/><br><br>
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