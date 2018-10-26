$(function(){
	$("input[name='user_name']").focus(function(){
		
	})
	$("input[name='user_name']").blur(function(){
		if($(this).val()==""){
			$(this).css("border","1px #f00 solid");
			$(".tips[name='user']").text("请输入姓名");
		}
		else{
			if($(this).val().length<2){
				$(this).css("border","1px #f00 solid");
				$(".tips[name='user']").text("请至少输入2个字符");
			}
			else{
				$(".tips[name='user']").text("");
				$(this).removeAttr("style");
			}
		}
	})
})

$(function(){
	var num=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/g;
	$("input[name='user_phone']").focus(function(){
		
	})
	$("input[name='user_phone']").blur(function(){
		if($(this).val()==""){
			$(this).css("border","1px #f00 solid");
			$(".tips[name='phone']").text("请输入手机号码");
		}
		else{
			if(num.test($(this).val())){
				$(".tips[name='phone']").text("");
				$(this).removeAttr("style");
			}
			else{
				$(this).css("border","1px #f00 solid");
				$(".tips[name='phone']").text("请输入有效的手机号");
				
			}
		}
	})
})

$(function(){
	var email=/[1-9]\d{5}(?!\d)/g;
	$("input[name='user_post']").focus(function(){
		
	})
	$("input[name='user_post']").blur(function(){
		if($(this).val()==""){
			$("input[name='user_post']").css("border","1px #f00 solid");
			$(".tips[name='email']").text("请输入邮编");
		}
		else{
			if(email.test($(this).val())){
				$(".tips[name='email']").text("");
				$(this).removeAttr("style");
			}
			else{
				$(this).css("border","1px #f00 solid");
				$(".tips[name='email']").text("请输入有效的邮编");
				
			}
		}
	})
})

$(function(){
	$("input[name='detailed_add']").focus(function(){
		
	})
	$("input[name='detailed_add']").blur(function(){
		if($(this).val()==""){
			$(this).css("border","1px #f00 solid");
			$(".tips[name='add']").text("请输入详细地址");
		}
		else{
			$(".tips[name='add']").text("");
			$(this).removeAttr("style");
		}
		
	})
})

$(function(){
	var user;
	var phone;
	var Email;
	var add;
	$(".save").click(function(){
		if($("input[name='user_name']").val()==""){
			$("input[name='user_name']").css("border","1px #f00 solid");
			$(".tips[name='user']").text("请输入姓名");
			user=1;
		}
		else{
			if($("input[name='user_name']").val().length<2){
				$("input[name='user_name']").css("border","1px #f00 solid");
				$(".tips[name='user']").text("请至少输入2个字符");
				user=1;
			}
			else{
				$(".tips[name='user']").text("");
				$("input[name='user_name']").removeAttr("style");
				user=0;
			}
		}

		if($("input[name='user_phone']").val()==""){
			$("input[name='user_phone']").css("border","1px #f00 solid");
			$(".tips[name='phone']").text("请输入手机号码");
			phone=1;
		}
		else{
			if(num.test($("input[name='user_phone']").val())){
				$(".tips[name='phone']").text("");
				$("input[name='user_phone']").removeAttr("style");
				phone=0;
			}
			else{
				$("input[name='user_phone']").css("border","1px #f00 solid");
				$(".tips[name='phone']").text("请输入有效的手机号");
				phone=1;
				
			}
		}

		var email=/[1-9]\d{5}(?!\d)/g;
		if($("input[name='user_post']").val()==""){
			$("input[name='user_post']").css("border","1px #f00 solid");
			$(".tips[name='email']").text("请输入邮编");
			Email=1;
		}
		else{
			if(email.test($("input[name='user_post']").val())){
				$(".tips[name='email']").text("");
				$("input[name='user_post']").removeAttr("style");
				Email=0;
			}
			else{
				$("input[name='user_post']").css("border","1px #f00 solid");
				$(".tips[name='email']").text("请输入有效的邮编");
				Email=1;	
			}
		}

		if($("input[name='detailed_add']").val()==""){
			$("input[name='detailed_add']").css("border","1px #f00 solid");
			$(".tips[name='add']").text("请输入详细地址");
			add=1;
		}
		else{
			$(".tips[name='add']").text("");
			$("input[name='detailed_add']").removeAttr("style");
			add=0;
		}
		if(user||phone||Email||add){
			return false;
		}
	})
})