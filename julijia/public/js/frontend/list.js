/**
 * Created by Administrator on 2016/12/20 0020.
 */
$(".option_mroe").click(function () {
    if( $(this).parents('.detail-option').find('.nav_all02').length )
    {
        $(this).parents('.detail-option').find('.nav_all').removeClass('nav_all02');
        $(this).html("更多<font>&gt;</font>");
    }else
    {
        $(this).parents('.detail-option').find('.nav_all').addClass('nav_all02');
        $(this).html("收起<font>&gt;</font>");
    }
});


/**
 * 收藏
 */
$(".keepYes").click(function () {
    var arr = {};
    arr.entity_id = $(this).attr('data-id');
    arr.token = $('meta[name="_token"]').attr('content');
    $.ajax({
        url:'/goods/keep',
        data:{data:arr},
        type:'POST',
        headers:{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
        success:function( msg ){
            if( msg == 'no' )
            {
                layer.confirm('登录后才能收藏', {
                    btn: ['去登录', '暂不登录']
                },function( index ){
                    location.href = '/member?redirectURL='+encodeURIComponent($('meta[name="redirectURL"]').attr('content'));
                });

            }else if( msg == 'success' )
            {
                layer.msg('收藏成功');

            }else if( msg == 'keeps' )
            {
                layer.msg('不能重复收藏');
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