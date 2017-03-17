@section('title')
    资讯新闻 -  添加新闻
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


        <form class="form-horizontal form" action="{{url('admin/newsart/')}}" method="post" novalidate>
            <input type="hidden" name="method" value="PUT">
            {{ Form::token() }}
            <div class="table-content m-t-30 ">

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">分类名称：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select class="form-control valid w100" name="category_id">
                                    @foreach($cates as $k=>$v)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
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
                                <input type="text" class="form-control valid" name="title" placeholder="请输入新闻标题"
                                       datatype="*1-200"  tipsrmsg="请输入新闻标题" errormsg="名称为1-200字符">
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
                                       datatype="*1-200"  tipsrmsg="请输入新闻关键字" errormsg="关键字为1-200字符">
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
                                       datatype="*1-300"  tipsrmsg="请输入新闻关键字" errormsg="关键字为1-300字符">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">是否允许评论：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select type="text" class="form-control valid" name="is_comment">
                                        <option value="1">允许</option>
                                        <option value="0">不允许</option>
                                </select>
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
                                       onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"
                                       datatype="*"  tipsrmsg="请输入生效时间" errormsg="生效时间">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">新闻状态：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select type="text" class="form-control valid" name="status">
                                    <option value="1">显示</option>
                                    <option value="0">不显示</option>
                                </select>
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
                                          datatype="*"  tipsrmsg="请输入新闻关键字" errormsg="关键字为1-300字符"></textarea>
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
                                          name="content" datatype="*"  tipsrmsg="请输入新闻关键字" errormsg="关键字为1-300字符"></textarea>
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

@section('footer_js')
    <script type="text/javascript" src="/js/public/My97DatePicker/WdatePicker.js"></script>
    <script charset="utf-8" src="/js/public/kindeditor/kindeditor.js"></script>
    <script>
        KindEditor.ready(function(K) {
            K.create('#news_content', {
                items: ['fullscreen', 'undo', 'redo','cut',
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
                    $("#news_content").val(content);
                }
            });
        });
    </script>

@stop

