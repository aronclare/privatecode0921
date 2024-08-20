<?php /*a:5:{s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\index\index.html";i:1724124914;s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\head.html";i:1724124914;s:69:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\footer.html";i:1724124914;s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\foot2.html";i:1724124914;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\rightnav.html";i:1724124914;}*/ ?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>

    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/shop.css"/>

    <link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css"/>

    <link rel="stylesheet" href="/public/static/index/css/swiper.min.css">

    <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>

    <script src="/public/static/index/js/swiper.min.js"></script>
    <script src="/public/static/index/layui/layui.js"></script>

    <script src="/public/static/index/js/common.js"></script>

    <title><?php echo htmlentities($web_title); ?></title>

    <meta name="keywords" content="">

    <meta name="description" content="">

</head>

<body>

<style>

    body{

        background: #f5f5f5;

    }    

</style>



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



<div class="wrap">

    <div class="index_content">

        <div class="index_content_left">

            <div class="nav_box">

                <?php if(is_array($indexCate) || $indexCate instanceof \think\Collection || $indexCate instanceof \think\Paginator): $i = 0; $__LIST__ = $indexCate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                
                <div class="item">

                    <a href="/index/lists/index.html?cate_id=<?php echo htmlentities($vo['id']); ?>" class="colorfff"><?php echo htmlentities($vo['cate_name']); ?></a>

                    <a href="javascript::(void)" class="colorfff">&gt;</a>

                    
                    <div class="sub_content" style="display: none;">

                            <?php if(isset($vo['children'])){ if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                                <div class="item1">
                                    <a href="/index/lists/index.html?cate_id=<?php echo htmlentities($vo1['id']); ?>"><b><?php echo htmlentities($vo1['cate_name']); ?></b></a>
                                    <?php if(isset($vo1['children'])){ if(is_array($vo1['children']) || $vo1['children'] instanceof \think\Collection || $vo1['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo1['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                        <div class="">
                                            <a href="/index/lists/index.html?cate_id=<?php echo htmlentities($vo2['id']); ?>"><?php echo htmlentities($vo2['cate_name']); ?></a>
                
                                        </div>
                                        <?php endforeach; endif; else: echo "" ;endif; } ?>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; } ?>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="index_content_middle">
            <section class="index_banner">
                <div class="swiper-wrapper">
                    <?php if(is_array($bannerData) || $bannerData instanceof \think\Collection || $bannerData instanceof \think\Paginator): $i = 0; $__LIST__ = $bannerData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="swiper-slide">
                        <a href="<?php echo htmlentities($vo['url']); ?>"><img src="<?php echo htmlentities($vo['thumb']); ?>"></a>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <div class="swiper-pagination"></div>
            </section>
            <script>
                var swiper = new Swiper('.index_banner', {
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    loop:'true',

                });
            </script>
        </div>
    </div>
    <div class="index_ad_box">
        <div class="item"><a href="<?php echo url('index/goods/index',array('goods_id'=>6)); ?>"><img src="/public/static/index/images/ad1.jpg"></a></div>
        <div class="item"><a href="<?php echo url('index/goods/index',array('goods_id'=>3)); ?>"><img src="/public/static/index/images/ad2.jpg"></a></div>
        <div class="item"><a href="<?php echo url('index/goods/index',array('goods_id'=>7)); ?>"><img src="/public/static/index/images/ad3.jpg"></a></div>
        <div class="item"><a href="<?php echo url('index/goods/index',array('goods_id'=>1)); ?>"><img src="/public/static/index/images/ad1.jpg"></a></div>
    </div>

    <div class="index_floor">
        <div class="title_box">
            <div class="title">手机</div>
            <div class="nav">
                <?php if(is_array($goodsCate18) || $goodsCate18 instanceof \think\Collection || $goodsCate18 instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsCate18;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a class="item" href="<?php echo url('index/lists/index',array('cate_id'=>$vo['id'])); ?>"><?php echo htmlentities($vo['cate_name']); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="goods_box">
            <div class="left_content"><a href="<?php echo url('/shop/lists/index',array('cate_id'=>16)); ?>"><img src="/public/static/index/images/t1.webp"></a></div>
            <div class="right_content">
                <?php if(is_array($goodsData18) || $goodsData18 instanceof \think\Collection || $goodsData18 instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsData18;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>$vo['goods_id'])); ?>">
                    <div class="pic"><img src="<?php echo htmlentities($vo['goods_thumb']); ?>"></div>
                    <div class="title"><?php echo htmlentities($vo['goods_name']); ?></div>
                    <div class="description"><?php echo htmlentities($vo['goods_short_name']); ?></div>
                    <div class="price_box"><span class="price"><?php echo htmlentities($vo['goods_price']); ?>元起</span><span class="market"><?php echo htmlentities($vo['market_price']); ?>元起</span></div>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>3)); ?>">
                    <div class="pic"><img src="/public/static/index/images/indexm2.jpg"></div>
                    <div class="title">Redmi K30</div>
                    <div class="description">双模5G，120Hz流速屏</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </a>
                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>3)); ?>">
                    <div class="pic"><img src="/public/static/index/images/indexm3.jpg"></div>
                    <div class="title">Redmi 8</div>
                    <div class="description">5000mAh超长续航</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </a>
                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>3)); ?>">
                    <div class="pic"><img src="/public/static/index/images/indexm4.jpg"></div>
                    <div class="title">小米10</div>
                    <div class="description">骁龙865处理器 / 1亿像素相机</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </a>
                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>3)); ?>">
                    <div class="pic"><img src="/public/static/index/images/indexm5.jpg"></div>
                    <div class="title">Redmi 8A</div>
                    <div class="description">5000mAh超长续航</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </a>
               
               
            </div>
        </div>
    </div>

    <div class="index_floor">
        <div class="title_box">
            <div class="title">女装</div>
            <div class="nav">
                <a class="item" href="<?php echo url('/shop/lists/index',array('cate_id'=>16)); ?>">浪漫裙装</a>
                <a class="item" href="<?php echo url('/shop/lists/index',array('cate_id'=>16)); ?>">阔腿裤</a>
                <a class="item" href="<?php echo url('/shop/lists/index',array('cate_id'=>16)); ?>">针织衫</a>
                <a class="item" href="<?php echo url('/shop/lists/index',array('cate_id'=>16)); ?>">牛仔裤</a>
            </div>
        </div>
        <div class="goods_box">
            <div class="left_content"><a href="<?php echo url('/shop/lists/index',array('cate_id'=>16)); ?>"><img src="/public/static/index/images/t4.jpg"></a></div>
            <div class="right_content">
                <div class="item">
                    <div class="pic"><img src="/public/static/index/images/shop_311.jpg"></div>
                    <div class="title">北极绒吊带背心</div>
                    <div class="description">肩带可调节</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>
                <div class="item">
                    <div class="pic"><img src="/public/static/index/images/shop_31.jpg"></div>
                    <div class="title">南极绒冲锋裤</div>
                    <div class="description">加绒加厚</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>
                <div class="item">
                    <div class="pic"><img src="/public/static/index/images/shop_3122.jpg"></div>
                    <div class="title">修身长袖双排扣亮丝高腰包臀裙</div>
                    <div class="description">2020春格子</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>
                <div class="item item_r_0">
                    <div class="pic"><img src="/public/static/index/images/shop_3101.jpg"></div>
                    <div class="title">高领衬衣气质上衣</div>
                    <div class="description">真丝蚕桑丝 印花 高领</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>
                <div class="item">
                    <div class="pic"><img src="/public/static/index/images/shop_3111.jpg"></div>
                    <div class="title">宽松七分袖连衣裙小香风</div>
                    <div class="description">提花面料拼接 A型宽松</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>
                <div class="item">
                    <div class="pic"><img src="/public/static/index/images/shop_3123.jpg"></div>
                    <div class="title">豆绿色长袖衬衫</div>
                    <div class="description">豆绿色 面料柔软舒适</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>
                <div class="item">
                    <div class="pic"><img src="/public/static/index/images/shop_3124.jpg"></div>
                    <div class="title">收腰显瘦气质粉红色</div>
                    <div class="description">2020春季新款</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>
                <div class="item">
                    <div class="pic"><img src="/public/static/index/images/shop_3125.jpg"></div>
                    <div class="title">夏季真丝绣花套头纯色裙子</div>
                    <div class="description">时尚长身印花</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="index_floor">
        <div class="title_box">
            <div class="title">生活电器</div>
            <div class="nav">
                <?php if(is_array($goodsCate4) || $goodsCate4 instanceof \think\Collection || $goodsCate4 instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsCate4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a class="item" href="<?php echo url('index/lists/index',array('cate_id'=>$vo['id'])); ?>"><?php echo htmlentities($vo['cate_name']); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="goods_box">
            <div class="right_content">
                <div class="item item_l_0">
                    <img src="/public/static/index/images/t2.webp">
                </div>
                <?php if(is_array($goodsData4) || $goodsData4 instanceof \think\Collection || $goodsData4 instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsData4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>$vo['goods_id'])); ?>">
                    <div class="pic"><img src="<?php echo htmlentities($vo['goods_thumb']); ?>"></div>
                    <div class="title"><?php echo htmlentities($vo['goods_name']); ?></div>
                    <div class="description"><?php echo htmlentities($vo['goods_short_name']); ?></div>
                    <div class="price_box"><span class="price"><?php echo htmlentities($vo['goods_price']); ?>元起</span><span class="market"><?php echo htmlentities($vo['market_price']); ?>元起</span></div>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>4)); ?>">
                    <div class="pic"><img src="/public/static/index/images/shop_34.jpg"></div>
                    <div class="title">Redmi 8</div>
                    <div class="description">5000mAh超长续航</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </a>
                <div class="item item_l_0">
                    <div class="pic"><img src="/public/static/index/images/shop_35.jpg"></div>
                    <div class="title">Redmi 8</div>
                    <div class="description">5000mAh超长续航</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>
                <div class="item ">
                    <div class="pic"><img src="/public/static/index/images/shop_36.jpg"></div>
                    <div class="title">Redmi 8</div>
                    <div class="description">5000mAh超长续航</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </div>

                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>4)); ?>">
                    <div class="pic"><img src="/public/static/index/images/shop_38.jpg"></div>
                    <div class="title">Redmi 8</div>
                    <div class="description">5000mAh超长续航</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </a>
                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>4)); ?>">
                    <div class="pic"><img src="/public/static/index/images/shop_389.jpg"></div>
                    <div class="title">Redmi 8</div>
                    <div class="description">5000mAh超长续航</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </a>
                <a class="item" href="<?php echo url('index/goods/index',array('goods_id'=>4)); ?>">
                    <div class="pic"><img src="/public/static/index/images/shop_400.jpg"></div>
                    <div class="title">Redmi 8</div>
                    <div class="description">5000mAh超长续航</div>
                    <div class="price_box"><span class="price">1500元起</span><span class="market">1500元起</span></div>
                </a>
            </div>
        </div>
    </div>



    <div class="index_rexiao">

        <div class="title">热销推荐</div>

        <div class="goods_box">

           <?php if(is_array($goodsData5) || $goodsData5 instanceof \think\Collection || $goodsData5 instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsData5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

            <a href="<?php echo url('index/goods/index',array('goods_id'=>$vo['goods_id'])); ?>" class="item">

                <div class="pic"><img src="<?php echo htmlentities($vo['goods_thumb']); ?>"></div>

                <div class="info">

                    <div class="goods_name"><?php echo htmlentities($vo['goods_name']); ?></div>

                    <div class="price">￥<?php echo htmlentities($vo['goods_price']); ?></div>

                </div>

            </a>

            <?php endforeach; endif; else: echo "" ;endif; ?>

        </div>

    </div>

</div>



<div class="wuyou">

    <div class="wrap wuyou_box">

        <div class="item">

            <div class="pic"><i class="iconfont iconweixiu"></i></div>

            <div class="title">预约维修服务</div>

        </div>

        <div class="item">

            <div class="pic"><i class="iconfont iconsevenday"></i></div>

            <div class="title">7天无理由退货</div>

        </div>

        <div class="item">

            <div class="pic"><i class="iconfont icontian"></i></div>

            <div class="title">15天免费换货</div>

        </div>

        <div class="item">

            <div class="pic"><i class="iconfont icongift"></i></div>

            <div class="title">满99元包邮</div>

        </div>
        <div class="item">

            <div class="pic"><i class="iconfont iconweizhi"></i></div>

            <div class="title">520余家售后网点</div>

        </div>

    </div>

</div>



<footer>
    <div class="wrap">
        <div class="foot1">
            <div class="foot1_left">
                <div class="tel1"><?php echo htmlentities($tel1); ?></div>
                <div class="tel2">24小时在线咨询</div>
                <div class="wei_box">
                    <a class="" href="#"><img src="/public/static/index/images/weibo.jpg"></a>
                    <a class="" href="#"><img src="/public/static/index/images/weixin.jpg"></a>
                </div>
            </div>
            <div class="foot1_right">
                <div class="menu">
                    <div class="title">关于小米</div>
                    <li><a href="#">小米之家</a></li>
                    <li><a href="#">品牌展厅</a></li>
                    <li><a href="#">企业文化</a></li>
                    <li><a href="#">企业使命</a></li>
                </div>
                <div class="menu">
                    <div class="title">新手入门指南</div>
                    <li><a href="<?php echo url('shop/index/page',array('id'=>4)); ?>">商品购买政策</a></li>
                    <li><a href="<?php echo url('shop/index/page',array('id'=>5)); ?>">商品购买流程</a></li>
                    <li><a href="<?php echo url('shop/index/page',array('id'=>6)); ?>">如何注册会员</a></li>
                    <li><a href="<?php echo url('shop/index/page',array('id'=>7)); ?>">交易条款说明</a></li>
                </div>
                <div class="menu">
                    <div class="title">售后服务</div>
                    <li><a href="<?php echo url('shop/index/page',array('id'=>8)); ?>">售后服务规则</a></li>
                    <li><a href="<?php echo url('shop/index/page',array('id'=>9)); ?>">申请退换货</a></li>
                </div>
                <div class="menu">
                    <div class="title">客服中心</div>
                    <li><a href="#">意见反馈</a></li>
                    <li><a href="<?php echo url('shop/index/page',array('id'=>9)); ?>">常见问题</a></li>
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
    </div>
</footer>



</body>

</html>



