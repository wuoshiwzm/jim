@section('title','满减满送列表')
@section('content')
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>
                    <span class="action">满减满送</span>
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
                        <span>有效期：</span>
                    </label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control w100" name="from_date" value="{{$set['from_date']}}" onfocus="WdatePicker()"> 至 <input type="text" class="form-control w100" name="to_date" value="{{$set['to_date']}}" onfocus="WdatePicker()">
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>状 态：</span>
                    </label>
                    <div class="form-control-wrap">
                        <select name="status" class="form-control" >
                            <option value=""  @if( $set['status'] == '') selected="selected" @endif >全部</option>
                            <option value="1" @if( $set['status'] == 1) selected="selected" @endif >正常</option>
                            <option value="0" @if( $set['status'] == 0 && $set['status'] !='' ) selected="selected" @endif >作废</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>规则名称：</span>
                    </label>

                    <div class="form-control-wrap">
                        <input type="text" class="form-control" name="name" value="{{$set['name']}}">
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <input type="button" id="btn_search" value="查询" class="btn btn-primary m-r-5" onclick="searchCheck( this )">
                <input type="button"  value="新增规则" class="btn btn-primary m-r-5" onclick="location='{{Request::url().'/create'}}'">
            </div>
        </form>
    </div>

    <div class="common-title">
        <div class="ftitle">
            <h3>满减满送列表</h3>
            <h5>(&nbsp;共<span data-total-record="true">{{$data->getTotal()}}</span>条记录&nbsp;)</h5>
        </div>
        <div class="operate">
            <a class="reload" href="javascript:location.reload();" title="刷新数据"><i class="iconfont">&#xe6fb;</i></a>
        </div>
    </div>
    <!--列表内容-->
    <div class="table-responsive">
        <table id="table_list" class="table table-hover">
            <thead>
            <tr>
                <th class="w100">规则编号</th>
                <th class="w150">规则名称</th>
                <th class="w150">有效时间</th>
                <th class="w100">状态</th>
                <th class="w100">使用次数</th>
                <th class="handle w150">操作</th>
            </tr>
            </thead>
            <tbody>
            <!--以下为循环内容-->
            @foreach( $data as $row )
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->from_date}}&nbsp;&nbsp;{{$row->to_date}}</td>
                <td>{{$row->status?'正常':'作废'}}</td>
                <td>{{$row->userd_num}}次</td>
                <td class="handle">
                    <a href="{{Request::url().'/'.encode($row->id).'/edit'}}">编辑</a>&nbsp;&nbsp;
                    <a href="javascript:;" class="dele_d"onclick="delFullCut({{"'".encode($row->id)."'"}})">删除</a>
                </td>
            </tr>
            @endforeach
            <!-- 没有数据显示 -->
            @include('admin.public.null',array('data'=>$data,'cols'=>6))
            </tbody>
        </table>
        <!-- 分页 -->
        @include('admin.public.page',array('data'=>$data,'set'=>$set))
    </div>
</div>
<input type="hidden" id="msg" value="{{Session::get('msg')}}">
{{ Form::token() }}
@stop
@section('footer_js')
    <script type="text/javascript" src="/js/public/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="/js/admin/fullcut.js?v={{Config::get('tools.adminJsTime')}}"></script>
@stop
