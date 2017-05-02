$(document).ready(function () {

    var dataIdArr = new Array();
    $('.rt-data').each(function () {
        dataIdArr.push($(this).attr("data_id"));
    });

    $('.nav-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });


    function refreshData() {
        $.get('/portal/refreshData', {
            'dataIdArr[]': dataIdArr,
            model: model,
            access_token: typeof(accessToken) == "undefined" ? "" : accessToken
        }, function (ret) {

            //获取返回的信号数据（数组形式 key 就是对应的dataID）, 遍历对应dataID下的信号数据
            $.each(ret.realtimeData, function (dataID, value) {
                var spIndex = 1;
                //更新时间
                //$('#' + obj.data_id + '-update_datetime').html(obj.update_datetime);

                //显示数据
                if (!value.isEmpty) {
                    var table = $("#realtimeData-" + dataID+" tbody");
                    table.html("");
                    //普通信号的显示
                    $.each(value.signals, function (index,value) {
                        // alert(value.name);
                        //生成一行 代表一条数据
                        var trObj = $('<tr></tr>');
                        //添加序列号
                        trObj.append('<td>' + spIndex + '</td>');
                        trObj.append('<td>' + value.name + '</td>');
                        //添加变量值
                        trObj.append('<td>' + value.value + '</td>');
                        table.append(trObj);
                        spIndex++;
                    });
                } else {
                    var tableEmpty = $("#realtimeData-" + dataID+" tbody");
                    tableEmpty.html("");
                    var trObj = $('<tr></tr>');
                    //添加序列号
                    trObj.append('<td></td>');
                    trObj.append('<td> 无数据 </td>');
                    //添加变量值
                    trObj.append('<td> 无数据 </td>');
                    tableEmpty.append(trObj);
                }

                //循环体实现
                if (!value.noLoop) {
                    //遍历每个循环体
                    $.each(value.loops, function (index,value) {
                        // alert(index);
                        //index:每个循环体的 -  id
                        var loopTable = $(".rt-data-loops-" + index+" tbody");
                        loopTable.html("");

                        //生成每一行


                        //普通信号的显示
                        $.each(value.values, function (index,sigVal) {
                            var trObj = $('<tr></tr>');
                            $.each(sigVal, function (index,sigVal) {
                                //生成一行 代表一个通道
                                trObj.append('<td>' + sigVal + '</td>');
                            });
                            //添加变量值
                            loopTable.append(trObj);
                        });
                    });
                }
            });

        });
    }


    refreshData();
    setInterval(refreshData, 10000);
});
