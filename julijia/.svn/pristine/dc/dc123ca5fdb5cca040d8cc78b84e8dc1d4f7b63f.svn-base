<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/3
 * Time: 18:02
 */?>
@section('footer_js')
    <script type="text/javascript" src="/js/public/My97DatePicker/WdatePicker.js"></script>
@stop

@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
				<span class="action">
                广告位置管理 - 新增位置
                </span>
                    </h3>

                    <h5>
				<span class="action-span">
					<a href="{{url('admin/ads/ads')}}" class="btn btn-warning click-loading">
                        <i class="iconfont">&#xe6d4;</i>
                        返回广告列表
                    </a>
				</span>
                    </h5>
                </div>
            </div>
        </div>


        <form class="form-horizontal form" action="{{url('admin/ads/saveadstype')}}" method="post" novalidate>
            {{ Form::token() }}
            <div class="table-content m-t-30 ">
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">标题：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="name" placeholder="请输入位置标题"
                                       datatype="*1-100"  tipsrmsg="请输入广告名称" errormsg="请输入100内的字符"
                                       value="{{isset($res->name)?$res->name:''}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">位置编码：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="position" placeholder="请输入位置编码"
                                       datatype="s1-60"  tipsrmsg="请输入位置编码" errormsg="请输入100内的英文字符" value="{{isset($res->position)?$res->position:''}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">广告尺寸：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="size" placeholder="请输入广告位置大小"
                                       datatype="s1-60"  tipsrmsg="请输入广告位置大小例如200X200" errormsg="请输入100内的英文字符" value="{{isset($res->size)?$res->size:''}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">起始时间：</span>
                        </label>
                        <div class="col-sm-8">
                          <div class="form-control-wrap">
                             <input type="text" class="form-control w100" name="start_time"  id="start_time"
                                    onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"
                                    value="{{ isset($res->start_time)?$res->start_time:''}}">
                                至
                              <input type="text" class="form-control w100"
                                     name="end_time" id="end_time"
                                     onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"
                                     value="{{isset($res->end_time)?$res->end_time:''}}">

                          </div>
                        </div>
                    </div>
                </div>


                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">状态：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select type="text" class="form-control valid" name="status" datatype="*" >
                                    <option value="1" @if($res->status ==1)  selected="selected" @endif> 正常</option>
                                    <option value="0" @if($res->status ==0)  selected="selected" @endif>禁用</option>
                                </select>
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field p-b-30">
                    <div class="form-group">
                        <label for="text4" class="col-sm-4 control-label"></label>
                        <div class="col-xs-8">
                            <input type="button" id="btn_submit" value="保 存" class="btn btn-primary">
                            <input type="hidden" id="id"  name='id' value="{{isset($res->id)?encode($res->id):''}}" >
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@stop


