<?php /*a:2:{s:63:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\order\edit.html";i:1598517881;s:64:"D:\phpstudy_pro\WWW\code0921\app\qingadmin\view\public\head.html";i:1591089971;}*/ ?>
<!DOCTYPE HTML>

<html>

<head>

<meta charset="utf-8">

<meta name="renderer" content="webkit|ie-comp|ie-stand">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

<meta http-equiv="Cache-Control" content="no-siteapp" />

<link rel="Bookmark" href="/favicon.ico" >

<link rel="Shortcut Icon" href="/favicon.ico" />

<!--[if lt IE 9]>

<script type="text/javascript" src="lib/html5shiv.js"></script>

<script type="text/javascript" src="lib/respond.min.js"></script>

<![endif]-->

<link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui/css/H-ui.min.css" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/static//h-ui.admin/css/H-ui.admin.css" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui.admin/css/style.css" />

<link rel="stylesheet" type="text/css" href="/public/static/admin/css/common.css" />


<script type="text/javascript" src="/public/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/public/static/admin/layui/layui.js"></script> 

<title>后台管理系统</title>



</head>

<body>



<div class="cl pd-5 bg-1 bk-gray mt-20"> 订单信息</div>

<div class="page-container form form-horizontal">

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">订单号：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php echo htmlentities($orderData['out_trade_no']); ?>
      

    </div>

  </div>

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">订单状态：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php switch($orderData['status']): case "0": ?><span style="color: #b40000;">未支付</span><?php break; case "1": ?><span style="color: #b40000;">已支付，待发货</span><?php break; case "2": ?>已完成<?php break; default: ?><span style="color: #b40000;">待收货</span>
      <?php endswitch; ?>

    </div>

  </div>

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">下单时间：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php echo(date('Y-m-d H:i:s', $orderData['time']));?>

    </div>

  </div>
  <?php if($orderData['status'] != 0): ?>
  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">支付时间：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php echo(date('Y-m-d H:i:s', $orderData['pay_time']));?>

    </div>

  </div>
  <?php endif; ?>


  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">支付方式：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php if($orderData['pay_method']): ?>微信支付<?php else: ?>支付宝支付<?php endif; ?>

    </div>

  </div>

  

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">订单备注：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php echo htmlentities((isset($orderData['content']) && ($orderData['content'] !== '')?$orderData['content']:'暂无备注信息')); ?>

    </div>

  </div>

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">会员手机号：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php echo htmlentities($userData['mobile']); ?>

    </div>

  </div>

  <form action="" method="post">
    <div class="row cl">

      <label class="form-label col-xs-4 col-sm-2">订单总价：</label>
  
      <div class="formControls col-xs-8 col-sm-6">
          
        <?php if($orderData['status'] == 0): ?>
        <input type="text" class="input-text" value="<?php echo htmlentities($orderData['total_price']); ?>"  name="total_price">
        <?php else: ?>
        <?php echo htmlentities($orderData['total_price']); ?>
        <?php endif; ?>
  
      </div>
  
    </div>

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">物流公司</label>

    <div class="formControls col-xs-8 col-sm-6">

      <span class="select-box">

        <select name="express_code" class="select">

          <?php if(is_array($expressData) || $expressData instanceof \think\Collection || $expressData instanceof \think\Paginator): $i = 0; $__LIST__ = $expressData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

          <option value="<?php echo htmlentities($vo['name']); ?>" <?php if($vo['name'] == $orderData['express_code']): ?>selected<?php endif; ?>><?php echo htmlentities($vo['name']); ?>
          </option>

          <?php endforeach; endif; else: echo "" ;endif; ?>

        </select>

      </span>

    </div>

  </div>

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">快递单号：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <input type="text" class="input-text" value="<?php echo htmlentities($orderData['postcode']); ?>" required id="" name="postcode">
      <input type="hidden" class="input-text" value="<?php echo htmlentities($orderData['id']); ?>"  name="id">

    </div>

  </div>



  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2"></label>

    <div class="formControls col-xs-8 col-sm-6">

      <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont"></i> 提交</button>

    </div>

  </div>

</form>





  <div class="cl pd-5 bg-1 bk-gray mt-20"> 收货信息</div>

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">收货人姓名：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php echo htmlentities($addressData['shou_name']); ?>

    </div>

  </div>

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">收货人电话：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php echo htmlentities($addressData['shou_mobile']); ?>

    </div>

  </div>

  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">收货人地址：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <?php echo htmlentities($addressData['shou_address']); ?>

    </div>

  </div>

  <div class="cl pd-5 bg-1 bk-gray mt-20"> 商品信息</div>

  <?php if(is_array($orderGoods) || $orderGoods instanceof \think\Collection || $orderGoods instanceof \think\Paginator): $k = 0; $__LIST__ = $orderGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
  <div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">商品<?php echo htmlentities($k); ?>：</label>

    <div class="formControls col-xs-8 col-sm-6">

      <div style="display: inline-block;"><img src="<?php echo htmlentities($vo['goods_thumb']); ?>" style="width: 100px;height: 100px;margin-right: 15px;"></div>
      <div style="display: inline-block;"><?php echo htmlentities($vo['goods_name']); ?> <br>规格：&nbsp;&nbsp;<?php echo htmlentities($vo['sku']); ?>&nbsp;&nbsp;价钱：<?php echo htmlentities($vo['goods_price']); ?>&nbsp;&nbsp;数量：<?php echo htmlentities($vo['amount']); ?>&nbsp;&nbsp;邮费：<?php echo htmlentities($vo['post_money']); ?></div>

    </div>

  </div>
  <?php endforeach; endif; else: echo "" ;endif; ?>

</div>


</body>

</html>