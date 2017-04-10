$(document).ready(function() {	
	$("#all").click(function(){
		if($("#all").prop("checked") == true){
			 $("[name='checkbox']").attr("checked",'true');
		};
	   if($("#all").prop("checked") == false){
		 $("[name='checkbox']").removeAttr("checked");
	    };
    })
	$('.datepicker').datetimepicker({
		language: 'zh-CN',
		format: 'yyyy-mm-dd',
		todayBtn: true,
		autoclose: true,
		minView: 2		
	});
	$('.date-range-picker').daterangepicker({
		format: 'YYYY-MM-DD',
        separator: '至',
        timePicker: false,
    	locale: {
    		applyLabel: '选择',
    		cancelLabel: '重置',
            fromLabel: '从',
            toLabel: '到',
            weekLabel: '星期',
            customRangeLabel: '范围',
            daysOfWeek: ['日','一','二','三','四','五','六'],
            monthNames: ['一月', '二月', '三月', '四月', '五月', '六月','七月', '八月', '九月', '十月', '十一月', '十二月'],
            firstDay: 0
    	}
	});
});