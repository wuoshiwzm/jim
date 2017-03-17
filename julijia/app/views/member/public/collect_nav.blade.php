<div class="table_div_hd">
    <ul class="layui-nav">
        <li class="layui-nav-item
            @if(!exiturl('notshow'))layui-this @endif"
        ><a href="{{url('member/collect')}}">全部宝贝&nbsp;(&nbsp;{{$numAll}}&nbsp;)</a>
        </li>
        {{--<li class="layui-nav-item
            @if(exiturl('notshow'))layui-this  @endif"
        ><a href="{{url('member/collect/notshow')}}">失效&nbsp;(&nbsp; {{$numNotShow}}&nbsp;)</a>
        </li>--}}
      {{--  <li class="layui-nav-item
            @if(exiturl('toship'))layui-this @endif"
        ><a href="{{url('member/collect')}}">网店宝贝&nbsp;(&nbsp; &nbsp;)</a>
        </li>--}}

    </ul>
</div>