<?php /*a:4:{s:72:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\category\add.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1708179639;s:85:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\categoryimg_upload.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\foot.html";i:1708179639;}*/ ?>
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

<div class="page-container">

	<form class="form form-horizontal form-o2o-add" id="form-o2o-add" method="post" action="" enctype="multipart/form-data">

		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<span>基本信息</span>
				<span>SEO信息</span>
				<span>栏目内容</span>
			</div>
			<div class="tabCon">

				<div class="row cl">

					<label class="form-label col-xs-4 col-sm-2">分类名称：</label>

					<div class="formControls col-xs-8 col-sm-9">

						<input type="text" class="input-text" value="" placeholder="" id="cate_name" name="cate_name" required="required">
						<span class="tishi">如果为批量添加多个栏目，请用英文逗号隔开</span>

					</div>

				</div>


			
				
				<div class="row cl">

					<label class="form-label col-xs-4 col-sm-2">上级栏目：</label>

					<div class="formControls col-xs-8 col-sm-9">

						<span class="select-box">

						<select name="parent_id" class="select">

							<option value="0">顶级分类</option>

							<?php if(is_array($categoryTree) || $categoryTree instanceof \think\Collection || $categoryTree instanceof \think\Paginator): $i = 0; $__LIST__ = $categoryTree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

							<option value="<?php echo htmlentities($vo['id']); ?>"  <?php if($parent_id == $vo['id']): ?>selected=selected<?php endif; ?>><?php echo str_repeat('-', 8*$vo['cate_level']); ?><?php echo htmlentities($vo['cate_name']); ?></option>

							<?php endforeach; endif; else: echo "" ;endif; ?>

						</select>

						</span>

					</div>

				</div>

				<div class="row cl">

						<label class="form-label col-xs-4 col-sm-2">商品类型：</label>
	
						<div class="formControls col-xs-8 col-sm-9">
	
							<span class="select-box">
	
							<select name="type_id" class="select">
								<option value="">无</option>
	
								<?php if(is_array($typeData) || $typeData instanceof \think\Collection || $typeData instanceof \think\Paginator): $i = 0; $__LIST__ = $typeData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	
								<option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['type_name']); ?></option>
	
								<?php endforeach; endif; else: echo "" ;endif; ?>
	
							</select>
	
							</span>
	
						</div>
	
					</div>

			

				<div class="row cl">

				      <label class="form-label col-xs-4 col-sm-2">外部链接：</label>

				      <div class="formControls col-xs-8 col-sm-6">

				        <input type="text" class="input-text" value="" placeholder="" name="link" >

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

            <?php if($categoryData['thumb']): ?>

            <div id="WU_FILE_0" class="file-item thumbnail upload-state-done">

                <img src="<?php echo htmlentities($categoryData['thumb']); ?>"  style="max-width:100px;height: 100px;">

                <div class="info"><span onclick='removefile("WU_FILE_0")'>删除</span></div>

                <input type="hidden" value="<?php echo htmlentities($categoryData['thumb']); ?>" name="thumb">
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

			</div>

			<!-- SEO信息 -->
			<div class="tabCon">
						
				<div class="row cl">

			      <label class="form-label col-xs-4 col-sm-2">SEO标题：</label>

			      <div class="formControls col-xs-8 col-sm-9">

			        <input type="text" class="input-text"  name="seo_title">

			      </div>

			    </div>

			    <div class="row cl">

			      <label class="form-label col-xs-4 col-sm-2">SEO关键词：</label>

			      <div class="formControls col-xs-8 col-sm-9">

			        <input type="text" class="input-text"  name="seo_keywords">

			      </div>

			    </div>

			    <div class="row cl">

			      <label class="form-label col-xs-4 col-sm-2">SEO描述：</label>

			      <div class="formControls col-xs-8 col-sm-9">

			        <textarea name="seo_description" class="textarea"></textarea>

			      </div>

			    </div>

			</div>


			<!-- 栏目内容 -->
			<div class="tabCon">

				<div class="row cl">
			      <label class="form-label col-xs-4 col-sm-2">内容：</label>
			      <div class="formControls col-xs-8 col-sm-9">
			        <script id="editor"  type="text/plain" name="content" style="width:100%;height:370px;"></script>

			      </div>
			    </div>

			</div>

		</div>


		<div class="row cl">

			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">

				<button  type="submit" class="btn btn-primary radius" ><i class="Hui-iconfont">&#xe632;</i> 保存</button>

				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>

			</div>

		</div>


	</form>

</div>

</div>

<!--包含头部文件-->


<script>

  /**定义页面全局变量**/

  var SCOPE = {

  };


</script>

<!--包含头部文件-->



<script>
  $(function(){
    var ue = UE.getEditor('editor');
  });
</script>
<!--_footer 作为公共模版分离出去-->



<script type="text/javascript" src="/public/static/admin/lib/layer/2.4/layer.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui/js/H-ui.min.js"></script>

<script type="text/javascript" src="/public/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 







<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<script src="/public/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>



<script src="/public/static/admin/js/common.js"></script><!-- 后台公共自定义js -->





<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$("#tab-system").Huitab({
		index:0
	});
});
</script>
