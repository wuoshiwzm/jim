<?php

/**
 * Author:Tonychang
 * Date: 2016-11-30
 * Time: 19:01
 * DES:投诉业务模型
 */
class Complain
{
    /**
     * 默认分页
     */
    public static $setPage = 15;

    /**
     * @param  int $status 1:平台未确认 2:平台已确认
     * @param string $order_sn 订单编号
     * @param string $feedback_sn 投诉编号
     * @param int $reason_id 原因id
     * @param int $setPage 分页大小
     */
    public static function getList($status = 0,$order_sn  = "",$feedback_sn = "",$reason_id = 0,$setPage = 0)
    {
        if ($status != 0) {
            $model = Source_Feedback_FeedbackInfo::where("feedback_info.status","=",$status);
        }else {
            $model =  new Source_Feedback_FeedbackInfo();
        }

        if (is_string($order_sn) && $order_sn != "") {
            $model->leftjoin("order_info","feedback_info.order_id","=","order_info.id")
            ->where("order_info.order_sn","like","%{$order_sn}%");
        }
        if (is_string($feedback_sn) && $feedback_sn != "") {
            $model->where("feedback_info.feedback_sn","like","%{$feedback_sn}%");
        }
        if (is_int($reason_id) && $reason_id != 0) {
            $model->where("feedback_info.reason_id","=","{$reason_id}");
        }
        if ($setPage == 0 || ! is_int($setPage))
            $setPage = self::$setPage;
        return $model->paginate($setPage);
    }


}