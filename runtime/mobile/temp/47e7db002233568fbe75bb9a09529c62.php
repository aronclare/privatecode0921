<?php /*a:1:{s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\mobile\view\goods\index.html";i:1711443229;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>商品详情</title>
  <link rel="stylesheet" href="/public/static/mobile/css/swiper.min.css">
  <link rel="stylesheet" href="/public/static/mobile/css/common.css">
  <link rel="stylesheet" href="/public/static/mobile/css/detail.css">
  <link rel="stylesheet" href="http://at.alicdn.com/t/font_1646840_wwuv2y1aefe.css">
  <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>
  <script src="/public/static/index/layui/layui.js"></script>
</head>

<body>
  <div class="detail_slide">
    <div class="swiper-wrapper">
      <?php if(is_array($goodsImg) || $goodsImg instanceof \think\Collection || $goodsImg instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsImg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <div class="swiper-slide"><img src="<?php echo htmlentities($vo['image']); ?>"></div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <div class="return_icon"><i class="iconfont iconarrow-right-copy-copy-copy"></i></div>
  </div>
  <div class="goods_name"><?php echo htmlentities($goodsData['goods_name']); ?></div>
  <div class="goods_name2">「买8GB+128GB赠送小米小背包，下单抽奖最高赢小米电视4A 70英寸等好礼」 </div>
  <div class="goods_description">6400万旗舰级全场景四摄 / 前置2000万 AI美颜相机 / G90T专业游戏芯片，液冷散热 / 6.53英寸水滴全面屏 / 4500mAh大电量 / 标配18W快充 /
    康宁大猩猩保护玻璃 / 多功能NFC / 红外遥控功能 / Game Turbo2.0游戏加速</div>
  <div class="goods_price_box">
    <div class="icon">￥</div>
    <div class="title">1599</div>
    <div class="market_price">￥1799</div>
  </div>

  <div class="bgf5f5f5_1"></div>
  <div class="standard_selected">
    <div class="left_box">
      <div class="title">已选择：</div>
      <div class="info"><?php echo htmlentities((isset($skuDefaultStr) && ($skuDefaultStr !== '')?$skuDefaultStr:'标准规格')); ?></div>
    </div>
    <div class="arrow"><i class="iconfont iconchevron-copy-copy-copy-copy-copy"></i></div>
  </div>
  <div class="standard_box">
    <div class="close"><i class="iconfont iconcuo"></i></div>
    <div class="goods_box">
      <div class="pic"><img src="/public/static/mobile/images/slide1.webp"></div>
      <div class="info">
        <div class="title">￥<span class="price">139</span></div>
        <div class="text">已选择：<span class="text_select"><?php echo htmlentities((isset($skuDefaultStr) && ($skuDefaultStr !== '')?$skuDefaultStr:'标准规格')); ?></span></div>
      </div>
    </div>
    <?php if($standardList): if(is_array($standardList) || $standardList instanceof \think\Collection || $standardList instanceof \think\Paginator): $i = 0; $__LIST__ = $standardList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="standard_item">
        <div class="title"><?php echo htmlentities($vo['name']); ?>：</div>
        <ul class="standard_itemul">
          
          <?php if(is_array($vo['standard']) || $vo['standard'] instanceof \think\Collection || $vo['standard'] instanceof \think\Paginator): $k = 0; $__LIST__ = $vo['standard'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k % 2 );++$k;?>
          <li class="name <?php if($k == 1): ?>current<?php endif; ?>"><span class="value"><?php echo htmlentities($vo1['standard_value']); ?></span><input type="hidden" value="<?php echo htmlentities($vo1['id']); ?>"></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <?php endif; ?>


    <div class="number_box">
      <div class="left_content">数量：</div>
      <div class="right_content">
        <div class="reduce">-</div>
        <div class="number">1</div>
        <div class="add">+</div>

      </div>
    </div>
    
    <div class="button_box">
        <div class="add_cart">加入购物车</div>
        <div class="buy">立即购买</div>
    </div>
  </div>



  <div class="mask"></div>

  <div class="bgf5f5f5_1"></div>
  <div class="standard_selected">
    <div class="left_box">
      <div class="info">宝贝评价(12)</div>
    </div>
    <div class="arrow"><i class="iconfont iconchevron-copy-copy-copy-copy-copy"></i></div>
  </div>

  <div class="bgf5f5f5_1"></div>
  <div class="recommend_title">热销推荐</div>
  <div class="public_goods_box2">
    <a class="item" href="#">
      <div class="pic"><img src="/public/static/mobile/images/slide1.webp"></div>
      <div class="title">Redmi 7A</div>
      <div class="price">￥139</div>
    </a>
    <a class="item" href="#">
      <div class="pic"><img src="/public/static/mobile/images/slide1.webp"></div>
      <div class="title">Redmi 7A</div>
      <div class="price">￥139</div>
    </a>
    <a class="item" href="#">
      <div class="pic"><img src="/public/static/mobile/images/slide1.webp"></div>
      <div class="title">Redmi 7A</div>
      <div class="price">￥139</div>
    </a>

  </div>
  <input type="hidden" name="goods_id" value="<?php echo htmlentities($goodsData['goods_id']); ?>"> 
  <input type="hidden" name="single_standard" value="<?php echo htmlentities($goodsData['single_standard']); ?>"> 

  <div class="bgf5f5f5_1"></div>
  <div class="detail_content">
    <img src="/public/static/mobile/images/slide1.webp">
  </div>

  <div class="footer_bar_t"></div>
  <div class="detail_foot_bar">
      <div class="left_content">
        <a class="home" href="/">
          <div class="icon"><i class=" iconfont icon31shouye"></i></div>
          <div class="title">首页</div>
        </a>
        <div class="collect">
          <div class="icon"><i class="iconfont iconshoucang"></i></div>
          <div class="title">收藏</div>
        </div>
      </div>

      <div class="right_content">
        <div class="add_cart">加入购物车</div>
        <div class="buy">立即购买</div>
      </div>
  </div>

  <script src="/public/static/mobile/js/jquery-3.4.1.min.js"></script>
  <script src="/public/static/mobile/js/swiper.min.js"></script>
  <script>
    var swiper = new Swiper('.detail_slide', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      loop: 'true',

    });

    $(function(){
      //显示购买框
      $(".standard_selected .arrow").click(function(){
        $(".standard_box").css("display","block");
        $(".mask").css("display","block");
        getPrice();
      });
      $(".standard_box .close").click(function(){
        $(".standard_box").css("display","none");
        $(".mask").css("display","none");
      });

      $(".detail_foot_bar").click(function(){
        $(".standard_box").css("display","block");
        $(".mask").css("display","block");
        getPrice();
      });

      //商品数量
      $(".add").click(function(){
        var number=$(".number").html();
        number=parseInt(number)+1;
        $(".number").html(number)
      });


      $(".reduce").click(function(){
        var number=$(".number").html();
        number=parseInt(number)-1;
        if(number==0){
          number=1;
        }
        $(".number").html(number)
      });


        //加入购物车
        $(".add_cart").click(function(){

            var amount= $(".number").html();

          //  console.log(amount);

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

            console.log(postData);

            //发送请求

            $.post(url,postData,function(result){


                if(result.status == 1) {


                    layui.use('layer', function(){

                        layer.alert('加入购物车成功！', function(index){

                            location.href="/mobile/cart/index";

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

        //=======================================

        var goods_id=$("input[ name='goods_id' ]").val();

      var single_standard=$("input[ name='single_standard' ]").val();



        //点击哪个，哪个变红，改变价钱
      $(".standard_itemul .name").click(function(){
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


          url ="/mobile/goods/getPriceBySku";
        postData = {'standard_value_id':standard_value_id,'goods_id':goods_id};


      //  console.log(postData);

        $.post(url,postData,function(result){
          if(result.status==0){
            $(".goods_btn").css('display','none');
          }
          if(result.status==1){
            $(".goods_box .price").html(result.goods_price);
            $(".goods_price_box .title").html(result.goods_price);
          }

        },'json');

        //获取已经选中的文字
        var str='';
        $('.current').each(function(k,v){ 
            
            if(k==0){
              str=$(v).children('.value').html();
            } else{
              str=str+','+$(v).children('.value').html();
            }  
            $(".text_select").html(str); 
          
        });

      });

      getPrice();
    });



    //页面加载请求默认价钱
    function getPrice(){
      
      var goods_id=$("input[ name='goods_id' ]").val();
      var single_standard=$("input[ name='single_standard' ]").val();
        
        if(single_standard==2){
            var standard_value_id='';//存放选中属性的字符串，每次点击清空，重新获取

            $('.current input').each(function(k,v){ 
              if(k==0){
                standard_value_id=$(this).val();
              } else{
                standard_value_id=standard_value_id+','+$(this).val();
              }       
              
              
            });

            url ="/mobile/goods/getPriceBySku";
            postData = {'standard_value_id':standard_value_id,'goods_id':goods_id};

            $.post(url,postData,function(result){
              if(result.status==0){
                $(".goods_btn").css('display','none');
              }
              if(result.status==1){
                $(".goods_box .price").html(result.goods_price);
                $(".goods_price_box .title").html(result.goods_price);
              }

            },'json');
        }
    }

    
  </script>
</body>

</html>