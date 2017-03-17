@section('title')
资讯新闻 -  添加新闻
@stop
@section('admincss')
<meta content="" name="description">
<meta content="" name="author">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
<link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
@stop

<!--[if lt IE 9]>
      <script type="text/javascript" src="../js/html5shiv.min.js"></script>
      <script type="text/javascript" src="../js/respond.min.js"></script>
    <![endif]-->
<!-- ================== BEGIN BASE JS ================== -->
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
					<a href="new_list.html" class="btn btn-warning click-loading">
						<i class="iconfont">&#xe6d4;</i>
						返回资讯列表
					</a>
				</span>
			</h5>
		</div>
	</div>
</div>


		<form  class="form-horizontal form" action="{{url('admin/newsart')}}"  method="post"  novalidate>
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
                    <select class="form-control valid w100" name="news_cate_id">
										@foreach($cateName as $k=>$v)
										<option value="{{$v->news_cate_id}}">{{$v->news_cate_name}}</option>
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
                   <input type="text"  class="form-control valid" name="news_title">
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
                   <input type="text"  class="form-control valid" name="news_keywords">
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
                   <input type="text"  class="form-control valid" name="news_desc">
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
                   <input type="text"  class="form-control valid" name="news_timeshow">
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
                   <textarea class="form-control valid" rows="6" style="height:100px" name="news_abstract"></textarea>
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
                   <textarea class="form-control valid" rows="6" style="height:100px" name="news_content"></textarea>
                </div>
              </div>
          </div>
        </div>

        <div class="simple-form-field">
          <div class="form-group">
              <label class="col-sm-4 control-label">
                <span class="ng-binding">文章来源：</span>
              </label>
              <div class="col-sm-8">
                <div class="form-control-box">
                   <input type="text"  class="form-control valid w100" name="news_source"> URL地址 <input type="text"  class="form-control valid" name="news_url">
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

	</div></form>
</div>
@stop
