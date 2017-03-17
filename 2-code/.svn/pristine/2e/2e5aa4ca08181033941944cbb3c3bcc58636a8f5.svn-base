function sendSms() {
    var token = $("input[name='_token']").val();
    phone = $("#phone").val();
    layer.confirm('确定要发送吗？', {
        btn: ['确定', '取消']
    }, function () {
        $.post('/member/send_sms' , {_token: token,phone:phone}, function (msg) {
                layer.msg(msg);
        }, 'json')
    });
}