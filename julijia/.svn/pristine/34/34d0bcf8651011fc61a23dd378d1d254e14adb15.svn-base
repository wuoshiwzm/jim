@section("title")
    评论列表
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
                    <span class="action">评论列表</span>
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
                        <span>卖家账号：</span>
                    </label>
                    <div class="form-control-wrap">
                        <select id="##" class="form-control">
                            <option value="">好评</option>
                            <option value="1">中评</option>
                            <option value="0">差评</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>评论状态：</span>
                    </label>
                    <div class="form-control-wrap">
                        <select id="##" class="form-control">
                            <option value="">全部</option>
                            <option value="1">已回复</option>
                            <option value="0">未回复</option>
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
    <div class="item-list-hd">
        <ul class="item-list-tabs">
            <a href="{{url("/admin/comment/index")}}">
                <li name="all" class="tabs-t current">显示的评价</li>
            </a>
            <a href="{{url("/admin/comment/checking")}}">
                <li name="un" class="tabs-t ">待审核的评价</li>
            </a>
        </ul>
    </div>
    <!--列表内容-->
    <div class="table-responsive">

        <!---->
        <table id="table_list" class="table table-hover">
            <thead>
            <tr>
                <th class="tcheck">
                    <input class="checkBox allCheckBox table-list-checkbox-all" title="全选/全不选" type="checkbox">
                </th>

                <th style="cursor: pointer;">宝贝信息</th>
                <th style="cursor: pointer; text-align:center">评价</th>
                <th style="cursor: pointer;">评价人</th>

                <!--操作列样式handle-->
                <th class="handle">操作</th>
            </tr>
            </thead>
            <tbody>
            <!--以下为循环内容-->

            <tr class="order-tr" name="1">
                <td class="tcheck">
                    <input class="checkBox table-list-checkbox" type="checkbox">
                </td>
                <td>
                    <div class="goodsPicBox pull-left m-r-10">
                        <img src="/images/pic01.png" class="goods-thumb">
                    </div>
                    <div class="ng-binding refund-message">
                        <div class="name">
                            <a href="http://www.szy.yunmall.68mall.com/goods/324.html" target="_blank" data-toggle="tooltip" data-placement="auto bottom" title="" class="c-blue" data-original-title="华为P9">华为P9</a>
                        </div>

                        <div class="time">下单时间：2016-10-03 17:09:23</div>
                        <div class="time">订单编号： 205424540523</div>
                    </div>
                </td>
                <!--icon-0为实星，icon-1为虚星-->
                <td>
                    <div class="ng-binding">
							<span class="text-c">
								<a class="score-icon icon-0 m-r-5"></a>
								好评
							</span>
							<span class="star-icon text-c">
								<!---->
                                <!---->
                                <!---->
								<i class="icon-0"></i>
                                <!---->
                                <!---->
                                <!---->
								<i class="icon-0"></i>
                                <!---->
                                <!---->
                                <!---->
								<i class="icon-0"></i>
                                <!---->
                                <!---->
                                <!---->
								<i class="icon-0"></i>
                                <!---->
                                <!---->
                                <!---->
								<i class="icon-1"></i>
                                <!---->
                                <!---->
							</span>
                    </div>
                </td>
                <!--b_blue_5.gif为钻级用户，1为一个钻，以此类推；b_red_4.gif为红心级用户；s_cap_4.gif为冠级用户-->
                <td>
                    <div class="ng-binding">
							<span>
								李四
								<font class="c-blue">普通会员</font>
							</span>
                    </div>
                </td>


                <td class="handle">
                    <!---->
                    <a class="hiddens" href="javascript:;">查看详情</a>&nbsp;&nbsp;<a class="hiddens huifu" href="javascript:;">审核</a>
                    <!---->
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td class="text-c w10">
                    <input class="allCheckBox checkBox table-list-checkbox-all" title="全选/全不选" type="checkbox">
                </td>
                <td colspan="1">
                    <div class="pull-left">
                        <form id="cl" method="POST" action="">
                            <!---->
                            <button id="hiddens" class="btn btn-primary mr5" type="button" data-action="delete-all">批量回复</button>
                            <!---->
                        </form>
                    </div>
                </td>
                <td colspan="3">
                    <div class="pull-right page-box page-box02">
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
                </td>

            </tr>
            </tfoot>
        </table>
        <!---->
    </div>
</div>
@stop