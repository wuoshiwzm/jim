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
        //alert(dataIdArr[0]);
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


            // for (var spIndex = 0; spIndex < ret.realtimeData.length; spIndex++) {
            //     var obj = ret.realtimeData[spIndex];
            //     //更新时间
            //     //$('#' + obj.data_id + '-update_datetime').html(obj.update_datetime);
            //     //显示数据
            //     if (!obj.isEmpty) {
            //         var table = $("#realtimeData");
            //         $.each(obj, function (index, value) {
            //             //生成一行 代表一个通道
            //             var trObj = $('<tr></tr>');
            //             //添加序列号
            //             trObj.append('<td>' + (spIndex + 1) + '</td>');
            //             $.each(value, function () {
            //                 //添加变量名
            //                 trObj.append('<td>' + $(this).name + '</td>');
            //                 //添加变量值
            //                 trObj.append('<td>' + $(this).value + '</td>');
            //             });
            //             //将对应通道插入表格
            //             table.append(trObj);
            //         });
            //
            //         //
            //         //
            //         // if (model == "dk04") {
            //         //     $("#dk04-" + obj.data_id + "-field0").text(obj.SysV);
            //         //     $("#dk04-" + obj.data_id + "-field1").text(obj.ILoad);
            //         //     $("#dk04-" + obj.data_id + "-field2").text(obj.IBat1);
            //         //     $("#dk04-" + obj.data_id + "-field3").text(obj.IBat2);
            //         //     $("#dk04-" + obj.data_id + "-field4").text(obj.IBat3);
            //         //     $("#dk04-" + obj.data_id + "-field5").text(obj.IBat4);
            //         //     $("#dk04-" + obj.data_id + "-field6").text(obj.VAcSys);
            //         //     $("#dk04-" + obj.data_id + "-field7").text(obj.I1AcSys);
            //         //     $("#dk04-" + obj.data_id + "-field8").text(obj.I2AcSys);
            //         //     $("#dk04-" + obj.data_id + "-field9").text(obj.Btemp1);
            //         //     $("#dk04-" + obj.data_id + "-field10").text(obj.Btemp2);
            //         //     $("#dk04-" + obj.data_id + "-field11").text(obj.Btemp3);
            //         //     $("#dk04-" + obj.data_id + "-field12").text(obj.Btemp4);
            //         //     $("#dk04-" + obj.data_id + "-field13").text(obj.Atemp);
            //         //     if ($('#' + obj.data_id + '-sps-rc-2 tbody').children().length == 0) {
            //         //         var columnsCount = $('#' + obj.data_id + '-sps-rc-2 thead>tr>th').length;
            //         //         var trObj = $('<tr></tr>');
            //         //         for (var j = 0; j < columnsCount; j++) {
            //         //             trObj.append('<td><span class="label label-success"></span></td>');
            //         //         }
            //         //         var columnsCount3 = $('#' + obj.data_id + '-sps-rc-3 thead>tr>th').length;
            //         //         var trObj3 = $('<tr></tr>');
            //         //         for (var j = 0; j < columnsCount3; j++) {
            //         //             trObj3.append('<td><span class="label label-success"></span></td>');
            //         //         }
            //         //         for (var j = 0; j < obj.number; j++) {
            //         //             var tTrObj = trObj.clone();
            //         //             tTrObj.find("td:eq(0)").text('整流模块' + (j + 1));
            //         //             $('#' + obj.data_id + '-sps-rc-2 tbody').append(tTrObj);
            //         //             var tTrObj3 = trObj3.clone();
            //         //             tTrObj3.find("td:eq(0)").text('整流模块' + (j + 1));
            //         //             $('#' + obj.data_id + '-sps-rc-3 tbody').append(tTrObj3);
            //         //         }
            //         //     }
            //         //     for (var j = 0; j < obj.number; j++) {
            //         //         var pTr = $('#' + obj.data_id + '-sps-rc-2 tbody>tr').eq(j);
            //         //         pTr.find("td:eq(1)").text(obj.Iout[j]);
            //         //         pTr.find("td:eq(2)").text(obj.channelParam[j].FloatV);
            //         //         pTr.find("td:eq(3)").text(obj.channelParam[j].EQV);
            //         //         pTr.find("td:eq(4)").text(obj.channelParam[j].Vhi);
            //         //         pTr.find("td:eq(5)").text(obj.channelParam[j].V1o);
            //         //         pTr.find("td:eq(6)").text(obj.channelParam[j].HVSD);
            //         //         pTr.find("td:eq(7)").text(obj.channelParam[j].I1im);
            //         //         pTr.find("td:eq(8)").text(obj.channelParam[j].AdjV);
            //         //         pTr.find("td:eq(9)").text(obj.channelParam[j].SecEnable);
            //         //
            //         //         pTr = $('#' + obj.data_id + '-sps-rc-3 tbody>tr').eq(j);
            //         //         for (var z = 0; z < obj.channel[j].length; z++) {
            //         //             pTr.find("td:eq(" + (z + 1) + ")>span").text(obj.channel[j][z]);
            //         //             set_label_class(pTr.find("td:eq(" + (z + 1) + ")>span"), obj.channel[j][z]);
            //         //         }
            //         //     }
            //         // }
            //         //
            //         // else if (model == "dk09") {
            //         //     $("#dk09-" + obj.data_id + "-field0").text(obj.ACChannelNum);
            //         //     $("#dk09-" + obj.data_id + "-field1").text(obj.MainSupplyAC_a);
            //         //     $("#dk09-" + obj.data_id + "-field2").text(obj.MainSupplyAC_b);
            //         //     $("#dk09-" + obj.data_id + "-field3").text(obj.MainSupplyAC_c);
            //         //     $("#dk09-" + obj.data_id + "-field4").text(obj.MainSupplyACFreq);
            //         //     $("#dk09-" + obj.data_id + "-field5").text(obj.ThreeACInput_a);
            //         //     $("#dk09-" + obj.data_id + "-field6").text(obj.ThreeACInput_b);
            //         //     $("#dk09-" + obj.data_id + "-field7").text(obj.ThreeACInput_c);
            //         //     $("#dk09-" + obj.data_id + "-field8").text(obj.BackUpBatteryVoltage_a);
            //         //     $("#dk09-" + obj.data_id + "-field9").text(obj.BackUpBatteryVoltage_b);
            //         //     $("#dk09-" + obj.data_id + "-field10").text(obj.BackUpBatteryVoltage_c);
            //         //     $("#dk09-" + obj.data_id + "-field11").text(obj.BackUpBatteryVoltage_Free);
            //         //     $("#dk09-" + obj.data_id + "-field12").text(obj.RectificationNum);
            //         //     //$("#dk09-" + obj.data_id + "-field13").text(obj.ModuleState);
            //         //     // $("#dk09-" + obj.data_id + "-field14").text(obj.ModuleOutputVoltage);
            //         //     // $("#dk09-" + obj.data_id + "-field15").text(obj.ModuleOutputCurrent);
            //         //     // $("#dk09-" + obj.data_id + "-field16").text(obj.ModuleTempature);
            //         //     $("#dk09-" + obj.data_id + "-field13").text(obj.BatteryNum);
            //         //     $("#dk09-" + obj.data_id + "-field14").text(obj.Battery_1_Voltage);
            //         //     $("#dk09-" + obj.data_id + "-field15").text(obj.Battery_1_Current);
            //         //     $("#dk09-" + obj.data_id + "-field16").text(obj.Battery_1_Capacity);
            //         //     $("#dk09-" + obj.data_id + "-field17").text(obj.Battery_1_temperature);
            //         //     $("#dk09-" + obj.data_id + "-field18").text(obj.System_voltage);
            //         //     $("#dk09-" + obj.data_id + "-field19").text(obj.Environment_tamperature);
            //         //     $("#dk09-" + obj.data_id + "-field20").text(obj.PayLoad);
            //         //     $("#dk09-" + obj.data_id + "-field21").text(obj.Battery_2_Voltage);
            //         //     $("#dk09-" + obj.data_id + "-field22").text(obj.Battery_2_Current);
            //         //     $("#dk09-" + obj.data_id + "-field23").text(obj.Battery_2_Capacity);
            //         //     $("#dk09-" + obj.data_id + "-field24").text(obj.battery_2_temperature);
            //         //     $("#dk09-" + obj.data_id + "-field25").text(obj._status);
            //         //     $("#dk09-" + obj.data_id + "-field26").text(obj.SeriousAlarm);
            //         //     $("#dk09-" + obj.data_id + "-field27").text(obj.Generalalarm);
            //         //     $("#dk09-" + obj.data_id + "-field28").text(obj.update_time);
            //         //
            //         //     $table = $('#' + obj.data_id + '-sps-rc-2');
            //         //     $.each(obj.moduleInfo, function (index, value) {
            //         //         //生成一行 代表一个通道
            //         //         var trObj = $('<tr></tr>');
            //         //         trObj.append('<td>' + (index + 1) + '</td>');
            //         //         $.each(value, function (index1, value1) {
            //         //             //通道数据
            //         //             trObj.append('<td>' + value1 + '</td>');
            //         //         });
            //         //         //将对应通道插入表格
            //         //         $table.append(trObj);
            //         //     });
            //         //
            //         //
            //         // }
            //         //
            //         // else if (model == "cuc21vb") {
            //         //     $("#cuc21vb-" + obj.data_id + "-field0").text(obj.out_v);
            //         //     $("#cuc21vb-" + obj.data_id + "-field1").text(obj.channel_count);
            //         //     $("#cuc21vb-" + obj.data_id + "-field2").text(obj.update_time);
            //         //     //显示所有通道
            //         //     if (obj.channel_count > 0) {
            //         //         $table = $('#' + obj.data_id + '-sps-rc-2');
            //         //         $.each(obj.channel, function (index, value) {
            //         //             //生成一行 代表一个通道
            //         //             var trObj = $('<tr></tr>');
            //         //             trObj.append('<td>' + index + '</td>');
            //         //             $.each(value, function (index1, value1) {
            //         //                 //通道数据
            //         //                 trObj.append('<td>' + value1 + '</td>');
            //         //             });
            //         //             //将对应通道插入表格
            //         //             $table.append(trObj);
            //         //         });
            //         //     }
            //         //
            //         // }
            //     }
            // }
        });
    }


    refreshData();
    setInterval(refreshData, 10000);
});
