@section('title')
    会员积分
@stop

@section(('content'))


    <div class="ge_admin_nei_right">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>

        <div class="table_div_h">
            <h2>我的积分</h2>
            <ul class="jifen">
                <li>总积分：<font>{{$pointsAvailable}}</font>分</li>
                <li>会员等级<span>{{$memberGroupInfo->name}}</span></li>
                <li><i>再有{{$nextGroupGap}}分升级到{{$nextGroupName}}</i></li>
            </ul>
        </div>
        <!--订单切换-->
        <div class="table_div">


            <div class="table_div_hd table_div_hd_table">

                <h5>积分介绍</h5>
                <div class="zzjs">

                    <p>1、成长值是商城会员通过购物获得</p>

                    <p>2、累积的成长值总额决定会员等级，成长值越高，会员等级越高。会员成长值 ≈ 累计购物金额</p>

                    <p>3、成长值：购物获得的成长值是根据确认收货时间计算，成长值按照交易金额的个位数取整计算：例如会员的订单是88.2元，则确认收货后并且无退款退货，即可以得到88点成长值</p>

                    <p>4、确认收货后退款退货，会扣减成长值，扣除的成长值与当时获得的值相同</p>
                </div>

                <h5>升级条件</h5>

                <table cellpadding="0" cellspacing="0" class="order_tab order_margin">
                    <tr>
                        <th width="30%">会员等级</th>
                        <th width="40%">成长值</th>
                        <th width="30%">等级图标</th>
                    </tr>

                    @foreach($allGroup as $group)
                        <tr>
                            <td>{{$group->name}}</td>
                            <td>{{$group->beg_points}} - {{$group->end_points}}</td>
                            <td><img src="../images/iconfont-gerenshiwu.png" width='20' height='20'></td>
                        </tr>
                    @endforeach




                </table>

            </div>
        </div>
    </div>
@stop
@section('js')

@stop