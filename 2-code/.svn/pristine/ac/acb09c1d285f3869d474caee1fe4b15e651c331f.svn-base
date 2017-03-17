/**
 * Created by Administrator on 2016/11/18 0018.
 */

function setType( index )
{
    var value = $(index).val();
    if( value == '2' )
    {
        var name = '百分比：';
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('datatype','percent');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('maxlength','3');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('tipsrmsg','请输入百分比');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('errormsg','百分比为1-100之间的正整数');
        $("#danwei").html('%');
    }else
    {
        var name = '折扣金额：';
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('datatype','full,discount');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('maxlength','10');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('tipsrmsg','请输入1-10位正整数');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('errormsg','折扣金额为1-10位正整数');
        $("#danwei").html('元');
    }
    $( index ).parents('.simple-form-field').next('.simple-form-field').find('.ng-binding').text(name);
    $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').val('');

}

/**
 *  删除分组
 * @param id
 */
function delFullCut( id )
{
    var token = $("input[name='_token']").val();
    layer.confirm('确定要删除吗？', {
        btn: ['确定','取消']
    }, function(){
        $.post('/admin/marketing/fullcut/'+id,{_method:'DELETE',_token:token},function (msg) {
            if( msg.ststus == '0')
            {
                layer.msg(msg.msg, {icon: 1});
                location=location;
            }else
            {
                layer.msg(msg.msg, {icon: 2});
            }
        },'json')
    });
}
$.extend($.Datatype, {
    /**
     * 满减金额
     * @param gets
     * @returns {boolean}
     */
    'full':function ( gets, obj, curform, regxp)
    {
        var reg = /^[1-9]\d{0,9}$/;
        if ( reg.test(gets) )
        {
            return true;

        }else
        {
            if( obj.attr('name') == 'discount_amount' )
            {
                obj.attr('errormsg', '折扣金额为1-10位正整数');
                return false;
            }else
            {
                return false;
            }
        }
    },
    /**
     * 折扣金额
     * @param gets
     * @returns {boolean}
     */
    'discount':function ( gets, obj, curform, regxp)
    {
        var conditions_use = $("input[name='conditions_use']").val();
        if( gets > parseInt(conditions_use) )
        {
            obj.attr('errormsg', '折扣金额不能大于满减金额');
            return false

        }else
        {
            return true;
        }
    },
    /**
     * 验证发型数量和使用数量
     * @param gets
     * @param obj
     * @param curform
     * @param regxp
     * @returns {boolean}
     */
    'checknum':function ( gets, obj, curform, regxp)
    {
        var prevTime  = $(obj).parents('.simple-form-field').prev().find('.form-control').val();
        if( parseInt(prevTime) < gets )
        {
            obj.attr('errormsg', '使用次数不能大于发行数量');
            return false;
        }else
        {
            return true;
        }
    },
    'num':function ( gets, obj, curform, regxp)
    {
        var reg = /^[1-9]\d{0,5}$/;
        if ( reg.test(gets) )
        {
            return true;

        }else
        {
            if( obj.attr('name') == 'userd_num' )
            {
                obj.attr('errormsg', '使用次数为1-6位正整数');
                return false;
            }else
            {
                return false;
            }
        }
    }


});