<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30 0030
 * Time: 17:08
 */
use Omnipay\Omnipay;
class AuctionBuyController extends \BaseController
{
    protected static $user;
    public function __construct()
    {
        $ajax = Request::ajax();
        $user = Session::get('member');
        if( $ajax )
        {
            if( $user == false )
            {
                die('no');
            }
        }else
        {
            if( $user == false )
            {
                header( "Location:/member/login");
                die();
            }
        }
        self::$user = $user;
        parent::__construct();
    }



    /**
     *  -++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *
     *    立即购买订单
     *
     *  -++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     */



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
        $price = encode($data['newprice']);
        $num = encode($data['num']);
        return Redirect::to( '/auction/buy_now.html?pid='.$pid.'&num='.$num.'&j='.$price.'&g='.$g );
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
        $uid = self::$user->id;
        $address = Source_User_UserInfoAdd::where('user_id',$uid)->get();
        $this->view('frontend.order.buynoworder',compact('address','goods','totaled'));
    }

    /**
     *  立即下订单
     */
    public function nowOrderSave()
    {
        $data = Input::all();
        $valid = AuctionBuy::validatorOrder( $data );
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
        $res = AuctionBuy::orderSave( $goodsData, $data, $order_sn );
        if( $res == false )
        {
            return Redirect::back();

        }else
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
    }


    /**
     *  -++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *
     *    订单客户信息数据
     *
     *  -++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     */


    /**
     * @return string
     * 修改默认地址
     */
    public function defaultAddress()
    {
        $id = Input::get('id');
        $token = Session::token();
        if( $token != Input::get('token') )
        {
            return 'fail';
        }
        $uid = self::$user->id;
        Source_User_UserInfoAdd::where( 'user_id', $uid )->update( ['status'=>0] );
        $res = Source_User_UserInfoAdd::where( 'id', decode( $id ) )->update( ['status'=>1] );
        if( $res )
        {
            $address = Source_User_UserInfoAdd::where('user_id',$uid)->get();
            return View::make('frontend.order.addressload',compact('address'));
        }
    }

    /**
     * @return string
     * 前台添加地址
     */
    public function saveAddress()
    {
        $data = Input::all();
        if( $data )
        {
            $token =  Session::token();
            if( $token != Input::get('_token') )
            {
                return '<script>parent.location.reload();var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>';
            }
            $res = AuctionBuy::addAddress( $data, self::$user);
            if( $res )
            {
                return '<script>parent.location.reload();var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>';

            }else
            {
                return '<script>parent.layer.msg(\'添加失败。。。\',{icon: 2} ); parent.location.reload();var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>';
            }
        }else
        {
            $province = Source_Area_Province::select('id', 'province', 'provinceID')->get();
            return View::make('frontend.order.saveaddress',compact('province'));
        }
    }

    /**
     * @return string
     * 前台修改用户信息
     */
    public function editAddress()
    {
        $id = Input::get('id');
        if( $id )
        {
            $province = Source_Area_Province::select('id', 'province', 'provinceID')->get();
            $data =  Source_User_UserInfoAdd::find( decode( $id ) );
            return View::make('frontend.order.saveaddress',compact('province','data'));

        }else
        {
            $token =  Session::token();
            if( $token != Input::get('_token') )
            {
                return '<script>parent.location.reload();var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>';
            }
            $data = Input::all();
            $res = AuctionBuy::editAddress( $data, self::$user);
            if( $res )
            {
                return '<script>parent.location.reload();var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>';

            }else
            {
                return '<script>parent.layer.msg(\'修改失败。。。\',{icon: 2} ); parent.location.reload();var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>';
            }
        }
    }


    /**
     * -++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     *
     *  购物车订单确认
     *
     * -++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     */


    /**
     * @return mixed
     * 结算post数据转化get
     */
    public function settlement()
    {
        //判断token
        $token = Session::token();
        if( $token != Input::get('_token') )
        {
            return Redirect::back();
        }
        $itemId = Input::get('item');
        $ID = implode( ',', $itemId );
        return Redirect::to( '/order/confirm_order.html?order='.encode($ID) );
    }

    /**
     * 购物车结算页面
     */
    public function cartOrder()
    {
        $order = trim(Input::get('order'));
        $itemId = decode($order);
        $goodsData = AuctionBuy::cartOrderData( $itemId, self::$user);
        //产品信息
        $goods = $goodsData['goods'];
        //合计信息
        $totaled = $goodsData['totaled '];
        $uid = self::$user->id;
        $address = Source_User_UserInfoAdd::where('user_id',$uid)->get();
        $this->view('frontend.order.confirmorder',compact('address','goods','totaled','order'));
    }

    /**
     * @return mixed
     * 购物车下单
     */
    public function cartOrderSave()
    {
        $data = Input::all();
        $order_sn = date('YmdHis').rand(100000,999999);
        $goodsData = AuctionBuy::cartOrderData( decode($data['order']), self::$user);
        $res = AuctionBuy::cartOrderSave( $goodsData, $data, $order_sn );
        if( $res == false )
        {
            return Redirect::back();

        }else
        {
            Session::put('cartCount', 0);
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
    }

}