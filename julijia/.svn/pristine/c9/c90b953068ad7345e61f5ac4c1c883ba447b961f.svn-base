@section('title')首页@stop
@section('categoryCss','banner_nav')
@section('content')
   <!--banner-->
   @include('frontend.index.banner',array('banner'=>$banner))
   <!--限时抢购-->
   @include('frontend.index.flashsale',array('flashSale'=>$flashSale))
   <!--精品推荐-->
   @include('frontend.index.recommend',array('recommend'=>$recommend))
   <!--楼层数据-->
   @include('frontend.index.floor',array('floor'=>$floor))
@stop

@section('footer_js')
   <script type="text/javascript" src="{{url('js/frontend/index.js?v='.Config::get('tools.frontendJsTime'))}}"></script>
@stop