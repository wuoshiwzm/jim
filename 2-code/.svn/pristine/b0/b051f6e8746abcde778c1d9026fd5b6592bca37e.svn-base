<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <link rel="stylesheet" type="text/css" href="{{url('css/frontend/css_all.css?v='.Config::get('tools.frontendCssTime'))}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/frontend/order.css?v='.Config::get('tools.frontendCssTime'))}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/frontend/layui.css?v='.Config::get('tools.frontendCssTime'))}}">
</head>
<body>
<form class="layui-form m-form adress_form" @if(isset($data)) action="{{url('order/editaddress')}}" @else action="{{url('order/saveaddress')}}" @endif method="post">
    <div class="layui-form-item">
        <label class="layui-form-label"><span class="red">*</span>所在地区</label>
        <div class="layui-input-inline">
            <select name="province" id="address6" lay-filter="province">
                <option value="">请选择省</option>
                @foreach( $province as $val )
                    <option value="{{$val->province}}">{{$val ->province}}</option>
                @endforeach
            </select>
            <span class="Validform_checktip"></span>
        </div>
        <div class="layui-input-inline">
            <select name="city" id="address1"  lay-filter="city">
                <option value="">请选择市</option>
            </select>
            <span class="Validform_checktip"></span>
        </div>
        <div class="layui-input-inline">
            <select name="area" id="address2" lay-filter="area">
                <option value="">请选择县/区</option>
            </select>
            <span class="Validform_checktip"></span>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"><span class="red">*</span>详细地址</label>
        <div class="layui-input-block">
            <textarea name="address" class="layui-textarea w80b f_left" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息" autocomplete="off" datatype="*5-100"  errormsg="5-100个字符" tipsrmsg="请输入详细地址" >@if( isset($data->address) ){{$data->address}}@endif</textarea><span class="Validform_checktip"></span>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">邮政编码</label>
        <div class="layui-input-block">
            <input type="text" name="zipcode" value="@if( isset($data->zipcode) ){{$data->zipcode}}@endif" maxlength="6" placeholder="如您不清楚邮递区号，请填写000000" autocomplete="off" class="layui-input w40b f_left"  datatype="p"  errormsg="邮政编码格式有误" tipsrmsg="请输入邮政编码" ><span class="Validform_checktip"></span>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"><span class="red">*</span>收货人</label>
        <div class="layui-input-block">
            <input type="text" name="name"  value="@if( isset($data->name) ){{$data->name}}@endif" maxlength="6" placeholder="长度不超过6个汉字" autocomplete="off" class="layui-input w40b f_left"   datatype="/^[\u4E00-\u9FA5\uf900-\ufa2d]{2,6}$/"  errormsg="收货人姓名应为2-6个汉字" tipsrmsg="请输入收货人姓名" ><span class="Validform_checktip"></span>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"><span class="red">*</span>手机号码</label>
        <div class="layui-input-block">
            <input type="text" name="phone" value="@if( isset($data->phone) ){{$data->phone}}@endif" placeholder="电话号码、手机号码必须填一项" autocomplete="off" class="layui-input w40b f_left"  datatype="m"  errormsg="手机号码格式有误" tipsrmsg="请输入手机号码" ><span class="Validform_checktip"></span>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">电话号码</label>
        <div class="layui-input-block">
            <input type="text" name="tel[]" maxlength="4" ignore="ignore" datatype="n3-4" placeholder="区号" class="layui-input w20b f_left m_r_10" >
            <input type="text" name="tel[]" maxlength="8" ignore="ignore" datatype="n6-8" placeholder="电话号码" class="layui-input w30b f_left m_r_10" >
            <span class="Validform_checktip"></span>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-block">
            <input type="checkbox" name="status" value="1" title="设为默认地址" @if( isset($data->status) && $data->status)checked="checked"@endif >
            <div class="layui-unselect layui-form-checkbox layui-form-checked">
                <span>设为默认地址</span><i class="layui-icon"></i>
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn fize_ml" id="btn_submit">保存</button>
        </div>
    </div>
    <input type="hidden" @if(isset($data->id)) name="aid" value="{{encode($data->id)}}" @endif/>
    {{Form::token()}}
</form>
</body>
<script type="text/javascript" src="{{url('js/public/jquery/jquery-1.9.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/public/Validform/Validform_v5.3.2_min.js')}}"></script>
<script type="text/javascript" src="{{url('js/public/layui/layui.js')}}"></script>
<script type="text/javascript" src="{{asset('js/public/location_pick/location_pick.js')}}"></script>
<script>
    $(".m-form").Validform({
        btnSubmit: '#btn_submit',
        postonce: true,
        showAllError: true,
        tiptype: function (msg, o, cssctl) {
            if (!o.obj.is("form"))
            {
                var objtip = o.obj.parent('div').find(".Validform_checktip");
                objtip.removeClass('Validform_skate');
                cssctl(objtip, o.type);
                objtip.text(msg);
            }
        }
    });
    $(".m-form").find('input').each(function () {
        $(this).focus(function () {
            if ($(this).val() == '')
            {
                var msg = $(this).attr('tipsrmsg');
                $(this).parent('div').find(".Validform_checktip").addClass('Validform_skate');
                $(this).parent('div').find(".Validform_checktip").removeClass('Validform_wrong');
                $(this).parent('div').find(".Validform_checktip").text(msg);
            }else
            {
                $(this).parent('div').find(".Validform_checktip").removeClass('Validform_skate');
            }
        });
        $(this).blur(function ()
        {
            if ($(this).val() == '')
            {
                var msg = $(this).attr('nullmsg');
                $(this).parent('div').find(".Validform_checktip").removeClass('Validform_skate');
                $(this).parent('div').find(".Validform_checktip").addClass('Validform_wrong');
                $(this).parent('div').find(".Validform_checktip").text(msg);
            }
        });
    });
</script>
</html>