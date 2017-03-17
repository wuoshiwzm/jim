@section('title','线下门店')
@section('content')
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>
                    <span class="action">线下门店</span>
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
                        <span>关键字查询：</span>
                    </label>
                    <div class="form-control-wrap">
                        <input type="text" id="searchmodel-keyword" class="form-control" name="name" value="{{$set['name']}}" placeholder="请输入名称">
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <input type="submit" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                <input type="button" id="btn_search" value="新增" class="btn btn-primary m-r-5" onclick="location='{{url('admin/user/shop/create')}}'">
            </div>
        </form>
    </div>
    <div class="common-title">
        <div class="ftitle">
            <h3>属性列表</h3>
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
                <!--排序样式sort默认，asc升序，desc降序-->
                <th class="w80" style="cursor: pointer;">门店ID</th>
                <th class="w100" style="cursor: pointer;">门店名称</th>
                <th class="w80" style="cursor: pointer;">门店地址</th>
                <th class="w80"  style="cursor: pointer;">门店管理员</th>
                <th class="w100" style="cursor: pointer;">申请时间<span class="sort desc"></span></th>
                <th class="handle w100">操作</th>
            </tr>
            </thead>
            <tbody>
            <!--以下为循环内容-->
            @foreach( $data as $row )
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->m_name}}</td>
                <td>{{$row->address}}</td>
                <td>{{$row->m_manager}}</td>
                <td>{{$row->created_at}}</td>
                <td class="handle">
                    <a href="{{url('admin/user/shop/'.encode($row->id).'/edit')}}">编辑</a>&nbsp;&nbsp;
                    <a href="javascript:;" class="dele_d" onclick="delShop({{"'".encode($row->id)."'"}});">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!-- 分页 -->
        @include('admin.public.page',array('data'=>$data,'set'=>$set))
    </div>
    <input type="hidden" id="msg" value="{{Session::get('msg')}}">
    {{ Form::token() }}
</div>
@stop
@section('footer_js')
    <script type="text/javascript" src="/js/admin/shop.js?v={{Config::get('tools.adminJsTime')}}"></script>
@stop