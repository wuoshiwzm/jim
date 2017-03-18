<div class="qiang qiang02">
    <div class="wow fadeInUp animated">
        <div class="qiang_h">
            <h1><i>精品</i>推荐</h1>
        </div>
        <div class="qiang_div">
            <ul>
                @foreach( $recommend as $rec )
                <li>
                    <dl>
                        <dt><a href="{{url($rec->entity_id.'.html')}}"  target="_blank"  title="{{$rec->name}}" ><img src="{{ getImgSize( 'goods', $rec->entity_id, $rec->small_image,210,210 ) }}"></a></dt>
                        <dd class="qiang_div_a"><a href="{{url($rec->entity_id.'.html')}}"  target="_blank"  title="{{$rec->name}}" >{{$rec->name}}</a></dd>
                        <dd class="qiang_div_jia"><font>¥</font>{{$rec->price}}</dd>
                        <dd class="qiang_er03">推荐</dd>
                    </dl>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>