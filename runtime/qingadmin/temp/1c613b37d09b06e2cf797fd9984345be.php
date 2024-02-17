<?php /*a:3:{s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\page\add.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\foot.html";i:1708179639;}*/ ?>
<!--包含头部文件-->

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



<div class="cl pd-5 bg-1 bk-gray mt-20"> 添加</div>

<article class="page-container">

  <form class="form form-horizontal" id="form-article-add" method="post" action="" enctype="multipart/form-data" >

    



    <div class="row cl">

      <label class="form-label col-xs-4 col-sm-2">标题：</label>

      <div class="formControls col-xs-8 col-sm-6">

        <input type="text" class="input-text" value=""  name="title" required="required">

      </div>

    </div>




    <div class="row cl">

      <label class="form-label col-xs-4 col-sm-2">内容：</label>

      <div class="formControls col-xs-8 col-sm-9">

        <script id="editor"  type="text/plain" name="content" style="width:100%;height:300px;"></script>

      </div>

    </div>



    <div class="row cl">

      <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">

        <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交</button>

      </div>

    </div>

  </form>

</article>

<script>

  /**定义页面全局变量**/

  var SCOPE = {};



</script>







<script>

  $(function(){

    var ue = UE.getEditor('editor');

  });

</script>

<!--_footer 作为公共模版分离出去-->



<script type="text/javascript" src="/public/static/admin/lib/layer/2.4/layer.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui/js/H-ui.min.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 







<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<script src="/public/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>



<script src="/public/static/admin/js/common.js"></script><!-- 后台公共自定义js -->





</body>

</html>