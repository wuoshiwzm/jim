<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/2/5
 * Time: 17:48
 */
class  ShopMail{


    /**
     * @param array $data   发送地方内容 ['content','title']
     * @param array $info  发送信息['username','to','subject']
     *  发送邮件
     * 调用方法
     *
         $data=array('content'=>'您购买的商品已经下单成功2017124165241','title'=>'订单2017124165241下单成功通知');
         $info=array('username'=>'张三','to'=>'313308939@qq.com','subject'=>'订单通知');
         ShopMail::SendMail($data,$info);
     */
    static  function  SendMail( array  $data , array  $info){
        Mail::queueOn('mail_queue', 'admin.email.welcome', $data,  function($message ) use($info)
        {
            $message->to($info['to'], $info['username'])->subject( $info['subject']);
        });
    }
}