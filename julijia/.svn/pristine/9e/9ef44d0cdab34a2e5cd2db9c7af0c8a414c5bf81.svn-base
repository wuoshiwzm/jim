@section("title")
    角色管理
@stop
@section("content")
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">管理 - 角色管理</span>
                    </h3>
                </div>
            </div>
        </div>

        <!--搜索-->
        <div class="search-term m-b-10"><form id="SearchModel" name="SearchModel" action="{{url("/admin/suite/index")}}" method="get">
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>名 称：</span>
                        </label>
                        <div class="form-control-wrap">
                            <input id="searchmodel-keyword" class="form-control" name="keyword" placeholder="请输入名称" type="text">
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <input id="btn_search" value="查询" class="btn btn-primary m-r-5" type="submit">
                    <input id="btn_search" value="添加" class="btn btn-warning  m-r-5" onclick="location='{{url('/admin/suite/add')}}'" type="button">
                </div>

            </form>
        </div>
        <!-- 工具栏（列表名称、列表显示项设置） -->

        <div class="common-title">
            <div class="ftitle">
                <h3>角色列表</h3>
                <h5>
                    (&nbsp;共
                    <span data-total-record="true">{{$group_num}}</span>
                    条记录&nbsp;)
                </h5>

            </div>
            <div class="operate">

                <a class="reload" href="" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="刷新数据">
                    <i class="iconfont"></i>
                </a>
            </div>
        </div>
        <!--列表内容-->
        <div class="table-responsive">
            <table id="table_list" class="table table-hover">
                <thead>
                <tr>
                    {{--<th class=" w100">排序<span class="sort"></span></th>--}}
                    <th class=" w100">编号</th>
                    <th class=" w200">角色名称</th>
                    <th class=" w150">创建时间</th>
                    <th class=" w150">修改时间</th>
                    <th class="handle w300">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $row)
                    <tr>
                        {{--<td>--}}
                        {{--<input class="form-control small" value="0" type="text">--}}
                        {{--</td>--}}
                        <td>
                            {{$row->group_id}}
                        </td>
                        <td>
                            {{$row->group_name}}
                        </td>

                        <td>
                            {{$row->created_at}}
                        </td>
                        <td>
                            {{$row->updated_at}}
                        </td>
                        <td class="handle">
                            <a href="{{url("/admin/suite/edit?".http_build_query(["group_id"=>$row->group_id]))}}">编辑</a>
                            <span>|</span>
                            <a href="javascript:void(0);" class="offsale-goods dele_user">删除</a>
                        </td>
                    </tr>
                @endforeach


                </tbody>

            </table>
            @include("admin.public.page",array('data'=>$groups,'set'=>$set))
        </div>
    </div>
@stop
@section("footer_js")
    <script type="text/javascript" src="{{url('js/admin/jquery.js')}}"></script>
    <script type="text/javascript" src="{{url('js/admin/bootstrap.merge.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/admin/bootstrap-switch.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/admin/common.js')}}"></script>
    <script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{url('js/admin/d_tan.js')}}"></script>
@stop