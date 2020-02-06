<?php
header("Content-type: text/html; charset=utf-8");
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
if ($username == ''){
    echo '<script>alert("请输入用户名！");history.go(-1);</script>';
    exit(0);
}
if ($password == ''){
    echo '<script>alert("请输入密码");history.go(-1);</script>';
    exit(0);
}
if ($password != $repassword){
    echo '<script>alert("密码与确认密码应该一致");history.go(-1);</script>';
    exit(0);
}
if($password == $repassword){
    $conn = new mysqli('localhost','book','YTMpWSbSZjbxiiYS','book');
    if ($conn->connect_error){
        echo '数据库连接失败！';
        exit(0);
    }else {
        $sql = "select username from user1 where username = '$_POST[username]'";
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if ($number) {
            echo '<script>alert("用户名已经存在");history.go(-1);</script>';
        } else {
            $sql_insert = "insert into user1 (username,password) values('$_POST[username]','$_POST[password]')";
            $res_insert = $conn->query($sql_insert);
            if ($res_insert) {
                echo '<script>alert("注册成功，请登录");</script>';
                echo '<script>window.location="用户登录.html";</script>';
            } else {

                echo "<script>alert('系统繁忙，请稍候！');</script>";
            }
        }
    }
}else{
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}
?>
