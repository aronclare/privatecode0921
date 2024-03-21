<?php /*a:4:{s:65:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\order\buy.html";i:1711000728;s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\head.html";i:1711000728;s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\foot2.html";i:1711000728;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\rightnav.html";i:1711000728;}*/ ?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>

    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/shop.css"/>

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/pay.css"/>

    <link rel="stylesheet" href="/public/static/index/layui/css/layui.css">

    <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>

    <script src="/public/static/index/js/pay.js"></script>

    <script src="/public/static/index/layui/layui.js"></script>

    <script src="/public/static/index/js/common.js"></script>

    <title>北京小米科技有限公司</title>

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



    <form class="pay_box">

        <div class="title_box">

            核对订单信息

        </div>

        <div class="info_box">

            <div class="address">

                <div class="pay_public_title"><b>收货人信息</b> <a href="/index/user/address_list.html" style="color: #6084a5;">[收货人管理]</a></div>

                <?php if($addressDefaultData): ?>
                <div class="item">

                    <input type="radio" name="address_id" checked value="<?php echo htmlentities($addressDefaultData['id']); ?>">

                    <span class="color1">收货人：<?php echo htmlentities($addressDefaultData['shou_name']); ?> 电话：<?php echo htmlentities($addressDefaultData['shou_mobile']); ?>  收货地址：<?php echo htmlentities($addressDefaultData['province']); ?>  <?php echo htmlentities($addressDefaultData['city']); ?>  <?php echo htmlentities($addressDefaultData['district']); ?> <?php echo htmlentities($addressDefaultData['shou_address']); ?></span>

                </div>
                <?php endif; if(is_array($addressData) || $addressData instanceof \think\Collection || $addressData instanceof \think\Paginator): $i = 0; $__LIST__ = $addressData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="item">

                    <input type="radio" name="address_id" value="1">

                    <span>收货人：<?php echo htmlentities($vo['shou_name']); ?> 电话：<?php echo htmlentities($vo['shou_mobile']); ?>  收货地址：<?php echo htmlentities($vo['province']); ?>  <?php echo htmlentities($vo['city']); ?>  <?php echo htmlentities($vo['district']); ?> <?php echo htmlentities($vo['shou_address']); ?></span>

                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                
                
            </div>

            <div class="pay_method">

                <div class="pay_public_title"><b>支付方式</b></div>

                <div class="current_method item">

                    <img src="/public/static/index/images/weixinpay.jpg">

                    <input type="radio" name="pay"  value="1"  style="display: none;">

                </div>
                <div class=" item">

                    <img src="/public/static/index/images/zhifubao.jpg">

                    <input type="radio" name="pay"  value="2" checked style="display: none;">

                </div>

            </div>

            <div class="pay_public_title"><b>商品清单</b></div>

            <div class="goods">

                <div class="goods_box">

                    <div class="xiang_title item">

                        <div class="name1">商品</div>

                        <div class="name3">规格</div>

                        <div class="name3">价格</div>

                        <div class="name3">数量</div>
                        <div class="name3">邮费</div>

                        <div class="name3">小计</div>

                    </div>
                
                   
                    <div class="goods_item item" >

                        <div class="name1 name11">

                            <a class="goods_style1" href="<?php echo url('index/goods/index',array('goods_id'=>$goodsData['goods_id'])); ?>">

                                <div class="pic"><img src="<?php echo htmlentities($goodsData['goods_thumb']); ?>"></div>

                                <div class="info"><?php echo htmlentities($goodsData['goods_name']); ?></div>

                            </a>

                        </div>

                        <div class="name3"><?php echo htmlentities((isset($goodsData['skustr']) && ($goodsData['skustr'] !== '')?$goodsData['skustr']:'标准规格')); ?><input type="hidden" name="sku" value="<?php echo htmlentities($goodsData['sku']); ?>"></div>

                        <div class="name3">￥<span class="price"><?php echo htmlentities($goodsData['goods_price']); ?></span></div>

                        <div class="name3 amount"><input type="number" value="<?php echo htmlentities($goodsData['amount']); ?>" name="amount" oninput="if(value < 1 ){alert('数量最小为1！');value = '1'}"/></div>

                        <div class="name3">
                          ￥<span class="post_money"><?php echo htmlentities($goodsData['post_money']); ?></span>
                        </div>

                        <div class="name3">￥<span class="xiaoji"></span></div>
                        <input type="hidden" name="goods_id" value="<?php echo htmlentities($goodsData['goods_id']); ?>">

                    </div>
                
                 
                    
                </div>

            </div>

            <div class="order_content">
                <div class="pay_public_title"><b>订单备注</b></div>
                <textarea class="order_content_textarea" name="content" placeholder="备注信息"></textarea>
            </div>


        </div>

        <div class="total_box">

            <div class="total">

                应付金额：<span class="color1">￥</span><span class="color1 price"></span>

            </div>

            <div class="pay_button">结算</div>

        </div>

    </form>





    <div class="foot2_line"></div>

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



<script>



    $(function(){

        $(".pay_method .item").click(function(){

            $(this).toggleClass("current_method");

            $(this).siblings().removeClass("current_method");
        });

        //结算
        $(".pay_button").click(function(){

            var address_id=$('input[name="address_id"]:checked').val();
            //如果没有地址信息，不能提交订单
            if($('.address .item').length==0){
                layui.use('layer', function(){
                    layer.alert('请填写地址信息'); 
                });
                return false;
            }

            var pay_method=$('.current_method input').val();
            var content=$("textarea[name='content']").val();
            var goods_id=$("input[name='goods_id']").val();
            var amount=$("input[name='amount']").val();
            var sku=$("input[name='sku']").val();
            

            // 执行AJAX更新到服务器
            url ="/index/order/order_create2";
            postData = {'address_id':address_id,'pay_method':pay_method,'content':content,'goods_id':goods_id,'amount':amount,'sku':sku};

            $.post(url,postData,function(result){

                    //如果没有地址信息，不能提交订单
                    if(result.status==0){
                        layui.use('layer', function(){
                            layer.alert(result.msg); 
                        });
                    }
                    if(result.status==-1){

                        layui.use('layer', function(){
                            layer.alert(result.msg, function(index){
                            location.href="/";
                            }); 
                        });
                    }

                    //请登录
                    if(result.status==-2){

                        layui.use('layer', function(){
                            layer.alert(result.msg, function(index){
                            location.href="/index/user/login";
                            }); 
                        });
                    }
                    
                    if(result.status==2){

                        layui.use('layer', function(){
                            layer.alert(result.msg, function(index){
                            location.href="/index/Alipay/index?out_trade_no="+result.out_trade_no;
                            }); 
                        });
                    }

                    if(result.status==1){

                        layui.use('layer', function(){
                            layer.alert(result.msg, function(index){
                            location.href="/index/Weixinpay/index?out_trade_no="+result.out_trade_no;
                            }); 
                        });
                    }

            }, 'json');

        });
   

    });



</script>



</body>

</html>



