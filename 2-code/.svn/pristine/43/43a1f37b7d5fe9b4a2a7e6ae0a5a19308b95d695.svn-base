/**
 * Created by Administrator on 2016/11/4 0004.
 */
function delGroup(id) {

    var token = $("input[name='_token']").val();
    layer.confirm('确定要删除此等级信息吗？', {
        btn: ['确定', '取消']
    }, function () {
        $.post('/admin/group/' + id, {_method: 'DELETE', _token: token}, function (msg) {
            if (msg.status == '0') {
                layer.msg(msg.msg, {icon: 1});
                location = location;
            } else {
                layer.msg(msg.msg, {icon: 2});
            }
        }, 'json')
    });
}


/**
 * 图象上传
 */
function getImgTemplet(index, id) {
    layer.open({
        type: 2,
        title: false,
        shadeClose: true,
        shade: 0.8,
        area: ['460px', '450px'],
        content: ['/admin/get/multi_imgtemplet/' + id, 'no']
    });
}


/**
 * 上传图片回调
 * @param path
 * @param index
 */
function setPathUrl(path, index) {
    arr = path.split(";");

    if (arr!='') {
        h ='';
        for(i=0;i<arr.length-1;i++){
            h+="<div class='addimg addimg02' ><a><img src=/media/temp/" + arr[i] + " width=80 height=80></a></div>";
        }
        $(".layui-input-block").find('.addimg02:last').after(h);
    }
    p= $("#" + index).val();
    $("#" + index).val(p+path);
}

/**
 * 清空图片选择
 */
function clearPic() {
    alert($(this).parent().remove());
    //$('.addimg').find('img').attr('src', '');
    //$('.addimg').find('input').val('');
}

