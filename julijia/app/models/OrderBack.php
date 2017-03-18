<?php

/**
 * Author:Tonychang
 * Date: 2016-11-20
 * Time: 14:55
 * DES: 退货当公共模型方法
 */
class OrderBack
{
    //默认分页个数
    public static $adminPage = 10;


    /**
     * 获取退款、退货退款单子个数
     */
    public static function getRefundNumber( $model=false)
    {
        $refund = 0;
        $back = 0;
        $total = 0;
        $refund_orders = DB::table("order_back")->get();
        if (!empty($refund_orders)) {
            /*遍历订单数*/
            foreach ($refund_orders as $order) {
                $total++;
                if(!$model){
                    if ($order->type == 1) {
                        $refund++;
                    } else if ($order->type == 2) {
                        $back++;
                    }
                }else{
                    if ($order->type == 1&&$order->status ==2) {
                        $refund++;
                    } else if ($order->type == 2&&$order->status ==5) {
                        $back++;
                    }
                }

            }
        }
        //返回订单
        return array(
            'refund' => $refund,
            'back' => $back,
            'total' => $total
        );
    }

    /**
     *
     * @param int $type 退款类型
     * @param string $order_sn 订单编号
     * @param string $back_sn 退款单编号
     * @param int $reason_type 退款原因分类id
     * @param int $status 退款单状态
     * @param int $setPage 分页大小
     * @param array $column 字段
     * @return object Collection 结果集合
     */
    public static function getRefund($type = 0, $order_sn = "", $back_sn = "", $reason_type = 0, $status = 0, $setPage = 0, $column = array())
    {
        if (empty($column)) {
            $column = array(
                "order_back.id","order_back.order_sn", "order_back.status", "order_back.created_at",
                "order_back.order_id", "order_back.back_sn", "order_back.order_item_id",
                "userinfo.real_name","order_back.price",
            );
        }
        $model = Source_Order_OrderBack::join("userinfo", "order_back.user_id", "=", "userinfo.id");
        if (!empty($type)) {
            $model->where("order_back.type", "=", $type);
        }
        if ($order_sn != "" && is_string($order_sn)) {
            $model->where("order_back.order_sn", "like", "%{$order_sn}%");
        }
        if ($back_sn != "" && is_string($back_sn)) {
            $model->where("order_back.back_sn", "like", "%{$back_sn}%");
        }
        if (is_int($reason_type) && $reason_type != 0) {
            $model->where("order_back.reason", "=", $reason_type);
        }
        if (is_int($status) && $status != 0) {
            $model->where("order_back.status", "=", $status);
        }
        if (!empty($column) && is_array($column)) {
            $model->select($column);
        }
        if ($setPage == 0 || !is_int($setPage))
            $setPage = self::$adminPage;

        $data = $model->orderBy('order_back.updated_at','desc')->paginate($setPage);
        return $data;
    }

    /**
     * @param  int $type 分类id
     * @return object collection
     * @des 退款退款原因分类
     */
    public static function getReason($type = 0)
    {
        if (is_int($type) && $type != 0) {
            return Source_Order_OrderRefundreasonType::where("type", "=", $type)->get();
        }
        return Source_Order_OrderRefundreasonType::all();
    }

    /**
     * 获取用户对应的所有退款
     * @param $userId 用户id
     */
    public static function getRefundByUser($userId)
    {
        return Source_Order_OrderBack::where('user_id', $userId);
    }


    /**
     * @param $itemId
     * 判断是否已经提交过了退款
     */
    public static function CheckItem($orderId, $itemId)
    {
        if (Source_Order_OrderBack::where('order_item_id', $itemId)->where('order_id', $orderId)->count()) {
            return true;
        }

    }


    /**
     * @param $refund
     * 添加退款
     */
    public static function createRefund($refund ,$images)
    {
        if(self::CheckItem($refund['order_id'], $refund['order_item_id']))
        {
            die('此商品已经提交过了退款');
        }
        //添加

        $res = Source_Order_OrderBack::create($refund);
        foreach(explode(';',$images) as $img){
            ( new Upload())->uploadProductImage($res->id,$img,'refund');
        }

        return  $res;
    }


    /**
     * @param $refund
     * 添加客户退货物流信息
     */
    public static function updateShipInfo($refundId,$input)
    {

        //添加
        return Source_Order_OrderBack::find($refundId)
            ->update($input);
    }


    /**
     * @param $data
     * @return bool
     * 验证
     */
    static function validatorRefund($data)
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
     * @param $data
     * @return bool
     * 验证
     */
    static function validatorShipBack($data)
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

}