<div class="chanpin_left">
    <div class="chanpin_left_pai">
        <ul class="order-list">
            <li><a href="JavaScript:;" >推荐</a></li>
            <li><a href="JavaScript:;" >新品</a></li>
            <?php
            $price = Input::get('s');
            if( $price == 'desc' )
            {
                $pv = 'asc';
            }else
            {
                $pv = 'desc';
            }
            ?>
            <li>
                <a @if( isset($screen['url']) ) href="{{ getScreenUrl( $screen['url'], 's', $pv ) }}" @else href="{{ getScreenUrl( '', 's', $pv )}}" @endif>价格
                    @if( $price == false )
                    <em class="bus11"></em>
                    @elseif( $price == 'desc' )
                    <em class="bus2"></em>
                    @elseif( $price == 'asc' )
                    <em class="bus22"></em>
                    @endif
                </a>
            </li>
        </ul>
    </div>
    <div class="chanpin_left_pin">
        <ul>
            @foreach( $data as $row )
            <li>
                <dl>
                    <dt><a href="{{url($row->entity_id.'.html')}}"  target="_blank"  title="{{$row->name}}" ><img src="{{ getImgSize( 'goods', $row->entity_id, $row->small_image ) }}"></a></dt>
                    <dd class="qiang_div_a"><a href="{{url($row->entity_id.'.html')}}"  target="_blank"  title="{{$row->name}}" >{{$row->name}}</a></dd>
                    <dd class="qiang_div_jia">
                        <font>¥</font>
                        @if( $row->cost_price )
                            {{$row->cost_price}}
                            <em>¥{{$row->price}}</em>
                        @else
                            {{$row->price}}
                        @endif
                        <a href="{{url($row->entity_id.'.html')}}" class="shop_car">加入购物车</a></dd>
                    <dd class="qiang_div_add"><a href="javascript:;" @if( Session::get('member') ) class="love keepYes" @else class="love keepNo" @endif>喜欢</a></dd>
                </dl>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- 分页 -->
    @if( $data->getTotal()  )
    <div id="pagination">
        {{$data->appends(setUrlToArray(Request::getQueryString()))->links()}}
        <div class="pagination-info">
            共<font>{{$data->getTotal()}}</font>条
        </div>
    </div>
    @endif
</div>