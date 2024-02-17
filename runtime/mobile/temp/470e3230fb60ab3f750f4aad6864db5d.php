<?php /*a:1:{s:76:"D:\phpstudy_pro\WWW\privatecode0921\app\mobile\view\user\login_username.html";i:1708179639;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>登录</title>
  <link rel="stylesheet" href="/public/static/mobile/css/common.css">
  <link rel="stylesheet" href="/public/static/mobile/css/user.css">
  <link rel="stylesheet" href="http://at.alicdn.com/t/font_1646840_uy9mnvs66up.css">
</head>

<body>
    <div class="user_logo">
        <div class="pic"><img src="/public/static/mobile/images/logo.png" alt=""></div>
        <div class="text">会员登录</div>
    </div>



   <!-- <div class="user_input_box">
        <input type="text" placeholder="手机号码" class="input">
    </div>
    <div class="password_input_box">
        <div class="left_content"><input type="text" placeholder="短信验证码" class="input"></div>
        <div class="right_content">获取验证码</div>
    </div>
    <div class="user_login_btn">立即登录</div>
    <div class="user_login_btn2">用户名密码登录</div>-->


    <form method="post" action="">

        <div class="user_input_box">
            <input type="text" name="username" placeholder="请输入用户名" class="input">
        </div>
        <div class="password_input_box">
            <div class="left_content"><input type="password" name="password" placeholder="请输入密码" class="input"></div>
        </div>
        <div class="user_login_btn">
            <button class="btn">立即登录</button>

        </div>

    </form>


    <a href="<?php echo url('user/register'); ?>">
        <button class="btn_reg">立即注册</button>
    </a>






    <div class="other_style">
        <div class="line"></div>
        <div class="text">其他方式登录</div>
        <div class="line"></div>
    </div>
    <div class="user_weichat"><i class="iconfont iconweixin"></i></div>


    <style>
        .btn_reg{
            float: right;
            background-color: #ff6700;
        }
        .password_input_box .right_content{
            font-size: 12px;
        }
        button{
            background-color: #ff6700;
            color: #757575;
        }

        #think_page_trace_open{
            display: none;
        }
    </style>
    
</body>

</html>