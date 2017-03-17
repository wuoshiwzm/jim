@section('title')会员等级@stop

@section('content')

    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">会员等级</span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="explanation m-b-10">

            <div class="title">
                <i class="arrow-icon explain-checkZoom" title="点击此处展开或收起"></i>
                <i class="iconfont">&#xe6a7;</i>
                <h4>温馨提示</h4>
            </div>
            <ul class="explain-panel">
                <li>
                    <span>会员等级：由“成长值”决定，成长值越高，会员等级越高</span>
                </li>
                <li>
                    <span>成长值：是会员通过购物所获得的经验值，由累计购物金额计算获得，成长值获得根据确认收货时间计算，成长值按照交易金额的个位数取整计算。例如会员的订单是88.2元，则确认收货后可以得到88点成长值</span>
                </li>
            </ul>
        </div>


        <div class="search-term m-b-10">
            <div class="simple-form-field">
                <input type="button" id="btn_search" value="新增" class="btn btn-primary m-r-5"
                       onclick="location='{{url('admin/group/create')}}'">
            </div>
        </div>
        <div class="common-title">
            <div class="ftitle">
                <h3>会员等级列表</h3>

                <h5>
                    (&nbsp;共
                    <span data-total-record="true">309</span>
                    条记录&nbsp;)
                </h5>

            </div>
            <div class="operate">

                <a class="reload" href="javascript:reload();" data-toggle="tooltip" data-placement="auto bottom"
                   title="" data-original-title="刷新数据">
                    <i class="iconfont">&#xe6fb;</i>
                </a>

            </div>
        </div>
        <!--列表内容-->
        <div class="table-responsive">
            <table id="table_list" class="table table-hover">
                <thead>
                <tr>
                    <th class="text-c w100" style="cursor: pointer;">编号</th>
                    <th class="w200" style="cursor: pointer;">等级名称</th>
                    <th class="text-c w200" style="cursor: default;">等级图标</th>
                    <th class="w200" style="cursor: pointer;">成长值范围</th>
                    <th class="handle w200">操作</th>
                </tr>
                </thead>
                <tbody>
                @if($groups->count())
                    @foreach($groups as $group)
                        <tr>
                            <td class="text-c">5</td>
                            <td>{{$group->name}}</td>
                            <td class="text-c">


                                <img src="{{$group->name}}" class="user-level m-r-5"
                                     style="width: 20px; height: 20px;">
                                <span class="btn btn-success btn-sm pos-r upload-img"
                                      data-id="5"> 更换 </span>

                            </td>
                            <td>{{$group->beg_points}} ~ {{$group->end_points}}</td>
                            <td class="handle">
                                <a href="{{url('admin/group/'.$group->id.'/edit')}}">编辑</a>
                                <span>|</span>
                                <a onclick="delGroup({{"'".encode($group->id)."'"}});"   class="dele_d">删除</a>
                            </td>
                        </tr>
                    @endforeach
                @endif


                </tbody>

            </table>

            <div class="pull-right page-box">


                @include('admin.public.page',array('data'=>$data,'set'=>$set))
            </div>

        </div>

    </div>


@stop

@section('footer_js')
    <script type="text/javascript" src="{{url('js/admin/group.js')}}"></script>
@stop