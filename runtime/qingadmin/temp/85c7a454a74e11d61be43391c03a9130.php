<?php /*a:3:{s:70:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\user\index.html";i:1716971636;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1716971636;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\foot.html";i:1716971636;}*/ ?>
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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>会员列表 </nav>

<div class="page-container">



	<form acction="<?php echo url('user/index'); ?>" method="get">

		<div class="text-c">

			<input type="text" class="input-text" style="width:20%" placeholder="<?php echo htmlentities((isset($search_key) && ($search_key !== '')?$search_key:'输入手机号查询')); ?>" name="search_key">

			<button type="submit" class="btn btn-success radius"><i class="Hui-iconfont">&#xe665;</i>搜索</button>

		</div>

	</form>


	<div class="mt-20">

			<table class="table table-border table-bordered table-bg table-hover table-sort mt-20">

				<thead>

					<tr class="text-c">

						<th width="50">ID</th>

						<th width="250">用户名</th>

						<th width="250">手机号</th>	

						<th width="250">邮箱</th>	

						<th width="250">最近一次登录</th>

						<th width="250">状态</th>

						<th width="250">操作</th>


					</tr>

				</thead>

				<tbody>

					<?php if(is_array($userData) || $userData instanceof \think\Collection || $userData instanceof \think\Paginator): $i = 0; $__LIST__ = $userData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

					<tr class="text-c">

						<td><?php echo htmlentities($vo['id']); ?></td>

						<td><?php echo htmlentities($vo['username']); ?></td>

						<td><?php echo htmlentities($vo['mobile']); ?></td>

						<td><?php echo htmlentities($vo['email']); ?></td>

						<td><?php echo htmlentities(date("Y-m-d H:s",!is_numeric($vo['last_login_time'])? strtotime($vo['last_login_time']) : $vo['last_login_time'])); ?></td>
						<td>

							<?php if($vo['status'] == 1): ?>

							<a href="<?php echo url('base/status',array('id'=>$vo['id'],'status'=>-1,'dbname'=>'user')); ?>" style="text-decoration: none">

							<span class="label label-success radius">正常</span></a>

							<?php else: ?><a href="<?php echo url('base/status',array('id'=>$vo['id'],'status'=>1,'dbname'=>'user')); ?>" style="text-decoration: none"><span class="label label-danger radius">禁用</span><?php endif; ?></a>

						</td>

						<td>


							<a href="<?php echo url('user/edit',array('id'=>$vo['id'])); ?>" style="text-decoration: none">

								<span class="label label-success radius">编辑</span></a>

							<a href="<?php echo url('user/delete',array('id'=>$vo['id'])); ?>" style="text-decoration: none"><span class="label label-danger radius">删除</span></a>

						</td>

						

					</tr>

					<?php endforeach; endif; else: echo "" ;endif; ?>

					

				</tbody>

			</table>



			<?php echo $userData; ?>

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





