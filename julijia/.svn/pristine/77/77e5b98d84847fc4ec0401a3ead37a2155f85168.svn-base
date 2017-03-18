@section('title')
    全部收藏 - 失效
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
            <div class="table_div_hd">
                <ul class="layui-nav">
                    <li class="layui-nav-item"><a href="{{url('member/collect')}}">
                            全部宝贝&nbsp;(&nbsp;1&nbsp;)</a></li>
                    <li class="layui-nav-item layui-this"><a href="{{url('member/collect/notshow')}}">
                            失效&nbsp;(&nbsp;6&nbsp;)</a></li>
                    <li class="layui-nav-item"><a href="{{url('member/collect')}}">
                            网店宝贝&nbsp;(&nbsp;0&nbsp;)</a></li>
                </ul>
            </div>
            <div class="table_div_hd table_div_hd_table">

                <div class="soucang">
                    @foreach($collects as $collect)
                        <dl>
                            <dt><a href="/{{$collect->entity_id}}.html"><img src="{{$collect->pic}}"/></a></dt>
                            <dd class="c_dd"><a href="/{{$collect->entity_id}}.html">{{$collect->entity_name}}</a></dd>
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
                @include('member.public.page',array('data'=>$collects,'set'=>$set))
            </div>
        </div>
    </div>
@stop
@section('js')

@stop