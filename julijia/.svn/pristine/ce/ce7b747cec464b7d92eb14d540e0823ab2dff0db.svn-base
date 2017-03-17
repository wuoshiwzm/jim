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
        parent::__construct();
    }


    /**
     * 订单详情
     */
    function orderDetail($orderId)
    {

        $order = Source_Order_OrderInfo::find($orderId);
        $items = Source_Order_OrderItem::where('order_id', $orderId)->get();
        $pics = 0;
        //配送信息


        //物流信息
        foreach ($items as $item) {

            $Orderinfo['shiptype'] = $item->shipping_m_code;
            $Orderinfo['shipno'] = $item->shipping_id;
            $shipper = new ShippingApi();
            $pics += $item->num;
            $res = json_decode($shipper->getOrderTracesByJson($Orderinfo));

            if (!$res->Success) {
                $item->shipping = array(
                    ['AcceptTime' => date('Y-m-d H:m:s', time()),
                        'AcceptStation' => '处理中']
                );


            } else {
                $item->shipping = $res->Traces;
            }

        }

        return $this->view('member.order.detail', compact('order', 'items','pics'));
    }


    /**
     * @param $orderId
     * 物流详情
     */
    public function shippingDetail($itemId)
    {
        $item = Source_Order_OrderItem::find($itemId);

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

        if (!$res->Success) {
            $item->shipping = array(
                ['AcceptTime' => date('Y-m-d H:m:s', time()),
                    'AcceptStation' => '处理中']
            );

        } else {
            $item->shipping = $res->Traces;
        }

        return $this->view('member.order.shipping', compact('item','companyName'));
    }


}
