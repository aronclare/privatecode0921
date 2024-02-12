<?php /*a:2:{s:70:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\merchant\car_edit.html";i:1707730588;s:64:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\public\head.html";i:1591089971;}*/ ?>
<!DOCTYPE HTML>

<html>

<head>

<meta charset="utf-8">

<meta name="renderer" content="webkit|ie-comp|ie-stand">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

<meta http-equiv="Cache-Control" content="no-siteapp" />

<link rel="Bookmark" href="/favicon.ico" >

<link rel="Shortcut Icon" href="/favicon.ico" />

<!--[if lt IE 9]>

<script type="text/javascript" src="lib/html5shiv.js"></script>

<script type="text/javascript" src="lib/respond.min.js"></script>

<![endif]-->

<link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui/css/H-ui.min.css" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/static//h-ui.admin/css/H-ui.admin.css" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui.admin/css/style.css" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/css/common.css" />


<script type="text/javascript" src="/public/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/public/static/admin/layui/layui.js"></script> 

<title>后台管理系统</title>



</head>

<body>

<div class="cl pd-5 bg-1 bk-gray mt-20"> 商户信息</div><div class="page-container form form-horizontal">  <form action="" method="post">    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">汽车名称：</label>      <div class="formControls col-xs-8 col-sm-6">        <input type="text" class="input-text " value="<?php echo htmlentities($car_Data['car_name']); ?>" required="required" name="car_name">        <input type="hidden" class="input-text" value="<?php echo htmlentities($car_Data['id']); ?>"  name="id">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">车牌号：</label>      <div class="formControls col-xs-8 col-sm-6">        <input type="text" class="input-text " value="<?php echo htmlentities($car_Data['car_number']); ?>" required="required" name="car_number">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">汽车图片：</label>      <div class="formControls col-xs-8 col-sm-6">        <img src="<?php echo htmlentities($car_Data['car_pic']); ?>" style="width: 100px;height: 100px;margin-right: 15px;">        <input type="file" class="input-text " value="<?php echo htmlentities($car_Data['car_pic']); ?>" required="required" name="car_pic">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">获取地址：</label>      <div class="formControls col-xs-8 col-sm-6">        <input type="text" class="input-text " value="<?php echo htmlentities($car_Data['address']); ?>" required="required" name="address">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2"></label>      <div class="formControls col-xs-8 col-sm-6">        <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont"></i> 提交</button>      </div>    </div>  </form></div></body></html>