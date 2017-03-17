/**
 * Created by Administrator on 2016/11/8 0008.
 */
$("[name=category_search]").keyup(function() {
    var text = $(this).val();
    if (text == '')
    {
        $(this).parents('.category-list').find('.category-list-name li').show();
    }else
    {
        $(this).parents('.category-list').find(".category-list-name").find("li").hide();
        $(this).parents('.category-list').find(".category-list-name").find("[data-search*=" + text + "]").parents("li").show();
    }
});

/**
 * 选择分类
 * @param id
 * @param index
 * @param ietm
 */
function setItem( id, index, ietm )
{
    var name = $(index).text();
    switch ( $(index).attr('data-leavel') )
    {
        case "1":
            $("#current-choose-category").html(name);
            var categoryName = name;
            $(index).parents('.category-list').find('input').val(name);
            $(index).parents('.category-list-name').find("li").show();
            steCategory(id,ietm);
            $(".btn-primary").addClass('btn-top');
            $(".btn-primary").attr('disabled',true);
            break;
        case "2":
            var level1 = $(".level-1").val();
            var categoryName = level1+'<i>&gt;</i>'+name;
            $("#current-choose-category").html(categoryName);
            $(index).parents('.category-list').find('input').val(name);
            $(index).parents('.category-list-name').find("li").show();
            steCategory(id,'category-level-3');
            $(".btn-primary").addClass('btn-top');
            $(".btn-primary").attr('disabled',true);
            break;
        case "3":
            var level1 = $(".level-1").val();
            var level2 = $(".level-2").val();
            var categoryName = level1+'<i>&gt;</i>'+level2+'<i>&gt;</i>'+name;
            $("#current-choose-category").html(categoryName);
            $(index).parents('.category-list').find('input').val(name);
            $(index).parents('.category-list-name').find("li").show();
            $(".btn-primary").removeClass('btn-top');
            $(".btn-primary").attr('disabled',false);
            break;

    }
    $( index ).addClass('classDivClick');
    $( index ).parent('li').siblings().find('a').removeClass('classDivClick');
    $("#categoryName").val(categoryName);
    $("#categoryID").val(id);
}
function steCategory( id,ietm )
{
   $("."+ietm ).find('li').remove();
   $.get('/admin/product/getcategory/'+id,function ( data ) {
      var li = '';
      for( var i=0; i< data.length; i++ )
      {
         li += '<li><a href="javascript:;" class="category-name" data-leavel="'+data[i].leavel+'" data-search="'+data[i].name+'"  onclick="setItem('+data[i].id+',this,3)"> '+data[i].name+'</a></li>';
      }
      $("."+ietm ).find('li').remove();
      $("."+ietm ).append( li );
   },'json')
}


/**
 *  下一步
 */
function addProduct()
{
    var setid = $('.chosen-select option:selected').val();
    var categoryName = $("#categoryName").val();
    var categoryID = $("#categoryID").val();
    var category = $("#category").val();
    if( category == false )
    {
        layer.msg('请选择分类');
        return;
    }
    if( setid == false )
    {
        layer.msg('请选择属性集');
        return;
    }
    
    if( categoryName == false || categoryID == false )
    {
        layer.msg('请选择分类信息');
        return;
    }
    $("#SearchModel").submit();
}

/**
 * 获取供应商
 * @param index
 */
function getSupplier( index )
{
    var name = $( index ).find('option:selected').text();
    $( index ).parent('div').find('input').val( name );
}

/**
 * 产品上下架
 * @param type
 * @param index
 * @param id
 */
function setStatus( type,index,id )
{
    layer.confirm('确认此操作', {
        btn: ['确定','取消']
    }, function() {
        if (type == 'down')
        {
            var status = 0;
        }else
        {
            var status = 1;
        }
        $.post('/admin/product/goods/status', {status: status, entity_id: id}, function (data) {

            if ( data.ststus == 0 )
            {
                layer.msg(data.msg, {icon: 1});
                $(index).parents('tr').remove();
            } else {
                layer.msg(data.msg, {icon: 2});
            }

        }, 'json');
    });
}

/**
 * 删除产品
 * @param index
 * @param id
 */
function delProduct( index, id )
{
    var token = $("input[name='_token']").val();
    layer.confirm('确认要删除吗', {
        btn: ['确定','取消']
    }, function()
    {
        $.post('/admin/product/goods/'+id,{_method:'DELETE',_token:token},function (msg) {
            if( msg.ststus == '0')
            {
                layer.msg(msg.msg, {icon: 1});
                $( index ).parents( 'tr').remove();
            }else
            {
                layer.msg(msg.msg, {icon: 2});
            }
        },'json')
    });
}
/**
 *  编辑器
 */
if( $("#desc").length )
{
    KindEditor.ready(function(K) {
        K.create('#desc', {
            height:'300',
            items: ['fullscreen', 'undo', 'redo','cut',
                'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                'justifyfull','indent', 'outdent', 'subscript',
                'superscript','title', 'fontname', 'fontsize','bold','italic','underline','strikethrough','removeformat', '|','image','multiimage',
                'link', 'unlink'],
            afterBlur: function ()
            {
                this.sync();
            }/*,
            afterChange: function () {
                var content = this.text();
                $("#desc").val(content);
            }*/
        });
    });
}


/**
 * 全选
 * @param val
 * @constructor
 */
function CheckAll( val )
{

    $("input[name='check[]']").each(function()
    {
        this.checked = val;
    });
}

function CheckOne(val,index)
{
    var PValue = false;
    var i = 0;
    var inputLength = $(index).parents('tbody').find("input[name='check[]']").length;
    $(index).parents('tbody').find("input[name='check[]']").each(function()
    {
        if( this.checked == val )
        {
            i++;
        }
    });

    if( inputLength == i )
    {
        PValue = val;
    }
    
    $(index).parents('.table-hover').find('th').find('input').each(function()
    {
        this.checked = PValue;
    });
}

/**
 *  批量上架下架
 */
function setStatusAll() {

    var i = 0;
    $("input[name='check[]']").each(function()
    {
       if( this.checked == true )
       {
            i++;
       }
    });

    if( i == false )
    {
        layer.msg('请选择产品',{icon:7});
    }else
    {
        $(".goods").submit();
    }
}

/**
 * 验证
 */
$.extend($.Datatype, {
    'stock':function ( gets, obj, curform, regxp)
    {
        var reg = /^[1-9]\d{0,5}$/;
        if ( reg.test(gets) )
        {
            return true;

        }else
        {
            if( obj.attr('name') == 'stock' )
            {
                obj.attr('errormsg', '请输入1-5位正整数');
                return false;
            }else
            {
                return false;
            }
        }
    },
    'checkstock':function ( gets, obj, curform, regxp)
    {
        var stock  = $(obj).parents('.simple-form-field').prev().find('.form-control').val();
        if( parseInt(stock) > gets )
        {
            obj.attr('errormsg', '实际库存不能小于警戒库存');
            return false;
        }else
        {
            return true;
        }
    },
});

/**
 * 库存逻辑校验
 * @returns {boolean}
 */
function checkjingjie()
{
    var jingjie = $("input[name='jingjie']").val();
    var stock = $("input[name='stock']").val();
    if( stock )
    {
        if( parseInt(stock) < parseInt(jingjie) )
        {
            $("input[name='stock']").next("span").addClass("Validform_wrong");
            $("input[name='stock']").next("span").text("实际库存不能小于警戒库存");
            return false;
        }else
        {
            $("input[name='stock']").next("span").removeClass("Validform_wrong");
            $("input[name='stock']").next("span").addClass("Validform_right");
            $("input[name='stock']").next("span").text("通过信息验证！");
            return true;
        }
    }
}
