function addressAdd(){
	document.getElementById('addressAdd').style.display='block';
	document.getElementById('opacity').style.display='block';
}
function addressAddClose(){
	document.getElementById('addressAdd').style.display='none';
	document.getElementById('opacity').style.display='none';
}

function addressAddClose2(){
	document.getElementById('addressAdd2').style.display='none';
	document.getElementById('opacity2').style.display='none';
}

function checkName(){
	if($("#name").val()==""){
		$(".tips-name").text("请输入姓名");
		$("#name").addClass("border-red").removeClass("border-blue");	
	}else{
		$(".tips-name").text("");
		$("#name").addClass("border-blue");
	}
}

function checkPhone(){
	var num1=/^[1][\d]{9}[\d]$/g;
	if($("#phone").val()==""){
		$(".tips-phone").text("请输入您的手机号");
		$("#phone").addClass("border-red").removeClass("border-blue");
		
	}else if(num1.test($("#phone").val())){
		$(".tips-phone").text("");
		$("#phone").addClass("border-blue");
		
	}else {
		$(".tips-phone").text("请输入有效的手机号");
		$("#phone").addClass("border-red").removeClass("border-blue");
		
	}
}

function checkTelephone(){
	var num2=/^[0][\d]{2,3}[-][\d]{7,8}$/;
	if($("#telephone").val()==""){
		$(".tips-telephone").text("");
		$("#telephone").removeClass("border-blue").removeClass("border-red");	
	}else if(num2.test($("#telephone").val())){
		$(".tips-telephone").text("");
		$("#telephone").addClass("border-blue");
	}else{
		$(".tips-telephone").text("请输入正确的电话号码");
		$("#telephone").addClass("border-red").removeClass("border-blue");
	}
}

function checkAddress(){
	if($("#address").val()==""){
		$(".tips-address").text("请输入地址");
		$("#address").addClass("border-red").removeClass("border-blue");
	}else{
		$(".tips-address").text("");
		$("#address").addClass("border-blue");
	}
}

function checkPostal(){
	var num3=/^[\d]{6}$/;
	if($("#postal").val()==""){
		$(".tips-postal").text("请输入邮编");
		$("#postal").removeClass("border-blue").addClass("border-red");	
	}else if(num3.test($("#postal").val())){
		$(".tips-postal").text("");
		$("#postal").addClass("border-blue");
	}else{
		$(".tips-postal").text("请输入正确的邮编");
		$("#postal").addClass("border-red").removeClass("border-blue");
	}
}





function checkInput(){
	var num1=/^[1][\d]{9}[\d]$/g;
	var num2=/^[0][\d]{2,3}[-][\d]{7,8}$/;
	var num3=/^[\d]{6}$/;
	if($("#name").val()==""){
		$(".tips-name").text("请输入姓名");
		$("#name").addClass("border-red").removeClass("border-blue");
		var name=1;	
	}else{
		$(".tips-name").text("");
		$("#name").addClass("border-blue");
		var name=0;
	}

	if($("#phone").val()==""){
		$(".tips-phone").text("请输入您的手机号");
		$("#phone").addClass("border-red").removeClass("border-blue");
		var phone=1;
	}else if(num1.test($("#phone").val())){
		$(".tips-phone").text("");
		$("#phone").addClass("border-blue");
		var phone=0;
	}else {
		$(".tips-phone").text("请输入有效的手机号");
		$("#phone").addClass("border-red").removeClass("border-blue");
		var phone=1;
	}

	if($("#telephone").val()==""){
		$(".tips-telephone").text("");
		$("#telephone").removeClass("border-blue").removeClass("border-red");
		var telephone=0;	
	}else if(num2.test($("#telephone").val())){
		$(".tips-telephone").text("");
		$("#telephone").addClass("border-blue");
		var telephone=0;
	}else{
		$(".tips-telephone").text("请输入正确的电话号码");
		$("#telephone").addClass("border-red").removeClass("border-blue");
		var telephone=1;
	}

	if($("#address").val()==""){
		$(".tips-address").text("请输入地址");
		$("#address").addClass("border-red").removeClass("border-blue");
		var address=1;
	}else{
		$(".tips-address").text("");
		$("#address").addClass("border-blue");
		var address=0;
	}

	if($("#postal").val()==""){
		$(".tips-postal").text("请输入邮编");
		$("#postal").removeClass("border-blue").addClass("border-red");	
		var postal=1;
	}else if(num3.test($("#postal").val())){
		$(".tips-postal").text("");
		$("#postal").addClass("border-blue");
		var postal=0;
	}else{
		$(".tips-postal").text("请输入正确的邮编");
		$("#postal").addClass("border-red").removeClass("border-blue");
		var postal=1;
	}

	if(name||phone||telephone||address||postal){
		return false;
	}

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