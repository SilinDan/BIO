$(function(){
	$(".input_demo[name=user_name]").focus(function(){
		
	})
	$(".input_demo[name=user_name]").blur(function(){
		if($(this).val()==""){
			$(this).css("border","1px #f00 solid");
			$(".tips[name='tips_name']").text("请输入姓名");
		}
		else{
			if($(this).val().length<2){
				$(this).css("border","1px #f00 solid");
				$(".tips[name='tips_name']").text("请至少输入2个字符");
			}
			else{
				$(".tips[name='tips_name']").text("");
				$(this).removeAttr("style");
			}
		}
	})
})

$(function(){
	var num=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/g;
	$(".input_demo[name=user_phone]").focus(function(){
		
	})
	$(".input_demo[name=user_phone]").blur(function(){
		if($(this).val()==""){
			$(this).css("border","1px #f00 solid");
			$(".tips[name='tips_phone']").text("请输入手机号码");
		}
		else{
			if(num.test($(this).val())){
				$(".tips[name='tips_phone']").text("");
				$(this).removeAttr("style");
			}
			else{
				$(this).css("border","1px #f00 solid");
				$(".tips[name='tips_phone']").text("请输入有效的手机号");
				
			}
		}
	})
})


$(function(){
	var email=/[1-9]\d{5}(?!\d)/g;
	$("#email").focus(function(){
		
	})
	$("#email").blur(function(){
		if($(this).val()==""){
			$(this).css("border","1px #f00 solid");
			$(".tips[name='tips_email']").text("请输入邮编");
		}
		else{
			if(email.test($(this).val())){
				$(".tips[name='tips_email']").text("");
				$(this).removeAttr("style");
			}
			else{
				$(this).css("border","1px #f00 solid");
				$(".tips[name='tips_email']").text("请输入有效的邮编");
				
			}
		}
	})
})

$(function(){
	$("#add").focus(function(){
		
	})
	$("#add").blur(function(){
		if($(this).val()==""){
			$(this).css("border","1px #f00 solid");
			$(".tips[name='tips_add']").text("请输入详细地址");
		}
		else{
			$(".tips[name='tips_add']").text("");
			$(this).removeAttr("style");
		}
		
	})
})

$(function(){
	var name;
	var phone;
	var Email;
	var add;
	$(".shopping_bc").click(function(){
		if($(".input_demo[name=user_name]").val()==""){
			$(".input_demo[name=user_name]").css("border","1px #f00 solid");
			$(".tips[name='tips_user']").text("请输入姓名");
			user=1;
		}
		else{
			if($(".input_demo[name=user_name]").val().length<2){
				$(".input_demo[name=user_name]").css("border","1px #f00 solid");
				$(".tips[name='tips_user']").text("请至少输入2个字符");
				user=1;
			}
			else{
				$(".tips[name='user']").text("");
				$(".input_demo[name=user_name]").removeAttr("style");
				user=0;
			}
		}

		if($(".input_demo[name=user_phone]").val()==""){
			alert($(".input_demo[name=user_phone]").text());
			$(".input_demo[name=user_phone]").css("border","1px #f00 solid");
			$(".tips[name='tips_phone']").text("请输入111");
			phone=1;
		}
		else{
			if(num.test($(".input_demo[name=user_phone]").val())){
				$(".tips[name='tips_phone']").text("");
				$("#phone").removeAttr("style");
				phone=0;
			}
			else{
				$(".input_demo[name=user_phone]").css("border","1px #f00 solid");
				$(".tips[name='tips_phone']").text("请输入有效的手机号");
				phone=1;
				
			}
		}

		var email=/[1-9]\d{5}(?!\d)/g;
		if($("#email").val()==""){
			$("#email").css("border","1px #f00 solid");
			$(".tips[name='tips_email']").text("请输入邮编");
			Email=1;
		}
		else{
			if(email.test($("#email").val())){
				$(".tips[name='tips_email']").text("");
				$("#email").removeAttr("style");
				Email=0;
			}
			else{
				$("#email").css("border","1px #f00 solid");
				$(".tips[name='tips_email']").text("请输入有效的邮编");
				Email=1;	
			}
		}

		if($("#add").val()==""){
			$("#add").css("border","1px #f00 solid");
			$(".tips[name='tips_add']").text("请输入详细地址");
			add=1;
		}
		else{
			$(".tips[name='tips_add']").text("");
			$("#add").removeAttr("style");
			add=0;
		}
		if(user||phone||Email||add){
			return false;
		}
	})
})
$(function(){
	$(".company_name").focus(function(){
	})
	$(".company_name").blur(function(){
		if ($(this).val()=="") {
			$(this).css("border","1px #f00 solid");
			$(".company_tips").text("请输入公司名称");
		}
		else{
			$(".company_tips").text("");
			$(this).removeAttr("style");
		}
	})
})

//税号正则
$(function(){
	$(".company_num").focus(function(){
	})
	$(".company_num").blur(function(){
		if ($(this).val()=="") {
			$(this).css("border","1px #f00 solid");
			$(".num_tips").text("请输入纳税识别号");
		}
		else{
			$(".num_tips").text("");
			$(this).removeAttr("style");
		}
	})
})

//点击个人
$(function(){
	$("option[value='个人']").click(function(){
		$(".close_all").hide();
	})
})

//点击公司
$(function(){
	$("option[value='公司']").click(function(){
		$(".close_all").show();
	})
})

//留言选择按钮
$(function(){
	$("#note_choose").click(function(){
		if($(this).attr("name")=="NO"){
			$(this).css("background","#2B626F");
			$(".message_box").show();
			$(this).attr("name","OK");
		}
		else{
			$(".none_button").css("background","#fff")
			$(".message_box").hide();
			$(this).attr("name","NO");
		}
		
	});
});

//留言保存按钮
$(function(){
	$(".save_note").click(function(){
		$(".none_button").css("background","#fff");
		$(".message_box").toggle();
	});
});

//发票信息选择
$(function(){
	$("#invoice_choose").click(function(){
		if($(this).attr("name")=="NO"){
			$(this).css("background","#2B626F");
			$(".save_invoice_box").show();
			$(this).attr("name","OK");
		}
		else{
			$(this).css("background","#fff")
			$(".save_invoice_box").hide();
			$(this).attr("name","NO");
		}
		
	});
});

//发票保存按钮
$(function(){
	$(".save_invoice").click(function(){
		$(".save_invoice_box").toggle();
	});
});


$(function(){
	$("#note").click(function(){
		alert($("#note").val().length);
	});
});

$(function(){
	$("#message_text").keyup(function(){
		
		$(".geshu").text(100-$("#message_text").val().length);

	})
})









function addressAdd(){
	document.getElementById('addressAdd').style.display='block';
	document.getElementById('opacity').style.display='block';
}

function addressAddClose2(){
	document.getElementById('addressAdd2').style.display='none';
	document.getElementById('opacity2').style.display='none';
} 
function addressAddClose(){
	document.getElementById('addressAdd').style.display='none';
	document.getElementById('opacity').style.display='none';
} 
function checkName2(){
	if($("#name2").val()==""){
		$("#tips-name2").text("请输入姓名");
		$("#name2").addClass("border-red").removeClass("border-blue");	
	}else{
		$("#tips-name").text("");
		$("#name2").addClass("border-blue");
	}
}

function checkPhone2(){
	var num1=/^[1][\d]{9}[\d]$/g;
	if($("#phone2").val()==""){
		$("#tips-phone2").text("请输入您的手机号");
		$("#phone2").addClass("border-red").removeClass("border-blue");
		
	}else if(num1.test($("#phone2").val())){
		$("#tips-phone2").text("");
		$("#phone2").addClass("border-blue");
		
	}else {
		$("#tips-phone2").text("请输入有效的手机号");
		$("#phone2").addClass("border-red").removeClass("border-blue");
		
	}
}

function checkTelephone2(){
	var num2=/^[0][\d]{2,3}[-][\d]{7,8}$/;
	if($("#telephone2").val()==""){
		$("#tips-telephone2").text("");
		$("#telephone2").removeClass("border-blue").removeClass("border-red");	
	}else if(num2.test($("#telephone2").val())){
		$("#tips-telephone2").text("");
		$("#telephone2").addClass("border-blue");
	}else{
		$("#tips-telephone2").text("请输入正确的电话号码");
		$("#telephone2").addClass("border-red").removeClass("border-blue");
	}
}

function checkAddress2(){
	if($("#address2").val()==""){
		$("#tips-address2").text("请输入地址");
		$("#address2").addClass("border-red").removeClass("border-blue");
	}else{
		$("#tips-address2").text("");
		$("#address2").addClass("border-blue");
	}
}

function checkPostal2(){
	var num3=/^[\d]{6}$/;
	if($("#postal2").val()==""){
		$("#tips-postal2").text("请输入邮编");
		$("#postal2").removeClass("border-blue").addClass("border-red");	
	}else if(num3.test($("#postal2").val())){
		$("#tips-postal2").text("");
		$("#postal2").addClass("border-blue");
	}else{
		$("#tips-postal2").text("请输入正确的邮编");
		$("#postal2").addClass("border-red").removeClass("border-blue");
	}
}





function checkInput2(){
	var num1=/^[1][\d]{9}[\d]$/g;
	var num2=/^[0][\d]{2,3}[-][\d]{7,8}$/;
	var num3=/^[\d]{6}$/;
	if($("#name2").val()==""){
		$("#tips-name2").text("请输入姓名");
		$("#name2").addClass("border-red").removeClass("border-blue");
		var name=1;	
	}else{
		$("#tips-name2").text("");
		$("#name2").addClass("border-blue");
		var name=0;
	}

	if($("#phone2").val()==""){
		$("#tips-phone2").text("请输入您的手机号");
		$("#phone2").addClass("border-red").removeClass("border-blue");
		var phone=1;
	}else if(num1.test($("#phone2").val())){
		$("#tips-phone2").text("");
		$("#phone2").addClass("border-blue");
		var phone=0;
	}else {
		$("#tips-phone2").text("请输入有效的手机号");
		$("#phone2").addClass("border-red").removeClass("border-blue");
		var phone=1;
	}

	if($("#telephone2").val()==""){
		$("#tips-telephone2").text("");
		$("#telephone2").removeClass("border-blue").removeClass("border-red");
		var telephone=0;	
	}else if(num2.test($("#telephone2").val())){
		$("#tips-telephone2").text("");
		$("#telephone2").addClass("border-blue");
		var telephone=0;
	}else{
		$("#tips-telephone2").text("请输入正确的电话号码");
		$("#telephone2").addClass("border-red").removeClass("border-blue");
		var telephone=1;
	}

	if($("#address2").val()==""){
		$("#tips-address2").text("请输入地址");
		$("#address2").addClass("border-red").removeClass("border-blue");
		var address=1;
	}else{
		$("#tips-address2").text("");
		$("#address2").addClass("border-blue");
		var address=0;
	}

	if($("#postal2").val()==""){
		$("#tips-postal2").text("请输入邮编");
		$("#postal2").removeClass("border-blue").addClass("border-red");	
		var postal=1;
	}else if(num3.test($("#postal2").val())){
		$("#tips-postal2").text("");
		$("#postal2").addClass("border-blue");
		var postal=0;
	}else{
		$("#tips-postal2").text("请输入正确的邮编");
		$("#postal2").addClass("border-red").removeClass("border-blue");
		var postal=1;
	}

	if(name||phone||telephone||address||postal){
		return false;
	}

}
