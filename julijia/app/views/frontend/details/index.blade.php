@include('frontend.public.seo',array('seo'=>$seo))
@section('categoryCss','banner_nav02')
@section('content')
<div class="g-main g-main_nei">
    <div class="house-list">
        <div class="m-area">
            <!--分享-->
             @include('frontend.details.partook',array('data'=>$data))
            <div class="details_pic">
                <!--图片-->
                @include('frontend.details.carousel',array('carousel'=>$carousel))
                <!--信息-->
                @include('frontend.details.info',array('data'=>$data,'attribute'=>$attribute,'freight'=>$freight))
            </div>
            <div class="clear"></div>
        </div>
        <div class="bottom_content">
            <!--中部导航-->
            @include('frontend.details.navigation')
            <!--推荐-->
            @include('frontend.details.recommend',array('recommend'=>$recommend))
            <!--信息展示-->
            @include('frontend.details.configinfo',array('configInfo'=>$configInfo))
            <!--产品详细信息-->
            @include('frontend.details.goodscontent',array('data'=>$data))
            <!--评论-->
            @include('frontend.details.comment',array('comment'=>$comment))
        </div>
    </div>
</div>
@stop
@section('footer_js')
    <script>
        var priceStr = {{$price}};
        jQuery(".dianping_ping").slide({trigger:"click"});
        jQuery(".bulid_ch").slide({trigger:"click"});
    </script>
    <script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
    <!--放大镜jquery库-->
    <script type="text/javascript" src="{{url('js/frontend/jquery.jqzoom.js')}}"></script>
    <script type="text/javascript" src="{{url('js/frontend/base.js')}}"></script>
    <script type="text/javascript" src="{{url('js/frontend/cityJson1.js')}}"></script>
    <script type="text/javascript" src="{{url('js/frontend/citySet.js')}}"></script>
    <script type="text/javascript" src="{{url('js/frontend/details.js?v='.Config::get('tools.frontendJsTime'))}}"></script>
    <script data="type=tools&amp;uid=6520365" id="bdshare_js" type="text/javascript" src="http://bdimg.share.baidu.com/static/js/bds_s_v2.js?cdnversion=398956"></script>
@stop