<?php /*a:4:{s:66:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\cart\index.html";i:1711000728;s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\head.html";i:1711000728;s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\foot2.html";i:1711000728;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\rightnav.html";i:1711000728;}*/ ?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>

    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/shop.css"/>

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/cart.css"/>

    <link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css" />

    <link rel="stylesheet" type="text/css" href="http://at.alicdn.com/t/font_1907378_h1th65cwy9j.css"/>

    <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>

    <script src="/public/static/index/layui/layui.js"></script>

    <script src="/public/static/index/js/cart.js"></script>

    <script src="/public/static/index/js/common.js"></script>

    <title>购物车</title>

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



<div class="header_line"></div>

<div class="wrap">

    <div class="public_ad"><a href="#"><img src="/public/static/index/images/ad.jpg"></a></div>

    <div class="cart_title">

       <img src="/public/static/index/images/cart.jpg">

    </div>

    <div class="gouwuche">

        <table class="cart_table" cellpadding="0" cellspacing="0">



            <tbody>

                <tr>



                    <td width="12%" class="text_left select_all">

                        <div class="public_checkbox display_block"><input type="checkbox" name="check"></div>

                    </td>

                    <td width="20%">商品名称</td>

                    <td width="20%">商品属性</td>

                    <td width="10%">单价</td>

                    <td width="10%">数量</td>

                    <td width="15%">金额</td>

                    <td width="10%">操作</td>

                </tr>
                
                <?php if(is_array($cartData) || $cartData instanceof \think\Collection || $cartData instanceof \think\Paginator): $i = 0; $__LIST__ = $cartData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr attr-id="<?php echo htmlentities($vo['id']); ?>">

                        <td width="5%" class="text_left">

                            <div class="public_checkbox display_block"><input type="checkbox" name="check" <?php if($vo['status'] == 1): ?>checked<?php endif; ?> class="gouwuche_check"></div>

                        </td>

                    <td width="25%">

                        <a class="goods_style1" href="<?php echo url('index/goods/index',array('goods_id'=>$vo['goods_id'])); ?>">

                            <div class="cart_pic"><img src="<?php echo htmlentities($vo['goods_thumb']); ?>"></div>

                            <div class="info"><?php echo htmlentities($vo['goods_name']); ?></div>

                        </a>

                    </td>

                    <td width="15%"><?php echo htmlentities((isset($vo['sku']) && ($vo['sku'] !== '')?$vo['sku']:'标准规格')); ?> </td>

                    <td width="10%">￥<span class="goods_price"><?php echo htmlentities($vo['goods_price']); ?></span></td>

                    <td width="10%">×<input type="number" class="borderddd number" value="<?php echo htmlentities($vo['amount']); ?>" min="1" oninput="if(value < 1 ){alert('数量最小为1！');value = '1'}"></td>

                    <td width="10%" class="fb f16 price_xiaoji"></td>

                    <td width="10%">

                        <a class="colorblue mar_t_5 display_block gouwuche_delete"><i class="iconfont iconlajitong"></i></a>

                    </td>

                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
             
    

            </tbody>

        </table>

        <div class="pay_box">

            <div class="pay_box_left">

                <div class="delete_all display_block">清空</div>

            </div>

            <div class="pay_box_right">

                    已选购商品 <span class="color1 fb check_number">3</span> 件&nbsp;&nbsp;

                    合计 <span class="color1 fb total_price"><?php echo htmlentities($total_price); ?></span>

                    <a class="btn_pay f16" href="/index/order/index">结算</a>

            </div>

        </div>

    </div>

    

</div>



<div class="foot_line"></div>

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



