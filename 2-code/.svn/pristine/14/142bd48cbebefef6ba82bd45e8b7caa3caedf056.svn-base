<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/4
 * Time: 10:38
 */

class TestController extends CommonController
{
    /**
     * 订单模拟支付提交
     */
    public function  getPayprocess(){

        $result = DB::transaction(function( )
        {
            $input=   Input::get('order_sn');
           $info=  Source_Order_OrderInfo::where('order_sn',$input)->where('status','1')->first();
            if(!isset($info)){
                return false;
            }

            //订单主表
            $orderDate['payment_id'] = 'TestPayId'.$info->order_sn;//支付单号
            $orderDate['pay_status'] = 3;
            $orderDate['status'] = 4;
            Source_Order_OrderInfo::where('id',$info->id)->update( $orderDate );
            //写支付宝记录
            $orderPay = new Source_Order_OrderPayment() ;
            $orderPay->order_id = $info->id;
            $orderPay->payment_account = 'test@pay.com';
            $orderPay->payment_method = 1;
            $orderPay->payment_time = TimeTools::getFullTime();
            $orderPay->cc_id = rand(1000,9999);
            $orderPay->cc_total_fee = $info->pay_amount;
            $orderPay->cc_trade_no =$info->order_sn;
            $orderPay->cc_status = 'TRADE_SUCCESS';
            $orderPay->cc_time = TimeTools::getFullTime();
            $orderPay->save();
            //支付宝信息

            $orderPayAction = new Source_Order_OrderAction();

            $orderPayAction->order_id = $info->id;
            $orderPayAction->order_status = 4;
            $orderPayAction->shipping_status = 0;
            $orderPayAction->pay_status = 2;
            $orderPayAction->option_id = 1;
            $orderPayAction->option_name = '模拟用户';
            $orderPayAction->remark = '订单'.$info->order_sn.'已经付款，请仓管及时发货';
            $orderPayAction->save();

            $orderPayLog = new Source_Order_OrderPaymentLog();
            $orderPayLog->order_id = $info->id;
            $orderPayLog->payment_recive = json_encode(array(
                'trade_status'=> $info->id,
                'out_trade_no'=> $info->order_sn,
                'total_fee'=> $info->pay_amount,
                'payment_account'=> 'test@pay.com'));
            $orderPayLog->save();

        });
        if(is_null($result)){
            echo '<p style="text-align: center;margin-top: 50px;font-size: 25px;color: green">订单模拟支付成功</p>';
        }else{
            echo '<p style="text-align: center;margin-top: 50px;font-size: 25px;color: red">订单状态不正确,支付不成功</p>';
        }

    }
}

