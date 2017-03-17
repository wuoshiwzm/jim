@section('title','分类管理')
@section('content')
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>
                    <span class="action">分类管理 - 管理</span>
                </h3>
            </div>
        </div>
    </div>
    <!-- 温馨提示 -->
    <div class="explanation m-b-10">
        <div class="title">
            <i class="arrow-icon explain-checkZoom"></i>
            <i class="iconfont">&#xe6a7;</i>
            <h4>温馨提示</h4>
        </div>
        <ul class="explain-panel">
            <li>
                <span>当店主发布商品时可以选择商品分类，用户在前台可以通过商品分类查询商品</span>
            </li>
        </ul>
    </div>
    <!--搜索-->
    <div class="search-term">
        <div class="simple-form-field">
            <input type="button" id="btn_search" value="新增" class="btn btn-primary m-r-5" onclick="location='{{url('admin/product/category/create')}}'">
        </div>
        <div class="simple-form-field">
            <input type="button" id="set_Screen" value="一键生成列表页筛选数据" class="btn btn-primary m-r-5" onclick="setScreen()">
        </div>
    </div>
    <!--列表-->
    <div id="table_list" class="table-responsive m-t-10">
        <div class="common-title">
            <div class="ftitle">
                <h3>分类列表</h3>
                <h5>(&nbsp;共<span data-total-record="true">{{count($data)}}</span>条记录&nbsp;)</h5>
            </div>
            <div class="operate">
                <a class="reload" href="javascript:location.reload();" title="刷新数据"><i class="iconfont">&#xe6fb;</i></a>
            </div>
        </div>
        <table id="list-table" class="table table-hover">
            <thead>
            <tr>
                <th><a class="expand-toggle category-all" onclick="setBaseAll( this );">全部收缩</a>分类名称</th>
                <th class="text-c">商品数量</th>
                <th class="text-c">是否显示</th>
                <th class="text-c">排序</th>
                <th class="handle">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $data as $row )
            <tr class="{{$row->leavel}}" data-id="{{$row->id}}" data-parent-id="{{$row->parent_id}}">
                <td>
                    <div onclick="setTypes(this)" style="cursor:pointer;">
                        <img src="/css/admin/image/s_jian.png" width="18" @if($row->leavel==1) style="margin-left:2.5em ;" @elseif($row->leavel==2) style="margin-left:7.5em ;" @else style="margin-left:12.5em ;" @endif class="icon-image"  border="0" >
                        <a href="javascript:void(0);">{{$row->name}}</a>
                    </div>
                </td>
                <td class="handle text-c num">{{$row->categoryToProductFlat()->count()}}</td>
                <!-- <td>默认规格</td> -->
                <td class="text-c"><font class="f14">{{$row->status?'是':'否'}}</font></td>
                <td class="text-c"><input type="text" class="form-control small" value="{{$row->sort}}" maxlength="3" onchange="editSort({{$row->id}},'category',this);"></td>
                <td class="handle">
                    <a href="{{url('admin/product/category/'.encode($row->id).'/edit')}}">编辑</a>
                    <span>|</span>
                    <a href="javascript:;" class="del border-none dele_d"  onclick="delCategory({{"'".encode($row->id)."'"}});">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <input type="hidden" id="msg" value="{{Session::get('msg')}}">
    {{ Form::token() }}
</div>
@stop
@section('footer_js')
    <script type="text/javascript" src="/js/admin/category.js?v={{Config::get('tools.adminJsTime')}}"></script>
@stop