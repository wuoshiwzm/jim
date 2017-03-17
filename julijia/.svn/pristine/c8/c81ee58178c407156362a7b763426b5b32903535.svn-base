@section("title")
    退款单管理
@stop

@section("content")
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>
                    <span class="action">退款管理</span>
                </h3>
            </div>
        </div>
    </div>
    <!--搜索-->
    <div class="search-term m-b-10"><form action="{{url('/refund/query')}}" method="POST">
            <input name="_csrf" value="##" type="hidden">

            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>订单编号：</span>
                    </label>

                    <div class="form-control-wrap">
                        <input id="searchmodel-keyword" class="form-control" name="keyword" placeholder="订单编号" type="text">
                    </div>

                </div>
            </div>

            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>退款单号：</span>
                    </label>

                    <div class="form-control-wrap">
                        <input id="searchmodel-keyword" class="form-control" name="keyword" placeholder="编号" type="text">
                    </div>

                </div>
            </div>

            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>退款原因：</span>
                    </label>
                    <div class="form-control-wrap">
                        <select id="##" class="form-control">
                            <option value="">全部</option>
                            <option value="1">承诺的没有做到</option>
                            <option value="0">未按照约定时间发货</option>
                            <option value="1">未按成交价格交易</option>
                            <option value="1">恶意骚扰</option>
                            <option value="1">拒绝提供售后服务</option>
                            <option value="1">其他</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>商品状态：</span>
                    </label>
                    <div class="form-control-wrap">
                        <select id="##" class="form-control">
                            <option value="">全部</option>
                            <option value="1">买家申请退款，等待卖家确认</option>
                            <option value="0">卖家确认，等待买家发货</option>
                            <option value="">卖家确认，等待退款</option>
                            <option value="">买家已退货，等待卖家确认收货</option>
                            <option value="">退款关闭</option>
                            <option value="">退款成功</option>
                        </select>

                    </div>
                </div>
            </div>

            <div class="simple-form-field">
                <input id="btn_search" value="查询" class="btn btn-primary m-r-5" type="button">
            </div>
        </form>
    </div>

    <div class="common-title">
        <div class="ftitle">
            <h3>商品列表</h3>

            <h5>
                (&nbsp;共
                <span data-total-record="true">309</span>
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
    <div class="table-responsive">
        <table id="table_list" class="table table-hover">
            <thead>
            <tr>
                <!--排序样式sort默认，asc升序，desc降序-->
                <th class="w260" style="cursor: pointer;">商品信息</th>
                <th class="w100 active" style="cursor: pointer;">买家</th>
                <th class="w100" style="cursor: pointer;">交易金额</th>
                <th class="w100" style="cursor: pointer;">退款金额</th>
                <th class="w100" style="cursor: pointer;">申请时间<span class="sort desc"></span></th>
                <th class="w100" style="cursor: pointer;">超时时间<span class="sort desc"></span></th>
                <th class="w100" style="cursor: pointer;">退款状态</th>
                <th class="handle w300">操作</th>
            </tr>
            </thead>
            <tbody>
            <!--以下为循环内容-->
            <tr>
                <td>
                    <div class="goodsPicBox pull-left m-r-10">
                        <img src="../images/pic01.png" class="goods-thumb" width="50">
                    </div>
                    <div class="ng-binding refund-message ">
                        <div class="name">
                            <a href="##" target="_blank" data-toggle="tooltip" data-placement="auto bottom" title="" class="c-blue" data-original-title="测试退款">测试退款</a>
                        </div>
                        <div class="order-num">订单编号：20161007341420</div>
                        <div class="refund-num">退款编号：2016100745930</div>
                    </div>
                </td>
                <td>
                    <div class="ng-binding">
                        <span>李某某</span>
                    </div>
                </td>
                <td>￥9.00</td>
                <td>￥1.00</td>
                <td>2016-10-07 16:19:54</td>
                <td>2016-10-09 16:19:54</td>
                <td>
                    <font class="c-999">买家申请，等待卖家确认</font>
                </td>
                <td class="handle">
                    <a href="">详情</a>&nbsp;&nbsp;<a href="">确认</a>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="goodsPicBox pull-left m-r-10">
                        <img src="../images/pic01.png" class="goods-thumb" width="50">
                    </div>
                    <div class="ng-binding refund-message ">
                        <div class="name">
                            <a href="##" target="_blank" data-toggle="tooltip" data-placement="auto bottom" title="" class="c-blue" data-original-title="测试退款">测试退款</a>
                        </div>
                        <div class="order-num">订单编号：20161007341420</div>
                        <div class="refund-num">退款编号：2016100745930</div>
                    </div>
                </td>
                <td>
                    <div class="ng-binding">
                        <span>李某某</span>
                    </div>
                </td>
                <td>￥9.00</td>
                <td>￥1.00</td>
                <td>2016-10-07 16:19:54</td>
                <td>2016-10-09 16:19:54</td>
                <td>
                    <font class="c-999">卖家确认，等待退款</font>
                </td>
                <td class="handle">
                    <a href="">详情</a>&nbsp;&nbsp;<a href="">退款</a>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="goodsPicBox pull-left m-r-10">
                        <img src="../images/pic01.png" class="goods-thumb" width="50">
                    </div>
                    <div class="ng-binding refund-message">
                        <div class="name">
                            <a href="##" target="_blank" data-toggle="tooltip" data-placement="auto bottom" title="" class="c-blue" data-original-title="测试退款">测试退款</a>
                        </div>
                        <div class="order-num">订单编号：20161007341420</div>
                        <div class="refund-num">退款编号：2016100745930</div>
                    </div>
                </td>
                <td>
                    <div class="ng-binding">
                        <span>李某某</span>
                    </div>
                </td>
                <td>￥9.00</td>
                <td>￥1.00</td>
                <td>2016-10-07 16:19:54</td>
                <td>2016-10-09 16:19:54</td>
                <td>
                    <font class="c-999">卖家确认，等待买家发货</font>
                </td>
                <td class="handle">
                    <a href="">详情</a>&nbsp;&nbsp;<a href="">确认收货</a>
                </td>
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