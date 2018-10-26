
function delete_shopbox1(e){
	$('.delete-div')
	$(e).parent().remove();
}
function selectall(){
	$("#checkall").click(function () {
		if ($("#checkall").is(":checked")) {
			$("input[name = 'list[]']").prop("checked","checked");
			$("input[name = 'list[]']").attr("checked","checked");
		}else{
			$("input[name = 'list[]']").removeProp("checked");
		}
	})
}

$(selectall);

function DelSelect(){
	var list=$(':checkbox:checked').not("#checkall");
           var ids="";
            list.each(function(){
                ids += $(this).val()+',';
            });
            if(ids.length==0){
                alert('请选择要删除的商品');
            }else{
                //截取最后一个
                ids=ids.substr(0,ids.length-1);
                list.parent().parent().remove();
            }
}
function checkhang(e) {
  if ($(e).find("input[name = 'list[]']").is(":checked")) {
      $(e).find("input[name = 'list[]']").removeProp("checked");
  }
  else{
    $(e).find("input[name = 'list[]']").prop("checked","checked");
    $(e).find("input[name = 'list[]']").attr("checked","checked");
  }
}

// function DelSelect(){
  // var Checkbox=false;
  //  $("input[name='list[]']").each(function(){
  //   if (this.checked==true) {   
  //   Checkbox=true;  
  //   }
  // });
  // if (Checkbox){
  //   var t=confirm("您确认要删除选中的内容吗？");
  //   if (t==true){
  //       $("input[name='list[]']").parent().remove();
  //     }
  //   else{
  //     alert("删除失败");
  //     return false;
  //   }
  //   } 
  //   else{
  //   alert("请选择您要删除的内容!");
  //   return false;
  // }
 
