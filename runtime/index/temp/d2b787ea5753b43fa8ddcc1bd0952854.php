<?php /*a:4:{s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\goods\index.html";i:1708179639;s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\head.html";i:1708179639;s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\foot2.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\index\view\public\rightnav.html";i:1708179639;}*/ ?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>

    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/shop.css"/>
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/swiper.min.css"/>
    <link rel="stylesheet" type="text/css" href="/public/static/index/css/goods.css"/>

    <link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_1646840_lskp4ol16mr.css"/>

    <link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css"/>


    <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>

    <script src="/public/static/index/js/common.js"></script>

    <script src="/public/static/index/layui/layui.js"></script>
    <script src="/public/static/index/js/swiper.min.js"></script>

    <title>商品详情</title>

    <meta name="keywords" content="商品详情">

    <meta name="description" content="商品详情">



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

<div class="goods_position">
  <div class="wrap"><a href="/">首页</a> &gt;
    <?php if(is_array($positionData) || $positionData instanceof \think\Collection || $positionData instanceof \think\Paginator): $i = 0; $__LIST__ = $positionData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <a href="/index/lists/index.html?cate_id=<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['cate_name']); ?> &gt; </a>
    <?php endforeach; endif; else: echo "" ;endif; ?></div>
</div>
<div class="wrap">


    <div class="goods1">

        <div class="goods1_left">

          <div class="swiper-container">
            <div class="swiper-wrapper">
              <?php if(is_array($goodsImg) || $goodsImg instanceof \think\Collection || $goodsImg instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsImg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <div class="swiper-slide"><img src="<?php echo htmlentities($vo['image']); ?>"></div>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          <script>
            var swiper = new Swiper('.swiper-container', {
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
              loop:'true'
            });
          </script>

        </div>

        <div class="goods1_right">
            <div class="goods_name_box">
              <div class="goods_name"><?php echo htmlentities($goodsData['goods_name']); ?></div>
              <div class="goods_click">点击:<?php echo htmlentities($goodsData['click']); ?></div>
            </div>
            <div class="goods_name1"><?php echo htmlentities($goodsData['goods_short_name']); ?></div>
            <div class="goods_description"><?php echo htmlentities($goodsData['description']); ?></div>
            <div class="goods_price_box">
              <div class="goods_price_box_left">
                <div class="goods_price1">秒杀价：￥<span class="goods_price1_text"><?php echo htmlentities($goodsData['goods_price']); ?></span></div>
                <div class="goods_price2">市场价：￥<span class="goods_price2_text"><?php echo htmlentities($goodsData['market_price']); ?></span></div>
              </div>
              <div class="goods_price_box_right" onclick="collect()">
                  <?php if($iscollect == 1): ?>
                    <i class="layui-icon layui-icon-star-fill" style="font-size:22px;"></i>
                    <?php else: ?>
                    <i class="layui-icon layui-icon-star" style="font-size:22px;"></i>
                  <?php endif; ?>
                  
              </div>
            </div>
            <?php if($standardList): if(is_array($standardList) || $standardList instanceof \think\Collection || $standardList instanceof \think\Paginator): $i = 0; $__LIST__ = $standardList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="goods_attr"><?php echo htmlentities($vo['name']); ?>：</div>
            <div class="goods_attr_value_box">
              <?php if(is_array($vo['standard']) || $vo['standard'] instanceof \think\Collection || $vo['standard'] instanceof \think\Paginator): $k = 0; $__LIST__ = $vo['standard'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k % 2 );++$k;?>
              <div class="item <?php if($k == 1): ?>current<?php endif; ?>"><?php echo htmlentities($vo1['standard_value']); ?><input type="hidden" value="<?php echo htmlentities($vo1['id']); ?>"></div>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <?php endif; ?>

            <div class="number_box"><input type="number" min="1" value="1" class="number_input"></div>
            
            <div class="goods_btn">
              <div class="goods_btn1">立即购买</div>
              <div class="goods_btn2">加入购物车</div>
            </div>

            <input type="hidden" value="<?php echo htmlentities($goodsData['goods_id']); ?>" name="goods_id">
            <input type="hidden" value="<?php echo htmlentities($goodsData['single_standard']); ?>" name="single_standard">
        </div>

       

    </div>



    <div class="goods2">

        <div class="title color1">商品详情 | <a href="<?php echo url('index/goods/goods_comment',array('goods_id'=>$goodsData['goods_id'])); ?>">商品评论</a></div>

        <div class="content">

          <?php echo $goodsContent['content']; ?>

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


<script type="text/javascript">

var goods_id=$("input[ name='goods_id' ]").val();
var single_standard=$("input[ name='single_standard' ]").val();

//页面加载请求价钱
if(single_standard==2){
     var standard_value_id='';//存放选中属性的字符串，每次点击清空，重新获取

    $('.current input').each(function(k,v){ 
      if(k==0){
        standard_value_id=$(this).val();
      } else{
        standard_value_id=standard_value_id+','+$(this).val();
      }       
      
      
    });

    url ="/index/goods/getPriceBySku";
    postData = {'standard_value_id':standard_value_id,'goods_id':goods_id};

    $.post(url,postData,function(result){
      if(result.status==0){
        $(".goods_btn").css('display','none');
      }
      if(result.status==1){
        $(".goods_price1_text").html(result.goods_price);
        $(".goods_price2_text").html(result.market_price);
      }

    },'json');
}


$(".goods_attr_value_box .item").click(function(){

    //选择哪个哪个变红

    $(this).parent().children().removeClass("current");

    $(this).addClass("current");


    var standard_value_id='';//存放选中属性的字符串，每次点击清空，重新获取

    $('.current input').each(function(k,v){ 
      if(k==0){
        standard_value_id=$(this).val();
      } else{
        standard_value_id=standard_value_id+','+$(this).val();
      }       
      
      
    });

    url ="/index/goods/getPriceBySku";
    postData = {'standard_value_id':standard_value_id,'goods_id':goods_id};

    $.post(url,postData,function(result){
      if(result.status==0){
        $(".goods_btn").css('display','none');
      }
      if(result.status==1){
        $(".goods_price1_text").html(result.goods_price);
        $(".goods_price2_text").html(result.market_price);
      }

    },'json');

  
  });


  //加入购物车
  $(".goods_btn2").click(function(){

    var amount=$(".number_input").val();

    var standard_value_id='';//存放选中属性的字符串，每次点击清空，重新获取

    $('.current input').each(function(k,v){ 
      if(k==0){
        standard_value_id=$(this).val();
      } else{
        standard_value_id=standard_value_id+','+$(this).val();
      }       
      
      
    });


    url ="/index/cart/add_to_cart";

    postData = {'amount':amount,'goods_id':goods_id,'standard_value_id':standard_value_id};

    //发送请求

    $.post(url,postData,function(result){


      if(result.status == 1) {


          layui.use('layer', function(){

            layer.alert('加入购物车成功！', function(index){

              location.href="/index/cart/index";

            }); 

          });



      }

      if(result.status == -1) {

        layui.use('layer', function(){

          layer.alert('请先登录！', function(index){

            location.href="/index/user/login";

          }); 

        });

    }


    if(result.status== 0) {


      layui.use('layer', function(){

        var layer = layui.layer;

        layer.msg('加入购物车失败！');

      });



    }


  }, 'json');


  });



  //直接购买
  $(".goods_btn1").click(function(){

    var amount=$(".number_input").val();

    var standard_value_id='';//存放选中属性的字符串，每次点击清空，重新获取

    $('.current input').each(function(k,v){ 
      if(k==0){
        standard_value_id=$(this).val();
      } else{
        standard_value_id=standard_value_id+','+$(this).val();
      }       
      
    });
    
    window.location='/index/order/buy?sku='+standard_value_id+'&amount='+amount+'&goods_id='+goods_id;

  });

  //加入收藏操作
  function collect() {
    
  
    //抛送数据
    postData = {'goods_id':goods_id};
    url='/index/user/add_goods_collect';
    $.post(url,postData,function(result){
        
        //添加收藏
        if(result.status==1){
          $(".goods_price_box_right .layui-icon").attr('class','layui-icon-star-fill layui-icon');
        }

        //取消收藏
        if(result.status==2){
          $(".goods_price_box_right .layui-icon").attr('class','layui-icon-star layui-icon');
        }

        //服务异常
        if(result.status==-1){
          layui.use('layer', function(){
            var layer = layui.layer;
            
            layer.msg('服务端异常');
          }); 
        }

        //没有登录
        if(result.status==0){
          
          layui.use('layer', function(){
            var layer = layui.layer;
            
            layer.open({
                type: 1
                ,offset: 'auto' 
                ,id: 'layerDemo'+1 //防止重复弹出
                ,content: '<div style="text-align:center;padding:20px 80px">请登录！</div>'
                ,btn: '确定'
                ,btnAlign: 'c' //按钮居中
                ,shade: 0 //不显示遮罩
                ,yes: function(){
                    window.location.href='/index/user/login';
                }
            });
          });  
        }


      
    },'json');
  }
  
  </script>


</body>

</html>



