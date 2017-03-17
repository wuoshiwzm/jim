/**
 * Created by Administrator on 2016/11/4 0004.
 */
/**
 * 选择城市
 * @param item
 */
function getCityList( item )
{
    var id = $(item).val();
    $.get( '/admin/getcity/' + id , function( ret )
    {
        $( '#city' ).find( 'option' ).remove();
        var strApp = '<option value="0">请选择城市</option>';
        if( ret )
        {
            for(  var i=0; i < ret.length; i++  )
            {
                strApp += '<option value="'+ret[i].cityID+'">'+ret[i].city+'</option>';
            }
        }
        $( '#city' ).append( strApp );
    }, 'json' );
}

/**
 * 删除门店
 * @param id
 */
function delShop( id )
{
    var token = $("input[name='_token']").val();
    layer.confirm('确定要删除吗？', {
        btn: ['确定','取消']
    }, function(){
        $.post('/admin/user/shop/'+id,{_method:'DELETE',_token:token},function (msg) {
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
function getImgTemplet( index, id )
{
    layer.open({
        type: 2,
        title:false,
        shadeClose: true,
        shade: 0.8,
        area: ['460px', '480px'],
        content: ['/admin/get/imgtemplet/'+id,'no']
    });
}

/**
 * 上传图片回调
 * @param path
 * @param index
 */
function setPathUrl( path, index  )
{
    $("#"+index).parents('.addimg').find('img').attr('src','/media/temp/'+path);
    $("#"+index).val(path);
}