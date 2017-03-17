@section('title')
    全部收藏
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
            <h2>我的收藏</h2>
        </div>
        <!--订单切换-->
        <div class="table_div">
            @include('member.public.collect_nav')
            <div class="table_div_hd table_div_hd_table">

                <div class="soucang">
                    @foreach($collects as $collect)
                        <dl>
                            <dt><a href="/{{$collect->entity_id}}.html">
                                    <img src="{{ getImgSize( 'goods', $collect->entity_id, $collect->product->small_image ) }}"/></a>
                            </dt>
                            <dd class="c_dd">
                                <a href="##">{{$collect->entity_name}}</a></dd>
                            @if(!$collect->is_show)
                                <dd class="c_can">
                                    <font class="font01 ">
                                        <span class="iconfont">&#xe602;</span>
                                        已失效</font>
                                </dd>
                            @endif
                        </dl>
                    @endforeach
                </div>
                <div id="paging">
                    @include('member.public.page',array('data'=>$collects,'set'=>$set))
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')

@stop