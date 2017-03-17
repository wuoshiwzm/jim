/**
 * Created by Administrator on 2016/12/27 0027.
 */

$(".m-form").Validform({
    btnSubmit: '#btn_submit',
    altercss:'Validform_skate',
    postonce:true,
    showAllError:true,
    tiptype:function(msg,o,cssctl){
        if(!o.obj.is("form")){
            var objtip=o.obj.parent().find(".Validform_checktip");
            objtip.removeClass('Validform_skate');
            cssctl(objtip,o.type);
            objtip.text(msg);
        }else{
            var objtip=o.obj.find("#msgdemo");
            objtip.removeClass('Validform_skate');
            cssctl(objtip,o.type);
            objtip.text(msg);
        }
    },
});
$(".m-form").find('input').each(function()
{
    $(this).focus(function () {
        if ($(this).val() == '')
        {
            var msg = $(this).attr('tipsrmsg');
            $(this).parent().find(".Validform_checktip").addClass('Validform_skate');
            $(this).parent().find(".Validform_checktip").removeClass('Validform_wrong');
            $(this).parent().find(".Validform_checktip").text(msg);
        } else
        {
            $(this).parent().find(".Validform_checktip").removeClass('Validform_skate');
        }
    });
    $(this).blur(function ()
    {
        if ( $(this).val() == '')
        {
            var msg = $(this).attr('errormsg');
            $(this).parent().find(".Validform_checktip").removeClass('Validform_skate');
            $(this).parent().find(".Validform_checktip").addClass('Validform_wrong');
            $(this).parent().find(".Validform_checktip").text(msg);
        }
    });
});

layui.use('form', function(){
    form.on('submit(buynowgoods)', function(data){
        return false;
    });
});

$(function () {
    loadProvince();
});
//使用layui处理弹框
layui.use(['jquery', 'form'], function () {
    $ = layui.jquery;
    form = layui.form();
    $form = $('form');
    //载入省份
    form.on('select(province)', function (data) {
    });


});

function loadProvince() {
    var phtml = '';
    $.post("/getProvince", {}, function (data) {
        var data = $.parseJSON(data);
        $.each(data, function (n, value) {
            phtml += "<option value=" + value["provinceID"] + " data-id="+value["provinceID"]+">" + value["province"] + "</option>";
        });
        $form.find('select[name=province]').append(phtml);
        form.render('select');
        form.on('select(province)', function (data) {
            var citydata = $("#address option:selected").attr('data-id');
            loadCity(citydata);
            loadArea(0);
        })
    });
}
function loadCity(citydata) {
    var phtml = '<option value="0">请选择市区</option>';
    $form.find('select[name=city]').empty();
    $.post("/getCity", {province: citydata}, function (data) {
        var data = $.parseJSON(data);
        $.each(data, function (n, value) {
            phtml += "<option value=" + value["cityID"] + " data-id="+value["cityID"]+">" + value["city"] + "</option>"
        });
        $form.find('select[name=city]').append(phtml);
        form.render('select');
        form.on('select(city)', function (data) {
            var areaata = $("#address1 option:selected").attr('data-id');
            loadArea(areaata);
        })
    });
}

function loadArea(areaata) {
    var phtml = '<option value="0">请选择区/县</option>';
    $form.find('select[name=area]').empty();
    if(areaata ==0){
        $form.find('select[name=area]').append(phtml);
    }
    $.post("/getArea", {city: areaata}, function (data) {
        var data = $.parseJSON(data);
        $.each(data, function (n, value) {
            phtml += '<option value="' + value["areaID"] +'">' + value["area"] + "</option>";
        });
        $form.find('select[name=area]').append(phtml);
        form.render('select');
        form.on('select(area)', function (data) {
            var areaata = $("#address2 option:selected").attr('data-id');
            getFreight(areaata);
        })
    });
}



var wait = 60;
function time() {
    if (wait == 0)
    {
        $("#yzm").val("点击获取验证码");
        $("#yzm").attr('onclick','getcode();');
        wait = 60;
    } else
    {
        $("#yzm").val("重新发送(" + wait + ")");
        wait--;
        setTimeout(function () {
                time()
            },
            1000)
    }
}

/**
 *  发送验证码
 */
function  getcode()
{
    var phone = $("input[name='phone']").val();
    var reg = /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/;
    if( !reg.test(phone) )
    {
        $("input[name='phone']").parent().find(".Validform_checktip").attr('class','Validform_checktip Validform_wrong');
        $("input[name='phone']").parent().find(".Validform_checktip").html('请检查手机号码');
    }else
    {
        $("#yzm").attr('onclick','');
        $.post('/dontlogin/ordersms',{phone:phone},function( msg )
        {

            if( msg == 'success' )
            {
                time();

            }else
            {
                $("#yzm").attr('onclick','getcode();');
                $("input[name='phone']").parent().find(".Validform_checktip").attr('class','Validform_checktip Validform_wrong');
                $("input[name='phone']").parent().find(".Validform_checktip").html(msg);
            }
        },'json');
    }
}


/**
 * 收藏时去登录
 */
$(".keepNo").click(function () {
    layer.confirm('登录', {
        btn: ['去登录','暂不登录']
    },function( index ){
        var url = '/member/login?redirectURL='+encodeURIComponent($('meta[name="redirectURL"]').attr('content'));
        window.location = url;
        layer.close(index);
    });
});

/**
 * 切换付款方式
 */
$(".checkbox").click(function () {

    $(this).find(".layui-form-checkbox").addClass('layui-form-checked');
    $(this).siblings().find(".layui-form-checkbox").removeClass('layui-form-checked');

    $( this ).find('input').attr('checked','checked');
    $( this ).siblings().find('input').removeAttr('checked');

    var str = $(this).find(".addressContent").html();
    $("#setAddress").empty();
    $("#setAddress").append(str);

});

/**
 * 计算运费
 * @param region
 */
function getFreight( region )
{
    $.get('/get/freight',{weight:$("#weight").val(),freight:$("#freight").val(),type:$("#type").val(),region:region},function ( msg ) {
        var str = '运送方式：'+msg.name+'<font>¥'+msg.price+'</font>';
        $("#freightprice").html(str);
        var allprice = parseFloat($("#price").val())+parseFloat(msg.price);
        $("#priceall").html('¥'+allprice.toFixed(2));
        $(".jiesuan_fu").find('ul li').eq(2).find('font').html('¥'+msg.price);
        allprice = allprice-parseFloat($("#cost_freight").val());
        $(".jiesuan_fu").find('ul li').eq(3).find('i').html('¥'+allprice.toFixed(2));
    },'json');
}