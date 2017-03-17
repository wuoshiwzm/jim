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
                            <tr>
                                <th width="3%"></th>
                                <th>商品信息</th>
                                <th width="12%">价格(元)</th>
                                <th width="8%">商品数量</th>
                                <th width="12%">金额(元)</th>
                                <th width="14%">操作</th>
                            </tr>
                            @foreach($items as $item)
                                <tr>
                                    <td><input type="checkbox" class="item_checkbox" width="30" name="item[]"
                                               value="{{encode($item->product_id)}}" checked="checked">
                                        <input type="hidden" value="{{encode($item->id)}}" name="rowId" class="rowId">
                                    </td>
                                    <td class="padding_left">
                                        <dl>
                                            <dt><a href="{{url($item->product_id.'.html')}}" target="_blank">
                                                    <img src="{{getImagesUrl('goods',$item->product_id,$item->product->small_image)}}">
                                                    width="60" height="60"></a></dt>
                                            <dd><a href="##" target="_blank">{{$item->product_name}}</a>
                                            </dd>
                                            <dd class="order_tab_color">
                                                @if(isset($item->guige))
                                                    @foreach (json_decode(stripslashes($item->guige)) as $name=>$guige)
                                                        {{$name}}:{{$guige}}
                                                        <br>
                                                    @endforeach
                                                @endif
                                            </dd>
                                        </dl>
                                    </td>
                                    <td>
                                        ¥ <font class="price_y">{{$item->price}}</font><br>¥ {{$item->price}}
                                    </td>
                                    <td>
                                        <input type="number" name="number" lay-verify="number"
                                               class="layui-input" class="itemNum" id="itemNum"
                                               onchange="changeQuantity(this, {{"'".encode($item->id)."'"}})"
                                               placeholder="" value="{{$item->num}}">
                                    </td>
                                    <td>¥<font class="price"> 0</font></td>
                                    <td class="operation ">
                                        <a href="##" class="dele_d"
                                           onclick="delItem({{"'".encode($item->id)."'"}})">删除</a>
                                        <a href="##" class="margin_top"
                                           onclick="collect({{"'".encode($item->id)."'"}})">移入收藏夹</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td><input type="checkbox" class="checkbox_checkall" width="30" checked="checked"></td>
                                <td colspan="5" class="quan padding_left">
                                    <a href="##">全选</a><a href="##" onclick="multiDelItem()">删除选中的商品</a>
                                    <a href="##" onclick="multiCollect()">移入收藏夹</a>
                                </td>
                            </tr>
                        </table>
                        <div class="jiesuan">

                            <div class="jiesuan_left">
                                <dl>
                                    <dt><a href="##" target="_blank">
                                            <img src="{{asset('images/frontend/yhq.jpg')}}"
                                                 width="80" height="80"></a></dt>
                                    <dd class="order_btn">
                                        <input type="text" name="coupon" class="coupon layui-input"
                                               autocomplete="off"   placeholder="请输入优惠码"></dd>
                                    <dd>
                                        <button class="layui-btn layui-btn-primary">使用</button>
                                    </dd>
                                </dl>
                            </div>
                            <div class="jiesuan_center">支付的商品<br><font><span id="Pics">2</span></font>件</div>
                            <div class="jiesuan_btn">
                                <button class="layui-btn layui-btn-danger jieshuan">结 算</button>
                            </div>

                            <div class="jiesuan_right">
                                <ul>
                                    <li class="jiesuan_right_li">
                                        <span>应付总额:&nbsp;&nbsp;¥</span><i><span id="pay"></span>

                                            </i>
                                    </li>
                                    <li><span>商品总价：&nbsp;&nbsp;¥</span> <span id="total">{{$total}}</span>

                                    </li>
                                    <li>
                                        <span>优&nbsp;&nbsp;惠&nbsp;&nbsp;额：-&nbsp;¥</span> <span id="discount"></span>
                                    </li>
                                    <li>
                                        <span>优惠信息：</span><span id="discount_info"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
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