@if( count($recommend) )
    <div class="bulid_right">
        <h1>推荐产品</h1>
        <div class="bulid_right_ul">
            <ul>
                @foreach( $recommend as $rec )
                    <li>
                        <a href="{{url($rec->entity_id.'.html')}}" title="{{$rec->name}}" >
                            <img src="{{ getImgSize( 'goods', $rec->entity_id, $rec->small_image,210,210 ) }}">
                        </a>
                        <span><a href="{{url($rec->entity_id.'.html')}}"  title="{{$rec->name}}" > {{$rec->name}}</a></span>
                        <font>@if( (int)$rec->preferential_price) ¥{{$rec->preferential_price}} @else ¥{{$rec->price}} @endif</font>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
    </div>
@endif

