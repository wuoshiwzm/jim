<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/12
 * Time: 14:44
 */?>
@section('title')
    退货
@stop
@section('left')
    @include('member.public.left_center')
@stop

@section('content')
    <style>
        .li_height {
            line-height: 38px;
        }
    </style>
    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>


        <!--订单切换-->
        <div class="table_div">
            <div class="admin_form">

                <form class="layui-form m-form" action="/member/refund/saveship" method="post">
                    {{Form::token()}}
                    <div class="h-title">
                        退货地址
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">详细地址</label>
                        <div class="li_height">
                           {{$info->back_delivery_address}}
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">收件人</label>
                        <div class="li_height">
                          {{$info->back_delivery_name}}
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">联系电话</label>
                        <div class="li_height">
                            {{$info->back_delivery_phone}}
                        </div>
                    </div>


                    <div class="layui-form-item">
                        <label class="layui-form-label"><span class="red">*</span>物流公司</label>
                        <div class="layui-input-inline">
                            <select name="invoice_name">
                                @foreach($shipplist as $code)
                                    <option value="{{$code->code}}">{{$code->shipping_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><span class="red">*</span>运单号</label>
                        <div class="layui-input-block">
                            <input type="text" name="invoice_no" placeholder="请输入运单号、10到15位字符"
                                   autocomplete="off" class="layui-input w40b f_left"
                                   datatype="*10-15" errormsg="为10-15位字符" tipsrmsg="请输入运单号">
                            <span class="Validform_checktip"></span>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="hidden" name="id" value="{{encode($info->id)}}">
                            <input type="submit"   class="layui-btn" value="保存" />
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
@stop
