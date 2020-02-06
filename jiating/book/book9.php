<?php
header("Content-type: text/html; charset=utf-8");


$conn = new mysqli('localhost','book','YTMpWSbSZjbxiiYS','book');
mysqli_set_charset($conn,'utf8');


$sql_insert = "insert into shoppingcar (id,title,author,press,price,img) values('9','中国教育问题调查','程平源','清华大学出版社','28.80','./img/book9.jpg')";
$res_insert = $conn->query($sql_insert);
if ($res_insert) {
    echo '<script>alert("加入成功");</script>';
    echo '<script>window.location="book9.html";</script>';
} else {

    echo "<script>alert('系统繁忙，请稍候！');</script>";
}



?>