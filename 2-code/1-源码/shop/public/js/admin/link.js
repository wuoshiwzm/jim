/**
 * Created by Administrator on 2017/1/10 0010.
 */
function delLink( id )
{
    layer.confirm('确定要删除吗？', {
        btn: ['确定','取消']
    }, function(){
        $.post('/admin/link/del',{id:id},function (msg) {
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