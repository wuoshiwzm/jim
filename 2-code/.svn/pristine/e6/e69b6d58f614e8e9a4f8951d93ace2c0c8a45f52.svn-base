<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/12/16
 * Time: 18:28
 */?>

@section('content')

    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">会员 - 交易记录</span>
                    </h3>
                </div>
            </div>
        </div>
        <!--搜索-->
        <div class="search-term m-b-10"><form action="##" method="POST">
                <input name="_csrf" value="##" type="hidden">

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>关键字：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input id="searchmodel-keyword" class="form-control" name="keyword" placeholder="品牌名称" type="text">
                        </div>

                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>订单状态：</span>
                        </label>

                        <div class="form-control-wrap">
                            <select id="order_status" class="form-control" name="order_status">
                                <option value="##">全部</option>
                                <option value="unshipped">等待发货</option>
                                <option value="shipped">已发货</option>
                                <option value="###">部分已完成</option>
                                <option value="###">已完成</option>
                                <option value="###">订单关闭</option>
                                <option value="###">退款申请中</option>
                                <option value="###">退款中</option>
                                <option value="###">退款完成</option>
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
                <h3>记录列表</h3>
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

        <div class="table-responsive">
            <table id="table_list" class="table table-hover">
                <thead>
                <tr>
                    <!--排序样式sort默认，asc升序，desc降序-->
                    <th class="w150" style="cursor: pointer;">会员名称</th>
                    <th class="w250" style="cursor: pointer;">订单编号</th>
                    <th class="w250" style="cursor: pointer;">下单时间</th>
                    <th class="w250" style="cursor: pointer;">支付时间</th>
                    <th class="w150" style="cursor: pointer;">订单来源</th>
                    <th class="w250" style="cursor: pointer;">订单状态</th>
                    <th class="w150" style="cursor: pointer;">金 额</th>
                    <th class="w150 handle " style="cursor: pointer;">操 作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                <tr>
                    <td>
                        张三
                    </td>
                    <td>
                        201645214152
                    </td>
                    <td>
                        2016-12-12  10:34:30
                    </td>
                    <td>
                        2016-12-12  10:34:30
                    </td>
                    <td>PC站</td>
                    <td>
                        买家已付款，等待卖家发货
                    </td>
                    <td>
                        3400元
                    </td>
                    <td class="handle">
                        <a href="info01.html">查看详情</a>
                    </td>
                </tr>

                <tr>
                    <td>
                        李四
                    </td>
                    <td>
                        201645214152
                    </td>
                    <td>
                        2016-12-12  10:34:30
                    </td>
                    <td>
                        2016-12-12  10:34:30
                    </td>
                    <td>PC站</td>
                    <td>
                        买家已付款，等待卖家发货
                    </td>
                    <td>
                        3400元
                    </td>
                    <td class="handle">
                        <a href="info01.html">查看详情</a>
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
