

@section('content')

    <div class="page">
        <div class="fixed-bar">
            <div class="item-title item-title02">
                <div class="subject">
                    <h3>
                        <span class="action">会员 - 详情</span>
                    </h3>
                    @include('admin.member_info.view.tab')
                </div>
            </div>
        </div>

        <div class="order-info m-b-10">
            <!--概要信息-->
            <div class="order-details">
                <div class="title">概要信息</div>
                <div class="content">
                    <dl>
                        <dt>&nbsp;用&nbsp;户&nbsp;名：</dt>
                        <dd>{{$welc->name?$welc->name:'暂无'}}</dd>
                    </dl>
                    <dl>
                        <dt>性&nbsp;别：</dt>
                        <dd><?php if ($welc->sex == 1) {
                                echo '男';
                            } elseif ($welc->sex == 0){
                                echo '女';
                            }else{
                                echo '暂无';
                            }?></dd>
                    </dl>
                    <dl>
                        <dt>Email：</dt>
                        <dd>{{$welc->email?$welc->email:'暂无'}}</dd>
                    </dl>
                    <dl>

                        <dt>最后一次登录：</dt>
                        <dd>{{$welc->last_time?$welc->last_time:'暂无'}}</dd>
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
                        <dd>{{$group_name}}</dd>
                    </dl>
                    <dl>
                        <dt>账号来源：</dt>
                        <dd>电脑端</dd>
                    </dl>
                </div>
            </div>
            <!--收货信息-->
            <div class="order-details">
                <div class="title">收货信息</div>
                <div class="content">
                    <dl>
                        <dd>
                            {{$address['province']}}&nbsp;&nbsp;&nbsp;
                            {{$address['city']}}&nbsp;&nbsp;&nbsp;
                            {{$address['district']}}&nbsp;&nbsp;&nbsp;
                            {{$address['address']}}&nbsp;&nbsp;&nbsp;
                            {{$welc->name}} &nbsp;&nbsp;&nbsp;
                            {{$welc->mobile_phone}}  &nbsp;&nbsp;&nbsp;
                            {{$address['zip_code']}}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>


    </div>


@stop
