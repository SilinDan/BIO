function checkStrLengths(){
	var length = $("#textContent").val().length;
	if(length<170){
		var len = 170-length;
		$("#textNum").text("您还可以输入"+len+"个字");
	}			
}

function checkTextContent(){
	if($("#textContent").val()==""){
		$(".tips-textContent").text("请留下您的感受");
		$("#textContent").addClass("border-red");
	}else{
		$(".tips-textContent").text("");
		$("#textContent").removeClass("border-red");
	}
}


function checkInfo(){
	if($("#textContent").val()==""){
		$(".tips-textContent").text("请留下您的感受");
		$("#textContent").addClass("border-red");
		return false;
	}else{
		$(".tips-textContent").text("");
		$("#textContent").removeClass("border-red");
	}
}