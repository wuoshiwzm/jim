@section('title','友情链接')
@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">友情链接</span>
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
                            <span>分   类：</span>
                        </label>
                        <div class="form-control-wrap">
                            <select name="pid" class="form-control" >
                                <option value="0"  @if( $set['pid'] == '0') selected="selected" @endif >全部</option>
                                @foreach($category as $row )
                                    <option value="{{$row->id}}" @if( $set['pid'] == $row->id) selected="selected" @endif >{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <input type="button" id="btn_search" value="查询" class="btn btn-primary m-r-5" onclick="searchCheck( this )">
                    <input type="button"  value="新增链接" class="btn btn-primary m-r-5" onclick="location='{{url('admin/link/create')}}'">
                </div>
            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>优惠券列表</h3>
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
                    <th class="w80">分类</th>
                    <th class="w80">名称</th>
                    <th class="w100">地址</th>
                    <th class="w50">状态</th>
                    <th class="w150">备注</th>
                    <th class="w70">更新时间</th>
                    <th class="handle w100">操作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                @foreach( $data as $row )
                    <tr>
                        <td>@if($row->pid == 0)首页@else @if(isset($row->linkToCategory->name)) {{$row->linkToCategory->name}} @endif @endif</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->url}}</td>
                        <td>{{$row->status?"启用":"禁用"}}</td>
                        <td>{{$row->content}}</td>
                        <td>{{$row->updated_at}}</td>
                        <td class="handle">
                            <a href="{{url('admin/link/edit/'.encode($row->id))}}">编辑</a>&nbsp;&nbsp;
                            <a href="javascript:;" class="dele_d"onclick="delLink({{"'".encode($row->id)."'"}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                            <!-- 没有数据显示 -->
                    @include('admin.public.null',array('data'=>$data,'cols'=>7))
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
    <script type="text/javascript" src="/js/admin/link.js?v={{Config::get('tools.adminJsTime')}}"></script>
@stop
