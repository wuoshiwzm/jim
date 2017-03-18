@section("title")
编辑用户
@stop
@section("admincss")
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
@stop
@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">
                            用户管理 - 编辑用户
                        </span>
                    </h3>
                    <h5>
				<span class="action-span">
					<a href="{{url("/admin/manage/index")}}" class="btn btn-warning click-loading">
                        <i class="iconfont"></i>
                        返回用户管理
                    </a>
				</span>
                    </h5>
                </div>
            </div>
        </div>

        <form id="SystemConfigModel" class="form-horizontal m-form" method="post" novalidate="" action="{{url('/admin/manage/save')}}" >
            <div class="table-content m-t-30">
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">用户名：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input class="form-control"  datatype="*3-20" disabled="disabled" ignore="ignore" errormsg="用户名在3~20位之间"
                                       tipsrmsg="请输入" name="account" type="text" value="{{$user->account}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">E-Mail：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input class="form-control"  datatype="e" errormsg="邮箱格式不正确" tipsrmsg="请输入"
                                       type="text" name="email" value="{{$user->email}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">姓名：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input class="form-control"  datatype="*"  tipsrmsg="请输入" type="text"
                                       name="fullname" value="{{$user->fullname}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">用户群组：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select class="form-control valid w180" name="group">
                                    @foreach($groups as $group)
                                        <option value="{{$group->group_id}}"
                                        @if($user->group_id == $group->group_id)
                                            selected="selected"
                                        @endif
                                            >{{$group->group_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding ">是否启用：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <div>
                                    <label class="control-label cur-p m-r-10">是</label>
                                    <input @if($user->status == 1) checked="checked" @endif
                                           name="status" datatype="*" errormsg="请选择是否启用" value="1" type="radio">
                                    <label class="control-label cur-p m-r-10"> 否 </label>
                                    <input  @if($user->status == 0) checked="checked" @endif name="status" value="0" type="radio">
                                    <span class="Validform_checktip"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field p-b-30">
                    <div class="form-group">
                        <label for="text4" class="col-sm-4 control-label"></label>
                        <div class="col-xs-8">
                            <input name="user_id" value="{{Input::get("user_id")}}" type="hidden">
                            <input id="btn_submit" value="确认保存" class="btn btn-primary" type="submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@section("footer_js")
    <script type="text/javascript" src="{{url('js/admin/jquery.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/Validform/Validform_v5.3.2_min.js')}}"></script>
    <script type="text/javascript">
        //初始化验证//
        $(".m-form").Validform({
            altercss:'Validform_skate',
            postonce:true,
            showAllError:true,
            postonce:true,
            tiptype:function(msg,o,cssctl){
                if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
                    var objtip=o.obj.parent().find(".Validform_checktip");
                    objtip.removeClass('Validform_skate');
                    cssctl(objtip,o.type);
                    objtip.text(msg);
                }else{
                    var objtip=o.obj.find("#msgdemo");
                    objtip.removeClass('Validform_skate');
                    cssctl(objtip,o.type);
                    objtip.text(msg);
                }
            },
        });
        $(".m-form").find('input').each(function() {
            $(this).focus(function () {
                if ($(this).val() == '') {
                    var msg = $(this).attr('tipsrmsg');
                    $(this).parent().find(".Validform_checktip").addClass('Validform_skate');
                    $(this).parent().find(".Validform_checktip").removeClass('Validform_wrong');
                    $(this).parent().find(".Validform_checktip").text(msg);
                } else {
                    $(this).parent().find(".Validform_checktip").removeClass('Validform_skate');
                }
            });
            $(this).blur(function () {
                if ($(this).val() == '') {
                    var msg = $(this).attr('errormsg');
                    $(this).parent().find(".Validform_checktip").removeClass('Validform_skate');
                    $(this).parent().find(".Validform_checktip").addClass('Validform_wrong');
                    $(this).parent().find(".Validform_checktip").text(msg);
                }
            });
        });
        //
    </script>
@stop