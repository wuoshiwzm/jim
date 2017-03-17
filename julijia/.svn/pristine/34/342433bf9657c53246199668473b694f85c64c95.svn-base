@section('title')
    账号设置
@stop

@section('left')
    @include('member.public.left_config')
@stop

@section(('content'))
    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>

        <div class="admin_form">
            <div class="h-title">
                个人设置<font>Personal Settings</font>
            </div>
            <form class="layui-form m-form form" action="{{url('/member/config/store')}} ">
                {{ Form::token() }}


                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">昵称：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="alias"
                                       placeholder="昵称"
                                       datatype="*"
                                       errormsg="昵称" tipsrmsg="昵称"
                                       value="{{$userInfo->alias}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">真实名称：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="real_name"
                                       placeholder="真实名称"
                                       datatype="*"
                                       errormsg="真实名称" tipsrmsg="真实名称"
                                       value="{{$userInfo->real_name}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">qq：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="qq"
                                       placeholder="qq"
                                       datatype="*"
                                       errormsg="qq" tipsrmsg="qq"
                                       value="{{$userInfo->qq}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">微信：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="wechat"
                                       placeholder="微信"
                                       datatype="*"
                                       errormsg="微信" tipsrmsg="微信"
                                       value="{{$userInfo->wechat}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">家庭电话：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="home_phone"
                                       placeholder="家庭电话"
                                       datatype="n"
                                       errormsg="家庭电话" tipsrmsg="家庭电话"
                                       value="{{$userInfo->home_phone}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">手机：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="mobile_phone"
                                       placeholder="手机："
                                       datatype="n"
                                       errormsg="家庭电话" tipsrmsg="手机："
                                       value="{{$userInfo->mobile_phone}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">办公室电话：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="office_phone"
                                       placeholder="办公室电话"
                                       datatype="n"
                                       errormsg="办公室电话" tipsrmsg="办公室电话"
                                       value="{{$userInfo->office_phone}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">E-mail：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid"
                                       name="email"
                                       placeholder="Email"
                                       datatype="e"
                                       errormsg="email" tipsrmsg="mail"
                                       value="{{$userInfo->email}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">当前头像：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box addimg">
                                <a href="javascript:;">
                                    <img  onclick="getImgTemplet( this,'user' )"
                                          src="/images/admin/addimg.png" width="100" height="100"></a>
                                <input type="hidden" id="user"  name="user"/>
                            </div>
                        </div>
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
                                <input type="radio" name="sex" value="男" title="男"
                                       @if($userInfo->sex == 1) checked="checked" @endif >
                                <input type="radio" name="sex" value="女" title="女"
                                       @if($userInfo->sex === 0) checked="checked" @endif>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="layui-form-item">
                    <label class="layui-form-label">居住地</label>
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
                    <div class="layui-input-block">
                        <button class="layui-btn">立即提交</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@stop

@section('js')
    <script type="text/javascript" src="{{asset('js/public/location_pick/location_pick.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/member/config.js')}}"></script>
@stop