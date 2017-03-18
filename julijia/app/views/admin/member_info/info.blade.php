@section('content')

    <div class="page">
        {{--<a href="{{url('admin/member/info/edit')}}"> 更改信息</a>--}}
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
                                {{$user->name?$user->name:'暂无'}}</label>
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
                                {{$user->alias?$user->alias:'暂无'}}</label>
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
                            @if($user->birthday)
                                <label class="control-label cur-p m-r-10">
                                    {{date('Y年 m月 d日', strtotime($user->birthday));}}
                                </label>
                            @endif
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
                                {{$user->email?$user->email:'暂无'}}</label>
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
                                {{$user->mobile_phone?$user->mobile_phone:'暂无'}}
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
                                {{$user->user_points?$user->user_points:'暂无'}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <span class="ng-binding">用户等级：</span>
                        </label>

                        <div class="col-sm-8">
                            <label class="control-label cur-p m-r-10">
                                {{$group_name?$group_name:'暂无'}}</label>
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
                                <?php if ((time() - strtotime($user->last_time)) < 7200)
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
