@section('title')
    会员积分
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
            <h2>我的订单&nbsp;&nbsp;-&nbsp;&nbsp;<font>退款退货</font></h2>
        </div>
        <!--订单切换-->
        <div class="table_div">
            <div class="order-step">
                <!--完成步骤为dl添加current样式，完成操作内容后会显示完成时间-->
                <dl class="current">
                    <dt>买家 申请退款</dt>
                    <dd class="bg"><font>1</font></dd>
                    <dd class="bg02"></dd>
                    <dd class="bg01"></dd>

                </dl>
                <dl
                        @if($refund->status >= 2)
                        class="current"
                        @endif
                >
                    <dt>商家 处理退款申请</dt>
                    <dd class="bg"><font>2</font></dd>
                    <dd class="bg02"></dd>
                    <dd class="bg01"></dd>
                </dl>
                <dl
                        @if($refund->status == 6)
                        class="current"
                        @endif
                >
                    <dt>退款完成</dt>
                    <dd class="bg"><font>3</font></dd>
                    <dd class="bg02"></dd>
                    <dd class="bg01"></dd>
                </dl>

            </div>

        </div>

        <div class="table_div">
            <div class="order-pic">
                <table cellpadding="0" cellspacing="0" class="order_tab">
                    <tbody>
                    <tr>
                        <th colspan="2">
                            <stong>订单信息</stong>
                        </th>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <dl>
                                <dt><a href="##" target="_blank">
                                        <img src="{{getImgSize( 'goods', $orderItem->product_id, $orderItem->product->small_image ) }}"
                                             class="goods-thumb" width="60" height="60"></a></dt>
                                <dd>
                                    <a href="##" target="_blank"> {{$orderItem->product_name}}</a></dd>
                            </dl>
                        </td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">单价{{$orderItem->price}}元</td>
                        <td>{{$orderItem->price}}元 X{{$orderItem->num}}(数量)</td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">小计</td>
                        <td>{{$orderItem->row_total}}元</td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">物流</td>
                        <td><font>{{$orderItem->shipping_id}}</font></td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">订单编号</td>
                        <td><font>{{$orderInfo->order_sn}}</font></td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">运费</td>
                        <td>¥{{$orderInfo->shipping_amount}}</td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">总优惠</td>
                        <td>¥{{$orderInfo->total_amount - $orderInfo->pay_amount}}</td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">总计</td>
                        <td><span>{{$orderInfo->pay_amount}}</span></td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">成交时间</td>
                        <td>{{$orderInfo->created_at}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>

            <div class="order-an02">

                @if($refund->status >= 2 && $refund->status < 6)
                <div class="pingtai">
                    <font class="iconfont">&#xe608;</font>

                    <?php
                    switch ($refund->status) {
                        case 1:
                            echo "未确认";
                            break;

                        case 2:
                            if ($refund->type == 1) {
                                echo "已经安排退款";
                            } elseif ($refund->type == 2) {
                                echo "已经确认";

                            }
                            break;

                        case 3:
                            echo "未发货";
                            break;
                        case 4:
                            echo "运输中";
                            break;

                        case 5:
                            echo "已收货";
                            break;
                        case 6:
                            echo "退款";
                            break;
                    }
                    ?>


                </div>
                @elseif($refund->status == 6)
                <div class="pingtai">
                    <font class="iconfont">&#xe604;</font>已经完成退款处理！
                </div>
                    @endif

            </div>

        </div>
    </div>


@stop
@section('js')
    <script type="text/javascript" src="{{asset('js/public/location_pick/location_pick.js')}}"></script>
@stop