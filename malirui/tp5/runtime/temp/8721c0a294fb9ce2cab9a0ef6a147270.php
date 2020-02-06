<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\PHP\Apache24\htdocs\tp5\public/../application/index\view\index\index.html";i:1578475385;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/main.css">
    <link rel="stylesheet" href="/static/hui.css">
    <style type="text/css">
      [v-cloak]{
        display: none;
      }
    </style>
  </head>

  <body class="hui-background-color-white">

    <div class="hui-category hui-col-middle hui-padding-all-10">
        <div class="hui-category-rowline hui-flexbox-item hui-border-top-turquoise"></div>
        <div class="hui-category-title hui-font-color-black hui-padding-col-10">
            <h2 class="hui-font-family-simsun">欢迎来到病房管理系统</h2>
        </div>
        <div class="hui-category-rowline hui-flexbox-item hui-border-top-turquoise"></div>
    </div>
    <div class="hui-width-full hui-padding-all-20">
      <p class="hui-font-color-emerald">
        本系统起源于最近编写的《零点起飞学数据库》一书，所有代码解释权归本书编写组所有，转载和使用请标注转载来源，谢谢！
      </p>
      <p class="hui-font-color-emerald">
        本实例根据原“病房管理系统”改编，由原生改为TP5编写。
      </p>
    </div>
    <div class="hui-category hui-col-middle hui-padding-all-10">
        <div class="hui-category-rowline hui-flexbox-item hui-border-top-turquoise"></div>
        <div class="hui-category-title hui-font-color-turquoise hui-font-size-16 hui-padding-col-10">
            需要查阅的文档介绍
        </div>
        <div class="hui-category-rowline hui-flexbox-item hui-border-top-turquoise"></div>
    </div>

    <div class="hui-category hui-col-middle hui-padding-all-10">
        <div class="hui-category-rowline hui-flexbox-item hui-border-top-turquoise"></div>
        <div class="hui-category-title hui-font-color-turquoise hui-font-size-16 hui-padding-col-10">
            好啦，让我们开始吧！
        </div>
        <div class="hui-category-rowline hui-flexbox-item hui-border-top-turquoise"></div>
    </div>

    <script>
      var i = 0;
      var mDiv = setInterval(function(){
        if(i>100){
          clearInterval(mDiv);
        }
        var myDiv = document.getElementById("myDiv");
        myDiv.style.width = i+"%";
        myDiv.innerText = i+"%";
        i+=10;
      },200)
    </script>
    <div class="hui-width-full hui-padding-all-30">
      <ul>
        <li><a href="<?php echo url('login'); ?>">点此访问登录页面</a></li>
      </ul>
    </div>
    <div class="container" style="margin-top: 250px;">
      <div class="row">
        <div class="progress">
          <div id="myDiv" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            <!-- <span class="sr-only">45% Complete</span> -->
            0%
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
