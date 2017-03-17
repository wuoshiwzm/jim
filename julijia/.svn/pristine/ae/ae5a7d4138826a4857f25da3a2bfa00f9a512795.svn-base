<div class="table_div_h">
    <h2>收货人</h2><a href="Javascript:void(0)" class="add_adress add_adress_tt">新增收货地址</a>
    <ul class="shou_huo">
        @foreach( $address as $row )
            <li class="checkbox">
                <input type="checkbox" name="address" title="{{$row->name}}" value="{{$row->id}}"  @if( $row->status == 1 )  checked="checked" @endif>
                <div>
                    <span>{{$row->name}}</span>
                    <span>陕西</span>
                    <span>西安市</span>
                    <span>灞桥区</span>
                    <span>{{$row->address}}</span>
                    <span>183****5759</span>
                    @if( $row->status == 1 )
                        <span class="bg_span">默认地址</span>
                    @endif
                    <a href="Javascript:void(0)" class="add_adress dele_d">删除</a>
                    <a href="Javascript:void(0)" class="add_adress add_adress_tt">编辑</a>
                    <a href="##" class="add_adress">设为默认地址</a>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="shou_adress"><a href="Javascript:void(0)" class="shou_adress_top">收起地址</a></div>
</div>