/**
 * Created by Administrator on 2016/10/31 0031.
 */

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
            $("table tr").not(".one").remove();
            $(".shezi").css('display','block');
            break;
        default:
            $("table tr").not(".one").remove();
            $(".shezi").css('display','none');
            break;
    }
}

/**
 * 添加属性值列
 */
$(".add").click(function(){
    var item =  '<tr>'+
                '<td><input type="text"  name="text[]" maxlength="100" class="form-control valid w100" ></td>'+
                '<td><input type="text"  name="value[]" maxlength="100" class="form-control valid w100" ></td>'+
                '<td class="tcheck text-c"><input type="checkbox" class="checkBox table-list-checkbox"></td>'+
                '<td class="tcheck"><span><img  onclick="getImgTemplet( this )" src="/images/admin/addimg.png" height="32" width="32"></span></td>'+
                '<td class="hiddens"><a class="hiddens dele_d" href="javascript:;" onclick="delietm( this )">删 除</a></td>'+
                '<input type="hidden" name="images[]">'+
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

/**
 * 图象上传
 */
function getImgTemplet( index )
{
    var i = $(index).parents('tr').index();
    layer.open({
        type: 2,
        title:false,
        shadeClose: true,
        shade: 0.8,
        area: ['460px', '480px'],
        content: ['/admin/get/imgtemplet/'+i,'no']
    });
}

/**
 * 上传图片回调
 * @param path
 * @param index
 */
function setPathUrl( path, index  )
{
    $(".shezi").find("tr").eq(index).find('img').attr('src','/media/temp/'+path);
    $(".shezi").find("tr").eq(index).find('input:last').val(path);
}

/**
 * 移除修改属性值
 * @param index
 */
function delValueIetm( index )
{
    var delID =  $(index).parents('tr').find('input[name="editid[]"]').val();
    var str = '<input type="hidden" name="oldId[]" value="'+delID+'">';
    $("#oldID").append( str );
    $(index).parents('tr').remove();
}


/**
 * 控制是父需要填长度
 * @param index
 */
function setLength( index )
{
   if( $(index).val() == 'varchar')
   {
       $("#length").show();
       $("#length").find('input').attr('ignore','');
   }else
   {
       $("#length").hide();
       $("#length").find('input').attr('ignore','ignore');
   }
}