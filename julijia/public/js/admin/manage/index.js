/**
 *Created by poseidon on 2017-01-09.
 *desc: 后台用户管理
 */
$(function(){

    var user_id;
    //重置密码
    $('.user_mi').click(function(){
        user_id = $(this).attr("data-id");
        //清空原有数据
        $("#password").val("");
        index = layer.open({
            type: 1,
            title:false,
            shadeClose: true,
            shade: 0.6,
            area: ['444px', '262px'],
            content: $(".phone")
        });
    });

    //取消
    $("#cancel").click(function(){
        layer.close(index);
    })

    //确认
    $("#confirm").click(function(){
        var new_password = $.trim($("#password").val());
        if (new_password == "") {
            layer.msg("请输入新密码");
            return false;
        }
        $.post("/admin/manage/modify",{password:new_password,user_id:user_id},function(data){
            if(data.status == 1) {
                layer.msg("修改成功");
                layer.close(index);
            }else {
                layer.msg(data.msg);
            }
        })
    })

    //删除
    $('.dele_user').click(function(){
        var user_id = $(this).attr("data-id");
        //询问框
        layer.confirm('确定要删除？', {
            title: ['删除', 'font-size:16px;'],
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("/admin/manage/delete",{user_id:user_id},function(data){
                if(data.status == 1) {
                    layer.msg("删除成功");
                    location.reload();
                }else {
                    layer.msg(data.msg);
                }
            })
        }, function(){
            layer.msg('取消删除', {icon: 2});
        });
    });

})
