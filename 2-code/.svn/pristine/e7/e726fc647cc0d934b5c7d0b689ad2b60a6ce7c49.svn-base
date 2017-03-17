@section("title")
    订单详情
@stop

@section("admincss")
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/jquery.mCustomScrollbar.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('js/public/layer/skin/layer.css')}}">
@stop

@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">商品订单 - 订单详情</span>
                    </h3>

                    <h5>
				<span class="action-span">
					<a href="{{url("/admin/order/index")}}" class="btn btn-warning click-loading">
                        返回订单列表
                    </a>
				</span>
                    </h5>

                </div>
            </div>
        </div>

        <!--步骤-->
        <div class="order-step">
            <!--完成步骤为dl添加current样式，完成操作内容后会显示完成时间-->
            <dl class="current step-first">
                <dt>拍下商品</dt>
                <dd class="bg"></dd>
                <dd class="date" title="下单时间">2016-10-11 08:06:12</dd>
            </dl>
            <dl class="">
                <dt>买家付款</dt>
                <dd class="bg"></dd>
                <dd class="date" title="买家付款时间"></dd>
            </dl>
            <dl class="">
                <dt>商家发货</dt>
                <dd class="bg"></dd>
                <dd class="date" title="商家发货时间"></dd>
            </dl>
            <dl class="">
                <dt>确认收货</dt>
                <dd class="bg"></dd>
                <dd class="date" title="确认收货时间"></dd>
            </dl>
        </div>

        <!--订单详情信息-->
        <div class="order-info m-b-10">
            <!--操作部分-->
            <div class="order-handle">
                <div class="order-operate">
                    <ul>
                        <li class="operate-steps">
                            <i class="iconfont"></i>
                            <span>当前订单状态：订单已确认，等待买家付款</span>
                        </li>
                        <!-- 待付款 -->
                        <li class="operate-prompt">
                            <p>
                                买家还有<span>01天11小时22分29秒</span>来付款，超时订单自动关闭
                            </p>
                            <p>
                                如果商品被恶意拍下了，您可以关闭订单
                            </p><br>
                            <input value="修改价格" class="btn btn-primary modify" type="button">
                            <input value="订单关闭（删除）" class="btn btn-primary dele_dd" type="button">
                        </li>
                    </ul>
                </div>
            </div>
            <!--下单时间等-->

            <div class="order-infor">
                <h3>订单来源 : pc端</h3>
                <div class="order-infor-center">
                    <dl>
                        <dt>
                            <span>订单编号：</span>
                        </dt>
                        <dd>
                            <span>JLJ201655241524</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
                            <span>下单时间：</span>
                        </dt>
                        <dd>
                            <span>2016-10-11 08:06:12</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
                            <span>买家付款：</span>
                        </dt>
                        <dd>
                            <span>2016-10-11 08:06:12</span>
                        </dd>
                    </dl>
                </div>
            </div>
            <!--订单信息-->
            <div class="order-details">
                <div class="title">订单信息</div>
                <div class="content">
                    <dl>
                        <dt>&nbsp;收&nbsp;货&nbsp;人：</dt>
                        <dd>王五，13000000000， 文化东路15号</dd>
                    </dl>
                    <dl>
                        <dt>支付方式：</dt>
                        <dd>支付宝</dd>
                    </dl>
                    <dl>
                        <dt>配送时间：</dt>
                        <dd>工作日/周末/假日均可</dd>
                    </dl>
                    <dl>
                        <dt>配送方式：</dt>
                        <dd>普通快递（ 免邮 ）</dd>
                    </dl>
                </div>
            </div>
            <!--其它信息-->
            <div class="order-details">
                <div class="title">其它信息</div>
                <div class="content">
                    <dl>
                        <dt>发&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;票：</dt>
                        <dd>无需开票</dd>
                    </dl>
                    <dl>
                        <dt>买家留言：</dt>
                        <dd>赠品不要 谢谢</dd>
                    </dl>
                </div>
            </div>
        </div>
        <!--商品信息-->
        <div class="table-responsive deliver">
            <table class="table">
                <colgroup>
                    <!--商品信息-->
                    <col class="w200">

                    <!--属性-->
                    <col class="w100">

                    <!--单价-->
                    <col class="w50">

                    <!--数量-->
                    <col class="w50">

                    <!--库存-->
                    <col class="w50">

                    <!--状态-->
                    <col class="w70">

                    <!--服务-->
                    <col class="w70">

                    <!--优惠-->
                    <col class="w100">

                </colgroup>
                <thead>
                <tr>
                    <th>商品</th>
                    <th>属性</th>
                    <th>单价（元）</th>
                    <th>产品店铺</th>
                    <th>数量</th>
                    <th>库存</th>
                    <th>状态</th>
                    <th>优惠</th>
                </tr>
                </thead>
                <tbody>
                <!--订单内容-->
                <tr class="order-item">
                    <td class="item">
                        <div class="pic-info">
                            <a href="##" class="goods-thumb" title="查看商品详情" target="_blank">
                                <img src="../images/pic01.png" alt="查看商品详情">
                            </a>
                        </div>
                        <div class="txt-info">
                            <div class="desc">
                                <a class="goods-name" href="##" target="_blank" title="查看商品详情">
                                    LOVO 幸福绽放涤棉床品六件套
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="order-type">
                        <div class="ng-binding order-type-info">
                            <span>颜色：黑色</span>
                            <span>尺码：大码</span>
                        </div>
                    </td>
                    <td class="price">￥860.00</td>
                    <td class="service">北大明宫店</td>
                    <td class="num">1</td>
                    <td class="stock">545453</td>
                    <td class="state">待发货</td>
                    <td class="order-discount">
                        暂无
                    </td>
                </tr>

                <!--订单内容-->
                <tr class="order-item">
                    <td class="item">
                        <div class="pic-info">
                            <a href="##" class="goods-thumb" title="查看商品详情" target="_blank">
                                <img src="../images/pic01.png" alt="查看商品详情">
                            </a>
                        </div>
                        <div class="txt-info">
                            <div class="desc">
                                <a class="goods-name" href="##" target="_blank" title="查看商品详情">
                                    LOVO 幸福绽放涤棉床品六件套
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="order-type">
                        <div class="ng-binding order-type-info">
                            <span>颜色：黑色</span>
                            <span>尺码：大码</span>
                        </div>
                    </td>
                    <td class="price">￥860.00</td>
                    <td class="service">北大明宫店</td>
                    <td class="num">1</td>
                    <td class="stock">545453</td>
                    <td class="state">待发货</td>
                    <td class="order-discount">
                        暂无
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="messageBox tfoot-info">
            <div class="address-info text-r">
                <p class="m-b-5">
                    <span>商品总金额：￥860.00</span>
                    <em class="operator">-</em>
                    <span>优惠：￥0</span>
                    <em class="operator">+</em>
                    <span>配送费用：￥0.00</span>
                    <em class="operator">=</em>
				<span>
					<strong>订单总金额：￥860.00</strong>
				</span>
                </p>
                <p>
                    <span>订单总金额：￥860.00</span>
                    <em class="operator">-</em>
                    <span>订单/产品分组优惠：￥200</span>
                    <em class="operator">=</em>
				<span class="order-amount">
					<strong>实收款金额：￥860</strong>
				</span>
                </p>
            </div>
        </div>
    </div>
@stop

@section("footer_js")
    <script type="text/javascript" src="{{url('js/admin/d_tan.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
@stop
