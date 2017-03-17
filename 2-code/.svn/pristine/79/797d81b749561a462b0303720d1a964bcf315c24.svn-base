<?php
/**
 * User: Administrator
 * Date: 2016-10-29
 * Time: 20:53
 */
class OrderController extends CommonController
{
    /**
     * 订单列表-全部订单
     */
    public function getIndex()
    {
        $order = Order::getOrderByWhere();
        $this->view('admin.order.index');
    }

    /**
     * 未付款的订单
     */
    public function getNopay()
    {
        $this->view('admin.order.nopay');
    }

    /**
     * 等待发货订单
     */
    public function getWaiting()
    {
        $this->view('admin.order.waiting');
    }

    /**
     * 已发货订单
     */
    public function getHasdeliver()
    {
        $this->view("admin.order.hasdeliver");
    }

    /**
     * 已完成订单
     */
    public function getComplete()
    {
        $this->view("admin.order.complete");
    }






}