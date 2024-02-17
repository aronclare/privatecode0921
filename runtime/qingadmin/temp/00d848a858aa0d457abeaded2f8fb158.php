<?php /*a:4:{s:69:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\goods\add.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\head.html";i:1708179639;s:72:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\image.html";i:1708179639;s:71:"D:\phpstudy_pro\WWW\privatecode0921\app\qingadmin\view\public\foot.html";i:1708179639;}*/ ?>
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





<link type="text/css" rel="stylesheet" href="/public/static/admin/css/liandong.css">

<article class="page-container">



  <form class="form form-horizontal"  method="post" action="<?php echo url('goods/save'); ?>"
    enctype="multipart/form-data">



    <div class="row cl">



      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品名称：</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input type="text" class="input-text" value="" placeholder="商品名称" required name="goods_name">



      </div>



    </div>



    <div class="row cl">



      <label class="form-label col-xs-4 col-sm-2">商品卖点：</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input type="text" class="input-text" value="" placeholder="请填写稍微短些的名称" name="goods_short_name">



      </div>



    </div>



    <div class="row cl">

      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属分类：</label>



      <div class="formControls col-xs-8 col-sm-2">



        <span class="select-box">



          <select name="cate1" class="select select1" required>
            <option value="">选择分类</option>

            <?php if(is_array($categoryData) || $categoryData instanceof \think\Collection || $categoryData instanceof \think\Paginator): $i = 0; $__LIST__ = $categoryData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

            <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['cate_name']); ?></option>



            <?php endforeach; endif; else: echo "" ;endif; ?>



          </select>



        </span>



      </div>
      <div class="formControls col-xs-8 col-sm-2">



        <span class="select-box">



          <select name="cate2" class="select select2" required>
            <option value="">选择分类</option>

          </select>



        </span>



      </div>
      <div class="formControls col-xs-8 col-sm-2">



        <span class="select-box">



          <select name="goods_cate_id" class="select select3" required>

            <option value="">选择分类</option>
          </select>



        </span>



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

    #fileList img {
        width: 100px;
        height: 100px;
    }
</style>

<div class="row cl">

    <label class="form-label col-xs-4 col-sm-2">上传图片：</label>

    <div id="uploader-demo" class="formControls col-xs-8 col-sm-8">

        <div id="fileList" class="uploader-list">

            <?php if($image): if(is_array($image) || $image instanceof \think\Collection || $image instanceof \think\Paginator): $i = 0; $__LIST__ = $image;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

            <div id="WU_FILE_<?php echo htmlentities($key); ?>0" class="file-item thumbnail upload-state-done">

                <img src="<?php echo htmlentities($vo['image']); ?>" />

                <div class="info"><span onclick='removefile("WU_FILE_<?php echo htmlentities($key); ?>0")'><i
                            class="fa fa-trash-o fa-lg"></i></span><span onclick="prevpic(this)"><i
                            class="fa fa-arrow-left fa-lg"></i></span><span onclick="nextpic(this)"><i
                            class="fa fa-arrow-right fa-lg"></i></span></div>

                <input type="hidden" value="<?php echo htmlentities($vo['image']); ?>" name="image[]">

            </div>

            <?php endforeach; endif; else: echo "" ;endif; ?>

            <?php endif; ?>

        </div>

        <div id="filePicker">点击上传</div><br><br>
        <div class="tishi">提示：第一张图将作为封面图展示</div>

    </div>

    <script>

        jQuery(function () {

            var $ = jQuery,

                $list = $('#fileList'),

                // 优化retina, 在retina下这个值是2

                ratio = window.devicePixelRatio || 1,



                // 缩略图大小

                thumbnailWidth = 120 * ratio,

                thumbnailHeight = 120 * ratio,



                // Web Uploader实例

                uploader;



            // 初始化Web Uploader

            uploader = WebUploader.create({



                // 自动上传。

                auto: true,



                // swf文件路径

                swf: '/public/static/lib/webuploader/Uploader.swf',





                // 文件接收服务端。



                server: '/index.php/qingadmin/uploader/local_upload',



                // 选择文件的按钮。可选。

                // 内部根据当前运行是创建，可能是input元素，也可能是flash.

                pick: '#filePicker',

                duplicate: true,

                accept: {

                    title: 'Images',

                    extensions: 'jpg,jpeg,png',

                    mimeTypes: 'image/jpg,image/jpeg,image/png'   //修改这行

                }

            });



            // 当有文件添加进来的时候

            uploader.on('fileQueued', function (file) {

                var $li = $(

                    '<div id="' + file.id + '" class="file-item thumbnail">' +

                    '<img>' +

                    '<div class="info" ><span  onclick="removefile(\'' + file.id + '\')"><i class="fa fa-trash-o fa-lg"></i></span><span onclick="prevpic(this)"><i class="fa fa-arrow-left fa-lg"></i></span><span onclick="nextpic(this)"><i class="fa fa-arrow-right fa-lg"></i></span></div>' +

                    '</div>'

                ),

                    $img = $li.find('img');

                console.log($li);

                $list.append($li);



                // 创建缩略图

                uploader.makeThumb(file, function (error, src) {

                    if (error) {

                        $img.replaceWith('<span>不能预览</span>');

                        return;

                    }

                    $img.attr('src', src);

                }, thumbnailWidth, thumbnailHeight);

            });



            // 文件上传过程中创建进度条实时显示。

            uploader.on('uploadProgress', function (file, percentage) {

                var $li = $('#' + file.id), $percent = $li.find('.progress span');



                // 避免重复创建

                if (!$percent.length) {

                    $percent = $('<p class="progress"><span></span></p>').appendTo($li).find('span');

                }

                $percent.css('width', percentage * 100 + '%');

            });



            // 文件上传成功，给item添加成功class, 用样式标记上传成功。

            uploader.on('uploadSuccess', function (file, response) {

                //alert(JSON.stringify(response));

                $('#' + file.id).addClass('upload-state-done');

                var n = '<input type="hidden" value="' + response.message + '" name="image[]">';

                $('#' + file.id).append(n);



            });



            // 文件上传失败，现实上传出错。

            uploader.on('uploadError', function (file) {

                var $li = $('#' + file.id),

                    $error = $li.find('div.error');



                // 避免重复创建

                if (!$error.length) {

                    $error = $('<div class="error"></div>').appendTo($li);

                }



                $error.text('上传失败');

            });



            // 完成上传完了，成功或者失败，先删除进度条。

            uploader.on('uploadComplete', function (file) {

                $('#' + file.id).find('.progress').remove();

            });

        });

        function removefile(id) {

            var cover = $('#' + id + '').find('input').val();

            var url = "/qingadmin/uploader/remove_goods_img.html";

           if( $("input[name='goods_id']").length>0){
               goods_id=$("input[name='goods_id']").val();
           }else{
               goods_id=0;
           }
         
            //询问框

            layer.confirm('是否删除？', {

                btn: ['确定', '取消'] //按钮

            }, function () {

                $.post(url, { cover: cover,goods_id:goods_id }, function (a) {

                    //弹出提示消息

                    if (a.status) {
                        layer.msg(a.info, { icon: 1 })

                    } else {

                        layer.msg(a.info, { icon: 2 })

                    }

                    $('#' + id + '').remove();

                });

            }, function () {

                layer.close();

            });

        };

        function nextpic(a) {
            var current = $(a).parent().parent();
            var next = $(a).parent().parent().next();
            next.after(current);
        }
        function prevpic(a) {
            var current = $(a).parent().parent();
            var prev = $(a).parent().parent().prev();
            current.after(prev);
        }
    </script>



</div>

<!-- 引入图片上传文件结束-->


    <div class="row cl">



      <label class="form-label col-xs-4 col-sm-2">商品描述:</label>



      <div class="formControls col-xs-8 col-sm-6">



        <textarea name="description" class="textarea" placeholder="seo描述"></textarea>



      </div>



    </div>





    <div class="row cl">



      <label class="form-label col-xs-4 col-sm-2">商品关键字：</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input type="text" class="input-text" placeholder="商品关键字" name="keywords">



      </div>



    </div>

    <div class="row cl">



      <label class="form-label col-xs-4 col-sm-2">邮费：</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input type="text" class="input-text" placeholder="邮费" name="post_money" value="0">



      </div>



    </div>





    <div class="row cl">



      <label class="form-label col-xs-4 col-sm-2">是否是精品：</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input value="1" name="isbest" type="radio" checked="checked"> 是



        <input value="0" name="isbest" type="radio"> 否



      </div>



    </div>


    <div class="row cl">



      <label class="form-label col-xs-4 col-sm-2">是否是热销：</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input value="1" name="ishot" type="radio" checked="checked"> 是



        <input value="0" name="ishot" type="radio"> 否



      </div>



    </div>









    <div class="row cl">



      <label class="form-label col-xs-4 col-sm-2">规格：</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input value="1" name="single_standard" type="radio" class="single_standard1" checked="checked"> 统一规格

        <input value="2" name="single_standard" type="radio" class="single_standard2"  style="margin-left: 30px;"> 多规格



      </div>



    </div>

    <div class="row cl single_standard1_content">



      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品价格:</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input type="text" class="input-text" value="0" placeholder="商品价格" id="" name="goods_price" required>



      </div>



    </div>







    <div class="row cl single_standard1_content">



      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>市场价格:</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input type="text" class="input-text" value="0" placeholder="市场价格" id="" name="market_price" required>



      </div>



    </div>

    <div class="row cl single_standard1_content">



      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>库存:</label>



      <div class="formControls col-xs-8 col-sm-6">



        <input type="text" class="input-text" value="0" placeholder="库存" id="" name="stock" required>



      </div>



    </div>



    <div class="row cl single_standard2_content">



      <label class="form-label col-xs-4 col-sm-2">所属类型：</label>



      <div class="formControls col-xs-8 col-sm-8">



        <span class="select-box">



          <select name="type_id" class="select">



            <option value="">所属类型</option>



            <?php if(is_array($types) || $types instanceof \think\Collection || $types instanceof \think\Paginator): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>



            <option value="<?php echo htmlentities($vo1['id']); ?>"><?php echo htmlentities($vo1['type_name']); ?></option>



            <?php endforeach; endif; else: echo "" ;endif; ?>



          </select>



        </span>



        <div class="formControls" id="attr_container" style="margin-top: 20px;"> </div>

        <!-- 多规格生成表格 -->



        <div id="navtab1" style="width: 100%; border: 1px solid #A3C0E8;">

          <div title="扩展信息" tabid="tabItem3">

            <div id="Div1">

              <div position="center">

                <div style="padding: 5px 8px;" class="div_content">

                  <div class="div_contentlist"></div>

                  <div class="div_contentlist2">

                    <ul>

                      <li>
                        <div id="createTable"></div>
                      </li>

                    </ul>



                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>







      </div>



    </div>





    <div class="row cl">



      <label class="form-label col-xs-4 col-sm-2">商品简介：</label>



      <div class="formControls col-xs-8 col-sm-9">



        <script id="editor" type="text/plain" name="content" style="width:100%;height:300px;"></script>



      </div>



    </div>



    <div class="row cl">



      <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">


        <button type="submit" class="btn btn-primary radius" ><i class="Hui-iconfont">&#xe632;</i> 提交</button>


      </div>



    </div>



  </form>



</article>







<style type="text/css">
  .standardtable {
    border-collapse: collapse;
  }

  .standardtable input,
  select {
    border: 1px solid #eee;
  }

  .standardtable td {
    border: 1px solid #ddd;
    text-align: center;
    padding: 5px
  }
  .single_standard2_content{
    display: none;
  }
</style>



<script>

  $(function () {

    var ue = UE.getEditor('editor');

    //统一规格 多规格切换
    $(".single_standard1").click(function () {

        $(".single_standard1_content").css("display", "block");
        $(".single_standard2_content").css("display", "none");

    });
    //统一规格 多规格切换
    $(".single_standard2").click(function () {

      $(".single_standard1_content").css("display", "none");
      $(".single_standard2_content").css("display", "block");

    });

    $(".select1").change(function(){
      var html='<option>选择分类</option>';
      var parent_id=$(".select1").val();
      $.ajax({

        type: "GET",

        url: "/qingadmin/category/ajaxGetCateByP/parent_id/" + parent_id,

        dataType: "json",

        success: function (data) {
              $(data).each(function (k, v) {
                html+="<option value='"+v.id+"'>"+v.cate_name+"</option>";
              });
            $(".select2").html(html);
        }
      });
      
    });

    $(".select2").change(function(){
      var html='';
      var parent_id=$(".select2").val();
      $.ajax({

        type: "GET",

        url: "/qingadmin/category/ajaxGetCateByP/parent_id/" + parent_id,

        dataType: "json",

        success: function (data) {
              $(data).each(function (k, v) {
                html+="<option value='"+v.id+"'>"+v.cate_name+"</option>";
              });
            $(".select3").html(html);
        }
      });
      
    });

  });



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







<script>



  // 当选择类型时执行AJAX取出类型的属性



  $("select[name=type_id]").change(function () {



    // 获取选中的类型的id



    var type_id = $(this).val();



    if (type_id != "") {



      $.ajax({



        type: "GET",



        url: "/qingadmin/goods/ajaxGetAttr/type_id/" + type_id,



        dataType: "json",



        success: function (data) {



          $("#navtab1").css("display", "inline-block");

          var html = "";



          // 循环服务器返回的属性的JSON数据



          $(data).each(function (k, v) {

            html += "<ul class='Father_Title'><li>" + v.name + "</li></ul><ul class='Father_Item" + k + "'>";

            $(v.standard_value).each(function (k1, v1){

              html+="<li class='li_width'><label onclick='step.Creat_Table()'><input type='checkbox'  value='"+v1.id+"' name='standard_value_id["+v1.standard_id+"][]'/><span class='standard_value'>"+v1.standard_value+"</span></label></li>";

            });


            html += "</ul>";

          });





          $(".div_contentlist").html(html);





        }



      });



    }



    else



      $("#attr_container").html("");



  });







</script>









<script>



  var step = {

    //SKU信息组合

    Creat_Table: function () {

      step.hebingFunction();

      var SKUObj = $(".Father_Title");

      //var skuCount = SKUObj.length;//

      var arrayTile = new Array();//标题组数

      var arrayInfor = new Array();//盛放每组选中的CheckBox值的对象

      var arrayColumn = new Array();//指定列，用来合并哪些列

      var bCheck = true;//是否全选

      var columnIndex = 0;

      $.each(SKUObj, function (i, item) {

        arrayColumn.push(columnIndex);

        columnIndex++;

        arrayTile.push(SKUObj.find("li").eq(i).html().replace("：", ""));

        var itemName = "Father_Item" + i;

        //选中的CHeckBox取值

        var order = new Array();

        $("." + itemName + " input[type=checkbox]:checked").each(function () {

          order.push($(this).parent().children(".standard_value").text());

        });

        arrayInfor.push(order);

        if (order.join() == "") {

          bCheck = false;

        }

        //var skuValue = SKUObj.find("li").eq(index).html();

      });

      //开始创建Table表

      if (bCheck == true) {

        var RowsCount = 0;

        $("#createTable").html("");

        var table = $("<table id=\"process\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" style=\"width:100%;padding:5px;\"></table>");

        table.appendTo($("#createTable"));

        var thead = $("<thead></thead>");

        thead.appendTo(table);

        var trHead = $("<tr></tr>");

        trHead.appendTo(thead);

        //创建表头

        $.each(arrayTile, function (index, item) {

          var td = $("<th>" + item + "</th>");

          td.appendTo(trHead);

        });

        var itemColumHead = $("<th  style=\"width:70px;\">价格</th> <th  style=\"width:70px;\">市场价格</th><th  style=\"width:70px;\">库存</th>");

        itemColumHead.appendTo(trHead);

        //var itemColumHead2 = $("<td >商家编码</td><td >商品条形码</td>");

        //itemColumHead2.appendTo(trHead);

        var tbody = $("<tbody></tbody>");

        tbody.appendTo(table);

        ////生成组合

        var zuheDate = step.doExchange(arrayInfor);

        if (zuheDate.length > 0) {

          //创建行

          $.each(zuheDate, function (index, item) {

            var td_array = item.split(",");

            var tr = $("<tr></tr>");

            tr.appendTo(tbody);

            $.each(td_array, function (i, values) {

              var td = $("<td>" + values + "</td>");

              td.appendTo(tr);

            });

            var price = $("input[name='goods_price']").val();

            console.log(price);

            var td1 = $("<td ><input name=\"goods_price[]\" class=\"input-text\" type=\"text\" value=\"0\"></td>");

            td1.appendTo(tr);

            var td2 = $("<td ><input name=\"market_price[]\" class=\"input-text\" type=\"text\" value=\"0\"></td>");

             td2.appendTo(tr);

            var td3 = $("<td ><input name=\"stock[]\" class=\"input-text\" type=\"text\" value=\"0\"></td>");

            td3.appendTo(tr);

            //var td4 = $("<td ><input name=\"Txt_SnSon\" class=\"l-text\" type=\"text\" value=\"\"></td>");

            //td4.appendTo(tr);

          });

        }

        //结束创建Table表

        arrayColumn.pop();//删除数组中最后一项

        //合并单元格

        $(table).mergeCell({

          // 目前只有cols这么一个配置项, 用数组表示列的索引,从0开始

          cols: arrayColumn

        });

      } else {

        //未全选中,清除表格

        document.getElementById('createTable').innerHTML = "";

      }

    },//合并行

    hebingFunction: function () {

      $.fn.mergeCell = function (options) {

        return this.each(function () {

          var cols = options.cols;

          for (var i = cols.length - 1; cols[i] != undefined; i--) {

            // fixbug console调试

            // console.debug(cols[i]);

            mergeCell($(this), cols[i]);

          }

          dispose($(this));

        });

      };

      function mergeCell($table, colIndex) {

        $table.data('col-content', ''); // 存放单元格内容

        $table.data('col-rowspan', 1); // 存放计算的rowspan值 默认为1

        $table.data('col-td', $()); // 存放发现的第一个与前一行比较结果不同td(jQuery封装过的), 默认一个"空"的jquery对象

        $table.data('trNum', $('tbody tr', $table).length); // 要处理表格的总行数, 用于最后一行做特殊处理时进行判断之用

        // 进行"扫面"处理 关键是定位col-td, 和其对应的rowspan

        $('tbody tr', $table).each(function (index) {

          // td:eq中的colIndex即列索引

          var $td = $('td:eq(' + colIndex + ')', this);

          // 取出单元格的当前内容

          var currentContent = $td.html();

          // 第一次时走此分支

          if ($table.data('col-content') == '') {

            $table.data('col-content', currentContent);

            $table.data('col-td', $td);

          } else {

            // 上一行与当前行内容相同

            if ($table.data('col-content') == currentContent) {

              // 上一行与当前行内容相同则col-rowspan累加, 保存新值

              var rowspan = $table.data('col-rowspan') + 1;

              $table.data('col-rowspan', rowspan);

              // 值得注意的是 如果用了$td.remove()就会对其他列的处理造成影响

              $td.hide();

              // 最后一行的情况比较特殊一点

              // 比如最后2行 td中的内容是一样的, 那么到最后一行就应该把此时的col-td里保存的td设置rowspan

              if (++index == $table.data('trNum'))

                $table.data('col-td').attr('rowspan', $table.data('col-rowspan'));

            } else { // 上一行与当前行内容不同

              // col-rowspan默认为1, 如果统计出的col-rowspan没有变化, 不处理

              if ($table.data('col-rowspan') != 1) {

                $table.data('col-td').attr('rowspan', $table.data('col-rowspan'));

              }

              // 保存第一次出现不同内容的td, 和其内容, 重置col-rowspan

              $table.data('col-td', $td);

              $table.data('col-content', $td.html());

              $table.data('col-rowspan', 1);

            }

          }

        });

      }

      // 同样是个private函数 清理内存之用

      function dispose($table) {

        $table.removeData();

      }

    },

    //组合数组

    doExchange: function (doubleArrays) {

      var len = doubleArrays.length;

      if (len >= 2) {

        var arr1 = doubleArrays[0];

        var arr2 = doubleArrays[1];

        var len1 = doubleArrays[0].length;

        var len2 = doubleArrays[1].length;

        var newlen = len1 * len2;

        var temp = new Array(newlen);

        var index = 0;

        for (var i = 0; i < len1; i++) {

          for (var j = 0; j < len2; j++) {

            temp[index] = arr1[i] + "," + arr2[j];

            index++;

          }

        }

        var newArray = new Array(len - 1);

        newArray[0] = temp;

        if (len > 2) {

          var _count = 1;

          for (var i = 2; i < len; i++) {

            newArray[_count] = doubleArrays[i];

            _count++;

          }

        }

        //console.log(newArray);

        return step.doExchange(newArray);

      }

      else {

        return doubleArrays[0];

      }

    }

  }



</script>

</body>



</html>