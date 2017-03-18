

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


