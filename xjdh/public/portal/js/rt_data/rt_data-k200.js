$(document).ready(function() {
	var dataIdArr = new Array();//fresh-air
	$('.rt-data').each(function() {
		dataIdArr.push($(this).attr('data_id'));
	});
	function refreshData() {

		$.get('/portal/refreshData', {
			dataIdArr : dataIdArr,
			model: 'k200',
			access_token : typeof(accessToken) == "undefined" ? "":accessToken,
		}, function(ret) {
            // for (var i = 0; i < ret.dataList.length; i++){
                // $.each(dataList, function (index, value)
                // {

                // if(!ret.dataList.is_empty){
// ret.dataList = ret.dataList[i];
                //reg=40004,告警信息

            $('#k200-' + ret.dataList.data_id + '-set_switch').html(ret.dataList.set_switch);
            $('#k200-' + ret.dataList.data_id + '-set_temp').html(ret.dataList.set_temp);
            $('#k200-' + ret.dataList.data_id + '-set_humid').html(ret.dataList.set_humid);



			$('#k200-' + ret.dataList.data_id + '-1').html(ret.dataList.humidify );
            $('#k200-' + ret.dataList.data_id + '-2').html(ret.dataList.dehumidfy );
            $('#k200-' + ret.dataList.data_id + '-3').html(ret.dataList.heating );
            $('#k200-' + ret.dataList.data_id + '-4').html(ret.dataList.cooling);
            // $('#k200-'+ ret.dataList.data_id + '-4').html(ret.dataList.cooling == "1" ? "开机" : "关机");
            $('#k200-' + ret.dataList.data_id + '-5').html(ret.dataList.fan);


            //reg=40007,告警信息
            $('#k200-' + ret.dataList.data_id + '-6').html(ret.dataList.low_pressure_compressor );
            $('#k200-' + ret.dataList.data_id + '-7').html(ret.dataList.high_pressure_compressor );
            $('#k200-' + ret.dataList.data_id + '-8').html(ret.dataList.air_flow_loss);
            $('#k200-' + ret.dataList.data_id + '-9').html(ret.dataList.fan_overload );
            $('#k200-' + ret.dataList.data_id + '-10').html(ret.dataList.heater_overload);
            $('#k200-' + ret.dataList.data_id + '-11').html(ret.dataList.airstrainer);
            $('#k200-' + ret.dataList.data_id + '-12').html(ret.dataList.high_temp_alert);
            $('#k200-' + ret.dataList.data_id + '-13').html(ret.dataList.low_temp_alert);
            $('#k200-' + ret.dataList.data_id + '-14').html(ret.dataList.high_humid_alert);
            $('#k200-' + ret.dataList.data_id + '-15').html(ret.dataList.low_humid_alert);
            $('#k200-' + ret.dataList.data_id + '-16').html(ret.dataList.air_temp_probe_alert);
            $('#k200-' + ret.dataList.data_id + '-17').html(ret.dataList.wind_temp_probe_alert);
            $('#k200-' + ret.dataList.data_id + '-18').html(ret.dataList.air_humid_probe_alert);
            $('#k200-' + ret.dataList.data_id + '-19').html(ret.dataList.out_temp_probe_alert);
            $('#k200-' + ret.dataList.data_id + '-20').html(ret.dataList.wind_temp_alert);


            //reg=40008,告警信息
            $('#k200-' + ret.dataList.data_id + '-21').html(ret.dataList.high_hunidifier_current);
            $('#k200-' + ret.dataList.data_id + '-22').html(ret.dataList.humidifier_water_shortage);
            $('#k200-' + ret.dataList.data_id + '-23').html(ret.dataList.no_humid_current);
            $('#k200-' + ret.dataList.data_id + '-24').html(ret.dataList.overflow_alert);
            $('#k200-' + ret.dataList.data_id + '-25').html(ret.dataList.user_alert);
            $('#k200-' + ret.dataList.data_id + '-26').html(ret.dataList.smoke_alert);
            $('#k200-' + ret.dataList.data_id + '-27').html(ret.dataList.high_pressure_compressor2);
            $('#k200-' + ret.dataList.data_id + '-28').html(ret.dataList.low_pressure_compressor2);
            $('#k200-' + ret.dataList.data_id + '-29').html(ret.dataList.water_switch_alert);

        // }
				//
				// 	switch(ret.dataList.unit_status)
				// 	{
				// 		case "0":
				// 			$('#k200-'+ ret.dataList.data_id + '-17').html("关机");
				// 			break;
				// 		case "1":
				// 			$('#k200-'+ ret.dataList.data_id + '-17').html("运行");
				// 			break;
				// 		case "2":
				// 			$('#k200-'+ ret.dataList.data_id + '-17').html("待机");
				// 			break;
				// 		case "3":
				// 			$('#k200-'+ ret.dataList.data_id + '-17').html("锁定");
				// 			break;
				// 	}
				// 	switch(ret.dataList.unit_prop)
				// 	{
				// 		case "0":
				// 			$('#k200-'+ ret.dataList.data_id + '-18').html("主机");
				// 			break;
				// 		case "0":
				// 			$('#k200-'+ ret.dataList.data_id + '-18').html("背机");
				// 			break;
				// 		case "0":
				// 			$('#k200-'+ ret.dataList.data_id + '-18').html("从机");
				// 			break;
				// 	}
				// 	$('#k200-'+ ret.dataList.data_id + '-19').html(ret.dataList.high_press_lock == "1"?"已锁定":"未锁定");
				// 	$('#k200-'+ ret.dataList.data_id + '-20').html(ret.dataList.low_press_lock == "1"?"已锁定":"未锁定");
				// 	$('#k200-'+ ret.dataList.data_id + '-21').html(ret.dataList.exhaust_lock == "1"?"已锁定":"未锁定");
				// 	$('#k200-'+ ret.dataList.data_id + '-22').html(ret.dataList.update_datetime);
				//
				// 	$('#k200-'+ ret.dataList.data_id + '-23').html();//alert
				// 	$('#k200-'+ ret.dataList.data_id + '-24').html(ret.dataList.setting_temperature);
				// 	$('#k200-'+ ret.dataList.data_id + '-25').html(ret.dataList.setting_humidity + '%');
				//
				// 	$('#k200-'+ ret.dataList.data_id + '-26').html(ret.dataList.high_temperature_alert + '°C');
				// 	$('#k200-'+ ret.dataList.data_id + '-27').html(ret.dataList.low_temperature_alert + '°C');
				// 	$('#k200-'+ ret.dataList.data_id + '-28').html(ret.dataList.high_humidity_alert + '%');
				// 	$('#k200-'+ ret.dataList.data_id + '-29').html(ret.dataList.low_humidity_alert + '%');
				// 	$('#k200-'+ ret.dataList.data_id + '-30').html(ret.dataList.update_datetime);
				//
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(0)>td:eq(1)').text(ret.dataList.high_press_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(0)>td:eq(3)').text(ret.dataList.low_press_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(0)>td:eq(5)').text(ret.dataList.high_temp_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(0)>td:eq(7)').text(ret.dataList.low_temp_alarm == "1" ? "告警" : "正常");
				//
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(1)>td:eq(1)').text(ret.dataList.high_humid_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(1)>td:eq(3)').text(ret.dataList.low_humid_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(1)>td:eq(5)').text(ret.dataList.power_failer_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(1)>td:eq(7)').text(ret.dataList.short_cycle_alarm == "1" ? "告警" : "正常");
				//
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(2)>td:eq(1)').text(ret.dataList.custom_alarm1 == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(2)>td:eq(3)').text(ret.dataList.custom_alarm2 == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(2)>td:eq(5)').text(ret.dataList.main_fan_mainten_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(2)>td:eq(7)').text(ret.dataList.humid_mainten_alarm == "1" ? "告警" : "正常");
				//
				//
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(3)>td:eq(1)').text(ret.dataList.filter_mainten_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(3)>td:eq(3)').text(ret.dataList.com_failer_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(3)>td:eq(5)').text(ret.dataList.coil_freeze_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(3)>td:eq(7)').text(ret.dataList.humid_fault_alarm == "1" ? "告警" : "正常");
				//
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(4)>td:eq(1)').text(ret.dataList.sensor_miss_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(4)>td:eq(3)').text(ret.dataList.gas_temp_fault_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(4)>td:eq(5)').text(ret.dataList.power_miss_fault_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(4)>td:eq(7)').text(ret.dataList.power_undervol_alarm == "1" ? "告警" : "正常");
				//
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(5)>td:eq(1)').text(ret.dataList.power_phase_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(5)>td:eq(3)').text(ret.dataList.power_freq_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(5)>td:eq(5)').text(ret.dataList.floor_overflow_alarm == "1" ? "告警" : "正常");
				// 	$('#table-' + ret.dataList.data_id + '-alarm tbody tr:eq(5)>td:eq(7)').text(ret.dataList.save_card_failure == "1" ? "告警" : "正常");
				//
				// 	}else{
				// }
			// }
		});
	}
	refreshData();
	setInterval(refreshData, 20000);
});
