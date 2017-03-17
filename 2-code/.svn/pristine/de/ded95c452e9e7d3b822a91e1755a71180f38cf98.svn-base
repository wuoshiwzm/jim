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
    public static function getRefundNumber()
    {
        $refund = 0; $back = 0;$total = 0;
        $refund_orders = DB::table("order_back")->get();
        if (! empty($refund_orders)) {
            /*遍历订单数*/
            foreach ($refund_orders as $order) {
                $total++;
                if ($order->type == 1) {
                    $refund++;
                }else if ($order->type == 2) {
                    $back++;
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
     * @param int $type
     * @param string $order_sn 订单编号
     * @param string $refund_sn 退款单编号
     * @param int $status 退款单状态
     * @param int $setPage 分页大小
     * @param array $column 字段
     * @return
     */
    public static  function getRefund($type = 0,$order_sn = "",$refund_sn = "",$status = 0,$setPage = 0,$column = array())
    {
        if (empty($column)) {
            $column = array(
                "order_back.order_sn","order_back.status","order_back.created_at",
                "order_back.order_id","order_back.order_item_id","userinfo.real_name",
            );
        }
        $model = Source_Order_OrderBack::join("userinfo","order_back.user_id","=","userinfo.id");
        if (! empty($type)) {
            $model->where("order_back.type","=",$type);
        }
        if ($order_sn != "" && is_string($order_sn)) {
            $model->where("order_back.order_sn","=",$order_sn);
        }
        if ($refund_sn != "" && is_string($refund_sn)) {
            $model->where("order_back.refund_sn","=",$refund_sn);
        }
        if (is_int($status) && $status != 0) {
            $model->where("order_back.status","=",$status);
        }
        if (! empty($column) && is_array($column)) {
            $model->select($column);
        }
        if ($setPage == 0 || ! is_int($setPage))
            $setPage = self::$adminPage;

        $data = $model->paginate($setPage);
        return $data;
    }
}