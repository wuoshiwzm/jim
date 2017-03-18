@section('title')
    我的投诉
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
            <h2>我的投诉</h2>
        </div>
        <!--订单切换-->
        <div class="table_div">
            <form class="layui-form so_from" action="">

                <div class="layui-form-item">
                    <label class="layui-form-label">投诉编号</label>
                    <div class="layui-input-inline w150">
                        <input type="text" name="feedbackId" placeholder="投诉编号" autocomplete="off" class="layui-input w40b ">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">投诉类型</label>
                    <div class="layui-input-inline w150">
                        <select name="status">
                            <option value="" selected="">全部</option>
                            <option value="1">平台未确认</option>
                            <option value="2">平台已确认</option>
                        </select>
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
                        <th width="12%">投诉编号</th>
                        <th width="12%">订单编号</th>
                        <th>投诉商品</th>
                        <th width="12%">投诉原因</th>
                        <th width="12%">申请时间</th>
                        <th width="12%">状态</th>
                        <th width="14%">操作</th>
                    </tr>


                    @foreach($data as $feedback)
                        @if($feedback->item)
                        <tr>
                            <td>{{$feedback->feedback_sn}}</td>
                            <td>{{$feedback->order->order_sn}}</td>


                            <td>
                                <dl>
                                    <dt><a href="##" target="_blank">
                                                <img src="{{ getImgSize( 'feedback', $feedback->id, $feedback->img ) }}{{$feedback->img}}"
                                                     class="goods-thumb"
                                                     width="60" height="60">
                                        </a></dt>
                                    <dd><a href="##" target="_blank">{{$feedback->item->product->name}}</a></dd>
                                </dl>
                            </td>


                            <td>{{$feedback->reason->value}}</td>
                            <td>{{$feedback->created_at}}</td>
                            <td>
                                @if($feedback->status == 1)
                                    买家申请，待卖家确认
                                @elseif($feedback->status ==2)
                                    <a href="##">已经回复 点击查看</a>
                                @endif
                            </td>

                            <td class="operation"><a href="##" onclick="delFeedback({{"'".encode($feedback->id)."'"}})">取消</a>
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
    <script>

        /**
         * Created by Administrator on 2016/11/4 0004.
         */
        function delFeedback(id) {

            var token = $("input[name='_token']").val();
            layer.confirm('确定要删除此投诉吗？', {
                btn: ['确定', '取消']
            }, function () {
                $.post('/member/feedback/remove_feedback/' + id, {_token: token}, function (msg) {
                    if (msg.status == '0') {
                        layer.msg(msg.msg, {icon: 1});
                        window.location.reload();
                    } else {
                        layer.msg(msg.msg, {icon: 2});
                    }
                }, 'json')
            });
        }
    </script>

@stop