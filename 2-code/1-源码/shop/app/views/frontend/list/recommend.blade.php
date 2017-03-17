@if( count($recommend) )
<div class="chanpin_right">
    <h2>推荐商品</h2>
    <ul>
        @foreach( $recommend as $rec )
        <li>
            <dl>
                <dt><a href="{{url($rec->entity_id.'.html')}}" title="{{$rec->name}}" ><img src="{{ getImgSize( 'goods', $rec->entity_id, $rec->small_image,210,210 ) }}"></a></dt>
                <dd class="qiang_div_a"><a href="{{url($rec->entity_id.'.html')}}"  title="{{$rec->name}}" >{{$rec->name}}</a></dd>
                <dd class="qiang_div_jia"><font>¥</font>@if( (int)$rec->preferential_price) {{$rec->preferential_price}}<em>¥{{$rec->price}}</em> @else {{$rec->price}} @endif</dd>
            </dl>
        </li>
        @endforeach
    </ul>
</div>
@endif