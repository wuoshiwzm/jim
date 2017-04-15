$(document).ready(function(){
	var dataIdArr2 = new Array();
	var dataIdArr3 = new Array();
	var dataIdArr4 = new Array();
	$('.rt-data').each(function() {
		if ($(this).attr('data_type') == 'battery_24' && dataIdArr3.indexOf($(this).attr('data_id')) == -1) {
			dataIdArr3.push($(this).attr('data_id'));
		}else if ($(this).attr('data_type') == 'battery_32' && dataIdArr4.indexOf($(this).attr('data_id')) == -1) {
			dataIdArr4.push($(this).attr('data_id'));
		}else if ($(this).attr("data_type") == "battery24_voltage" && dataIdArr2.indexOf($(this).attr("data_id")) == -1){
			dataIdArr2.push($(this).attr("data_id"));
		}
	});

	var params = {};
	params['dataIdArr2'] = dataIdArr2.toString();
	params['dataIdArr3'] = dataIdArr3.toString();
	params['dataIdArr4'] = dataIdArr4.toString();
	params['model'] =  model;
	params['access_token'] =  typeof(accessToken) == "undefined" ? "":accessToken; 
	function refreshData() {
		$.get('/portal/refreshData', params, function(ret) {
			var length = ret.batList.length;
			for(var i = 0 ; i < length ; i++)
			{
				var obj = ret.batList[i];
				if(!obj.status)
				{
					$("#" + obj.data_id + "-status").show();
					$("#" + obj.data_id + "-status>span").text(obj.last_update);
				}else{
					$("#" + obj.data_id + "-status").hide();
				}
				var devContainer = $('.rt-data[data_id='+ obj.data_id + ']');
				var type = devContainer.attr("type");
				devContainer.find('.group_v').html(obj.group_v +'V');
				devContainer.find('.update_datetime').html(obj.update_datetime);
				if(obj.group_i != undefined)
				{	
					devContainer.find('.group_i').html(obj.group_i +'A');
					devContainer.find('.bat_temp').html(obj.temperature +'°C');
					if( type == "44" || type == "44i"){
						for(var z=0; z<4; z++){
							$('#bat_voltage_'+ obj.data_id).find('tbody td.bat_num'+ z + '>span:eq(0)').html(obj.voltage[z] + 'V');	
						}
						for(var z=6; z<10; z++){
							$('#bat_voltage_'+ obj.data_id).find('tbody td.bat_num'+ (14+z) + '>span:eq(0)').html(obj.voltage[z] + 'V');
						}
						//44是第二组13,14,15,16, 19,20,21,22
						//44i是第二组12,13,14,15, 18,19,20,21
						if(type == "44"){
							for(var z=0; z<4; z++){
								$('#bat_voltage2_'+ obj.data_id).find('tbody td.bat_num'+ z + '>span:eq(0)').html(obj.voltage[z+13] + 'V');	
							}
							for(var z=19; z<23; z++){
								$('#bat_voltage2_'+ obj.data_id).find('tbody td.bat_num'+ (1+z) + '>span:eq(0)').html(obj.voltage[z] + 'V');
							}
						}else{
							for(var z=0; z<4; z++){
								$('#bat_voltage2_'+ obj.data_id).find('tbody td.bat_num'+ z + '>span:eq(0)').html(obj.voltage[z+12] + 'V');	
							}
							for(var z=18; z<22; z++){
								$('#bat_voltage2_'+ obj.data_id).find('tbody td.bat_num'+ (2+z) + '>span:eq(0)').html(obj.voltage[z] + 'V');
							}
						}							
					}else if( type == "11"){
						for(var z=0; z<11; z++){
							$('#bat_voltage_'+ obj.data_id).find('tbody td.bat_num'+ z + '>span:eq(0)').html(obj.voltage[z] + 'V');	
							$('#bat_voltage2_'+ obj.data_id).find('tbody td.bat_num'+ z + '>span:eq(0)').html(obj.voltage[13 + z] + 'V');
						}
					}else{
						for(var z=0; z<obj.voltage.length; z++){
							$('#bat_voltage_'+ obj.data_id).find('tbody td.bat_num'+ z + '>span:eq(0)').html(obj.voltage[z] + 'V');
						}
					}
					$('#bat_pi-' + obj.data_id +' tbody').empty();
					if(obj.pi == null || obj.pi.length == 0){
						$('#bat_pi-' + obj.data_id +' tbody').html('<tr><td colspan="3">无</td></tr>');
					}else{
						for(var j = 0 ; j < obj.pi.length ; j++){
							var piObj = obj.pi[j];
							$('#bat_pi-' + obj.data_id +' tbody').append('<tr><td>'+ (j+1) +'</td><td>'+ piObj.label +'</td><td>'+ piObj.value +'V</td></tr>');
						}
					}
				}
				if(obj.dynamic_config != false)
				{
					$('#tb-'+ obj.data_id +'-dc>tbody').empty();
					var dcList = JSON.parse(obj.dynamic_config);
					if(dcList == null){
						$('#tb-'+ obj.data_id +'-dc').hide();
					}else{
						if(dcList.length == 0){
							$('#tb-'+ obj.data_id +'-dc').hide();
						}else
							$('#tb-'+ obj.data_id +'-dc').show();
						for (var index = 0 ; index < dcList.length ; index++) {
							var dcObj = dcList[index];
							var levelStr = '正常';
							var cls = '';
							if(typeof(dcObj.level) != 'undefined'){
								cls = 'text-error lead';

								switch (dcObj.level) {
								case 1:
									levelStr = '一级告警';
									break;
								case 2:
									levelStr = '二级告警';
									break;
								case 3:
									levelStr = '三级告警';
								break;
								case 4:
									levelStr = '四级告警';
									break;
								default:
									cls = '';
									break;
								}
							}
							var trObj = $('<tr><td>'+ (index + 1) +'</td><td>'+ dcObj.name +'</td><td>'+ (typeof(dcObj.value) == 'undefined' ? '':dcObj.value)
									+'</td><td><span class="'+ cls +'">' + levelStr + '</span></td></tr>');
							$('#tb-'+ obj.data_id +'-dc>tbody').append(trObj);
						}
					}
				}else{
					$('#tb-'+ obj.data_id +'-dc').hide();
				}				
			}	
		});
	}
	refreshData();
	setInterval(refreshData, 20000);
})
