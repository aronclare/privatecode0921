<?php /*a:3:{s:64:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\order\index.html";i:1600159732;s:64:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\public\head.html";i:1591089971;s:64:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\public\foot.html";i:1591183190;}*/ ?>
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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 订单列表 </nav>

<div class="page-container">

	<form acction="" method="get" class="mt-20">


		<div class="text-c"> 日期范围：

			<input type="text" onfocus="WdatePicker()" id="datemin" class="input-text Wdate" name="start_time" style="width:120px;" placeholder="<?php echo htmlentities((isset($start_time) && ($start_time !== '')?$start_time:'开始时间')); ?>">

			<input type="text" onfocus="WdatePicker()" id="datemax" class="input-text Wdate" name="end_time"style="width:120px;" placeholder="<?php echo htmlentities((isset($end_time) && ($end_time !== '')?$end_time:'结束时间')); ?>">

			<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜订单</button>


		</div>


	</form>
	<div class="mt-20">
			
			<table class="table table-border table-bordered table-bg table-hover table-sort mt-20">

				<thead>
					<tr>
						<th width='30%'>订单号</th>
						<th width='15%'>订单总价</th>
						<th width='20%'>下单时间</th>
						<th width='15%'>支付方式</th>
						<th width='10%'>状态</th>
						<th width='10%'>操作</th>
					</tr>
				</thead>

				<tbody>
					<?php if(is_array($orderData1) || $orderData1 instanceof \think\Collection || $orderData1 instanceof \think\Paginator): $i = 0; $__LIST__ = $orderData1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<tr>
						<td><?php echo htmlentities($vo['out_trade_no']); ?></td>
						<td><?php echo htmlentities($vo['total_price']); ?></td>
						<td><?php echo htmlentities(date("Y-m-d",!is_numeric($vo['time'])? strtotime($vo['time']) : $vo['time'])); ?></td>
						<td><?php if($vo['pay_method'] == 1): ?>微信支付<?php else: ?>支付宝<?php endif; ?></td>

						<td>
							<?php switch($vo['status']): case "1": ?>已支付<?php break; case "2": ?>已完成<?php break; case "4": ?>已发货未签收<?php break; default: ?><span style="color: #f00;">待付款</span>
						<?php endswitch; ?>
						</td>
						<td>
							<a style="text-decoration:none" class="ml-5" href="<?php echo url('order/edit',array('id'=>$vo['id'])); ?>" title="修改"><i class="Hui-iconfont">&#xe6df;</i></a>
						</td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>

			</table>
			

			<?php echo $page; ?>
	
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





