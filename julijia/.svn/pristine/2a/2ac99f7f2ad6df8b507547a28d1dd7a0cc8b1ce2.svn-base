// set options for #address1 which is for province when page loaded
var token = $("input[name='_token']").val();
$(function () {


 /*   $.post("/getProvince", {_token: token}, function (data) {
     var data = $.parseJSON(data);
     $.each(data, function (n, value) {
     $("#address1").append("<option value=" + value["id"] + ">" + value["province"] + "</option>");
     });

     });*/

// when #address1 change, set options for #address2 which is for province
    $("#address1").bind("change", function () {

        var province = $("#address6").val();
        $.post("/getCity", {_token: token, province: province}, function (data) {
            var data = $.parseJSON(data);
            $("#address2").empty();
            $("#address3").empty();
            $.each(data, function (n, value) {
                //clear the select options then add the new info
                $("#address2").append("<option value=" + value["city"] + ">" + value["city"] + "</option>");
            });
        });
    });


// when #address2 change, set options for #address3 which is for province
    $("#address2").bind("change", function () {
        var city = $("#address2").val();

        $.post("/getArea", {_token: token, city: city}, function (data) {
            // alert(data);
            $("#address3").empty();
            var data = $.parseJSON(data);
            $.each(data, function (n, value) {
                //clear the select options then add the new info
                $("#address3").append("<option value=" + value["area"] + ">" + value["area"] + "</option>");
            });
        });
    });

});


// set #address2 change, set options for #address3 which is for province
// $("#address2").bind("p","change",function(){
//
// }

var $form;
var form;
//使用layui处理弹框
layui.use(['jquery', 'form'], function() {
    $ = layui.jquery;
    form = layui.form();
    $form = $('form');
    //载入省份
    loadProvince();

});

function loadProvince() {
   var phtml ='';
    $form.find('select[name=province]').empty();
    $.post("/getProvince", {}, function (data) {
        var data = $.parseJSON(data);
        $.each(data, function (n, value) {
              phtml += "<option value=" + value["province"] + ">" + value["province"] + "</option>";
        });
        $form.find('select[name=province]').append(phtml);
        form.render();
        form.on('select(province)',function (data) {
            var citydata = data.value;
            console.log(data.value);
            loadCity(citydata);

            // $form.find('select[name=area]').empty();
            // form.render();
        })
    });
}
function loadCity(citydata) {
    var phtml = '';
    $form.find('select[name=city]').empty();
    $.post("/getCity", {province: citydata}, function (data) {
        var data = $.parseJSON(data);
        $.each(data, function (n, value) {
            //clear the select options then add the new info
            phtml += "<option value=" + value["city"] + ">" + value["city"] + "</option>"
        });
        $form.find('select[name=city]').append(phtml);
        form.render();
        form.on('select(city)', function (data) {
            var areaata = data.value;
            loadArea(areaata);
        })
    });
}

    function loadArea(areaata) {
        var phtml ='';
        $form.find('select[name=area]').empty();
        $.post("/getArea", {city: areaata}, function (data) {
            var data = $.parseJSON(data);
            $.each(data, function (n, value) {
                //clear the select options then add the new info
                phtml +="<option value=" + value["area"] + ">" + value["area"] + "</option>"
            });
            $form.find('select[name=area]').append(phtml);
            form.render();
            form.on('select(area)',function (data) {
                var areaata = data.value;
                loadArea(areaata);
            })
        });
}