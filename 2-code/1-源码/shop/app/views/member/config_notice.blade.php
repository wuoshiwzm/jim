@section('title')
    网站提醒
@stop


@section('admincss')
@stop

@section('left')
    @include('member.public.left_config')
@stop

@section('content')

    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>

        <div class="admin_form">
            <div class="h-title">
                网站提醒<font>Site To Remind</font>
            </div>
            <div class="h-txt">
                <ul>


                    @foreach($data as $notice)

                        <li>
                            <span>{{$notice->created_at}}</span>
                            <a href="##" class="font_a"><font class="iconfont">&#xe641;</font></a>
                            <dl>
                                <dt>{{$notice->title}}</dt>
                                <dd>{{$notice->content}}</dd>
                            </dl>
                        </li>

                    @endforeach

                </ul>
                <div id="paging">
                    @include('member.public.page',array('data'=>$data,'set'=>$set))
                </div>
            </div>


        </div>

    </div>

@stop