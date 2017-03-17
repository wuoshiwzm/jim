/**
 *
 * Created by Administrator on 2016/12/31.
 */


//全选
$(function () {
    checkDiscount();

    $(".checkbox_checkall").bind("click", function () {

        if (this.checked) {
            $(".item_checkbox").prop("checked", true);
        } else {
            $(".item_checkbox").prop("checked", false);
        }
        checkDiscount();
    });


    $(".item_checkbox").bind("click", function () {

        if ($('input:checkbox[class=item_checkbox]:checked').length ==
            $('input:checkbox[class=item_checkbox]').length) {
            $(".checkbox_checkall").prop("checked", true);
        } else {
            $(".checkbox_checkall").prop("checked", false);
        }

        checkDiscount();
    });

    $(".coupon").bind("change", function () {

        checkDiscount();
    })

});
