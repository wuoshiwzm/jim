<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/2/4
 * Time: 16:26
 */?>

<div style="border:1px solid #000;width: 650px" class="freeshipping">
    <table class="table table-hover" style="border: 1px solid #eee;">
        <thead>
        <tr>
            <th width="30%">运送到</th>
            <th>选择快递方式</th>
            <th width="35%">设置包邮条件</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <?php
                $w='';
                if(isset($detail)){
                    $p = explode(',',$detail[0]->region);
                    foreach ($p as $l){
                        $u=  Source_Area_Area::where('areaID',$l)->select('area')->first();
                        $w .=trim($u['area']).',';
                    }
                }
                ?>
                <span >{{$w!=''?$w:"请选择地区"}}</span>
                <a onclick='addshipfreeque(this)' style="color: #1b9af7;float: right"> 编辑</a>
                <input type="hidden" name="freeshipp" value="{{isset($detail)?$detail[0]->region:''}}">
                <input type="hidden" name="freeshippcity" value="{{isset($detail)?$detail[0]->city:''}}">
            </td>
            <td>
                <select name="shipcode" class="form-control valid">
                    <option value="">请选择</option>
                    @foreach($shiplist as $val)
                        <option value="{{$val->code}}" @if(isset($detail)&&$val->code ==$detail[0]->shipping_code) selected="selected" @endif>{{$val->shipping_name}}</option>
                    @endforeach

                </select>
            </td>
            <td>
                <select name="fangshi" class="form-control valid">
                    <option value="">请选择重量</option>
                    <option value="weight_no" @if(isset($detail)&&!empty($detail[0]->weight_no))  selected="selected" @endif>重量</option>
                    <option value="bulk_no" @if(isset($detail)&&!empty($detail[0]->bulk_no))  selected="selected" @endif>体积</option>
                    <option value="price" @if(isset($detail)&&!empty($detail[0]->price))  selected="selected" @endif>价格</option>
                    <option value="pie_no" @if(isset($detail)&&!empty($detail[0]->pie_no))  selected="selected" @endif>购物件数</option>
                </select>
                <div style="margin-top: 10px">
                    在<input type="text" class="form-control valid w60" name="shuzhi" value="@if(isset($detail[0])) {{($detail[0]->weight_no+$detail[0]->bulk_no+$detail[0]->price+$detail[0]->pie_no)}} @endif">内包邮
                </div>

            </td>
            <td>
                <a  onclick="deleteitem(this)">清空</a>&nbsp;&nbsp;
            </td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function  addshipfreeque(index) {
        layer.open({
            type: 2,
            title:false,
            shadeClose: true,
            shade: 0.8,
            area: ['650px', '550px'],
            content: ['/admin/shipping/shippingquyu','no']
        });
    }
    function  setEarefreeQu(data,res,city) {
        $('.freeshipping').children().find('span').text(res);
        $('.freeshipping').children().find("input[name='freeshipp']").val(data);
        $('.freeshipping').children().find("input[name='freeshippcity']").val(city);
        layer.closeAll();
    }

</script>
