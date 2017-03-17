<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/12/27
 * Time: 11:47
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
                        <span class="action">财务入账-账户汇总</span>
                    </h3>
                </div>
            </div>
        </div>

        <!--搜索-->
        <div class="search-term m-b-10">
            <form  action="/admin/finance/accountzhuizong" method="get">
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>时间：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input type="text" class="form-control w100" name="beg_time"  id="beg_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" value="{{ isset($_GET['beg_time'])?$_GET['beg_time']:''}}">
                            至 <input type="text" class="form-control w100" name="end_time" id="end_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"  value="{{isset($_GET['end_time'])?$_GET['end_time']:''}}">
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <input type="submit" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                </div>
            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>账户汇总</h3>
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
                    <th class="w150" style="cursor: pointer;">时间<span class="sort desc"></span></th>
                    <th class="w150" style="cursor: pointer;">收入</th>
                    <th class="w150" style="cursor: pointer;">支出</th>
                    <th class="handle w150">操作</th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                @if(count($list)>0)
                    @foreach($list as $val)
                    <tr>
                        <td>
                           {{TimeTools::getYMd($val->created_at)}}
                        </td>
                        <td>
                            {{$val->shouru}}
                        </td>
                        <td>
                            {{$val->zhichu}}
                        </td>
                        <td class="handle">
                            <a href="/admin/finance/mingxihuizong">查看详情</a>
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
@stop


