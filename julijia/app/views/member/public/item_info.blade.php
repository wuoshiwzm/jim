
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
                        <dt>
                            <a href="/{{$orderItem->product_id}}.html" target="_blank">
                                <img src="{{ getImgSize( 'goods', $orderItem->product_id, isset($orderItem->product->small_image)?$orderItem->product->small_image:'' )}}" class="goods-thumb" width="60" height="60">
                            </a>
                        </dt>
                        <dd>
                            <a href="/{{$orderItem->product_id}}.html" target="_blank">
                                {{$orderItem->product_name}}</a>
                        </dd>
                    </dl>
                </td>
            </tr>

            <tr>
                <td class="order_tab_td">单价(元)</td>
                <td>{{$orderItem->price}}元 X{{$orderItem->num}}(数量)</td>
            </tr>

            <tr>
                <td class="order_tab_td">小计</td>
                <td>{{$orderItem->row_total}}元</td>
            </tr>

            <tr>
                <td class="order_tab_td">物流</td>
                <td><font>{{$orderItem->shipping_id?$orderItem->shipping_id:'无物流信息'}}</font></td>
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
            <tr>
                <td class="order_tab_td">付款时间</td>
                <td>{{isset($orderInfo->pay->payment_time)?$orderInfo->pay->payment_time:''}}</td>
            </tr>

            </tbody>
        </table>

    </div>