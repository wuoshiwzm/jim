@section('content')

    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">会员</span>
                    </h3>
                </div>
            </div>
        </div>

        <!--搜索-->
        <div class="search-term m-b-10">
            <form action="##" method="POST">
                <input type="hidden" name="_csrf" value="##">

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>关键字查询：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input type="text" id="searchmodel-keyword" class="form-control" name="keyword"
                                   placeholder="会员名称/电话/Email">
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>会员等级：</span>
                        </label>

                        <div class="form-control-wrap">
                            <select id="##" class="form-control">
                                <option value="">全部</option>
                                <option value="1">普通会员</option>
                                <option value="0">高级会员</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="simple-form-field">
                    <input type="button" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                    <input type="button" id="btn_search" value="导出" class="btn btn-primary m-r-5">

                </div>

            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>会员列表</h3>

                <h5>
                    (&nbsp;共
                    <span data-total-record="true">309</span>
                    条记录&nbsp;)
                </h5>

            </div>
            <div class="operate">
                <a class="reload" href="javascript:reload();" data-toggle="tooltip" data-placement="auto bottom"
                   title="" data-original-title="刷新数据">
                    <i class="iconfont">&#xe6fb;</i>
                </a>
            </div>
        </div>
        <!--列表内容-->
        <div class="table-responsive">
            <table id="table_list" class="table table-hover">
                <thead>
                <tr>
                    <!--排序样式sort默认，asc升序，desc降序-->

                    <th class="w80" style="cursor: pointer;">编号</th>
                    <th class="w100" style="cursor: pointer;">会员信息</th>
                    <th class="w80" style="cursor: pointer;">会员等级</th>
                    <th class="w80" style="cursor: pointer;">交易笔数</th>
                    <th class="w100" style="cursor: pointer;">上次交易时间</th>
                    <th class="handle w100">操作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->

                @foreach($userinfos as $info )

                <tr>

                    <td>
                        {{$info->id}}
                    </td>
                    <td>
                        <div class="userPicBox pull-left m-r-10">
                            <img src="../images/pic01.png" class="user-avatar" width="44px">
                        </div>
                        <div class="ng-binding user-message w250">
							<span class="mail">
								<i class="fa fa-envelope-o"></i>{{$info->name}}</span><br>
                            <span class="tel">
								<i class="iconfont">&#xe6c7;</i>：{{$info->mobile_phone}}
							</span>
                        </div>
                    </td>
                    <td>
                        <div class="ng-binding">
                            <span>{{$info->group_name}}</span><br>
                            {{--<span>折扣:9.5折</span>--}}
                        </div>
                    </td>
                    <td>{{$info->orderCount}}笔</td>
                    <td>
                        {{$info->orderLasttime}}

                        {{--2016-12-12 15:20:20--}}
                    </td>
                    <td class="handle">
                        <a href="{{url('admin/member/welc/'.$info->id)}}">详情</a>&nbsp;&nbsp;<a href="vip_add.html">编辑</a>
                    </td>
                </tr>

                @endforeach
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
                            <a class="iconfont" title="上一页">&#xe70a;</a>
                        </li>

                        <li class="active">
                            <a data-cur-page="1">1</a>
                        </li>

                        <li class="disabled">
                            <a class="iconfont" title="下一页">&#xe709;</a>
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