<?php
header("Content-type: text/html; charset=utf-8");

$conn = new mysqli('localhost','book','YTMpWSbSZjbxiiYS','book');
mysqli_set_charset($conn,'utf8');
$sql="select * from shoppingcar where id>0";
$list= $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>仲有书</title>
    <link rel="stylesheet" href="CSS/font.css"/>
    <link rel="stylesheet" type="text/css"  href="CSS/reset.css"/>
    <script src="./JS/book.js"></script>

</head>
<body>
<hearder>
    <link rel="stylesheet" href="./CSS/hearder.css">
    <nav class="nav-top">
        <div class="inner  clear_fix">
            <ul class="left  clear_fix">
                <li><a href="main.html" id="collect"><i class="icon-collect"></i>首页</a> </li>
                <li><a href="./HTML/用户登录.html" id="login">登陆</a> </li>
                <li><a href="./HTML/用户注册.html" id="registe">注册</a> </li>
            </ul>
            <ul class="right  clear_fix">
                <li><a href="#">订单</a> </li>
                <li><a href="#">我的账户<i class="down-arrow"></i> </a> </li>
                <li><a href="#">最近浏览<i class="down-arrow"></i></a> </li>
                <li><a href="#">联系客服<i class="down-arrow"></i></a> </li>
            </ul>
        </div>
    </nav>

    <link rel="stylesheet" href="./CSS/book.css">
    <div id="line"></div>
    <div id="division">我的订单</div>

</hearder>





<link rel="stylesheet"  href="./CSS/sousuo.css">
<div class="sousuo">
    <?php
    foreach( $list as $v )
    {

        ?>

        <div class="sousuo-datail" >
            <div class="photo">
                <div class="big_photo"><a href="book1.html"><img src="<?=$v['img'] ?>" ></a> </div>
            </div>
            <div class="news">
                <a href="book<?=$v['id'] ?>.html">
                    <div class="book_name">
                        <?=$v['title'] ?>
                    </div>
                    <div class="autor">
                        作者：<?=$v['author'] ?>
                    </div>
                </a>
                <div class="">
                    出版社：<?=$v['press'] ?>
                </div>
                <div class="price">
                    <span>￥ <?=$v['price'] ?></span>

                </div>
            </div>
        </div>
        <?php

    }
    ?>

</div>
<div class="qingkong">
    <a href="qingkong.php">清空购物车</a>
</div>

</body>
</html>