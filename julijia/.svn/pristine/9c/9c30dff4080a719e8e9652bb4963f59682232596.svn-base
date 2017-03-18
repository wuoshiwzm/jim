@include('frontend.public.seo',array('seo'=>$seo))
@section('categoryCss','banner_nav02')
@section('content')
    <!--检索选择-->
    <div class="banner_list">
        <div class="area_shu">
            <p><a href="{{url('/')}}">首页</a><span>&gt;</span>商品搜索_{{$keyword}}</p>
        </div>
    </div>
    <!--产品显示部分-->
    <div class="chanpin_llist">
        <div class="chanpin_auto">
            <!--产品-->
            @include('frontend.list.searchgoods',array('data'=>$data))
            <!--推荐-->
            @include('frontend.list.recommend',array('recommend'=>''))
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