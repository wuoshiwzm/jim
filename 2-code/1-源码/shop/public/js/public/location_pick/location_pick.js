// set options for #address1 which is for province when page loaded
var token = $("input[name='_token']").val();
var $form;
var form;
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
        var city = data.value;
        loadCity(city);
    });
    form.on('select(city)', function (data) {
        var eare = data.value;
        loadArea(eare);
    })

});

function loadProvince() {
    var phtml = '';
    // $form.find('select[name=province]').empty();
    $.post("/getProvince", {}, function (data) {
        var data = $.parseJSON(data);
        $.each(data, function (n, value) {
            phtml += "<option value=" + value["provinceID"] + ">" + value["province"] + "</option>";
        });
        $form.find('select[name=province]').append(phtml);
        form.render('select');
        form.on('select(province)', function (data) {
            var citydata = data.value;
            loadCity(citydata);
        })
    });
}
function loadCity(citydata) {
    var phtml = '<option value="0">请选择市区</option>';
    $form.find('select[name=city]').empty();
    loadArea(0);
    $.post("/getCity", {province: citydata}, function (data) {
        var data = $.parseJSON(data);
        $.each(data, function (n, value) {
            phtml += "<option value=" + value["cityID"] + ">" + value["city"] + "</option>"
        });
        $form.find('select[name=city]').append(phtml);
        form.render('select');
        form.on('select(city)', function (data) {
            var areaata = data.value;
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
            //clear the select options then add the new info
            phtml += "<option value=" + value["areaID"] + ">" + value["area"] + "</option>"
        });
        $form.find('select[name=area]').append(phtml);
        form.render('select');
    });
}


