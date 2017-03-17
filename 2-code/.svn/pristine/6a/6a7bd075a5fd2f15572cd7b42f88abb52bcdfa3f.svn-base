<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/13
 * Time: 15:34
 */?>
@section('title')
    CMS -  添加新闻
@stop

@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
				<span class="action">
                CMS_Page -  添加新闻
                </span>
                    </h3>

                    <h5>
				<span class="action-span">
					<a href="{{url('admin/newsart')}}" class="btn btn-warning click-loading">
                        <i class="iconfont">&#xe6d4;</i>
                        返回资讯列表
                    </a>
				</span>
                    </h5>
                </div>
            </div>
        </div>


        <form class="form-horizontal form" action="{{url('/admin/cms/page/savepage')}}" method="post" novalidate>
            {{ Form::token() }}
            <div class="table-content m-t-30 ">
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">页面标题：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="title"
                                       datatype="*1-200"  tipsrmsg="请输入页面标题" errormsg="标题为1-200字符" value="{{isset($info)?$info->title:''}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">URL：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="identifier" value="{{isset($info)?$info->identifier:''}}"
                                       datatype="s3-60"  tipsrmsg="请输入页面URL" errormsg="URl地址为2-60个英文字母">
                                <span class="Validform_checktip"></span>
                                <p>生成后的地址为：www.domain.com/page/url.html</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">关键字：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="meta_keywords" value="{{isset($info)?$info->meta_keywords:''}}"   ignore="ignore"
                                       datatype="*1-300"  tipsrmsg="请输入页面关键字" errormsg="关键字为1-300字符">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">关键字描述：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <textarea name="meta_description"  class="form-control valid" rows="6" style="height:100px">{{isset($info)?$info->meta_description:''}}</textarea>
                                <span class="Validform_checktip"></span>
                                <p>如果不填写，默认为关键字</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">状态：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select type="text" class="form-control valid" name="status">
                                    <option value="1" @if(isset($info)&&@$info->status ==1)  selected="selected" @endif>激活</option>
                                    <option value="0" @if(isset($info)&&@$info->status ==0)  selected="selected" @endif >禁用</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">页面样式：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <textarea name="content_heading"  class="form-control valid" rows="6"   style="height:100px">{{isset($info)?$info->meta_description:''}}</textarea>
                                <p>可填写样式或者引用外部css文件</p>
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">内 容：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <textarea class="form-control valid" rows="6" style="height:100px" id="page_content"
                                          name="content" datatype="*"  tipsrmsg="请输入新闻关键字" errormsg="关键字为1-300字符">{{isset($info)?$info->content:''}}</textarea>
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">排序：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="sort_order"  value="{{isset($info)?$info->sort_order:''}}" ignore="ignore"
                                       datatype="*1-300"  tipsrmsg="请输入页面关键字" errormsg="关键字为1-300字符">
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
                            <input type="hidden"  name="id" value="{{isset($info)?encode( $info->id):''}}" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('footer_js')
    <script type="text/javascript" src="/js/public/My97DatePicker/WdatePicker.js"></script>
    <script charset="utf-8" src="/js/public/kindeditor/kindeditor.js"></script>
    <script>
        KindEditor.ready(function(K) {
            K.create('#page_content', {
                items: ['source','fullscreen', 'undo', 'redo','cut',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull','indent', 'outdent', 'subscript',
                    'superscript','title', 'fontname', 'fontsize','bold','italic','underline','strikethrough','removeformat', '|','image',
                    'link', 'unlink'],
                afterBlur: function ()
                {
                    this.sync();
                },
                afterChange: function () {
                    var content = this.text();
                    $("#page_content").val(content);
                }
            });
        });
    </script>

@stop


