$(document).ready(function(){

	$(".index_content_left .item").hover(function(){
		$(this).find(".sub_content").show();
	},function(){
		$(this).find(".sub_content").hide();
	});

	$(".search_box .input").click(function(){
		$(".search_box  .search_key_box").css('display','block');
	});

	$(".search_box .input").click(function(e){
        e.stopPropagation();
        $(".search_box  .search_key_box").css('display','block');
    });
    $(document).click(function(){
        if($(".search_box  .search_key_box").css("display")=='block'){
            $(".search_box  .search_key_box").css('display','none');
        }
    });

	
	
});