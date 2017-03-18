/**
 * Created by Administrator on 2016/12/27 0027.
 */
layui.use('form', function(){
    var form = layui.form();
    /**
     * 购物车数据
     */
    form.on('submit(confirmgoods)', function(data){
        var address = $("#addressList li").length;
        var addressCheck =  $("#addressList li").find('.layui-form-checked').length;
        var plist = $(".padding_left").length;
        if( plist == false )
        {
            layer.alert('请选择商品');
            return false;
        }
        if( address == false || addressCheck == false ) {

            layer.open({
                type: 2,
                title:false,
                shadeClose: true,
                shade: 0.8,
                area: ['800px', '550px'],
                content: ['/order/saveaddress','no']
            });
            return false;
        }

        if( $("#order").val() == false )
        {
            return false;
        }
    });

    /**
     * 立即购买数据
     */
    form.on('submit(buynowgoods)', function(data){
        var address = $("#addressList li").length;
        var addressCheck =  $("#addressList li").find('.layui-form-checked').length;
        var plist = $(".padding_left").length;
        if( plist == false )
        {
            layer.alert('请选择商品');
            return false;
        }
        if( address == false || addressCheck == false ) {
            layer.open({
                type: 2,
                title:false,
                shadeClose: true,
                shade: 0.8,
                area: ['800px', '550px'],
                content: ['/order/saveaddress','no']
            });
            return false;
        }

        if( $("#pid").val() == false || $("#num").val() == false )
        {
            return false;
        }

    });
});


/**
 * 切换收货地址
 */
$(".checkbox").click(function () {

    $(this).find(".layui-form-checkbox").addClass('layui-form-checked');
    $(this).siblings().find(".layui-form-checkbox").removeClass('layui-form-checked');

    $( this ).find('input').attr('checked','checked');
    $( this ).siblings().find('input').removeAttr('checked');

    var str = $(this).find(".addressContent").html();
    $("#setAddress").empty();
    $("#setAddress").append(str);

});


/**
 * 添加地址
 */
$('.add_adress_tt').click(function(){
    layer.open({
        type: 2,
        title:false,
        shadeClose: true,
        shade: 0.8,
        area: ['800px', '550px'],
        content: ['/order/saveaddress','no']
    });
});

/**
 * 修改收货地址
 */
$(".add_adress_edit").click(function () {
    var id = $(this).attr('data-id');
    layer.open({
        type: 2,
        title:false,
        shadeClose: true,
        shade: 0.8,
        area: ['800px', '550px'],
        content: ['/order/editaddress?id='+id,'no']
    });
});

/**
 * 判断地址是否存在
 * @type {number|jQuery}
 */
var address = $("#addressList li").length;
if( address == false )
{
    layer.open({
        type: 2,
        title:false,
        shadeClose: true,
        shade: 0.8,
        area: ['800px', '550px'],
        content: ['/order/saveaddress','no']
    });
}

/**
 * 展开收缩
 */
$(".shou_adress_top").click(function(){

    var value = $(this).attr('data-id');
    if( value == '1' )
    {
        $(".shou_huo li").hide();
        $(".shou_huo li .layui-form-checked").parent('li').show();
        $(this).attr('data-id','0');
        $(this).text('展开地址');
    }else
    {
        $(".shou_huo li").show();
        $(this).text('收起地址');
        $(this).attr('data-id','1');
    }
});


/**
 * 设置默认地址
 */
$(".address_default").click(function () {
    var id = $(this).attr('data-id');
    var token = $('meta[name="_token"]').attr('content');
    $.post('/order/address',{id:id,token:token},function ( msg ) {
        if( msg == 'no' )
        {
            layer.confirm('登录', {
                btn: ['去登录','暂不登录']
            },function(index){
                location.href = '/member/login?redirectURL='+encodeURIComponent($('meta[name="redirectURL"]').attr('content'));
            });

        }else if( msg == 'fail' )
        {
            layer.msg('设置失败');
        }else
        {
            $("#addressList").empty();
            $("#addressList").append( msg );
            var str = $("#addressContent").html();
            $("#setAddress").empty();
            $("#setAddress").append(str);
            $.getScript('/js/frontend/order.js');
        }
    });
});