@section('title')
    我的退款
@stop

@section('left')
    @include('member.public.left_center')
@stop

@section(('content'))

    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>

        <div class="table_div_h">
            <h2>退款列表</h2>
        </div>
        <!--订单切换-->
        <div class="table_div">
            <form class="layui-form so_from" action="{{url('member/refund')}}" method="post">
                {{Form::token()}}
                <div class="layui-form-item">
                    <label class="layui-form-label">订单编号</label>

                    <div class="layui-input-inline">
                        <input type="text" name="orderId" placeholder="订单编号"
                               autocomplete="off" class="layui-input w40b "
                               @if(isset($orderId))
                               value="{{$orderId}}"
                                @endif
                        >
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label w120">退款退货单编号</label>

                    <div class="layui-input-inline">
                        <input type="text" name="refundId" placeholder="退款退货单编号" autocomplete="off"
                               class="layui-input w40b "
                               @if(isset($refundId))
                               value="{{$refundId}}"
                                @endif
                        ><span class="Validform_checktip"></span>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn">查询</button>
                    </div>
                </div>
            </form>

            <div class="table_div_hd table_div_hd_table">

                <table cellpadding="0" cellspacing="0" class="order_tab">
                    <tr>
                        <th width="25%">商品信息/订单/退款单号</th>
                        <th width="8%">商品数量</th>
                        <th width="8%">退款金额</th>
                        <th width="10%">申请时间</th>

                        <th width="8%">类型</th>
                        <th width="15%">状态</th>
                        <th width="10%">操作</th>
                    </tr>

                    @foreach($data as $refund)
                        @if($refund->item)
                            <tr>
                                <td>
                                    <dl class="tab_dl">
                                        <dt><a href="/{{$refund->item->product_id}}.html" target="_blank">
                                                <img src="{{ getImgSize( 'goods', $refund->item->product_id, isset($refund->item->product->small_image)?$refund->item->product->small_image:'' ) }}"
                                                     class="goods-thumb" width="60" height="60"></a></dt>
                                        <dd><a href="/{{$refund->item->product_id}}.html"
                                               target="_blank">{{$refund->item->product_name}}</a></dd>
                                        <dd>订单 {{$refund->order_sn}}</dd>
                                        <dd>{{$refund->back_sn}}</dd>
                                    </dl>
                                </td>
                                <td>1件</td>
                                <td>¥
                                    @if($refund->item)
                                        {{$refund->item->row_total}}
                                    @endif
                                </td>

                                <td>{{date('Y-m-d H:i:s',strtotime($refund->created_at))}}</td>

                                <td>@if($refund->type == 1)
                                        退款
                                    @else($refund->type == 2)
                                        退货退款
                                    @endif
                                </td>
                                <td>
                                    <?php
                                    switch ($refund->status) {
                                        case 1:
                                            echo "未确认";
                                            break;

                                        case 2:
                                            if ($refund->type == 1) {
                                                echo "已经安排退款";
                                            } elseif ($refund->type == 2) {
                                                echo "已经确认，等待客户发货";
                                            }
                                            break;

                                        case 3:
                                            echo "未发货";
                                            break;
                                        case 4:
                                            echo "运输中";
                                            //  echo "<br><a target='_blank' href=" . url('member/refund/shipping' . encode($refund->id)) . " class='wl'>查看物流</a>";
                                            break;

                                        case 5:
                                            echo "已收货";
                                            break;
                                        case 6:
                                            echo "已退款";
                                            break;
                                    }
                                    ?>
                                </td>
                                <td class="operation">
                                    <a href="{{url('member/refund/process/' . encode($refund->id))}}">详情</a>
                                    @if($refund->status==2&& $refund->type ==2)
                                        <a href="{{url('member/refund/sendhuo/' . encode($refund->id))}}">发货</a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach


                </table>


                <div id="paging">

                    @include('member.public.page',array('data'=>$data,'set'=>$set))
                </div>


            </div>
        </div>
    </div>

@stop
@section('js')

@stop