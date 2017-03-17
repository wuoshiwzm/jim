<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/2/4
 * Time: 12:23
 * 新增和编辑运费模板
 */?>
@section('content')

    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">新增运费模板</span>
                    </h3>
                </div>
            </div>
        </div>
        <form class="form-horizontal form"  method="post" action="{{url('admin/shipping/savetemplet')}}">
            {{ Form::token() }}
            <div class="table-content m-t-30 ">
                <h5 class="tab_h5"><font class="iconfont">&#xe64e;</font>新增模板</h5>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">模板名称：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <input type="text"  class="form-control valid" name="name"  datatype="*3-20"  tipsrmsg="请输入模板名称" errormsg="模板名称为3-20个字符" value="{{isset($info)?$info->name:''}}">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">发货时间：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <select name="fahuoshijian" class="form-control valid" datatype="*"  tipsrmsg="请选择发货时间" errormsg="请选择发货时间">
                                    <option value="" selected="">请选择发货时间</option>
                                    <option value="1" @if(isset($info)&&$info->fahuoshijian==1) selected="selected" @endif>周内发货</option>
                                    <option value="2" @if(isset($info)&&$info->fahuoshijian==2) selected="selected" @endif>周末发货</option>
                                    <option value="3" @if(isset($info)&&$info->fahuoshijian==3) selected="selected" @endif>任何时间</option>
                                </select>
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">是否包邮：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <label class="control-label cur-p m-r-10">
                                    <input type="radio" class="checkBox table-list-checkbox" datatype="*"  tipsrmsg="请选择是否包邮" errormsg="请选择是否包邮" name="is_freeshipping" value="0" onclick="ifshipping(1)"  @if(isset($info)&&$info->is_freeshipping==0) checked="checked" @endif>自定义运费
                                </label>
                                <label class="control-label cur-p m-r-10">
                                    <input type="radio" class="checkBox table-list-checkbox" name="is_freeshipping" value="1" onclick="ifshipping(0)" @if(isset($info)&&$info->is_freeshipping==1) checked="checked" @endif>卖家承担运费
                                </label>
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">计价方式：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                    <label class="control-label cur-p m-r-10">
                                        <input name="jifei_model" value="1"  type="radio"  datatype="*"  tipsrmsg="请选择计价方式" errormsg="请选择计价方式"  @if(isset($info)&&$info->jifei_model==1) checked="checked" @endif>按件</label>
                                    <label class="control-label cur-p m-r-10">
                                        <input name="jifei_model" value="2" type="radio" @if(isset($info)&&$info->jifei_model==2) checked="checked" @endif>按重量
                                    </label>
                                <label class="control-label cur-p m-r-10">
                                    <input name="jifei_model" value="3" type="radio" @if(isset($info)&&$info->jifei_model==3) checked="checked" @endif>按体积
                                </label>
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="text-danger ng-binding">*</span>
                            <span class="ng-binding">运送方式：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box shipping_customer" @if(isset($info)&&$info->is_freeshipping ==1)  style="display: none" @else  style="display: block"   @endif>
                               <label  class="control-label help-block-t ">除指定的地区外，其他采用默认运费</label>
                                <br>
                                @foreach($shiplist as $val)
                                     @if(isset($deteil))
                                        @foreach($deteil as $ll)
                                            <input type="checkbox" value="{{$val->code}}"  class="shipping_type" @if(isset($ll)&&$ll->Ship_code_id ==$val->code) checked="checked"  @endif >{{$val->shipping_name}}</br>
                                            <div id="ship{{$val->code}}" value="{{$val->code}}" class="shippingcode" @if(isset($ll)&&$ll->Ship_code_id ==$val->code)  style="display:block" @else style="display:none"   @endif>
                                                <div id='idddd' style='border:1px solid #000;width: 650px' class='custom_shipping'>
                                                    <div style='margin: 15px 10px 15px 5px;width: 500px;'><label>默认运费</label>
                                                        <input type='text' class=' form-control w60' value='' >Kg内，<input type='text' class='form-control w60' value=''>元
                                                        每增加<input type='text' class='form-control w60' value=''>Kg,增加运费<input type='text' value='' class='form-control w60'></div>
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
                                                            <td><span>{{$w!=''?$w:'请选择地区'}}</span>
                                                                <input type='hidden' name='tiaojian[{{$val->code}}][area]' value='{{isset($ll)?$ll->Region:''}}'>
                                                                <input type='hidden' name='tiaojian[{{$val->code}}][code]' value='{{$val->code}}'>
                                                                <a onclick='addque(this)'>编辑</a>
                                                            </td>
                                                            <td><input type='text' class='w40' name='tiaojian[{{$val->code}}][shouhzong]' value= '{{isset($ll)?$ll->FirstWeight:''}}'></td>
                                                            <td><input type='text' class='w40' name='tiaojian[{{$val->code}}][xufei]' value= '{{isset($ll)?$ll->FirstAmount:''}}'></td>
                                                            <td><input type='text' class='w40' name='tiaojian[{{$val->code}}][xuzhong]' value= '{{isset($ll)?$ll->SecondWeight:''}}'></td>
                                                            <td><input type='text' class='w40' name='tiaojian[{{$val->code}}][xuyuan]' value= '{{isset($ll)?$ll->SecondAmount:''}}'></td>
                                                            <td>
                                                                <label style="float: left" ><input type='radio' class='w40' name='tiaojian[{{$val->code}}][defalt]' value= '1' @if(isset($ll)&&$ll->IsDefault==1) checked="checked" @endif>是否默认</label>
                                                                <br>
                                                                <a onclick='deleteitem(this)'>清空</a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endforeach
                                      @else
                                        <input type="checkbox" value="{{$val->code}}"  class="shipping_type" >{{$val->shipping_name}}</br>
                                        <div id="ship{{$val->code}}" value="{{$val->code}}" class="shippingcode" style="display: none">
                                            <div id='idddd' style='border:1px solid #000;width: 650px' class='custom_shipping' >
                                                <div style='margin: 15px 10px 15px 5px;width: 500px;'><label>默认运费</label>
                                                    <input type='text' class=' form-control w60' value='' >Kg内，<input type='text' class='form-control w60' value=''>元
                                                    每增加<input type='text' class='form-control w60' value=''>Kg,增加运费<input type='text' value='' class='form-control w60'></div>
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
                                                            <a onclick='addque(this)'>编辑</a>
                                                        </td>
                                                        <td><input type='text' class='w40' name='tiaojian[{{$val->code}}][shouhzong]' value= ''></td>
                                                        <td><input type='text' class='w40' name='tiaojian[{{$val->code}}][xufei]' value= ''></td>
                                                        <td><input type='text' class='w40' name='tiaojian[{{$val->code}}][xuzhong]' value= ''></td>
                                                        <td><input type='text' class='w40' name='tiaojian[{{$val->code}}][xuyuan]' value= ''></td>
                                                        <td>
                                                            <label style="float: left" ><input type='radio' class='w40' name='tiaojian[{{$val->code}}][defalt]' value= '1'>是否默认</label>
                                                            <br>
                                                            <a onclick='deleteitem(this)'>清空</a>
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
                            <div class="form-control-box shipping_free" @if(isset($info)&&$info->is_freeshipping ==1)) style="display: block" @else  style="display: none"  @endif >
                                <label  class="control-label help-block-t ">指定包邮条件</label>
                                {{--自定义运费--}}
                                @include('admin.shipping.templete.shipping',array('detail'=>isset($deteil)?$deteil:null))
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field p-b-30">
                    <div class="form-group">
                        <label for="text4" class="col-sm-4 control-label"></label>
                        <div class="col-xs-8">
                            <input type="hidden" name="id" value="{{isset($info)?encode($info->id):''}}">
                            <input type="submit" id="btn_submit" value="确认提交" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="/js/public/jquery/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
       function ifshipping(i) {
           if(i==1){
              $(".shipping_customer").show();
               $(".shipping_free").hide();
           }else if(i==0){
               $(".shipping_free").show();
               $(".shipping_customer").hide();
           }
       }
       $(".shipping_type").click(function () {
           var  elem =$(this).val();
           if($(this).attr('checked')) {
               $('#ship'+elem).show();
           }
           else{
               $('#ship'+elem).hide();
           }

       })

    </script>
    <script>

        function  addque(index) {
            var  str = $(index).parents('.shippingcode').attr('value');
            layer.open({
                type: 2,
                title:false,
                shadeClose: true,
                shade: 0.8,
                area: ['650px', '550px'],
                content: ['/admin/shipping/shippingquyu?code='+str,'no']
            });
        }


        function  setEareQu(data,res,id) {
            $('#ship'+id).children().find('span').text(res);
            $('#ship'+id).children().find("input[name='tiaojian["+id+"][area]']").val(data);
            $('#ship'+id).children().find("input[name='tiaojian["+id+"][code]']").val(id);
            layer.closeAll();
        }
        function deleteitem(index) {
            $(index).parents('tr').each(function () {
                $(this).find('input').val('');
                $(this).find('span').text('请选择地区');
            })
        }
        

    </script>

@stop

