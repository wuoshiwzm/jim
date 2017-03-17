@section("title")
    发货单
@stop
@section("admincss")
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/jquery.mCustomScrollbar.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('js/public/layer/skin/layer.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
@stop
@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">商品订单 - 发货单</span>
                    </h3>

                    <h5>
				<span class="action-span">
					<a href="{{url("/admin/order/waiting")}}" class="btn btn-warning click-loading">
                        <i class="iconfont"></i>
                        返回订单列表
                    </a>
				</span>
                    </h5>

                </div>
            </div>
        </div>
        <!--步骤-->
        <div class="order-step hair">
        </div>
        <!--订单详情信息-->
        <div class="order-info m-b-10">
            <div class="order-details">
                <div class="title">确认收货人信息，以及订单信息</div>
                <div class="content">
                    <dl>
                        <dd>订单编号：{{$data->order_sn}} &nbsp;&nbsp;&nbsp;
                            下单时间：{{$data->created_at}}&nbsp;&nbsp;&nbsp;
                            支付时间：{{$data->pay->payment_time}}&nbsp;&nbsp;&nbsp;
                            订单来源:
                            @if($data->source == 1)
                                PC
                            @elseif($data->source == 2)
                                WAP
                            @endif站</dd>
                    </dl>
                    <br>
                    <dl>
                        <dd>买家收货信息</dd>
                        <dd>{{$data->ship_name}}&nbsp;&nbsp;{{$data->ship_phone}}&nbsp;&nbsp;&nbsp;{{$data->ship_post}}&nbsp;&nbsp;&nbsp;{{$data->ship_addr}}</dd>
                        <dd>{{$data->ship_time}}</dd>
                    </dl>
                </div>
            </div>
        {{--    <div class="order-details">
                <div class="title">发货人信息</div>
                <div class="content">
                    <dl>
                        <dd>西安市高新区高科广场&nbsp;&nbsp;&nbsp;刘广成&nbsp;&nbsp;&nbsp;152952635241&nbsp;&nbsp;&nbsp;710065  </dd>
                    </dl>
                </div>
            </div>--}}

        </div>
        <!--商品信息-->
        <div class="table-responsive deliver">
            <table class="table">
                <thead>
                <tr>
                    <th class="tcheck ">
                        @if (! $flag)
                            <input class="table-list-checkbox-all" title="全选/全不选" type="checkbox">
                        @endif
                    </th>

                    <th colspan="5">
                        订单编号：{{$data->order_sn}}&nbsp;&nbsp;&nbsp;&nbsp;
                        下单时间：{{$data->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;
                        订单来源:@if($data->source == 1) PC @elseif($data->source== 2) WAP @endif站&nbsp;&nbsp;&nbsp;&nbsp;
                        订单状态：等待发货
                    </th>
                </tr>
                </thead>
                <tbody>
                <!--订单内容-->
                @foreach($data->item as $row)
                    <tr class="order-item">
                        <td class="tcheck">
                            @if($row->shipping_status == 1)
                                <input class="checkBox table-list-checkbox" data-item="{{$row->id}}" type="checkbox">
                            @endif
                        </td>
                        <td class="item" width="30%">
                            <div class="pic-info">
                                <a href="##" class="goods-thumb" title=" {{$row->product_name}}" target="_blank">
                                    <img src="{{ getImgSize( 'goods', $row->product_id, $row->product->small_image ) }}" alt=" {{$row->product_name}}">
                                </a>
                            </div>
                            <div class="txt-info">
                                <div class="desc">
                                    <a class="goods-name" href="##" target="_blank" title="查看商品详情">
                                        {{$row->product_name}}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="price" width="10%">￥{{$row->price}} </td>
                        <td class="num" width="10%">{{$row->num}}</td>
                        <td class="" sumrows="1" rowspan="1">
                            @if($row->shipping_status == 1)
                                未发货
                            @elseif($row->shipping_status == 2)
                                已发货<br>
                                <a href="{{url("/admin/order/ems?".http_build_query(["l_id" =>$row->shipping_id,'item_id'=>$row->id]))}}". class="yundan"><font>运单</font>{{$row->shipping_id}}</a>
                            @elseif($row->shipping_status == 3)
                                已收货
                            @endif

                        </td>
                        <td class="handle" sumrows="1" rowspan="1">
                            <div class="ng-binding">
                        <span class="text-c">
                            @if($row->shipping_status == 1)
                                <a href="javascript:void(0)" class="fa" data-item="{{$row->id}}"  >发货</a>
                            @endif
                        </span>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if(! $flag)
                    <tr class="order-item">
                        <td colspan="6">
                            <span class="btn btn-primary batch_fa" style="color:#fff;">发货</span>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
@section("footer_js")
    <script type="text/javascript" src="{{url("js/admin/jquery.js")}}"></script>
    <script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{url('js/admin/order/deliverPage.js')}}"></script>
    <script>
        function  fresh() {
            window.location.reload();
        }
    </script>
@stop

