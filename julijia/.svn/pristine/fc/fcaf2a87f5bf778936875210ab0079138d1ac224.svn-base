@section("title")
    已发货订单
@stop

@section("admincss")
<link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css')}}">
@stop

@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">商品订单 - 订单列表</span>
                    </h3>
                </div>
            </div>
        </div>

        <!--搜索-->
        <div class="search-term m-b-10">
            @include('admin.order.item.search')
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>订单列表</h3>
                <h5>
                    (&nbsp;共
                    <span data-total-record="true">{{ $order_info["all_order"] }}</span>
                    条记录&nbsp;)
                </h5>
            </div>
            <div class="operate">
                <a class="reload" href="" data-toggle="tooltip" data-placement="auto bottom"
                   title="" data-original-title="刷新数据">
                    <i class="iconfont"></i>
                </a>
            </div>
        </div>
        <!--列表内容-->
        <div class="item-list-hd">
            <ul class="item-list-tabs">
                <li id="order_all" class="tabs-t ">
                    <a href="{{url('/admin/order/index')}}">全部订单（{{ $order_info["all_order"] }}）</a>
                </li>
                <li id="order_unpayed" class="tabs-t">
                    <a href="{{url('/admin/order/nopay')}}">等待买家付款（{{$order_info["no_pay"]}}）</a>
                </li>
                <li id="order_unshipped" class="tabs-t last">
                    <a href="{{url('/admin/order/waiting')}}">等待发货（{{$order_info["waiting"]}}）</a>
                </li>
                <li id="order_shipped" class="tabs-b current">
                    <a href="{{url('/admin/order/hasdeliver')}}">已发货（{{$order_info["has_gone"]}}）</a>
                </li>
                <li id="order_finished" class="tabs-b last">
                    <a href="{{url('/admin/order/complete')}}">成功订单（{{$order_info["success"]}}）</a>
                </li>
            </ul>
        </div>
        <div class="table-responsive order">
            <table id="table_list" class="table">
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

                @foreach( $data as $row )
                    <tbody class="order ">
                    <tr class="sep-row">
                        <td colspan="9"></td>
                    </tr>
                    <!--订单编号-->
                    <tr class="order-hd">
                        <td colspan="9">
                            <div class="basic-info">
                                <span class="order-num">订单编号：{{$row->order_sn}}</span>
                                <span class="deal-time">下单时间：{{$row->created_at}}</span>
                            <span class="order-source">订单来源：
                                @if($row->source == 1)
                                    pc
                                @elseif($row->source == 2)
                                    wap
                                @endif
                                端</span>
                            <span class="order-source">订单状态：
                                @if ($row->status == 1)
                                    待付款
                                @elseif($row->status == 2)
                                    订单已取消
                                @elseif($row->status == 3)
                                    无效订单
                                @elseif($row->status == 4)
                                    等待发货
                                @elseif($row->status == 5)
                                    已发货
                                @elseif($row->status == 6)
                                    部分已完成
                                @elseif($row->status == 7)
                                    已完成
                                @elseif($row->status == 3)
                                    订单关闭
                                @elseif($row->status == 8)
                                    退款申请中
                                @elseif($row->status == 10)
                                    退款中
                                @elseif($row->status == 9)
                                    退款完成
                                @endif
                            </span>
                            </div>
                        </td>
                    </tr>

                    <!--订单商品内容-->
                    @foreach($row->item as $key => $goods_item )
                        @include('admin.order.item.list',array('item'=>$goods_item ,'order'=>$row,'key'=>$key))
                    @endforeach
                    </tbody>
                @endforeach
            </table>
            @include("admin.public.page",array('data'=>$data,'set'=>$set))
        </div>
    </div>
@stop