@section('title')
    会员积分
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
            <form class="layui-form so_from" action="">
                <div class="layui-form-item">
                    <label class="layui-form-label">订单编号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="title" placeholder="订单编号" autocomplete="off" class="layui-input w40b ">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label w120">退款退货单编号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="title" placeholder="退款退货单编号" autocomplete="off"
                               class="layui-input w40b "><span class="Validform_checktip"></span>
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
                        <th>商品信息/订单/退款单号</th>
                        <th width="8%">商品数量</th>
                        <th width="8%">退款金额</th>
                        <th width="10%">申请时间</th>

                        <th width="10%">类型</th>
                        <th width="10%">状态</th>
                        <th width="14%">操作</th>
                    </tr>

                    @foreach($data as $refund)

                        <tr>
                            <td>
                                <dl class="tab_dl">
                                    <dt><a href="##" target="_blank">
                                            <img src="../images/04.jpg"
                                                 class="goods-thumb" width="60" height="60"></a></dt>
                                    <dd><a href="##" target="_blank">的软</a></dd>
                                    <dd><font>订单编号</font>{{$refund->order_sn}}</dd>
                                    <dd><font>退款编号</font>{{$refund->back_sn}}</dd>
                                </dl>
                            </td>
                            <td>1件</td>
                            <td>¥
                                @if($refund->item)
                                    {{$refund->item->row_total}}
                                @endif
                            </td>

                            <td>{{date('Y-m-d h:i:s',strtotime($refund->created_at))}}</td>

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
                                            echo "<a href=" . url('member/refund/ship_back/' . encode($refund->id)) . ">已经审核通过，点击输入你的退货信息</a>";
                                        }
                                        break;

                                    case 3:
                                        echo "未发货";
                                        break;
                                    case 4:
                                        echo "运输中";
                                        break;

                                    case 5:
                                        echo "已收货";
                                        break;
                                    case 6:
                                        echo "退款";
                                        break;

                                }
                                ?>
                            </td>
                            <td class="operation"><a href="##">详情</a></td>
                        </tr>
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