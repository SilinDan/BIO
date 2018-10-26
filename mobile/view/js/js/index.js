 //异步从数据库中取数据
                 $(document).ready(function(){
                      //alert('yyy'+'data');
                      $.ajax({
                        // url:"../../home/api/index1.api.php",
                        url:"../../home/api/index1.api.php",
                        type:"get",
                        dataType:"json",
                        data:{act:"ajaxIndex"},
                        success:function(data){
                           var tab1='';
                           var tab2='';
                           var tab3='';
                           var tab4='';
                           var tab5='';
                                  tab1+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[0].goods_id+'"> <img src="../../home/view/images/goods/'+data[0].goods_img+'" ></a> <span class="span-font">'+data[0].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[0].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[0].goods_id+')">立即购买</button> </div> '
                                  tab1+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[14].goods_id+'"> <img src="../../home/view/images/goods/'+data[14].goods_img+'" ></a> <span class="span-font">'+data[14].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[14].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[14].goods_id+')">立即购买</button> </div> '

                                   tab2+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[2].goods_id+'"> <img src="../../home/view/images/goods/'+data[2].goods_img+'" ></a> <span class="span-font">'+data[2].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[2].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[2].goods_id+')">立即购买</button> </div> '
                                  tab2+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[3].goods_id+'"> <img src="../../home/view/images/goods/'+data[3].goods_img+'" ></a> <span class="span-font">'+data[3].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[3].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[3].goods_id+')">立即购买</button> </div> '
                                   tab3+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[4].goods_id+'"> <img src="../../home/view/images/goods/'+data[4].goods_img+'" ></a> <span class="span-font">'+data[4].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[4].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[4].goods_id+')">立即购买</button> </div> '
                                  tab3+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[5].goods_id+'"> <img src="../../home/view/images/goods/'+data[5].goods_img+'" ></a> <span class="span-font">'+data[5].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[5].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[5].goods_id+')">立即购买</button> </div> '
                                   tab4+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[6].goods_id+'"> <img src="../../home/view/images/goods/'+data[6].goods_img+'" ></a> <span class="span-font">'+data[6].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[6].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[6].goods_id+')">立即购买</button> </div> '
                                  tab4+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[7].goods_id+'"> <img src="../../home/view/images/goods/'+data[7].goods_img+'" ></a> <span class="span-font">'+data[7].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[7].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[7].goods_id+')">立即购买</button> </div> '
                                  tab5+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[8].goods_id+'"> <img src="../../home/view/images/goods/'+data[8].goods_img+'" ></a> <span class="span-font">'+data[8].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[8].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[8].goods_id+')">立即购买</button> </div> '
                                  tab5+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[9].goods_id+'"> <img src="../../home/view/images/goods/'+data[9].goods_img+'" ></a> <span class="span-font">'+data[9].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[9].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[9].goods_id+')">立即购买</button> </div> '

                           $("#goods_one").html(tab1);
                            $("#goods_two").html(tab2);
                            $("#goods_three").html(tab3);
                            $("#goods_four").html(tab4);
                            $("#goods_five").html(tab5);
                           }
                            })

                });

   //获取全部礼盒
        $(document).ready(function(){   
            $.ajax({
                url:"../../home/api/searchGoodsList.api.php?act=ajaxGiftShow",
                 type:"get",
                 dataType:"json",
                 data:{ },
                   success:function(data){
                    var tab='';
              
                   $.each(data,function(i){
                     tab+='<div class="goods-small"><a href="mobile-detail-bio.php?id='+data[i].goods_id+'"> <img src="../../home/view/images/goods/'+data[i].goods_img+'" ></a> <span class="span-font">'+data[i].goods_name+'</span><br><div class="star-grade"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> </div> </a> <span class="font-price">￥'+data[i].goods_price+'</span><br /><button type="button" onclick="getGoodsId('+data[i].goods_id+')">立即购买</button> </div> ';
                   })
                    console.log(data);
                  $("#giftBox").html(tab);
                }
            })      
        })
    
    //点击购买
        function getGoodsId($id) {
            $.ajax({
                url:"../../home/api/index1.api.php?act=add",
                type:"get",
                dataType:"json",
                data:{"id":$id},
                success:function(data){
                   if(data==0){
                    window.location.href="moblie-admin-bio.php";
                    
                   }else{
                     window.location.href="mobile-shoppingcart1.php";
                   }
                }
            })
        }

        function searchBoxSubmit(){
    var searchValue = $("#searchBox").val();
    var searchUrl =encodeURI('mobile-goods-fiflter.php?searchValue=' + searchValue+'&searchJudge=search');
    window.location.href =searchUrl;
  }

                                  