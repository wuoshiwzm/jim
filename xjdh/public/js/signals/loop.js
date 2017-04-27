/**
 * 实时数据信号处理
 */

//添加
$(".add_realtime_signal").bind("click", function () {

    if (window.confirm("确认添加吗?")) {
        var id = $(this).parent().parent().find(".loop_id").val();
        var model = $(this).parent().parent().find(".loop_model").val();
        var parameter = $(this).parent().parent().find(".parameter").val();
        var signal_unit = $(this).parent().parent().find(".signal_unit").val();
        var signal_type = $(this).parent().parent().find(".signal_type").val();
        var signal_desc = $(this).parent().parent().find(".signal_desc").val();
        var signal_name = $(this).parent().parent().find(".signal_name").val();

        if (model == '' || signal_unit == '' || signal_type == '' || parameter == '') {
            alert('信号未填写完全');
        }
        else {
            $.post("/signals/addLoopSignal",
                {
                    "id": id, "model": model, "signal_unit": signal_unit, "parameter": parameter,
                    "signal_type": signal_type, "signal_desc": signal_desc, "signal_name": signal_name
                },
                function (data) {
                    if (data == 'true') {
                        location.reload();
                    }
                });
            return true;
        }
        return false;
    }
});

//update
$(".update_realtime_signal").bind("click", function () {
    var id = $(this).parent().parent().find(".loop_id").val();
    var parameter = $(this).parent().parent().find(".parameter").val();
    var signal_unit_update = $(this).parent().parent().find(".signal_unit_update").val();
    var signal_type_update = $(this).parent().parent().find(".signal_type_update").val();
    var signal_desc_update = $(this).parent().parent().find(".signal_desc_update").val();
    var signal_name_update = $(this).parent().parent().find(".signal_name_update").val();


    if (signal_unit_update == '' || signal_type_update == '' || parameter == '') {
        alert('信号名称等信息必填');
    } else {
        $.post("/signals/updateLoopSignal", {
                "id": id, "signal_unit": signal_unit_update,
                "parameter": parameter, "signal_type": signal_type_update,
                "signal_desc": signal_desc_update, "signal_name": signal_name_update
            },
            function (data) {
                if (data == 'true') {
                    alert('更新成功！');
                    location.reload();
                }
            });
    }
});

//delete
$(".delete_realtime_signal").bind("click", function () {
    if (window.confirm("确认删除吗?")) {
        var id = $(this).parent().parent().find(".loop_id").val();
        var parameter = $(this).parent().parent().find(".parameter").val();

        $.post("/signals/deleteLoopSignal", {"id": id,"parameter":parameter}, function (data) {
            if (data == 'true') {
                location.reload();
            }
        });
        return true;
    }
    return false;
});

