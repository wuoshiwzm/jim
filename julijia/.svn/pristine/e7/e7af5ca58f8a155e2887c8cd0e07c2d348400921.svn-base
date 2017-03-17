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
                广告管理 - 新增广告
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


        <form class="form-horizontal form" action="{{url('admin/ads/saveads')}}" method="post" novalidate>
            {{ Form::token() }}
            <div class="table-content m-t-30 ">

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">广告位置：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select class="form-control valid w100" name="pid" >
                                    @foreach($typelist  as $k=>$v)
                                        <option value="{{$v->id}}" @if(isset($res->pid)&&$res->pid==$v->id) selected="selected"  @endif>{{$v->name}}</option>
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
                            <span class="ng-binding">广告标题：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="name" placeholder="请输入广告名称"
                                       datatype="*1-100"  tipsrmsg="请输入广告名称" errormsg="请输入100内的字符"
                                       value="{{isset($res)?$res->name:''}}"
                                >
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">广告类型：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select type="text" class="form-control valid" name="type">
                                    <option value="1" @if(isset($res)&&$res->type==1) selected="selected"@endif>固定URL</option>
                                    <option value="2" @if(isset($res)&&$res->type==2) selected="selected"@endif>单独页面</option>
                                    <option value="3" @if(isset($res)&&$res->type==3) selected="selected"@endif>分类</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">链接地址：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="type_value"
                                       datatype="*1-300"  tipsrmsg="请输入页面或者图片链接地址" errormsg="请输入url链接地址"  value="{{isset($res)?$res->type_value:''}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">图片：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box addimg">
                                <a href="javascript:;">
                                    <img  onclick="getImgTemplet( this,'img' )"
                                       src="{{isset($res)&&$res->img!=''?Config::get('tools.imagePath').'ads/'.$res->pid.'/'.$res->img:'/images/admin/addimg.png'}}"
                                          width="100" height="100">
                                </a>
                                <input type="hidden" id="img"  name="img" value="{{isset($res->img)?$res->img:''}}"/>
                            </div>
                            <div class="help-block help-block-t"><div class="help-block help-block-t">请上传图片，做为广告所用图片</div></div>
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
                                <input type="text" class="form-control valid" name="sort"
                                       datatype="*1-300"  tipsrmsg="请输入新闻关键字" errormsg="关键字为1-300字符" value="{{isset($res)?$res->sort:''}}">
                                <span class="Validform_checktip"></span>
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
                                <select type="text" class="form-control valid" name="status">
                                    <option value="1" @if(isset($res)&&$res->status==1) selected="selected" @endif>允许</option>
                                    <option value="0" @if(isset($res)&&$res->status==2) selected="selected" @endif>不允许</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field p-b-30">
                    <div class="form-group">
                        <label for="text4" class="col-sm-4 control-label"></label>
                        <div class="col-xs-8">
                            <input type="button" id="btn_submit" value="保 存" class="btn btn-primary">
                            <input type="hidden" id="id"  name='id' value="{{isset($res)?$res->id:''}}" >
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function getImgTemplet( index, id )
        {

            layer.open({
                type: 2,
                title:false,
                shadeClose: true,
                shade: 0.8,
                area: ['460px', '480px'],
                content: ['/admin/get/imgtemplet/'+id,'no']
            });
        }

        function setPathUrl( path, index  )
        {
            $("#"+index).parents('.addimg').find('img').attr('src','/media/temp/'+path);
            $("#"+index).val(path);
        }
    </script>

@stop


