<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/11/13
 * Time: 17:39
 */
  ?>
@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">设置</span>
                    </h3>
                    <h5>
				<span class="action-span">
					<a href="##" class="btn btn-warning click-loading">
                        <i class="iconfont">&#xe6d4;</i>
                        返回列表
                    </a>
				</span>
                    </h5>
                </div>
            </div>
        </div>

        <form id="SystemConfigModel" class="form-horizontal m-form"  method="post"  novalidate action="/admin/system/cofnig">
            <div class="table-content m-t-30">

                {{--基本设置--}}
                <div class="simple-form-field" style=" border:1px silver;">
                    <div>
                        <label style="margin-left: 35px">基本设置</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">货币符号：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control"  ignore="ignore"  datatype="n"  name="product[pro_fuhao]"  >
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">商品列表显示数量：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="password" class="form-control"  ignore="ignore"    name="product[pro_list]"  >
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">默认排序：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select class="form-control valid w180"  name="product[pro_list]">
                                    <option value="0">更新时间</option>
                                    <option value="1">按销量</option>
                                    <option value="2">上架时间</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">网站选择的模板：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select class="form-control valid w180"  name="core[templete]">
                                    <option value="green">绿色</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{--运输配置--}}
                <div class="simple-form-field" style=" border:1px silver;">
                    <div>
                        <label style="margin-left: 35px">商品运费配置</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">快递100账号：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text" class="form-control"  ignore="ignore"  datatype="n"  name="shipping[kd100api_account]" value="{{getConfig('shipping','kd100api_account')}}" >
                                <span class="Validform_checktip"></span>
                            </div>
                            <div class="help-block help-block-t"><div class="help-block help-block-t">用于快递100API账号</div></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">快递API密码：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="password" class="form-control"  ignore="ignore"  datatype="s3-8"  name="shipping[kd100api_password]"   value="{{getConfig('shipping','kd100api_password')}}"   >
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{--支付方式--}}
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

                <div class="simple-form-field p-b-30">
                    <div class="form-group">
                        <label for="text4" class="col-sm-4 control-label"></label>
                        <div class="col-xs-8">
                            <input type="submit" id="btn_submit" value="确认提交" class="btn btn-primary">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <style>
        .form-group{ line-height: 20px}
    </style>
@stop

