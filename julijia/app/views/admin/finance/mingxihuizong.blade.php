<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/12/27
 * Time: 12:26
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
                        <span class="action">财务入账-明细账汇总</span>
                    </h3>
                </div>
            </div>
        </div>
        <!--搜索-->
        <div class="search-term m-b-10">
            <form  action="/admin/finance/mingxihuizong" method="get">
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
                    <div class="form-group">
                        <label class="control-label">
                            <span>类型：</span>
                        </label>
                        <div class="form-control-wrap">
                            <div class="form-control-wrap">
                                <select id="type" class="form-control" name="type" >
                                    <option value="0" selected="">全部</option>
                                    <option value="订单" @if(isset($_GET['type'])&&$_GET['type']=="订单")  selected="selected" @endif>订单</option>
                                    <option value="退款" @if(isset($_GET['type'])&&$_GET['type']=="退款")  selected="selected" @endif>退款</option>
                                    <option value="退款退货" @if(isset($_GET['type'])&&$_GET['type']=="退款退货")  selected="selected" @endif>退款退货</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <input type="submit" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                    <input type="button" id="export" value="导出结果" class="btn btn-primary m-r-5">
                </div>

            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>明细账汇总</h3>
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
                    <th class="w150" style="cursor: pointer;">类型</th>
                    <th class="w150" style="cursor: pointer;">编号</th>
                    <th class="w150" style="cursor: pointer;">商品名称</th>
                    <th class="w150" style="cursor: pointer;">规格</th>
                    <th class="w150" style="cursor: pointer;">供应商</th>
                    <th class="w150" style="cursor: pointer;">商品数量总数</th>
                    <th class="w150" style="cursor: pointer;">商品单价</th>
                    <th class="w150" style="cursor: pointer;">总价款</th>
                    <th class="w150" style="cursor: pointer;">运费合计</th>
                    <th class="w150" style="cursor: pointer;">优惠合计</th>
                    <th class="w150" style="cursor: pointer;">收入总额</th>

                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                @foreach($list  as  $val)
                    <tr>
                       <td>{{TimeTools::getYMd($val->created_at)}}</td>
                        <td>{{$val->type}}</td>
                        <td>{{$val->entity_sn}}</td>
                        <td>{{$val->p_name}}</td>
                        <td>{{$val->guige}}</td>
                        <td>{{$val->p_gongyingshang}}</td>
                        <td>{{$val->p_sum}}</td>
                        <td>{{$val->p_price}}</td>
                        <td>{{$val->p_tprice}}</td>
                        <td>{{$val->shipping_fei}}</td>
                        <td>{{$val->discount}}</td>
                        <td>{{$val->pay_price}}</td>
                    </tr>
                 @endforeach
                </tbody>


            </table>

        </div>

    </div>

    <script>
        $("#export").click(function () {
            name = $("#type").val();
            beg_time = $("#beg_time").val();
            end_time = $("#end_time").val();
            location='/admin/finance/mingxihuzongexport?type='+name+'&beg_time ='+beg_time+'&end_time='+end_time;
        })
    </script>

@stop