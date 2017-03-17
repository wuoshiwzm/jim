@section("title")
    商品订单 - 物流详情
@stop
@section("admincss")
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/jquery.mCustomScrollbar.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
@stop
@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">商品订单 - 物流详情</span>
                    </h3>

                    <h5>
				<span class="action-span">
					<a href="javascript:void(0)" onClick="history.back(-1)" class="btn btn-warning click-loading">
                        <i class="iconfont"></i>
                        返回
                    </a>
				</span>
                    </h5>

                </div>
            </div>
        </div>

        <!--订单详情信息-->
        <div class="order-info m-b-10">

            <!--运单信息-->
            <div class="order-details">
                <div class="title">物流信息</div>
                <div class="content content02">
                    @if(count($logistics_info)>0)
                            @foreach($logistics_info as $key => $Tace)
                                @if($key==0)
                                        <dl class="on">
                                            <dt>{{$Tace->AcceptTime}}</dt>
                                            <dd>{{$Tace->AcceptStation}}</dd>
                                        </dl>
                                    @else
                                        <dl>
                                            <dt>{{$Tace->AcceptTime}}</dt>
                                            <dd>{{$Tace->AcceptStation}}</dd>
                                        </dl>
                                @endif
                            @endforeach
                        @else
                        <dl class="on">
                            <dt>暂无物流信息</dt>
                        </dl>
                    @endif
                </div>
            </div>

            <!--订单信息-->
            <div class="order-details">
                <div class="title">订单信息</div>
                <div class="content">
                    <dl>
                        <dt>发货地址：</dt>
                        <dd>
                            {{isset($item->mendian->productToProvince->province)?$item->mendian->productToProvince->province:''}}
                            {{isset($item->mendian->productToCity->city)?$item->mendian->productToCity->city:''}}
                            {{isset($item->mendian->address)?$item->mendian->address:''}}</dd>
                    </dl>
                    <dl>
                        <dt>收货地址：</dt>
                        <dd>
                            {{isset($item->order->ship_addr)?$item->order->ship_addr:''}}
                            {{isset($item->order->ship_post)?$item->order->ship_post:''}}
                            {{isset($item->order->ship_name)?$item->order->ship_name:''}}
                            {{isset($item->order->ship_phone)?$item->order->ship_phone:''}}
                        </dd>
                    </dl>
                    <dl>
                        <dt>运单号：</dt>
                        <dd>{{$item->shipping_id}}</dd>
                    </dl>
                    <dl>
                        <dt>物流公司：</dt>
                        <dd>{{isset($item->shipper->shipping_name)?$item->shipper->shipping_name:''}}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <!--商品信息-->
    </div>
@stop