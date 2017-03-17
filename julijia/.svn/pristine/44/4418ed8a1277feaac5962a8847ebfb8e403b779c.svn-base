<div class="qiang">
    <div class="wow fadeInUp animated">
        <div class="qiang_h">
            <h1>限时抢购</h1>
        </div>
        <div class="qiang_div qiang_div02">
            <ul>
                @foreach( $flashSale as $flash )
                <li>
                    <dl>
                        <dt><a href="{{url($flash->entity_id.'.html')}}"  target="_blank"  title="{{$flash->name}}" ><img src="{{ getImgSize( 'goods', $flash->entity_id, $flash->small_image ) }}"></a></dt>
                        <dd class="qiang_div_a"><a href="{{url($flash->entity_id.'.html')}}"  target="_blank"  title="{{$flash->name}}" >{{$flash->name}}</a></dd>
                        <dd class="qiang_div_gou flashtime">
                            <span><font>00&nbsp;:&nbsp;00&nbsp;:&nbsp;00</font>后结束</span>
                            <input type="hidden" value="{{getSecond($flash->price_end)}}">
                        </dd>
                        <dd class="qiang_div_jia"><font>¥</font>{{$flash->preferential_price}}</dd>
                    </dl>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
