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
        $model = Source_Order_OrderInfo::orderBy('created_at','desc');
        /*根据关键词查询*/
        if (! empty($keyword)) {
            $model->where(function($query) use ($keyword){
                $query->orwhereHas("item",function($q) use ($keyword){
                    $q->where("product_name","like","%{$keyword}%");
                });
                $query->orwhereHas("belongsToUser",function($q) use ($keyword){
                    $q->where("name","like","%{$keyword}%");
                });
                $query->orwhere("order_sn","like","%{$keyword}%");
            });
        }
        if (! empty($status)) {
            $model->where("order_info.status",'=',$status);
        }
        //过滤字段
        $data = $model->with("item")->with('belongsToUser')->paginate($setPage);
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
        $order_id = (int)Input::get("order_id");
        if ($order_id == 0) {
            //todo重定向错误页
        }

        $order = Order::getOrderById($order_id);
        $this->view("admin.order.detail",compact("order"));
    }

    /**
     * 修改订单页
     */
    public function getModify()
    {
        $order_id = (int)Input::get("order_id");
        if ($order_id == 0)  {
            //todo 重定向错误页
        }
        $order = Order::getOrderById($order_id);
        return View::make("admin.order.modify",compact("order"));
    }
    /**
     * 发货单页面
     */
    public function getDeliver()
    {
        $order_id = (Int)Input::get("order_id");
        if (empty($order_id)) {
            //todo 跳转到错误页?
        }
        //判断订单下商品是否全部发货
        $flag = Order::hasDeliver($order_id);
        $data = Source_Order_OrderInfo::find($order_id);
        $this->view("admin.order.deliverPage",compact("data","flag"));
    }

    /**
     * 保存订单中商品价格的修改
     */
    public function postChange()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $data = Input::get("data");
            //运费
            $freight = (float) Input::get("freight");
            $json_data = json_decode($data);
            if ( empty($json_data)){
                throw new RuntimeException("所传参数有误");
            }
            $res = Order::saveChange($json_data,$freight);
            if (! $res) {
                throw new LogicException("修改失败");
            }
        }catch(Exception $e){
            $msg = $e->getMessage();
            $result["status"] = 0;
            $result['msg'] = $msg;
        }
        return Response::json($result);
    }
    /**
     *删除订单
     */
    public function postDelete()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $order_id = (int) Input::get("order_id");
            if (empty($order_id)) {
                throw new RuntimeException("参数有误");
            }
            $order = Source_order_OrderInfo::find($order_id);
            //删除
            $order->delete();
            
        }catch(Exception $e) {
            $result["status"] = 0;
            $result["msg"] = $e->getMessage();
        }
        return Response::json($result);
    }
    /**
     *物流页面
     */
    public function getLogistics()
    {
        $item_id = Input::get("item_id");
        if (! empty($item_id)) {
            //todo 显示错误页
        }
        //获取已经启用的物流公司
        $company = Source_Shipping_Code::where("status","=","1")->get();
        return View::make("admin.order.logistics",compact("item_id","company"));
    }

    /**
     *  发货保存
     */
    public function  postDeliver()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $item_id = explode(",",Input::get("item_id"));
            $shipping_code = Input::get("code");
            $number = Input::get("number");

            if (empty($item_id)) {
                throw new RuntimeException("参数有误");
            }

            foreach($item_id as $single) {
                $id = (int)$single;
                $item = Source_Order_OrderItem::find($id);
                $order_id = $item->order_id;
                $item->shipping_id = $number;
                $item->shipping_status = 2;
                $item->shipping_m_code = $shipping_code;
                $item->save();
            }
            $isDeliver = Order::hasDeliver((int)$order_id);
            //如果该订单下所有商品都发货标记为5待收货
            if ($isDeliver) {
                $order = Source_Order_OrderInfo::find((int)$order_id);
                $order->status = 5;
                $order->save();
            }
        }catch(Exception $e) {
            $result["status"] = 0;
            $result["msg"] = $e->getMessage();
        }
        return Response::json($result);
    }
    /**
     * 物流详情
     */
    public function getEms()
    {
        $logistics_id = Input::get("l_id");
        $item_id = (int)Input::get("item_id");
        if (empty($logistics_id)) {
            //todo错误页
        }
        $item = Source_Order_OrderItem::find($item_id);
        //调用物流接口
        $val = new ShippingApi();
        $data['shiptype'] ='YTO';
        $data['shipno'] = $logistics_id;
        $logistics_info = json_decode($val->getOrderTracesByJson($data));

        $this->view("admin.order.ems",compact("logistics_info","item"));
    }



    
}