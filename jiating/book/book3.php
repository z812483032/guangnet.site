<?php
header("Content-type: text/html; charset=utf-8");


$conn = new mysqli('localhost','book','YTMpWSbSZjbxiiYS','book');
mysqli_set_charset($conn,'utf8');


$sql_insert = "insert into shoppingcar (id,title,author,press,price,img) values('3','JavaScript从入门到精通（第3版）','明日科技','清华大学出版社','89.80','./img/book3.jpg')";
$res_insert = $conn->query($sql_insert);
if ($res_insert) {
    echo '<script>alert("加入成功");</script>';
    echo '<script>window.location="book3.html";</script>';
} else {

    echo "<script>alert('系统繁忙，请稍候！');</script>";
}



?>