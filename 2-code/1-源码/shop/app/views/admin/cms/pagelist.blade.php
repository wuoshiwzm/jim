<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/13
 * Time: 15:09
 */?>

@section('footer_js')
    <script type="text/javascript" src="/js/public/My97DatePicker/WdatePicker.js"></script>
@stop
@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">CMS-Page管理</span>
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
                            <span>Url：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input type="text" class="form-control w100" name="url"  id="beg_time"  value="{{$set['url']}}">

                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <input type="submit" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                    <input type="button" id="btn_search" value="新增" class="btn btn-primary m-r-5" onclick="location.href ='/admin/cms/page/addpage'">
                </div>
            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>CMS-Page</h3>
                <h5>
                    (&nbsp;共
                    <span data-total-record="true">{{count($list)}}</span>
                    条记录&nbsp;)
                </h5>

            </div>
            <div class="operate">
                <a class="reload" href="javascript:window.location.reload();" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="刷新数据">
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
                    <th class="w180" style="cursor: pointer;">页面标题<span class="sort desc"></span></th>
                    <th class="w150" style="cursor: pointer;">Url</th>
                    <th class="w150" style="cursor: pointer;">关键字</th>
                    <th class="w150" style="cursor: pointer;">状态</th>
                    <th class="handle w150">操作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                @if(count($list)>0)
                    @foreach($list as $val)
                        <tr>
                            <td>
                                {{$val->title}}
                            </td>
                            <td>
                                {{$val->identifier}}
                            </td>
                            <td>
                                {{$val->meta_keywords}}
                            </td>
                            <td>
                                @if($val->status ==1) 显示 @else   不显示 @endif
                            </td>
                            <td >
                               <a href="/admin/cms/page/addpage?id={{encode($val->id)}}">编辑</a> |
                                <a onclick="deletePage('{{encode($val->id)}}')">删除</a>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">
                            <p>没有找到数据</p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            @include('admin.public.page',array('data'=>$list,'set'=>$set,'product'=>1))
        </div>

    </div>
    <script>
        function deletePage ($id) {
            layer.confirm('删除后数据将无法恢复，确认？',
                    function(index)
                    {
                        location.href ="/admin/cms/page/delpage?id="+$id
                    });
        }
    </script>
@stop
