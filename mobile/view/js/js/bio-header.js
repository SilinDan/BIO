

// $(".shopping-bag").(function(){
// 	$(".shopping-bag-box").show(3000);
// })

// $(".shopping-bag").load(function(){
//     setTimeout(function () {
//         $(".shopping-bag-box").fadeIn(600);
//     }, 3000);
// })

// function show(){
// 	$(".shopping-bag-box").attr("display","block").show(3000);
// }

// function show(){
// 	alert($(".shopping-bag-box").val);
// 	// $(".shopping-bag-box").attr("display","block");
// }

function demo(){
	$("#shopping-bag").mouseenter(function(){
		$("#shopping-bag-box").slideDown(500).css("display","block");
	}).mouseleave(function(){
		$("#shopping-bag-box").slideUp(500).css("display","block");
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
	}else{
		$("#login").hide();
	}
});
