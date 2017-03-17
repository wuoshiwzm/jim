@section('css')

@stop
@section('title')
    欢迎！
@stop

@section('left')
    @include('member.public.left_center')
@stop


@section('content')


    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>

        <div class="table_div_h">
            <h2>我的订单</h2>
        </div>
        <!--订单切换-->
        <div class="table_div">
            <div class="zanwu">对不起 暂无信息</div>
        </div>
    </div>

@stop

@section('js')
    <script type="text/javascript" src="{{asset('js/member/member.js')}}"></script>
    <script>
        function getImgTemplet(index, id) {
            layer.open({
                type: 2,
                title: false,
                shadeClose: true,
                shade: 0.8,
                area: ['460px', '480px'],
                content: ['/admin/get/imgtemplet/' + id, 'no']
            });
        }
        function setPathUrl(path, index) {
            $.post('/member/user/header', {path: path}, function (msg) {
                msg = eval("(" + msg + ")");
                if (msg['path'] != 0) {
                    $("#" + index).parents('.addimg').find('img').attr('src', msg['path']);
                } else {
                    $("#" + index).parents('.addimg').find('img').attr('src', '/images/member/tou.png');
                }

            })

        }
    </script>
@stop