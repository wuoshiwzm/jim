//图片裁切//
$('.qie_img').click(function(){
	  layer.open({
	    type: 2,
	    title:false,
	    shadeClose: true,
	    shade: 0.8,
	   area: ['460px', '480px'],
		    content: ['qie_img.html','no']
	});
});

//图片上传//
$('.photo_fa').click(function(){
	  layer.open({
	    type: 2,
	    title: '照片上传',
	    shadeClose: true,
	    shade: 0.8,
	    area: ['824px', '460px'],
	    content: ['photo_fa.html','no']
	});
});

//初始化验证//
 
        
		     $(".m-form").Validform({
		         altercss:'Validform_skate',
		         postonce:true,
		         showAllError:true,
		         postonce:true,
		         tiptype:function(msg,o,cssctl){
		             if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
		                 var objtip=o.obj.parent().find(".Validform_checktip");
		                 objtip.removeClass('Validform_skate');
		                 cssctl(objtip,o.type);
		                 objtip.text(msg);
		             }else{
		                 var objtip=o.obj.find("#msgdemo");
		                 objtip.removeClass('Validform_skate');
		                 cssctl(objtip,o.type);
		                 objtip.text(msg);
		             }
		         },
		     });
		     $(".m-form").find('input').each(function() {
		         $(this).focus(function () {
		             if ($(this).val() == '') {
		                 var msg = $(this).attr('tipsrmsg');
		                 $(this).parent().find(".Validform_checktip").addClass('Validform_skate');
		                 $(this).parent().find(".Validform_checktip").removeClass('Validform_wrong');
		                 $(this).parent().find(".Validform_checktip").text(msg);
		             } else {
		                 $(this).parent().find(".Validform_checktip").removeClass('Validform_skate');
		             }
		         });
		         $(this).blur(function () {
		             if ($(this).val() == '') {
		                 var msg = $(this).attr('errormsg');
		                 $(this).parent().find(".Validform_checktip").removeClass('Validform_skate');
		                 $(this).parent().find(".Validform_checktip").addClass('Validform_wrong');
		                 $(this).parent().find(".Validform_checktip").text(msg);
		             }
		         });
		     });
           
//



/*         下拉菜单和单选按钮    js     */
    (function ($) {
        $(".m-form").each(function(i,v){
			//下拉列表
            $(this).find('.select-option').css('display','none');
             $(this).find('.select-btn').click(function(){
				 
                 var i =   $(this);
                 var p =   $(this).next('input');
                 var k =   $(this).parent().find('.select-option');
                  k .css('display','block');
                $(this).parent().find('.select-option').each(function(m,n){
                   $(this).find('a').click(function(){
                       i.val($(this).text())  ;
                       p.val($(this).attr('data-value'));
                       k.css('display','none');
                   })
               });
            });
            //单选
			var s = $(this).find('.radio_model')
            s.click(function(){
				 s.removeClass('radio_model_on');
				 $(this).addClass('radio_model_on');
                $(this).parent().parent().find('input').val($(this).attr('value'))
            })
			
        })
    })(jQuery);
	
	
	
	jQuery(".admin_form").slide({trigger:"click"});