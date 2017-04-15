$(document).ready(function(){
	var dataIdArr1 = new Array();
	var dataIdArr2 = new Array();
	var dataIdArrPmac600a = new Array();
	var dataIdArrPmac600b = new Array();
	$(".imem_12").each(function(){
		dataIdArr1.push($(this).attr('data_id'));
	});
	
	$(".302a_power").each(function(){
		dataIdArr2.push($(this).attr('data_id'));
	});
	
	$(".pmac600a").each(function(){
		dataIdArrPmac600a.push($(this).attr("id"));
	});
	
	$(".pmac600b").each(function(){
		dataIdArrPmac600b.push($(this).attr("id"));
	});
	
	function refreshData()
	{	
		$.get('/portal/refreshData', {
			dataIdArr1 : dataIdArr1.toString(),
			dataIdArr2 : dataIdArr2.toString(),
			dataIdArrPmac600a : dataIdArrPmac600a.toString(),
			dataIdArrPmac600b : dataIdArrPmac600b.toString(),
			model : "powermeter",
			access_token : typeof(accessToken) == "undefined" ? "":accessToken
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
					//有功功率
					$('#power302a-'+ obj.data_id + '-1 td:eq(2)>span').html(obj.pa);
					$('#power302a-'+ obj.data_id + '-1 td:eq(3)>span').html(obj.pb);
					$('#power302a-'+ obj.data_id + '-1 td:eq(4)>span').html(obj.pc);
					$('#power302a-'+ obj.data_id + '-1 td:eq(5)>span').html(obj.pt);
					//无功功率
					/*$('#power302a-'+ obj.data_id + '-2 td:eq(2)>span').html(obj.qa);
					$('#power302a-'+ obj.data_id + '-2 td:eq(3)>span').html(obj.qb);
					$('#power302a-'+ obj.data_id + '-2 td:eq(4)>span').html(obj.qc);
					$('#power302a-'+ obj.data_id + '-2 td:eq(5)>span').html(obj.qt);
					//视在功率
					$('#power302a-'+ obj.data_id + '-3 td:eq(2)>span').html(obj.sa);
					$('#power302a-'+ obj.data_id + '-3 td:eq(3)>span').html(obj.sb);
					$('#power302a-'+ obj.data_id + '-3 td:eq(4)>span').html(obj.sc);
					$('#power302a-'+ obj.data_id + '-3 td:eq(5)>span').html(obj.st);*/
					//电压有效值
					$('#power302a-'+ obj.data_id + '-2 td:eq(2)>span').html(obj.uaRms);
					$('#power302a-'+ obj.data_id + '-2 td:eq(3)>span').html(obj.ubRms);
					$('#power302a-'+ obj.data_id + '-2 td:eq(4)>span').html(obj.ucRms);
					//$('#power302a-'+ obj.data_id + '-2 td:eq(5)>span').html(obj.utRms);
					//电流有效值
					$('#power302a-'+ obj.data_id + '-3 td:eq(2)>span').html(obj.iaRms);
					$('#power302a-'+ obj.data_id + '-3 td:eq(3)>span').html(obj.ibRms);
					$('#power302a-'+ obj.data_id + '-3 td:eq(4)>span').html(obj.icRms);
					//$('#power302a-'+ obj.data_id + '-3 td:eq(5)>span').html(obj.itRms);
					//功率因数
					$('#power302a-'+ obj.data_id + '-4 td:eq(2)>span').html(obj.pfa);
					$('#power302a-'+ obj.data_id + '-4 td:eq(3)>span').html(obj.pfb);
					$('#power302a-'+ obj.data_id + '-4 td:eq(4)>span').html(obj.pfc);
					//$('#power302a-'+ obj.data_id + '-4 td:eq(5)>span').html(obj.pft);
					//频率
					$('#power302a-'+ obj.data_id + '-5 td:eq(5)>span').html(obj.freq);
					//有功电能
					$('#power302a-'+ obj.data_id + '-6 td:eq(2)>span').html(obj.epa);
					$('#power302a-'+ obj.data_id + '-6 td:eq(3)>span').html(obj.epb);
					$('#power302a-'+ obj.data_id + '-6 td:eq(4)>span').html(obj.epc);
					$('#power302a-'+ obj.data_id + '-6 td:eq(5)>span').html(obj.ept);
				}
			}
			for(var i = 0 ; i < dataIdArrPmac600a.length ; i++)
			{
				var obj = ret.pmac600aValue[i];
				$('#'+ obj.data_id + 'tr:eq(0)>td:eq(2)>span').html(obj.current);
				$('#'+ obj.data_id + 'tr:eq(1)>td:eq(2)>span').html(obj.voltage);
				$('#'+ obj.data_id + 'tr:eq(2)>td:eq(2)>span').html(obj.ap);
				$('#'+ obj.data_id + 'tr:eq(3)>td:eq(2)>span').html(obj.rp);
				$('#'+ obj.data_id + 'tr:eq(4)>td:eq(2)>span').html(obj.pf);
				$('#'+ obj.data_id + 'tr:eq(5)>td:eq(2)>span').html(obj.freq);
				$('#'+ obj.data_id + 'tr:eq(6)>td:eq(2)>span').html(obj.sc);
				$('#'+ obj.data_id + 'tr:eq(7)>td:eq(2)>span').html(obj.rc);
				$('#'+ obj.data_id + 'tr:eq(8)>td:eq(2)>span').html(obj.ep);
				$('#'+ obj.data_id + 'tr:eq(9)>td:eq(2)>span').html(obj.eq);
			}
			for(var i = 0 ; i < dataIdArrPmac600b.length ; i++)
			{
				var obj = ret.pmac600bValue[i];
				$('#'+ obj.data_id + 'tr:eq(0)>td:eq(2)>span').html(obj.ua);
				$('#'+ obj.data_id + 'tr:eq(1)>td:eq(2)>span').html(obj.ub);
				$('#'+ obj.data_id + 'tr:eq(2)>td:eq(2)>span').html(obj.uc);
				$('#'+ obj.data_id + 'tr:eq(3)>td:eq(2)>span').html(obj.ia);
				$('#'+ obj.data_id + 'tr:eq(4)>td:eq(2)>span').html(obj.ib);
				$('#'+ obj.data_id + 'tr:eq(5)>td:eq(2)>span').html(obj.ic);
				$('#'+ obj.data_id + 'tr:eq(6)>td:eq(2)>span').html(obj.psum);
				$('#'+ obj.data_id + 'tr:eq(7)>td:eq(2)>span').html(obj.qsum);
				$('#'+ obj.data_id + 'tr:eq(8)>td:eq(2)>span').html(obj.pf_sum);
				$('#'+ obj.data_id + 'tr:eq(9)>td:eq(2)>span').html(obj.pa);
				$('#'+ obj.data_id + 'tr:eq(10)>td:eq(2)>span').html(obj.pb);
				$('#'+ obj.data_id + 'tr:eq(11)>td:eq(2)>span').html(obj.pc);
				$('#'+ obj.data_id + 'tr:eq(12)>td:eq(2)>span').html(obj.qa);
				$('#'+ obj.data_id + 'tr:eq(13)>td:eq(2)>span').html(obj.qb);
				$('#'+ obj.data_id + 'tr:eq(14)>td:eq(2)>span').html(obj.qc);
				$('#'+ obj.data_id + 'tr:eq(15)>td:eq(2)>span').html(obj.cosfi_a);
				$('#'+ obj.data_id + 'tr:eq(16)>td:eq(2)>span').html(obj.cosfi_b);
				$('#'+ obj.data_id + 'tr:eq(17)>td:eq(2)>span').html(obj.cosfi_c);
				$('#'+ obj.data_id + 'tr:eq(18)>td:eq(2)>span').html(obj.freq);
				$('#'+ obj.data_id + 'tr:eq(19)>td:eq(2)>span').html(obj.ep_sum);
				$('#'+ obj.data_id + 'tr:eq(20)>td:eq(2)>span').html(obj.eq_sum);
				$('#'+ obj.data_id + 'tr:eq(21)>td:eq(2)>span').html(obj.ep_imp);
				$('#'+ obj.data_id + 'tr:eq(22)>td:eq(2)>span').html(obj.ep_exp);
				$('#'+ obj.data_id + 'tr:eq(23)>td:eq(2)>span').html(obj.eq_imp);
				$('#'+ obj.data_id + 'tr:eq(24)>td:eq(2)>span').html(obj.eq_exp);
			}
		});
	}
	refreshData();
	setInterval(refreshData, 20000);
});
