@section('title')
    收货地址
@stop

@section('left')
    @include('member.public.left_config')
@stop



@section('content')
    <style>
        .layui-form-label{
            width: 120px !important;
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

            <form class="layui-form m-form form" action="{{url('member/config/address')}}" method="post">
                {{ Form::token() }}



                <div class="layui-form-item">
                    <label class="layui-form-label">选择省市区</label>
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

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">详细地址：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="address"
                                       placeholder="详细地址"
                                       datatype="*"
                                       errormsg="详细地址" tipsrmsg="详细地址">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

              　

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">收货人信息：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="name"
                                       placeholder="填写收货人姓名"
                                       datatype="*"
                                       errormsg="填写收货人姓名" tipsrmsg="填写收货人姓名">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>


　

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">手机号码：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="phone"
                                       placeholder="手机号码"
                                       datatype="m"
                                       errormsg="手机号码" tipsrmsg="手机号码">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

              　

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">邮政编码：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="zipcode"
                                       placeholder="邮政编码"
                                       datatype="n"
                                       errormsg="邮政编码" tipsrmsg="邮政编码">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>


　


                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            电话                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="tel"
                                       placeholder="电话"
                                       datatype="n"
                                       errormsg="电话" tipsrmsg="电话">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>


　


                <div class="layui-form-item">
                    <label class="layui-form-label"> </label>
                    <div class="layui-input-block">
                        <input type="checkbox" name="status" title="设为默认地址" >
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
                                ，{{isset($addr->area)?$addr->area:''}}</td>
                            <td>{{$addr->address}}</td>
                            <td>{{$addr->zipcode}}</td>
                            <td>{{$addr->phone}}</td>
                            <td class="border_rn">
                                <a href="{{url('member/config/address/'.$addr->id."/edit")}}">修改</a>&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;

                                @if($addr->status == 1)
                                    这是默认地址
                                @else
                                    <a href="javascript:;" onclick="delAddr({{"'".encode($addr->id)."'"}});">删除</a>
                                    &nbsp;
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
    <script>
        function delAddr(id) {
            var token = $("input[name='_token']").val();
            layer.confirm('确定要删除吗？', {
                btn: ['确定', '取消']
            }, function () {
                $.post('/member/config/address/' + id, {_method: 'DELETE', _token: token}, function (msg) {
                    if (msg.status == '0') {
                        layer.msg(msg.msg, {icon: 1});
                        location = location;
                    } else {
                        layer.msg(msg.msg, {icon: 2});
                    }
                }, 'json')
            });
        }

    </script>
    <script type="text/javascript" src="{{asset('js/public/location_pick/location_pick.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/member/config.js')}}"></script>
@stop