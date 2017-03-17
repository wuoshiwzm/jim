/**
 * Created by Administrator on 2016/11/18 0018.
 */

function setType( index )
{
    var value = $(index).val();
    if( value == '2' )
    {
        var name = '百分比';
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('datatype','n1-3');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('maxlength','3');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('tipsrmsg','请输入百分比');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('errormsg','输入有误');
    }else
    {
        var name = '折扣金额';
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('datatype','je');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('maxlength','10');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('tipsrmsg','请输入折扣金额');
        $( index ).parents('.simple-form-field').next('.simple-form-field').find('input').attr('errormsg','折扣金额限制2位小数（大于0）');
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