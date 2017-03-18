@foreach( $floor['goods'] as $kf=>$f )
<div class="qiang qiang0{{$kf+3}}">
    <div class="wow fadeInUp animated">
        <div class="qiang_h">
            <h1>{{$kf+1}}F {{$f['name']}}</h1><a href="{{url($f['url'].'.html')}}">更多</a>
        </div>
        <div class="qiang_div">
            <ul>
                <li class="f_img">
                   @if( count($floor['ads']) && count($floor['ads'][$kf])&&isset($floor['ads'][$kf]->id) )
                        <img src="{{getImagesUrl('ads', $floor['ads'][$kf]->pid, $floor['ads'][$kf]->img)}}">
                   @endif
                </li>
                @foreach( $f['goods'] as $goods )
                <li>
                    <dl>
                        <dt><a href="{{url($goods->entity_id.'.html')}}"  target="_blank"  title="{{$goods->name}}" ><img src="{{ getImgSize( 'goods', $goods->entity_id, $goods->small_image,210,210 ) }}"></a></dt>
                        <dd class="qiang_div_a"><a href="{{url($goods->entity_id.'.html')}}"  target="_blank"  title="{{$goods->name}}" >{{$goods->name}}</a></dd>
                        <dd class="qiang_div_jia"><font>¥</font>{{$goods->price}}</dd>
                    </dl>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endforeach