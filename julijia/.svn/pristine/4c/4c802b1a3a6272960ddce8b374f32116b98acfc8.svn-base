@section('content')

    <div class="shopping">
        <div class="shopping_nei">
            <div class="shopping_nei_order">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>

                <div class="table_div_map">
                    <a href="#">曼蒂首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;找回密码
                </div>


                @if(Session::has('msg'))
                    <p class="alert">{{ var_dump(Session::get('msg')); }}</p>
            @endif

                <!--找回密码-->
                <div class="table_div">
                    <div class="login_zhao">
                        <h2>找回密码</h2>
                        <form class="layui-form m-form form" action="">
                            <div class="layui-form-item">
                                <label class="layui-form-label">
                                    <span class="red">*</span>手机号码</label>
                                <div class="layui-input-block">
                                    <input type="text" name="phone" placeholder="手机号" autocomplete="off"
                                           class="layui-input w40b f_left" ignore="ignore" datatype="m"
                                           errormsg="请输入手机号" tipsrmsg="请输入手机号">
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label"><span class="red">*</span>验 证 码</label>
                                <div class="layui-input-block">
                                    <input type="text" name="code" placeholder="验证码" autocomplete="off"
                                           class="layui-input w20b f_left" ignore="ignore" datatype="*"
                                           errormsg="请输入验证码" tipsrmsg="请输入验证码">
                                    <button class="layui-btn w30b yzm">发送验证码</button>
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">重置密码</label>
                                <div class="layui-input-block">
                                    <input type="password" name="password" placeholder="新密码" autocomplete="off"
                                           class="layui-input w40b f_left" ignore="ignore" datatype="*6-10"
                                           errormsg="请输入新密码" tipsrmsg="请输入新密码最少6位">
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">确认密码</label>
                                <div class="layui-input-block">
                                    <input type="password" name="password2" placeholder="新密码" autocomplete="off"
                                           class="layui-input w40b f_left" ignore="ignore" datatype="*6-10"
                                           recheck="password" errormsg="您两次输入的账号密码不一致！">
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn w30b">确 定</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script type="text/javascript" src="{{asset('js/frontend/member.js')}}"></script>
@stop