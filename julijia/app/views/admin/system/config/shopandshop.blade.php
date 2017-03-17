<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/2/17
 * Time: 11:03
 */?>

<div class="simple-form-field" style=" border:1px silver;">
    <div>
        <label style="margin-left: 35px">购买以及用户设置</label>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="text-danger ng-binding">*</span>
            <span class="ng-binding">游客是否可以购买：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <select class="form-control valid w180"  name="core[guset_shop]">
                    <option value="1" @if(getConfig('core','shop_jifen') ==1) selected="selected" @endif>可以购买</option>
                    <option value="0" @if(getConfig('core','shop_jifen') ==0) selected="selected" @endif>不能购买</option>
                </select>
                <span class="Validform_checktip"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="ng-binding">积分比例：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="text" class="form-control"  ignore="ignore"  datatype="*"  name="core[shop_jifen]"  value="{{getConfig('core','shop_jifen')}}" >
                <span class="Validform_checktip"></span>
            </div>
            <div class="help-block help-block-t">
                <div class="help-block help-block-t">积分比例输入样式必须如 1:10 ;1元获取10个积分</div>
            </div>
        </div>
    </div>
</div>

