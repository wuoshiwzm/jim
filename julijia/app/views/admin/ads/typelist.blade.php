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
                        <span class="action">广告分类</span>
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
                            <span>生效时间：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input type="text" class="form-control w100" name="beg_time"  id="beg_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" value=" {{$set['beg_time']}}">
                            至 <input type="text" class="form-control w100" name="end_time" id="end_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"  value=" {{$set['end_time']}}">
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <input type="submit" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                    <input type="buton"  value="新增" class="btn btn-primary m-r-5" style="width: 60px" onclick="location.href='/admin/ads/addtype'">
                </div>

            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>订单列表</h3>

                <h5>
                    (&nbsp;共
                    <span data-total-record="true">309</span>
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
                    <th class="w100" style="cursor: pointer;">名称</th>
                    <th class="w150" style="cursor: pointer;">位置编码</th>
                    <th class="w150" style="cursor: pointer;">尺寸</th>
                    <th class="w100" style="cursor: pointer;">状态</th>
                    <th class="w150" style="cursor: pointer;">起始时间</th>
                    <th class="w100"  style="cursor: pointer;">结束时间</th>
                    <th class="w100"  style="cursor: pointer;">操作人</th>
                    <th class="w150"  style="cursor: pointer;">创建时间</th>
                    <th class="w150"  style="cursor: pointer;">操 作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                @if(count($list))
                    @foreach( $list as $val)
                        <tr>
                            <td >{{$val->id}}</td>
                            <td >{{$val->name}}</td>
                            <td >{{$val->position}}</td>
                            <td >{{$val->size}}</td>
                            <td >@if($val->status ==1) 显示  @else  不显示 @endif</td>
                            <td >{{$val->start_time}}</td>
                            <td >{{$val->end_time}}</td>
                            <td >{{$val->user}}</td>
                            <td >{{$val->created_at}}</td>
                            <td >
                                <a href="/admin/ads/addtype?id={{($val->id)}}">编辑</a> &nbsp;
                                <a href="/admin/ads/deltype?id={{(($val->id))}}">删除</a></td>
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


