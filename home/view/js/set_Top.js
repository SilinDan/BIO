//js方法
/*var four;
function Topfun(){
    four=setInterval(FourscrollBy,10);
}
function FourscrollBy(eachHeight){
    if(document.documentElement && document.documentElement.scrollTop) {//IE
        if(document.documentElement.scrollTop<=0){
            clearInterval(four);
        }else{
             window.scrollBy(0,-30);
        }
    }else{ //Chrome不支持documentElement.scrollTop
        if(document.body.scrollTop<=0){
            clearInterval(four);
        }else{
            window.scrollBy(0,-30);
        }
    }
}
*/
//jQuery方法
$(function(){
        //顶部
        $(".detail-bio-box-fixed3").click(function(){$("html,body").animate({scrollTop: "0px"}, 800);});
        //中间
        $('.scroll_a').click(function(){$('html,body').animate({scrollTop:$('.a').offset().top}, 800);});
        //底部
        $('.scroll_bottom').click(function(){$('html,body').animate({scrollTop:$('.bottom').offset().top}, 800);});
    });


$(function(){
        $(".detail-bio-box-fixed").click(function(){
            
            $(window).attr('location','bio-service.php');
        });
    });
$(function(){
        $(".detail-bio-box-fixed2").click(function(){
            
            $(window).attr('location','bio_try.php');
        });
    });