<?php /*a:2:{s:73:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\merchant\edit.html";i:1707984615;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1707797701;}*/ ?>
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

<div class="cl pd-5 bg-1 bk-gray mt-20"> 编辑审核</div><div class="page-container form form-horizontal">  <form action="<?php echo url('merchant/save_edit'); ?>" method="post" enctype="multipart/form-data">    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">商户名称：</label>      <div class="formControls col-xs-8 col-sm-6">        <input type="text" class="input-text " value="<?php echo htmlentities($mer_data['store_name']); ?>" required="required" name="store_name">        <input type="hidden" class="input-text" value="<?php echo htmlentities($mer_data['id']); ?>"  name="id">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">商户地址：</label>      <div class="formControls col-xs-8 col-sm-6">        <input type="text" class="input-text " value="<?php echo htmlentities($mer_data['address']); ?>" required="required" name="address">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">商户姓名：</label>      <div class="formControls col-xs-8 col-sm-6">        <input type="text" class="input-text " value="<?php echo htmlentities($mer_data['name']); ?>" required="required" name="name">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">门户照片：</label>      <div class="formControls col-xs-8 col-sm-6">        <img src="<?php echo htmlentities($mer_data['store_pic']); ?>" style="width: 100px;height: 100px;margin-right: 15px;">        <input type="file" class="input-text "  name="store_pic">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">所属行业：</label>      <div class="formControls col-xs-8 col-sm-6">        <input type="text" class="input-text " value="<?php echo htmlentities($mer_data['store_type']); ?>" required="required" name="store_type">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">收款码：</label>      <div class="formControls col-xs-8 col-sm-6">        <img src="<?php echo htmlentities($mer_data['payment_code_pic']); ?>" style="width: 100px;height: 100px;margin-right: 15px;">        <input type="file" class="input-text "  name="payment_code_pic">      </div>    </div>    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2"></label>      <div class="formControls col-xs-8 col-sm-6">        <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont"></i> 提交</button>      </div>    </div>  </form></div></body></html>