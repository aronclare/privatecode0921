<?php /*a:2:{s:73:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\index\welcome.html";i:1716971636;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1716971636;}*/ ?>
﻿<!DOCTYPE HTML>

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



<title>我的桌面</title>

</head>

<body>

	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 欢迎您！ <a class="btn btn-success radius r"
			style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i
				class="Hui-iconfont">&#xe68f;</i></a></nav>

	<div class="page-container">



		<div class="cl pd-5 bg-1 bk-gray mt-20">

			<p><b>· 系统版本：</b>Shop3.1--6.0.3</p>

			<p><b>· 图片上传：</b>请尽量上传小于250KB的图片，图片过大会影响网页的加载速度</p>

			<p><b>· 版权信息：</b>此系统为**原创开发，**保留所有版权，请勿用作其他商业用途。</p>

			<p><b>· 联系我们：</b> 微信/QQ：1930533604</p>

		</div>



	</div>


	<div class="index_card_box">

		<div class="item item1">
			<div class="card-header">商品总量</div>
			<div class="card-body">
				<div class="card-value"><?php echo htmlentities($count1); ?></div>
				<div class="card-description">当前商品总数量</div>
				<span class="card-icon Hui-iconfont">&#xe620;</span>
			</div>
		</div>
		<div class="item item2">
				<div class="card-header">用户总量</div>
				<div class="card-body">
					<div class="card-value"><?php echo htmlentities($count2); ?></div>
					<div class="card-description">当前用户总数量</div>
					<span class="card-icon Hui-iconfont">&#xe60d;</span>
				</div>
			</div>
			<div class="item item3">
					<div class="card-header">订单总量</div>
					<div class="card-body">
						<div class="card-value"><?php echo htmlentities($count3); ?></div>
						<div class="card-description">已付款订单总数量</div>
						<span class="card-icon Hui-iconfont">&#xe687;</span>
					</div>
				</div>
				<div class="item item4">
						<div class="card-header">评价总量</div>
						<div class="card-body">
							<div class="card-value"><?php echo htmlentities($count4); ?></div>
							<div class="card-description">订单评价总数量</div>
							<span class="card-icon Hui-iconfont">&#xe702;</span>
						</div>
					</div>

	</div>

	<style>
		.index_card_box {
			display: flex;
			padding: 20px;
			justify-content: space-between;
			color: #fff;
		}

		.index_card_box .item {
			width: 23.5%;
			padding: 15px;
			position: relative;
			box-sizing: border-box;
		}

		.index_card_box .item1 {
			background: linear-gradient(-125deg, #57bdbf, #2f9de2);
		}
		.index_card_box .item2 {
			background: linear-gradient(-125deg, #ff7d7d, #fb2c95);
		}
		.index_card_box .item3 {
			background: linear-gradient(-113deg, #c543d8, #925cc3);
		}
		.index_card_box .item4 {
			background: linear-gradient(-141deg, #ecca1b, #f39526);
		}

		.index_card_box .item .card-value {
			font-weight: 300;
			font-size: 46px;
			line-height: 46px;
			margin-bottom: 8px;
			margin-top: 8px;

		}

		.index_card_box .item .card-icon {
			position: absolute;
			right: 15px;
			font-size: 60px;
			top: 20px;
			font-weight: 300;
			opacity: .3;
		}
	</style>



</body>

</html>