@section('title','密码重置')
@section('categoryCss','banner_nav02')
@section('css')
    {{--    <link type="text/css" rel="stylesheet" href="{{asset('css/images/icon.png')}}">--}}
    <link type="text/css" rel="stylesheet" href="{{asset('css/admin/iconfont.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/frontend/css_all.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/frontend/login.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/member/layui.css')}}">
    {{--    <link type="text/css" rel="stylesheet" href="{{asset('css/admin/layer.css')}}">--}}
@stop

@section('content')


    <div class="shopping">
        <div class="shopping_nei">
            <div class="shopping_nei_order">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>

                <div class="table_div_map">
                    <a href="/">商城首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;忘记密码
                </div>


                @if(Session::has('msg'))
                    @if(is_array(Session::has('msg')))
                        @foreach(Session::has('msg') as $msg)
                            <p class="alert"></p>
                    @endforeach
                @endif
            @endif

            <!--找回密码-->
                <div class="table_div">
                    <div class="login_zhao">
                        <h2>密码重置</h2>

                        <form class="layui-form m-form" action="{{url('member/reset_pass')}}">
                            {{ Form::token() }}
                            <div class="layui-form-item">
                                <label class="layui-form-label"><span class="red">*</span>手机号码</label>

                                <div class="layui-input-block">
                                    <input type="text" name="phone" placeholder="请输入手机号"
                                           autocomplete="off"
                                           class="layui-input w40b f_left02"
                                           datatype="m" id="phone"
                                           errormsg="手机号格式错误" tipsrmsg="请输入手机号" nullmsg="您未输入手机号">
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">
                                    <span class="red">*</span>验 证 码</label>

                                <div class="layui-input-block">
                                    <input type="text" name="code" placeholder="请输入验证码" autocomplete="off"
                                           class="layui-input w20b f_left02"
                                           datatype="*" ajaxurl="/member/register/check_sms"
                                           errormsg="请输入验证码" tipsrmsg="请输入验证码">
                                    <input type="button"  id="yzm"
                                           value="获取验证码"/>
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>


                            <div class="layui-form-item">
                                <label class="layui-form-label">重置密码</label>
                                <div class="layui-input-block">
                                    <input type="password" name="newPassword" placeholder="请输入重置密码"
                                           autocomplete="off"
                                           class="layui-input w40b f_left02"
                                           datatype="*1-20"
                                           errormsg="重置密码应为6-20位" tipsrmsg="请输入重置密码" nullmsg="您未输入重置密码">
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label">确认密码</label>

                                <div class="layui-input-block">
                                    <input type="password" name="password2" placeholder="请输入确认密码"
                                           autocomplete="off"
                                           class="layui-input w40b f_left02"
                                           datatype="*"
                                           recheck="newPassword"
                                           errormsg="确认密码与原密码不一致" tipsrmsg="确认密码必须与原密码一致"
                                           nullmsg="您未输入确认密码">
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>




                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <input type="submit" class="layui-btn w30b" value="立即提交"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="msg" value="{{Session::get('msg')}}"/>
@stop
@section('footer_js')

    <script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/layui/layui.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/layui/layui.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/Validform/Validform_v5.3.2_min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/Validform/rules.js')}}"></script>
    <script type="text/javascript" src="{{url('js/member/er_admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/frontend/resms.js')}}"></script>
    <script>
        //Demo
        layui.use('form', function () {
            var form = layui.form();
        });
    </script>
@stop