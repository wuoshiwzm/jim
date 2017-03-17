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
            <h2>退款列表</h2>
        </div>
        <!--订单切换-->

        <form action="{{url('member/refund/ship_back')}}" method="post">
            <input type="hidden" name="refundId" value={{encode($refundId)}}>
            {{Form::token()}}


            <input type="text" name="invoice_no">客户发货运单号
            <hr>
            <input type="text" name="invoice_name">客户发货快递公司名称
            <hr>
            <input type="text" name="shipping_fee">客户发货运费
            <hr>
            <input type="text" name="user_phone">客户电话
            <hr>
            <select name="province" id="address1">
                <option>请选择</option>
            </select>
            <select name="city" id="address2">

            </select>
            <select name="district" id="address3">

            </select>
            <hr>
            <textarea type="text" name="address">{{$userAddress->address}}</textarea>
            <hr>
            <input type="text" name="zipcode">客户邮编
            <hr>
            <input type="submit">
        </form>
    </div>

@stop
@section('js')
    <script type="text/javascript" src="{{asset('js/public/location_pick/location_pick.js')}}"></script>
@stop