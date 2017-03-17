@section("title")
编辑角色
@stop
@section("admincss")
    <link rel="stylesheet" type="text/css" href="{{url("js/public/jstree/dist/themes/default/style.min.css")}}" />
@stop
@section("content")
    <div class="page" >
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">角色管理 - 编辑角色</span>
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

        <form id="SystemConfigModel" class="form-horizontal m-form" action="{{url("/admin/suite/update")}}" method="post" novalidate="">
            <div class="table-content m-t-30">

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">角色名称：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input class="form-control"  name="group_name" datatype="*"
                                       value="{{$group->group_name}}"
                                       errormsg="请输入角色名称" tipsrmsg="请输入" placeholder="请输入角色名称" type="text">
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
                                <div id="tree">
                                </div>
                            </div>
                            <input type="hidden" name="privilege" data-type="*"  value="" errormsg="请选择权限" id="privilege">
                        </div>
                    </div>
                </div>

                <div class="simple-form-field p-b-30">
                    <div class="form-group">
                        <label for="text4" class="col-sm-4 control-label"></label>
                        <div class="col-xs-8">
                            <input name="group_id" value="{{$group->group_id}}" type="hidden">
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
    <script type="text/javascript" src="{{url('js/public/jstree/dist/jstree.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/Validform/Validform_v5.3.2_min.js')}}"></script>
    @if(Session::has('msg'))
    <script type="text/javascript" src="{{asset('js/public/layer/layer.js')}}"></script>
    <script>
        var msg = "{{Session::get('msg')}}" ;
        layer.msg(msg);
    </script>
    @endif
    <script>
        var data = {{$data}}
        $('#tree').jstree({
            "core" : {
                "themes" : {
                    "variant" : "large"
                },
                "data":data
            },
            "plugins" : ["checkbox" ]
        }).on("changed.jstree", function (e, data) {

            var nodes = data.instance.get_selected(true);
            var ids = [];
            $.each(nodes, function(i, n) {
                ids.push(n.id);
                ids.push(n.parents);
            });
            //js默认使用,连接符
            var selids = ids.join();
            //过滤,'#'符号
            var node_ids = selids.replace(/,#/g, "");
            //去除重复
            var select_node = unique(node_ids);

            $('#privilege').val(select_node);


        });
        //转换成数组，去掉重复，再组合好。
        function  unique(str) {
            var ary = str.split(",");
            // 去重的算法
            var json = {};
            for (var i = 0; i < ary.length; i++){
                if (ary[i] != "")
                {
                    json["a" + ary[i]] = ary[i];
                }
            }
            // 查看结果
            var str2 = "";
            for (var key in json){
                str2 += "," + json[key];
            }
            var s = str2.toString();
            //去掉第一个逗号
            if (s.substr(0, 1) == ','){
                s = s.substr(1);
            }
            return s;
        }

        //初始化验证//
        $(".m-form").Validform({
            altercss:'Validform_skate',
            ignoreHidden:false,
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
    </script>

@stop