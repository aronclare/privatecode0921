<?php /*a:2:{s:61:"D:\phpstudy_pro\WWW\code0921\app\mobile\view\lists\index.html";i:1599450120;s:65:"D:\phpstudy_pro\WWW\code0921\app\mobile\view\public\foot_bar.html";i:1707547015;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>分类</title>
  <link rel="stylesheet" href="/public/static/mobile/css/common.css">
  <link rel="stylesheet" href="/public/static/mobile/css/index.css">
  <link rel="stylesheet" href="http://at.alicdn.com/t/font_1646840_80k3ykm7f3.css">
</head>

<body>

  <header class="normal-header">
    <div class="return">
      <i class="iconfont iconarrow-right-copy-copy-copy"></i>
    </div>
    <div class="text">
      分类
    </div>
    <div class="search">
      <i class="iconfont icontubiao1"></i>
    </div>
  </header>

    <!-- 中部区域 -->
    <div class="cate">
      <div class="cate-left">
        <ul>
          <?php if(is_array($categoryTopData) || $categoryTopData instanceof \think\Collection || $categoryTopData instanceof \think\Paginator): $i = 0; $__LIST__ = $categoryTopData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li class="<?php if($i == 1): ?>active<?php endif; ?>"><?php echo htmlentities($vo['cate_name']); ?></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
      </div>
      <div class="cate-right">
        <ul>
          <!-- 新品 -->
          <?php if(is_array($categoryData) || $categoryData instanceof \think\Collection || $categoryData instanceof \think\Paginator): $i = 0; $__LIST__ = $categoryData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li class="problock">
            <div class="pic">
              <img src="<?php echo htmlentities($vo['thumb']); ?>" alt="">
            </div>
            <div class="pros">
              <div class="pros-title"><span><?php echo htmlentities($vo['cate_name']); ?></span></div>
              <div class="pros-goods">
                <ul>
                  <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                  <li>
                    <a href="#">
                      <img src="<?php echo htmlentities($vo1['thumb']); ?>" alt="">
                      <div><?php echo htmlentities($vo1['cate_name']); ?></div>
                    </a>
                  </li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                 
                </ul>
              </div>
            </div>
            <div class="pros">
              <div class="pros-title"><span>电视</span></div>
              <div class="pros-goods">
                <ul>
                  <li>
                    <a href="./phone.html">
                      <img src="/public/static/mobile/images/category/dianshi1!120x120.jpg" alt="">
                      <div>75英寸 4S</div>
                    </a>
                  </li>
                  <li>
                    <a href="./phone.html">
                      <img src="/public/static/mobile/images/category/dianshi2!120x120.jpg" alt="">
                      <div>58英寸电视4A</div>
                    </a>
                  </li>
                  <li>
                    <a href="./phone.html">
                      <img src="/public/static/mobile/images/category/dianshi3!120x120.jpg" alt="">
                      <div>40英寸 电视4C</div>
                    </a>
                  </li>
                  <li>
                    <a href="./phone.html">
                      <img src="/public/static/mobile/images/category/dianshi4!120x120.jpg" alt="">
                      <div>43英寸 4X</div>
                    </a>
                  </li>
                  <li>
                    <a href="./phone.html">
                      <img src="/public/static/mobile/images/category/dianshi5!120x120.jpg" alt="">
                      <div>65''电视4旗舰版</div>
                    </a>
                  </li>
                  <li>
                    <a href="./phone.html">
                      <img src="/public/static/mobile/images/category/dianshi6!120x120.jpg" alt="">
                      <div>55英寸 4X</div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="pros">
              <div class="pros-title"><span>电脑</span></div>
              <div class="pros-goods">
                <ul>
                  <li>
                    <a href="./phone.html">
                      <img src="/public/static/mobile/images/category/bijiben1!120x120.jpg" alt="">
                      <div>15.6''笔记本</div>
                    </a>
                  </li>
                  <li>
                    <a href="./phone.html">
                      <img src="/public/static/mobile/images/category/bijiben2!120x120.jpg" alt="">
                      <div>13.3''i3银色版</div>
                    </a>
                  </li>
                  <li>
                    <a href="./phone.html">
                      <img src="/public/static/mobile/images/category/bijiben3!120x120.jpg" alt="">
                      <div>12.5''office版</div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
      </div>
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

  <script src="/public/static/mobile/js/zepto/zepto.js"></script>
  <script src="/public/static/mobile/js/iscroll/iscroll-probe.js"></script>
  <script>
    var myScrollLeft;
    var myScrollRight;
    var positions;

    var cateObj = {
      positions: [],
      initLeftScroller: function () {
        myScrollLeft = new IScroll('.cate-left');
      },
      initRightScroller: function () {
        myScrollRight = new IScroll('.cate-right', {
          probeType: 3
        });
      },
      initPositions:function(){
        // cateObj.positions = [];
        $('.cate-right>ul>li').each(function () {
          var position = $(this)[0].offsetTop-300;
          // console.log(position);

          cateObj.positions.push(position);
          
        });
        var positionLast = $('.cate-right>ul').height();
        cateObj.positions.push(positionLast);
        console.log(cateObj.positions);
      },
      dealLeft: function () {
        // 左边菜单点击，右边联动
        $('.cate-left ul li').click(function () {
          // 改变菜单高亮状态
          $('.cate-left ul li').removeClass('active');
          $(this).addClass('active');
          // 右侧产品联动效果
          var index = $(this).index() + 1;
          // console.log('index',index);
          myScrollRight.scrollToElement('.cate-right>ul> li:nth-child(' + index + ')', 300);
        });
      },
      dealRight: function () {
        // 右边滚动，左边联动效果
        myScrollRight.on('scroll', function () {
          var position = -this.y;
          // 判断当前位置落到了哪个区间内
          var index = cateObj.getIndex(position);
          console.log('index', index);
          // 改变菜单高亮状态
          $('.cate-left>ul>li').removeClass('active');
          $('.cate-left>ul>li').eq(index).addClass('active');

          // 左侧菜单要滚动到对应的菜单处
          var indexChosen = index + 1;
          myScrollLeft.scrollToElement('.cate-left>ul>li:nth-child(' + indexChosen + ')', 500, null, true);

        })
      },
      getIndex: function (position) {
        var index = 0;
        for (var i = 0, len = cateObj.positions.length; i < len; i++) {
          if (position < cateObj.positions[i]) {
            index = i - 1;
            break;
          }
        }
        return index;
      }
    };

    
    window.onload = function () {
     cateObj.initPositions();
     cateObj.initLeftScroller();
     cateObj.initRightScroller();
     cateObj.dealLeft();
     cateObj.dealRight();
    }
  </script>
</body>

</html>