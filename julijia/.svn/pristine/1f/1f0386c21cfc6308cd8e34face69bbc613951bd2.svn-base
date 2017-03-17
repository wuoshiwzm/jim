@section('title','审核')
@section('admincss')
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css').'?v='.Config::get('tools.adminJsTime')}}">
@stop
@section('content')
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>
                    <span class="action">供应商-审核</span>
                </h3>
                <h5>
				<span class="action-span">
					<a href="{{url('admin/user/supplier')}}" class="btn btn-warning click-loading">
                        <i class="iconfont">&#xe6d4;</i>
                        返回入驻列表
                    </a>
				</span>
                </h5>
            </div>
        </div>
    </div>
    <form class="form-horizontal"  method="post" action="{{url('admin/user/supplier/'.encode($user->id))}}">
        {{ Form::token() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="table-content m-t-30">
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">公司名称：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->name}}<span style="color:#06F; margin-left:16px;">营业证:{{$user->yingyehao}}</span></label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">公司类型：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">@if( $user->type == 1 )有限公司@elseif( $user->type == 2 )集团公司@elseif( $user->type == 3 )股份公司@endif</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">联系人：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->lianxiren}}</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">联系电话：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->phone}}&nbsp;&nbsp;{{$user->tel}}</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">邮编：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->postcode}}</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">公司地址：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->address}}</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">法人：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->faren}}</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">注册资金：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->zhuce_zijin}}</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">开户行：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->bank}}</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">公司账号：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->bank_num}}</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="ng-binding">申请时间：</span>
                    </label>
                    <div class="col-sm-8">
                        <label class="control-label cur-p m-r-10">{{$user->created_at}}</label>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                        <span class="text-danger ng-binding">*</span>
                        <span class="ng-binding">邮件服务：</span>
                    </label>
                    <div class="col-sm-8">
                        <div class="form-control-box">
                            <input type="hidden"  value="1" aria-required="true" class="valid">
                            <div>
                                <label class="control-label cur-p m-r-10"><input type="radio" name="status" value="2" aria-invalid="false">审核通过</label>
                                <label class="control-label cur-p m-r-10"><input type="radio" name="status" value="3" aria-invalid="false">审核未通过</label>
                            </div>
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
<input type="hidden" id="msg" value="{{Session::get('msg')}}">
@stop
@section('footer_js')
    <script type="text/javascript" src="/js/admin/supplier.js?v={{Config::get('tools.adminJsTime')}}"></script>
@stop