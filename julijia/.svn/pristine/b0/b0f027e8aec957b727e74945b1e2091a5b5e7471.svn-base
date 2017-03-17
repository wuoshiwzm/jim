/**
 *Created by poseidon on 2016-12-13.
 *desc:退款管理主页js
 */
$(function(){

    //确定退款//
    $('.t_ok').click(function(){
        var refund_id = $(this).attr("data-refund");
        var object = $(this);
        //询问框
        layer.confirm('要确认本次退款吗？', {
            title: ['退款', 'font-size:16px;'],
            btn: ['确定','取消'] //按钮
        }, function(){
            refundConfirm(object,refund_id)
        }, function(){
        });
    });

    /**
     * 确认操作
     * @param object Dom 对象
     * @param refund_id 退款id
     */
   function refundConfirm(object,refund_id)
    {
        $.ajax({
            url:"/admin/refund/confirm",
            method:"post",
            async:false,
            data:{"refund_id":refund_id},
            success:function(data){
                if(data.status == 1) {
                    layer.msg('操作成功', {icon: 1,time:1000});
                    object.remove();
                }else {
                    layer.msg('操作失败', {icon: 2});
                }
            },
            error:function(){
                layer.msg('网络异常', {icon: 1,time:1000});
            }
        })
    }
})
