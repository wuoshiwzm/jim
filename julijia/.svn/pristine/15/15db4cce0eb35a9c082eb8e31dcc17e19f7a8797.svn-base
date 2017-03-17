<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/2/5
 * Time: 15:18
 */?>

@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">通讯设置</span>
                    </h3>
                    <h5>
				<span class="action-span">
					<a href="##" class="btn btn-warning click-loading">
                        <i class="iconfont">&#xe6d4;</i>
                        返回列表
                    </a>
				</span>
                    </h5>
                </div>
            </div>
        </div>

        <form id="SystemConfigModel" class="form-horizontal m-form"  method="post"  novalidate action="/admin/system/cofnig?type=tongxin">
            <div class="table-content m-t-30">

                {{--基本设置--}}
                <div class="simple-form-field" style=" border:1px silver;">
                    <div>
                        <label style="margin-left: 35px">联系方式</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">客服邮箱：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control"  ignore="ignore"  datatype="e"  name="core[kefu_email]" value="{{getConfig('core','kefu_email')}}" >
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">系统管理员邮箱：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control"  ignore="ignore"    name="core[system_email]" value="{{getConfig('core','system_email')}}" >
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                    {{--运输配置--}}
                    <div class="simple-form-field" style=" border:1px silver;">
                        <div>
                            <label style="margin-left: 35px">邮件服务器设置</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">
                                <span class="ng-binding">邮件账号：</span>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-control-box">
                                    <input type="text" class="form-control"  ignore="ignore"  datatype="e"  name="core[mail_server_account]"   value="{{getConfig('core','mail_server_account')}}"   >
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">
                                <span class="ng-binding">邮件密码：</span>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-control-box addimg">
                                    <input type="password"  class="form-control"   name="core[mail_server_password]" value="{{getConfig('core','mail_server_password')}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">
                                <span class="ng-binding">邮件发送主机：</span>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-control-box">
                                    <input type="text" class="form-control"  ignore="ignore"  datatype="3-120"  name="core[mail_server_addr]"   value="{{getConfig('core','mail_server_addr')}}"   >
                                    <span class="Validform_checktip"></span>
                                </div>
                                <div class="help-block help-block-t">
                                    <div class="help-block help-block-t">例如：imap.qq.com 或者 smtp.qq.com</div></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">
                                <span class="ng-binding">邮件发送端口：</span>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-control-box">
                                    <input type="text" class="form-control"  ignore="ignore"  datatype="3-120"  name="core[mail_server_port]"   value="{{getConfig('core','mail_server_port')}}"   >
                                    <span class="Validform_checktip"></span>
                                </div>
                                <div class="help-block help-block-t">
                                    <div class="help-block help-block-t">请填写邮件服务器发送的端口 常用端口25，465，993，143</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simple-form-field p-b-30">
                        <div class="form-group">
                            <label for="text4" class="col-sm-4 control-label"></label>
                            <div class="col-xs-8">
                                <input type="submit" id="btn_submit" value="确认提交" class="btn btn-primary">
                            </div>
                        </div>
                    </div>

                </div>
        </form>
    </div>

    <style>
        .form-group{ line-height: 20px}
    </style>

@stop
@section('footer_js')
    <script>
        ss =  "<?php echo Session::get('msg') ?>";
        if(ss!=''){
            layer.alert(ss);
        }
    </script>


@stop


