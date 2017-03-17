@section("title")
    已发货
@stop

@section("admincss")
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css')}}">
@stop

@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">发货管理</span>
                    </h3>

                </div>
            </div>
        </div>

        <!--搜索-->
        <div class="search-term m-b-10">
            <form id="searchForm" method="GET">

                <input id="uid" class="form-control" name="uid" type="hidden">
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>关键字：</span>
                        </label>
                        <div class="form-control-wrap"><input id="name" class="form-control" name="name" placeholder="商品名称/订单编号/买家帐号" type="text"></div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <button class="btn btn-primary m-r-5">查询</button>
                </div>

            </form>
        </div>


        <div class="common-title">
            <div class="ftitle">
                <h3>退货列表</h3>
                <h5>
                    (&nbsp;共
                    <span data-total-record="true">175</span>
                    条记录&nbsp;)
                </h5>

            </div>
            <div class="operate">

                <a class="reload" href="javascript:reload();" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="刷新数据">
                    <i class="iconfont"></i>
                </a>

            </div>
        </div>

        <!--列表内容-->
        <div class="item-list-hd">
            <ul class="item-list-tabs">
                <li id="order_unshipped" class="tabs-t last ">
                    <a href="{{url("/admin/deliver/index")}}">等待发货（42）</a>
                </li>
                <li id="order_shipped" class="tabs-b current">
                    <a href="/admin/deliver/gone">已发货（4）</a>
                </li>
            </ul>
        </div>
        <div class="table-responsive order">  		            <table id="table_list" class="table">

                <thead>
                <tr>
                    <th width="26%">商品信息</th>
                    <th width="8%">单价（元）</th>
                    <th width="4%">数量</th>
                    <th width="10%">买家</th>
                    <th width="10%">线下门店</th>
                    <th width="10%">运输状态</th>
                    <th width="8%">优惠金额</th>
                    <th width="8%">实收款</th>
                    <!--操作列样式handle-->
                    <th class="handle" style="cursor: default;">操作</th>
                </tr>
                </thead>

                <!--以下为循环内容-->
                <tbody class="order ">
                <tr class="sep-row">
                    <td colspan="9"></td>
                </tr>
                <!--订单编号-->
                <tr class="order-hd"><td colspan="9">
                        <div class="basic-info">
                            <span class="order-num">订单编号：20161013126710</span>
                            <span class="deal-time">下单时间：2016-10-13 09:18:39</span>
                            <span class="order-source">订单来源：PC端</span>
                            <span class="order-source">订单状态：部分完成</span>
                        </div>
                    </td>
                </tr>
                <!--订单内容-->
                <tr class="order-item">
                    <td class="item">
                        <div class="pic-info">
                            <a href="##" class="goods-thumb" title="查看商品详情" target="_blank">
                                <img src="../images/02.jpg" alt="查看商品详情">
                            </a>
                        </div>
                        <div class="txt-info">
                            <div class="desc span02">
                                <a href="#" class="goods-name" target="_blank" title="新鲜水果柠檬">新鲜新鲜水果新水果新鲜水果新鲜水果鲜水果新鲜水果水</a>
                            </div>
                        </div>
                    </td>
                    <!--单价-->
                    <td class="price">
                        <div class="price m-b-3">￥101210</div>
                    </td>
                    <!--数量-->
                    <td class="num">1</td>
                    <!--买家信息-->
                    <td class="trouble">
                        <font class="nickname">张 三 （普通会员）</font>
                    </td>

                    <!--下线门店-->
                    <td class="contact contact01" sumrows="1" rowspan="1">
                        大明宫店
                    </td>
                    <!--运输状态-->
                    <td class="trade-status" sumrows="1" rowspan="1">
                        待发货
                    </td>

                    <!--优惠金额-->
                    <td class="order-price" sumrows="1" rowspan="1">
                        100元
                    </td>

                    <!--实收金额-->
                    <td class="remark remark02" sumrows="1" rowspan="1">
                        10110元
                    </td>

                    <!--操作-->
                    <td class="handle" sumrows="1" rowspan="1">
                        <div class="ng-binding">
                    <span class="text-c">
                        <a href="info01.html">订单详情</a>&nbsp;&nbsp;<a href="hair.html">发货</a>
                    </span>
                        </div>
                    </td>
                    <!-- 共用end -->
                </tr>

                <!-- 商品自带赠品 -->

                </tbody>

                <tbody class="order ">
                <tr class="sep-row">
                    <td colspan="9"></td>
                </tr>
                <!--订单编号-->
                <tr class="order-hd">

                    <td colspan="9">
                        <div class="basic-info">
                            <span class="order-num">订单编号：20161013126710</span>
                            <span class="deal-time">下单时间：2016-10-13 09:18:39</span>
                            <span class="order-source">订单来源：PC端</span>
                            <span class="order-source">订单状态：订单已完成</span>
                        </div>
                    </td>
                </tr>
                <!--订单内容-->
                <tr class="order-item">
                    <td class="item">
                        <div class="pic-info">
                            <a href="##" class="goods-thumb" title="查看商品详情" target="_blank">
                                <img src="../images/02.jpg" alt="查看商品详情">
                            </a>
                        </div>
                        <div class="txt-info">
                            <div class="desc span02">
                                <a href="#" class="goods-name" target="_blank" title="新鲜水果柠檬">新鲜新鲜水果新水果新鲜水果新鲜水果鲜水果新鲜水果水</a>
                            </div>
                        </div>
                    </td>
                    <!--单价-->
                    <td class="price">
                        <div class="price m-b-3">￥101210</div>
                    </td>
                    <!--数量-->
                    <td class="num">1</td>
                    <!--买家信息-->
                    <td class="trouble">
                        <font class="nickname">张 三 （普通会员）</font>
                    </td>

                    <!--下线门店-->
                    <td class="contact contact01" sumrows="1" rowspan="1">
                        大明宫店
                    </td>
                    <!--运输状态-->
                    <td class="trade-status" sumrows="1" rowspan="1">
                        待发货
                    </td>

                    <!--优惠金额-->
                    <td class="order-price" sumrows="1" rowspan="1">
                        100元
                    </td>

                    <!--实收金额-->
                    <td class="remark remark02" sumrows="1" rowspan="1">
                        10110元
                    </td>

                    <!--操作-->
                    <td class="handle" sumrows="1" rowspan="1">
                        <div class="ng-binding">
                    <span class="text-c">
                        <a href="info01.html">订单详情</a>&nbsp;&nbsp;<a href="hair.html">发货</a>
                    </span>
                        </div>

                    </td>
                    <!-- 共用end -->
                </tr>

                <tr class="sep-row">
                    <td colspan="11"></td>
                </tr>

                </tbody>

            </table>

            <div class="pull-right page-box">
                <div id="pagination" class=" pull-right">

                    <div class="pagination-info">
                        共7条记录，每页显示：
                        <select class="select m-r-5" data-page-size="10">

                            <option value="1">1</option>

                            <option value="10" selected="selected">10</option>

                            <option value="20">20</option>

                            <option value="30">30</option>

                            <option value="50">50</option>

                        </select>
                        条
                    </div>

                    <ul class="pagination">
                        <li class="disabled" style="display: none;">
                            <a class="fa fa-angle-double-left" data-go-page="1" title="第一页"></a>
                        </li>

                        <li class="disabled">
                            <a class="iconfont" title="上一页"></a>
                        </li>

                        <li class="active">
                            <a data-cur-page="1">1</a>
                        </li>

                        <li class="disabled">
                            <a class="iconfont" title="下一页"></a>
                        </li>

                        <li class="disabled" style="display: none;">
                            <a class="fa fa-angle-double-right" data-go-page="1" title="最后一页"></a>
                        </li>
                    </ul>

                    <div class="pagination-goto">
                        <input class="ipt form-control goto-input" type="text">
                        <button class="btn btn-default goto-button" title="点击跳转到指定页面">GO</button>
                        <a class="goto-link" data-go-page="" style="display: none;"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop