@section('css')

@stop
@section('title')
    欢迎！{{Session::get('member')->alias}} 回来
@stop

@section('left')
    @include('member.public.left_center')
@stop
@section('content')
    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>

        <div class="ge_xin">
            <div class="ge_tou">
                <dl class="ge_tou_xx">
                    <dt class="qie_img1">
                        <img
                                onclick="getImgTemplet( this,'user' )"
                                src="{{!empty(Session::get('member')->header)?$userheader:'/images/member/tou.jpg'}}"
                                width="80"
                                height="80">
                        <br><font>修改头像</font>
                        <input type="hidden" id="user" value="{{Session::get('member')->header}}">
                    </dt>

                    <dd class="dd_h">{{Session::get('member')->alias}}</dd>
                    <dd class="dd_dd"><font>{{Session::get('member')->name}}</font></dd>
                    <dd class="dd_dd01"><i>
                       <a href="/member/config/address">我的收货地址</a></i><br/><i>
                       <a href="/member/collect">我的收藏</a></i></dd>

                </dl>
            </div>

            <div class="admin_fabu">
                <ul>
                    <li>
                        <a href="{{url('member/order/topay')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li01.png')}}"/></dt>
                                <dd>待付款
                                    <font>{{$numToPay}}</font></dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('member/order/toship')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li02.png')}}"/></dt>
                                <dd>待发货
                                    <font>{{$numToShip}}</font></dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('member/order/toreceive')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li03.png')}}"/></dt>
                                <dd>待收货
                                    <font>{{$numToReceive}}</font></dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('member/order/tocomment')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li04.png')}}"/></dt>
                                <dd>待评价
                                    <font>{{$numToReview}}</font></dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('member/refund')}}">
                            <dl>
                                <dt><img src="{{asset('images/member/li05.png')}}"/></dt>
                                <dd>退款维权
                                    <font>
                                        @if(Session::get('member')->refund()->count())
                                            {{Session::get('member')->refund()->count()}}
                                        @else
                                            0
                                        @endif
                                    </font></dd>
                            </dl>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="ge_xin02">
            <h2>我的物流</h2>
                @if($numToReceive)
                    @foreach($items as $item)
                    <div class="ge_tou">
                        <dl class="ge_tou_xx">
                            <dt class="qie_img_img">
                                <a href="##">
                                    <img src="{{ getImgSize( 'goods', isset($item->product->entity_id)?$item->product->entity_id:'', isset($item->product->small_image)?$item->product->small_image:'')}}"/>
                                </a>
                            </dt>
                             @if(isset($item->ShippingDetail->first()->id))
                                @foreach($item->ShippingDetail()->orderBy('id','desc')->get()  as $key=> $v)
                                   @if($key==0)
                                        <dd class="dd_h">{{$v->AcceptStation}}</dd>
                                        <dd class="dd_dd01">{{$v->AcceptTime}}
                                            <i>
                                                <a href="{{url('member/order/shipping/' . encode($item->id))}}">查看物流信息</a>
                                            </i>
                                        </dd>
                                    @endif
                                 @endforeach
                              @endif
                        </dl>
                        <a href="javascript:void(0)" class="ge_tou_a" onclick="receive('{{encode($item->order_id)}}','{{encode($item->id)}}')">确认收货</a>
                    </div>
                    @endforeach
                @else
                    无物流信息
                @endif
        </div>

        <div class="collection">
            <h2>我的浏览，我的喜欢</h2>
            <div>
                @if(count($goods))
                    @foreach($goods as $visit)

                        <dl>
                            <dt>
                                <a href="{{url($visit->vs_value)}}.html" target="_blank" title="{{isset($visit->product->name)?$visit->product->name:''}}">
                                    <img src="{{ getImgSize( 'goods', $visit->vs_value, isset($visit->product->small_image)?$visit->product->small_image:'' )}} "/>
                                </a>
                            </dt>
                        </dl>
                    @endforeach

                @else
                    <p style="margin: 15px ;">没有浏览记录</p>
                @endif

            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript" src="{{asset('js/member/member.js')}}"></script>
    <script>
        function getImgTemplet(index, id) {
            layer.open({
                type: 2,
                title: false,
                shadeClose: true,
                shade: 0.8,
                area: ['460px', '480px'],
                content: ['/admin/get/imgtemplet/' + id, 'no']
            });
        }
        function setPathUrl( path, index  )
        {
            $.post('/member/user/header',{path:path},function (msg) {
                msg=  eval("("+msg+")");
                if(msg['path']!=0){
                    $("#"+index).parents('.qie_img1').find('img').attr('src',msg['path']);
                }else{
                    $("#"+index).parents('.qie_img1').find('img').attr('src','/images/member/tou.png');
                }

            })

        }
    </script>
@stop