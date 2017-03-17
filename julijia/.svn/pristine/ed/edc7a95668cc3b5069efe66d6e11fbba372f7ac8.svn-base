/**
 * Created by Administrator on 2016/11/4 0004.
 */
/**
 * 表单验证
 */
$(".form").Validform({
    btnSubmit: '#btn_submit',
    postonce: true,
    showAllError: true,
    tiptype: function (msg, o, cssctl) {
        if (!o.obj.is("form"))
        {
            var objtip = o.obj.parent('div').find(".Validform_checktip");
            objtip.removeClass('Validform_skate');
            cssctl(objtip, o.type);
            objtip.text(msg);
        }
    }
});
$(".form").find('input').each(function () {
    $(this).focus(function () {
        if ($(this).val() == '')
        {
            var msg = $(this).attr('tipsrmsg');
            $(this).parent('div').find(".Validform_checktip").addClass('Validform_skate');
            $(this).parent('div').find(".Validform_checktip").removeClass('Validform_wrong');
            $(this).parent('div').find(".Validform_checktip").text(msg);
        }else
        {
            $(this).parent('div').find(".Validform_checktip").removeClass('Validform_skate');
        }
    });
    $(this).blur(function ()
    {
        if ($(this).val() == '')
        {
            var msg = $(this).attr('nullmsg');
            $(this).parent('div').find(".Validform_checktip").removeClass('Validform_skate');
            $(this).parent('div').find(".Validform_checktip").addClass('Validform_wrong');
            $(this).parent('div').find(".Validform_checktip").text(msg);
        }
    });
});

/**
 * 提示信息
 * @type {*|jQuery}
 */
var msg = $("#msg").val();
if( msg )
{
    layer.alert( msg );
}


/**
 * ajax修改排序
 * id:id
 * model:模型
 * idnex：当前对象
 * @param model
 */
function editSort( id,model,index )
{
    var sort = $(index).val();
    sort = parseInt(sort);
    if ((/^(\+|-)?\d+$/.test( sort )) && sort>0 )
    {
        $.post('/admin/editsort',{id:id,model:model,sort:sort},function (msg) {
            if( msg.status == '1')
            {
                layer.msg(msg.info, {icon: 1});
                location=location;
            }else
            {
                layer.msg(msg.msg, {icon: 2});
            }
        },'json')
    }else
    {
        layer.msg('输入的内容有误', {icon: 2});
        
    }
}