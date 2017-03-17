@section('title')
新闻分类
@stop
@section('admincss')
<meta content="" name="description">
<meta content="" name="author">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
<link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
@stop

<!-- ================== BEGIN BASE CSS STYLE ================== -->

<!-- ================== END BASE CSS STYLE ================== -->
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
				<span class="action"   style="font-weight:bold !important; ">
                新闻分类
                </span>
			</h3>

		</div>
	</div>
</div>


	<form id="SystemConfigModel" class="form-horizontal" method="post" novalidate action="{{url('admin/newscate/add')}}">

	<div class="table-content m-t-10">


        <div class="simple-form-field">
          <div class="form-group">
              <label class="col-sm-6 control-label">
                <span class="ng-binding">上级分类：</span>
              </label>
              <div class="col-sm-6">
                 <div class="form-control-box">
                    <select class="form-control valid w250" name="news_cate_pid">
                    <option value="0">根目录</option>
                    @foreach($cateName as $k =>$v)
                    <option value={{$v->news_cate_id}}>{{$v->news_cate_name}}</option>
                    @endforeach
                    </select>
		         </div>
              </div>
          </div>
        </div>

        <div class="simple-form-field">
          <div class="form-group">
              <label class="col-sm-6 control-label">
                <span class="ng-binding">分类名称：</span>
              </label>
              <div class="col-sm-6">
                 <div class="form-control-box">
                    <input type="text" class="form-control valid w250" name="news_cate_name">
		         </div>
              </div>
          </div>
        </div>


		<div class="simple-form-field p-b-30">
			<div class="form-group">
				<label for="text4" class="col-sm-6 control-label"></label>
				<div class="col-xs-6">
					<input type="submit" id="btn_submit" value="确认保存" class="btn btn-primary w250">
					<!-- <input type="button" id="btn_submit" value="确认保存" class="btn btn-primary w250"> -->
				</div>
			</div>
		</div>

	</div></form>
</div>

@stop
