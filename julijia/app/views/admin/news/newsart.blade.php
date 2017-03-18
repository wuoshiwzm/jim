@section('title')
    资讯新闻
@stop
@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action" style=" font-weight:bold !important;">资讯新闻</span>
                    </h3>
                </div>
            </div>
        </div>

        <!--搜索-->
        <div class="search-term m-b-10">
            <form action="{{Request::url()}}" method="get">

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>分类名称：</span>
                        </label>
                        <div class="form-control-wrap">
                            <select id="##" class="form-control" name="category_id">
                                <option value="">不限制</option>
                                @foreach($cate as $a=>$b)
                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>标 题：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input type="text" id="searchmodel-keyword" class="form-control" name="title">
                        </div>

                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>状 态：</span>
                        </label>
                        <div class="form-control-wrap">
                            <select id="##" class="form-control" name="status">
                                <option value="">不限制</option>
                                <option value=0>不正常</option>
                                <option value=1>正常</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <input type="submit" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                    <input type="button" id="btn_search" value="新增新闻" class="btn btn-primary m-r-5"
                           onclick="location='{{url('/admin/newsart/create')}}'">
                </div>
            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>资讯分类</h3>

                <h5>
                    (&nbsp;共
                    <span data-total-record="true">{{count($data)}}</span>
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
                    <th class="w40 tcheck" style="cursor: pointer;">
                        <input type="checkbox" class="checkbox table-list-checkbox-all"   title="全选/全不选"></th>
                    <th class="w60" style="cursor: pointer;">编 号</th>
                    <th class="w200" style="cursor: pointer;">新闻标题</th>
                    <th class="w100" style="cursor: pointer;">分 类</th>
                    <th class="w100" style="cursor: pointer;">状 态</th>
                    <th class="w150" style="cursor: pointer;">生效时间<span class="sort desc"></span></th>
                    <th class="w200" style="cursor: pointer;">更新时间<span class="sort desc"></span></th>
                    <th class="handle w150">操作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                @foreach($data as $k => $v)
                    <tr>
                        <td class="tcheck">
                            <input type="checkbox" class="checkbox table-list-checkbox" name="newsId" value="{{encode($v->id)}}">
                        </td>
                        <td>
                            {{$v->id}}
                        </td>
                        <td class="color_01">
                            <a href="##">{{$v->title}}</a>
                        </td>
                        <td>
                            @foreach($cate as $a=>$b)
                                @if($b->id == $v->category_id)
                                    {{$b->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if($v->news_available ==1)
                                正常
                            @else
                                不正常
                            @endif
                        </td>
                        <td>
                            {{$v->beg_time}}
                        </td>
                        <td>
                            {{$v->updated_at}}
                        </td>
                        <td class="handle">

                            <a href="{{url('admin/newsart/'.encode($v->id).'/edit')}}">编辑</a>&nbsp;&nbsp;
                            <a href="javascript:;" class="dele_d"
                               onclick="delNews({{"'".encode($v->id)."'"}});">删除</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-c w10">
                        <input type="checkbox" class="table-list-checkbox-all" title="全选/全不选">
                    </td>
                    <td colspan="4">
                        <div class="pull-left">
                            <input type="button" class="btn btn-danger m-r-2 batch-offsale-goods" onclick="multiDelNews()" value="批量删除">
                            <!--当没有选中任何所操作的项，按钮为禁用状态，将按钮样式btn-danger替换为isabled-->

                        </div>
                    </td>

                    <td colspan="6">
                        <div class="pull-right page-box page-box02">
                            @include('admin.public.page',array('data'=>$data,'set'=>$set))
                        </div>
                    </td>
                </tr>

            </table>


        </div>
        {{ Form::token() }}
    </div>

@stop
@section('footer_js')
    <script type="text/javascript" src="{{url('js/admin/news.js')}}"></script>
@stop
