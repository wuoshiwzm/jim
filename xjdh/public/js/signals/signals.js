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
    if (jim_name == '') {
        alert('信号名称必填');
    } else {
        $.post("updateSignalMap", {"id": id, "jim_name": jim_name, "tel_name_id": tel_name_id}, function (data) {
            if (data == 'true') {
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

        if (jim_name == '') {
            alert('信号名称必填');
        } else {
            $.post("deleteSignalMap", {"id": id, "jim_name": jim_name, "tel_name_id": tel_name_id}, function (data) {
                if (data == 'true') {
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


        if (jim_name == '' && model_add == '' && add_tel_name_id == '') {
            alert('信号名称必填');
        } else {
            $.post("addSignalMap",
                {"type": type, "model_add": model_add, "jim_name": jim_name, "add_tel_name_id": add_tel_name_id},
                function (data) {
                    if (data == 'true') {
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

        $.post("deleteConvergence", {"id": id}, function (data) {
            if (data == 'true') {
                location.reload();
            }
        });
        return true;
    }
    return false;
});


/**
 * 实时数据信号处理
 */

//添加
$(".add_realtime_signal").bind("click", function () {
    if (window.confirm("确认添加吗?")) {
        var model = $(this).parent().parent().find("#model").val();
        var parameter = $(this).parent().parent().find(".parameter").val();
        var signal_unit = $(this).parent().parent().find(".signal_unit").val();
        var signal_type = $(this).parent().parent().find(".signal_type").val();
        var signal_desc = $(this).parent().parent().find(".signal_desc").val();

        if (model == '' || signal_unit == '' || signal_type == '' || parameter == '') {
            alert('信号未填写完全');
        }
        else {
            $.post("addRealtimeSignal",
                {
                    "model": model, "signal_unit": signal_unit,"parameter":parameter,
                    "signal_type": signal_type,"signal_desc": signal_desc
                },
                function (data) {
                    if (data == 'true') {
                        location.reload();
                    }
                });
            // }
            return true;
        }
        return false;
    }
});

//update
$(".update_realtime_signal").bind("click", function () {

    var id = $(this).parent().parent().find(".id").html();
 var parameter = $(this).parent().parent().find(".parameter").val();
 var signal_unit_update = $(this).parent().parent().find(".signal_unit_update").val();
 var signal_type_update = $(this).parent().parent().find(".signal_type_update").val();
 var signal_desc_update = $(this).parent().parent().find(".signal_desc_update").val();


    if (model == '' || signal_unit_update == '' || signal_type_update == '' || parameter == '') {
        alert('信号名称必填');
    } else {
        $.post("updateRealtimeSignal", {"id": id,  "signal_unit": signal_unit_update,
                "parameter":parameter, "signal_type": signal_type_update,"signal_desc": signal_desc_update},
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

        var id = $(this).parent().parent().find(".id").html();
        $.post("deleteRealtimeSignal", {"id": id}, function (data) {
            if (data == 'true') {
                location.reload();
            }
        });
        return true;
    }
    return false;
});
