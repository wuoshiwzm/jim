/**
 * Created by Administrator on 2016/11/5 0005.
 */
function setLeavel( index )
{
    var leavel = $(index).find("option:selected").attr('value-leavel');
    $(index).parent('div').find('input').val(leavel);
}

/**
 *  删除分组
 * @param id
 */
function delCategory( id )
{
    var token = $("input[name='_token']").val();
    layer.confirm('确定要删除吗？', {
        btn: ['确定','取消']
    }, function(){
        $.post('/admin/product/category/'+id,{_method:'DELETE',_token:token},function (msg) {
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
 * 收缩分开
 * @param index
 */
var upPath = '/css/admin/image/s_jian.png';
var duPath = '/css/admin/image/s_add.png';
function setTypes( index )
{
    var pid = $(index).parents('tr').data('id');
    var parent =  $(index).parents('tr').attr('data-parent-id');
    if( parent == 0 )
    {
        setBase( index,pid )
    }else
    {
        if( $(index).find('img').attr('src') == upPath )
        {
            $(index).parents('table').find('tr').each(function ()
            {
                if( $(this).attr('data-parent-id') == pid )
                {
                    $(this).hide();
                }
            });

            $(index).find('img').attr('src',duPath);
        }else
        {
            $(index).parents('table').find('tr').each(function ()
            {
                if( $(this).attr('data-parent-id') == pid )
                {
                    $(this).show();
                }
            });
            $(index).find('img').attr('src',upPath);
        }

    }
}

/**
 * 父级收缩分开
 * @param index
 * @param pid
 * @param upPath
 * @param duPath
 */
function setBase( index,pid )
{
    $(index).parents('table').find("[data-parent-id='" + pid + "']").each(function ()
    {
        var id = $(this).data('id');
        if( $(index).find('img').attr('src') == upPath )
        {
            $(index).parents('tbody').find('tr').each(function ()
            {
                if( $(this).attr('data-parent-id') == id )
                {
                    $(this).hide();
                    $(this).find('img').attr('src',duPath);
                }
            });
            $(this).hide();
            $(this).find('img').attr('src',duPath);
        }else
        {
            $(index).parents('table').find('tr').each(function ()
            {
                if( $(this).attr('data-parent-id') == id )
                {
                    $(this).show();
                    $(this).find('img').attr('src',upPath);
                }
            });
            $(this).show();
            $(this).find('img').attr('src',upPath);
        }
    });
    if( $(index).find('img').attr('src') == upPath )
    {
        $(index).find('img').attr('src',duPath);
    }else
    {
        $(index).find('img').attr('src',upPath);
    }

}


/**
 * 全展开或者隐藏
 * @param index
 */
function setBaseAll( index  )
{

    if( $(index).text() ==  '全部收缩' )
    {
        $(index).parents('table').find('tr').each(function ()
        {
            if( $(this).attr('data-parent-id') == '0' )
            {
                $(this).show();
            }else
            {
                $(this).hide();
                $(index).parents('tr').show();
            }
            $(this).find('img').attr('src',duPath);
        });
        $(index).text('全部展开');
    }else
    {
        $(index).parents('table').find('tr').each(function ()
        {
            $(this).find('img').attr('src',upPath);
            $(this).show();

        });
        $(index).text('全部收缩');
    }
}


/**
 *  编辑器
 */
if( $("#desc").length )
{
    KindEditor.ready(function(K) {
        K.create('#desc', {
            items: ['fullscreen', 'undo', 'redo','cut',
                'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                'justifyfull','indent', 'outdent', 'subscript',
                'superscript','title', 'fontname', 'fontsize','bold','italic','underline','strikethrough','removeformat',
                'link', 'unlink'],
            afterBlur: function ()
            {
                this.sync();
            },
            afterChange: function () {
                var content = this.text();
                $("#desc").val(content);
            }
        });
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


/**
 * js计算赋值产品数量
 */

$("."+2).each(function () {
    var pid = $(this).data('id');
    var Bindex = $(this);
    var num = 0;
    $("."+3).each(function () {
        if( $(this).attr('data-parent-id') == pid )
        {
            num+= parseInt($(this).find('.num').text());
        }
    });
    $(this).find('.num').text(num);
});

$("."+1).each(function () {
    var pid = $(this).data('id');
    var Bindex = $(this);
    var num = 0;
    $("."+2).each(function () {
        if( $(this).attr('data-parent-id') == pid )
        {
            num+= parseInt($(this).find('.num').text());
        }
    });
    $(this).find('.num').text(num);
});

/**
 * 生成检索数据
 */
function setScreen()
{
    $('#set_Screen').unbind("click"); //移除click
    $.post('/admin/generate/screen',function ( msg ) {

        if( msg == 'success' )
        {
            layer.msg('数据生成成功！');
        }else
        {
            $('#set_Screen').bind("click"); //绑定click
            layer.msg('数据生成失败！');
        }
    })
}