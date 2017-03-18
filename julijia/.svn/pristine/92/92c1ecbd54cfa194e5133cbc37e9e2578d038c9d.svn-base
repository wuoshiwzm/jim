/**
 * Created by Administrator on 2016/12/27 0027.
 */
layui.use('form', function(){
    var form = layui.form();
    //监听提交
    form.on('submit(formDemo)', function(data){
        layer.msg(JSON.stringify(data.field));
        return false;
    });
});


$(".checkbox").click(function () {

    $(this).find(".layui-form-checkbox").addClass('layui-form-checked');
    $(this).siblings().find(".layui-form-checkbox").removeClass('layui-form-checked');

    $( this ).find('input').attr('checked','checked');
    $( this ).siblings().find('input').removeAttr('checked');

});