<div class="bulid_info">
    <h1 title="{{$data->name}}">{{$data->name}}</h1>
    <div class="detail_msg">
        <ul>
            <li class="phone_bg">
                @if( $data->cost_price )
                    <div><span class="black">产品售价：</span><span class="price">¥{{$data->cost_price}}</span>&nbsp;&nbsp;<span class="price02">¥{{$data->price}}</span></div>
                <!--<div><span class="black">促销信息：</span><span class="vip_zhe"><font class="red_bg">可用优惠券</font>可使用组合折扣</span></div>-->
                @else
                    <div><span class="black">产品售价：</span><span class="price">¥{{$data->price}}</span></div>
                @endif
                <!--限时抢购-->
                @if( getSecond($data->price_end) )
                <span class="black" style="display: none">限时抢购：</span><span class="xs_qg" id="second" data-val="{{getSecond($data->price_end)}}"><font></font></span>
                @endif
            </li>
            <li><span class="black">商品货号：</span>{{$data->sku}}</li>
            <!--可配开始--->
            @foreach( $attribute as $row )
            <li>
                <span class="black">{{$row->name}}：</span>
                <div class="color_list">
                    @foreach( $row->value as $v )
                        @if( strstr($v,'http') )
                            <a href="javascript:;"><img src="{{$v}}"></a>
                        @else
                            <a href="javascript:;"><span>{{$v}}</span></a>
                        @endif
                    @endforeach
                </div>
            </li>
            @endforeach
            <!---可配结束-->
            <li><span class="black">库　　存：</span><span id="kc">{{$data->kc_qty}}</span></li>
            <li class="phone_umber">
                <span class="black">数　　量：</span>
                <div class="umber">
                    <a href="javaScript:;" id="reduce">-</a>
                    <input id="num" name="num" type="text" value="1" maxlength="8">
                    <a href="javaScript:;" id="plus">+</a>
                </div>
            </li>
            <li class="phone_umber">
                <a href="##" class="u-buy1">立即购买</a>
                <a href="##" class="u-buy2">加入购物车</a>
                <a href="##" class="love">收藏</a>
            </li>
        </ul>
    </div>
</div>