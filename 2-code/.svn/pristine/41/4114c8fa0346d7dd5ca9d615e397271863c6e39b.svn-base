@section('title')

收货地址
@stop


@section('admincss')
@stop

@section('content')

<div class="ge_admin_nei_right">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>

    <div class="admin_form">
        <div class="h-title">
            收货地址<font>Shipping Address</font>
        </div>
        <form class="layui-form m-form" action="{{url('member/config/address/'.$addrEdit->id)}}" method="post" novalidate>
            {{--<input type="hidden" name="_method" value="PUT">--}}
            {{ Form::token() }}


            <div class="layui-form-item">
                <label class="layui-form-label"><span class="red">*</span>所在地区</label>
                <div class="layui-input-inline">
                    <select name="quiz1">
                        <option value="">请选择省</option>
                        <option value="浙江" selected="">浙江省</option>
                        <option value="你的工号">江西省</option>
                        <option value="你最喜欢的老师">福建省</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="quiz2">
                        <option value="">请选择市</option>
                        <option value="杭州">杭州</option>
                        <option value="宁波">宁波</option>
                        <option value="温州">温州</option>
                        <option value="温州">台州</option>
                        <option value="温州">绍兴</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="quiz3">
                        <option value="">请选择县/区</option>
                        <option value="西湖区">西湖区</option>
                        <option value="余杭区">余杭区</option>
                        <option value="拱墅区">临安市</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label"><span class="red">*</span>详细地址</label>
                <div class="layui-input-block">
                        <textarea name="address" class="layui-textarea w80b f_left"
                                  placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息"
                                  autocomplete="off" ignore="ignore"
                                  datatype="n" errormsg="5-120个字符，一个汉字为两个字符"
                                  tipsrmsg="请输入详细地址">{{$addrEdit->address}}</textarea><span
                        class="Validform_checktip"></span>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">邮政编码</label>
                <div class="layui-input-block">
                    <input type="text" name="zipcode" placeholder="如您不清楚邮递区号，请填写000000"
                           autocomplete="off"
                           class="layui-input w40b f_left"
                           errormsg="请输入邮政编码"
                           tipsrmsg="请输入邮政编码"
                           value="{{$addrEdit->zipcode}}"
                    ><span

                        class="Validform_checktip"></span>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label"><span class="red">*</span>收货人</label>
                <div class="layui-input-block">
                    <input type="text" name="name" placeholder="长度不超过25个字符" autocomplete="off"
                           class="layui-input w40b f_left" ignore="ignore" datatype="n"
                           errormsg="收货人姓名应为2-25个字符，一个汉字为两个字符" tipsrmsg="请输入收货人姓名"
                           value="{{$addrEdit->name}}"
                    ><span
                        class="Validform_checktip"></span>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label"><span class="red">*</span>手机号码</label>
                <div class="layui-input-block">
                    <input type="text" name="phone" placeholder="电话号码、手机号码必须填一项" autocomplete="off"
                           class="layui-input w40b f_left" ignore="ignore" datatype="n" errormsg="6-20个数字"
                           tipsrmsg="请输入手机号码"
                           value="{{$addrEdit->phone}}"
                    ><span class="Validform_checktip"></span>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">电话号码</label>
                <div class="layui-input-block">

                    <input type="text" name="tel" placeholder="电话号码"
                           class="layui-input w30b f_left m_r_10"
                           value="{{$addrEdit->tel}}">

                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label"> </label>
                <div class="layui-input-block">
                    <input type="checkbox" name="status" title="设为默认地址" value="1">
                    <div class="layui-unselect layui-form-checkbox layui-form-checked"><span>设为默认地址</span><i
                            class="layui-icon"></i></div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn">保存</button>
                </div>
            </div>
        </form>
    </div>

    {{--<div class="admin_table">--}}
        {{--<div class="h-title">--}}
            {{--<table border="0" cellpadding="0" cellspacing="0">--}}
                {{--<tr>--}}
                    {{--<th width="10%">收货人</th>--}}
                    {{--<th width="20%">所在地区</th>--}}
                    {{--<th>详细地址</th>--}}
                    {{--<th width="10%">邮编</th>--}}
                    {{--<th width="16%">电话/手机</th>--}}
                    {{--<th width="18%" class="border_rn">操作</th>--}}
                {{--</tr>--}}

                {{--@foreach($addrInfo as $addr)--}}
                {{--<tr>--}}
                    {{--<td>{{$addr->name}}</td>--}}
                    {{--<td>{{$addr->province_name}}，{{$addr->city_name}}，{{$addr->area_name}}</td>--}}
                    {{--<td>{{$addr->address}}</td>--}}
                    {{--<td>{{$addr->zipcode}}</td>--}}
                    {{--<td>{{$addr->phone}}</td>--}}
                    {{--<td class="border_rn">--}}
                        {{--<a href="{{url('member/config/address/'.$addr->id."/edit")}}">修改</a>&nbsp;&nbsp;&nbsp;--}}
                        {{--&nbsp;&nbsp;--}}

                        {{--@if($addr->status == 1)--}}
                            {{--这是默认地址--}}
                        {{--@else--}}
                            {{--<a href="javascript:;" onclick="delAddr({{"'".encode($addr->id)."'"}});">删除</a>&nbsp;--}}
                            {{--<a href="{{url('member/config/address/set_default/'.encode($addr->id))}}">设为默认</a>--}}
                        {{--@endif--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--@endforeach--}}


            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}


</div>

@stop

@section('js')
<script>

    function delAddr(id) {
        var token = $("input[name='_token']").val();
        layer.confirm('确定要删除吗？', {
            btn: ['确定', '取消']
        }, function () {
            $.post('/member/config/address/' + id, {_method: 'DELETE', _token: token}, function (msg) {
                if (msg.status == '0') {
                    layer.msg(msg.msg, {icon: 1});
                    location = location;
                } else {
                    layer.msg(msg.msg, {icon: 2});
                }
            }, 'json')
        });
    }

</script>
@stop