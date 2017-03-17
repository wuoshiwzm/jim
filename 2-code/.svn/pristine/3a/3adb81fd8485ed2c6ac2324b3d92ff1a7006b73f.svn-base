@section('title')微信支付@stop
@section('categoryCss','banner_nav02')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('css/frontend/order.css?v='.Config::get('tools.frontendCssTime'))}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/frontend/layui.css?v='.Config::get('tools.frontendCssTime'))}}">
@stop
@section('content')
    <div class="shopping">
        <div class="shopping_nei">
            <div class="shopping_nei_order">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <div class="table_div jiesuan_fu_fu">
                    <div class="jiesuan_fu ">
                        <h2>请您及时付款，以便订单尽快处理！ 订单号：{{$orderInfo->order_sn}}</h2>
                        <ul>
                            <li class="jiesuan_right_li"><span>应付总额:</span><font><i>¥&nbsp;{{$orderInfo->pay_amount}}</i></font></li>
                        </ul>
                        <div><span>寄送至：</span><span>{{$orderInfo->ship_name}}</span><span>{{$orderInfo->ship_addr}}</span><span>{{conversionPhone($orderInfo->ship_phone)}}</span></div>
                    </div>
                </div>
                <!--完成订单提示-->
                <div class="table_div_h weixin">
                    <dl class="table_ok">
                        <dt>微信支付
                            <span class="shijian">距离二维码过期还剩<font id="tiem"></font>秒，过期后请刷新页面重新获取二维码。</span>
                            <span class="guo" style="display:none">二维码已经过期<font><a href="javascript:;" onclick="Do({{"'".encode($orderInfo->order_sn)."'"}})">刷新</a></font>页面重新获取二维码。</span>
                        </dt>
                        <dd class="ok_img"><img src="http://paysdk.weixin.qq.com/example/qrcode.php?data={{urlencode($url)}}"></dd>
                    </dl>
                </div>
                <input type="hidden" id="order_sn" value="{{$orderInfo->order_sn}}"/>
            </div>
        </div>
    </div>
@stop
@section('footer_js')
    <script>
        function Do( orderid )
        {
            $.ajax({
                type: "post",
                url: "/weixin/geturl",
                data:{order_sn:orderid},
                success: function(msg)
                {
                    $(".ok_img").html( msg );
                    $(".guo").hide();
                    $(".shijian").show();
                    countDown();
                }
            });
        }
        function countDown()
        {
            var maxtime = 60;
            var timer = setInterval(function()
            {
                if( maxtime >=0 )
                {
                    var second = Math.floor( maxtime % 60);
                    $("#tiem").html( second?second:'' );
                    --maxtime;
                }
                else
                {
                    clearInterval( timer );
                    $(".guo").show();
                    $(".shijian").hide();
                }
            }, 1000);
        }
        countDown();

        setInterval(function(){
            var order_sn = $("#order_sn").val();
            $.get('/weixin/status/'+order_sn,function ( msg ) {
                if( msg.status == 3 )
                {
                    window.location.href = '/member/order/toship';
                }
            },'json');
        },3000);

    </script>
@stop