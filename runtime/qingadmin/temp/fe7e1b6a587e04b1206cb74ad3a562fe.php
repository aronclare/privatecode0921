<?php /*a:3:{s:70:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\news\index.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\foot.html";i:1708179639;}*/ ?>
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



<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 新闻列表 </nav>

<div class="page-container">

<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius"  href="<?php echo url('news/add'); ?>"><i class="Hui-iconfont">&#xe600;</i> 添加</a></span> <span class="r"><a class="btn btn-primary radius"  href="<?php echo url('news/layui'); ?>">layui上传插件</a></span> </div>

	<div class="mt-20">

			<table class="table table-border table-bordered table-bg table-hover table-sort mt-20">

				<thead>

					<tr class="text-c">

						<th width="50">ID</th>

						<th width="250">名称</th>

						<th width="250">链接</th>						

						<th width="50">操作</th>

					</tr>

				</thead>

				<tbody>

					<?php if(is_array($newsData) || $newsData instanceof \think\Collection || $newsData instanceof \think\Paginator): $i = 0; $__LIST__ = $newsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

					<tr class="text-c">

						<td><?php echo htmlentities($vo['id']); ?></td>

						<td><?php echo htmlentities($vo['title']); ?></td>

						<td><?php echo htmlentities(date("Y-m-d",!is_numeric($vo['time'])? strtotime($vo['time']) : $vo['time'])); ?></td>

						<td class="td-manage"><a style="text-decoration:none" class="ml-5" href="<?php echo url('news/edit',array('id'=>$vo['id'])); ?>" title="修改"><i class="Hui-iconfont">&#xe6df;</i></a><a style="text-decoration:none" class="ml-5" onclick="delete_confirm('<?php echo url('news/del',array('id'=>$vo['id'])); ?>')" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>

					</tr>

					<?php endforeach; endif; else: echo "" ;endif; ?>

					

				</tbody>

			</table>

			<?php echo $newsData; ?>

	</div>

</div>

<!--包含头部文件-->

<!--_footer 作为公共模版分离出去-->



<script type="text/javascript" src="/public/static/admin/lib/layer/2.4/layer.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui/js/H-ui.min.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 







<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<script src="/public/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>



<script src="/public/static/admin/js/common.js"></script><!-- 后台公共自定义js -->





