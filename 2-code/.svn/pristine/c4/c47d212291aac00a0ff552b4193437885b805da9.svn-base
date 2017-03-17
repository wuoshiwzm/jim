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
        //关键词
        $keyword = trim(Input::get("keyword"));
        //订单状态
        $status =  (int)Input::get("status");
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
            "order_info.status","order_info.order_sn","order_info.created_at","userinfo.real_name"
            );
        $data = $model->with("item")->paginate($setPage);
        //赋值
        $set['keyword'] = $keyword;
        $set['setpage'] = $setPage;
        $set['status'] = $status;
        $order_info = Order::getOrdersNumber();
        $this->view('admin.order.index',compact('data','set',"order_info"));
    }

    /**
     * 未付款的订单
     */
    public function getNopay()
    {
        //未付款
        $status = 1 ;
        //每页显示个数
        $setPage = (int)Input::get("setpage",self::$adminPage);
        /*查询*/
        $data  = Order::getOrderByStatus($status,$setPage);

        $order_info = Order::getOrdersNumber();
        $set['setpage'] = $setPage;
        $this->view('admin.order.nopay',compact('data','set',"order_info"));
    }

    /**
     * 等待发货订单
     */
    public function getWaiting()
    {
       //未付款
        $status = 4 ;
        //每页显示个数
        $setPage = (int)Input::get("setpage",self::$adminPage);
        /*查询*/
        $data  = Order::getOrderByStatus($status,$setPage);
        $order_info = Order::getOrdersNumber();
        $set['setpage'] = $setPage;

        $this->view('admin.order.waiting',compact('data','set',"order_info"));
    }

    /**
     * 已发货订单
     */
    public function getHasdeliver()
    {
        //已发货
        $status = 5 ;
        //每页显示个数
        $setPage = (int)Input::get("setpage",self::$adminPage);
        /*查询*/
        $data  = Order::getOrderByStatus($status,$setPage);
        $order_info = Order::getOrdersNumber();
        $set['setpage'] = $setPage;

        $this->view('admin.order.hasdeliver',compact('data','set',"order_info"));
    }

    /**
     * 已完成订单
     */
    public function getComplete()
    {
        //已完成
        $status = 7 ;
        //每页显示个数
        $setPage = (int)Input::get("setpage",self::$adminPage);
        /*查询*/
        $data  = Order::getOrderByStatus($status,$setPage);
        $order_info = Order::getOrdersNumber();
        $set['setpage'] = $setPage;

        $this->view("admin.order.complete",compact('data','set',"order_info"));
    }

    /**
     * 订单详情页
     */
    public function getDetail()
    {
        //$order_id = (int)Input::get("order_id");
        //@todo 判断订单是否是该用户登陆的

        $this->view("admin.order.detail");
    }

    /**
     * 修改订单页
     */
    public function getModify()
    {
        return View::make("admin.order.modify");
    }




}