@section('title')
    投诉维权
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
            <h2>我的订单&nbsp;&nbsp;-&nbsp;&nbsp;<font>投诉维权</font></h2>
        </div>
        <!--订单切换-->


        <div class="table_div">

            @include('member.public.item_info')

            <div class="order-an02">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">我要投诉</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                            <div class="admin_form">
                                <form class="layui-form m-form form" action="{{url('member/feedback/create_feedback')}}"
                                      method="post">
                                    <input type="hidden" name="orderId" value="{{$orderInfo->id}}">
                                    <input type="hidden" name="itemId" value="{{$orderItem->id}}">

                                    {{Form::token()}}

                                    <div class="layui-form-item">
                                        <label class="layui-form-label">
                                            <span class="red">*</span>投诉原因</label>
                                        <div class="layui-input-inline">
                                            <select name="reasonId" datatype="*"
                                                    errormsg="请选择" tipsrmsg="请选择">
                                                <option value="">请选原因</option>
                                                @foreach($reasons as $reason)
                                                    <option value="{{$reason->id}}">{{$reason->value}}</option>
                                                @endforeach
                                            </select>

                                            <span class="Validform_checktip"></span>
                                        </div>
                                    </div>




                                    <div class="layui-form-item">
                                        <label class="layui-form-label"><span class="red">*</span>投诉说明</label>
                                        <div class="layui-input-block">
                                            <textarea name="desc" class="layui-textarea w80b f_left"
                                                      placeholder="填写具体投诉说明" autocomplete="off"
                                                      datatype="*"
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
                                                    <img onclick="getImgTemplet( this,'feedback' )"
                                                         src="/images/admin/addimg.png"
                                                         width="80" height="80"></a>
                                                <input type="hidden" id="feedback" name="feedback"/>

                                            </div>
                                            <div class="zhuce">单张图片不能超过3M，可多上传三张图片，支持JPG、BMP、GIF、PNG</div>
                                        </div>
                                    </div>



                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn">提交投诉</button>
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

    <script>
        layui.use('element', function () {
            var element = layui.element(); //Tab的切换功能，切换事件监听等，需要依赖element模块

        });

        $(function () {
            $('.star_ul a').hover(function () {
                $(this).addClass('active-star');
                $('.s_result').css('color', '#c00').html($(this).attr('title'))
            }, function () {
                $(this).removeClass('active-star');
                $('.s_result').css('color', '#333').html('请打分')
            });

        })
    </script>

    <script type="text/javascript" src="{{asset('js/admin/multiPic.js')}}"></script>


@stop