@section('title')

    收货地址
@stop
@section('left')
    @include('member.public.left_config')
@stop

@section('admincss')
@stop

@section('content')

    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>

        <div class="admin_form">
            <div class="h-title">
                收货地址<font>Shipping Address</font>
            </div>
            <form class="layui-form m-form" action="{{url('member/config/address/'.$addrEdit->id)}}" method="post"
                  novalidate>
                <input type="hidden" name="_method" value="PUT">
                {{ Form::token() }}


                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="red">*</span>详细地址</label>
                    <div class="layui-input-block">
                                            <textarea class="layui-textarea w80b f_left"
                                                      placeholder="填写具体详细地址" autocomplete="off"
                                                      datatype="*3-100" name="address"
                                                      errormsg="详细地址长度不足" tipsrmsg="请填写详细地址"
                                            >{{$addrEdit->address}}</textarea>
                        <span class="Validform_checktip"></span>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="red">*</span>收货人信息</label>
                    <div class="layui-input-block">

                        <input type="text" class="layui-input w80b f_left"
                               placeholder="填写具体收货人信息" autocomplete="off"
                               datatype="*" name="name"
                               errormsg="请填写收货人信息" tipsrmsg="请填写说明"
                               value="{{$addrEdit->name}}"/>
                        <span class="Validform_checktip"></span>
                    </div>
                </div>


                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="red">*</span>手机号码</label>
                    <div class="layui-input-block">

                        <input type="text" class="layui-input w80b f_left"
                               placeholder="填写具体收货人信息" autocomplete="off"
                               datatype="m" name="phone"
                               errormsg="手机号码格式错误" tipsrmsg="请填写手机号码"
                               value="{{$addrEdit->phone}}"/>
                        <span class="Validform_checktip"></span>
                    </div>
                </div>




                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="red">*</span>电话</label>
                    <div class="layui-input-block">

                        <input type="text" class="layui-input w80b f_left"
                               placeholder="电话" autocomplete="off"
                               value="{{$addrEdit->tel}}"
                               datatype="*8-18" name="tel"
                               errormsg="电话格式错误" tipsrmsg="电话"
                        />
                        <span class="Validform_checktip"></span>
                    </div>
                </div>




                <div class="layui-form-item">
                    <label class="layui-form-label"> </label>
                    <div class="layui-input-block">
                        <input type="checkbox" name="status" title="设为默认地址" value="1">
                        <div class="layui-unselect layui-form-checkbox layui-form-checked"><span>设为默认地址</span><i
                                    class="layui-icon"></i></div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn">保存</button>
                    </div>
                </div>
            </form>
        </div>


    </div>

@stop

@section('js')
    <script type="text/javascript" src="{{asset('js/member/config.js')}}"></script>
@stop