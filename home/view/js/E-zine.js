$(function(){
	$(".close_E-zine").click(function(){
		$(".body_box").hide();
   		$(".E_zine").toggle();

  	});
});
$(function(){
	$(".subscribe_close").click(function(){
   		$(".subscribe").hide();
   		$(".subscribe").hide();
   		$(".body_box").hide();
 
  	});
});
$(function(){
	$("#e-magzine").click(function(){
   		$(".E_zine").toggle();
   		$("#login").hide();
  	});
});

$(function(){
	$(".choose").click(function(){
		if($(this).attr("name")=="NO"){
			$(this).attr("name","OK")
			
		}
		else{
			
			$(this).attr("name","NO")
		
		}
		
	})
})

$(function(){
	$("#input2").click(function(){
		if($(this).attr("name")=="NO"){
			$(this).attr("name","OK")
			
		}
		else{
			
			$(this).attr("name","NO")
		
		}
		
	})
})
$(function(){
	var email;
	var choose;
	$(".sub").click(function(){
	    var email=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/g;
	    var t=$("#user_email").val();
	   	if(t==""){
	   		$("#user_email").css("border","1.5px #99BBF2 solid");
	   		$(".tips_email").text("请输入您的电子邮箱");
	   		email=1;
	   	}
	   	else{
	   		if(email.test($("#user_email").val())){
	   			$(".tips_email").text("");
				$("#user_email").css("border","1.5px #E5E5E6 solid")
				email=0;
	   		}
	   		else{
	   			$("#user_email").css("border","1.5px #99BBF2 solid");
	   			$(".tips_email").text("请输入有效的邮箱");
	   			email=1;
	   			
	   		}
	   	}
	   	if($(".choose").attr("name")=="NO"){
	   		$(".tips_choos").text("请接受隐私条款");
	   		choose=1;
	   	}
	   	else{
	   		$(".tips_choos").text("");
	   		choose=0;
	   	}	 
	   	if(email||choose){
	   		return false;
	   	}
	   	else{
	   		$(".body_box").show();
	   		$(".subscribe").show();
	   	}
  	});
});


$(function(){
	var email;
	var choose;
	$("#input3").click(function(){
		var email=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/g;
	    var t=$("#input1").val();
	   	if(t==""){
	   		$("#input1").css("border","1.5px #99BBF2 solid");
	   		$(".tips_1").text("请输入您的电子邮箱");
	   		email=1;
	   	}
	   	else{
	   		if(email.test($("#input1").val())){
	   			$(".tips_1").text("");
				$("#input1").css("border","1.5px #E5E5E6 solid")
				email=0;
	   		}
	   		else{
	   			$("#input1").css("border","1.5px #99BBF2 solid");
	   			$(".tips_1").text("请输入有效的邮箱");
	   			email=1;
	   			
	   		}
	   	}

   		if($("#input2").attr("name")=="NO"){
	   		$(".tips_2").text("请接受隐私条款");
	   		choose=1;
	   	}
	   	else{
	   		$(".tips_2").text("");
	   		choose=0;
	   	}	 
	   	if(email||choose){
	   		return false;
	   	}
	   	else{
	   		$(".body_box").show();
	   		$(".subscribe").show();
	   		
	   	}
	});
});