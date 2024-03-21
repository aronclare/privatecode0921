<?php /*a:2:{s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\mobile\view\index\index.html";i:1711000728;s:72:"D:\phpstudy_pro\WWW\privatecode0921\app\mobile\view\public\foot_bar.html";i:1711000728;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>小米商城</title>
  <link rel="stylesheet" href="/public/static/mobile/css/swiper.min.css">
  <link rel="stylesheet" href="/public/static/mobile//css/common.css">
  <link rel="stylesheet" href="/public/static/mobile//css/index.css">
  <link rel="stylesheet" type="text/css" href="http://at.alicdn.com/t/font_1646840_wwuv2y1aefe.css"/>
</head>

<body>

  <div class="header">
    <div class="logo">
      <a href="/"><img src="/public/static/mobile/images/logo.png" alt=""></a>
    </div>
    <div class="search_box">搜索商品名称</div>
    <div class="login-link"><i class="iconfont iconwo"></i></div>
  </div>
  <div class="nav">
    <ul>
      <li><a href="#">手机</a></li>
      <li><a href="#">智能</a></li>
      <li><a href="#">电视</a></li>
      <li><a href="#">小米音响</a></li>
      <li><a href="https://baidu.com">笔记本</a></li>
      <li><a href="#">背包</a></li>
      <li><a href="#">生活周边</a></li>
      <li><a href="#">家居生活</a></li>
    </ul>
  </div>
  <section class="index_banner">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><a href="#" ><img src="/public/static/mobile/images/banner1.jpg"></a></div>
      <div class="swiper-slide"><a href="#" ><img src="/public/static/mobile/images/banner2.jpg"></a></div>
      <div class="swiper-slide"><a href="#" ><img src="/public/static/mobile/images/banner3.jpg"></a></div>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </section>

  <section class="nav_icon">
    <a class="item" href="#"><img src="/public/static/mobile/images/1.webp"></a>
    <a class="item" href="#"><img src="/public/static/mobile/images/2.webp"></a>
    <a class="item" href="#"><img src="/public/static/mobile/images/3.webp"></a>
    <a class="item" href="#"><img src="/public/static/mobile/images/4.webp"></a>
    <a class="item" href="#"><img src="/public/static/mobile/images/5.webp"></a>
    <a class="item" href="#"><img src="/public/static/mobile/images/6.webp"></a>
    <a class="item" href="#"><img src="/public/static/mobile/images/7.webp"></a>
    <a class="item" href="#"><img src="/public/static/mobile/images/8.webp"></a>
    <a class="item" href="#"><img src="/public/static/mobile/images/9.webp"></a>
    <a class="item" href="#"><img src="/public/static/mobile/images/10.webp"></a>

    </div>
  </section>

  <section class="ad1_section">
    <div class="ad1_section_left"><a  href="#"><img src="/public/static/mobile/images/ad1.jpg"></a></div>
    <div class="ad1_section_right">
      <div class="item"><a  href="#"><img src="/public/static/mobile/images/ad2.jpg"></a></div>
      <div class="item line2"></div>
      <div class="item"><a  href="#"><img src="/public/static/mobile/images/ad3.jpg"></a></div>
    </div>
  </section>
  <section class="ad2_section"><a  href="#"><img src="/public/static/mobile/images/ad4.jpg"></a></section>
  <section class="ad2_section"><a  href="#"><img src="/public/static/mobile/images/ad5.jpg"></a></section>
  <div class="public_goods_box">
    <?php if(is_array($goodsData5) || $goodsData5 instanceof \think\Collection || $goodsData5 instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsData5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <a class="item" href="<?php echo url('mobile/goods/index',array('goods_id'=>$vo['goods_id'])); ?>">
      <div class="pic"><img src="<?php echo htmlentities($vo['goods_thumb']); ?>"></div>
      <div class="title"><?php echo htmlentities($vo['goods_name']); ?></div>
      <div class="price_box">
        <div class="icon">￥</div>
        <div class="price"><?php echo htmlentities($vo['goods_price']); ?></div>
        <div class="market_price">￥<?php echo htmlentities($vo['market_price']); ?></div>
      </div>
      <div class="button"></div>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>

  </div>
<div class="footer_bar_t"></div>
<div class="footer_bar">
    <a href="/mobile/" class="item">
      <div class="icon iconfont icon31shouye"></div>
      <div class="title">首页</div>
    </a>
    <a href="/mobile/lists/index" class="item">
      <div class="icon iconfont iconfenlei"></div>
      <div class="title">分类</div>
    </a>
    <a href="/mobile/cart/index" class="item">
      <div class="icon iconfont icongouwuche"></div>
      <div class="title">购物车</div>
    </a>
    <a href="/mobile/user/index" class="item">
      <div class="icon iconfont iconwo"></div>
      <div class="title">我的</div>
    </a>
</div>
  
  <script src="/public/static/mobile/js/jquery-3.4.1.min.js"></script>
  <script src="/public/static/mobile/js/swiper.min.js"></script>
  <script>
      var swiper = new Swiper('.index_banner', {
          pagination: {
              el: '.swiper-pagination',
              clickable: true,
          },
          loop:'true',
      });
  </script>
</body>

</html>