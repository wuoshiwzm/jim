<?php
/**
 * Author:Tonychang
 * Date: 2016-11-27
 * Time: 13:04
 * DES: 订单商品评论模型
 */
class Review
{
    /**
     * 默认分页
     */
     public static $setPage = 15;

    /**
     * @param string $order_sn 订单编号
     * @param int $status 状态 0：待审核 1：审核通过 2：审核未通过
     * @param int $rank 评论星级
     * @param int $setPage 分页
     */
    public static function getReview($order_sn = "",$status = 0,$rank = 0,$setPage = 0)
    {
        $model = Source_Order_OrderReview::join("userinfo","order_review.user_id","=","userinfo.id")
            ->join("userinfo_group","userinfo.group_id","=","userinfo_group.id");

        if ( is_int($status)) {
            $model->where("status",$status);
        }

        if (is_int($rank) && $rank != 0) {
            $model->where("order_review.leavel","=",$rank);
        }
        if ($setPage == 0 || ! is_int($setPage))
            $setPage = self::$setPage;
         $res =  $model->paginate($setPage);
        return $res;
    }




    /**
     * @param $data
     * @return bool
     * 验证
     */
    static function validatorReview($data)
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
     * 判断是否已经提交过了评价
     * @return bool
     */
    public static function CheckItem($orderId, $itemId)
    {
        if (Source_Order_OrderReview::where('item_id', $itemId)
            ->where('order_id', $orderId)->count()) {
            return true;
        }

    }

    /**
     * @param $review
     * @return
     * @internal param $refund 添加评价* 添加评价
     */
    public static function createReview($review)
    {
        if(self::CheckItem($review['order_id'], $review['item_id']))
        {
            die('此商品已经提交过了评价');
        }
        //添加
        return Source_Order_OrderReview::create($review);
    }



    /**
     * 获取用户对应的所有评价
     * @param $userId 用户id
     */
    public static function getReviewByUser($userId)
    {
        //状态 0待审核 1 审核通过 2 审核未通过
        return Source_Order_OrderReview::where('user_id', $userId)
            ->where('status',1);
    }

    /**
     * @param $id 根据主键获取评论数据
     */
    public static  function getReviewById($id)
    {
        $id = (int)$id;
        return Source_Order_OrderReview::find($id);
    }


}