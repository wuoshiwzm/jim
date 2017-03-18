<div class="big_pics">
    <div id="preview" class="spec-preview">
        <span class="jqzoom">
            @foreach( $carousel as $key=>$car )
                @if( $key == 0)
                    <img src="{{ getImgSize( 'goods', $car->entity_id, $car->value,430,430 ) }}" jqimg="{{ getImgSize( 'goods', $car->entity_id, $car->value,860,860 ) }}" />
                @endif
            @endforeach
        </span>
    </div>
    <!--缩图开始-->
    <div class="spec-scroll"> <a class="prev">&lt;</a> <a class="next">&gt;</a>
        <div class="items">
            <ul>
                @foreach( $carousel as $k=>$car )
                    <li><img bimg="{{ getImgSize( 'goods', $car->entity_id, $car->value,860,860 ) }}" src="{{ getImgSize( 'goods', $car->entity_id, $car->value,430,430 ) }}" onmousemove="preview(this);" /></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!--缩图结束-->
</div>