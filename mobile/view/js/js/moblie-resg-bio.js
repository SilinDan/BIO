
$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});


$(document).ready(function(){
    $(".icon-search").click(function(){
       if ($(".mobile-input").css("display")=="none"){
         $(".mobile-input").css("display","block");
       }else{
         $(".mobile-input").css("display","none");
       }               
    });
  });


    



var register = function(){
	var email=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/g;

	var num=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/g;
	if($("#user").val()==""){
		$(".user").text("请输入有效的邮箱或手机号码");
		$("#user").addClass("border-red").removeClass("border-blue");
		return false;
	}
	else {
		if (num.test($("#user").val()) || email.test($("#user").val())){
			$(".user").text("");
		
			$("#user").addClass("border-blue");
		}else{

			$(".user").text("请输入有效的邮箱或手机号码");
			$("#user").addClass("border-red").removeClass("border-blue");
			return false;
		}
		
	}

	if($("#pwd1").val()==""){
		$(".pwd1").text("请输入您的密码");
		$("#pwd1").addClass("border-red").removeClass("border-blue");
		return false;
	}
	else if ($("#pwd1").val().length<8){
		$(".pwd1").text("请至少输入8个字符");
		$("#pwd1").addClass("border-red").removeClass("border-blue");
		return false;
	}else {
		$(".pwd1").text("");
		$("#pwd1").addClass("border-blue");
	}


	if($("#pwd2").val()==""){
		$(".pwd2").text("请输入您的密码");
		$("#pwd2").addClass("border-red").removeClass("border-blue");
		return false;
	}


	else{
		if($("#pwd1").val()==""){
			if($("#pwd2").val().length<8){
				$(".pwd2").text("请至少输入8个字符");
				$("#pwd2").addClass("border-red").removeClass("border-blue");
				return false;
			}
			else{
				$(".pwd2").text("");
				$("#pwd2").addClass("border-blue");
			}
		}
		else{
			if($("#pwd2").val()!=$("#pwd1").val()){
				$(".pwd2").text("密码不匹配");
		 		$("#pwd2").addClass("border-red").removeClass("border-blue");
		 		return false;
			}
			else if($("#pwd2").val()==$("#pwd1").val()&&$("#pwd2").val().length<8){
				$(".pwd2").text("请至少输入8个字符");
				$("#pwd2").addClass("border-red").removeClass("border-blue");
				return false;
			}

			else{
				$(".pwd2").text("");
			 	$("#pwd2").addClass("border-blue");
			}
		}
	}
	
	var number=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/g;
	if($("#mrbb-name1").val()==""){
		$(".phone").text("请输入有效的手机号码");
		$("#mrbb-name1").addClass("border-red").removeClass("border-blue");
		return false;
	}
	else {
		if (number.test($("#mrbb-name1").val())){
			$(".phone").text("");
		
			$("#mrbb-name1").addClass("border-blue");
		}else{

			$(".phone").text("请输入有效的手机号码");
			$("#mrbb-name1").addClass("border-red").removeClass("border-blue");
			return false;
		}
		
	}

	

	if($("#code").val()==""){
		$(".code").text("请输入4位随机验证码");
		$("#code").addClass("border-red").removeClass("border-blue");
		return false;
	}
	else if ($("#code").val().length<4){
		
		$(".code").text("请至少输入4个字符");
		$("#code").addClass("border-red").removeClass("border-blue");
		return false;
	}else {
		$(".code").text("");
		$("#code").addClass("border-blue");
	}


	if($("#check").attr("checked")=="checked"){
		$("#zi").removeClass("zi");
			
	}
	else{
	
		$("#zi").addClass("zi");
		return false;
	
	}

	if($("#check1").attr("checked")=="checked"){
		$("#zi1").removeClass("zi");
			
	}
	else{
	
		$("#zi1").addClass("zi");
		return false;
	
	}
}





function checkpwd1(){
	
	if($("#pwd1").val()==""){
		$(".pwd1").text("请输入您的密码");
		$("#pwd1").addClass("border-red").removeClass("border-blue");
	}
	else if ($("#pwd1").val().length<8){
		$(".pwd1").text("请至少输入8个字符");
		$("#pwd1").addClass("border-red").removeClass("border-blue");
	}else {
		$(".pwd1").text("");
		$("#pwd1").addClass("border-blue");
	}

}

function checkpwd2(){
	if($("#pwd2").val()==""){
		$(".pwd2").text("请输入您的密码");
		$("#pwd2").addClass("border-red").removeClass("border-blue");
	}


	else{
		if($("#pwd1").val()==""){
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
			if($("#pwd2").val()!=$("#pwd1").val()){
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


function checkphone(){
	var number=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/g;
	if($("#mrbb-name1").val()==""){
		$(".phone").text("请输入有效的手机号码");
		$("#mrbb-name1").addClass("border-red").removeClass("border-blue");
	}
	else {
		if (number.test($("#mrbb-name1").val())){
			$(".phone").text("");
		
			$("#mrbb-name1").addClass("border-blue");
		}else{

			$(".phone").text("请输入有效的手机号码");
			$("#mrbb-name1").addClass("border-red").removeClass("border-blue");
		}
		
	}
}


function checkuser(){
	var email=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/g;

	var num=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/g;
	if($("#user").val()==""){
		$(".user").text("请输入有效的邮箱或手机号码");
		$("#user").addClass("border-red").removeClass("border-blue");
	}
	else {
		if (num.test($("#user").val()) || email.test($("#user").val())){
			$(".user").text("");
		
			$("#user").addClass("border-blue");
		}else{

			$(".user").text("请输入有效的邮箱或手机号码");
			$("#user").addClass("border-red").removeClass("border-blue");
		}
		
	}
}


/*function checkcode(){
	 
	if($("#code").val()==""){
		
		$(".code").text("请输入4位随机验证码");
		$("#code").addClass("border-red").removeClass("border-blue");
	}
	else if ($("#code").val().length<4){
		
		$(".code").text("请至少输入4个字符");
		$("#code").addClass("border-red").removeClass("border-blue");
	}else {
		$(".code").text($(".mrrb-pic").attr("onclick"));
		$(".code").addClass("border-green");
	}
		
	
}*/

$("button").click(function(){
  $.get("../../public/code2017-12/check_code.php",function(data,status){
    alert("数据: " + data + "\n状态: " + status);
  });
});





function select(){
	$("#check").click(function(){
		var list=$("input[name='list[]']");
		if($("#check").is(":checked")){
			list.each(function(){
				$(this).attr("checked","checked");
				$("#zi").removeClass("border-red");
				

			})
			
		}else{
			list.each(function(){
				$(this).removeAttr($("#check").attr("checked"));
				// $("#zi").addClass("border-red");
			


			})
			
			
		}
	})
	
}
	$(select);
	function select1(){
	$("#check1").click(function(){
		var list=$("input[name='list1[]']");
		if($("#check1").is(":checked")){
			list.each(function(){
				$(this).attr("checked","checked");
				$("#zi1").removeClass("border-red");
				

			})
			
		}else{
			list.each(function(){
				$(this).removeAttr($("#check1").attr("checked"));
				// $("#zi1").addClass("border-red");
			


			})
			
			
		}
	})
	
}
	$(select1);


