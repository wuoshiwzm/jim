@section("title")
   投诉列表
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
                        <span class="action">投诉列表</span>
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
                            <span>投诉编号：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input id="searchmodel-keyword" class="form-control" name="keyword" placeholder="投诉编号" type="text">
                        </div>

                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>投诉原因：</span>
                        </label>
                        <div class="form-control-wrap">
                            <select id="##" class="form-control">
                                <option value="">全部</option>
                                <option value="1">承诺的没有做到</option>
                                <option value="0">未按照约定时间发货</option>
                                <option value="1">未按成交价格交易</option>
                                <option value="1">恶意骚扰</option>
                                <option value="1">拒绝提供售后服务</option>
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
                <h3>投诉列表</h3>

                <h5>
                    (&nbsp;共
                    <span data-total-record="true">3</span>
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
                <li id="complaint_all" class="tabs-t current ">
                    <a href="{{url("/admin/complain/index")}}">所有投诉</a>
                </li>
                {{--<li id="complaint_wait" class="tabs-t ">--}}
                {{--<a>等待卖家处理</a>--}}
                {{--</li>--}}
                <li id="complaint_involve" class="tabs-t ">
                    <a href="{{url("/admin/complain/handle")}}">平台方处理中</a>
                </li>
                <!--当前选中样式current，并且现只有“等待买家确认”，“等待发货”，“退款中”需要有个数提醒，其它没有；默认为近三个月订单-->
            </ul>
        </div>
        <!--列表内容-->
        <div class="table-responsive">

            <table id="table_list" class="table table-hover">
                <thead>
                <tr>
                    <!--排序样式sort默认，asc升序，desc降序-->
                    <th class="w150" data-sortname="complaint_id" data-sortorder="asc" style="cursor: pointer;">
                        投诉编号
                        <span class="sort"></span></th>
                    <th class="w100" style="cursor: default;">订单编号</th>
                    <th class="w150">投诉方</th>
                    <th class="w150">投诉原因</th>
                    <th class="w200">投诉状态</th>
                    <th class="w150">申请时间</th>
                    <th class="handle w100">操作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                <tr>

                    <td>2016101375183</td>
                    <td>
                        <a class="c-blue" target="_blank" href="##">20161009833600</a>
                    </td>
                    <td>
                        <div class="ng-binding">
                            <span>王五</span>
                            <span>普通会员</span>
                        </div>
                    </td>
                    <td>承诺的没做到</td>
                    <td><font class="c-red">买家提起投诉，等待卖家处理</font></td>
                    <td>2016-10-13 18:12:09</td>
                    <td class="handle">
                        <a href="##">查看</a>&nbsp;&nbsp;<a href="##">处理</a>
                    </td>
                </tr>
                <tr>

                    <td>2016101375183</td>
                    <td>
                        <a class="c-blue" target="_blank" href="##">20161009833600</a>
                    </td>
                    <td>
                        <div class="ng-binding">
                            <span>商城会员</span>
                            <span>王五</span>
                        </div>
                    </td>
                    <td>承诺的没做到</td>
                    <td><font class="c-red">买家提起投诉，等待卖家处理</font></td>
                    <td>2016-10-13 18:12:09</td>
                    <td class="handle">
                        <a href="##">查看</a>&nbsp;&nbsp;<a href="##">处理</a>
                    </td>
                </tr>
                <tr>

                    <td>2016101375183</td>
                    <td>
                        <a class="c-blue" target="_blank" href="##">20161009833600</a>
                    </td>
                    <td>
                        <div class="ng-binding">
                            <span>商城会员</span>
                            <span>王五</span>
                        </div>
                    </td>
                    <td>承诺的没做到</td>
                    <td><font class="c-red">买家提起投诉，等待卖家处理</font></td>
                    <td>2016-10-13 18:12:09</td>
                    <td class="handle">
                        <a href="##">查看</a>&nbsp;&nbsp;<a href="##">处理</a>
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