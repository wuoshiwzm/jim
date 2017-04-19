/**
 * Created by jim on 2017/4/13.
 */
/**
 * Created by jim on 2017/2/22.
 */
/**
 * 设备信号
 */
//更新信号名称
$(".update_signal").bind("click", function () {

    var id = $(this).parent().parent().find(".id").val();
    var jim_name = $(this).parent().parent().find(".jim_name").val();
    var tel_name_id = $(this).parent().parent().find(".tel_name_id").val();
    if(jim_name==''){
        alert('信号名称必填');
    }else{
        $.post("updateSignalMap",{"id":id,"jim_name":jim_name,"tel_name_id":tel_name_id},function(data){
            if(data == 'true'){
                alert('更新成功！');
                location.reload();
            }
        });
    }
});

//删除信号名称
$(".delete_signal").bind("click", function () {
    if (window.confirm("确认删除吗?")) {
        var id = $(this).parent().parent().find(".id").val();
        var jim_name = $(this).parent().parent().find(".jim_name").val();
        var tel_name_id = $(this).parent().parent().find(".tel_name_id").val();

        if(jim_name==''){
            alert('信号名称必填');
        }else{
            $.post("deleteSignalMap",{"id":id,"jim_name":jim_name,"tel_name_id":tel_name_id},function(data){
                if(data == 'true'){
                    location.reload();
                }
            });
        }
        return true;
    }

    return false;

});

//添加一个信号名称映射
$(".add_signal").bind("click", function () {
    if (window.confirm("确认添加吗?")) {
        var model_add = $(this).parent().parent().find("#model_add").val();
        var jim_name = $(this).parent().parent().find(".jim_name").val();
        var add_tel_name_id = $(this).parent().parent().find(".add_tel_name_id").val();
        var type = $(this).parent().parent().find(".type").val();


        if(jim_name=='' && model_add =='' && add_tel_name_id==''){
            alert('信号名称必填');
        }else{
            $.post("addSignalMap",
                {"type":type,"model_add":model_add,"jim_name":jim_name,"add_tel_name_id":add_tel_name_id},
                function(data){
                if(data == 'true'){
                    location.reload();
                }
            });
        }
        return true;
    }
    return false;

});


/**
 * 告警收敛
 */
/**
 * 删除收敛映射
 */
$(".delete_signal_convergence").bind("click", function () {
    if (window.confirm("确认删除吗?")) {
        var id = $(this).parent().parent().find(".signal_id").html();

            $.post("deleteConvergence",{"id":id},function(data){
                if(data == 'true'){
                    location.reload();
                }
            });

        return true;
    }

    return false;

});
