<?php
	header("Content-type: text/html; charset=utf-8");

	$conn = new mysqli('localhost','book','YTMpWSbSZjbxiiYS','book');
	mysqli_set_charset($conn,'utf8');
	$sql="select * from book where id>0";
	$keyword=$_GET['keyword'];
	if ( $keyword )
	{
		$sql.=" and (title like '%$keyword%' or author like '%$keyword%' or press like '%$keyword%')";
	}
	
	if ( $_GET['ordertype'] )
	{
		if ( $_GET['ordertype']==1 )
		{
			$sql.=" order by price asc ";
		}
		elseif ( $_GET['ordertype']==2 )
		{
			$sql.=" order by price desc ";
		}
		
		
	}
	else
	{
		$sql.=" order by id ";
	}
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
                <li><a href="shoppingcar.php">订单</a> </li>
                <li><a href="#">我的账户<i class="down-arrow"></i> </a> </li>
                <li><a href="#">最近浏览<i class="down-arrow"></i></a> </li>
                <li><a href="#">联系客服<i class="down-arrow"></i></a> </li>
            </ul>
        </div>
    </nav>

    <link rel="stylesheet" href="./CSS/header1.css ">
    <div id="herder1">
        <div><h1><a href="#" class="big-logo"><img src="./img/biglogo.jpg" alt="仲有书"></a> </h1></div>
        <div class="search-box">
            <form class="clear_fix" action="sousuo.php" method="get">
             
                <input type="text" name="keyword" placeholder="请输入书籍信息">
                <input type="submit" value="搜索">
            </form>
        </div>
    </div>





</hearder>

<div class="content" >
    <link rel="stylesheet"  href="./CSS/content.css">
    <div class="content-header" >
        <div class="header-main">
            <ul class="filter">
                <li>
                    <dl>
                        <dt><i class="tubiao"></i> 排序方式</dt>
                        <dd><a href="#">销量优先</a> </dd>
                        <dd><a href="#">好评优先</a> </dd> 
                        <dd><a href="?ordertype=1&keyword=<?=$keyword ?>">价格升序</a> </dd>
                        <dd><a href="?ordertype=2&keyword=<?=$keyword ?>">价格降序</a> </dd>
                        <dd><a href="#">出版年份</a> </dd>

                    </dl>
                </li>
            </ul>
        </div>
    </div>

</div>

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


</body>
</html>