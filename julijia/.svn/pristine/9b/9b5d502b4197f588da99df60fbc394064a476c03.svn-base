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
