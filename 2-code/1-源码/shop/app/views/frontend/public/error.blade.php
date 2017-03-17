@extends('layouts.frontend')
@section('title')您所访问的页面不存在@stop
@section('categoryCss','banner_nav02')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{asset('css/frontend/order.css')}}">
@stop
@section('content')
    <div class="shopping">
        <div class="shopping_nei shop_404" >
            <div class="shopping_nei_order">
                <!--完成订单提示-->
                <div class="table_div_h table_div_h02">
                    <dl class="table_ok">
                        <dt>抱歉您访问的页面不存在，请访问其他页面！</dt>
                        <dd><a href="/">返回首页</a><a href="/member">会员中心</a></dd>
                        <dd class="ok_t"><font>5</font>秒后自动跳转到首页</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer_js')
    <script>
        function countDown( maxtime  )
        {
            var timer = setInterval(function()
            {
                if( maxtime >=0 )
                {
                    second = Math.floor( maxtime % 60); //计算秒
                    $(".ok_t").find('font').html( second );
                    --maxtime;
                }
                else
                {
                    clearInterval( timer );
                    location.href = '/';
                }
            }, 1000);
        }
        countDown(5);
    </script>
@stop