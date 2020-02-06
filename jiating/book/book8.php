<?php
header("Content-type: text/html; charset=utf-8");


$conn = new mysqli('localhost','book','YTMpWSbSZjbxiiYS','book');
mysqli_set_charset($conn,'utf8');


$sql_insert = "insert into shoppingcar (id,title,author,press,price,img) values('8','中国少年儿童百科全书','无','吉林出版集团有限责任公司','59.80','./img/book8.jpg')";
$res_insert = $conn->query($sql_insert);
if ($res_insert) {
    echo '<script>alert("加入成功");</script>';
    echo '<script>window.location="book8.html";</script>';
} else {

    echo "<script>alert('系统繁忙，请稍候！');</script>";
}



?>