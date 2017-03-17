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
        <!--个人信息和快捷方式-->
        <div class="ge_xin">
            <div class="ge_tou">
                <dl class="ge_tou_xx">
                    <dt class="">
                        <img onclick="getImgTemplet( this,'user' )"
                             src="{{isset($userinfo->header)?$userinfo->header:'/images/member/tou.png'}}"
                             width="80"
                             height="80">
                        <br><font>修改头像</font>
                    </dt>

                    <dd class="dd_h">{{Session::get('member')->alias}}</dd>
                    <dd class="dd_dd"><font>{{Session::get('member')->name}}</font></dd>
                    <dd class="dd_dd01"><i>
                            <a href="/member/config/address">我的收货地址</a></i><br/><i>
                            <a href="/member/collect">我的收藏</a></i></dd>
                </dl>
            </div>
            <div class="admin_fabu">
                <ul>
                    <li>
                        <a href="{{url('member/order/topay')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li01.png')}}"/></dt>
                                <dd>待付款
                                    <font>{{$numToPay}}</font></dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('member/order/toship')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li02.png')}}"/></dt>
                                <dd>待发货
                                    <font>{{$numToShip}}</font></dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('member/order/toreceive')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li03.png')}}"/></dt>
                                <dd>待收货
                                    <font>{{$numToReceive}}</font></dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('member/order/tocomment')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li04.png')}}"/></dt>
                                <dd>待评价
                                    <font>{{$numToReview}}</font></dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('member/feedback')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li05.png')}}"/></dt>
                                <dd>退款维权
                                    <font>


                                        @if(Session::get('member')->refund()->count())
                                            {{Session::get('member')->refund()->count()}}
                                        @else
                                            0
                                        @endif
                                    </font></dd>
                            </dl>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="ge_xin02">
            <h2>我的物流</h2>
            <div class="ge_tou">
                @if($numToReceive)
                    @foreach($items as $item)
                        <dl class="ge_tou_xx">
                            {{$item->product_name}}
                            <dt class="qie_img_img">
                                <a href="##">
                                    <img src="{{ getImgSize( 'goods', $item->product->entity_id, $item->product->small_image)}}"/>
                                </a>
                            </dt>
                            <dd class="dd_h">{{$item['shipping_station']}}</dd>
                            <dd class="dd_dd01">{{$item['shipping_time']}}<i><a href="##">查看物流信息</a></i></dd>
                        </dl>
                        <a href="##" class="ge_tou_a" onclick="receive({{"'".encode($item->id)."'"}})">确认收货</a>

                    @endforeach
                    @else
                    无物流信息
                @endif

            </div>
        </div>

        <div class="collection">
            <h2>我的浏览，我的喜欢</h2>
            <div>


                @if(count($goods))
                    @foreach($goods as $visit)

                        <dl>
                            <dt><a href="{{url('$visit->vs_value')}}"><img
                                            src="{{ getImgSize( 'goods', $visit->vs_value, $visit->small_image )}} "/></a>
                            </dt>

                            {{--<dd class="c_dd"><a href="##">{{$visit->product->name}}</a></dd>
                            <dd class="c_can">
                                <span><font class="font01">￥{{$visit->product->preferential_price}}</font><br><font
                                            class="font02">￥{{$visit->product->cost_price}}</font></span><i><a
                                            href="##"><font class="iconfont">
                                            &#xe629;</font></a></i></dd>--}}
                        </dl>
                    @endforeach

                @else
                    <p style="margin-left: 15px">没有浏览记录</p>
                @endif

            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript" src="{{asset('js/member/member.js')}}"></script>
    <script>
        function getImgTemplet( index, id )
        {
            layer.open({
                type: 2,
                title:false,
                shadeClose: true,
                shade: 0.8,
                area: ['460px', '480px'],
                content: ['/admin/get/imgtemplet/'+id,'no']
            });
        }
    </script>
@stop