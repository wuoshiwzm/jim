<div class="ge_admin_nei_left">
    <ul>
        <li @if(exiturl('index'))class="c_on" @endif ><a href="{{url('member/config/index')}}"><font
                        class="iconfont">&#xe65d;</font>个人设置</a></li>
        <li @if(exiturl('address'))class="c_on" @endif><a href="{{url('member/config/address')}}"><font
                        class="iconfont">&#xe651;</font>收货地址</a></li>
        <li @if(exiturl('pass'))class="c_on" @endif><a href="{{url('member/config/pass')}}"><font
                        class="iconfont">&#xe657;</font>密码设置</a></li>
        <li @if(exiturl('notice'))class="c_on" @endif><a href="{{url('member/config/notice')}}"><font
                        class="iconfont">&#xe621;</font>网站提醒</a></li>
    </ul>
</div>