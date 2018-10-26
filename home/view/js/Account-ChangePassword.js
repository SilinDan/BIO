function checkold_pwd(){
	
	if($("#old_pwd").val()==""){
		$(".old_pwd").text("请输入您的密码");
		$("#old_pwd").addClass("border-red").removeClass("border-blue");
	}
	else if ($("#old_pwd").val().length<8){
		$(".old_pwd").text("请至少输入8个字符");
		$("#old_pwd").addClass("border-red").removeClass("border-blue");
	}else {
		$(".old_pwd").text("");
		$("#old_pwd").addClass("border-blue");
	}

}
function checkpwd1(){
	
	if($("#pwd").val()==""){
		$(".pwd").text("请输入您的密码");
		$("#pwd").addClass("border-red").removeClass("border-blue");
	}
	else if ($("#pwd").val().length<8){
		$(".pwd").text("请至少输入8个字符");
		$("#pwd").addClass("border-red").removeClass("border-blue");
	}else {
		$(".pwd").text("");
		$("#pwd").addClass("border-blue");
	}

}

function checkpwd2(){
	if($("#pwd2").val()==""){
		$(".pwd2").text("请输入您的密码");
		$("#pwd2").addClass("border-red").removeClass("border-blue");
	}


	else{
		if($("#pwd").val()==""){
			if($("#pwd2").val().length<8){
				$(".pwd2").text("请至少输入8个字符");
				$("#pwd2").addClass("border-red").removeClass("border-blue");
			}
			else{
				$(".pwd2").text("");
				$("#pwd2").addClass("border-blue");
			}
		}
		else{
			if($("#pwd2").val()!=$("#pwd").val()){
				$(".pwd2").text("密码不匹配");
		 		$("#pwd2").addClass("border-red").removeClass("border-blue");
			}
			else if($("#pwd2").val()==$("#pwd1").val()&&$("#pwd2").val().length<8){
				$(".pwd2").text("请至少输入8个字符");
				$("#pwd2").addClass("border-red").removeClass("border-blue");
			}

			else{
				$(".pwd2").text("");
			 	$("#pwd2").addClass("border-blue");
			}
		}
	}
	
}

function changePwd(){
	var old_pwd;
	var pwd;
	var pwd2;
	
	if($("#old_pwd").val()==""){
		$(".old_pwd").text("请输入您的密码");
		$("#old_pwd").addClass("border-red").removeClass("border-blue");
		old_pwd=1;
	}
	else if ($("#old_pwd").val().length<8){
		if($("#old_pwd").val()==$("#pwd").val()){
			$(".old_pwd").text("新密码与旧密码相同，请重新输入新密码");
			$("#old_pwd").addClass("border-red").removeClass("border-blue");
			old_pwd=1;
		}
		else{
			$(".old_pwd").text("请至少输入8个字符");
			$("#old_pwd").addClass("border-red").removeClass("border-blue");
			old_pwd=1;
		}
		
	}else {
		$(".old_pwd").text("");
		$("#old_pwd").addClass("border-blue");
		old_pwd=0;
	}



	if($("#pwd").val()==""){
		$(".pwd").text("请输入您的密码");
		$("#pwd").addClass("border-red").removeClass("border-blue");
		pwd=1;
	}
	else if ($("#pwd").val().length<8){
		$(".pwd").text("请至少输入8个字符");
		$("#pwd").addClass("border-red").removeClass("border-blue");
		pwd=1;
	}else {
		$(".pwd").text("");
		$("#pwd").addClass("border-blue");
		pwd=0;
	}



	if($("#pwd2").val()==""){
		$(".pwd2").text("请输入您的密码");
		$("#pwd2").addClass("border-red").removeClass("border-blue");
		pwd2=1;
	}
	else{
		if($("#pwd1").val()==""){
			if($("#pwd2").val().length<8){
				$(".pwd2").text("请至少输入8个字符");
				$("#pwd2").addClass("border-red").removeClass("border-blue");
				pwd2=1;
			}
			else{
				$(".pwd2").text("");
				$("#pwd2").addClass("border-blue");
				pwd2=0;
			}
		}
		else{
			if($("#pwd2").val()!=$("#pwd").val()){
				$(".pwd2").text("密码不匹配");
		 		$("#pwd2").addClass("border-red").removeClass("border-blue");
		 		pwd2=1;
			}
			else if($("#pwd2").val()==$("#pwd").val()&&$("#pwd2").val().length<8){
				$(".pwd2").text("请至少输入8个字符");
				$("#pwd2").addClass("border-red").removeClass("border-blue");
				pwd2=1;
			}

			else{
				$(".pwd2").text("");
			 	$("#pwd2").addClass("border-blue");
			 	pwd2=0;
			}
		}
	}
	if(old_pwd||pwd||pwd2){
		return false;
	}
}