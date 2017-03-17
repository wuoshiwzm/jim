<?php

/**
 * Author:Tonychang
 * Date: 2016-11-07
 * Time: 22:38
 * DES: 发货单管理控制器
 */
class DeliverController extends CommonController
{

    /**
     * 发货单首页(等待发货)
     */
    public function getIndex()
    {
        //关键词
        $keyword = trim(Input::get("keyword"));
        //订单状态
        $status =  4;
        //每页显示个数
        $setPage = Input::get("setpage",self::$adminPage);
        $model = Source_Order_OrderInfo::leftjoin('userinfo','order_info.user_id', '=','userinfo.id');
        /*根据关键词查询*/
        if (! empty($keyword)) {
            $model->where(function($query) use ($keyword){
                $query->orwhereHas("item",function($q) use ($keyword){
                    $q->where("product_name","like","%{$keyword}%");
                });
                $query->orwhere("order_info.order_sn","like","%{$keyword}%")
                    ->orwhere("userinfo.name","like","%{$keyword}%");
            });
        }
        if (! empty($status)) {
            $model->where("order_info.status",'=',$status);
        }
        //过滤字段
        $model->select("order_info.id","order_info.source","order_info.total_amount","order_info.cost_freight",
            "order_info.status","order_info.order_sn","order_info.created_at","userinfo.real_name",
            "order_info.shipping_amount"
        );
        $data = $model->with("item")->paginate($setPage);
        //赋值
        $set['keyword'] = $keyword;
        $set['setpage'] = $setPage;
        $set['status'] = $status;
        $order_info = Order::getOrdersNumber();
        $this->view('admin.order.deliver',compact('data','set',"order_info"));
    }

    /**
     * 已发货页面
     */
    public  function getGone()
    {
        //关键词
        $keyword = trim(Input::get("keyword"));
        //订单状态
        $status =  5;
        //每页显示个数
        $setPage = Input::get("setpage",self::$adminPage);
        $model = Source_Order_OrderInfo::leftjoin('userinfo','order_info.user_id', '=','userinfo.id');
        /*根据关键词查询*/
        if (! empty($keyword)) {
            $model->where(function($query) use ($keyword){
                $query->orwhereHas("item",function($q) use ($keyword){
                    $q->where("product_name","like","%{$keyword}%");
                });
                $query->orwhere("order_info.order_sn","like","%{$keyword}%")
                    ->orwhere("userinfo.name","like","%{$keyword}%");
            });
        }
        if (! empty($status)) {
            $model->where("order_info.status",'=',$status);
        }
        //过滤字段
        $model->select("order_info.id","order_info.source","order_info.total_amount","order_info.cost_freight",
            "order_info.status","order_info.order_sn","order_info.created_at","userinfo.real_name",
            "order_info.shipping_amount"
        );
        $data = $model->with("item")->paginate($setPage);
        //赋值
        $set['keyword'] = $keyword;
        $set['setpage'] = $setPage;
        $set['status'] = $status;
        $order_info = Order::getOrdersNumber();
        $this->view('admin.order.gone',compact('data','set',"order_info"));

    }
}