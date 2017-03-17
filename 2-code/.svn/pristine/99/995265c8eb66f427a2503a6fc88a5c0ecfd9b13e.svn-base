@section('title')
    资讯新闻 -  修改新闻
@stop

@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
				<span class="action">
                资讯新闻 - 添加新闻
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


        <form class="form-horizontal form" action="{{url('admin/newsart/'.encode($data->id))}}" method="post"
              novalidate>
            {{ Form::token() }}

            <input type="hidden" name="_method" value="PUT">
            <div class="table-content m-t-30 ">
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">分类名称：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select class="form-control valid w100" name="category_id" >

                                    @foreach($cateName as $k=>$v)
                                        @if($v->id == $data->category_id)
                                            <option value={{$v->id}} selected="selected">{{$v->name}}</option>
                                        @else
                                            <option value="{{$v->id}}">  {{$v->name}}</option>
                                        @endif
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
                            <span class="ng-binding">资讯标题：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="title"
                                       value="{{$data->title}}"
                                       datatype="*1-200" tipsrmsg="请输入新闻标题" errormsg="名称为1-200字符">
                                <span class="Validform_checktip"></span>
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
                                <input type="text" class="form-control valid" name="keywords"
                                       value="{{$data->keywords}}"
                                       datatype="*1-200" tipsrmsg="请输入新闻关键字" errormsg="关键字为1-200字符">
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
                                <input type="text" class="form-control valid" name="meta_desc"
                                       value="{{$data->meta_desc}}"
                                       datatype="*1-300" tipsrmsg="请输入新闻关键字" errormsg="关键字为1-300字符">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">生效时间：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control valid" name="beg_time"
                                       value="{{$data->beg_time}}"
                                       datatype="*"  tipsrmsg="请输入生效时间" errormsg="生效时间">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">摘 要：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <textarea class="form-control valid" rows="6" style="height:100px"
                                          name="desc_word"
                                    datatype="*"  tipsrmsg="请输入新闻关键字" errormsg="关键字为1-300字符">
                                    {{$data->detail->desc_word}}
                                </textarea>
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">内 容：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <textarea class="form-control valid" rows="6" style="height:100px" id="news_content"
                                          name="content" datatype="*"  tipsrmsg="请输入" errormsg="请输入">{{$data->detail->content}}</textarea>
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
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@stop
