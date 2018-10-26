function  checkuser(){
	if($("#user").val()==""){
		$(".user").text("请输入有效的用户名");
		$("#user").addClass("border-red").removeClass("border-blue");
	}
	else{
		$(".user").text("");
		$("#user").addClass("border-blue");
	}
}

function checkemail(){
	var email=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/g;

	if($("#email").val()==""){
		$(".email").text("请输入有效的邮箱");
		$("#email").addClass("border-red").removeClass("border-blue");
	}
	else {
		if (email.test($("#email").val())){
			$(".email").text("");
			$("#email").addClass("border-blue");
		}else{

			$(".email").text("请输入有效的邮箱");
			$("#email").addClass("border-red").removeClass("border-blue");
		}
		
	}
}

function checkphone(){
	var number=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/g;
	if($("#phone").val()==""){
		$(".phone").text("请填入有效的手机号码");
		$("#phone").addClass("border-red").removeClass("border-blue");
	}
	else {
		if (number.test($("#phone").val())){
			$(".phone").text("");
			$("#phone").addClass("border-blue");
		}else{

			$(".phone").text("请输入有效的手机号码");
			$("#phone").addClass("border-red").removeClass("border-blue");
		}
		
	}
}

function  checkphone_code(){
	if($("#phone_code").val()=="")
	{
		$(".phone_code").text("");
		$("#phone_code").addClass("border-blue");
	}
	else if($("#phone_code").val().length<6){
		$(".phone_code").text("请输入有效的验证码");
		$("#phone_code").addClass("border-red").removeClass("border-blue");
	}
	else {
		$(".phone_code").text("");
		$("#phone_code").addClass("border-blue");
	}
}
function  checkcode(){
	if($("#code").val()=="")
	{
		$(".code").text("请输入4位随机验证码");
		$("#code").addClass("border-red").removeClass("border-blue");
		$(".note_button").removeClass("note_button1");
	}	
	else if($("#code").val().length<4){
		$(".code").text("");
		$("#code").addClass("border-blue");
		$(".note_button").removeClass("note_button1");
	}
	else {
		$(".code").text("");
		$("#code").addClass("border-blue");
		$(".note_button").addClass("note_button1");
	}
}


 function register(){
 	
 	
	var user;
	if($("#user").val()==""){
		$(".user").text("请输入有效的用户名");
		$("#user").addClass("border-red").removeClass("border-blue");
		user=1;
	}
	else{
		$(".user").text("");
		$("#user").addClass("border-blue");
		user=0;
	}


	var Email;
	var email=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/g;

	if($("#email").val()==""){
		$(".email").text("请输入有效的邮箱");
		$("#email").addClass("border-red").removeClass("border-blue");
		Email=1;
	}
	else {
		if (email.test($("#email").val())){
			$(".email").text("");
			$("#email").addClass("border-blue");
			Email=0;
		}else{

			$(".email").text("请输入有效的邮箱");
			$("#email").addClass("border-red").removeClass("border-blue");
			Email=1;
		}
		
	}


	var number;
	var number=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/g;
	if($("#phone").val()==""){
		$(".phone").text("请填入有效的手机号码");
		$("#phone").addClass("border-red").removeClass("border-blue");
		 number=1;
	}
	else {
		if (number.test($("#phone").val())){
			$(".phone").text("");
			$("#phone").addClass("border-blue");
			 number=0;
		}else{

			$(".phone").text("请输入有效的手机号码");
			$("#phone").addClass("border-red").removeClass("border-blue");
			 number=1;
		}
		
	}
	


	// var phone_code;
	// if($("#phone_code").val()=="")
	// {
	// 	$(".phone_code").text("");
	// 	$("#phone_code").addClass("border-blue");
	// 	phone_code=1;
	// }
	// else if($("#phone_code").val().length<6){
	// 	$(".phone_code").text("请输入有效的验证码");
	// 	$("#phone_code").addClass("border-red").removeClass("border-blue");
	// 	phone_code=1;
	// }
	// else {
	// 	$(".phone_code").text("");
	// 	$("#phone_code").addClass("border-blue");
	// 	phone_code=0;
	// }

	var code;
	if($("#code").val()=="")
	{
		$(".code").text("请输入4位随机验证码");
		$("#code").addClass("border-red").removeClass("border-blue");
		$(".note_button").removeClass("note_button1");
		code=1;
	}	
	else if($("#code").val().length<4){
		$(".code").text("");
		$("#code").addClass("border-blue");
		$(".note_button").removeClass("note_button1");
		code=1;
	}
	else {
		$(".code").text("");
		$("#code").addClass("border-blue");
		$(".note_button").addClass("note_button1");
		code=0;
	}
	var tips;
	if($("#tishi1").text()=="验证码正确！"){
	 	tips=0;
	}
	else tips=1;
	
	if(user||Email||number||code||tips){

		return false;
	}
}

