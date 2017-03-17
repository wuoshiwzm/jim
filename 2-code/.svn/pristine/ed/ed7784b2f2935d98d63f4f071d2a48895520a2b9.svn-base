@section('title')
    购物车
@stop
@section('categoryCss','banner_nav02')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/order.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/layui.css')}}">
@stop
@section('content')


    <div class="shopping">
        <div class="shopping_nei">
            <div class="shopping_nei_order">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>

                <div class="table_div_h">
                    <h2>购物车</h2>
                </div>
                <!--订单切换-->
                <div class="table_div">
                    {{ Form::open(array('url' => 'goods/settlement', 'method'=>'post')) }}
                    <div class="table_div_hd table_div_hd_table">
                        <table border="0" cellpadding="0" cellspacing="0" class="order_tab">

                            <a href="{{url()}}"><h1>你还没有任何商品！ 快去购物吧！</h1></a>
                        </table>
                        <div class="jiesuan">



                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer_js')
    <script type="text/javascript" src="{{asset('js/member/layui.js')}}"></script>

    {{--购物车js--}}
    <script type="text/javascript" src="{{asset('js/member/member.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/member/cart.js')}}"></script>
    <script src="{{asset('js/member/layer-v1.9.3/layer/layer.js')}}"></script>

    <script>
        layui.use('element', function () {
            var element = layui.element(); //导航的hover效果、二级菜单等功能，需要依赖element模块
        });
    </script>
@stop