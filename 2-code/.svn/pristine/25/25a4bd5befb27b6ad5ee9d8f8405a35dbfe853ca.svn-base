

/**
 *  导航js
 * @type {(function())|jQuery}
 */
var dh = $("#top").offset().top; //div 距离顶部的高度
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
});

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

/**
 *  倒计时调用
 */
if( $("#second").find('font').length )
{
    var time = parseInt( $("#second").attr('data-val') );
    if( time )
    {
        countDown( time );
    }
    $("#second").prevAll('.black').css('display','block');
}

/**
 * 倒计时方法
 * @param maxtime
 * @param index
 */

function countDown( maxtime  )
{
    var timer = setInterval(function()
    {
        if( maxtime >=0 )
        {
            second = Math.floor( maxtime % 60);       //计算秒
            minite = Math.floor((maxtime / 60) % 60); //计算分
            hour = Math.floor((maxtime / 3600) % 24 ); //计算小时
            day = Math.floor((maxtime / 3600) / 24);
            msg = hour+':'+minite+':'+second;
            $("#second").find('font').html( msg );
            --maxtime;
        }
        else
        {
            clearInterval( timer );
            $("#second").find('font').html( '活动结束' );
        }
    }, 1000);
}

/**
 *  输入数字验证
 */
$("#num").keyup(function () {
    var num = $.trim($(this).val());
    if( num )
    {
        var reg = /^[1-9]\d{0,9}$/;
        if ( !reg.test(num) )
        {
            $(this).val(1);
        }
        var kc = $.trim($("#kc").text());
        if( parseInt(kc) < parseInt(num) )
        {
            layer.msg('您所填写的数量超过库存');
            $(this).val(1);
        }
    }
});

/**
 * 减产品数量
 */
$("#reduce").click(function () {
    var num = $.trim($("#num").val())?$.trim($("#num").val()):0;
    if( num == 0 )
    {
        $("#num").val(1);
    }else
    {
        if( num > 1 )
        {
            var num = parseInt(num)-1;
            $("#num").val(num);
        }else
        {
            $("#num").val(parseInt(num));
        }
    }
});

/**
 * 加产品数量
 */
$("#plus").click(function () {
    var num = $.trim($("#num").val())?$.trim($("#num").val()):0;
    var addNum = parseInt(num)+1;
    var kc = $.trim($("#kc").text());
    if( parseInt(kc) < parseInt(addNum) )
    {
        layer.msg('您所填写的数量超过库存');
        $("#num").val(1);
    }else
    {
        $("#num").val(addNum);
    }
});



/**
 * 评论分页
 * @param page
 */
function getProducts( page, index  )
{
    var id =  $('#entity_id').val();
    var type = $(index).parents('ul').parents('ul').attr('id');
    $.get('/'+id+'.html?type='+type+'&page='+page,function ( data )
    {
        $("#"+type).empty();
        if( data )
        {
            $("#"+type).append(data);
        }
    });
}


/**
 * 收藏
 */
$(".keepYes").click(function () {
    var arr = {};
    arr.entity_id = $("#entity_id").val();
    arr.token = $("input[name='_token']").val();
    $.ajax({
        url:'/goods/keep',
        data:{data:arr},
        type:'POST',
        headers:{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
        success:function( msg ){
            if( msg == 'no' )
            {
                layer.confirm('登录后才能收藏', {
                    btn: ['暂不登录', '去登录']
                },function(index){
                    location.href = '/member/login?redirectURL='+encodeURIComponent($('meta[name="redirectURL"]').attr('content'));
                });

            }else if( msg == 'success' )
            {
                layer.msg('收藏成功');

            }else
            {
                layer.msg('收藏失败');
            }
        },
        error:function(){

            layer.msg('收藏失败');
        },
        async:false
    });
});


/**
 * 收藏时去登录
 */
$(".keepNo").click(function () {
    layer.confirm('登录后才能收藏', {
        btn: ['去登录', '暂不登录']
    },function( index ){
        location.href = '/member/login?redirectURL='+encodeURIComponent($('meta[name="redirectURL"]').attr('content'));
    });
});

/**
 * 选择属性
 */
$(".checkd").click(function () {

    $( this ).addClass('xuan_on');
    $( this ).siblings().removeClass('xuan_on');
    var strKey = $( this ).parents('li').find('.black').text();
    var strValue = $( this ).find('i').text();
    $( this ).parents('li').find('input').val( strKey+'|'+strValue );
    
});

/**
 * 加入购物车和立即购买下订单
 */
$(".buy-button").click(function () {
    //验证数字
    var num = $.trim($("#num").val());
    if( num )
    {
        var reg = /^[1-9]\d{0,9}$/;
        if ( !reg.test(num) )
        {
            $(this).val(1);
            return false;
        }
        var kc = $.trim($("#kc").text());
        if( parseInt(kc) < parseInt(num) )
        {
            layer.msg('您所填写的数量超过库存');
            $(this).val(1);
            return false;
        }

        if( $("#entity_id").val() == false )
        {
            return false;
        }
        var path = $(this).attr('data-url');
        $("#frm").attr("action", path).submit();
    }else
    {
        layer.msg('您填写数量');
        return false;
    }
});
