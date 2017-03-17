<?php
/**
 * Created by PhpStorm.
 * User: 王顶峰
 * Date: 2016/5/18 0018
 * Time: 11:36
 */


//定义事件
Event::listen('event_name', function ($log) {
});


/**
 * 处理收货
 * $itemId:订单商品id
 */
Event::listen('item.receive', function ($itemId) {
    //判断订单是否已经完成
    $item = Source_Order_OrderItem::find($itemId);
    $order = Source_Order_OrderInfo::find($item->order_id);

    Source_Order_OrderInfo::where('id', $item->order_id)->update([
        'status' => 6,
    ]);
    $action['order_id'] = $order->id;
    $action['order_status'] = 6;
    $action['pay_status'] = 2;
    $action['option_id'] = Session::get('member')->id;
    $action['option_name'] = Session::get('member')->name;
    $action['remark'] = '订单' . $order->order_sn . '下商品' . $item->product_name . '买家已收货物品';

    Source_Order_OrderAction::create($action);

    //判断 是否有未完成的商品， 没有的话 更改整个订单的状态
    $unfinished = Source_Order_OrderItem::where('order_id', $item->order_id)->where('shipping_status', '!=', 3)->count();

    if ($unfinished) {
        return;
    }

    //更新整个订单为完成
    Source_Order_OrderInfo::where('id', $item->order_id)->update([
        'status' => 7,
    ]);
    $action['order_id'] = $order->id;
    $action['order_status'] = 7;
    $action['pay_status'] = 2;
    $action['option_id'] = Session::get('member')->id;
    $action['option_name'] = Session::get('member')->name;
    $action['remark'] = '买家订单' . $order->order_sn . '下商品已全部收货完成';

    Source_Order_OrderAction::create($action);

});

/**
 * 退货
 */
Event::listen('item.refund', function ($itemId) {

    $refund = Source_Order_OrderBack::where('user_id',Session::get('member')->id)
        ->where('order_item_id', $itemId)->first();

    $backInfo['order_back_id'] = $refund->id;
    $backInfo['option_type'] = 1;
    $backInfo['option_id'] = Session::get('member')->id;
    $backInfo['option_name'] = Session::get('member')->name;
    $backInfo['status'] = '提交退款/退货';
    $backInfo['remark'] = '用户' . $backInfo['option_name'] . '新提交退款/退货，退货单号：' . $refund->back_sn;

    Source_Order_OrderBackAction::create($backInfo);

});

/**
 * 评论
 */
Event::listen('item.review', function ($itemId) {

});

/**
 * 商品状态改变
 */
Event::listen('product.changeStatus', function ($entityId, $status) {

    //如果 商品下架，更新收藏表对应商品为失效
    if ($status == 0) {
        Source_User_UserInfoCollect::where('entity_id', $entityId)->update([
            'is_show' => 0
        ]);
    }
});


Event::listen('option.order', function ($input) {
    $orderinfo = Source_Order_OrderInfo::find($input['orderid']);
    $info = new  Source_Order_OrderAction();
    $info->order_id = $input['orderid'];
    $info->order_status = $orderinfo->status;
    $info->pay_status = $orderinfo->pay_status;
    $info->option_id = $input['user']->id;
    $info->option_name = $input['user']->name;
    $info->remark = $input['content'];
    $info->created_at = TimeTools::getFullTime();
    $info->save();

});