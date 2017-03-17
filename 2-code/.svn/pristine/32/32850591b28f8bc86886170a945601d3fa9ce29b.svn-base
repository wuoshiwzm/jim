@section('title')
    支付
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/order.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/layui.css')}}">



@stop


@section(('content'))

    <div class="shopping">
        <div class="shopping_nei">
            <div class="shopping_nei_order">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>

                <div class="table_div">
                    <div class="order-step02">
                        <!--完成步骤为dl添加current样式，完成操作内容后会显示完成时间-->
                        <dl class="current">
                            <dt>1.我的购物车</dt>
                            <dd class="bg"><font>1</font></dd>
                            <dd class="bg02"></dd>
                            <dd class="bg01"></dd>

                        </dl>
                        <dl class="current">
                            <dt>2.填写核对订单信息</dt>
                            <dd class="bg"><font>2</font></dd>
                            <dd class="bg02"></dd>
                            <dd class="bg01"></dd>
                        </dl>
                        <dl class="">
                            <dt>3.成功提交订单</dt>
                            <dd class="bg"><font>3</font></dd>
                            <dd class="bg02"></dd>
                            <dd class="bg01"></dd>
                        </dl>

                    </div>

                </div>
                <!--收货人-->
                <form class="layui-form" action="">
                    <div class="table_div_h">
                        <h2>收货人</h2><a href="Javascript:void(0)" class="add_adress add_adress_tt">新增收货地址</a>
                        <ul class="shou_huo">
                            @if(!empty($address))
                                @foreach($address as $add)
                                    <li>
                                        <input type="checkbox" name="like[write]" title="{{$add->name}}">
                                        <div>
                                            <span>{{$add->name}}</span>
                                            <span>{{$add->province}}</span><span>{{$add->city}}</span><span>{{$add->area}}</span>
                                            <span>{{$add->address}}</span><span>{{$add->name}}</span>
                                            @if($add->status == 1)
                                                <span class="bg_span">默认地址</span>
                                            @endif

                                            <a href="Javascript:void(0)"
                                               class="add_adress dele_d"
                                               onclick="delAddr({{"'".encode($add->id)."'"}})">删除</a>
                                            <a href="Javascript:void(0)"
                                               class="add_adress add_adress_tt">编辑</a>
                                            @if($add->status != 1)
                                                <a href="##" class="add_adress">设为默认地址</a>
                                            @endif

                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="shou_adress"><a href="Javascript:void(0)" class="shou_adress_top">收起地址</a></div>

                    </div>

                    <!--支付方式-->
                    <div class="table_div_h">
                        <h2>支付方式</h2>
                        <ul class="shou_zhifu">
                            <li class="zhifubao">
                                <input type="checkbox" name="like[write]" title="支付宝">
                            </li>
                            <li class="weixin">
                                <input type="checkbox" name="like[write]" title="微信">
                            </li>
                        </ul>

                    </div>
                    <!--送货清单-->
                    <div class="table_div table_div_h">
                        <h2>送货清单</h2>
                        <div class="table_div_hd table_div_hd_table">
                            <table border="0" cellpadding="0" cellspacing="0" class="order_tab">

                                <tr>
                                    <th>商品信息</th>
                                    <th width="12%">库存</th>
                                    <th width="8%">商品数量</th>
                                    <th width="12%">金额(元)</th>
                                </tr>


                                @if($order->item->count()>= 1)


                                    @foreach($order->item as $item)
                                        <tr>
                                            <td class="padding_left">
                                                <dl>
                                                    <dt><a href="##" target="_blank">
                                                            <img src="{{ getImgSize( 'goods', $item->product_id,$item->product->small_image )}}"
                                                                 class="goods-thumb" width="60" height="60">
                                                        </a></dt>
                                                    <dd><a href="##"
                                                           target="_blank">{{$item->product_name}}</a>
                                                    </dd>
                                                    <dd class="order_tab_color">
                                                        @if(!empty($item->guige))
                                                            @foreach(json_decode($item->guige) as $k=>$v)
                                                                {{$k}}:{{$v}}
                                                            @endforeach
                                                        @endif
                                                    </dd>
                                                </dl>
                                            </td>
                                            <td>
                                                @if($item->product->kc_qty>$item->num)
                                                    有库存
                                                @else
                                                    库存不足
                                                @endif
                                            </td>
                                            <td>
                                                x{{$item->num}}
                                            </td>
                                            <td><font class="price">¥ {{$item->price * $item->num}}</font></td>
                                        </tr>
                                    @endforeach
                                @endif

                                <tr>
                                    <td colspan="5" class="quan padding_left ding_jia">
                                        <font>添加订单备注</font>
                                        <textarea name="desc" placeholder="请输入订单备注"
                                                  class="layui-textarea"></textarea>
                                    </td>
                                </tr>

                            </table>


                            <div class="jiesuan_fu">
                                <ul>
                                    <li><span>商品总价：</span><font>¥&nbsp;{{$order->total_amount}}</font></li>
                                    <li><span>优 惠 券：</span><font>-&nbsp;¥&nbsp;{{$order->total_amount -$order->pay_amount}}</font></li>
                                    <li><span>运 费：</span><font>¥&nbsp;0.00</font></li>
                                    <li class="jiesuan_right_li"><span>应付总额:</span><font><i>¥&nbsp;{{$order->pay_amount}}</i></font>
                                    </li>
                                    <li class="">
                                    </li>
                                </ul>
                                <div>
                                    <span>寄送至：</span>
                                        @foreach($address as $add)
                                            @if($add->status ==1 )
                                            <span>{{$add->name}}</span>
                                            <span>{{$add->province}}</span>
                                            <span>{{$add->city}}</span>
                                            <span>{{$add->area}}</span>
                                            <span>{{$add->address}}</span>
                                            <span>{{$add->phone}}</span>

                                            @endif
                                        @endforeach

                                </div>
                            </div>

                            <div class="jiesuan_btn">
                                <button class="layui-btn layui-btn-danger jieshuan">结 算</button>
                            </div>

                        </div>

                    </div>
                </form>
            </div>


        </div>
    </div>
@stop

@section('footer_js')

    <script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/layui/layui.js')}}"></script>
    <script type="text/javascript" src="{{url('js/member/config.js')}}"></script>

    <script>
        //Demo
        layui.use('form', function () {
            var form = layui.form();

            //监听提交
            form.on('submit(formDemo)', function (data) {
                layer.msg(JSON.stringify(data.field));
                return false;
            });
        });
    </script>

    <script>
        //删除//
        /*$('.dele_d').click(function(){
         //询问框
         layer.confirm('确定要删除？', {
         title: ['删除', 'font-size:16px;'],
         btn: ['确定','取消'] //按钮
         }, function(){
         layer.msg('已经删除', {icon: 1});
         }, function(){
         layer.msg('取消删除', {icon: 2

         });
         });
         });*/

        //添加地址//
        $('.add_adress_tt').click(function () {
            layer.open({

                type: 2,
                title: false,
                shadeClose: true,
                shade: 0.8,
                area: ['800px', '550px'],
                content: ['adress.html', 'no']
            });
        });
        //

        //隐藏显示收货地址
        $(document).ready(function () {
            $(".shou_adress_top").click(function () {
                $(".shou_huo li").toggle();
                $(".shou_huo li:first").show();

            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".spinner").hide();
        });//页面加载特效
    </script>


@stop