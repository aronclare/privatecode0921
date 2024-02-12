<?php /*a:3:{s:62:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\user\edit.html";i:1707634869;s:64:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\public\head.html";i:1591089971;s:64:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\public\foot.html";i:1591183190;}*/ ?>
<!--包含头部文件--><!DOCTYPE HTML>

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

<div class="cl pd-5 bg-1 bk-gray mt-20"> 修改</div><article class="page-container">  <style>    .formControls label{      display: block;    }    .inline{      display: inline-block;    }    .block{      display: block;    }  </style>  <form class="form form-horizontal" id="form-article-add" method="post" action="" enctype="multipart/form-data" >    <div class="row cl">      <label class="form-label col-xs-4 col-sm-2">信息审核：</label>      <div class="formControls col-xs-8 col-sm-6">        <input type="hidden" class="input-text" value="<?php echo htmlentities($userData['id']); ?>" placeholder="" id="" name="id">        <p class="form-label col-xs-6"><label for="">姓名：<input type="text" class="input-text " value="<?php echo htmlentities($userData['real_name']); ?>" required="required" name="id_front_pic">        </label></p>        <p class="form-label col-xs-6"><label for="">ID正面：<input type="text" class="input-text" value="<?php echo htmlentities($userData['id_front_pic']); ?>" required="required" name="id_front_pic">        </label></p>        <p class="form-label col-xs-6">ID反面：<input type="text" class="input-text" value="<?php echo htmlentities($userData['id_back_pic']); ?>" required="required" name="id_back_pic">        </p>        <p class="form-label col-xs-6">ID号码：<input type="text" class="input-text" value="<?php echo htmlentities($userData['id_number']); ?>" required="required" name="id_number">        </p>        <p class="form-label col-xs-6">个人图片：<input type="text" class="input-text" value="<?php echo htmlentities($userData['self_pic']); ?>" required="required" name="self_pic">        </p>        <p class="form-label col-xs-6">审核状态(0待审核1审核通过2审核未通过)：<input type="text" class="input-text" value="<?php echo htmlentities($userData['check_status']); ?>" required="required" name="check_status">        </p>        <p class="form-label col-xs-6">审核意见：<input type="text" class="input-text" value="<?php echo htmlentities($userData['remark']); ?>" required="required" name="remark">        </p>       <label class="form-label col-xs-6"></label>      </div>    </div>    <div class="row cl">     <!-- <label class="form-label col-xs-4 col-sm-2">对应数据表：</label>      <div class="formControls col-xs-8 col-sm-6">        <input type="text" class="input-text" value="<?php echo htmlentities($userData['table_name']); ?>" required="required" name="table_name">      </div>-->    </div>    <div class="row cl">      <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">        <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交</button>      </div>    </div>  </form></article><script>  /**定义页面全局变量**/  var SCOPE = {};</script><!--包含头部文件--><!--_footer 作为公共模版分离出去-->



<script type="text/javascript" src="/public/static/admin/lib/layer/2.4/layer.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui/js/H-ui.min.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 







<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<script src="/public/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>



<script src="/public/static/admin/js/common.js"></script><!-- 后台公共自定义js -->



</body></html>