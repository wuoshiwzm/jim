$(document).ready(function() {	
	function enable_edit($elem, $cssClass) {
		var tVal = $elem.text();
		var vInput = $('<input type="text" class="' + $cssClass + '" />');
		vInput.val(tVal);
		$elem.data("old_data", tVal);
		$elem.empty();
		$elem.append(vInput);
	}
	
	function edit_click() {
		var pTr = $(this).parents("tr:eq(0)");
		var typeSel = $('<select style="width:auto;"><option value="">请选择</option><option value="lower">下限</option><option value="upper">上限</option><option value="value">阈值</option></select>');
		pTr.find("td:eq(2)").empty().append(typeSel);
		pTr.find("td:eq(1)").empty().append(typeSel);
		typeSel.val(pTr.data("t_type"));		
		enable_edit(pTr.find("td:eq(3)"), "span1");
		enable_edit(pTr.find("td:eq(9)"), "span1");
		
		var levelSel = $('<select style="width:auto;"><option value="">请选择</option><option value="1">一级告警</option><option value="2">二级告警</option><option value="3">三级告警</option><option value="4">四级告警</option></select>');
		pTr.find("td:eq(4)").empty().append(levelSel);
		levelSel.val(pTr.data("t_level"));
		var selSignal = $('<select style="width:auto;"></select>');
		pTr.find("td:eq(5)").empty().append(selSignal);
		for(i=0;i<signalNameId.length;i++){	
			selSignal.append("<option value="+signalNameId[i].key+">"+signalNameId[i].name+"</option>");
		}
		selSignal.val(pTr.data("t_signal_id"));
		selSignal.change(function(){
			selSignal.parent().next().find("input").val($(this).val());
		})	
		var txtSignalId = $('<input type="text" disabled="true" class="span1"/>');
		pTr.find("td:eq(6)").empty().append(txtSignalId);
		txtSignalId.val(pTr.data("t_signal_id"));
			
		enable_edit(pTr.find("td:eq(7)"), "span3");	
		
		var blockCB = $('<input type="checkbox" />');
		pTr.find("td:eq(8)").empty().append(blockCB);
		blockCB.prop("checked", pTr.data("t_block"));
		
		$(this).hide();
		$(this).parent().find("button:eq(2),button:eq(3)").show();
	}
	
	function reverse_click() {
		var pTr = $(this).parents("tr:eq(0)");
		
		var t_type = pTr.data("t_type");
		var t_value = pTr.data("t_value");
		var t_level = pTr.data("t_level");
		var t_msg = pTr.data("t_msg");
		var t_signal_name = pTr.data('t_signal_name');
		var t_signal_id = pTr.data("t_signal_id");
		var t_block = pTr.data("t_block");
		var t_time = pTr.data("t_time");
		
		if(t_type == "lower")
		{
			pTr.find("td:eq(2)").empty().text("下限");
		}else if(t_type == "upper")
		{
			pTr.find("td:eq(2)").empty().text("上限");
		}else if(t_type == "value")
		{
			pTr.find("td:eq(2)").empty().text("阈值");
		}
		
		pTr.find("td:eq(3)").empty().text(t_value);
		var levelStr;
		switch(t_level)
		{
		case "1":
			levelStr = "一级告警";
			break;
		case "2":
			levelStr = "二级告警";
			break;
		case "3":
			levelStr = "三级告警";
			break;
		case "4":
			levelStr = "四级告警";
			break;
		}
		pTr.find("td:eq(4)").empty().text(levelStr);
		
		pTr.find("td:eq(5)").empty().text(t_signal_name);
		pTr.find("td:eq(6)").empty().text(t_signal_id);
		
		pTr.find("td:eq(7)").empty().text(t_msg);		
		pTr.find("td:eq(8)").empty().text(t_block ? "屏蔽" : "未屏蔽");
		pTr.find("td:eq(9)").empty().text(t_time);
		
		
		$(this).parent().find("button:eq(2),button:eq(3)").hide();
		$(this).parent().find("button:eq(1)").show();
	}
	
	function save_click(){
		var pTr = $(this).parents("tr:eq(0)");
		//阈值类型
		if(pTr.find("td:eq(2) select").val() == "")
		{
			alert("请选择阈值类型");
			return;
		}
		if(pTr.find('td:eq(3) input').val() == "")
		{
			alert("请填写阈值");
			return;
		}
		if(pTr.find("td:eq(4) select").val() == "")
		{
			alert("请选择告警级别");
			return;
		}
		if(pTr.find("td:eq(5) select").val() == "")
		{
			alert("请填写信号名称");
			return;
		}
		if(pTr.find("td:eq(6) input").val() == "")
		{
			alert("请选择信号ID");
			return;
		}
		if(pTr.find("td:eq(7) input").val() == "")
		{
			alert("请填写告警文本");
			return;
		}
		
		var t_type = pTr.find("td:eq(2) select").val();
		var t_level = pTr.find("td:eq(4) select").val();
		var hasDup = false;
		$("#tbRule>tr").each(function(){
			if($(this).is(pTr))
				return true;
			if($(this).data('t_type') == t_type &&
					$(this).data('t_level') == t_level)
			{
				hasDup = true;
				return false;
			}
		});
		if(hasDup)
		{
			alert("已经存在相同阈值和告警级别的规则，无法添加");
			return false;
		}
		var t_value = pTr.find('td:eq(3) input').val();
		var t_signal_name = pTr.find("td:eq(5) select>option:selected").text();
		var t_signal_id = pTr.find("td:eq(6) input").val();
		var t_msg = pTr.find("td:eq(7) input").val();
		var t_block = pTr.find("td:eq(8) input").prop("checked");
		var t_time = pTr.find('td:eq(9) input').val();
		
		pTr.data('t_type', t_type);
		pTr.data('t_value', t_value);
		pTr.data('t_level', t_level);
		pTr.data('t_signal_name', t_signal_name);
		pTr.data('t_signal_id', t_signal_id);
		pTr.data('t_msg', t_msg);
		pTr.data('t_block', t_block);
		pTr.data('t_time', t_time);
		
		if(t_type == "lower")
		{
			pTr.find("td:eq(2)").empty().text("下限");
		}else if(t_type == "upper")
		{
			pTr.find("td:eq(2)").empty().text("上限");
		}else if(t_type == "value")
		{
			pTr.find("td:eq(2)").empty().text("阈值");
		}
		pTr.find("td:eq(3)").empty().text(t_value);
		var levelStr;
		switch(t_level)
		{
		case "1":
			levelStr = "一级告警";
			break;
		case "2":
			levelStr = "二级告警";
			break;
		case "3":
			levelStr = "三级告警";
			break;
		case "4":
			levelStr = "四级告警";
			break;
		}
		pTr.find("td:eq(4)").empty().text(levelStr);
		pTr.find("td:eq(5)").empty().text(t_signal_name);
		
		pTr.find("td:eq(6)").empty().text(t_signal_id);
		pTr.find("td:eq(7)").empty().text(t_msg);
		pTr.find("td:eq(8)").empty().text(t_block ? "屏蔽" : "未屏蔽");
		pTr.find("td:eq(9)").empty().text(t_time);
		
		$(this).parent().find("button:eq(2),button:eq(3)").hide();		
		$(this).parent().find("button:eq(1)").show();
		
	}
	var signalNameId = null;
	
	function AddReferenceRule(pTr)
	{
		var trRule = $('<tr><td>' + ($("#tbRule>tr").length+1) + '</td><td></td><td></td>\
				 <td></td>\
				 <td></td>\
				 <td></td>\
				 <td></td>\
				 <td></td>\
				 <td></td><td></td><td><div class="btn-toolbar row-action">\
						  <div class="btn-group">\
								<button class="btn btn-danger btn_del" title="删除"><i class="icon-remove"></i></button>\
	                      </div>\
               </div></td></tr>');
		$("#tbRule").append(trRule);
		trRule.data('city_code', pTr.data('city_code'));
		trRule.data('county_code', pTr.data('county_code'));
		trRule.data('substation_id', pTr.data('substation_id'));
		trRule.data('reference', 1);
		trRule.data('t_type', pTr.data('type'));
		trRule.data('t_level', pTr.data('level'));
		trRule.find("td:eq(1)").text(pTr.find("td:eq(1)").text());
		trRule.find("td:eq(2)").text(pTr.find("td:eq(2)").text());
		trRule.find("td:eq(3)").text(pTr.find("td:eq(3)").text());
		trRule.find("td:eq(4)").text(pTr.find("td:eq(4)").text());
		trRule.find("td:eq(5)").text(pTr.find("td:eq(5)").text());
		trRule.find("td:eq(6)").text(pTr.find("td:eq(6)").text());
		trRule.find("td:eq(7)").text(pTr.find("td:eq(7)").text());
		trRule.find("td:eq(8)").text(pTr.find("td:eq(8)").text());
		trRule.find("td:eq(9)").text(pTr.find("td:eq(9)").text());
		
		trRule.find(".btn_del").click(function(){
			$(this).parents("tr:eq(0)").remove();
		});
	}
	
	$(".setThreshold").click(function(){
		//empty previous data
		$("#tbParentRule,#tbRule").empty();
		
		$("#thresholdDialog").modal({
			 keyboard: true,
			 show	: true,
			 
		});
		$("#thresholdDialog").data("data_id", $(this).attr("data_id"));
		$("#thresholdDialog").data("field", $(this).attr("field"));
		
		var model = $(this).attr("model");
		model += " " + $(this).attr("field");
		$.get('/portal/Get_SignalNameId', {model: model}, function(data){
				signalNameId = data;
		});
		
		var dataId = $(this).attr("data_id");
		$("#tbRule").empty();
		$.get("/portal/get_threshold", {dataId : dataId, field : $(this).attr("field")}, function(data){
			eval('var ret = ' + data);
			if(ret.ret == 0)
			{
				//父级的规则
				if(ret.parent_setting != undefined)
				{
					var index = 1;
					for(var i =0; i < ret.parent_setting.length; i++)
					{
						var parentSettingObj = ret.parent_setting[i];
						for(var j=0; j < parentSettingObj.setting.length; j++)
						{
							var settingObj = parentSettingObj.setting[j];
							if(settingObj.reference == 1)
								continue;
							var pTr = $('<tr><td>' + index + '</td><td></td>\
									 <td></td>\
									 <td></td>\
									 <td></td>\
									 <td></td>\
									 <td></td>\
									 <td></td>\
									 <td></td><td></td><td><div class="btn-toolbar row-action">\
													<button class="btn btn-success btn_save" title="引用"><i class="icon-cloud-download"></i></button>\
			                        </div></td></tr>');
							$("#tbParentRule").append(pTr);							
							pTr.find("td:eq(1)").text(parentSettingObj.apply_area);
							pTr.data("city_code", parentSettingObj.city_code);
							pTr.data('county_code', parentSettingObj.county_code);
							pTr.data('substation_id', parentSettingObj.substation_id);
							pTr.data('type', settingObj.type);
							pTr.data('level', settingObj.level);
							if(settingObj.type == "lower")
							{
								pTr.find("td:eq(2)").empty().text("下限");
							}else if(settingObj.type == "upper")
							{
								pTr.find("td:eq(2)").empty().text("上限");
							}else if(settingObj.type == "value")
							{
								pTr.find("td:eq(2)").empty().text("阈值");
							}
							pTr.find("td:eq(3)").empty().text(settingObj.value);
							
							var levelStr;
							switch(settingObj.level)
							{
							case "1":
								levelStr = "一级告警";
								break;
							case "2":
								levelStr = "二级告警";
								break;
							case "3":
								levelStr = "三级告警";
								break;
							case "4":
								levelStr = "四级告警";
								break;
							}
							pTr.find("td:eq(4)").text(levelStr);
							pTr.find("td:eq(5)").text(settingObj.signal_name);
							pTr.find("td:eq(6)").text(settingObj.signal_id);
							pTr.find("td:eq(7)").text(settingObj.msg);
							pTr.find("td:eq(8)").text(settingObj.block ? "屏蔽" : "未屏蔽");
							pTr.find("td:eq(9)").text(settingObj.timeout);
							pTr.find(".btn_save").click(function(){
								var pTr = $(this).parent().parent().parent();
								var hasDup = false;
								
								$("#tbRule>tr").each(function(){
									if($(this).data('t_type') == pTr.data("type") &&
											$(this).data('t_level') == pTr.data("level")	)
									{
										hasDup = true;
										return false;
									}
								});
								if(hasDup)
								{
									alert("已经存在相同阈值和告警级别的规则，无法添加");
									return false;
								}
								//Add new reference rule
								AddReferenceRule(pTr);
							});
							index++;
						}
					}
				}
				if(ret.setting == undefined)
					return;
				for(var i =0; i < ret.setting.length; i++)
				{
					if(ret.setting[i].reference == 1)
					{
						//find parent reference
						$("#tbParentRule>tr").each(function(){
							if($(this).data('city_code') == ret.setting[i].city_code
									&& $(this).data('county_code') == ret.setting[i].county_code
									&& $(this).data('substation_id') == ret.setting[i].substation_id
									&& $(this).data('level') == ret.setting[i].level
									&& $(this).data('type') == ret.setting[i].type)
								{
									//found one && Add new reference rule
									AddReferenceRule($(this));
									return false;
								}
						});
						continue;
					}
					var pTr = $('<tr><td>' + (i+1) + '</td><td>无</td><td></td>\
							 <td></td>\
							 <td></td>\
							 <td></td>\
							 <td></td>\
							 <td></td>\
							 <td></td><td></td><td><div class="btn-toolbar row-action">\
									  <div class="btn-group">\
											<button class="btn btn-danger btn_del" title="删除"><i class="icon-remove"></i></button>\
				                            <button class="btn btn-info btn_edit" title="修改"><i class="icon-edit"></i></button>\
	                         				 <button style="display:none" class="btn btn-inverse" title="取消修改"><i class=" icon-remove-sign"></i></button>\
	                       					<button  style="display:none" class="btn btn-success btn_save" title="保存"><i class=" icon-ok"></i></button>\
					                        </div>\
	                        </div></td></tr>');
					$("#tbRule").append(pTr);
					$(".btn_del", pTr).click(function(){
						$(this).parents("tr:eq(0)").remove();
						var index = 1;
						$("#tbRule tr").each(function(){
							$(this).find("td:eq(0)").text(index++);
						});
					});					
					$(".btn_edit", pTr).click(edit_click);
					$(".btn-inverse",pTr).click(reverse_click);
					$(".btn_save", pTr).click(save_click);
					var t_type = ret.setting[i].type;
					var t_value = ret.setting[i].value;
					var t_level = ret.setting[i].level;
					var t_signal_name = ret.setting[i].signal_name;
					var t_signal_id = ret.setting[i].signal_id;
					var t_msg = ret.setting[i].msg;
					var t_block = ret.setting[i].block;
					var t_time = ret.setting[i].timeout;
					
					pTr.data('t_type', t_type);
					pTr.data('t_value', t_value);
					pTr.data('t_level', t_level);
					pTr.data("t_signal_name", t_signal_name);
					pTr.data("t_signal_id", t_signal_id);
					pTr.data('t_msg', t_msg);
					pTr.data('t_block', t_block);
					pTr.data('t_time', t_time);
					
					if(t_type == "lower")
					{
						pTr.find("td:eq(2)").empty().text("下限");
					}else if(t_type == "upper")
					{
						pTr.find("td:eq(2)").empty().text("上限");
					}else if(t_type == "value")
					{
						pTr.find("td:eq(2)").empty().text("阈值");
					}
					pTr.find("td:eq(3)").empty().text(t_value);
					var levelStr;
					switch(t_level)
					{
					case "1":
						levelStr = "一级告警";
						break;
					case "2":
						levelStr = "二级告警";
						break;
					case "3":
						levelStr = "三级告警";
						break;
					case "4":
						levelStr = "四级告警";
						break;
					}
					pTr.find("td:eq(4)").empty().text(levelStr);
					pTr.find("td:eq(5)").empty().text(t_signal_name);
					pTr.find("td:eq(6)").empty().text(t_signal_id);
					pTr.find("td:eq(7)").empty().text(t_msg);
					pTr.find("td:eq(8)").empty().text(t_block ? "屏蔽" : "未屏蔽");					
					pTr.find("td:eq(9)").empty().text(t_time);
				
					
				}
			}else{
				alert(ret.msg);
			}
		});
	});
	
	function picture(_data_id,_mode,_sec,picname){
		var data_id = _data_id;
		var mode = _mode;
		var sec = _sec;
		var name = picname;
		$.post('/portal/isCameraOpOk',{data_id:data_id,mode:mode},function(ret){
			if(ret == "catPict ok"){
				$('#pic-'+ data_id +'').html("<img src='home/nanmaoyi/Downloads/xjdh1/public/images/"+name+"' style='width:1000px;height:550px;' />");
				$('#pic-'+ data_id +'').show();
				$('#scr-'+ data_id +'').attr("disabled", false); 
				return;
			}else{
					sec++;
					if(10 == sec){
						n = noty({
							text: '<span>超时，请重试...</span>',
							type: 'fail',
							layout: 'topCenter',
							closeWith: ['hover','click','button']
						});
						$('#scr-'+ data_id +'').attr("disabled", false); 	
						return;
					}
					setTimeout(function(){picture(data_id,mode,sec,name)},1000);				
				    }
			});
	}
	
	$('.scr').click(function(){
		var data_id = $(this).attr('data_id');
		$('#realtime-'+ data_id +'').hide();
		$('#scr-'+ data_id +'').attr("disabled", true); 
		n = noty({
			text: '<span>请等待...</span>',
			type: 'information',
			layout: 'topCenter',
			closeWith: ['hover','click','button']
		});
		$.post('/portal/cameraOperate',{time:0,data_id:$(this).attr('data_id'),mode:'3'},function(picname){
			if(picname != 0){
						var name = picname;
						var sec = 0;
						picture(data_id,3,sec,name);
			}else{
				$('#scr-'+ data_id +'').attr("disabled", false); 
				n = noty({
					text: '<span>截取失败，请重试...</span>',
					type: 'fail',
					layout: 'topCenter',
					closeWith: ['hover','click','button']
					});
			}
		});
	});

	$('.operate').click(function(){
		var data_id = $(this).attr('data_id');
		$('#li-'+ data_id +'').hide();
		$('#pic-'+ data_id +'').hide();
		$('#video-'+ data_id +'').hide();
		$('#realtime-'+ data_id +'').hide();
		$('#op-'+ data_id +'').show();
	});
	function video(_data_id,_mode,_sec){
		var data_id = _data_id;
		var mode = _mode;
		var sec = _sec;
		$.post('/portal/isCameraOpOk',{data_id:data_id,mode:mode},function(ret){
			if(ret != 0){
				var name = ret;
				$('#video-'+ data_id +'').html("<video src='/public/images/"+name+"' controls='controls' />");
				$('#video-'+ data_id +'').show();
				$('#look-'+ data_id +'').attr("disabled", false); 
			}else{
				sec++;
				if(20 == sec){
					n = noty({
						text: '<span>获取录像失败，请重试...</span>',
						type: 'fail',
						layout: 'topCenter',
						closeWith: ['hover','click','button']
					});
					$('#look-'+ data_id +'').attr("disabled", false);
					return;
				}
				setTimeout(function(){video(data_id,mode,sec)},1000);				
			  }
		});
	}

	function cameraback(_data_id,_mode,_sec){
		var data_id = _data_id;
		var mode = _mode;
		var sec = _sec;
		$('#look-'+ data_id +'').attr("disabled", true); 
		$.post('/portal/isCameraOpOk',{data_id:data_id,mode:mode},function(datatime){
			if(datatime != 0){
				var ret = datatime;
				$('#look-'+ data_id +'').attr("disabled", false); 
				var year1 = ret.substr(0,4);
				var month1 = ret.substr(4,2);
				var day1 = ret.substr(6,2);
				var hour1 = ret.substr(8,2);
				var min1 = ret.substr(10,2);
				var start = year1+month1+day1+hour1+min1;
				var year2 = ret.substr(12,4);
				var month2 = ret.substr(16,2);
				var day2 = ret.substr(18,2);
				var hour2 = ret.substr(20,2);
				var min2 = ret.substr(22,2);
				var end = year2+month2+day2+hour2+min2;
				$('#start-'+ data_id +'').html(''+year1+'-'+month1+'-'+day1+' '+hour1+':'+min1+'');
				$('#to-'+ data_id +'').html('至');
				$('#end-'+ data_id +'').html(''+year2+'-'+month2+'-'+day2+' '+hour2+':'+min2+'');
				var y = "年";
				var m = "月";
				var d = "日";
				var h = "时";
				var min = "分";
				$('#year-'+ data_id +'').empty()
				for(var i=year1;i<=year2;i++){
					$('#year-'+ data_id +'').append('<option value='+i+'>'+ i+y +'</option>');
				}	
				$('#month-'+ data_id +'').empty()
				for(var i=1;i<=12;i++){
					if(i<10){
						$('#month-'+ data_id +'').append('<option value='+0+i+'>'+ 0+i+m +'</option>');
					}else{
						$('#month-'+ data_id +'').append('<option value='+i+'>'+ i+m +'</option>');
					}					
				}
				$('#day-'+ data_id +'').empty()
				for(var i=0;i<=31;i++){
					if(i<10){
						$('#day-'+ data_id +'').append('<option value='+0+i+'>'+ 0+i+d +'</option>');
					}else{
						$('#day-'+ data_id +'').append('<option value='+i+'>'+ i+d +'</option>');
					}					
				}
				$('#hour-'+ data_id +'').empty()
				for(var i=0;i<24;i++){
					if(i<10){
						$('#hour-'+ data_id +'').append('<option value='+0+i+'>'+ 0+i+h +'</option>');
					}else{
						$('#hour-'+ data_id +'').append('<option value='+i+'>'+ i+h +'</option>');
					}
				}
				$('#min-'+ data_id +'').empty()
				for(var i=0;i<60;i+=5){
					if(i<10){
						$('#min-'+ data_id +'').append('<option value='+0+i+'>'+ 0+i+min +'</option>');
					}else{
						$('#min-'+ data_id +'').append('<option value='+i+'>'+ i+min +'</option>');
					}
				}
				$('.look').click(function(){
					$('#look-'+ data_id +'').attr("disabled", true); 
					n = noty({
						text: '<span>请等待...</span>',
						type: 'information',
						layout: 'topCenter',
						closeWith: ['hover','click','button']
					});
					var years = $('#year-'+ data_id +'').find('option:selected').val();
					var months = $('#month-'+ data_id +'').find('option:selected').val();
					var days = $('#day-'+ data_id +'').find('option:selected').val();
					var hours = $('#hour-'+ data_id +'').find('option:selected').val();
					var mins = $('#min-'+ data_id +'').find('option:selected').val();
					var _thistime = years+months+days+hours+mins;
					if(start < _thistime && _thistime < end)
						{
							var times = (hours*60*60)+(mins*60);
							$.post('/portal/cameraOperate',{time:times,data_id:data_id,mode:'2'},function(){
								var sec = 0;
								video(data_id,2,sec);
							});
						}
					else{
						alert("时间选择错误，请重新选择");
						$('#look-'+ data_id +'').attr("disabled", false); 
						return;
					}
				});
			}
		});		
	}
	$('.list').click(function(){
		var data_id = $(this).attr('data_id');
		$('#li-'+ data_id +'').show();
		$('#pic-'+ data_id +'').hide();
		$('#op-'+ data_id +'').hide();
		$('#realtime-'+ data_id +'').hide();
		$.post('/portal/cameraOperate',{time:0,data_id:$(this).attr('data_id'),mode:'1'},function(){
			var sec = 0;
			cameraback(data_id,1,sec);			
		});			
	});
	
	$("#btnAddRule").click(function(){
		var maxIndex = $("#tbRule tr").length + 1;
		//<td><label style="display:inline-block;"><input type="checkbox" />A类</label style="display:inline-block;">&nbsp;<label style="display:inline-block;"><input type="checkbox" />B类</label><br/><label style="display:inline-block;"><input type="checkbox" />C类</label>&nbsp;<label style="display:inline-block;"><input type="checkbox" />D类</label></td>\
		 
		var tTr = $('<tr><td>' + maxIndex + '</td><td>无</td><td><select style="width:auto;"><option value="">请选择</option><option value="lower">下限</option><option value="upper">上限</option><option value="value">阈值</option></select></td>\
					 <td><input type="text" class="span1" /></td>\
					 <td><select style="width:auto;"><option value="">请选择</option><option value="1">一级告警</option><option value="2">二级告警</option><option value="3">三级告警</option><option value="4">四级告警</option></select></td>\
					 <td><select style="width:auto;" class="selSignal"></select></td>\
					 <td><input type="text" readonly="true" class="span1"/></td>\
					 <td><input type="text" class="span3"/></td>\
					 <td><input type="checkbox"/></td>\
				         <td><input type="text" class="span1"/></td>\
					 <td><div class="btn-toolbar row-action">\
						  <div class="btn-group">\
				<button class="btn btn-danger btn_del" title="删除"><i class="icon-remove"></i></button>\
                <button style="display:none" class="btn btn-info btn_edit" title="修改"><i class="icon-edit"></i></button>\
 				 <button style="display:none" class="btn btn-inverse" title="取消修改"><i class=" icon-remove-sign"></i></button>\
					<button  class="btn btn-success btn_save" title="保存"><i class=" icon-ok"></i></button>\
                </div>\
        	</div>\
		 </td></tr>');
		for(i=0;i<signalNameId.length;i++){
			 tTr.find(".selSignal").append("<option value='" + signalNameId[i].key + "'>"+signalNameId[i].name+"</option");  
		}
		tTr.find(".selSignal").change(function(){
			$(this).parent().next().find("input").val($(this).val());
		}).trigger("change");
		$(".btn_del", tTr).click(function(){
			$(this).parents("tr:eq(0)").remove();
			var index = 1;
			$("#tbRule tr").each(function(){
				$(this).find("td:eq(0)").text(index++);
			});
		});
		$(".btn_edit", tTr).click(edit_click);
		$(".btn-inverse",tTr).click(reverse_click);
		$(".btn_save", tTr).click(save_click);		
		$("#tbRule").append(tTr);
	});
	
	$("#btn-ok-checks").click(function(){
		var settingArr = new Array();
		$("#tbRule tr").each(function(){
			if($(this).data("t_type") != undefined)
			{
				var settingObj = {};
				settingObj.reference = $(this).data("reference");
				settingObj.city_code = $(this).data('city_code');
				settingObj.county_code = $(this).data('county_code');
				settingObj.substation_id = $(this).data('substation_id');
				settingObj.type = $(this).data("t_type");
				settingObj.value = $(this).data("t_value");
				settingObj.level = $(this).data("t_level");
				settingObj.signal_name = $(this).data('t_signal_name');
				settingObj.signal_id = $(this).data('t_signal_id');
				settingObj.msg = $(this).data('t_msg');
				settingObj.save = $(this).data('t_save');
				//settingObj.block = $(this).data('t_block');
				settingObj.timeout = $(this).data("t_time");
				settingArr.push(settingObj);
			}
		});
		if(settingArr.length == 0)
		{
			if(!confirm("你没有设置任何规则，请确认保存吗?"))
				return;
		}
		$.post("/portal/rt_set_threshold", {
			data_id : $("#thresholdDialog").data("data_id"),
			field : $("#thresholdDialog").data("field"),
			setting : JSON.stringify(settingArr)}, function(data){
				eval('var ret = ' + data);
				if (ret.ret == 0) {
					var n = noty({
						text: '<span>保存成功。</span>',
						type: 'success',
						layout: 'topCenter',
						closeWith: ['hover','click','button']
					});
				}else{
					var n = noty({
						text: '<span>保存失败。</span>',
						type: 'fail',
						layout: 'topCenter',
						closeWith: ['hover','click','button']
					});
				}
			});
		$('#thresholdDialog').modal('hide');
	});
	
	var data_id = null;
	var model = null;
	$('.dev-info').click(function(){
		data_id = $(this).attr('data_id');
		model = $(this).attr('model');
		$.get('/portal/getdevdetail',{data_id:$(this).attr('data_id'),model:$(this).attr('model'),imem_id:$(this).attr('imem_id')},function(data){
			eval('var ret =' + data);
			if(ret.ret == 0){
				bootbox.dialog({
					title:"详细信息",
					message: ret.html,
					buttons:{
						OK:{
							label : "确定",
							className : "btn-info",
							callback : function() {}
						},
						Cancel:{
							label : "取消",
							className : "btn",
							callback : function() {}
						}
					},
					onEscape: true
				});
			}
		});
	});
	var piKeyArr = new Array();
	$('.room_pi').each(function(){		
		piKeyArr.push($(this).attr('pi_key'));
	});
	if(piKeyArr.length > 0){
		function refreshRoomStatus()
		{
			$.get('/portal/refreshData', {
				piKeyArr : piKeyArr.toString(),
				model: 'room',
				access_token : typeof(accessToken) == "undefined" ? "":accessToken
			}, function(ret) {
				for ( var piObj in ret.roomPiList) {
					$('#room_pi_'+piObj.key).html(piObj.value);
				}
			});
		
		}
		refreshRoomStatus();
		setInterval(refreshRoomStatus, 60000);
	}
});
