
function demo(){
	$("#shopping-bag").mouseenter(function(){
		$("#shopping-bag-box").stop(false, true).slideDown(500).css("display","block");
	}).mouseleave(function(){
		$("#shopping-bag-box").stop(false, true).stop().slideUp(500).css("display","block");
	})
}
$(demo);

$(document).ready(function(){
  $("#select-number").change(function(){
	var res=$("#select-number option:selected").val();
	var res1=parseInt(res)*480;
	$("#box2-span").text(res1);
	 
	 //总价
	 var num=res1;
	 $("#box3-text2").text(num);

	});
});


$("#login-regis").click(function(){
	if($("#login").css("display")=="none"){
		$("#login").show();
		$(".E_zine").hide();
	}else{
		$("#login").hide();
	}
});
