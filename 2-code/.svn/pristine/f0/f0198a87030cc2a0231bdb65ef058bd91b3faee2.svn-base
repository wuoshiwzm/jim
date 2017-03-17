

@section('content')

    <div class="page">
        <div class="fixed-bar">
            <div class="item-title item-title02">
                <div class="subject">
                    <h3>
                        <span class="action">会员 - 详情</span>
                    </h3>

                    <h5>
				<span class="action-span">
					<a href="{{url('admin/member/wel')}}" class="btn btn-warning click-loading">
                        <i class="iconfont">&#xe6d4;</i>
						返回会员列表
					</a>
				</span>
                    </h5>

                    <ul class="tab-base shop-row">
                        <li><a class="current" href="{{url('admin/member/welc/'.$user_id)}}">
                                <span>欢迎页</span>
                            </a>
                        </li>
                        <li><a href="{{url('admin/member/info/'.$user_id)}}">
                                <span>会员信息</span>
                            </a>
                        </li>
                        <li><a  href="{{url('admin/member/address/'.$user_id)}}">
                                <span>收货地址</span>
                            </a>
                        </li>
                        <li><a href="{{url('admin/member/orders/'.$user_id)}}">
                                <span>订单</span>
                            </a>
                        </li>
                        <li><a href="{{url('admin/member/cart/'.$user_id)}}">
                                <span>购物车</span>
                            </a>
                        </li>
                        <li><a href="{{url('admin/member/collect/'.$user_id)}}">
                                <span>收藏</span>
                            </a>
                        </li>
                        <li><a href="{{url('admin/member/comment/'.$user_id)}}">
                                <span>评价</span>
                            </a>
                        </li>
                        <li><a href="{{url('admin/member/feedback/'.$user_id)}}">
                                <span>投诉</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <?php  //dd(Auth::user()); ?>
        <div class="order-info m-b-10">
            <!--概要信息-->
            <div class="order-details">
                <div class="title">概要信息</div>
                <div class="content">
                    <dl>
                        <dt>&nbsp;用&nbsp;户&nbsp;名：</dt>
                        <dd>{{$welc->name}}</dd>
                    </dl>
                    <dl>
                        <dt>性&nbsp;别：</dt>
                        <dd><?php if ($welc->sex == 1) {
                                echo '男';
                            } else {
                                echo '女';
                            }?></dd>
                    </dl>
                    <dl>
                        <dt>Email：</dt>
                        <dd>{{$welc->email}}</dd>
                    </dl>
                    <dl>

                        <dt>最后一次登录：</dt>
                        <dd>{{$welc->last_time}}</dd>
                    </dl>
                    <dl>
                        <dt>账号来源：</dt>
                        <dd>
                            <?php
                            if (ToolsUtils::isMobileDevice()) {
                                echo '手机端';
                            } else {
                                echo 'PC端';
                            }
                            ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt>用户等级：</dt>
                        <dd>{{$group->name}}</dd>
                    </dl>
                    <dl>
                        <dt>账号来源：</dt>
                        <dd>???</dd>
                    </dl>
                </div>
            </div>
            <!--收货信息-->
            <div class="order-details">
                <div class="title">收货信息</div>
                <div class="content">
                    <dl>
                        <dd>{{$address['province']}}&nbsp;&nbsp;&nbsp;{{$address['city']}}
                            &nbsp;&nbsp;&nbsp;{{$address['district']}}&nbsp;&nbsp;&nbsp;{{$address['address']}}
                            &nbsp;&nbsp;&nbsp;{{$welc->name}}，&nbsp;&nbsp;&nbsp;{{$welc->mobile_phone}} ，&nbsp;&nbsp;&nbsp;{{$address['zip_code']}}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>


    </div>


@stop
