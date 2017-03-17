/**
 * Created by Administrator on 2016-12-11.
 * 订单详情页
 */
$(function(){
    var order_id = $("#order_id").val();
    //修改价格页面
    $('.modify').click(function(){
        var url = "/admin/order/modify?order_id="+order_id;
        layer.open({
            type: 2,
            title:false,
            shadeClose: true,
            shade: 0.8,
            area: ['940px', '600px'],
            content: [url,'yes']
        });
    });

    //删除订单
    $('.dele_dd').click(function(){
        //询问框
        layer.confirm('确定要删除订单？', {
            title: ['删除订单', 'font-size:16px;'],
            btn: ['确定','取消']
        }, function(){
            deleteOrder();
        }, function(){
            layer.msg('取消删除', {icon: 2,time:1000});
        });
    });
    //删除订单
    function deleteOrder()
    {
        $.ajax({
            url:"/admin/order/delete",
            method:"post",
            async:false,
            data:{"order_id":order_id},
            success:function(data){
                if (data.status == 1) {
                    layer.msg('已经删除', {icon: 1,time:1000});
                    location.href = "/admin/order/index";
                }else {
                    layer.msg('删除失败', {icon: 2,time:1000});
                }
            },
            error:function(){
                layer.msg('网络异常', {icon: 1,time:1000});
            }
        })
    }

})