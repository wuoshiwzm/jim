@section('title')
    全部退款退货
@stop
@section('left')
    @include('member.public.left_center')
@stop


@section(('content'))
 <style>
     .admin_form .addimg02 {
         float: left;
         margin-bottom: 10px;
         margin-right: 8px;
     }

     .zhuce {
         clear: both;
         color: #999;
         font-size: 12px;
     }
 </style>
    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce2"></div>
            <div class="double-bounce1"></div>
        </div>

        <div class="table_div_h">
            <h2>我的订单&nbsp;&nbsp;-&nbsp;&nbsp;<font>退款退货</font></h2>
        </div>
        <!--订单切换-->
        <div class="table_div">
            <div class="order-step">
                <!--完成步骤为dl添加current样式，完成操作内容后会显示完成时间-->
                <dl class="current">
                    <dt>买家 申请退款</dt>
                    <dd class="bg"><font>1</font></dd>
                    <dd class="bg02"></dd>
                    <dd class="bg01"></dd>

                </dl>
                <dl class="">
                    <dt>商家 处理退款申请</dt>
                    <dd class="bg"><font>2</font></dd>
                    <dd class="bg02"></dd>
                    <dd class="bg01"></dd>
                </dl>
                <dl class="">
                    <dt>退款完成</dt>
                    <dd class="bg"><font>3</font></dd>
                    <dd class="bg02"></dd>
                    <dd class="bg01"></dd>
                </dl>

            </div>

        </div>

        <div class="table_div">
            @include('member.public.item_info')

            <div class="order-an02">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">我要退货</li>
                        <li>我要退款（无需退货）</li>
                    </ul>
                    <div class="layui-tab-content">

                        {{--form1--}}
                        <div class="layui-tab-item layui-show">
                            <div class="admin_form">
                                <form class="layui-form m-form form" action="{{url('member/refund/create_refund')}}"
                                      method="post">
                                    {{Form::token()}}
                                    <input type="hidden" name="type" value="2">
                                    <input type="hidden" name="orderId" value="{{$orderInfo->id}}">
                                    <input type="hidden" name="orderItemId" value="{{$orderItem->id}}">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">
                                            <span class="red">*</span>退款原因</label>
                                        <div class="layui-input-inline">

                                            <select name="reason"
                                                    datatype="*"
                                                    errormsg="请输入评价" tipsrmsg="请输入评价">
                                                <option value="">请选原因</option>
                                                @foreach($orderBackReasons as $reason)
                                                    <option value="{{$reason->id}}">{{$reason->value}}</option>
                                                @endforeach
                                            </select>
                                            <span class="Validform_checktip"></span>
                                        </div>
                                    </div>


                                    <div class="layui-form-item">
                                        <label class="layui-form-label">退款金额</label>
                                        <div class="layui-input-block">
                                            <label class="layui-form-txt">
                                                {{$orderInfo->pay_amount*($orderItem->row_total / $orderInfo->total_amount)}}元
                                                <input type="hidden" name="price" value="{{$orderInfo->pay_amount*($orderItem->row_total / $orderInfo->total_amount)}}">
                                            </label>
                                        </div>
                                    </div>


                                    <div class="layui-form-item">
                                        <label class="layui-form-label"><span class="red">*</span>退款说明</label>
                                        <div class="layui-input-block">
                                            <textarea name="desc" class="layui-textarea w80b f_left"
                                                      placeholder="填写具体退款说明" autocomplete="off"
                                                      datatype="*" name="content"
                                                      errormsg="请填写说明" tipsrmsg="请填写说明"
                                            ></textarea>
                                            <span class="Validform_checktip"></span>
                                        </div>
                                    </div>


                                    <div class="layui-form-item">
                                        <label class="layui-form-label">上传图片</label>
                                        <div class="layui-input-block">
                                            <div class="addimg addimg02">
                                                <a href="javascript:;" class="qie_img02">
                                                    <img onclick="getImgTemplet( this,'refund_huo' )"
                                                         src="/images/admin/addimg.png"
                                                         width="80" height="80"></a>
                                                <input type="hidden" id="refund_huo" name="refund" autocomplete="off"/>
                                            </div>
                                            <div class="zhuce">单张图片不能超过3M，可多上传三张图片，支持JPG、BMP、GIF、PNG</div>
                                        </div>
                                    </div>


                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn">提交退货申请</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        {{--form2--}}
                        <div class="layui-tab-item">
                            <div class="admin_form">
                                <form class="layui-form m-form form" action="{{url('member/refund/create_refund')}}"
                                      method="post">
                                    {{Form::token()}}
                                    <input type="hidden" name="type" value="2">
                                    <input type="hidden" name="orderId" value="{{$orderInfo->id}}">
                                    <input type="hidden" name="orderItemId" value="{{$orderItem->id}}">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">
                                            <span class="red">*</span>是否收货
                                        </label>
                                        <div class="layui-input-block">
                                            <input type="radio" name="is_delivery" value="1" title="已收货">
                                            <div class="layui-unselect layui-form-radio"><i
                                                        class="layui-anim layui-icon"></i><span>已收货</span></div>
                                            <input type="radio" name="is_delivery" value="0" title="未收货"
                                                   checked="checked">
                                            <div class="layui-unselect layui-form-radio layui-form-radioed"><i
                                                        class="layui-anim layui-icon"></i><span>未收货</span></div>
                                        </div>
                                    </div>


                                    <div class="layui-form-item">
                                        <label class="layui-form-label">
                                            <span class="red">*</span>退款原因</label>
                                        <div class="layui-input-inline">

                                            <select name="reason"
                                                    datatype="*"
                                                    errormsg="请输入评价" tipsrmsg="请输入评价">


                                                <option value="">请选原因</option>
                                                @foreach($orderBackReasons as $reason)
                                                    <option value="{{$reason->id}}">{{$reason->value}}</option>
                                                @endforeach
                                            </select>
                                            <span class="Validform_checktip"></span>
                                        </div>
                                    </div>


                                    <div class="layui-form-item">
                                        <label class="layui-form-label">退款金额</label>
                                        <div class="layui-input-block">
                                            <label class="layui-form-txt">{{$orderInfo->pay_amount*($orderItem->row_total / $orderInfo->total_amount)}}元</label>
                                            <input type="hidden" name="price" value="{{$orderInfo->pay_amount*($orderItem->row_total / $orderInfo->total_amount)}}">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <label class="layui-form-label"><span class="red">*</span>退款说明</label>
                                        <div class="layui-input-block">
                                            <textarea name="desc" class="layui-textarea w80b f_left"
                                                      placeholder="填写具体退款说明" autocomplete="off"
                                                      datatype="*" name="content"
                                                      errormsg="请填写说明" tipsrmsg="请填写说明"
                                            ></textarea>
                                            <span class="Validform_checktip"></span>
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <label class="layui-form-label">上传图片</label>
                                        <div class="layui-input-block">
                                            <div class="addimg addimg02">
                                                <a href="javascript:;" class="qie_img02">
                                                    <img onclick="getImgTemplet( this,'refund' )"
                                                         src="/images/admin/addimg.png"
                                                         width="80" height="80"></a>
                                                <input type="hidden" id="refund" name="refund" autocomplete="off"/>

                                            </div>
                                            <div class="zhuce">单张图片不能超过3M，可多上传三张图片，支持JPG、BMP、GIF、PNG</div>
                                        </div>

                                    </div>


                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn">提交退款申请</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>


@stop
@section('js')
    <script type="text/javascript" src="{{asset('js/member/layui.js')}}"></script>
    <script>
        layui.use('form', function () {
            var form = layui.form(); //只有执行了这一步，部分表单元素才会修饰成功
        });
        layui.use('element', function () {
            var element = layui.element(); //Tab的切换功能，切换事件监听等，需要依赖element模块
        });
    </script>
    <script type="text/javascript" src="{{asset('js/admin/multiPic.js')}}"></script>
@stop