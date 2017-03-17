@if(isset($orders))
    @foreach($orders as $order)
        @if($order->item->count() > 0)
            <table cellpadding="0" cellspacing="0" class="order_tab">
                <tr>
                    <td colspan="7" class="order_ding">
                            <span>订单编号：
                                    <a href="/member/order/detail/{{$order->id}}">{{$order->order_sn}}</a>
                            </span>
                        <span>下单时间：{{$order->created_at}}</span>
                        <span>订单来源：
                            @if($order->source == 1)PC端@elseif($order->source == 2)手机端@endif
                            </span>
                        <span>订单金额：{{$order->total_amount}}</span>
                        <span>优惠金额：<font>{{$order->cost_freight}}</font></span>
                        <span>订单状态：
                            <?php
                            switch ($order->status) {
                                case(1):
                                    echo '待付款';
                                    break;
                                case(2):
                                    echo '已取消订单';
                                    break;
                                case(3):
                                    echo '无效订单';
                                    break;
                                case(4):
                                    echo '已付款,待发货';
                                    break;
                                case(5):
                                    echo '运输中,待收货';
                                    break;
                                case(6):
                                    echo '部分商品已完成';
                                    break;
                                case(7):
                                    echo '完成';
                                    break;
                                case(8):
                                    echo '退款退货';
                                    break;
                                case(9):
                                    echo '退款完成';
                                    break;
                            }
                            ?>
                                    </span>
                    </td>
                </tr>

                @foreach($order->item as $k=>$item)
                    {{--运输中--}}
                    <tr>
                        <td>
                            <dl>
                                <dt>
                                    <a href="javascript:void (0)" target="_blank">
                                        <img src="{{ getImgSize( 'goods', $item->product_id, $item->product->small_image ) }}"
                                             class="goods-thumb" width="60" height="60">
                                    </a>
                                </dt>
                                <dd>
                                    <a href="javascript:void (0)" target="_blank">
                                        {{$item->product_name}}
                                    </a>
                                </dd>
                            </dl>
                        </td>
                        <td width="10%">{{$item->price}}</td>
                        <td width="8%">{{$item->num}}</td>
                        <td width="12%">
                            {{--商品运输状态 1 未发货 2运输中 3 已收货--}}
                            <?php
                            switch ($item->shipping_status) {
                                case 1:
                                    echo '未发货';
                                    break;
                                case 2:
                                    echo '运输中';
                                    echo "<br><a target='_blank' href=" . url('member/order/shipping/' . $item->id) . " class='wl'>查看物流</a>";
                                    break;
                                case 3:
                                    echo '已收货';
                                    break;
                            }
                            ?>
                        </td>
                        {{--操作--}}
                        <td width="16%" class="operation">

                            @if($item->shipping_status == 3 && $order->pay_status == 3 )
                                {{--评论--}}
                                @if($item->review->count()&&!$item->refund->count())
                                    <a href="{{url('member/review')}}" class="wl">已评论</a>
                                @elseif(!$item->refund->count())
                                    <a href="{{url('member/review/apply_review/' .encode($order->id).'/'.encode($item->id))}}"
                                       class="wl">评价</a>
                                @endif

                                {{--投诉--}}
                                @if($item->refund->count())
                                    <a href="{{url('member/refund')}}">已退货</a>
                                @else
                                    <a href="{{url('member/refund/apply_refund/' .encode($order->id).'/'.encode($item->id))}}"
                                       class="margin_top">退货</a>
                                @endif

                                {{--投诉--}}
                                @if($item->feedback->count())
                                    <a href="{{url('member/feedback')}}">已投诉</a>
                                @elseif(!$item->refund->count())
                                    <a href="{{url('member/feedback/apply_feedback/'.encode($order->id).'/'.encode($item->id))}}"
                                       class="margin_top">投诉</a>
                                @endif
                            @endif

                            {{--已经付款 没有收货--}}
                            @if($order->pay_status == 3 && $item->shipping_status!=3)

                                @if($item->refund()->count()&& $item->shipping_status ==1)
                                    <a href="{{url('member/refund')}}">已退款</a>
                                @elseif($item->refund()->count()&& $item->shipping_status ==2 )
                                    <a href="{{url('member/refund')}}">已退货 </a>
                                @endif

                           {{--待发货--}}
                            @elseif($order->status ==4 )
                                @if($item->refund()->count()&& $item->shipping_status ==1)
                                    <a href="{{url('member/refund')}}">已退款</a>
                                @else
                                    <a href="{{url('member/refund/apply_refund/'.encode($order->id).'/'.encode($item->id))}}">退款</a>
                                @endif
                            @elseif($order->status ==5 )
                                @if($item->refund()->count()&& $item->shipping_status ==1)
                                    <a href="{{url('member/refund')}}">已退货</a>
                                @else
                                    <a href="{{url('member/refund/apply_refund/'.encode($order->id).'/'.encode($item->id))}}">退货</a>
                                @endif
                            @endif

                            @if($item->shipping_status ==2 && !$item->refund()->count())
                                <a href="javascript:void(0)" class="margin_top02"
                                   onclick="receive('{{encode($item->id)}}','{{encode($item->id)}}')">确认收货</a>
                            @endif
                            {{--@endif--}}


                        </td>

                        <td width="16%"><font class="price_y"></font>{{$item->row_total}}</td>
                        @if($k === 0)
                            <td width="14%" class="operation" rowspan="{{$order->item->count()}}">
                                <a href="{{url('member/order/detail/'.$order->id)}}">详情</a>
                                {{--如果未付款 可以删除订单--}}
                                @if($order->status == 1)
                                    <a href="javascript:void(0)" onclick="deleOrder({{"'".encode($order->id)."'"}})">取消订单</a>
                                @endif
                                {{--没有付款--}}
                                @if($order->pay_status == 1 || $order->pay_status == 2)
                                    <a href="/member/order/pay?order_id={{encode($order->id)}}" class="margin_top">去付款</a>
                                @endif
                            </td>

                        @endif
                    </tr>
                @endforeach
            </table>
        @endif
    @endforeach
@endif