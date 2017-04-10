$(document).ready(function(){
	var dataIdArray = new Array();
	var id = '';
	$(".rt-data").each(function(){
		dataIdArray.push($(this).attr('data_id'));
	});

	function refreshData(){
		$.get("/portal/refreshData", {dataIdArr:dataIdArray.toString(),access_token: typeof(accessToken) == "undefined" ? "":accessToken,
							model:"smd_device"},function(ret){		
			for(var i=0;i<ret.device.length;i++){
				if(ret.device[i].status){
					$("#device-" + ret.device[i].data_id).find("td:eq(4)").html('<span class="label label-success">正常</span>');
				}else{
					$("#device-" + ret.device[i].data_id).find("td:eq(4)").html('<span class="label label-warning">异常</span>');
				}
				$("#device-" + ret.device[i].data_id).find("td:eq(5)").text(ret.device[i].last_update);
			}
		});
	}
	refreshData();
	setInterval(function(){ refreshData(); }, 10000);
});
