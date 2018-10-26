function delete_shopbox(e){
	$('.delete-div')
	$(e).parent().parent().parent().parent().parent().remove();
}
function add(q){
	$('cart-table-content-td4')
	var old_num = $(q).parent().find('input[ id="goods_num"]').val();
	var new_num = parseInt(old_num)+1;
	$(q).parent().find('input[ id="goods_num"]').val(new_num);

	var sin = $('#cart-table-content-td3-price ').find('span').text();
	var sum = sin * new_num;
	$('#shopbox-price').text('￥'+sum);
	$('#shopbox-price1').text('￥'+sum);
		// 	var sin = $('#cart-table-content-td3-price ').find('span').text();
		// 	var num = document.getElementById("goods_num").value;
		// 	var sum = sin * num;
		// 	$('#shopbox-price').text('￥'+sum);
		// 	$('#shopbox-price1').text('￥'+sum);
		}
function del(q){
	$('cart-table-content-td4')
	var old_num = $(q).parent().find('input[ id="goods_num"]').val();
	var new_num = parseInt(old_num)-1;
	if (new_num<=0) {
		$(q).parent().find('input[ id="goods_num"]').val('1');
	}
	else  {
		$(q).parent().find('input[ id="goods_num"]').val(new_num);
	}

	// alert(old_num);
	// $(q).parent().remove();
	// 
	// var new_num = parseInt(old_num)-1;//转换成整形数字
	
	var sin = $('#cart-table-content-td3-price ').find('span').text();
	var sum = sin * new_num;
	$('#shopbox-price').text('￥'+sum);
	$('#shopbox-price1').text('￥'+sum);
}
function imgchange() {
	var i = document.getElementsByName("my-boxx").text;
	alert(i);
	// alert($("span").text());
	// $("#my-boxx").click(function() {
	// 	$('#cart-left').attr("src","./images/secondary-skincare-slot-1.jpg")
	// })
	// $("#pad").click(function() {
	// 	$('#cart-left').attr("src","./images/secondary-skincare-slot-2.jpg")
	// })
	// $("#success").click(function() {
	// 	$('#cart-left').attr("src","./images/secondary-skincare-slot-3.jpg")
	// })
}
