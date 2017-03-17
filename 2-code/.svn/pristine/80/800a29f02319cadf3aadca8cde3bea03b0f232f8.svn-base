<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/17 0017
 * Time: 14:58
 * 不登录立即购买
 */
use Omnipay\Omnipay;
class DontLogInPurchase extends \BaseController
{

    /**
     * @return mixed
     * 立即购买提交post转换get
     */
    public function purchase()
    {
        //判断token
        $token = Session::token();
        if( $token != Input::get('_token') )
        {
            return Redirect::back();
        }
        $data = Input::all();
        $pid = $data['product_id'] ? $data['product_id'] :'';
        $g = AuctionBuy::purchase( $data );
        $price = is_numeric($data['newprice'])?encode($data['newprice']):$data['newprice'];
        $num = encode($data['num']);
        return Redirect::to( '/dontlogin/buy_now.html?pid='.$pid.'&num='.$num.'&j='.$price.'&g='.$g );
    }


    /**
     * @return mixed
     * 立即购买
     */
    public function auctionBuyNow()
    {
        $data = Input::all();
        $pid = decode( $data['pid'] );
        $productInfo = Source_Product_ProductFlat::where(['entity_id'=>$pid,'status'=>1])->first();
        //判断库存的真实性
        if( $productInfo->kc_qty < (int)$data['num'] )
        {
            return Redirect::back();
        }
        $goodsData = AuctionBuy::buyNow( $data,$productInfo);
        //产品信息
        $goods = $goodsData['goods'];
        //合计信息
        $totaled = $goodsData['totaled '];
        $address = false;
        $type = $productInfo->type > 2?1:0;
        $freight = Freight::DetailFreight( $productInfo->freight, $productInfo->weight, 0, (int)$data['num'], $type );
        $this->view('frontend.order.buynoworder',compact('address','goods','totaled','freight','productInfo'));
    }


    /**
     *  立即下订单
     */
    public function nowOrderSave()
    {
        $data = Input::all();
        $valid = AuctionBuy::validatorDontLogInOrder( $data );
        if( $valid  != true )
        {
            return Redirect::back();
        }
        $order_sn = date('YmdHis').rand(100000,999999);
        $pid = decode( $data['pid'] );
        $productInfo = Source_Product_ProductFlat::where(['entity_id'=>$pid,'status'=>1])->first();
        //判断库存的真实性
        if( $productInfo->kc_qty < (int)$data['num'] )
        {
            return Redirect::back();
        }
        $goodsData = AuctionBuy::buyNow( $data, $productInfo );
        $res = AuctionBuy::dontLogInOrderSave( $goodsData, $data, $order_sn );
        if( $res == false )
        {
            return Redirect::back();

        }else
        {
            if( $data['payment'] == 1 )
            {
                return $this->AlipayApi(  $goodsData, $order_sn );
            }

            if( $data['payment'] == 2 )
            {
                return Redirect::to( '/weixin/geturl?order_sn='.encode($order_sn) );
            }
        }
    }



    /**
     *  调用支付宝接口
     */
    public function AlipayApi( $goodsData, $order_sn )
    {
        $return_url = Input::getUriForPath('/pay/return');
        $notify_url = Input::getUriForPath('/pay/notify');
        $gateway = Omnipay::create('Alipay_Express');
        $gateway->setPartner(Config::get('pay.id'));
        $gateway->setKey(Config::get('pay.key'));
        $gateway->setSellerEmail(Config::get('pay.email'));
        $gateway->setNotifyUrl($notify_url);
        $gateway->setReturnUrl($return_url);
        $totaled = $goodsData['totaled '];
        $order = array(
            'out_trade_no' => $order_sn,
            'subject' => $totaled->subject,
            'total_fee' => $totaled->pay_amount,
        );
        $response = $gateway->purchase($order)->send();
        return Redirect::to($response->getRedirectUrl());
    }


    /**
     * 发送短信
     */
    public function nowOrderSms()
    {
        $phone = Input::get('phone');
        if( $phone )
        {
            $user = Source_User_UserInfo::where('mobile_phone', $phone)->count();
            if(  $user )
            {
                return json_encode('手机号码已被注册');
            }else
            {
                return Sms::getCode( $phone, 1);
            }
        }else
        {
            return json_encode('请检查手机号码');
        }
    }

}