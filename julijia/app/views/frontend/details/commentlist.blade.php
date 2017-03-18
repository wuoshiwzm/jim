@foreach( $commentData as $row )
    <li class="dianping_txt">
        <div class="dianping_txt_left">
            <dl>
                <dt>@if( isset($row->user->header) )<img src="{{getImagesUrl('user', $row->user_id, $row->user->header,true)}}" />@else <img src="{{url('images/frontend/mo01.jpg')}}"/> @endif</dt>
                <dd>@if( isset($row->user->alias) ){{$row->user->alias}}@endif</dd>
            </dl>
            <span class="tou_bg"></span>
        </div>
        <div class="dianping_txt_right">
            <div>{{$row->content}}</div>
        </div>
    </li>
@endforeach
@if( $page >= 15 )
    <div id="pagination" class="list_nei">
        <ul class="pagination" id="pagination">
            {{ with(new ZurbPresenter($commentData))->render() }}
        </ul>
    </div>
@endif