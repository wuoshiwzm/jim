@if( Session::get('member') && $address )
    <div class="table_div_h">
        <h2>收货人</h2><a href="Javascript:void(0)" class="add_adress add_adress_tt">新增收货地址</a>
        <ul class="shou_huo" id="addressList">
            @foreach( $address as $row )
                <li class="checkbox" @if($row->status == false) style="display: none" @endif>
                    <input type="checkbox" name="address" title="{{$row->name}}" value="{{$row->id}}"  @if( $row->status == 1 )  checked="checked" @endif>
                    <div>
                    <span class="addressContent" @if($row->status) id="addressContent" @endif>
                        <span>{{$row->name}}</span>
                        <span>@if(isset($row->provinceInfo->province)){{$row->provinceInfo->province}}@endif</span>
                        <span>@if(isset($row->cityInfo->city)){{$row->cityInfo->city}}@endif</span>
                        <span>@if(isset($row->areaInfo->area)){{$row->areaInfo->area}}@endif</span>
                        <span>{{$row->address}}</span>
                        <span>{{conversionPhone( $row->phone )}}</span>
                    </span>
                        @if( $row->status )
                            <span class="bg_span">默认地址</span>
                        @endif
                        @if( $row->status == false )
                            <a href="Javascript:void(0)" class="add_adress address_default" data-id="{{encode($row->id)}}" >设为默认地址</a>
                        @endif
                        <a href="Javascript:void(0)" class="add_adress add_adress_edit" data-id="{{encode($row->id)}}">编辑</a>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="shou_adress"><a href="Javascript:void(0)" class="shou_adress_top" data-id="0">展开地址</a></div>
    </div>
@else
    <div class="table_div_h">
        <h2>收货信息</h2>
        <div class="layui-form-item from_margin">
            <label class="layui-form-label"><span class="red">*</span>选择省市区</label>
            <div class="layui-input-inline">
                <select name="province" id="address" lay-filter="province" datatype="*|select">
                    <option value="">请选择省</option>
                </select>
                <span class="Validform_checktip"></span>
            </div>
            <div class="layui-input-inline">
                <select name="city" id="address1" lay-filter="city" datatype="*|select">
                    <option value="">请选择市</option>
                </select>
                <span class="Validform_checktip"></span>
            </div>
            <div class="layui-input-inline">
                <select name="area" id="address2" lay-filter="area" datatype="*|select">
                    <option value="">请选择县/区</option>
                </select>
                <span class="Validform_checktip"></span>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="red">*</span>详细地址</label>
            <div class="layui-input-block">
                <textarea name="address" class="layui-textarea w120b f_left"  placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息" autocomplete="off" datatype="*5-100"  errormsg="5-100个字符" tipsrmsg="请输入详细地址" ></textarea><span class="Validform_checktip"></span>
            </div>
        </div>
        <div class="layui-form-item from_left">
            <label class="layui-form-label"><span class="red">*</span>收货人</label>
            <div class="layui-input-block">
                <input type="text" name="real_name"   maxlength="6" placeholder="长度不超过6个汉字" autocomplete="off" class="layui-input w40b f_left"   datatype="/^[\u4E00-\u9FA5\uf900-\ufa2d]{2,6}$/"  errormsg="收货人2-6个汉字" tipsrmsg="请输入收货人姓名" ><span class="Validform_checktip"></span>
            </div>
        </div>
        <div class="layui-form-item from_left from_width">
            <label class="layui-form-label"><span class="red">*</span>手机号码</label>
            <div class="layui-input-block">
                <input type="text" name="phone" placeholder="电话号码、手机号码必须填一项" autocomplete="off" class="layui-input w40b f_left"  datatype="m"  ajaxurl="/member/register/check_mobile" errormsg="手机号码格式有误" tipsrmsg="请输入手机号码" ><span class="Validform_checktip"></span>
            </div>
        </div>
        <div class="layui-form-item from_left">
            <label class="layui-form-label"><span class="red">*</span>用户名</label>
            <div class="layui-input-block">
                <input type="text" name="name"  placeholder="请输入3-30位的用户名" autocomplete="off" class="layui-input w40b f_left"  datatype="*3-30"   ajaxurl="/member/register/check_name" errormsg="请输入用户名" tipsrmsg="请输入用户名" ><span class="Validform_checktip"></span>
            </div>
        </div>
        <div class="layui-form-item from_left">
            <label class="layui-form-label"><span class="red">*</span>验 证 码</label>
            <div class="layui-input-block">
                <input type="text" name="code"  placeholder="验证码" autocomplete="off" class="layui-input w20b f_left02"  datatype="n6-6" ajaxurl="/member/register/check_sms" maxlength="6" errormsg="验证码不正确" tipsrmsg="请输入验证码" ><input type="button" id="yzm" value="获取验证码"  onclick="getcode( this )"/><span class="Validform_checktip"></span>
            </div>
        </div>
        <div class="layui-form-item from_left">
            <label class="layui-form-label"><span class="red">*</span>用户密码</label>
            <div class="layui-input-block">
                <input type="password" name="password"  placeholder="请输入6-20位密码" autocomplete="off" class="layui-input w40b f_left" datatype="*6-20" errormsg="密码输入为6-20位" tipsrmsg="请输入位密码"><span class="Validform_checktip"></span>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="red">*</span>确认密码</label>
            <div class="layui-input-block">
                <input type="password" name="check_password"  placeholder="请输入6-20位密码" autocomplete="off" class="layui-input w40b f_left"  datatype="*6-20" recheck="password" errormsg="确认密码与原密码不一致" tipsrmsg="确认密码必须与原密码一致" ><span class="Validform_checktip"></span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endif