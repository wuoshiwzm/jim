<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/2/4
 * Time: 12:16
 * 运费模板
 */?>


@section('content')
    <style>
        .order-top td{ border-top:1px solid #ddd; border-right:1px solid #ddd; background:#f0f0f0; height:40px;}
        .order-top td .order-num{ font-weight:bold; font-size:14px; padding-left:8px;}
        .order-top td .deal-time{font-size:14px; color:#999; float:right;padding-right:12px;}
        .order-top .order-source a{font-size:14px; color:#1B9AF7; float:right;padding-right:12px;}
        .order-top .order-source a:hover{ text-decoration:underline;}
        .table_yun_th{ background:#f9f9f9; }
        .table_yun_th{  font-weight:bold; }
        .table .table_yun{border-bottom:1px solid #ddd;}
    </style>
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">运费模板列表</span>
                    </h3>
                </div>
            </div>
        </div>
        <!--搜索-->
        <div class="search-term m-b-10">
                <div class="simple-form-field">
                    <input id="btn_search" value="新增模板" class="btn btn-primary m-r-5" type="button" onclick=" location.href='/admin/shipping/addtemplete'">
                </div>
        </div>
        <div class="common-title">
            <div class="ftitle">
                <h3>运费模板列表</h3>

                <h5>
                    (&nbsp;共
                    <span data-total-record="true">{{count($list)}}</span>
                    条记录&nbsp;)
                </h5>

            </div>
            <div class="operate">

                <a class="reload" href="javascript:reload();" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="刷新数据">
                    <i class="iconfont"></i>
                </a>

            </div>
        </div>
        <div class="table-responsive order">

            <table id="table_list" class="table">
                @foreach($list as $val)
                    <tbody class="table_yun">
                    <tr class="order-hd order-top">
                        <td colspan="6">
                            <div>
                                <span class="order-num">{{$val->name}}</span>
                                <span class="order-source"><a href="/admin/shipping/deltemplete?id={{encode($val->id)}}" class="dele_d">删除</a></span>
                                <span class="order-source"><a href="/admin/shipping/addtemplete?id={{encode($val->id)}}">修改</a></span>
                                <span class="deal-time">最后编辑时间：{{$val->updated_at}}</span>
                            </div>
                        </td>
                    </tr>


                    @if($val->is_freeshipping ==0)
                        <tr class="order-item table_yun_th">
                            <td class="contact" width="10%">运费方式</td>
                            <td class="contact">运费到</td>
                            <td class="contact" width="14%">首重（Kg）</td>
                            <td class="contact" width="14%">运费（元）</td>
                            <td class="contact" width="14%">续重（Kg）</td>
                            <td class="contact" width="14%">运费（元）</td>
                        </tr>
                        <?php $detail =$val->ModelShip()->get(); ?>
                        @foreach( $detail  as $dt)
                            <tr class="order-item">
                                <td class="contact">
                                    {{isset($dt->ShippingCode->shipping_name)?$dt->ShippingCode->shipping_name:''}}
                                </td>
                                <td class="contact">
                                    <?php
                                    $w='';
                                    if(isset($detail)){
                                        $p = explode(',',$dt->Region);
                                        foreach ($p as $l){
                                            $u=  Source_Area_Area::where('areaID',$l)->select('area')->first();
                                            $w .=trim($u['area']).',';
                                        }
                                    }
                                    ?>
                                    {{$w}}
                                </td>
                                <td class="contact">{{$dt->FirstWeight}}</td>
                                <td class="contact">
                                    {{$dt->FirstAmount}}
                                </td>
                                <td class="contact">
                                    {{$dt->SecondWeight}}
                                </td>
                                <td class="contact">
                                    {{$dt->SecondAmount}}
                                </td>

                            </tr>
                         @endforeach
                     @endif

                    @if($val->is_freeshipping ==1)
                        <tr class="order-item table_yun_th">
                            <td class="contact" width="10%">运费方式</td>
                            <td class="contact">运费到</td>
                            <td class="contact" width="14%">件数</td>
                            <td class="contact" width="14%">重量（Kg）</td>
                            <td class="contact" width="14%">体积</td>
                            <td class="contact" width="14%">价格（元）</td>
                        </tr>
                        <?php $detail =$val->FreeShip()->get(); ?>
                        @foreach( $detail  as $dt)
                            <tr class="order-item">
                                <td class="contact">
                                    {{isset($dt->ShippingCode->shipping_name)?$dt->ShippingCode->shipping_name:''}}
                                </td>
                                <td class="contact">
                                    <?php
                                    $w='';
                                    if(isset($detail)){
                                        $p = explode(',',$dt->region);
                                        foreach ($p as $l){
                                            $u=  Source_Area_Area::where('areaID',$l)->select('area')->first();
                                            $w .=trim($u['area']).',';
                                        }
                                    }
                                    ?>
                                    {{$w}}
                                </td>
                                <td class="contact">{{$dt->pie_no}}</td>
                                <td class="contact">
                                    {{$dt->weight_no}}
                                </td>
                                <td class="contact">
                                    {{$dt->bulk_no}}
                                </td>
                                <td class="contact">
                                    {{$dt->price}}
                                </td>

                            </tr>
                        @endforeach
                    @endif
                        <tr class="sep-row">
                            <td colspan="6"></td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

          @include('admin.public.page',array('data'=>$list,'set'=>$set))
        </div>
    </div>

@stop
