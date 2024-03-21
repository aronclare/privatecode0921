<?php /*a:5:{s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\user\collect.html";i:1711000728;s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\head.html";i:1711000728;s:70:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\user\left_menu.html";i:1711000728;s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\foot2.html";i:1711000728;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\rightnav.html";i:1711000728;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/shop.css"/>
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/user.css"/>
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/public/static/index/layui/css/layui.css">
    <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/public/static/index/js/layer-v3.1.1/layer.js"></script>
    <script src="/public/static/index/js/common.js"></script>
    <script src="/public/static/index/js/user.js"></script>
    <title>我的收藏</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

</head>
<body>


<link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_1646840_wwuv2y1aefe.css"/>
<div class="top">

    <div class="wrap top_box">

        <div class="top_left">
            <?php if($sessionUserData): ?>
            <a href="<?php echo url('index/user/index'); ?>"><?php echo htmlentities($sessionUserData['username']); ?></a>
            <?php else: ?>
            <a href="<?php echo url('index/user/login'); ?>">登录</a>
            <a href="<?php echo url('index/user/register'); ?>">注册</a>
            <?php endif; ?>
           
        </div>

        <div class="top_right">

            <a href="/index/">首页</a>

            <a href="<?php echo url('index/user/index'); ?>">会员中心</a>
            <a href="<?php echo url('index/user/notice'); ?>">通知消息</a>

            <a href="#">联系客服</a>

            <a href="<?php echo url('index/cart/index'); ?>" class="cart"><i class="icongouwuche iconfont"></i> 购物车( <?php echo htmlentities((isset($cartCount) && ($cartCount !== '')?$cartCount:'0')); ?> )</a>

        </div>

    </div>

</div>

<div class="header" >

    <div class="wrap header_box">

        <div class="logo"><a href="/"><img src="/public/static/index/images/shop_logo.jpg"></a></div>
        <div class="nav">
            <div class="item"><a href="/">首页</a></div>
            <div class="item"><a href="<?php echo url('index/lists/index',array('cate_id'=>18)); ?>">手机</a></div>
            <div class="item"><a href="<?php echo url('index/lists/index',array('cate_id'=>155)); ?>">电视</a></div>
            <div class="item"><a href="<?php echo url('index/lists/index',array('cate_id'=>1)); ?>">女装</a></div>
            <div class="item"><a href="<?php echo url('index/lists/index',array('cate_id'=>63)); ?>">精选上装</a></div>
        </div>

        <form class="search_box" method="post" action="<?php echo url('index/lists/search'); ?>">

            <input type="text" placeholder="输入搜索关键字" name="keywords" class="input" autocomplete="off">

            <button type="submit" class="btn"><i class="icontubiao1 iconfont"></i></button>

            <div class="search_key_box">
                <?php if(is_array($searchData) || $searchData instanceof \think\Collection || $searchData instanceof \think\Paginator): $i = 0; $__LIST__ = $searchData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo url('index/lists/search',array('keywords'=>$vo['name'])); ?>" class="item"><?php echo htmlentities($vo['name']); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </form>

    </div>

</div>



<div class="wrapbg">
<div class="wrap">

    <div class="user_position">
        当前位置：<a href="/shop/">首页</a> > <a href="<?php echo url('user/index'); ?>">会员中心</a> > 我的收藏
    </div>
    <div class="user_box">
        <div class="user_box_left">

    <div class="title">订单中心</div>
    <li <?php if($left_menu == 11): ?>class='current'<?php endif; ?>> · <a href="<?php echo url('index/user/myorder'); ?>">全部订单</a></li>
    <li <?php if($left_menu == 12): ?>class='current'<?php endif; ?>> · <a href="<?php echo url('index/user/myorder4'); ?>">待收货订单</a></li>
    <li <?php if($left_menu == 13): ?>class='current'<?php endif; ?>> · <a href="<?php echo url('index/user/myorder0'); ?>">待支付订单</a></li>


    <div class="title">个人中心</div>
    <li <?php if($left_menu == 21): ?>class='current'<?php endif; ?>> · <a href="/index/user/collect.html">我的收藏</a></li>
    <li <?php if($left_menu == 22): ?>class='current'<?php endif; ?>> · <a href="/index/user/address_list.html">收货地址</a></li>
    <li <?php if($left_menu == 23): ?>class='current'<?php endif; ?>> · <a href="/index/user/comment_list.html">我的评价</a></li>
    <li <?php if($left_menu == 24): ?>class='current'<?php endif; ?>> · <a href="/index/user/coupons.html">优惠券</a></li>
    <li <?php if($left_menu == 25): ?>class='current'<?php endif; ?>> · <a href="/index/user/fenyong.html">我的分佣</a></li>
    <li <?php if($left_menu == 26): ?>class='current'<?php endif; ?>> · <a href="/index/user/mytrace.html">我的足迹</a></li>
    <li> · <a href="/index/cart/index.html">我的购物车</a></li>

    <div class="title">积分管理</div>
    <li> · <a href="/index/user/myscore.html">我的积分</a></li>
    <li <?php if($left_menu == 32): ?>class='current'<?php endif; ?>> · <a href="/index/User/score_shop.html">积分商城</a></li>

    <div class="title">账户中心</div>
    <li  <?php if($left_menu == 41): ?>class='current'<?php endif; ?>> · <a href="/index/user/info.html" >个人资料</a></li>
    <li <?php if($left_menu == 42): ?>class='current'<?php endif; ?>> · <a href="/index/user/edit_password.html">修改密码</a></li>
    <li  <?php if($left_menu == 43): ?>class='current'<?php endif; ?>> · <a href="/index/user/notice.html">消息通知</a></li>
    <li  <?php if($left_menu == 44): ?>class='current'<?php endif; ?>> · <a href="/index/user/fapiao.html">发票申请</a></li>
    <li> · <a href="/index/user/login_out.html">安全退出</a></li>

</div>
        <div class="user_box_right">
            <div class="user_content_box">

                <div class="collect_box">
                    <?php if(is_array($collectData) || $collectData instanceof \think\Collection || $collectData instanceof \think\Paginator): $i = 0; $__LIST__ = $collectData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="item">
                        <div class="pic"><img src="<?php echo htmlentities($vo['goods_thumb']); ?>"></div>
                        <div class="title"><?php echo htmlentities($vo['goods_name']); ?></div>
                        <div class="price_box"><span class="price">￥<?php echo htmlentities($vo['goods_price']); ?></span><span class="market"><?php echo htmlentities($vo['market_price']); ?></span></div>
                        <div class="btn_box">
                            <a href="<?php echo url('index/user/delete_goods_collect'); ?>" class="color888 del">删除</a>
                            <a href="<?php echo url('index/goods/index',array('goods_id'=>$vo['goods_id'])); ?>" class="color1 detail">查看详情</a>
                        </div>
                        <input type="hidden" name="goods_id" value="<?php echo htmlentities($vo['goods_id']); ?>">
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <?php echo $collectData; ?>
                
            </div>
        </div>
    </div>

    
</div>
</div>




<div class="foot2">
    <div class="nav">
        <div class="item"><a href="#"><a href="/">企业官网</a></a></div>
        <div class="item">|</div>
        <div class="item"><a href="#"><a href="<?php echo url('index/index/page1'); ?>">企业简介</a></div>
        <div class="item">|</div>
        <div class="item"><a href="<?php echo url('index/index/brand'); ?>">品牌展厅</a></div>
        <div class="item">|</div>
        <div class="item"><a href="<?php echo url('index/index/page2'); ?>">企业文化</a></div>
        <div class="item">|</div>
        <div class="item"><a href="<?php echo url('index/index/page3'); ?>">企业使命</a></div>
        <div class="item">|</div>
        <div class="item"><a href="#">联系我们</a></div>
        <div class="item">|</div>
        <div class="item"><a href="<?php echo url('shop/index/news'); ?>">新闻中心</a></div>
        <div class="item">|</div>
        <div class="item"><a href="#">我们的映像</a></div>
    </div>
    <div class="copyright"><?php echo htmlentities($beian); ?>　<?php echo htmlentities($copyright); ?></div>
</div>

<div class="right_nav">
    <div class="item">
        <a class="box" href="<?php echo url('index/cart/index'); ?>">
            <div class="icon"><i class="iconfont icongouwuche"></i></div>
            <div class="title">购物车</div>
        </a>
    </div>
    <div class="item">
        <a class="box"  href="<?php echo url('index/user/index'); ?>">
            <div class="icon"><i class="iconfont iconwo"></i></div>
            <div class="title">个人中心</div>
        </a>
    </div>
    <div class="item">
        <a class="box"  href="<?php echo url('index/user/collect'); ?>">
            <div class="icon"><i class="iconfont iconshoucang"></i></div>
            <div class="title">我的收藏</div>
        </a>
    </div>
    <div class="item">
        <a class="box">
            <div class="icon"><i class="iconfont iconkefu"></i></div>
            <div class="title">人工客服</div>
        </a>
    </div>
</div>
<div class="goup">
    <div class="icon"><i class="icondingbu iconfont"></i></div>
</div>
<script>
    $(function() { 

        $(window).scroll(function() { 

            if ($(window).scrollTop() > 700) $('div.goup').show(); 

            else

            $('div.goup').hide();

        }); 

            $('div.goup').click(function() { $('html, body').animate({scrollTop: 0}, 1000);

        });

    });


</script>


</body>
</html>

