@section('title','品牌列表')
@section('content')
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>
                    <span class="action">品牌列表</span>
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
                        <span>品牌名称：</span>
                    </label>
                    <div class="form-control-wrap">
                        <input type="text" id="searchmodel-keyword" class="form-control" name="name" value="{{$set['name']}}" placeholder="请输入名称">
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <input type="button" id="btn_search" value="查询" class="btn btn-primary m-r-5" onclick="searchCheck( this )">
                <input type="button" id="btn_search" value="新增" class="btn btn-primary m-r-5" onclick="location='{{url('admin/product/brand/create')}}'">
            </div>
        </form>
    </div>
    <div class="common-title">
        <div class="ftitle">
            <h3>品牌列表</h3>
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
                <th class="w80">编号</th>
                <th class="w100 active">品牌名称</th>
                <th class="w80">首字母</th>
                <th class="w80">品牌logo</th>
                <th class="w100">推广图</th>
                <th class="w100">是否推荐</th>
                <th class="w100">网址</th>
                <th class="w100 text-c">排序</th>
                <th class="handle w100">操作</th>
            </tr>
            </thead>
            <tbody>
            <!--以下为循环内容-->
            @foreach( $data as $row )
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->pinyin}}</td>
                <td>
                    <div class="goodsPicBox pull-left m-r-10">
                        <a href="javascript:void(0);">
                            <img src="{{getImagesUrl('brand',$row->id,$row->logo)}}" class="goods-thumb" width="36" height="36">
                        </a>
                    </div>
                </td>
                <td>
                    <div class="goodsPicBox pull-left m-r-10">
                        <a href="javascript:void(0);">
                            <img src="{{getImagesUrl('brand',$row->id,$row->extension)}}" class="goods-thumb" width="36" height="36">
                        </a>
                    </div>
                </td>
                <td>{{$row->recommend?'推荐':'不推荐'}}</td>
                <td>{{$row->url}}</td>
                <td class="text-c">
                    <input type="text" class="form-control small" value="{{$row->sort}}" maxlength="3" onchange="editSort({{$row->id}},'brand',this);">
                </td>
                <td class="handle">
                    <a href="{{url('admin/product/brand/'.encode($row->id).'/edit')}}">编辑</a>&nbsp;&nbsp;
                    <a href="javascript:;" class="dele_d" onclick="delBrand({{"'".encode($row->id)."'"}});">删除</a>
                </td>
            </tr>
            @endforeach
            <!-- 没有数据显示 -->
            @include('admin.public.null',array('data'=>$data,'cols'=>9))
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
    <script type="text/javascript" src="/js/admin/brand.js?v={{Config::get('tools.adminJsTime')}}"></script>
@stop