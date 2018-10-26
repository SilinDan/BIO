function verificationUser(){
	var num=/^[1][\d]{9}[\d]$/g;
	var email=/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/;
	if($("#input-id").val()==""){
		$(".tips-user").text("请输入您的邮箱或手机号");
		$("#input-id").addClass("border-red").removeClass("border-blue");
		
	}else if(num.test($("#input-id").val())||email.test($("#input-id").val())){
		$(".tips-user").text("");
		$("#input-id").addClass("border-blue");
		
	}else {
		$(".tips-user").text("请输入有效的邮箱或手机号");
		$("#input-id").addClass("border-red").removeClass("border-blue");
	}
	
}

function verificationPwd(){
	if($("#input-pwd").val()==""){
		$(".tips-pwd").text("请输入您的密码");
		$("#input-pwd").addClass("border-red").removeClass("border-blue");
	}else if($("#input-pwd").val().length<8||$("#input-pwd").val().length>30){
		$(".tips-pwd").text("请输入8-30个字符");
		$("#input-pwd").addClass("border-red").removeClass("border-blue");
	}else {
		$(".tips-pwd").text("");
		$("#input-pwd").addClass("border-blue");
	}
}