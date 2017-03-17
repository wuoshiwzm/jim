@section("title")
    投诉详情页
@stop
@section("admincss")
    <link type="text/css" rel="stylesheet" href="{{url("/css/admin/jquery.mCustomScrollbar.css")}}">
    <link type="text/css" rel="stylesheet" href="{{url("/css/admin/loaders.css")}}">
    <link type="text/css" rel="stylesheet" href="{{url("/css/admin/styles.css")}}">
    <style>
        .phone{ padding:20px 30px 0px 30px; font-family:"微软雅黑";}
        .phone h1{ height:40px; line-height:34px; font-size:16px; color:##24A0D6; border-bottom:1px solid #24A0D6}
        .phone ul { padding:20px; }
        .phone ul li{ clear:both; }
        .phone ul li font{  float:left; display:block; width:70px;}
        .phone ul li .textarea{ height:120px;width:340px; padding:6px 10px; line-height:30px; font-size:16px; border:1px solid #ddd;float:left; margin-top:6px;}
        .phone .button{ width:160px; color:#fff; height:36px; line-height:36px; background:#24A0D6; border:0; float:left;margin-top:6px;font-weight:bold; font-size:16px; margin-top:16px;}
    </style>
@stop
@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">商品订单 -- 投诉详情</span>
                    </h3>
                    <h5>
				<span class="action-span">
					<a href="/admin/complain/index" class="btn btn-warning click-loading">
                        <i class="iconfont"></i>
                        返回投诉列表
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
                                <a href="##" target="_blank">{{$complain->item->product_name}}}}</a>
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
                                <span>{{$complain->user->real_name}}</span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <span>订单编号</span>
                                ：
                            </dt>
                            <dd>
						<span>
							<a href="##" class="c-blue">{{$complain->order->order_sn}}</a>
						</span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <span class="letter-spacing">单价</span>
                                ：
                            </dt>
                            <dd>
                                <span>￥{{$complain->item->price}} * {{$complain->item->num}}（数量）</span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <span class="letter-spacing">快递</span>
                                ：
                            </dt>
                            <dd>
                                <span>￥{{$complain->item->shipping_fei}}</span>
                            </dd>
                        </dl>
                    </div>
                    <div class="refund-info border-none">
                        <dl>
                            <dt>
                                <span>投诉编号</span>
                                ：
                            </dt>
                            <dd>
                                <span>{{$complain->feedback_sn}}</span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <span>投诉原因</span>
                                ：
                            </dt>
                            <dd>
                                <span>{{$complain->reason->value}}</span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>
                                <span>投诉内容</span>
                                ：
                            </dt>
                            <dd>
                                <span>{{$complain->content}}</span>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="order-right">
                    <h3 style=" font-weight:bold;">投诉</h3>
                    <div class="refund-operate">
                        <ul>
                            <li class="operate-steps">
                                <i class="iconfont"></i>
                                <span>
                                    @if($complain->status == 1)
                                        投诉状态：买家提起投诉，等待平台处理
                                    @else
                                        平台已处理
                                    @endif
                                </span>
                            </li>
                            @if($complain->status == 1)
                                <li class="operate-prompt">
                                    <input value="去处理" class="btn btn-primary chuli" type="button">
                                </li>
                            @endif
                            <li class="operate-prompt">
                                买家提起投诉，请平台联系买家友好协商处理
                            </li>
                        </ul>
                    </div>

                    <h3 style=" font-weight:bold;">凭  证</h3>
                    <div class="refund-operate">
                        <ul>
                            <li class="operate-steps pic_m_r">
                                @if($complain->img !=NULL)
                                    @foreach( json_decode($refund->image) as $img)
                                        <img src="{{$img}}" class="goods-thumb">
                                    @endforeach
                                @endif
                            </li>
                        </ul>
                    </div>

                    <h3 style=" font-weight:bold;">操作日志</h3>
                    <div class="refund-operate">
                        <ul class="hover_li">
                            @foreach($complain->log()->get() as $log)
                                <li class="operate-steps pic_m_r color_bg02">
                                    <table>
                                        <tbody>
                                        <tr class="order-item">
                                            <td class="w200">
                                                <a href="##" target="_blank" class="img_40">{{$log->option_name}}</a>
                                            </td>
                                            <td class="w200">
                                                @if($log->option_id == 1)
                                                    用户
                                                @else($log->option_id == 2)
                                                    后台管理员
                                                @endif
                                            </td>
                                            <td class="w300">
                                                {{$log->remark}}
                                            </td>
                                            <td class=" ">
                                                时间：{{$log->created_at}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--商品信息-->
    </div>
    <div class="phone" style="display: none">
        <h1>处理投诉</h1>
        <form id="replay_form">
            <ul>
                <li style="padding-bottom:8px; font-size:14px;" >
                        <span class="ng-binding">投诉回复：</span>
                </li>
                <li>
                    <input type="hidden" id="c_id"  name="c_id" value="{{$complain->id}}">
                    <textarea class="textarea" name="content"></textarea>
                </li>
                <li><input  type="button" value="回复"  class="button reply"></li>
            </ul>
        </form>
    </div>
    <script>
        $(function(){
            $(".chuli").click(function(){
                //重置表单
                $("#replay_form")[0].reset();
                index = layer.open({
                    type: 1,
                    title:false,
                    shadeClose: true,
                    shade: 0.6,
                    area: ['444px', '350px'],
                    content: $(".phone")
                });
            })
            //点击回复
            $(".reply").click(function(){
                $.post('/admin/complain/reply',$("#replay_form").serialize(),function(data){
                    if(data.status == 1) {
                        layer.msg("处理成功",{icon:1,time:800})
                    }else {
                        layer.msg("处理失败",{icon:2,time:800})
                    }
                    layer.close(index);
                })
            })
        })
    </script>
@stop
