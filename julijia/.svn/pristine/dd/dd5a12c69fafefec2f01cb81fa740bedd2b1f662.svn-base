@include('frontend.public.seo',array('seo'=>$seo))
@section('categoryCss','banner_nav02')
@section('content')
    <!--检索选择-->
    <div class="banner_list">
        <div class="area_shu">
            <p><a href="{{url('/')}}">首页</a><span>&gt;</span>商品搜索_{{$keyword}}</p>
        </div>
        <div class="house-list01">
            <div class="m-area">
                @if( count($selected) )
                    <div id="restoirn">
                        <div class="detail_xz">
                            <div class="option_ddd">已筛选</div>
                            <ul class="nav_all">
                                @foreach( $selected as $check )
                                    <li>{{urldecode($check->title)}}<a href="{{$check->url}}" title="{{urldecode($check->title)}}"></a></li>
                                @endforeach
                            </ul>
                            <div class="option_xx"><a href="{{getScreenUrl( $screen['url'], false, false )}}">清空筛选</a></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--产品显示部分-->
    <div class="chanpin_llist">
        <div class="chanpin_auto">
            <!--产品-->
            @include('frontend.list.searchgoods',array('data'=>$data))
            <!--推荐-->
            @include('frontend.list.recommend',array('recommend'=>$recommend))
        </div>
    </div>
@stop
@section('friendshiplink')
    @if( isset($link))
        @foreach( $link as $k)
            <li><p><a href="{{$k->url}}" target="_blank" title="{{$k->title}}">{{$k->title}}</a></p></li>
        @endforeach
    @endif
@stop
@section('footer_js')
    <script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{url('js/frontend/list.js?v='.Config::get('tools.frontendJsTime'))}}"></script>
@stop