@foreach( $address as $row )
    <li class="checkbox">
        <input type="checkbox" name="address" title="{{$row->name}}" value="{{$row->id}}"  @if( $row->status == 1 )  checked="checked" @endif>
        <div class="layui-unselect layui-form-checkbox  @if( $row->status == 1 ) layui-form-checked @endif">
            <span>{{$row->name}}</span><i class="layui-icon"></i>
        </div>
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