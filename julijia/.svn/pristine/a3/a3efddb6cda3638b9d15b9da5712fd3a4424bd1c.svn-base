<?php


// use app\controllers\user\user\LeonEvent;

class InfoMemberController extends CommonController
{

    protected $layout = 'layouts.member.index';


    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function view($path, $data = [])
    {
        $this->layout->content = View::make($path, $data);
    }


    /**
     * InfoMemberController constructor.
     */
    public function __construct()
    {
        $userInfo = Session::get('member');
        View::share('userinfo',$userInfo);

        parent::__construct();
    }


    /**
     * 订单详情
     */
    function orderDetail($orderId)
    {

        $order = Source_Order_OrderInfo::find(decode($orderId));
        $items = $order->item()->get();
        $pics = 0;
        //配送信息


        //物流信息
        foreach ($items as $item) {

            $Orderinfo['shiptype'] = $item->shipping_m_code;
            $Orderinfo['shipno'] = $item->shipping_id;
            $shipper = new ShippingApi();
            $pics += $item->num;
            $res = json_decode($shipper->getOrderTracesByJson($Orderinfo));

            if ($res->Success) {
           /*     $item->shipping = array(
                    ['AcceptTime' => date('Y-m-d H:m:s', time()),
                        'AcceptStation' => '处理中']
                );
            } else {*/
                $item->shipping = $res->Traces;
            }

        }
        //提交订单时间
        //$createTime =
        //付款成功时间
        $payTime = Source_Order_OrderAction::where('order_id',$order->id)
            ->where('pay_status',2)
            ->first();
        $payTime = isset($payTime->created_at)?$payTime->created_at:'';
        //商品出库时间
        $shipTime = Source_Order_OrderAction::where('order_id',$order->id)
        ->where('order_status',4)
        ->first();
        $shipTime = isset($shipTime->created_at)?$shipTime->created_at:'';
        //等待收货时间
        $receiveTime = Source_Order_OrderAction::where('order_id',$order->id)
        ->where('shipping_status',5)
        ->first();
        $receiveTime = isset($receiveTime->created_at)?$receiveTime->created_at:'';
        //完成时间
        $accomplishTime = Source_Order_OrderAction::where('order_id',$order->id)
            ->where('order_status',7)
            ->first();
        $accomplishTime = isset($accomplishTime->created_at)?$accomplishTime->created_at:'';


        return $this->view('member.order.detail',
            compact('order', 'items','pics','payTime','shipTime','receiveTime','accomplishTime'));
    }


    /**
     * @param $orderId
     * 物流详情
     */
    public function shippingDetail($itemId)
    {
        $item = Source_Order_OrderItem::find(decode($itemId));

        //快递公司编码 EMS
        $Orderinfo['shiptype'] = $item->shipping_m_code;
        /*$Orderinfo['shiptype'] = 'EMS';*/
        $Orderinfo['shipno'] = $item->shipping_id;
        /*$Orderinfo['shipno'] = 1116345180996;*/

        if(!empty($item->shipping_m_code))
        {
            $companyName = Source_Shipping_Code::where('code',$item->shipping_m_code)->first()->shipping_name;
        }else{
            $companyName = '信息更新中';
        }

        //物流信息
        $shipper = new ShippingApi();
        $res = json_decode($shipper->getOrderTracesByJson($Orderinfo));
        /*dd($res->Traces);*/

        if ($res->Success) {
   /*         $item->shipping = array(
                ['AcceptTime' => date('Y-m-d H:m:s', time()),
                    'AcceptStation' => '处理中']
            );

        } else {*/
            $item->shipping = $res->Traces;
        }

        return $this->view('member.order.shipping', compact('item','companyName'));
    }


}
