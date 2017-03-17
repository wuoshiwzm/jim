/**
 *Created by poseidon on 2016-12-14.
 *desc:发货单页面js
 */
$(function(){
    //单个发货
    $('.fa').click(function(){
        var item_id = $(this).attr("data-item");
        layer.open({
            type: 2,
            title:false,
            shadeClose: true,
            shade: 0.8,
            area: ['440px', '260px'],
            content:['/admin/order/logistics?item_id='+item_id,'no']
        });
    });
    //批量发货
    $(".batch_fa").click(function(){
        var length = $("tbody :checked").length;
        if (length == 0 ) {
            layer.msg('请选择要发货的商品', {icon: 2,time:1000});
            return false;
        }
        var items = [];
        $("tbody :checked").each(function(){
           items.push($(this).attr("data-item"));
        })
        var items_id = items.join();
        layer.open({
            type: 2,
            title:false,
            shadeClose: true,
            shade: 0.8,
            area: ['440px', '260px'],
            content:['/admin/order/logistics?item_id='+items_id,'no']
        });

    })

    $(".table-list-checkbox-all").click(function(){
        if (this.checked) {
            $("tbody :checkbox").prop("checked",true);
        }else {
            $("tbody :checkbox").prop("checked",false);
        }
    })


})