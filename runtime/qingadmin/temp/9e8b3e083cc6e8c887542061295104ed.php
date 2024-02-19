<?php /*a:3:{s:74:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\category\index.html";i:1707797701;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1707797701;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\foot.html";i:1707797701;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类管理 <span class="c-gray en">&gt;</span> 分类列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action="<?php echo url('category/search'); ?>" method="post">
		<div class="text-c">
			<input type="text" class="input-text" style="width:20%" placeholder="请输入搜索关键字" name="cate_name">
			<button type="submit" class="btn btn-success radius"><i class="Hui-iconfont">&#xe665;</i>搜索</button>
		</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l"> <a class="btn btn-primary radius" href="<?php echo url('category/add'); ?>"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a></span> 
		<span class="r tishi" style="margin-top: 7px;">注意：请谨慎删除栏目，删除栏目会删除该栏目的所有子类，以及所属商品！</span> 
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c th">
				    <th width="30">伸缩</th>
					<th width="50">ID</th>
					<th width="150">分类名称</th>
					<th width="50">排序序号<br><span class="tishi" style="font-weight: normal;">数字越小越靠前</span></th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($categorys) || $categorys instanceof \think\Collection || $categorys instanceof \think\Paginator): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr class="text-c" id="<?php echo htmlentities($vo['id']); ?>" parentid="<?php echo htmlentities($vo['parent_id']); ?>">
					<td align="center"><span class="open">+</span></td>
					<td><?php echo htmlentities($vo['id']); ?></td>
					<td style="text-align: left;<?php if($vo['cate_level'] == 0): ?>font-weight:bold;<?php endif; ?>">

				  		<a href="<?php echo url('content/index',array('cate_id'=>$vo['id'])); ?>" <?php if($vo['status'] == 0): ?>style="color: #aaa;"<?php endif; ?>><?php echo str_repeat('-', 8*$vo['cate_level']); ?><?php echo htmlentities($vo['cate_name']); ?></a>

					</td>
					<td class="text-c listorder">
						<input size="10" attr-id="<?php echo htmlentities($vo['id']); ?>" attr-model="category" name="listorder"  value="<?php echo htmlentities($vo['listorder']); ?>"/>
					</td>
					<td class="td-manage"><a style="text-decoration:none" class="ml-5" href="<?php echo url('category/edit',array('id'=>$vo['id'])); ?>" title="修改"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onclick="delete_confirm('<?php echo url('category/del',array('id'=>$vo['id'],'dbname'=>'flink')); ?>')" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
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




<script>
	//栏目伸缩状态js
	   $('tr[parentid!=0]').hide();
	   $('.open').click(function(){
		   var id=$(this).parents('tr').attr('id');
		   if($(this).text()=='+'){
			   $(this).text('-');
			   $('tr[parentid='+id+']').show();
		   }else{
			   $(this).text('+');
			   $('tr[parentid='+id+']').hide();
		   }
	   });
   </script>

</body>
</html>