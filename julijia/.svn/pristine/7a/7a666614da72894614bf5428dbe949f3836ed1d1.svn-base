<div class="shop_p" id="shop_p">
    <!--产品列表-->
    <ul>
        @foreach( $data as $row)
            <li>
                <dl>
                    <dt><img src="{{getImagesUrl('goods',$row->entity_id,$row->small_image)}}"></dt>
                    <dd class="dd_h"><a href="javascript:;">{{$row->name}}</a></dd>
                    <dd class="dd_size"><font>￥{{$row->price}}</font></dd>
                    <dd class="dd_add"><a href="javascript:;"><i class=""></i><span onclick="addItem( this )">选择</span></a></dd>
                    <input type="hidden" value="{{$row->entity_id}}">
                </dl>
            </li>
        @endforeach
    </ul>
</div>
<div id="pagination">
    <ul class="pagination" id="pagination">
    @if(count($data))
    {{ with(new ZurbPresenter($data))->render()}}
    @endif
    </ul>
</div>