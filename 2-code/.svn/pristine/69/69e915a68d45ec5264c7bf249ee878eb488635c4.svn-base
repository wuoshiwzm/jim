@section('content')

    <div class="page">
        {{--<a href="{{url('admin/member/info/edit')}}"> 更改信息</a>--}}
        <div class="fixed-bar">
            <div class="item-title item-title02">
                <div class="subject">
                    <h3>
                        <span class="action">会员 - 详情</span>
                    </h3>

                    <h5>
				<span class="action-span">
					<a href="vip.html" class="btn btn-warning click-loading">
						<i class="iconfont">&#xe6d4;</i>
						返回会员列表
					</a>
				</span>
                    </h5>
                    <ul class="tab-base shop-row">
                        <li><a href="{{url('admin/member/welc/'.$user_id)}}">
                                <span>欢迎页</span>
                            </a>
                        </li>
                        <li><a class="current" href="{{url('admin/member/info/'.$user_id)}}">
                                <span>会员信息</span>
                            </a>
                        </li>
                        <li><a href="{{url('admin/member/address/'.$user_id)}}">
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


        <div class="form-horizontal">
            <div class="table-content m-t-30 ">

                <h5 class="tab_h5"><font class="iconfont">&#xe64e;</font>基本信息</h5>
                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">用户名：</span>
                        </label>
                        <div class="col-sm-8">
                            <label class="control-label cur-p m-r-10">
                                {{$user->name}}</label>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">用户昵称：</span>
                        </label>
                        <div class="col-sm-8">
                            <label class="control-label cur-p m-r-10">
                                {{$user->alias}}</label>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">性别：</span>

                        </label>
                        <div class="col-sm-8">
                            <label class="control-label cur-p m-r-10">
                                <?php if ($user->sex == 1) {
                                    echo '男';
                                } else {
                                    echo '女';
                                }
                                ?>

                            </label>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">出生日期：</span>
                        </label>
                        <div class="col-sm-8">
                            <?php
                            //$time = mktime(Auth::user()->birthday);
                            $t = strtotime($user->birthday);
                            echo '<label class="control-label cur-p m-r-10">';
                            echo date('Y年 m月 d日', $t);
                            echo '</label>';
                            ?>


                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">邮 箱：</span>
                        </label>
                        <div class="col-sm-8">
                            <label class="control-label cur-p m-r-10">
                                {{$user->email}}</label>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">居住地：</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-control-box">
                                <label class="control-label cur-p m-r-10">{{$address['province']}}</label>
                                <label class="control-label cur-p m-r-10">{{$address['city']}}</label>
                                <label class="control-label cur-p m-r-10">{{$address['district']}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">详细地址：</span>
                        </label>
                        <div class="col-sm-8">
                            <label class="control-label cur-p m-r-10">
                                {{$address['address']}}

                            </label>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">手机号码：</span>
                        </label>
                        <div class="col-sm-8">
                            <label class="control-label cur-p m-r-10">
                                {{$user->mobile_phone}} ?>
                             </label>
                         </div>
                     </div>
                 </div>

                 <h5 class="tab_h5"><font class="iconfont">&#xe693;</font>账户信息</h5>
                 <div class="simple-form-field">
                     <div class="form-group">
                         <label class="col-sm-4 control-label">
                             <span class="ng-binding">用户积分：</span>
                         </label>
                         <div class="col-sm-8">
                             <label class="control-label cur-p m-r-10">
                                 {{$user->user_points}}</label>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="col-sm-4 control-label">
                             <span class="ng-binding">用户等级：</span>
                         </label>
                         <div class="col-sm-8">
                             <label class="control-label cur-p m-r-10">{{$group->name}}</label>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">是否登录：</span>
                        </label>
                        <div class="col-sm-8">
                            <label class="control-label cur-p m-r-10">
                                <?php if (Session::get('user')->id)
                                    echo '是';
                                else
                                    echo '否';
                                ?></label>
                        </div>
                    </div>
                </div>
                <div class="simple-form-field">
                </div>


            </div>
        </div>
    </div>


@stop
