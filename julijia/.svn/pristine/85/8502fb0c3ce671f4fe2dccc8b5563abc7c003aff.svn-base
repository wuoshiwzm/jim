@section('title')
    我的评论
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
            <h2>我的评论</h2>
        </div>
        <!--订单切换-->
        <div class="table_div">
            <form class="layui-form so_from" action="{{url('member/review')}}">
                <div class="layui-form-item">
                    <label class="layui-form-label">评价等级</label>
                    <div class="layui-input-inline">
                        <select name="reviewClass">
                            <option value="3">好评</option>
                            <option value="2" selected="">中评</option>
                            <option value="1">差评</option>
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
                        <th width="14%">订单编号</th>
                        <th>宝贝信息</th>
                        <th width="22%">评价信息</th>
                        <th width="22%">评价内容</th>
                        <th width="16%">操作</th>
                    </tr>


                    @foreach($data as $feedback)
                        @if($feedback->item)
                        <tr>
                            <td>{{$feedback->order->order_sn}}</td>
                            <td>
                                <dl>
                                    <dt><a href="##" target="_blank">


                                            <img src="{{ getImgSize( 'goods', $feedback->item->product_id,  $feedback->item->product->small_image) }}">
                                           </a></dt>

                                    <dd><a href="##" target="_blank">
                                            {{$feedback->item->product_name}}
                                        </a></dd>
                                </dl>
                            </td>



                            <td>
                                <div class="ng-binding">
							<span class="text-c">
								<a class="score-icon icon-0 m-r-3"></a>
                                <?php
                                switch ($feedback->leavel) {
                                    case 1:
                                        echo "很差";
                                        break;

                                    case 2:
                                        echo "差";
                                        break;

                                    case 3:
                                        echo "一般";
                                        break;

                                    case 4:
                                        echo "好";
                                        break;

                                    case 5:
                                        echo "非常好";
                                        break;
                                }

                                ?>

							</span>
                                    <span class="star-icon text-c">
								<!---->
                                        <!---->
                                        <!---->
								<i class="icon-1"></i>
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
                                        <!---->
								<i class="icon-1"></i>
                                        <!---->
                                        <!---->
							</span>
                                </div>
                            </td>
                            <td>{{$feedback->content}}</td>
                            <td class="operation"><a href="{{url('member/review/detail/'.encode($feedback->id))}}">查看详情</a></td>
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