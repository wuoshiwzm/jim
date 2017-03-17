<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/12/16
 * Time: 18:28
 */?>

@section('content')

    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">会员 - 交易记录</span>
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
                            <span>客户名称：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input id="searchmodel-keyword" class="form-control" name="customername" placeholder="请输入用户名" type="text" value="{{ $set['customername']}}">
                        </div>

                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>订单状态：</span>
                        </label>

                        <div class="form-control-wrap">
                            <select id="order_status" class="form-control" name="status">
                                <option value="0")>全部</option>
                                <option value="1" @if($set['status'] ==1) selected="selected" @endif>代付款</option>
                                <option value="4" @if($set['status'] ==4) selected="selected" @endif >待发货</option>
                                <option value="10" @if($set['status'] ==10) selected="selected" @endif>部分发货</option>
                                <option value="5" @if($set['status'] ==5) selected="selected" @endif>待收货</option>
                                <option value="6" @if($set['status'] ==6) selected="selected" @endif>部分完成</option>
                                <option value="7" @if($set['status'] ==7) selected="selected" @endif>完成</option>
                                <option value="2" @if($set['status'] ==2) selected="selected" @endif>已取消</option>
                                <option value="3" @if($set['status'] ==3) selected="selected" @endif>无效</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="simple-form-field">
                    <input id="btn_search" value="查询" class="btn btn-primary m-r-5" type="submit">
                </div>
            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>记录列表</h3>
                <h5>
                    (&nbsp;共
                    <span data-total-record="true">{{count($res)}}</span>
                    条记录&nbsp;)
                </h5>
            </div>
            <div class="operate">
                <a class="reload" href="javascript:reload();" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="刷新数据">
                    <i class="iconfont"></i>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="table_list" class="table table-hover">
                <thead>
                         <tr>
                             <!--排序样式sort默认，asc升序，desc降序-->
                             <th class="w150" style="cursor: pointer;">会员名称</th>
                             <th class="w250" style="cursor: pointer;">订单编号</th>
                             <th class="w250" style="cursor: pointer;">下单时间</th>
                             <th class="w250" style="cursor: pointer;">支付时间</th>
                             <th class="w150" style="cursor: pointer;">订单来源</th>
                             <th class="w250" style="cursor: pointer;">订单状态</th>
                             <th class="w150" style="cursor: pointer;">金 额</th>
                             <th class="w150 handle " style="cursor: pointer;">操 作</th>
                         </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                @if(count($res)>0)
                    @foreach($res as $val)
                         <tr>
                            <td>{{$val->belongsToUser->name}}</td>
                            <td>{{$val->order_sn}}</td>
                            <td>{{$val->created_at}}</td>
                            <td>{{isset($val->pay->payment_time)?$val->pay->payment_time:''}}</td>
                            <td>{{$val->source==1?"PC端":'Wap端'}}</td>
                            <td>
                               @if($val->status ==1) 代付款
                                    @elseif($val->status ==4)
                                        待发货
                                    @elseif($val->status ==10)
                                        部分发货
                                    @elseif($val->status ==5)
                                        待收货
                                    @elseif($val->status ==6)
                                        部分完成
                                    @elseif($val->status ==7)
                                        完成
                                    @elseif($val->status ==2)
                                        已取消
                                    @else
                                        无效订单
                                @endif
                            </td>
                            <td>
                               {{$val->pay_amount}}
                            </td>
                            <td class="handle">
                                <a href="#">查看详情</a>
                            </td>
                         </tr>
                      @endforeach
                   @else
                    <tr>
                        <td colspan="8"><p>没有查询到数据</p></td>
                    </tr>
                @endif
                </tbody>
            </table>

            @include('admin.public.page',array('data'=>$res,'set'=>$set))
        </div>
    </div>

@stop
