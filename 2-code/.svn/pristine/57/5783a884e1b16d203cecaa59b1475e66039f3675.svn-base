/**
 * Created by Administrator on 2016/10/31 0031.
 */

/**
 * 分页跳转
 * @param index
 */
function searchGet( index )
{
     $(index).parents("form").submit();
}

/**
 * --------------------------------------------------------
 *   属性集
 * --------------------------------------------------------
 */

/**
 * 删除属性集
 * @param id
 */
function delAttributeSet( id )
{
    layer.confirm('确定要删除吗？', {
        btn: ['确定','取消']
    }, function(){
        $.post('/admin/product/attribute_base_del',{id:id},function (msg) {
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

/**
 * 添加属性集弹框
 */
function addAttributeSet()
{
    layer.open({
    type: 2,
    title:false,
    shadeClose: true,
    shade: 0.8,
    area: ['479px', '240px'],
    content: ['/admin/product/attribute_base_create','no']
    });
}
/**
 * 编辑属性集弹框
 */
function editAttributeSet( id )
{
    layer.open({
        type: 2,
        title:false,
        shadeClose: true,
        shade: 0.8,
        area: ['479px', '240px'],
        content: ['/admin/product/attribute_base_edit?id='+id,'no']
    });
}


/**
 * --------------------------------------------------------
 *   属性
 * --------------------------------------------------------
 */

/**
 * 根据选择的类型切换
 * @param index
 * @constructor
 */
function InputType( index )
{
    var type = $(index).val();
    switch ( type )
    {
        case 'radio':
        case 'checkbox':
        case 'select':
            $(".shezi").css('display','block');
            break;
        default:
            $(".shezi").css('display','none');
            break;
    }
}

/**
 * 添加属性值列
 */
$(".add").click(function(){
   // var item = $(this).parents('table').find("tr:eq(1)").prop("outerHTML");
    var item =  '<tr>'+
                '<td><input type="text"  name="text[]" class="form-control valid w180" ></td>'+
                '<td><input type="text"  name="value[]" class="form-control valid w180" ></td>'+
                '<td class="tcheck text-c"><input type="checkbox" class="checkBox table-list-checkbox"></td>'+
                '<td class="hiddens"><a class="hiddens dele_d" href="javascript:;" onclick="delietm( this )">删 除</a></td>'+
                '</tr>';
    $(this).parents('table').append(item);
});
/**
 * 移除属性值列
 */
function delietm( index )
{
    if( $(index).parents('table').find('tr').length > 2 )
    {
        $(index).parents('tr').remove();
    }
}

/**
 * 删除属性集
 * @param id
 */
function delAttribute( id )
{
    layer.confirm('确定要删除吗？', {
        btn: ['确定','取消']
    }, function(){
        $.post('/admin/product/attribute_del',{id:id},function (msg) {
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
