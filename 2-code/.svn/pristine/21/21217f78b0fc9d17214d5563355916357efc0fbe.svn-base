/**
 * Created by Administrator on 2016/12/13 0013.
 */

//幻灯图
jQuery(".home_news_pic").slide({mainCell:".bd ul",autoPlay:true,delayTime:300,interTime:6000});

//分类导航
jQuery("#nav").slide({  type:"menu", titCell:".mainCate", targetCell:".subCate", defaultPlay:false, returnDefault:true });

//列表页导航特效
$(function() {
    var $t, leftX, newWidth;
    $('.list_nav ul').append('<div class="block"></div>');
    var $block = $('.block');
    if($(".current").length )
    {
        $block.width($(".current").width()).css('left', $('.current a').position().left).data('rightLeft', $block.position().left).data('rightWidth', $block.width());
    }
    $('.list_nav ul li').find('a').hover(function() {
        $t = $(this);
        leftX = $t.position().left;
        newWidth = $t.parent().width();
        $block.stop().animate({
            left: leftX,
            width: newWidth
        },300);
    }, function() {
        $block.stop().animate({
            left: $block.data('rightLeft'),
            width: $block.data('rightWidth')
        },300)
    })
});


jQuery(".bottom_hd").slide({trigger:"click"});
jQuery(".bulid_ch").slide({trigger:"click"});
jQuery(".dianping_ping").slide({trigger:"click"});
$(".huifu_p").hide();
$(".huifu").click(function(){
    $(".huifu_p").slideToggle("slow");
});
$(function(){
    $('.star_ul a').hover(function(){$(this).addClass('active-star');$('.s_result').css('color','#c00').html($(this).attr('title'))},function(){$(this).removeClass('active-star');$('.s_result').css('color','#333').html('请打分')});
    $('.star_ul a').click(function(){
        alert($('.s_result').html());
    })
});


/*var dh = $("#top").offset().top; //div 距离顶部的高度
$(window).scroll(function()
{
    var gh = $(this).scrollTop(); //滚动条距离顶部的高度
    if( gh >= dh )
    {
        $("#top").addClass('top_on');
    }
    if( gh < dh )
    {
        $("#top").removeClass('top_on');
    }
});*/

function animate1(item)
{
    var mtop = $('#top').height();
    var top = $(item).offset().top;
    if( top > 0 )
    {
        if( $(".bulid_ch").hasClass('top_on') ) $('html,body').animate({scrollTop:top-mtop}, 1000);
        else  $('html,body').animate({scrollTop:top-(mtop*2)}, 1000);

    }
}


new WOW().init();
$(".qiang_div02 ul li:eq(0)").css("border-top","1px solid #92a9d3");
$(".qiang_div02 ul li:eq(1)").css("border-top","1px solid #dfc444");
$(".qiang_div02 ul li:eq(2)").css("border-top","1px solid #9bcb99");
$(".qiang_div02 ul li:eq(3)").css("border-top","1px solid #dfc444");
$(".qiang_div02 ul li:eq(4)").css("border-top","1px solid #92a9d3");