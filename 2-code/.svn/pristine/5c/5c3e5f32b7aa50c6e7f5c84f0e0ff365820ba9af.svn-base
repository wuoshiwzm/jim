@section('title')
    全部订单
@stop

@section(('content'))
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
            @include('layouts.member.order_nav')

            <div class="table_div_hd table_div_hd_table">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>商品</th>
                        <th width="10%">单价（元）</th>
                        <th width="8%">数量</th>
                        <th width="12%">状态</th>
                        <th width="16%">商品操作</th>
                        <th width="16%">产品价格</th>
                        <th width="14%">操作</th>
                    </tr>
                </table>
                {{--订单内容--}}


                @include('layouts.member.order_content')


                <div id="paging">

                    @include('admin.public.page',array('data'=>$data,'set'=>$set))

                </div>


            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript" src="{{asset('js/member/layui.js')}}"></script>
    <script>
        layui.use('element', function () {
            var element = layui.element(); //导航的hover效果、二级菜单等功能，需要依赖element模块

        });

        //删除//
        $('.dele_d').click(function () {
            //询问框
            layer.confirm('确定要删除？', {
                title: ['删除', 'font-size:16px;'],
                btn: ['确定', '取消'] //按钮
            }, function () {
                layer.msg('已经删除', {icon: 1});
            }, function () {
                layer.msg('取消删除', {
                    icon: 2

                });
            });
        });
        //

        //删除订单//
        $('.dele_dd').click(function () {
            //询问框
            layer.confirm('确定要删除订单？', {
                title: ['删除订单', 'font-size:16px;'],
                btn: ['确定', '取消'] //按钮
            }, function () {
                layer.msg('已经删除', {icon: 1});
            }, function () {
                layer.msg('取消删除', {
                    icon: 2

                });
            });
        });
        //
    </script>
@stop