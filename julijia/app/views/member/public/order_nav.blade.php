<div class="table_div_hd">
    <ul class="layui-nav">
        <li class="layui-nav-item
            @if(exiturl('all'))layui-this @endif"
        ><a href="{{url('member/order/all')}}">全部订单&nbsp;(&nbsp;{{$numOrders}}&nbsp;)</a>
        </li>
        <li class="layui-nav-item
            @if(exiturl('topay'))layui-this  @endif"
        ><a href="{{url('member/order/topay')}}">等待付款&nbsp;(&nbsp;{{$numToPay}}&nbsp;)</a>
        </li>
        <li class="layui-nav-item
            @if(exiturl('toship'))layui-this @endif"
        ><a href="{{url('member/order/toship')}}">等待发货&nbsp;(&nbsp;{{$numToShip}}&nbsp;)</a>
        </li>
        <li class="layui-nav-item
            @if(exiturl('toreceive'))layui-this @endif"
        ><a href="{{url('member/order/toreceive')}}">待收货&nbsp;(&nbsp;{{$numToReceive}}&nbsp;)</a>
        </li>
        <li class="layui-nav-item
            @if(exiturl('tocomment'))layui-this @endif"
        ><a href="{{url('member/order/tocomment')}}">待评价({{$numToReview}}&nbsp;)</a></li>
    </ul>
</div>