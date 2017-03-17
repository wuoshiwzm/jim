@section('title')
    我的足迹
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
            <h2>我的足迹</h2>
        </div>
        <!--订单切换-->
        <div class="table_div">
            <div class="table_div_hd table_div_hd_table">


                <div class="soucang">
                    @if(!empty($data))
                        @foreach($data as $visit)
                            @if($visit->product)
                                <dl>
                                    <dt>
                                        <a  target="_blank" href="{{$visit->vs_value}}">
                                            <img src="{{ getImgSize( 'goods', $visit->vs_value, isset($visit->product->small_image)?$visit->product->small_image:'' )}} "/>
                                        </a>
                                    </dt>
                                    <dd class="c_dd"><a target="_blank" href="/{{$visit->vs_value}}.html">{{$visit->product->name}}</a></dd>
                                    <dd class="c_can">
                                        @if(time()<strtotime($visit->product->price_end) && time()>strtotime($visit->product->price_start))
                                            <span>
                                                <font class="font01">￥{{$visit->product->preferential_price}}</font><br>
                                                <font class="font02">￥{{$visit->product->price}}</font></span>
                                        @else
                                            {{--不在优惠期内， 使用 price 普通 价格--}}
                                            <span><font class="font02">￥{{$visit->product->price}}</font></span>
                                        @endif
                                            <i>
                                                <a href="javascript:void(0)">
                                                    <font class="iconfont">&#xe629;</font></a>
                                            </i>
                                    </dd>
                                </dl>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div id="paging">
                    @include('member.public.page',array('data'=>$data,'set'=>$set))
                </div>


            </div>
        </div>
    </div>
@stop
@section('js')

@stop