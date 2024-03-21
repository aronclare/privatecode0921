<?php /*a:5:{s:65:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\user\info.html";i:1711000728;s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\head.html";i:1711000728;s:70:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\user\left_menu.html";i:1711000728;s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\foot2.html";i:1711000728;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\rightnav.html";i:1711000728;}*/ ?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />

    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/shop.css" />

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/user.css" />

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/font-awesome.min.css" />

    <link rel="stylesheet" href="/public/static/index/layui/css/layui.css">

    <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>

    <script src="/public/static/index/layui/layui.js"></script>

    <script src="/public/static/index/js/common.js"></script>

    <title><?php echo htmlentities($web_title); ?></title>

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

        <div class="wrap ">



            <div class="user_position">

                当前位置：<a href="/">首页</a> > <a href="<?php echo url('user/index'); ?>">会员中心</a> > 个人资料

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


                    <!-- <div class="xingyun_info">您是本网站第<span class="color1">563</span>位付款幸运客户。截至到现在为止本网站总营销额<span
                            class="color1">51063</span>元，感谢您对我们的支持。</div> -->

                    <form class="index_info_form" method="post" action="<?php echo url('user/index_update'); ?>">

                        <div class="left_content">

                                <div class="face"><img src="<?php echo htmlentities((isset($userData['face']) && ($userData['face'] !== '')?$userData['face']:'/public/static/index/images/face.jpg')); ?>" class="img"></div>

                                <div class="input_box">

                                    <button type="button" class="layui-btn" id="test1">

                                        <i class="layui-icon">&#xe67c;</i>更改头像

                                    </button>

                                    <div class="public_thumb_box" <?php if($userData['face']): ?>style="display:flex" <?php endif; ?> attr-model="user">

                                        <input type="hidden" name="face" value="<?php echo htmlentities($userData['face']); ?>"
                                            class="public_thumb_input layui-input" style="width: 500px">
                                      
                                    </div>

                                </div>

                        </div>

                        <div class="right_content">
                            <div class="item">

                                <div class="label">昵称：</div>

                                <div class="input_box username"><input type="text" name="username" value="<?php echo htmlentities($userData['username']); ?>"
                                        class="layui-input "><i class="iconfont iconduihao"></i><i class="iconfont iconcuo" style="display: none;"></i><span class="tishi">昵称全网唯一</span></div>

                            </div>
                           

                            <div class="item">

                                <div class="label">电话：</div>

                                <div class="input_box"><input type="text" name="mobile" value="<?php echo htmlentities($userData['mobile']); ?>"
                                        class="layui-input"></div>

                            </div>

                            <div class="item">

                                <div class="label">邮箱：</div>

                                <div class="input_box"><input type="email" name="email" value="<?php echo htmlentities($userData['email']); ?>"
                                        class="layui-input"></div>

                            </div>

                            <div class="item">

                                <div class="label">星座：</div>

                                <div class="input_box"><input type="text" <?php if($userData['xingzuo']): ?>disabled="disabled" <?php endif; ?> name="xingzuo" value="<?php echo htmlentities($userData['xingzuo']); ?>"
                                        class="layui-input"></div>

                            </div>

                            

                           
                            <div class="item">

                                <div class="label"></div>

                                <div class="input_box"><button class="button">提交保存</button></div>

                            </div>
                        </div>



                    </form>

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

    <script>

    //实时监测用户名唯一性
    $('.username input').blur(function(){
        var username=$('.username input').val();
        if(username.length<1){
            layer.msg('请填写用户名信息！');
            $('.username input').focus();
            return false;
        }
        var postData = {
            'username' : username,
            'id':<?php echo htmlentities($userData['id']); ?>
        };
        var url ='checkUsername';
        $.post(url, postData, function(result){
        if(result.code == 1) {
            $(".iconcuo").css('display','block');
            $(".iconduihao").css('display','none');
            $(".tishi").html("<span style=' color: #ff6709;'>昵称已经被占用！请更换昵称！</span>");
            $(".button").attr('disabled','true');
        }else {
            $(".iconduihao").css('display','block');
            $(".tishi").text('昵称可用！');
            $(".button").attr('disabled','false');
            $(".iconcuo").css('display','none');
            $(".button").removeAttr('disabled');
        }
    },"json");
    });


        layui.use('upload', function () {

            var upload = layui.upload;



            //执行上传实例

            var uploadInst = upload.render({

                elem: '#test1' //绑定元素

                , url: 'upload' //上传接口

                , field: 'file'

                , done: function (res) {

                    //上传完毕回调

                    console.log(res);

                    //path = JSON.stringify(res.path);

                    //path = path.replace("\"", "").replace("\"", "");

                    $(".public_thumb_input").val(res.path);

                    $(".face .img").attr("src", res.path);

                    $(".public_thumb_box").css("display", "flex");

                }

                , error: function () {

                    //请求异常回调

                }

            });

        });



    </script>







</body>

</html>