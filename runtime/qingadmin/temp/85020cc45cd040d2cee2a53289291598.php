<?php /*a:3:{s:68:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\goods\goodslist.html";i:1597826701;s:64:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\public\head.html";i:1591089971;s:64:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\public\foot.html";i:1591183190;}*/ ?>
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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>商品列表 </nav>

<div class="page-container">



	<div class="mt-20">

	    <form action="<?php echo url('goods/goodslist'); ?>" method="GET">

	    	<div class="formControls col-xs-8 col-sm-2"> 

	    		<span class="select-box">

					<select class="select" id="goods_cate_id" name="goods_cate_id">

						<option value="">选择分类</option>

						<?php if(is_array($cate_list1) || $cate_list1 instanceof \think\Collection || $cate_list1 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate_list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

							<option value="<?php echo htmlentities($vo['id']); ?>"

				            <?php if($vo['id'] == $cate_id): ?>

							selected="" 

							<?php endif; ?>

							><?php echo str_repeat('-', 5*$vo['cate_level']); ?><?php echo htmlentities($vo['cate_name']); ?></option>

						<?php endforeach; endif; else: echo "" ;endif; ?>

					</select>

				</span>

			</div>


			<div class="formControls col-xs-8 col-sm-2"> 

	    		<span class="select-box">

					<select class="select"  name="goods_status">

						<option value="1" <?php if($goods_status == 1): ?>selected="selected"<?php endif; ?>>上架商品</option>

						<option value="-1" <?php if($goods_status == -1): ?>selected="selected"<?php endif; ?>>下架商品</option>

					</select>

				</span>

			</div>		
			
		

			

			<div class="formControls col-xs-8 col-sm-3">

				<input type="text" value="" name="goods_name" class="input-text col-sm-3" placeholder="<?php echo htmlentities((isset($search_key) && ($search_key !== '')?$search_key:'请输入商品名称或关键字')); ?>">

			</div>	

			<button class="btn btn-success" type="submit"><i class="Hui-iconfont"></i> 搜索</button>

		</form>

		<div class="cl pd-5 bg-1 bk-gray mt-20"> 
			<span class="l"> <a class="btn btn-primary radius"  href="<?php echo url('goods/add'); ?>"><i class="Hui-iconfont">&#xe600;</i> 添加</a></span> 
			<span class="r tishi" style="margin-top: 8px;">注意：商品删除后可在回收站恢复</span> 
		</div>

			<table class="table table-border table-bordered table-bg table-hover table-sort mt-20">

				<thead>

					<tr class="text-c">

						<th width="40">ID</th>

						<th width="250">名称</th>

						<th width="110">缩略图</th>

						<th width="70">价钱</th>
						<th width="70">所属分类</th>
						<th width="50">排序序号<br><span class="tishi" style="font-weight: normal;">数字越小越靠前</span></th>

						<th width="40">更新时间</th>

						<th width="50">商品状态</th>

						<th width="50">操作</th>

					</tr>

				</thead>

				<tbody>

					<?php if(is_array($goodsData) || $goodsData instanceof \think\Collection || $goodsData instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

					<tr class="text-c">

						<td><?php echo htmlentities($vo['goods_id']); ?></td>

						<td><?php echo str_replace($search_key,"<span style='color:#f00'>".$search_key."</span>",$vo['goods_name']);?></td>

						<td><a href="<?php echo url('index/goods/index',array('goods_id'=>$vo['goods_id'])); ?>" target="_blank"><img src="<?php echo htmlentities($vo['goods_thumb']); ?>" width="100"></a></td>

						<td><?php echo htmlentities($vo['goods_price']); ?></td>
						<td><?php echo htmlentities($vo['cate_name']); ?></td>
						<td class="text-c goods_listorder">
							<input size="10" attr-id="<?php echo htmlentities($vo['goods_id']); ?>"  name="listorder"  value="<?php echo htmlentities($vo['listorder']); ?>"/>
						</td>

						<td><?php echo htmlentities(date("Y-m-d H:i",!is_numeric($vo['time'])? strtotime($vo['time']) : $vo['time'])); ?></td>

						<td class="td-status status">
							<a href="<?php echo url('goods/status',array('goods_id'=>$vo['goods_id'],)); ?>" style="text-decoration: none"><?php if($vo['goods_status'] == 1): ?><span class='label label-success radius'>已上架</span><?php else: ?><span class='label label-danger radius'>已下架</span><?php endif; ?></a>
						</td>

						<td class="td-manage">
							<?php if($goods_status == 1): ?>
							<a style="text-decoration:none" class="ml-5" href="<?php echo url('goods/edit',array('goods_id'=>$vo['goods_id'])); ?>" title="修改"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a style="text-decoration:none" class="ml-5" onclick="delete_confirm('<?php echo url('goods/status',array('goods_id'=>$vo['goods_id'])); ?>')" href="javascript:;" title="放入回收站"><i class="Hui-iconfont">&#xe6e2;</i></a>
							<?php else: ?>
							<a style="text-decoration:none" class="ml-5" onclick="delete_confirm('<?php echo url('goods/status',array('goods_id'=>$vo['goods_id'])); ?>')" href="javascript:;" title="恢复"><i class="Hui-iconfont">&#xe66b;</i></a>
							<?php endif; ?>
						</td>

					</tr>

					<?php endforeach; endif; else: echo "" ;endif; ?>

					

				</tbody>

			</table>

			<?php echo $goodsData; ?>

		

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





