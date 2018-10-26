


//左右滑动切换商品显示
var index5=0;

//点击左键，向右滑
// $(document).on('click','.index-single-box-left',function(){
// 	alert("yyy");
// }
$(".index-single-box-right").click(function(){ 
	var len=$("#indexShow .index-single-box-show .index-single-botton").length;

	if(index5+5>len){
		// $("#indexShow .index-single-box-show").stop().append($("#indexShow").html());
		return false;
	}else{
		index5++;
		$("#indexShow .index-single-box-show").stop().animate({left:-index5*294},1000);
	}
});


//点击右键，向左滑	
$(".index-single-box-left").click(function(){
	var len=$("#indexShow .index-single-box-show .index-single-botton").length;
	if(index5==0){
		return false;
		// index5=len-3;
	}else{
		index5--;
		$("#indexShow .index-single-box-show").stop().animate({left:-index5*294},1000);
	}
});