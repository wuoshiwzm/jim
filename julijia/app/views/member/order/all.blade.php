@section('title')
    全部订单
@stop

@section('left')
    @include('member.public.left_center')
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
            @include('member.public.order_nav')

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
                @include('member.public.order_content',array('orders'=>$orders))

                <div id="paging">
                    {{$orders->appends($set)->links()}}
                </div>


            </div>
        </div>
    </div>
@stop
@section('js')


@stop