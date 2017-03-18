<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/12/23
 * Time: 12:08
 */

class  WechatController   extends \BaseController{

    public function index(){
        if(!is_numeric(Input::get('money'))){
            return Redirect::back();
        }
        $type =  Input::get('type');
        $money = Input::get('money')*10;
        switch ($type){
            case 1;
                //二维码支付
                return view::make("wechat.native",compact('money'));
                break;
            case 2;
                //退款接口
                return view::make("wechat.refund",compact('money'));
                break;
            default:
                //在手机上使用jsapi接口支付
                return view::make("wechat.jsapi",compact('money'));
                break;
        }

//因为微信的钱是按分为单位，所以传进来，先*10，然后微信会回调回来，在执行一次这个方法，所以再*10，如果是5元，传个5就变成500分，就是5元钱了

        //把money作为参数带到jsapi.blade.php

    }


        public function notify(Request $request){
            $streamData = isset($GLOBALS['HTTP_RAW_POST_DATA'])? $GLOBALS['HTTP_RAW_POST_DATA'] : ''; //拿到微信回调回来的信息判断支付成功没

            if(empty($streamData)){
                $streamData = file_get_contents('php://input');
            }
            if($streamData!=''){
                $streamData=xmlToArray($streamData);
                $Data=json_encode($streamData);
                Log::debug('Alipay notify post data verification fail.', [ //写入服务器文档，你不加这个也行
                    'data' => $Data.'xxxxxx'
                ]);
                if($streamData['return_code'] == 'SUCCESS' && $streamData['result_code'] == 'SUCCESS'){ //支付成功
                    try { //开始事务
                        //支付成功，你要干些什么都写这里，例如增加余额的操作什么的

                    } catch (Exception $e) {
                        //如果try里面的东西出现问题的话，进行数据库回滚
                        throw $e;
                    }

                }
            }else{
                $ret = false; //支付失败
            }
        }

}