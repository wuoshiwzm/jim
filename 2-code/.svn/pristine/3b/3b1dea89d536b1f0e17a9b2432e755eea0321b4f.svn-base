@section('title')
新闻分类
@stop
@section('admincss')
<meta content="" name="description">
<meta content="" name="author">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
<link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
@stop

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

	<form  class="form-horizontal form" action="{{url('admin/newscate/'.encode($data->news_cate_id))}}"  method="post"  novalidate>
    {{ Form::token() }}
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="news_cate_id" value="{{$data->news_cate_id}}">
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
                     @if( $v->news_cate_id == $data->news_cate_pid)
                       <option value={{$v->news_cate_id}} selected="select"> {{$v->news_cate_name}} </option>
                     @else
                       <option value={{$v->news_cate_id}}> {{$v->news_cate_name}} </option>
                     @endif
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
                    <input type="text" class="form-control valid w250" name="news_cate_name" value="{{$data->news_cate_name}}">
		         </div>
              </div>
          </div>
        </div>


		<div class="simple-form-field p-b-30">
			<div class="form-group">
				<label for="text4" class="col-sm-6 control-label"></label>
				<div class="col-xs-6">
					<input type="button" id="btn_submit" value="确认保存" class="btn btn-primary w250">
				</div>
			</div>
		</div>

	</div></form>
</div>



@stop
