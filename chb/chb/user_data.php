<?php
header("content-type:text/html;charset='utf-8'");
session_start();
$user_name=$_SESSION['name'];


$con = mysqli_connect('localhost', 'chb', 'chb19980505','chb');


if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
//数据库：app_lostandfind;表：table_others;



if ($_SERVER["REQUEST_METHOD"] == "POST")//判断提交的数据是否是POST方式传来的；

{

$name=$_POST['name'];
$number=$_POST['number'];
$sex=$_POST['sex'];
$major=$_POST['major'];
$phone=$_POST['phone'];
$class=$_POST['class'];
$academy=$_POST['academy'];
	
   mysqli_query($con,"update user_code set name='$name',sex='$sex',number='$number', class='$class',major='$major',academy='$academy',phone='$phone' where username='$user_name'");
  echo"<script type='text/javascript'>alert('提交个人资料成功!');</script>";
       
}

  $result=mysqli_query($con,"select * from user_code where username='$user_name'");
  $row=mysqli_fetch_assoc($result);
  
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
	<title>个人资料</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
    <script type="text/javascript">  
      
	 function check_submit(){
			if($("#sex").val() ==""){  
                alert("性别不能为空!");  
                return false;  
            }  
            if($("#name").val() ==""){  
                alert("姓名不能为空！");  
                return false;  
            }  
            if($("#phone").val().trim() ==""){  
                alert("手机号不能为空！");  
                return false;  
            }
            if($("#number").val().trim() ==""){  
               alert("学号不能为空！");  
               return false;  
            }
     
        }  
          
          
    </script>

</head>
<body>

<div class="container">

<h1 class="text-center">个人信息</h1>

<form name="form" method="post" action="" class="form-horizontal" onsubmit="return check_submit()">

 
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="name">姓名</label>
    <div class="col-sm-8 col-xs-8">
      <input type="text" id="name" name="name" class="form-control"  value="<?php echo $row['name'] ?>" placeholder="请输入你的真实姓名">
    </div>
</div>
	
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="sex">性别</label>
     <div class="col-sm-8 col-xs-8">
      <input type="text" id="sex" name="sex" class="form-control"  value="<?php echo $row['sex'] ?>" placeholder="请输入你的性别（男/女）">
    </div>
</div>
	
	
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="number">学号</label>
    <div class="col-sm-8 col-xs-8">
      <input  id="number" type="text"  value="<?php echo $row['number']?>" name="number" class="form-control"  placeholder="请输入你的学号">
    </div>
</div>
 

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="academy">学院</label>
    <div class="col-sm-8 col-xs-8">
      <input type="text" name="academy" id="academy"  value="<?php echo $row['academy']?>" class="form-control"  placeholder="请输入你的学院">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="major">专业</label>
    <div class="col-sm-8 col-xs-8">
      <input type="text" name="major" id="major"  value="<?php echo $row['major']?>" class="form-control"  placeholder="请输入你的专业">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="class">班级</label>
    <div class="col-sm-8 col-xs-8">
      <input id="class" type="text" name="class"  value="<?php echo $row['class']?>" class="form-control"  placeholder="请输入你的班级">
    </div>
</div>  
    
<div class="form-group">
    <label class="col-sm-3 col-xs-3 control-label" for="phone">手机号</label>
    <div class="col-sm-8 col-xs-8">
		<input type="text" name="phone" id="phone"  value="<?php echo $row['phone']?>" class="form-control"  placeholder="请输入你的手机号">
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