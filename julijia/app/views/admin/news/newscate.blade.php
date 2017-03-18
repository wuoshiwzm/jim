@section('title')
	新闻分类
@stop


@section('content')

	<div class="page">
		<div class="fixed-bar">
		<div class="item-title">
			<div class="subject">
				<h3>
					<span class="action" style=" font-weight:bold !important;">资讯分类</span>
				</h3>
			</div>
		</div>
	</div>

	<!--搜索-->
	<div class="search-term m-b-10">

		<form  action="{{Request::url()}}" method="get">

			<div class="simple-form-field">
				<div class="form-group">
					<label class="control-label">
						<span>分类名称：</span>
					</label>

					<div class="form-control-wrap">
					<input type="text" id="searchmodel-keyword" class="form-control" name="keyword">
					</div>

				</div>
			</div>

			<div class="simple-form-field">
				<input type="submit" id="btn_search" value="查询" class="btn btn-primary m-r-5">
				<input type="button" id="btn_search" value="新增" class="btn btn-primary m-r-5"
					   onclick="location='{{url('admin/newscate/create')}}'">
			</div>

		</form>
</div>

<div class="common-title">
	<div class="ftitle">
		<h3>资讯分类</h3>

		<h5>
			(&nbsp;共
			<span data-total-record="true">309</span>
			条记录&nbsp;)
		</h5>

	</div>
	<div class="operate">

		<a class="reload" href="javascript:reload();" data-toggle="tooltip" data-placement="auto bottom"
		   title="" data-original-title="刷新数据">
			<i class="iconfont">&#xe6fb;</i>
		</a>

	</div>
</div>
	<!--列表内容-->
	<div class="table-responsive">
		<table id="table_list" class="table table-hover">
			<thead>
				<tr>
					<!--排序样式sort默认，asc升序，desc降序-->
					<th class="w100" style="cursor: pointer;">编号</th>
					<th class="w150" style="cursor: pointer;">父级分类</th>
					<th class="w150" style="cursor: pointer;">分类名称</th>
					<th class="handle w150">操作</th>
				</tr>
			</thead>
			<tbody>
				<!--以下为循环内容-->
				@foreach($data as $k => $v)
				<tr>
					<td>
						{{$v->id}}
					</td>
					<td>
						@if($v->pid == 0)
							顶级分类
						@endif
						@foreach($data as $a => $b)
							@if($v->pid == $b->id)
								{{$b->name}}
							@endif
						@endforeach
					</td>
					<td>
						{{$v->name}}
					</td>
					<td class="handle">
						<a href="{{url('admin/newscate/'.encode($v->id).'/edit')}}">编辑</a>&nbsp;&nbsp;
						<a href="javascript:;" class="dele_d" onclick="delNewscate({{"'".encode($v->id)."'"}});">
							删除</a>
					</td>
				</tr>
				@endforeach

			</tbody>

			</table>
			@include('admin.public.page',array('data'=>$data,'set'=>$set))

	</div>
{{ Form::token() }}
</div>


@stop
@section('footer_js')
<script type="text/javascript" src="{{url('js/admin/news.js')}}"></script>
@stop
