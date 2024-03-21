<?php /*a:4:{s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\index\index.html";i:1711000728;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1711000728;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\left.html";i:1711000728;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\foot.html";i:1711000728;}*/ ?>
﻿

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



<header class="navbar-wrapper">

	<div class="navbar navbar-fixed-top">

		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/qingadmin">后台管理系统</a>
			

		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">

			<ul class="cl">

				<li><a href="/" target="_blank">网站首页</a></li>

				<li><?php echo htmlentities($loginUser); ?></li>

				<li><a href="<?php echo url('index/logout'); ?>">退出</a></li>

			</li>



				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>

					<ul class="dropDown-menu menu radius box-shadow">

						<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>

						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>

						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>

						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>

						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>

						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>

					</ul>

				</li>

			</ul>

		</nav>

	</div>

</div>

</header>

<!-- 图标http://lib.h-ui.net/Hui-iconfont/1.0.7/demo.html -->
<aside class="Hui-aside">

	<div class="menu_dropdown bk_2">


		<dl id="menu-article">

			<dt><i class="Hui-iconfont">&#xe620;</i> 商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					<li><a data-href="<?php echo url('category/index'); ?>" data-title="栏目管理" href="javascript:void(0)">栏目管理</a>
					</li>
					<li><a data-href="<?php echo url('type/index'); ?>" data-title="商品类型" href="javascript:void(0)">商品类型</a></li>
					<li><a data-href="<?php echo url('goods/goodslist'); ?>" data-title="商品管理" href="javascript:void(0)">商品管理</a>
					</li>
				</ul>

			</dd>

		</dl>



		<dl id="menu-article">

			<dt><i class="Hui-iconfont">&#xe681;</i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					<li><a data-href="<?php echo url('order/index'); ?>" data-title="订单列表" href="javascript:void(0)">订单列表</a></li>

				</ul>

			</dd>

		</dl>



		<dl id="menu-article">

			<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					<li><a data-href="<?php echo url('user/index'); ?>" data-title="会员列表" href="javascript:void(0)">会员列表</a></li>
					<li><a data-href="<?php echo url('merchant/index'); ?>" data-title="商户列表" href="javascript:void(0)">商户列表</a></li>
					<li><a data-href="<?php echo url('merchant/car_index'); ?>" data-title="汽车列表" href="javascript:void(0)">汽车列表</a></li>
					<li><a data-href="<?php echo url('comment/index'); ?>" data-title="评论管理" href="javascript:void(0)">评论管理</a></li>

				</ul>

			</dd>

		</dl>


		<dl id="menu-picture">

			<dt><i class="Hui-iconfont">&#xe613;</i> 广告管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					<li><a data-href="<?php echo url('ad/index'); ?>" data-title="广告管理" href="javascript:void(0)">广告管理</a></li>

					<li><a data-href="<?php echo url('ad/ad_type'); ?>" data-title="广告分组" href="javascript:void(0)">广告分组</a></li>

				</ul>

			</dd>

		</dl>



		<dl id="menu-article">

			<dt><i class="Hui-iconfont">&#xe6b5;</i> 积分商城<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					<li><a data-href="<?php echo url('scoreGoods/index'); ?>" data-title="积分商城" href="javascript:void(0)">积分商城</a>
					</li>
					<li><a data-href="<?php echo url('scoreOrder/index'); ?>" data-title="积分订单" href="javascript:void(0)">积分订单</a>
					</li>
				</ul>

			</dd>

		</dl>

		<dl id="menu-article">

			<dt><i class="Hui-iconfont">&#xe616;</i> 内容管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					<li><a data-href="<?php echo url('page/index'); ?>" data-title="单页面管理" href="javascript:void(0)">单页面管理</a></li>
					<li><a data-href="<?php echo url('news/index'); ?>" data-title="新闻管理" href="javascript:void(0)">新闻管理</a></li>
					
					<li><a data-href="<?php echo url('message/index'); ?>" data-title="意见反馈" href="javascript:void(0)">意见反馈</a></li>

				</ul>

			</dd>

		</dl>


		<dl id="menu-article">

			<dt><i class="Hui-iconfont">&#xe6b6;</i> 营销管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					<li><a data-href="<?php echo url('coupons/index'); ?>" data-title="优惠券" href="javascript:void(0)">优惠券</a>
					</li>
					<li><a data-href="<?php echo url('fenyong/index'); ?>" data-title="分佣管理" href="javascript:void(0)">分佣管理</a>
					</li>

				</ul>

			</dd>

		</dl>

		<dl id="menu-article">

			<dt><i class="Hui-iconfont">&#xe61e;</i> 数据统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					<li><a data-href="<?php echo url('number/index'); ?>" data-title="订单统计" href="javascript:void(0)">订单统计</a></li>
				</ul>

			</dd>

		</dl>



		<dl id="menu-admin">

			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					
					<li><a data-href="<?php echo url('AuthGroup/index'); ?>" data-title="用户组管理" href="javascript:void(0)">用户组管理</a>
					</li>

					<li><a data-href="<?php echo url('Authrule/index'); ?>" data-title="权限管理" href="javascript:void(0)">权限管理</a>
					</li>

					<li><a data-href="<?php echo url('admin/index'); ?>" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>

				</ul>

			</dd>

		</dl>



		<dl id="menu-system">

			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

			<dd>

				<ul>

					<li><a data-href="<?php echo url('config/index'); ?>" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
					<li><a data-href="<?php echo url('search/index'); ?>" data-title="搜索关键词" href="javascript:void(0)">搜索关键词</a>
					</li>
					<li><a data-href="<?php echo url('config/notice'); ?>" data-title="通知消息" href="javascript:void(0)">通知消息</a></li>
					<li><a data-href="<?php echo url('fapiao/index'); ?>" data-title="发票管理" href="javascript:void(0)">发票管理</a></li>
					<li><a data-href="<?php echo url('flink/index'); ?>" data-title="友情链接" href="javascript:void(0)">友情链接</a></li>
					<li><a data-href="<?php echo url('config/del_cache'); ?>" data-title="清空缓存" href="javascript:void(0)">清空缓存</a>
					</li>



				</ul>

			</dd>

		</dl>

	</div>

</aside>



<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>

<section class="Hui-article-box">

	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">

		<div class="Hui-tabNav-wp">

			<ul id="min_title_list" class="acrossTab cl">

				<li class="active">

					<span title="我的桌面" data-href="welcome.html">我的桌面</span>

					<em></em></li>

		</ul>

	</div>

		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>

</div>

	<div id="iframe_box" class="Hui-article">

		<div class="show_iframe">

			<div style="display:none" class="loading"></div>

			<iframe scrolling="yes" frameborder="0" src="<?php echo url('index/welcome'); ?>"></iframe>
			

	</div>

</div>

</section>






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