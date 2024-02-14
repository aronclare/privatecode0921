<?php /*a:2:{s:75:"D:\phpstudy_pro\WWW\privatecode0921\app\mobile\view\user\merchant_edit.html";i:1707893991;s:72:"D:\phpstudy_pro\WWW\privatecode0921\app\mobile\view\public\foot_bar.html";i:1707797701;}*/ ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />

    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/shop.css" />

    <link rel="stylesheet" type="text/css" href="/public/static/index/css/user.css" />

    <link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_1646840_fj05m4s1s4h.css" />

    <link rel="stylesheet" href="/public/static/index/layui/css/layui.css">

    <script src="/public/static/index/js/jquery-3.4.1.min.js"></script>

    <script src="/public/static/index/layui/layui.js"></script>

    <script src="/public/static/index/js/common.js"></script>

    <title>会员中心-<?php echo htmlentities($web_title); ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">

</head>

<body>

<div class="user_box">

    <div class="inner_box">

        <div class="nav_bar">我的</div>
        <div class="user_head">
            <div class="title"><label>用户名:</label><?php echo htmlentities($sessionUserData['username']); ?></div>
            <div class="description">上次登录:<?php echo htmlentities(date("Y-m-d H:s:i",!is_numeric($sessionUserData['last_login_time'])? strtotime($sessionUserData['last_login_time']) : $sessionUserData['last_login_time'])); ?></div>
            <a href="<?php echo url('user/login_out'); ?>">
                <button class="exit_btn">退出</button>
            </a>
            <a href="#">
                <button class="exit_btn">编辑个人资料</button>
            </a>
            <a href="#">
                <button class="exit_btn">提现</button>
            </a>
            <a href="#">
                <button class="exit_btn">复制推广链接</button>
            </a>
            <a href="#">
                <button class="exit_btn">显示有效推荐人数</button>
            </a>
            <a href="#">
                <button class="exit_btn">显示总佣金</button>
            </a>
        </div>

    </div>

    <div class="inner_box1">

        <div class="order_list">
            <ul>
                <li>全部订单</li>
                <li>我的买单</li>
                <li>我的卖单</li>
            </ul>
        </div>

        <div class="order_list">
            <ul>
                <li>我的收藏</li>
                <li>我的消息</li>
                <li>我的足迹</li>
            </ul>
        </div>
    </div>

    <!--商户信息-->
    <div class="inner_box2">


        <div id="mer_control" class="mer_control active">
            <h2>商户信息</h2>

            <form action="<?php echo url('user/merchant_update'); ?>" method="post" enctype="multipart/form-data">

                <label><input type="hidden" value="<?php echo htmlentities($merdd_Data['id']); ?>" name="id"></label><br>


                <label>商户名称</label><br>
                <label><input type="text" value="<?php echo htmlentities($merdd_Data['store_name']); ?>" name="store_name"></label><br>

                <label>商户地址</label><br>
                <label><input type="text" value="<?php echo htmlentities($merdd_Data['address']); ?>" name="address"></label><br>

                <label>商家姓名</label><br>
                <label><input type="text" value="<?php echo htmlentities($merdd_Data['name']); ?>" name="name"></label><br>

                <label>行业</label><br>
                <label><input type="text" value="<?php echo htmlentities($merdd_Data['store_type']); ?>" name="store_type"></label><br>

                <label>门户照片</label><br>
                <label><img src="<?php echo htmlentities($merdd_Data['store_pic']); ?>" alt=""><input type="file" name="store_pic"></label><br>

                <label>收款码</label><br>
                <label><img src="<?php echo htmlentities($merdd_Data['payment_code_pic']); ?>" alt=""><input type="file" name="payment_code_pic"></label><br>

                <button type="submit">提交</button>

            </form>







        </div>


        <style>
            label img{
                width: 60px;
                height: 60px;
            }

            form{
                text-align: center;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #4CAF50;
                color: white;
            }

            tr:hover {
                background-color: #f5f5f5;
            }


            .mer_control{
                background-color: #00b62f;
                display: none;
            }
            .car_control{
                display: none;
                background-color: #0a6999;
            }
            .active{
                display: block;
            }
        </style>

        <script>
            function toggleForm() {
                var mer_control = document.getElementById("mer_control");
                var car_control = document.getElementById("car_control");

                if (mer_control.classList.contains("active")) {
                    mer_control.classList.remove("active");
                    car_control.classList.add("active");

                } else {
                    mer_control.classList.add("active");
                    car_control.classList.remove("active");
                }
            }
        </script>

    </div>

</div>


<style>
    .nav_bar{
        width: 100%;
        font-size: 16px;
        color: gray;
        text-align: center;
        padding: 7px 7px;
    }
    .user_head div{
        display: inline;
    }
    .user_box{
        margin: 0;
        height: 800px;
        background-color:#f5f5f5 ;
        display: block;
        width: 100%;
        border-bottom: 2px solid yellow;
    }
    .user_head{

        width: 100%;
        height: 90px;
    }
    .inner_box1 .order_list{
        width: 100%;
        height: 60px;
        text-align: center;
    }
    .inner_box1 .order_list ul li{
        width: 30%;
        height: 40px;
        line-height: 40px;
        display: inline-block;
    }

    .inner_box2 ul li{
        width: 100%;
        height: 40px;
        line-height: 40px;
        margin-bottom: 2px;
        padding: 0 46px 0 46px;
        border-radius: 6px;
        background-color: bisque;
    }
    .footer_bar {
        text-align: center;
        background: #fff;
        position: fixed;
        bottom: 0;
        /*padding: 1rem 0; */
        padding: 0 46px 0 46px;

        display: flex;
        width: 100%;
        justify-content: space-between;
        box-shadow: 0px -2px 5px #eaeaea;
    }
    .iconfont{
        font-size: 30px;
    }

    #think_page_trace_open{
        display: none;
    }




</style>





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



<!--  <div class="wrapbg">

      <div class="wrap ">


          <div class="user_position">

              当前位置：<a href="/">首页</a> > <a href="<?php echo url('user/index'); ?>">会员中心</a> >

          </div>

          <div class="user_box">


              <div class="user_box_right">

                 <div class="user_index_content1">
                      <div class="left_content">
                          <div class="pic"><img src="<?php echo htmlentities((isset($sessionUserData['face']) && ($sessionUserData['face'] !== '')?$sessionUserData['face']:'/public/static/index/images/face.jpg')); ?>" class="img"></div>

                          <div class="info">
                              <div class="title"><?php echo htmlentities($sessionUserData['username']); ?></div>
                              <div class="description">上次登录：<?php echo htmlentities(date("Y-m-d H:s:i",!is_numeric($sessionUserData['last_login_time'])? strtotime($sessionUserData['last_login_time']) : $sessionUserData['last_login_time'])); ?></div>
                              <div class="description1"><a href="<?php echo url('sign'); ?>" class="color1">签到赚取积分</a></div>
                          </div>
                      </div>
                      <div class="left_content">

                          <div class="info">
                              <div class="description1"><a href="<?php echo url('user/info'); ?>" class="colorblue">修改资料 ></a></div>
                              <div class="description2">绑定手机：<?php echo htmlentities($sessionUserData['mobile']); ?></div>
                              <div class="description2">绑定邮箱：<?php echo htmlentities((isset($sessionUserData['email']) && ($sessionUserData['email'] !== '')?$sessionUserData['email']:'未绑定')); ?></div>
                          </div>
                      </div>
                 </div>
                 <div class="user_index_content2">
                      <div class="item">
                          <div class="icon bg1"> <i class="iconquanbudingdan iconfont"></i></div>
                          <div class="info">
                              <div class="title">
                                  <span class="span1">全部订单：</span>
                                  <span class="span2">1</span>
                              </div>
                              <div class="description"><a href="#" >查看全部付订单 <i class="iconchevron-copy-copy-copy-copy-copy iconfont"></i></a></div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="icon bg2"> <i class="icondaifukuan iconfont"></i></div>
                          <div class="info">
                              <div class="title">
                                  <span class="span1">待支付的订单：</span>
                                  <span class="span2">2</span>
                              </div>
                              <div class="description"><a href="#" >查看待支付订单 <i class="iconchevron-copy-copy-copy-copy-copy iconfont"></i></a></div>
                          </div>
                      </div>
                      <div class="item ">
                          <div class="icon bg3"> <i class="icondaishouhuo iconfont"></i></div>
                          <div class="info">
                              <div class="title">
                                  <span class="span1">待收货的订单：</span>
                                  <span class="span2">3</span>
                              </div>
                              <div class="description"><a href="#" >查看待收货订单 <i class="iconchevron-copy-copy-copy-copy-copy iconfont"></i></a></div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="icon bg4"> <i class="iconshoucang iconfont"></i></div>
                          <div class="info">
                              <div class="title">
                                  <span class="span1">查看收藏商品：</span>

                              </div>
                              <div class="description"><a href="<?php echo url('index/user/collect'); ?>" >查看收藏商品 <i class="iconchevron-copy-copy-copy-copy-copy iconfont"></i></a></div>
                          </div>
                      </div>
                 </div>

              </div>

          </div>


      </div>

  </div>
-->



</body>

</html>