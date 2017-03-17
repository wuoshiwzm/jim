<div class="table_div_h">
    <h2>收货人</h2><a href="Javascript:void(0)" class="add_adress add_adress_tt">新增收货地址</a>
    <ul class="shou_huo" id="addressList">
        @foreach( $address as $row )
            <li class="checkbox" @if($row->status == false) style="display: none" @endif>
                <input type="checkbox" name="address" title="{{$row->name}}" value="{{$row->id}}"  @if( $row->status == 1 )  checked="checked" @endif>
                <div>
                    <span class="addressContent" @if($row->status) id="addressContent" @endif>
                        <span>{{$row->name}}</span>
                        <span>{{$row->province}}</span>
                        <span>{{$row->city}}</span>
                        <span>{{$row->district}}</span>
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