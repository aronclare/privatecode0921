<?php /*a:4:{s:62:"D:\phpstudy_pro\WWW\code0921\app\index\view\user\register.html";i:1707738454;s:60:"D:\phpstudy_pro\WWW\code0921\app\index\view\public\head.html";i:1707738454;s:61:"D:\phpstudy_pro\WWW\code0921\app\index\view\public\foot2.html";i:1707738454;s:64:"D:\phpstudy_pro\WWW\code0921\app\index\view\public\rightnav.html";i:1707738454;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/user.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css" />
    <link rel="stylesheet" href="/public/static/index/css/shop.css">
    <link rel="stylesheet" type="text/css" href="http://at.alicdn.com/t/font_1646840_ygalgtt63r.css"/>
    <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>

    <title>会员注册</title>
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



    <div class="loginbg">
        <div class="login_box">

            <div class="user_entrence_box">
                <div class="title_box">
                    <div class="item "><a href="<?php echo url('index/user/login'); ?>">会员登录</a></div>
                    <div class="item current">会员注册</div>
                </div>
                <form class="info_box" method="post">
                    <div class="item">
                        <div class="icon"><i class="iconfont iconwo"></i></div>
                        <div class="input_box"><input type="number" required name="mobile" placeholder="手机号码"
                                class="input J_mobile"></div>
                    </div>
                    <div class="item">
                        <div class="icon"><i class="iconyanzhengma2 iconfont"></i></div>
                        <div class="input_box"><input type="number" required name="smscode" placeholder="验证码"
                                class="input"></div>
                        <div class="send_code"><input id="btnSendCode" required type="button" value="发送验证码"
                                onclick="sendMessage()" style="background: none;border: none; color: #fff;" /></div>
                    </div>
                    <div class="item">
                        <div class="icon"><i class="iconfont iconmima"></i></div>
                        <div class="input_box"><input type="password" minlength="6" maxlength="25" required placeholder="密码长度大于6位"
                                name="password" class="input" oninvalid="setCustomValidity('密码长度大于6位');"
                                oninput="setCustomValidity('');"></div>
                    </div>

                    <button class="btn">注册</button>
                </form>
            </div>

        </div>
    </div>
    <script src="/public/static/index/layui/layui.js"></script>
    <script src="/public/static/index/js/sendsms.js"></script>



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