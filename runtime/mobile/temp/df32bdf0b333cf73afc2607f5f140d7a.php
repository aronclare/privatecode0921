<?php /*a:2:{s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\mobile\view\user\user_edit.html";i:1707903561;s:72:"D:\phpstudy_pro\WWW\privatecode0921\app\mobile\view\public\foot_bar.html";i:1707797701;}*/ ?>
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
            <h2>用户信息</h2>

            <form action="<?php echo url('user/user_update'); ?>" method="post" enctype="multipart/form-data">

                <label><input type="hidden" value="<?php echo htmlentities($user_Data['id']); ?>" name="id"></label><br>


                <label>姓名</label><br>
                <label><input type="text" value="<?php echo htmlentities($user_Data['real_name']); ?>" name="real_name"></label><br>

                <label>身份证号</label><br>
                <label><input type="text" value="<?php echo htmlentities($user_Data['id_number']); ?>" name="id_number"></label><br>

                <label>手机号码</label><br>
                <label><input type="text" value="<?php echo htmlentities($user_Data['mobile']); ?>" name="mobile"></label><br>

                <label>邮箱</label><br>
                <label><input type="text" value="<?php echo htmlentities($user_Data['email']); ?>" name="email"></label><br>

                <label>提现发送地址</label><br>
                <label><input type="text" value="<?php echo htmlentities($user_Data['cash_address']); ?>" name="cash_address"></label><br>

                <label>身份证正面</label><br>
                <label><img src="<?php echo htmlentities($user_Data['id_front_pic']); ?>" alt=""><input type="file" name="id_front_pic"></label><br>

                <label>身份证反面</label><br>
                <label><img src="<?php echo htmlentities($user_Data['id_back_pic']); ?>" alt=""><input type="file" name="id_back_pic"></label><br>

                <label>自拍照</label><br>
                <label><img src="<?php echo htmlentities($user_Data['self_pic']); ?>" alt=""><input type="file" name="self_pic"></label><br>

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

</body>
</html>
