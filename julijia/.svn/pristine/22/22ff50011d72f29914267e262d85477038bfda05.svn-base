@section('title')
    收货地址
@stop

@section('left')
    @include('member.public.left_config')
@stop

@section('content')
    <style>
        .layui-form-label {
            width: 120px !important;
        }
        .admin_form .w80b{
            width: 73% !important;
        }
    </style>

    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>

        <div class="admin_form">
            <div class="h-title">
                收货地址<font>Shipping Address</font>
            </div>

            <form class="layui-form m-form" action="{{url('member/config/address')}}" method="post">
                {{ Form::token() }}

                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="red">*</span>选择省市区</label>
                    <div class="layui-input-inline">
                        <select name="province" id="address" lay-filter="province">
                            <option value="">请选择省</option>

                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="city" id="address1" lay-filter="city">
                            <option value="">请选择市</option>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="area" id="address2" lay-filter="area">
                            <option value="">请选择县/区</option>
                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="red">*</span>详细地址</label>
                    <div class="layui-input-block">
                                            <textarea class="layui-textarea w80b f_left"
                                                      placeholder="填写具体详细地址" autocomplete="off"
                                                      datatype="*3-100" name="address"
                                                      errormsg="详细地址长度不足" tipsrmsg="请填写详细地址"
                                            ></textarea>
                        <span class="Validform_checktip"></span>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="red">*</span>收货人信息</label>
                    <div class="layui-input-block">

                        <input type="text" class="layui-input w80b f_left "
                               placeholder="填写具体收货人信息" autocomplete="off"
                               datatype="*" name="name"
                               errormsg="请填写收货人信息" tipsrmsg="请填写说明"/>
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                　
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="red">*</span>手机号码</label>
                    <div class="layui-input-block">

                        <input type="text" class="layui-input w80b f_left "
                               placeholder="请填写收货人手机号码" autocomplete="off"
                               datatype="m" name="phone"
                               errormsg="手机号码格式错误" tipsrmsg="请填写手机号码"/>
                        <span class="Validform_checktip"></span>
                    </div>
                </div>
                　
                <div class="layui-form-item">
                    <label class="layui-form-label">邮政编码</label>
                    <div class="layui-input-block">

                        <input type="text" class="layui-input w80b f_left "
                               placeholder="填写具体邮政编码" autocomplete="off"
                               datatype="n6-6" name="zipcode" ignore="ignore"
                               errormsg="邮政编码格式错误" tipsrmsg="请填写邮政编码"/>
                        <span class="Validform_checktip"></span>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">电话</label>
                    <div class="layui-input-block">

                        <input type="text" class="layui-input w80b f_left "
                               placeholder="电话" autocomplete="off"  name="tel"
                               />
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label"> </label>
                    <div class="layui-input-block">
                        <input type="checkbox" name="status" title="设为默认地址">
                        <div class="layui-unselect layui-form-checkbox layui-form-checked">
                            <span>设为默认地址</span><i>
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

        <div class="admin_table">
            <div class="h-title">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <th width="10%">收货人</th>
                        <th width="20%">所在地区</th>
                        <th>详细地址</th>
                        <th width="10%">邮编</th>
                        <th width="16%">电话/手机</th>
                        <th width="18%" class="border_rn">操作</th>
                    </tr>

                    @foreach($addrs as $addr)
                        <tr>
                            <td>{{$addr->name}}</td>
                            <td>{{isset($addr->province)?$addr->province:''}}，{{isset($addr->city)?$addr->city:''}}
                                ，{{isset($addr->district)?$addr->district:''}}</td>
                            <td>{{$addr->address}}</td>
                            <td>{{$addr->zipcode}}</td>
                            <td>{{$addr->phone}}</td>
                            <td class="border_rn">
                                <a href="{{url('member/config/address/'.encode($addr->id)."/edit")}}">修改</a>
                                <a href="javascript:;" onclick="delAddr({{"'".encode($addr->id)."'"}});">删除</a>
                                @if($addr->status == 1)

                                    <a href="##" class="color_on">默认地址</a>
                                @else
                                    <a href="{{url('member/config/address/set_default/'.encode($addr->id))}}">设为默认</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach


                </table>
            </div>
        </div>


    </div>

@stop

@section('js')
    <script type="text/javascript" src="{{asset('js/member/config.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/public/location_pick/location_pick.js')}}"></script>
@stop