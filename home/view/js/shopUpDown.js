function del($id){
	var id = $id;
	var box = $('#del'+id).parent().find('#text_box'+id).val();
	var qian = $('#del'+id).parent().parent().parent().find('#qianqian'+id).text();
	var i = $('#del'+id).parent().parent().parent().find('#how').text();
	var tiao = $('#del'+id).parent().parent().parent().parent().parent().find('#box1-text1').text();
	var num = Number(box);
	var ii = Number(i);
	var price = Number(qian);
	if(num==1){
		var sum =1;
	}
	else{
		var sum = num-1;
	}
	var all = price*sum;
	var quan = Number(tiao);
	
	$('#text_box'+id).val(sum);
	$('#box2-span'+ii).text(all);
	var o =0;
	for(var j=0;j<quan;j++){
		var tiao = $('#del'+id).parent().parent().parent().parent().parent().find('#box2-span'+j).text();
		var tiao1 = Number(tiao);
		o +=tiao1;
	}
	$('#box3-text2').text(o);
	
		$.ajax({
				url:"../api/index1.api.php?act=shop",
				type:"get",
				dataType:"json",
				data:{"shop_id":$id},
				success:function(data){
					console.log(data);
						// window.location.reload();
						// alert("什么贵！");
				}
		})
		// alert(i);
}
function add($id){
	var id = $id;
	var box = $('#add'+id).parent().find('#text_box'+id).val();
	var qian = $('#add'+id).parent().parent().parent().find('#qianqian'+id).text();
	var i = $('#add'+id).parent().parent().parent().find('#how').text();
	var tiao = $('#add'+id).parent().parent().parent().parent().parent().find('#box1-text1').text();
	var num = Number(box);
	var ii = Number(i);
	var price = Number(qian);
	var sum = num+1;
	var all = price*sum;
	var quan = Number(tiao);
	$('#text_box'+id).val(sum);
	$('#box2-span'+ii).text(all);
	var o =0;
	for(var j=0;j<quan;j++){
		var tiao = $('#add'+id).parent().parent().parent().parent().parent().find('#box2-span'+j).text();
		var tiao1 = Number(tiao);
		o +=tiao1;
	}
	$('#box3-text2').text(o);
		$.ajax({
				url:"../api/index1.api.php?act=shop1",
				type:"get",
				dataType:"json",
				data:{"shop_id":$id},
				success:function(data){
					console.log(data);
					// alert("已添加到购物袋！");
					// window.location.reload();
					// window.location.href='bio-shoppingcart.php';
				}
		})
		// alert("已添加到购物袋！");
}
