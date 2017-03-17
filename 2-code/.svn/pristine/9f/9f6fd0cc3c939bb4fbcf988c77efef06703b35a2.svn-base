@include('frontend.public.seo',array('seo'=>$seo))
@section('categoryCss','banner_nav02')
@section('content')
    <!--检索选择-->
    @include('frontend.list.choose',array('brand'=>$brand,'url'=>$name,'leavel'=>$categoryLeavel,'screen'=>$screen,'selected'=>$selected,'categoryName'=>$categoryName))
    <!--产品显示部分-->
    <div class="chanpin_llist">
        <div class="chanpin_auto">
            <!--产品-->
            @include('frontend.list.goods',array('data'=>$data,'screen'=>$screen))
            <!--推荐-->
            {{--@include('frontend.list.recommend',array('recommend'=>''))--}}
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