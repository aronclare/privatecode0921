$(document).ready(function(){
    //加载页面计算总价
    var total_price=0;
    var check_number=0;
    $(".gouwuche_check").each(function () {
      var goods_price=$(this).parent().parent().parent().find(".goods_price").html();
      var number=$(this).parent().parent().parent().find(".number").val();
      var price_xiaoji=goods_price*number;
      $(this).parent().parent().parent().find(".price_xiaoji").html(price_xiaoji);
      
      if ($(this).is(':checked')) {    
        check_number=parseInt(check_number)+parseInt(number);       
        total_price=total_price+price_xiaoji;
      }
        
    });
    $(".total_price").html(total_price);
    $(".check_number").html(check_number);


    //购物车删除
    $(".gouwuche_delete").click(function(){
        var tr = $(this).parent().parent();
        layui.use('layer', function(){
          var layer = layui.layer;
          layer.confirm('您确定要删除吗？', {
            btn: ['确定','取消'] //按钮
          }, function(){
           
            url ="/index/cart/delete_to_cart";
            id=tr.attr('attr-id');
            postData = {'id':id};
            $.post(url,postData,function(result){
              if(result.status==1){
                tr.remove();
                layer.closeAll('dialog');
                var check_number=0;
                var total_price=0;
                $(".gouwuche_check").each(function () {
                  
                    if ($(this).is(':checked')) {
                      check_number=check_number+1;
                        var goods_price=$(this).parent().parent().parent().find(".goods_price").html();
                        var number=$(this).parent().parent().parent().find(".number").val();
                        var price_xiaoji=goods_price*number;
                        $(this).parent().parent().parent().find(".price_xiaoji").html(price_xiaoji);
                        $(this).parent().parent().parent().find(".number").val();
                        total_price=total_price+price_xiaoji;
                    }
                    
                });
                $(".check_number").html(check_number);
                $(".total_price").html(total_price);
              }
            },'json');
            
          }, function(){
            layer.closeAll('dialog');
          });
        }); 
        
      });

      //选中改变总价
    $(".gouwuche_check").click(function(){
        var total_price=0;
        var check_number=0;
        $(".gouwuche_check").each(function () {
          
            if ($(this).is(':checked')) {
                var goods_price=$(this).parent().parent().parent().find(".goods_price").html();
                var number=$(this).parent().parent().parent().find(".number").val();
                var price_xiaoji=goods_price*number;
                $(this).parent().parent().parent().find(".price_xiaoji").html(price_xiaoji);
                $(this).parent().parent().parent().find(".number").val();
                total_price=total_price+price_xiaoji;
                check_number=parseInt(check_number)+parseInt(number);

                
            }
            
        });
        $(".total_price").html(total_price);
        $(".check_number").html(check_number);


        //改变当前点击项数据库状态
        if ($(this).is(':checked')) {
          status=1;
        }else{
          status=0;
        }
        url ="/index/cart/update_cart_status";
        id=$(this).parent().parent().parent().attr('attr-id');
        postData = {'id':id,'status':status};
        $.post(url,postData,function(result){
          
        },'json');
      });
  

      //数字改变，价钱改变
    $('.number').bind('input porpertychange',function(){
        if ($(this).parent().parent().find(".gouwuche_check").is(':checked')) {
              var goods_price=$(this).parent().find(".goods_price").html();
              var number=$(this).val();
              var price_xiaoji=goods_price*number;
              $(this).parent().find(".price_xiaoji").html(price_xiaoji);
        }
        var total_price=0;
        $(".gouwuche_check").each(function () {
          
            if ($(this).is(':checked')) {
                var goods_price=$(this).parent().parent().parent().find(".goods_price").html();
                var number=$(this).parent().parent().parent().find(".number").val();
                var price_xiaoji=goods_price*number;
                $(this).parent().parent().parent().find(".price_xiaoji").html(price_xiaoji);
                $(this).parent().parent().parent().find(".number").val();
                total_price=total_price+price_xiaoji;
            }
            
        });
        $(".total_price").html(total_price);

        //更改数据库数量
        url ="/index/cart/update_cart_amount";
        id=$(this).parent().parent().attr('attr-id');
        postData = {'id':id,'amount':number};
        $.post(url,postData,function(result){
          
        },'json');
  
      });



      //购物车全选
    $('.select_all').on('click',function(){
        
        if($(this).find("input:checkbox").is(':checked')){
            $(".gouwuche_check").prop('checked',true);
            url ="/index/cart/update_allcart_status";
            postData = {'status':1};
            $.post(url,postData,function(result){

            },'json');
        }else{
            $(".gouwuche_check").prop('checked',false);
            url ="/index/cart/update_allcart_status";
            postData = {'status':0};
            $.post(url,postData,function(result){

            },'json');
        }
        

        var check_number=0;
        var total_price=0;
        $(".gouwuche_check").each(function () {
          
            if ($(this).is(':checked')) {
                
              
                var goods_price=$(this).parent().parent().parent().find(".goods_price").html();
                var number=$(this).parent().parent().parent().find(".number").val();
                var price_xiaoji=goods_price*number;
                $(this).parent().parent().parent().find(".price_xiaoji").html(price_xiaoji);
                total_price=total_price+price_xiaoji;
                check_number=parseInt(check_number)+parseInt(number);
            }
            
        });
        $(".check_number").html(check_number);
        $(".total_price").html(total_price);

        
      });
  

      //清空
      $(".delete_all").click(function(){
        layui.use('layer', function(){
          var layer = layui.layer;
          layer.confirm('您确定要全部删除吗？', {
            btn: ['确定','取消'] //按钮
          }, function(){
            url ="/index/cart/delete_all_cart";
            postData = {};
            $.post(url,postData,function(result){
              if($result.status==1){
                $(".gouwuche_check").each(function(){
                  $(this).parent().parent().parent().remove();
                });
                $(".total_price").html('0');
                layer.closeAll('dialog');
              }
            },'json');
            
          })
        });
        
      });


})