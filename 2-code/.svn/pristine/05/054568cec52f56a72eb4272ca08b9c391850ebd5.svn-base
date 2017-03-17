@section('title')
    新闻分类
@stop


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

	<form  class="form-horizontal form" action="{{url('admin/newscate/'.encode($data->id))}}"
           method="post"  novalidate>
    {{ Form::token() }}
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{$data->id}}">
	<div class="table-content m-t-10">


        <div class="simple-form-field">
          <div class="form-group">
              <label class="col-sm-6 control-label">
                <span class="ng-binding">上级分类：</span>
              </label>
              <div class="col-sm-6">
                 <div class="form-control-box">
                   <select class="form-control valid w250" name="pid">

                   <option value="0">根目录</option>

                   @foreach($cateName as $k =>$v)
                         @if( $v->id == $data->pid)
                           <option value={{$v->id}} selected="select"> {{$v->name}} </option>
                         @else
                           <option value={{$v->id}}> {{$v->name}} </option>
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
                    <input type="text" class="form-control valid w250" name="name" value="{{$data->name}}">
		         </div>
              </div>
          </div>
        </div>

        <div class="simple-form-field">
            <div class="form-group">
                <label class="col-sm-6 control-label">
                    <span class="ng-binding">关键字：</span>
                </label>
                <div class="col-sm-6">
                    <div class="form-control-box">
                        <input type="text" class="form-control valid w250" name="keyword" value="{{$data->keyword}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="simple-form-field">
            <div class="form-group">
                <label class="col-sm-6 control-label">
                    <span class="ng-binding">详细信息：</span>
                </label>
                <div class="col-sm-6">
                    <div class="form-control-box">
                        <textarea class="form-control valid w250" name="meta_desc">{{$data->meta_desc}}</textarea>
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
