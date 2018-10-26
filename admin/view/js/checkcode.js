 

function chang_codes(){
	$('#img_code').click(function(){
		$('#img_code').attr('src',"../../public/checkcode/code.php?t="+Math.random());
	});
}
$(chang_codes);
//function chang_code()
//{
// var img=document.getElementById("img_code");
// img.src="code.php?t="+Math.random();
//}



	function ajaxCheckCode() {
				$("#code").blur(function () {
					//alert($(this).val());
					$.ajax({
						url:"../../api/check_code.php?act=ajaxCheckCode",
						type:'get',
						dataType:"html", //
						data:{user:$(this).val()}, //
						success:function(res) {
						$("#tishi").html(res);
						}
					})
				})
			}
			$(ajaxCheckCode);


