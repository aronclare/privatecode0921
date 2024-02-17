<?php /*a:4:{s:67:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\ad\edit.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1708179639;s:76:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\ad_upload.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\foot.html";i:1708179639;}*/ ?>
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

<div class="cl pd-5 bg-1 bk-gray mt-20"> 编辑</div>

<article class="page-container">

  <form class="form form-horizontal" id="form-article-add" method="post" action="<?php echo url('ad/edit'); ?>" enctype="multipart/form-data">

    <div class="row cl">

      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>标题：</label>

      <div class="formControls col-xs-8 col-sm-9">

        <input type="text" class="input-text" value="<?php echo htmlentities($adData['title']); ?>" placeholder="" id="" name="title">

        <input type="hidden" class="input-text" value="<?php echo htmlentities($adData['id']); ?>" placeholder="" id="" name="id">

      </div>

    </div>



    <!-- 引入图片上传文件开始-->

<link href="/public/static/admin/lib/webuploader/webuploader.css" rel="stylesheet">
<link href="/public/static/admin/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="/public/static/admin/lib/webuploader/webuploader.js"></script>


<style>
    .webuploader-pick {

        padding: 5px 15px;

    }

    .cancel {

        width: 24px;

        height: 24px;

        display: inline;

        float: right;

        text-indent: -9999px;

        overflow: hidden;

        background: url("/public/static/admin/lib/webuploader/images/icons.png") no-repeat -47px 0px;

        margin: 5px 1px 1px;

        cursor: pointer;

    }
</style>

<div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">上传图片：</label>

    <div id="uploader-demo" class="formControls col-xs-8 col-sm-8">

        <div id="fileList" class="uploader-list">

            <?php if($adData['thumb']): ?>

            <div id="WU_FILE_0" class="file-item thumbnail upload-state-done">

                <img src="<?php echo htmlentities($adData['thumb']); ?>"  style="max-width:100px;height: 100px;">

                <div class="info"><span onclick='removefile("WU_FILE_0")'>删除</span></div>

                <input type="hidden" value="<?php echo htmlentities($adData['thumb']); ?>" name="thumb">
            </div>

            <?php else: ?>

            <div id="WU_FILE_0" class="file-item thumbnail ">

                <img src="/public/static/index/images/thumb.jpg" />

                <input type="hidden" value="/public/static/index/images/thumb.jpg" name="thumb">
            </div>

            <?php endif; ?>

        </div>
        <div id="filePicker">点击上传</div><br><br>
        

    </div>

    <script>

        jQuery(function () {

            var $ = jQuery,

                $list = $('#fileList'),

                // 优化retina, 在retina下这个值是2

                ratio = window.devicePixelRatio || 1,


                // 缩略图大小

                thumbnailWidth = 100 * ratio,

                thumbnailHeight = 100 * ratio,


                // Web Uploader实例

                uploader;


            // 初始化Web Uploader

            uploader = WebUploader.create({


                // 自动上传。

                auto: true,


                // swf文件路径

                swf: '/public/static/admin/hui/lib/webuploader/Uploader.swf',


                // 后台文件接收服务端。

                server: '/index.php/qingadmin/uploader/local_upload',


                // 选择文件的按钮。可选。

                // 内部根据当前运行是创建，可能是input元素，也可能是flash.

                pick: '#filePicker',

                duplicate: true,

                accept: {

                    title: 'Images',

                    extensions: 'jpg,jpeg,png',

                    mimeTypes: 'image/jpg,image/jpeg,image/png'   

                }

            });


            // 当有文件添加进来的时候

            uploader.on('fileQueued', function (file) {


                // 创建缩略图

                uploader.makeThumb(file, function (error, src) {

                    if (error) {

                        $img.replaceWith('<span>不能预览</span>');

                        return;

                    }

                    $("#WU_FILE_0").children('img').attr('src', src);

                    var del='<div class="info" ><span  onclick="removefile()">删除</span></div>';
                    if($(".info").length<1){
                        $("#WU_FILE_0").append(del);
                    }


                }, thumbnailWidth, thumbnailHeight);

            });


            // 文件上传成功，给item添加成功class, 用样式标记上传成功。

            uploader.on('uploadSuccess', function (file, response) {

                if(response.code==422){
                    alert('请上传jpg格式、小于100Kb的图片');
                    $('#' + file.id).removeClass('upload-state-done');
                    $("input[name='thumb']").val('');
                    var $li = $('#' + file.id),

                    $error = $li.find('div.error');

                    // 避免重复创建

                    if (!$error.length) {

                        $error = $('<div class="error"></div>').appendTo($li);

                    }

                    $error.text('上传失败');
                }
                if(response.code==1){
                    $('#WU_FILE_0').addClass('upload-state-done');
                    $("input[name='thumb']").val(response.message);
                    $(".error").css('display','none');
                }

                

            });



            // 文件上传失败，现实上传出错。

            uploader.on('uploadError', function (file,response) {
                var $li = $('#' + file.id),

                $error = $li.find('div.error');


                // 避免重复创建

                if (!$error.length) {

                    $error = $('<div class="error"></div>').appendTo($li);

                }

                $error.text('上传失败');

            });

        });



        function removefile(remove_id) {

            var cover = $("input[name='thumb']").val();//图片路径

            var url = "/index.php/qingadmin/uploader/remove_img";//请求服务端

            //询问框

            layer.confirm('是否删除？', {

                btn: ['确定', '取消'] //按钮

            }, function () {
                $.post(url, {cover:cover}, function (result) {

                    //弹出提示消息

                    if (result.status==1) { 

                        $("#WU_FILE_0 .info").remove();
                        $("#WU_FILE_0").removeClass('upload-state-done');
                        $("#WU_FILE_0").children('img').attr('src','/public/static/index/images/thumb.jpg');
                       
                        layer.msg(result.info, {icon: 1})

                    } else {

                        layer.msg(result.info, {icon: 2})

                    }

                });

            }, function () {

                layer.close();

            });

        };

    </script>

</div>

<!-- 引入图片上传文件结束-->



    <div class="row cl">

      <label class="form-label col-xs-4 col-sm-2">所属分类：</label>

      <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">

				<select name="type_id" class="select">



                  <option value="">选择分类</option>

                  <?php if(is_array($types) || $types instanceof \think\Collection || $types instanceof \think\Paginator): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

                  <option value="<?php echo htmlentities($vo['id']); ?>"

                  <?php if($vo['id'] == $adData['type_id']): ?>

                    selected="selected"

                  <?php endif; ?>

                  ><?php echo htmlentities($vo['name']); ?></option>

                  <?php endforeach; endif; else: echo "" ;endif; ?>

        </select>

				</span>

      </div>

    </div>

    <div class="row cl">

      <label class="form-label col-xs-4 col-sm-2">链接地址：</label>

      <div class="formControls col-xs-8 col-sm-9">

        <input type="text" class="input-text" value="<?php echo htmlentities($adData['url']); ?>" placeholder="" id="" name="url">

      </div>

    </div>



     <div class="row cl">

      <label class="form-label col-xs-4 col-sm-2">描述：</label>

      <div class="formControls col-xs-8 col-sm-9">

        <textarea name="description" class="textarea"><?php echo htmlentities($adData['description']); ?></textarea>

      </div>

    </div>

    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-2">内容：</label>
      <div class="formControls col-xs-8 col-sm-9">
         <script id="editor"  type="text/plain" name="content" style="width:100%;height:300px;">
         <?php echo htmlentities(html_entity_decode($adData['content'])); ?></script>

      </div>
    </div>



    <div class="row cl">

      <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">

        <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 更新</button>

      </div>

    </div>

  </form>

</article>

<script>

  /**定义页面全局变量**/

  var SCOPE = {

  };

</script>

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






<script type="text/javascript" src="__STATIC__/admin/hui/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script src="__STATIC__/admin/hui/lib/My97DatePicker/WdatePicker.js"></script>
<script>
  $(function(){
    var ue = UE.getEditor('editor');
  });
</script>