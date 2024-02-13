$(document).ready(function(){

    var total=0;
    
    $(".goods_box .goods_item").each(function () {
        var price=$(this).find(".name3 .price").html();
        var amount=$(this).find(".amount input").val();
        var post_money=$(this).find(".name3 .post_money").html();
        var xiaoji=price*amount;
        xiaoji=parseFloat(xiaoji)+parseFloat(post_money);
        $(this).find(".xiaoji").html(xiaoji);
        total=total+parseFloat(xiaoji);
    });

    $(".total_box .total .price").html(total);
    
     //数字改变，价钱改变
     $('.amount input').bind('input porpertychange',function(){
        var amount=$(this).val();
        var price=$(this).parent().parent().find(".name3 .price").html();
        var post_money=$(this).parent().parent().find(".name3 .post_money").html();
        var xiaoji=price*amount;
        xiaoji=parseFloat(xiaoji)+parseFloat(post_money);
        xiaoji=xiaoji.toFixed(2);
        $(this).parent().parent().find(".xiaoji").html(parseFloat(xiaoji));

        var total=0;
        $(".goods_box .goods_item").each(function () {
            xiaoji=$(this).find(".xiaoji").html();
            total=total+parseFloat(xiaoji);
            
        });
        
        $(".total_box .total .price").html(parseFloat(total));

       
        
     });

    

});

