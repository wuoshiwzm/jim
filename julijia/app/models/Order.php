<?php

/**
 * Created by Tonychang
 * User: Administrator
 * Date: 2016/10/8
 * Time: 16:53
 */
class Order
{

    public static $adminPage = 10;

    /**
     * 获取未付款、待发货、已发货、成功订单个数
     */
    public static function getOrdersNumber()
    {
        $noPay = 0;
        $waiting = 0;
        $has_gone = 0;
        $success = 0;
        $all_order = 0;
        $orders = Source_Order_OrderInfo::All();
        if (!empty($orders)) {
            /*遍历订单数*/
            foreach ($orders as $order) {
                $all_order++;
                if ($order->status == 1) {
                    $noPay++;
                } else if ($order->status == 4) {
                    $waiting++;
                } else if ($order->status == 5) {
                    $has_gone++;
                } else if ($order->status == 7) {
                    $success++;
                }
            }
        }
        //返回订单
        return array(
            'all_order' => $all_order,
            'no_pay' => $noPay,
            'waiting' => $waiting,
            'has_gone' => $has_gone,
            'success' => $success
        );
    }

    /**
     * 根据不同订单状态获取订单
     * @param int $status 订单状态
     * @param int $setPage 分页数
     * @param array $column 返回字段
     * @param boolean $with 是否预加载商品
     * @return  object collection 结果集对象
     */
    public static function getOrderByStatus($status = 0, $setPage = 0, $column = array(), $with = true)
    {

        /*查询*/
        $model = Source_Order_OrderInfo::orderBy('created_at','desc');
        if ($status != 0 && is_int($status))
            $model->where("status", $status);


        if (is_bool($with) && $with)
            $model->with("item");

        if ($setPage == 0 || !is_int($setPage))
        $setPage = self::$adminPage;

        return $model->with('belongsToUser')->paginate($setPage);
    }


    /**
     * @param $order_id
     * 获取对应订单id下所有商品
     */
    public static function getItemByOrder($order_id)
    {
        $items = Source_Order_OrderItem::where('order_id', $order_id);
        return $items;
    }

    /**
     * @param  int $order_id
     * @des 获取订单中信息
     * @return bool
     */
    public static function hasDeliver($order_id)
    {
        $flag = true;
        $items = Source_Order_OrderInfo::find($order_id)->item()->get();
        //遍历判断
        foreach ($items as $item) {
            if($item->refund->count()==0){
                if ($item->shipping_status == 1) {
                    $flag = false;
                    break;
                }
            }
        }
        return $flag;
    }

    /**
     * @param $jsonData array 包含了数组id
     * @param $freight float 运费
     * @return bool
     */
    public static function saveChange($jsonData, $freight)
    {
        //开始事务
        DB::beginTransaction();
      try {
            //订单id
            $order_id = 0;
            $item_price = [];
            //遍历修改的数据
            foreach ($jsonData as $item) {
                $item_id = (int)$item->item_id;
                $discount = (float)$item->discount;
                if ($item_id != 0) {
                    $goods = Source_Order_OrderItem::find($item_id);
                    $goods->row_total =  $goods->row_total+ $discount;
                    $goods->change_price = $discount;
                    $goods->save();
                    $order_id = $goods->order_id;
                    array_push($item_price,$goods->row_total);

                    $admin = Session::get('admin_user');
                    $orderAction = new Source_Order_OrderAction();
                    $orderAction->order_id = $order_id;
                    $orderAction->order_status = 1;
                    $orderAction->shipping_status = 0;
                    $orderAction->pay_status = 0;
                    $orderAction->option_id = $admin['user_id'];
                    $orderAction->option_name = $admin['account'];
                    $orderAction->remark = '后台订单管理员'.$admin['account'].'调整'.$goods->product_name.'价格'.$discount.'元';
                    $orderAction->save();
                }
            }

           if ($order_id == 0) {
                throw new Exception("订单数据异常");
            }
            $order = Source_Order_OrderInfo::find($order_id);

          /**
           * order_info表价格计算关系
           *   cost_item:item表中的单价 x购买数量 之和
           *   cost_freight： 商品优惠的价格
           *   shipping_amount = item表中的运费之和
           *   total_amount = cost_item + shipping_amount
           *   pay_amount = total_amount   -  cost_freight
           *
           */
            $cost_item= array_sum($item_price);
            $total_amount= $cost_item+ ($order->shipping_amount+$freight);
            $shipping_amount = $order->shipping_amount+$freight;
           // $order->cost_item = $cost_item;
            $order->cost_item = $cost_item;
            $order->total_amount =  $total_amount;
            $order->shipping_amount = $shipping_amount;
            $order->pay_amount = $total_amount-  $order->cost_freight;
            $order->change_shipping = $freight;
            //订单总价（商品价格+运费）
           // $order->total_amount = $cost_item + $freight;
            $order->save();
          if($freight!=0){
              $admin = Session::get('admin_user');
              $orderAction = new Source_Order_OrderAction();
              $orderAction->order_id = $order_id;
              $orderAction->order_status = 1;
              $orderAction->shipping_status = 0;
              $orderAction->pay_status = 0;
              $orderAction->option_id = $admin['user_id'];
              $orderAction->option_name = $admin['account'];
              $orderAction->remark = '后台订单管理员'.$admin['account'].'调整运费'.$freight.'元';
              $orderAction->save();
          }
            DB::commit();
            return true;
      } catch (Exception $e) {
            ($e->getMessage());
            //回滚操作
            DB::rollback();
            return false;
       }
    }

    /**
     * @param  int $order_id
     * @des 获取订单中信息
     * @return bool
     */
    public static function getOrderById($order_id)
    {
        $order_id = (int)$order_id;
        if ($order_id == 0)
            return "";
        $order = Source_Order_OrderInfo::find($order_id);
        return $order;
    }

    /**
     * @param $item_id
     * @return string
     * @des 根据主键获取某个商品信息
     */
    public static  function  getOrderItemById($item_id)
    {
        $order_id = (int)$item_id;
        if ($order_id == 0)
            return "";
        $order = Source_Order_OrderItem::find($order_id);
        return $order;
    }


    public static  function getOrderTime($create_time)
    {
        //转换成时间戳
        $time = strtotime($create_time);
        //获取系统订单超时时间
        $qixian = DB::table('config_payment')->where('name',"pay_qixian");
        if ($qixian->count() > 0) {
            $day = $qixian->first()->value;
        }else {
            $day = 6;
        }
        $second = 60*60*24*$day;
        $diff = $time + $second - time();
        return $diff;
    }



}