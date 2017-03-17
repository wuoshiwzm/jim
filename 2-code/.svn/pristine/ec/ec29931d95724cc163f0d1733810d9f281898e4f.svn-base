@section("title")
添加角色
@stop
@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">角色管理 - 添加角色</span>
                    </h3>
                    <h5>
				<span class="action-span">
					<a href="{{url("/admin/suite/index")}}" class="btn btn-warning click-loading">
                        <i class="iconfont"></i>
                        返回角色管理
                    </a>
				</span>
                    </h5>
                </div>
            </div>
        </div>

        <form id="SystemConfigModel" class="form-horizontal m-form" method="post" action="{{url('/admin/suite/save')}}" novalidate="">
            <div class="table-content m-t-30">

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">角色名称：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input class="form-control"  datatype="*" errormsg="请输入" tipsrmsg="请输入" placeholder="请输入角色名称" type="text">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">权限分配：</span>
                        </label>
                        <div class="col-sm-8 quanxian">
                            <div class="form-control-box ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field p-b-30">
                    <div class="form-group">
                        <label for="text4" class="col-sm-4 control-label"></label>
                        <div class="col-xs-8">
                            <input name="back_url" value=" " type="hidden">
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
    <script>
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
        //
    </script>
@stop