<?php /*a:4:{s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\lists\index.html";i:1716971636;s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\head.html";i:1716971636;s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\foot2.html";i:1716971636;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\rightnav.html";i:1716971636;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/shop.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="http:////at.alicdn.com/t/font_1907378_h1th65cwy9j.css" />

    <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>
    <script src="/public/static/index/js/common.js"></script>
    <title>列表页</title>
    <meta name="keywords" content="列表页">
    <meta name="description" content="列表页">

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
        <div class="position">
            <a href="/">首页</a> &gt;
            <?php if(is_array($positionData) || $positionData instanceof \think\Collection || $positionData instanceof \think\Paginator): $i = 0; $__LIST__ = $positionData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="/index/lists/index.html?cate_id=<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['cate_name']); ?> &gt; </a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="filter">

            <?php if($cateChildrenData): ?>
            <div class="item">
                <div class="filter_name">分类</div>
                <div class="value_box">
                    
                    <?php if(is_array($cateChildrenData) || $cateChildrenData instanceof \think\Collection || $cateChildrenData instanceof \think\Paginator): $i = 0; $__LIST__ = $cateChildrenData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>      
                    <div class="value"><a href="/index/lists/index?cate_id=<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['cate_name']); ?></a></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                
                </div>
            </div>
            <?php endif; if($standardData): if(is_array($standardData) || $standardData instanceof \think\Collection || $standardData instanceof \think\Paginator): $k = 0; $__LIST__ = $standardData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
           
            <div class="item">
                <div class="filter_name"><?php echo htmlentities($key); ?></div>
                <div class="value_box">
                        <?php 
                            $arr=$bb=explode(',',$filter);
                            //volist循环是从1开始的，数组是从0开始的
                            $arr[(int)$k-1]=0;
                            
                            $str=implode(',',$arr);
                         ?>

                    <div class="value"><a href="/index/lists/index?cate_id=<?php echo htmlentities($cate_id); ?>&filter=<?php echo htmlentities($str); ?>"
                            class="<?php  if(isset($bb[(int)$k-1]) && $bb[(int)$k-1]==0){echo 'color1';}  ?>">全部</a></div>
                    <?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;
                            $arr=$b=explode(',',$filter);
                            //volist循环是从1开始的，数组是从0开始的
                            $arr[(int)$k-1]=$vo1['id'];
                            
                            $str=implode(',',$arr);
                         ?>

                    <div class="value"><a href="/index/lists/index?cate_id=<?php echo htmlentities($cate_id); ?>&filter=<?php echo htmlentities($str); ?>" class="<?php  if(isset($b[(int)$k-1]) && $b[(int)$k-1]==$vo1['id']){echo 'color1';}  ?>"
                            ><?php echo htmlentities($vo1['standard_value']); ?></a></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <?php endif; ?>

        </div>
        <div class="order_box">
            <div class="order2 <?php if($order == 1): ?>current<?php endif; ?>"><a href="<?php echo url('index/lists/index',array('cate_id'=>$cate_id,'filter'=>$filter,'order'=>1)); ?>">综合排序</a></div>
            <div class="order2 <?php if($order == 2): ?>current<?php endif; ?>"><a href="<?php echo url('index/lists/index',array('cate_id'=>$cate_id,'filter'=>$filter,'order'=>2)); ?>">销量 <i
                        class="iconfont iconpaixujiantouxia"></i></a></div>
           
            <div class="order2 <?php if($order == 3): ?>current<?php endif; ?>"><a href="<?php echo url('index/lists/index',array('cate_id'=>$cate_id,'filter'=>$filter,'order'=>3)); ?>">价格 <i
                        class="iconfont iconpaixujiantouxia"></i></a></div>
            <div class="order2 <?php if($order == 4): ?>current<?php endif; ?>"><a href="<?php echo url('index/lists/index',array('cate_id'=>$cate_id,'filter'=>$filter,'order'=>4)); ?>">价格 <i
                        class="iconfont iconpaixujiantoushang"></i></a></div>
        </div>
        <div class="lists_goods">
            <?php if(is_array($goodsData) || $goodsData instanceof \think\Collection || $goodsData instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a class="item" href="/index/goods/index.html?goods_id=<?php echo htmlentities($vo['goods_id']); ?>">
                <div class="pic"><img src="<?php echo htmlentities($vo['goods_thumb']); ?>"></div>
                <div class="info">
                    <div class="goods_name"><?php echo htmlentities($vo['goods_name']); ?></div>
                    <div class="price">￥<?php echo htmlentities($vo['goods_price']); ?></div>
                    <div class="icon"><i class="iconfont icongouwuche"></i></div>
                </div>
            </a>
           <?php endforeach; endif; else: echo "" ;endif; ?>
        
           <?php echo $goodsData; ?>

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


    <style>
        .order2{
            position: relative;
        }
        .iconpaixujiantoushang{
            position: absolute;
            bottom: -3px;
        }
        .iconpaixujiantouxia{
            position: absolute;
            bottom: 3px;
        }
    </style>

</body>

</html>