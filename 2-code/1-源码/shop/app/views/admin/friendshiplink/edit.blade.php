@section('title','友情链接修改')
@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">友情链接-修改</span>
                    </h3>
                    <h5>
                <span class="action-span">
                    <a href="{{url('admin/link/index')}}" class="btn btn-warning click-loading">
                        <i class="iconfont">&#xe6d4;</i>
                        返回列表
                    </a>
                </span>
                    </h5>
                </div>
            </div>
        </div>
        <form id="SystemConfigModel" class="form-horizontal form"  action="{{url('admin/link/update')}}" method="post" >
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="table-content m-t-30">
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">链接位置：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select name="pid" class="form-control" >
                                    <option value="0" @if( $data->pid == 0) selected="selected" @endif >首页</option>
                                    @foreach($category as $row )
                                        <option value="{{$row->id}}" @if( $data->pid == $row->id) selected="selected" @endif >{{$row->name}}</option>
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
                            <span class="ng-binding">名称：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text"  class="form-control valid" placeholder="输入分类名称" name="title"  value="{{$data->title}}" ajaxurl="/admin/getonlyinfo?type=link&id={{$data->id}}" datatype="s2-20" tipsrmsg="请输入2-20位字符" errormsg="请输入2-20位字符（不包含特殊字符）" >
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">自定义url：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text"  class="form-control valid" placeholder="例如：http://www.julijia.cn" name="url" value="{{$data->url}}" ajaxurl="/admin/getonlyinfo?type=link&id={{$data->id}}" datatype="url" maxlength="100" tipsrmsg="请输入url地址" errormsg="url格式有误" >
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">描 	述：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <textarea class="form-control valid w500" rows="8" maxlength="50" aria-invalid="false" name="content">{{$data->content}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">是否显示：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <div>
                                    <label class="control-label cur-p m-r-10"><input type="radio" name="status" value="1"  @if($data->status==1)checked="checked"@endif>是</label>
                                    <label class="control-label cur-p m-r-10"><input type="radio" name="status" value="0"  @if($data->status==0)checked="checked"@endif>否</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">排 序：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text"  class="form-control valid w150" placeholder="0" name="sort" value="{{$data->sort}}" ignore="ignore" datatype="n1-3" maxlength="3" tipsrmsg="请输入1-3为正整数" errormsg="输入1-3为正整数">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field p-b-30">
                    <div class="form-group">
                        <label for="text4" class="col-sm-4 control-label"></label>
                        <div class="col-xs-8">
                            <input type="button" id="btn_submit" value="确认提交" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop