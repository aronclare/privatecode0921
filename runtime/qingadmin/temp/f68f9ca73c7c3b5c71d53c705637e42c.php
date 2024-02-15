<?php /*a:2:{s:69:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\user\edit.html";i:1707985531;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1707797701;}*/ ?>
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

    <div class="cl pd-5 bg-1 bk-gray mt-20"> 信息审核</div>    <div class="page-container form form-horizontal">      <form action="<?php echo url('user/user_update'); ?>" method="post" enctype="multipart/form-data">        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2">姓名：</label>          <div class="formControls col-xs-8 col-sm-6">            <input type="text" class="input-text " value="<?php echo htmlentities($userData['real_name']); ?>" required="required" name="real_name">            <input type="hidden" class="input-text" value="<?php echo htmlentities($userData['id']); ?>"  name="id">          </div>        </div>        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2">身份证号码：</label>          <div class="formControls col-xs-8 col-sm-6">            <input type="text" class="input-text " value="<?php echo htmlentities($userData['id_number']); ?>" required="required" name="id_number">          </div>        </div>        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2">手机号码：</label>          <div class="formControls col-xs-8 col-sm-6">            <input type="text" class="input-text " value="<?php echo htmlentities($userData['mobile']); ?>" required="required" name="mobile">          </div>        </div>        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2">邮箱：</label>          <div class="formControls col-xs-8 col-sm-6">            <input type="text" class="input-text " value="<?php echo htmlentities($userData['email']); ?>" required="required" name="email">          </div>        </div>        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2">ID正面：</label>          <div class="formControls col-xs-8 col-sm-6">            <img src="<?php echo htmlentities($userData['id_front_pic']); ?>" alt="">            <input type="file" class="input-text " name="id_front_pic">          </div>        </div>        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2">ID反面：</label>          <div class="formControls col-xs-8 col-sm-6">            <img src="<?php echo htmlentities($userData['id_back_pic']); ?>" alt="">            <input type="file" class="input-text " value="<?php echo htmlentities($userData['id_back_pic']); ?>"  name="id_back_pic">          </div>        </div>        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2">自拍照：</label>          <div class="formControls col-xs-8 col-sm-6">            <img src="<?php echo htmlentities($userData['self_pic']); ?>" alt="">            <input type="file" class="input-text " value="<?php echo htmlentities($userData['self_pic']); ?>" name="self_pic">          </div>        </div>        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2">审核状态：</label>          <div class="formControls col-xs-8 col-sm-6">            <input type="text" class="input-text " value="<?php echo htmlentities($userData['check_status']); ?>" required="required" name="check_status">          </div>        </div>        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2">审核意见：</label>          <div class="formControls col-xs-8 col-sm-6">            <textarea name="remark" id="" cols="69" rows="8"><?php echo htmlentities($userData['remark']); ?></textarea>          </div>        </div>        <div class="row cl">          <label class="form-label col-xs-4 col-sm-2"></label>          <div class="formControls col-xs-8 col-sm-6">            <button class="btn btn-primary radius rbtn" type="submit"><i class="Hui-iconfont"></i> 提交</button>          </div>        </div>      </form>    </div><style>  .rbtn{    float: right;  }  .formControls img{    width: 200px;    height: 120px;  }</style>    </body>    </html>