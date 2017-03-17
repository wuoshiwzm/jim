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
					<a href="/admin/deliver/gone" class="btn btn-warning click-loading">
                        <i class="iconfont"></i>
                        返回发货列表
                    </a>
				</span>
                    </h5>

                </div>
            </div>
        </div>

        <!--步骤-->
        <div class="order-step yundan_bg">

        </div>

        <!--订单详情信息-->
        <div class="order-info m-b-10">

            <!--运单信息-->
            <div class="order-details">
                <div class="title">订单信息</div>
                <div class="content content02">
                    {{--<dl class="on">--}}
                        {{--<dt>2016-09-30 07:59:54</dt>--}}
                        {{--<dd>京东配送员【孙玉璞】已出发，联系电话【15721956649或63691603，感谢您的耐心等待，参加评价还</dd>--}}
                    {{--</dl>--}}
                    @foreach($logistics_info->Traces as $Tace)
                        <dl class="on">
                            <dt>{{$Tace->AcceptTime}}</dt>
                            <dd>{{$Tace->AcceptStation}}</dd>
                        </dl>
                    @endforeach
                </div>
            </div>

            <!--订单信息-->
            <div class="order-details">
                <div class="title">订单信息</div>
                <div class="content">
                    <dl>
                        <dt>发货地址：</dt>
                        <dd>福建省泉州市安溪县 火车站工贸区新兴路193号伟邦大厦7楼</dd>
                    </dl>
                    <dl>
                        <dt>收货地址：</dt>
                        <dd>陕西省西安市雁塔区  710065   李三  15852635266</dd>
                    </dl>
                    <dl>
                        <dt>运单号：</dt>
                        <dd>{{$item->shipping_id}}</dd>
                    </dl>
                    <dl>
                        <dt>物流公司：</dt>
                        <dd>顺丰快递</dd>
                    </dl>
                    <dl>
                        <dt>客服电话：</dt>
                        <dd>02169777888</dd>
                    </dl>
                </div>
            </div>
        </div>
        <!--商品信息-->
    </div>
@stop