<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/2/17
 * Time: 10:56
 */
?>
<div class="simple-form-field" style=" border:1px silver;">
    <div>
        <label style="margin-left: 35px">订单配置</label>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="text-danger ng-binding">*</span>
            <span class="ng-binding">付款期限：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="text" class="form-control"  ignore="ignore"  datatype="n"  name="payment[pay_qixian]"   value="{{getConfig('payment','pay_qixian')}}"  >
                <span class="Validform_checktip"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="ng-binding">收货期限：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="text" class="form-control"  ignore="ignore"  datatype="s3-8"  name="payment[shipping_shouhuo_time]"  value="{{getConfig('payment','shipping_shouhuo_time')}}" >
                <span class="Validform_checktip"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="ng-binding">申请收货期限：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="text" class="form-control"  ignore="ignore"  datatype="s3-8"  name="payment[shenqing_shouhuo]" value="{{getConfig('payment','shenqing_shouhuo')}}" >
                <span class="Validform_checktip"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="ng-binding">申请退款卖家确认期限：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="text" class="form-control"  ignore="ignore"  datatype="s3-8"  name="payment[shenqing_tuikuan_queren]"  value="{{getConfig('payment','shenqing_tuikuan_queren')}}">
                <span class="Validform_checktip"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="ng-binding">退款退货买家发货期限：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="text" class="form-control"  ignore="ignore"  datatype="s3-8"  name="payment[shenqing_tuikuan_fahuo]"  value="{{getConfig('payment','shenqing_tuikuan_fahuo')}}" >
                <span class="Validform_checktip"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="ng-binding">退款退货卖家确认收货期限：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="text" class="form-control"  ignore="ignore"  datatype="s3-8"  name="payment[shenqing_tuikuan_querenshouhuo]" value="{{getConfig('payment','shenqing_tuikuan_querenshouhuo')}}"  >
                <span class="Validform_checktip"></span>
            </div>
        </div>
    </div>
</div>
