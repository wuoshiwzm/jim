<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/2/4
 * Time: 16:22
 */?>

<div class="form-control-box shipping_customer" @if(isset($info)&&$info->is_freeshipping ==1)  style="display: none" @else  style="display: block"   @endif>
    <label  class="control-label help-block-t ">除指定的地区外，其他采用默认运费</label>
    <br>
    @foreach($shiplist as $key => $val)
        @if(isset($deteil))
            @foreach($deteil as $key1 => $ll)
                @if(isset($ll)&&$ll->Ship_code_id ==$val->code||$key1==0)
                    <input type="checkbox" value="{{$val->code}}"  class="shipping_type" name="xuanzcode[]" @if(isset($ll)&&$ll->Ship_code_id ==$val->code) checked="checked"  @endif >{{$val->shipping_name}}</br>
                    <div id="ship{{$val->code}}" value="{{$val->code}}" class="shippingcode" @if(isset($ll)&&$ll->Ship_code_id ==$val->code)  style="display:block" @else style="display:none" @endif>
                        <div id='idddd' style='border:1px solid #000;width: 650px' class='custom_shipping'>
                            <table class='table table-hover' style='border: 1px solid #eee;'>
                                <thead><tr>
                                    <th width='30%'>运送到</th>
                                    @if(isset($info)&&$info->jifei_model ==1)
                                        <th>首件</th>
                                        <th>首费(元)</th>
                                        <th>续件</th>
                                        <th>续元</th>
                                    @elseif(isset($info)&&$info->jifei_model ==2)
                                        <th>首重（KG）</th>
                                        <th>首费(元)</th>
                                        <th>续重（Kg）</th>
                                        <th>续元</th>
                                    @elseif(isset($info)&&$info->jifei_model ==3)
                                        <th>首体积</th>
                                        <th>首费(元)</th>
                                        <th>续体积</th>
                                        <th>续元</th>
                                    @endif
                                    <th>操 作</th>
                                </tr></thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $w='';
                                    if(isset($ll)){
                                        $p = explode(',',$ll->Region);
                                        foreach ($p as $l){
                                            $u=  Source_Area_Area::where('areaID',$l)->select('area')->first();
                                            $w .=trim($u['area']).',';
                                        }
                                    }
                                    ?>
                                    @if(isset($ll)&&$ll->Ship_code_id ==$val->code)
                                        <td>

                                            <span>{{$w!=''?$w:'请选择地区'}}</span>
                                            <input type='hidden' name='tiaojian[{{$val->code}}][area]' value='{{isset($ll)?$ll->Region:''}}'>
                                            <input type='hidden' name='tiaojian[{{$val->code}}][code]' value='{{$val->code}}'>
                                            <input type='hidden' name='tiaojian[{{$val->code}}][city]' value='{{isset($ll)?$ll->City:''}}'>
                                            <a onclick='addque(this)' style="color: #1b9af7;float: right">编辑</a>
                                        </td>
                                            @if(isset($info)&&$info->jifei_model ==1)
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][shouhzong]' value= '{{isset($ll)?$ll->FirstPiece:''}}'></td>
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xufei]' value= '{{isset($ll)?$ll->FirstAmount:''}}'></td>
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xuzhong]' value= '{{isset($ll)?$ll->SecondPiece:''}}'></td>
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xuyuan]' value= '{{isset($ll)?$ll->SecondAmount:''}}'></td>
                                            @elseif(isset($info)&&$info->jifei_model ==2)
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][shouhzong]' value= '{{isset($ll)?$ll->FirstWeight:''}}'></td>
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xufei]' value= '{{isset($ll)?$ll->FirstAmount:''}}'></td>
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xuzhong]' value= '{{isset($ll)?$ll->SecondWeight:''}}'></td>
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xuyuan]' value= '{{isset($ll)?$ll->SecondAmount:''}}'></td>
                                            @elseif(isset($info)&&$info->jifei_model ==3)
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][shouhzong]' value= '{{isset($ll)?$ll->FirstBulk:''}}'></td>
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xufei]' value= '{{isset($ll)?$ll->FirstAmount:''}}'></td>
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xuzhong]' value= '{{isset($ll)?$ll->SecondWeight:''}}'></td>
                                                <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xuyuan]' value= '{{isset($ll)?$ll->SecondBulk:''}}'></td>
                                            @endif

                                        <td style="width: 95px;float:left;">
                                            <label >
                                                是否默认&nbsp;
                                                <input type='radio' class='' name='tiaojian[{{$val->code}}][defalt]' value= '1' @if(isset($ll)&&$ll->IsDefault==1) checked="checked" @endif onchange="checkchage()">

                                            </label>
                                            <br>
                                            <a onclick='deleteitem(this)' style="color: #1b9af7;">清空</a>
                                        </td>
                                    @else
                                        <td>

                                            <span>请选择地区</span>
                                            <input type='hidden' name='tiaojian[{{$val->code}}][area]' value=''>
                                            <input type='hidden' name='tiaojian[{{$val->code}}][code]' value=''>
                                            <input type='hidden' name='tiaojian[{{$val->code}}][city]' value=''>
                                            <a onclick='addque(this)'>编辑</a>
                                        </td>
                                        <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][shouhzong]' value= ''></td>
                                        <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xufei]' value= ''></td>
                                        <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xuzhong]' value= ''></td>
                                        <td><input type='text' class="form-control valid w60" name='tiaojian[{{$val->code}}][xuyuan]' value= ''></td>
                                        <td style="width: 95px;float:left;">
                                            <label>
                                                是否默认&nbsp;
                                                <input type='radio' class='' name='tiaojian[{{$val->code}}][defalt]' value= '1' @if(isset($ll)&&$ll->IsDefault==1) checked="checked" @endif onchange="checkchage()">
                                            </label>
                                            <br>
                                            <a onclick='deleteitem(this)' style="color: #1b9af7;">清空</a>
                                        </td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <input type="checkbox" value="{{$val->code}}"  class="shipping_type" name="xuanzcode[]" >{{$val->shipping_name}}</br>
            <div id="ship{{$val->code}}" value="{{$val->code}}" class="shippingcode" style="display: none">
                <div id='idddd' style='border:1px solid #000;width: 650px' class='custom_shipping' >
                    <table class='table table-hover' style='border: 1px solid #eee;'>
                        <thead><tr>
                            <th width='30%'>运送到</th>
                            <th>首重（KG）</th>
                            <th>首费(元)</th>
                            <th>续重（Kg）</th>
                            <th>续元</th>
                            <th>操 作</th>
                        </tr></thead>
                        <tbody>
                        <tr>
                            <td><span>请选择地区</span>
                                <input type='hidden' name='tiaojian[{{$val->code}}][area]' value=''>
                                <input type='hidden' name='tiaojian[{{$val->code}}][code]' value=''>
                                <input type='hidden' name='tiaojian[{{$val->code}}][city]' value=''>
                                <a onclick='addque(this)' style="color: #1b9af7;float: right">编辑</a>
                            </td>
                            <td><input type='text' class='form-control valid w60' name='tiaojian[{{$val->code}}][shouhzong]' value= ''></td>
                            <td><input type='text' class='form-control valid w60' name='tiaojian[{{$val->code}}][xufei]' value= ''></td>
                            <td><input type='text' class='form-control valid w60' name='tiaojian[{{$val->code}}][xuzhong]' value= ''></td>
                            <td><input type='text' class='form-control valid w60' name='tiaojian[{{$val->code}}][xuyuan]' value= ''></td>
                            <td style="width: 95px;float:left;">
                                <label >
                                    是否默认&nbsp;<input type='radio' class='' name='tiaojian[{{$val->code}}][defalt]' value= '1'  >
                                </label>
                                <a onclick='deleteitem(this)' style="color: #1b9af7;">清空</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endforeach
    {{--自定义运费--}}

</div>
