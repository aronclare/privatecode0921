$(function () {
  //新增收货地址弹窗
  $('.add_address').click(function () {
    $('.mask').css("display", "block");
    $('.address_box').css("display", "block");
  });

  //修改收货地址弹窗
  $('.edit_address').click(function () {
    $('.mask').css("display", "block");
    $('.address_box').css("display", "block");
  });

  //收货地址关闭按钮
  $('.address_close').click(function () {
    $('.mask').css("display", "none");
    $('.address_box').css("display", "none");
  });

  //删除收货地址弹窗
  $('.delete_address').click(function () {
    var tr = $(this).parent().parent();
    var id = $(this).parent().attr('attr-id');
    var url = '/shop/user/delete_address';
    layer.confirm('您确定要删除吗？', {
      btn: ['确定', '取消'] //按钮
    }, function () {
      postData = { 'id': id };

      $.post(url, postData, function (result) {
        //result=JSON.parse(result);
        if (result.status == 1) {
          tr.remove();
          layer.closeAll('dialog');
        }
      });

    }, function () {
      layer.closeAll('dialog');
    });
  });

  //优惠券滑动门
  $(".coupons_title .title_box .title").click(function(){

    // 获取点击的是第几个按钮
  
    var i = $(this).index();
  
    // 显示第i个table
  
    $(".coupons_box").eq(i).show();
  
    // 隐藏其他的table
  
    $(".coupons_box").eq(i).siblings(".coupons_box").hide();
  
    // 把原来选中的取消选中状态
  
    $(".coupons_title .title_box .title").removeClass("current");
  
    // 切换点击的按钮的样式为选中状态
  
    $(this).addClass("current");
  
  });



});