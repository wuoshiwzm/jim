@section('css')
    <link type="text/css" rel="stylesheet" href="{{asset('css/member/admin.css')}}">
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
            <h2>我的订单&nbsp;&nbsp;-&nbsp;&nbsp;<font>物流查看</font></h2>
        </div>


        <div class="table_div">
            <div class="order-pic">
                <table cellpadding="0" cellspacing="0" class="order_tab">
                    <tbody>

                    <tr>
                        <td class="order_tab_td">物流编号</td>
                        <td>{{$item->shipping_m_code}}</td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">物流公司</td>
                        <td>{{$companyName}}</td>
                    </tr>

                    <tr>
                        <td class="order_tab_td">运单号码</td>
                        <td><font>{{isset($item->shipping_id)?$item->shipping_id:'无运单信息'}}</font></td>
                    </tr>

                    </tbody>
                </table>

            </div>

            <div class="order-an02">
                <div class="layui-tab">
                    <h4>物流动态信息</h4>
                    <div class="content content02">
                            @if(isset($item->ShippingDetail()->first()->id))
                                @foreach( $item->ShippingDetail()->orderBy('id','desc')->get()  as $key=> $v)
                                    @if($key ==0 )
                                    <dl class="on">
                                         <dt>{{$v->AcceptTime}}</dt>
                                         <dd>{{$v->AcceptStation}}</dd>
                                     </dl>
                                    @else
                                    <dl>
                                        <dt>{{$v->AcceptTime}}</dt>
                                        <dd>{{$v->AcceptStation}}</dd>
                                    </dl>
                                    @endif
                                @endforeach
                            @else
                            <dl class="on">
                                暂无物流信息
                            </dl>
                        @endif

                    </div>

                    <div class="clear"></div>
                    <br/>


                    <h4>宝贝信息</h4>

                    <div class="table_div_hd">
                        <table cellpadding="0" cellspacing="0" class="order_tab">
                            <tbody>
                            <tr>
                                <td colspan="7" class="order_ding">
                                    <span>订单编号：<a href="#">{{$item->order->order_sn}}</a></span>
                                    <span>下单时间：{{$item->order->created_at}}</span>
                                    <span>订单状态：

                                        <?php
                                        switch ($item->order->status) {

                                            case 1:
                                                echo "待付款";
//                                        echo "<dd><a target='_blank' href=".url(encode('test'))." class='btn'>评价</a></dd>";
                                                break;

                                            case 2:
                                                echo "已取消";
                                                break;


                                            case 3:
                                                echo "无效";
                                                break;


                                            case 4:
                                                echo "待发货";
                                                break;


                                            case 5:
                                                echo "待收货";
                                                break;


                                            case 6:
                                                echo "部分完成";
                                                break;


                                            case 7:
                                                echo "完成";
                                                break;

                                        }
                                        ?>

                                            </span></td>
                            </tr>

                            <tr>
                                <td>
                                    <dl>
                                        <dt><a href="##" target="_blank">
                                                <img src="{{ getImgSize( 'goods', isset($item->product->product_id)?$item->product->product_id:'', isset($item->product->small_image)?$item->product->small_image:"" )}} "
                                                     class="goods-thumb" width="60" height="60">
                                            </a></dt>
                                        <dd style="width:300px !important; ">
                                            <a href="##" target="_blank">{{$item->product_name}}</a></dd>
                                    </dl>
                                </td>
                                <td width="6%">{{$item->num}}</td>
                                <td width="16%">￥{{$item->row_total}}</td>
                                <td width="14%" class="operation order_boder"><a
                                            href="{{url('member/order/detail/'.encode($item->order->id))}}">详情</a></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="adress">
                            <dl>
                                <dt>收货信息</dt>

                                <dd>{{$item->order->ship_addr}}</dd>
                            </dl>
                            <dl>
                                <dt>发货信息</dt>
                                <dd>
                                    {{isset($item->mendian->productToProvince->province)?$item->mendian->productToProvince->province:''}}
                                    {{isset($item->mendian->productToCity->city)?$item->mendian->productToCity->city:''}}
                                    {{isset($item->mendian->address)?$item->mendian->address:''}}
                                    {{isset($item->mendian->phone)?$item->mendian->phone:''}}</dd>
                                </dd>
                            </dl>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>






@stop