<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"E:\PHP\Apache24\htdocs\tp5\public/../application/index\view\admin\add_doctor.html";i:1488357798;s:78:"E:\PHP\Apache24\htdocs\tp5\public/../application/index\view\common\header.html";i:1578476563;s:78:"E:\PHP\Apache24\htdocs\tp5\public/../application/index\view\common\footer.html";i:1578409518;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>病房管理系统-员工信息注册</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/main.css">
    <link rel="stylesheet" href="/static/hui.css">
    <style type="text/css">
      [v-cloak]{
        display: none;
      }
    </style>
  </head>
  <body>
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 header">
          工号<?php echo \think\Session::get('Uname'); ?>，您现在的位置是： <?php echo $title; ?> <span class="pull-right hui-font-color-alizarin hui-margin-left-15" onclick="location.href='<?php echo url('admin/login_out'); ?>'" style="cursor:pointer;"> 注销登录 </span>
          <span class="pull-right hui-margin-left-15" onclick="location.href='<?php echo url('index'); ?>'" style="cursor:pointer;"> 返回首页 </span>
          <span class="pull-right" onclick="location.href='<?php echo url('work'); ?>'" style="cursor:pointer;"> 返回工作模块 </span>
        </div>
      </div>
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 hui-margin-top-30 hui-padding-all-20 hui-background-color-white">


          <form role="form" action="<?php echo url('add_doctor_check'); ?>" method="post">
          <div class="form-group">
            <label for="zh">工号：</label>
            <input type="text" name="work" class="form-control" placeholder="工号">
          </div>
          <div class="form-group">
            <label for="zh">姓名：</label>
            <input type="text" name="name" class="form-control" placeholder="姓名">
          </div>
          <div class="form-group">
            <label for="mm">性别：</label>
            <label class="radio-inline">
              <input type="radio" name="sex" value="男" checked> 男
            </label>
            <label class="radio-inline">
              <input type="radio" name="sex" value="女"> 女
            </label>
          </div>
          <div class="form-group">
            <label for="mm">职称：</label>
            <select class="form-control" name="dzc">
                <option value='科主任'>科主任</option>
                <option value='医生'>医生</option>
                <option value='护士长'>护士长</option>
                <option value='护士'>护士</option>
              </select>
          </div>
          <div class="form-group">
            <label for="mm">所属科室：</label>
            <select class="form-control" name="keshi">
            <?php if(is_array($ato) || $ato instanceof \think\Collection || $ato instanceof \think\Paginator): $i = 0; $__LIST__ = $ato;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <option value='<?php echo $vo['Aname']; ?>'><?php echo $vo['Aname']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
          </div>

          <button type="submit" class="btn btn-primary btn-block">提交</button>
        </form>
  </div>
<div class="col-md-4"></div>
</div>
</div>

<div style="height: 100px;"></div>
<footer style="bottom: 0;width: 100%;">
    &copy; 校医院
</footer>
<script src="https://unpkg.com/vue@2.2.1/dist/vue.js"></script>
</body>
</html>

