if(devName == "蓄电池组" ||devName == "UPS蓄电池"){
	$(document).ready(function(){
		var dataIdArr2 = new Array();
		var dataIdArr3 = new Array();
		var dataIdArr4 = new Array();
		$('.rt-data').each(function() {
			if ($(this).attr('data_type') == 'bat24' && dataIdArr3.indexOf($(this).attr('data_id')) == -1) {
				dataIdArr3.push($(this).attr('data_id'));
			}else if ($(this).attr('data_type') == 'bat32' && dataIdArr4.indexOf($(this).attr('data_id')) == -1) {
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
					$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 0 +') td:eq(2)>span:eq(0)').html(obj.group_v +'V');
					if(obj.group_i != undefined)
					{	
						for(var j = 0 ; j < obj.voltage.length ; j++)
						{  
						   var n = j + 1;
					       $('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ n +') td:eq(2)>span:eq(0)').html(obj.voltage[j] + 'V');
						}
					}
				}	
			});
		}
		refreshData();
		setInterval(refreshData, 20000);
	})
}else if(devName == "智能电表"){
	$(document).ready(function(){
		var dataIdArr1 = new Array();
		var dataIdArr2 = new Array();
		$(".imem_12").each(function(){
			dataIdArr1.push($(this).attr('data_id'));
		});
		$(".302a_power").each(function(){
			dataIdArr2.push($(this).attr('data_id'));
		});
		function refreshData()
		{	
			$.get('/portal/refreshData', {
				dataIdArr1 : dataIdArr1.toString(),
				dataIdArr2 : dataIdArr2.toString(),
				model : "powermeter"
			}, function(ret) {
				if(dataIdArr1.toString())
				{
					var length = ret.imem12Value.length;
					for(var i = 0 ; i < length ; i++)
					{
						var obj = ret.imem12Value[i];
						$('#imem12_p_'+ obj.data_id + ' td:eq(3)').html(obj.update_datetime);
						$('#imem12_p_'+ obj.data_id+' td:eq(1)>span:eq(0)').html(obj.p1);
						$('#imem12_p_'+ obj.data_id + ' td:eq(2)').html(obj.w1);
					}				
				}
				if(dataIdArr2.toString())
				{
					var length = ret.power302aValue.length;
					for(var i = 0 ; i < length ; i++)
					{
						var obj = ret.power302aValue[i];		                
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 0 +') td:eq(2)>span:eq(0)').html();                  //线电压Uab
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 1 +') td:eq(2)>span:eq(0)').html();                  //线电压Ubc
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 2 +') td:eq(2)>span:eq(0)').html();                  //线电压Uca
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 3 +') td:eq(2)>span:eq(0)').html(obj.uaRms +'V');    //A相电压Ua
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 4 +') td:eq(2)>span:eq(0)').html(obj.ubRms +'V');    //B相电压Ub
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 5 +') td:eq(2)>span:eq(0)').html(obj.ucRms +'V');    //C相电压Uc
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 6 +') td:eq(2)>span:eq(0)').html(obj.iaRms +'A');    //A相电流Ia
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 7 +') td:eq(2)>span:eq(0)').html(obj.ibRms +'A');    //B相电流Ib
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 8 +') td:eq(2)>span:eq(0)').html(obj.icRms +'A');    //C相电流Ic
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 9 +') td:eq(2)>span:eq(0)').html();                  //零序电流Io
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 10 +') td:eq(2)>span:eq(0)').html(obj.pa +'KW');     //A相有功功率Pa
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 11 +') td:eq(2)>span:eq(0)').html(obj.pb +'KW');     //B相有功功率Pb
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 12 +') td:eq(2)>span:eq(0)').html(obj.pc +'KW');     //C相有功功率Pc
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 13 +') td:eq(2)>span:eq(0)').html(obj.qa +'Kvar');   //A相无功功率Qa
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 14 +') td:eq(2)>span:eq(0)').html(obj.qb +'Kvar');   //B相无功功率Qb
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 15 +') td:eq(2)>span:eq(0)').html(obj.qc +'Kvar');   //C相无功功率Qc
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 16 +') td:eq(2)>span:eq(0)').html(obj.pft);          //功率因数PF
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 17 +') td:eq(2)>span:eq(0)').html(obj.freq +'Hz');   //频率F
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 18 +') td:eq(2)>span:eq(0)').html(obj.ept +'Kwh');   //正向有功电能
						$('#standard_'+ obj.data_id).find(' tbody>tr:eq('+ 19 +') td:eq(2)>span:eq(0)').html(obj.eqt +'KvarH'); //正向无功电能						
					}		
				}
			});
		}
		refreshData();
		setInterval(refreshData, 20000);
	});		
}










