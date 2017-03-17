/**
 * Created by Administrator on 2016/11/4 0004.
 */
function delNewscate(id) {
    var token = $("input[name='_token']").val();
    layer.confirm('确定要删除吗？', {
        btn: ['确定', '取消']
    }, function () {
        $.post('/admin/newscate/' + id, {_method: 'DELETE', _token: token}, function (msg) {
            if (msg.status == '0') {
                layer.msg(msg.msg, {icon: 1});
                location = location;
            } else {
                layer.msg(msg.msg, {icon: 2});
            }
        }, 'json')
    });
}

function delNews(id) {
    var token = $("input[name='_token']").val();
    layer.confirm('确定要删除吗？', {
        btn: ['确定', '取消']
    }, function () {
        $.post('/admin/newsart/' + id, {_method: 'DELETE', _token: token}, function (msg) {
            if (msg.status == '0') {
                layer.msg(msg.msg, {icon: 1});
                location = location;
            } else {
                layer.msg(msg.msg, {icon: 2});
            }
        }, 'json')
    });
}

function multiDelNews() {
    var token = $("input[name='_token']").val();


    layer.confirm('确定要删除所选的新闻吗？', {
        btn: ['确定', '取消']
    }, function () {

        $('input:checkbox[name=newsId]:checked').each(function (i) {
            id = $(this).val();
            $.post('/admin/newsart/' + id, {_method: 'DELETE', _token: token}, function (msg) {
            });
        });
        location = location;

    });


}

$(function () {

    $(".table-list-checkbox-all").bind("click", function () {

        if (this.checked) {
            $(".table-list-checkbox").prop("checked", true);
        } else {
            $(".table-list-checkbox").prop("checked", false);
        }
    });

});



