<?php
header("Content-type: text/html; charset=utf-8");


$conn = new mysqli('localhost','book','YTMpWSbSZjbxiiYS','book');
mysqli_set_charset($conn,'utf8');


$sql_insert = "TRUNCATE TABLE shoppingcar";
$res_insert = $conn->query($sql_insert);
if ($res_insert) {
    echo '<script>alert("清空成功");</script>';
    echo '<script>window.location="shoppingcar.php";</script>';
} else {

    echo "<script>alert('系统繁忙，请稍候！');</script>";
}



?>