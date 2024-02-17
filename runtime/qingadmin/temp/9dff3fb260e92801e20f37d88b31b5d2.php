<?php /*a:3:{s:68:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\ad\index.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\foot.html";i:1708179639;}*/ ?>
<!--包含头部文件-->

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



<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 广告位管理<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>



<div class="page-container">

  <div class="text-c"> 

  <form method="get" action="">

      <div class="formControls col-xs-8 col-sm-3"> 

        <span class="select-box">

            <select name="type_id" class="select">



              <!-- 这段php代码就为了判定选定的当前状态，选了A栏目，最后应该是默认是A -->

                <?php

                  $type_id=input('get.type_id');

                ?>

                <option value="">全部</option>

                <?php if(is_array($typeData) || $typeData instanceof \think\Collection || $typeData instanceof \think\Paginator): $i = 0; $__LIST__ = $typeData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

                  <option value="<?php echo htmlentities($vo['id']); ?>"

                        <?php if($vo['id'] == $type_id): ?>

                  selected="" 

                  <?php endif; ?>

                  ><?php echo htmlentities($vo['name']); ?></option>

                <?php endforeach; endif; else: echo "" ;endif; ?>

              

            </select>

        </span>

      </div>

      <div class="formControls col-xs-4 col-sm-1">

        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i>搜索</button>

      </div>

    

  </form>

  </div>

  <br><br>



  <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" href="<?php echo url('ad/add'); ?>"><i class="Hui-iconfont">&#xe600;</i> 添加</a></span> <span class="r"></span> </div>



  <div class="mt-20">

    <table class="table table-border table-bordered table-bg table-hover table-sort">

      <thead>

        <tr class="text-c">

          <th width="40">ID</th>

          <th width="150">标题</th>

          <th width="100">图片</th>

          <th width="150">所属分类</th>

          <th width="50">排序<br><span class="tishi" style="font-weight: normal;">数字越小越靠前</span></th>

          <th width="30">状态</th>

          <th width="30">操作</th>

        </tr>

      </thead>

      <tbody>

        <?php if(is_array($adData) || $adData instanceof \think\Collection || $adData instanceof \think\Paginator): $i = 0; $__LIST__ = $adData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

        <tr class="text-c">

          <td><?php echo htmlentities($vo['id']); ?></td>

          <td><?php echo htmlentities($vo['title']); ?></td>

          <td><img src="<?php echo htmlentities($vo['thumb']); ?>" width="100"></td>

          <td><?php echo htmlentities($vo['name']); ?></td>

          <td class="text-c listorder"><input size="10" attr-id="<?php echo htmlentities($vo['id']); ?>" attr-model="ad" name="listorder" value="<?php echo htmlentities($vo['listorder']); ?>"/></td>

          <td class="td-status status">

              

              <?php if($vo['status'] == 1): ?>

              <a href="<?php echo url('base/status',array('id'=>$vo['id'],'dbname'=>'ad','status'=>0)); ?>"><span class='label label-success radius'>正常</span></a>

              <?php else: ?>

              <a href="<?php echo url('base/status',array('id'=>$vo['id'],'dbname'=>'ad','status'=>1)); ?>"><span class='label label-danger radius'>停用</span></a>

              <?php endif; ?>

          

          </td>

          <td class="td-manage"><a style="text-decoration:none" class="ml-5" href="<?php echo url('ad/edit',array('id'=>$vo['id'])); ?>" title="修改"><i class="Hui-iconfont">&#xe6df;</i></a><a style="text-decoration:none" class="ml-5" onClick="o2o_del('<?php echo url('ad/del', ['id'=>$vo['id']]); ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>

        </tr>

      <?php endforeach; endif; else: echo "" ;endif; ?>

        

      </tbody>

    </table>

  </div>

  <?php echo $adData; ?>

</div>

<!--包含头部文件-->

<!--_footer 作为公共模版分离出去-->



<script type="text/javascript" src="/public/static/admin/lib/layer/2.4/layer.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui/js/H-ui.min.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 







<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<script src="/public/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>



<script src="/public/static/admin/js/common.js"></script><!-- 后台公共自定义js -->







