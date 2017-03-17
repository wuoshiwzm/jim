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
            deleteAction(user_id);
        }, function(){
            layer.msg('取消删除', {icon: 2});
        });
    });
    //全选
    $(".check-all").click(function(){
        if($(this).is(":checked")) {
            $(".tcheck :checkbox").prop("checked",true);
        }else {
            $(".tcheck :checkbox").prop("checked",false);
        }
    })

    //批量删除
    $(".batch-delete").click(function(){

        //询问框
        layer.confirm('确定要删除？', {
            title: ['删除', 'font-size:16px;'],
            btn: ['确定','取消'] //按钮
        }, function(){
            var select_box = $(".tcheck input:checkbox:checked");
            var length = select_box.length;
            if(length ==  0 ) {
                layer.msg('选择要删除的用户', {icon: 2});
                return false;
            }
            //获取选中的用户id
            var userArr = [];
            $.each(select_box,function(){
                userArr.push($(this).val());
            })
            deleteAction(userArr.join());
        }, function(){
            layer.msg('取消删除', {icon: 2});
        });

    })
    //单个用户勾选
    $(".checkBox").click(function(){
        //获取总的checkbox数目
        var boxLength = $(".tcheck input:checkbox").length;
        //获取选中checkbox数目
        var boxSelected = $(".tcheck input:checkbox:checked").length;
        if (boxLength == boxSelected)
            $(".check-all").prop("checked",true);
    })


    //删除动作
    function deleteAction(user_id){
        $.post("/admin/manage/delete",{user_id:user_id},function(data){
            if(data.status == 1) {
                layer.msg("删除成功");
                location.reload();
            }else {
                layer.msg(data.msg);
            }
        })
    }
})
