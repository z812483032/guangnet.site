<?php
header("Content-type: text/html; charset=utf-8");


$conn = new mysqli('localhost','book','YTMpWSbSZjbxiiYS','book');
mysqli_set_charset($conn,'utf8');


$sql_insert = "insert into shoppingcar (id,title,author,press,price,img) values('4','Java程序设计基础（第6版）','陈国君、陈磊、李梅生、刘洋','清华大学出版社','55.20','./img/book4.jpg')";
$res_insert = $conn->query($sql_insert);
if ($res_insert) {
    echo '<script>alert("加入成功");</script>';
    echo '<script>window.location="book4.html";</script>';
} else {

    echo "<script>alert('系统繁忙，请稍候！');</script>";
}



?>