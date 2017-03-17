<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/2/17
 * Time: 10:52
 */?>

<div class="simple-form-field" style=" border:1px silver;">
    <div>
        <label style="margin-left: 35px">商品与运费配置</label>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="text-danger ng-binding">*</span>
            <span class="ng-binding">货币符号：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="text" class="form-control"  ignore="ignore"  datatype="n"  name="product[pro_fuhao]" value="{{getConfig('product','pro_fuhao')}}" >
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
                <input type="text" class="form-control"  ignore="ignore"    name="product[pro_list]" value="{{getConfig('product','pro_list')}}" >
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
                <select class="form-control valid w180"  name="product[pro_order_by]">
                    <option value="0">更新时间</option>
                    <option value="1">按销量</option>
                    <option value="2">上架时间</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="text-danger ng-binding">*</span>
            <span class="ng-binding">快递鸟商家ID：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="text" class="form-control"  ignore="ignore"  datatype="n"  name="shipping[kuaidi_shangjia_id]" value="{{getConfig('shipping','kuaidi_shangjia_id')}}" >
                <span class="Validform_checktip"></span>
            </div>
            <div class="help-block help-block-t"><div class="help-block help-block-t">用于查询快递接口配置</div></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="ng-binding">快递秘钥key：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box">
                <input type="password" class="form-control"  ignore="ignore"  datatype="s3-120"  name="shipping[kuaidi_api_key]"   value="{{getConfig('shipping','kuaidi_api_key')}}"   >
                <span class="Validform_checktip"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="ng-binding">商品默认图片：</span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box addimg">
                <a href="javascript:;">
                    <img  onclick="getImgTemplet( this,'pro' )"
                          src="{{!empty(getConfig('product','default_images'))?Config::get('tools.imagePath').'config/product/'.getConfig('product','default_images'):'/images/admin/addimg.png'}}"
                          width="100" height="100">
                </a>
                <input type="hidden" id="pro"  name="product[default_images][file]" value="{{getConfig('product','default_images')}}"/>
            </div>
        </div>
    </div>
</div>
