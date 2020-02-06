<?php
header("Content-type: text/html; charset=utf-8");


    $conn = new mysqli('localhost','book','YTMpWSbSZjbxiiYS','book');
    mysqli_set_charset($conn,'utf8');


            $sql_insert = "insert into shoppingcar (id,title,author,press,price,img) values('1','十大国宝','陈广旭','广东旅游出版社','38.6','./img/book1.jpg')";
            $res_insert = $conn->query($sql_insert);
            if ($res_insert) {
                echo '<script>alert("加入成功");</script>';
                echo '<script>window.location="book1.html";</script>';
            } else {

                echo "<script>alert('系统繁忙，请稍候！');</script>";
            }



?>