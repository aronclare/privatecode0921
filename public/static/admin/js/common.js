
//公共删除弹出框
function delete_confirm(url){
    layer.confirm('您确定删除吗？', {
        btn: ['确定','取消'] //按钮
      }, function(){
        window.location.href=url;
      });
}


//公共排序方法
$('.listorder input').blur(function() {
    
    //获取主键id
    var id = $(this).attr('attr-id');
    var model=$(this).attr('attr-model');
    var listorder = $(this).val();

    var postData = {
        'id' : id,
        'model':model,
        'listorder':listorder,
    };
    var url = '/qingadmin/base/listorder';
    // 抛送http
    $.post(url, postData, function(result){
        // 逻辑
        console.log(result.msg);
        if(result.code == 1) {
            location.href=result.data;
        }else {
            alert(result.msg);
        }
    },"json");


});


//公共排序方法
$('.goods_listorder input').blur(function() {
    
    //获取主键goods_id
    var goods_id = $(this).attr('attr-id');
    var listorder = $(this).val();

    var postData = {
        'goods_id' : goods_id,
        'listorder':listorder,
    };
    var url = '/qingadmin/goods/goods_listorder';
    // 抛送http
    $.post(url, postData, function(result){
        // 逻辑
        console.log(result.msg);
        if(result.code == 1) {
            location.href=result.data;
        }else {
            alert(result.msg);
        }
    },"json");


});



/**城市相关二级内容**/
$(".cityId").change(function(){
    alert(11);
    city_id = $(this).val();
    // 抛送请求
    url = SCOPE.city_url;
    postData = {'id':city_id};
    $.post(url,postData,function(result){
        //相关的业务处理
        if(result.status == 1) {
            // 将信息填充到html中
            data = result.data;
            city_html = "";
            $(data).each(function(i){
                city_html += "<option value='"+this.id+"'>"+this.name+"</option>";

            });
            $('.se_city_id').html(city_html);
        }else if(result.status == 0) {
            $('.se_city_id').html('');
        }
    }, 'json');
});

/**分类相关二级内容**/
$(".categoryId").change(function(){
    category_id = $(this).val();
    // 抛送请求
    url = SCOPE.category_url;
    postData = {'id':category_id};
    $.post(url,postData,function(result){
        //相关的业务处理
        if(result.status == 1) {
            data = result.data;
            category_html = "";
            $(data).each(function(i){
                category_html += '<input name="se_category_id[]" type="checkbox" id="checkbox-moban" value="'+this.id+'"/>'+this.name;
                category_html += '<label for="checkbox-moban">&nbsp;</label>';
            });
            $('.se_category_id').html(category_html);
        }else if(result.status == 0) {
            $('.se_category_id').html('');
        }
    }, 'json');
});


function selecttime(flag){
    if(flag==1){
        var endTime = $("#countTimeend").val();
        if(endTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:endTime});
        }else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'});
        }
    }else{
        var startTime = $("#countTimestart").val();
        if(startTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime});
        }else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'});
        }
    }
}