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
        <div class="search-term m-b-10">
            <form action="{{url("/admin/complain/index")}}" method="get">
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>订单编号：</span>
                        </label>
                        <div class="form-control-wrap">
                            <input id="searchmodel-keyword" value="{{Input::get("order_sn")}}"  class="form-control" name="order_sn" placeholder="订单编号" type="text">
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>投诉编号：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input id="searchmodel-keyword" value="{{Input::get("feedback_sn")}}" class="form-control" name="feedback_sn" placeholder="投诉编号" type="text">
                        </div>

                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>投诉原因：</span>
                        </label>
                        <div class="form-control-wrap">
                            <select  name="reason_id" class="form-control">
                                <option value="0"
                                    @if( (int)Input::get("reason_id") == 0)
                                        selected
                                    @endif
                                >全部</option>
                                @foreach($reasons as $reason)
                                    <option value="{{$reason->id}}"
                                        @if((int)(Input::get("reason_id") == $reason->id ))
                                            selected
                                        @endif
                                    > {{$reason->value}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <input id="btn_search" value="查询" class="btn btn-primary m-r-5" type="submit">
                </div>
            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>投诉列表</h3>
                <h5>
                    (&nbsp;共
                    <span data-total-record="true">{{$data->getTotal()}}</span>
                    条记录&nbsp;)
                </h5>

            </div>
            <div class="operate">
                <a class="reload" href="" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="刷新数据">
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
                    <th class="w100" data-sortname="complaint_id" data-sortorder="asc" style="cursor: pointer;">
                        投诉编号
                        <span class="sort"></span></th>
                    <th class="w200">订单商品</th>
                    <th class="w60">投诉方</th>
                    <th class="w150">投诉原因</th>
                    <th class="w200">投诉状态</th>
                    <th class="w150">申请时间</th>
                    <th class="handle w80">操作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                @foreach($data as $row)
                    <tr>
                        <td>{{$row->feedback_sn}}</td>
                        <td>
                            <div class=" pull-left m-r-10">
                                <img src="../images/pic01.png" width="40" height="40">
                            </div>
                            <div class="ng-binding refund-message">
                                <div class="name">
                                    <a href="##" target="_blank" class="c-blue">{{isset($row->item->product_name)?$row->item->product_name:''}}</a>
                                </div>
                                <div class="time">订单编号： {{isset($row->order->order_sn)?$row->order->order_sn:''}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="ng-binding">
                                <span>{{$row->real_name}}</span>
                                <span>{{$row->name}}</span>
                            </div>
                        </td>
                        <td>{{isset($row->reason->value)?$row->reason->value:''}}</td>
                        <td><font class="c-red">
                            @if($row->status ==  1 )
                                买家提起投诉，等待平台处理
                            @elseif($row->status == 2)
                                平台已处理
                            @endif
                        </font>
                        </td>
                        <td>{{$row->created_at}}</td>
                        <td class="handle">
                            {{--<a href="##">查看</a>&nbsp;&nbsp;--}}
                            <a href="{{url('/admin/complain/detail?'.http_build_query(["c_id" => $row->id]))}}">查看详情</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include("admin.public.page",array('data'=>$data,'set'=>$set))
        </div>
    </div>
@stop