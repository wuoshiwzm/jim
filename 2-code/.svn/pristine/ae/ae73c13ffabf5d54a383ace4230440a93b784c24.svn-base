<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/3
 * Time: 18:02
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
                        <span class="action">广告列表</span>
                    </h3>
                </div>
            </div>
        </div>
        <input type="hidden" id="msg" value="{{Session::get('msg')}}">
        <!--搜索-->
        <div class="search-term m-b-10">
            <form  action="{{Request::url()}}" method="get">
                {{Form::token()}}

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>位置：</span>
                        </label>
                        <div class="form-control-wrap">
                            <select name="position" class="form-control" >
                                <option value="" selected="">全部</option>
                                @foreach($typelist as $f)
                                    <option value="{{$f->id}}" @if($set['position']==$f->id)  selected="selected "@endif>{{$f->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>广告类型：</span>
                        </label>
                        <div class="form-control-wrap">
                            <select name="type" class="form-control" >
                                <option value="" selected="">全部</option>
                                <option value="1" @if($set['type']==1)  selected="selected "@endif>固定URl</option>
                                <option value="2" @if($set['type']==2)  selected="selected "@endif>单独页面</option>
                                <option value="3" @if($set['type']==3)  selected="selected "@endif>分类</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <input type="submit" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                    <input type="buton"  value="新增" class="btn btn-primary m-r-5" style="width: 60px" onclick="location.href='/admin/ads/addads'">
                </div>

            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>广告列表</h3>

                <h5>
                    (&nbsp;共
                    <span data-total-record="true">{{count($list)}}</span>
                    条记录&nbsp;)
                </h5>

            </div>
            <div class="operate">

                <a class="reload" href="javascript:reload();" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="刷新数据">
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
                    <th class="w100" style="cursor: pointer;">id</th>
                    <th class="w100" style="cursor: pointer;">广告位置</th>
                    <th class="w150" style="cursor: pointer;">广告名称</th>
                    <th class="w150" style="cursor: pointer;">图片</th>
                    <th class="w150" style="cursor: pointer;">链接地址</th>
                    <th class="w100"  style="cursor: pointer;">状态</th>
                    <th class="w100" style="cursor: pointer;">排序</th>
                    <th class="w150"  style="cursor: pointer;">操 作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                @if(count($list))
                    @foreach( $list as $val)
                        <tr>
                            <td >{{$val->id}}</td>
                            <td >{{$val->adstype->name}}</td>
                            <td >{{$val->name}}</td>
                            <td ><img width="30"  height="20" src="{{Config::get('tools.imagePath').'ads/'.$val->pid.'/'.$val->img}}" /></td>
                            <td >{{$val->type_value}}</td>
                            <td >{{$val->status ==1?"显示":'禁用'}}</td>
                            <td >{{$val->sort}}</td>
                            <td >
                                <a href="/admin/ads/addads?id={{(encode($val->id))}}">编辑</a> &nbsp;
                                <a href="/admin/ads/adsdel?id={{(encode($val->id))}}">删除</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">
                            <p style="text-align: center">没有查询到数据</p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            @include('admin.public.page',array('data'=>$list,'set'=>$set,'product'=>1))
        </div>
    </div>

@stop


