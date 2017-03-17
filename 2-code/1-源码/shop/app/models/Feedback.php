<?php

class Feedback{


    /**
     * @param $data
     * @return bool
     * 验证
     */
    static function validatorFeedback($data)
    {
        $rules = [];
        $message = [];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            return true;

        } else {
            return $validator;
        }
    }

    /**
     * @param $itemId
     * 判断是否已经提交过了投诉
     */
    public static function CheckItem($orderId, $itemId)
    {
        if (Source_Feedback_FeedbackInfo::where('item_id', $itemId)
            ->where('order_id', $orderId)->count()) {
            return true;
        }

    }

    /**
     * @param $refund
     * 添加投诉
     */
    public static function createFeedback($feedback)
    {
        if(self::CheckItem($feedback['order_id'], $feedback['item_id']))
        {
            die('此商品已经提交过了投诉');
        }
        //添加
        return Source_Feedback_FeedbackInfo::create($feedback);
    }



    /**
     * 获取用户对应的所有投诉
     * @param $userId 用户id
     */
    public static function getFeedbackByUser($userId)
    {
        //投诉当前状态 1：平台未确认 2：平台已确认
        return Source_Feedback_FeedbackInfo::where('user_id', $userId);


    }

    /**
     * @return mixed
     * 获取所有人民投诉原因
     */
    public static function getAllReason(){
        return Source_Feedback_FeedbackReason::all();
    }


    /**
     *
     */
    public static function removeFeedbackById($id){
        return Source_Feedback_FeedbackInfo::find($id)->delete();
    }

}

