@section("title")
    评价详情
@stop
@section("admincss")
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/jquery.mCustomScrollbar.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css')}}">
@stop

@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">评价管理 -- 评价详情</span>
                    </h3>
                    <h5>
				<span class="action-span">
					<a href="/admin/comment/index" class="btn btn-warning click-loading">
                        <i class="iconfont"></i>
                        返回评论列表
                    </a>
				</span>
                    </h5>
                </div>
            </div>
        </div>
        <!--订单详情信息-->
        <div class="order-info m-b-10">
            <!--下单时间等-->
            <div class="order-info">
                <div class="order-left">
                    <h3 style=" font-weight:bold;">相关商品交易信息</h3>
                    <div class="order-goods">
                        <div class="goodsPicBox pull-left m-r-10">
                            <a href="##" target="_blank">
                                <img src="../images/pic04.png" class="goods-thumb">
                            </a>
                        </div>
                        <div class="ng-binding refund-message">
                            <div class="name">
                                <a href="##" target="_blank">{{$comment->item->product_name}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="refund-info">
                        <dl>
                            <dt>
                                <span class="letter-spacing">买家</span>
                                ：
                            </dt>
                            <dd>
                                <span>{{$comment->user->real_name}}</span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <span>订单编号</span>
                                ：
                            </dt>
                            <dd>
                                <span>
                                    <a href="##" class="c-blue">{{$comment->order->order_sn}}</a>
                                </span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <span class="letter-spacing">单价</span>
                                ：
                            </dt>
                            <dd>
                                <span>￥{{$comment->item->price}} * {{$comment->item->num}}（数量）</span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <span class="letter-spacing">快递</span>
                                ：
                            </dt>
                            <dd>
                                <span>￥{{$comment->item->shipping_fei}}</span>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="order-right">
                    <h3 style=" font-weight:bold;">评论详情</h3>
                    <div class="refund-operate">
                        <ul>
                            <li class="operate-steps">
                                <i class="iconfont"></i>
                                <span>评论状态：
                                    @if($comment->status == 0)
                                        待审核
                                    @elseif($comment->status == 1)
                                        审核通过
                                    @elseif($comment->status == 2)
                                        审核未通过
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>

                    <h3 style=" font-weight:bold;">评论内容</h3>
                    <div class="refund-operate">
                        <table id="table_list" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="w150" style="cursor: pointer;">评价人</th>
                                <th class="w150">评论时间</th>
                                <th class="text-c w150" style="cursor: pointer;">评价</th>
                                <th style="cursor: pointer;">评价内容</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!--以下为循环内容-->

                            <tr class="order-tr" name="1">
                                <td>
                                    <div class="ng-binding">
							<span>
								{{$comment->user->real_name}}
								<font class="c-blue">{{$comment->user->group->name}}</font>
							</span>
                                    </div>
                                </td>
                                <td>
                                    {{$comment->created_at}}
                                </td>
                                <!--icon-0为实星，icon-1为虚星-->
                                <td>
                                    <div class="ng-binding">
                                        <span class="text-c">
                                            <a class="score-icon icon-0 m-r-5"></a>
                                            好评
                                        </span>
                                        <span class="star-icon text-c">
                                            {{--<i class="icon-0"></i>--}}
                                            {{--<i class="icon-0"></i>--}}
                                            {{--<i class="icon-0"></i>--}}
                                            @for($i = 0;$i < $comment->leavel;$i++)
                                                <i class="icon-0"></i>
                                            @endfor
                                            <i class="icon-1"></i>
                                        </span>
                                        {{--<span class="star-icon text-c">--}}
                                        {{--<span class="text-c">--}}
                                        {{--@for($i = 0;$i < $row->leavel;$i++)--}}
                                        {{--<a class="score-icon icon-0 m-r-5"></a>--}}
                                        {{--@endfor--}}
                                        {{--</span>--}}
                                        {{--</span>--}}
                                    </div>
                                </td>
                                <td>
                                    {{$comment->content}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--商品信息-->
    </div>
@stop
