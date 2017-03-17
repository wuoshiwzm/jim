<?php

/**
 * Author:Tonychang
 * Date: 2017-01-15
 * Time: 12:14
 * DES:
 */
class FrefundController extends CommonController
{

    /**
     * 退款单首页
     */
    public function  getIndex()
    {
        $type = 1;
        //订单编号
        $order_sn = trim(Input::get("order_sn"));
        //退款单号
        $back_sn = trim(Input::get("back_sn"));
        //原因
        $reason_type = (int)Input::get("reason_type");
        //商品状态
        $status = 2;
        //分页
        $setPage = (int)Input::get("setpage",self::$adminPage);
        $data = OrderBack::getRefund($type,$order_sn,$back_sn,$reason_type,$status,$setPage);
        //退款单信息
        $refund_info =  OrderBack::getRefundNumber('fre');
        //退款原因
        $refund_reason = OrderBack::getReason($type);
        $set["order_sn"] = $order_sn;
        $set["status"] = $status;
        $set['setpage'] = $setPage;
        $set["back_sn"] = $back_sn;
        $this->view("admin.finance.refund",compact("set","data","refund_info","refund_reason"));
    }

    /**
     * 退款退货
     */
    public function getBack()
    {
        $type = 2;
        //订单编号
        $order_sn = trim(Input::get("order_sn"));
        //退款单号
        $back_sn = trim(Input::get("back_sn"));
        //原因
        $reason_type = (int)Input::get("reason_type");
        //商品状态
        $status = 5;

        //分页
        $setPage = (int)Input::get("setpage",self::$adminPage);
        $data = OrderBack::getRefund($type,$order_sn,$back_sn,$reason_type,$status,$setPage);
        //退款单信息
        $refund_info =  OrderBack::getRefundNumber('fre');
        //退款原因分类
        $refund_reason = OrderBack::getReason($type);
        $set["order_sn"] = $order_sn;
        $set["status"] = $status;
        $set['setpage'] = $setPage;
        $set["back_sn"] = $back_sn;
        $this->view("admin.finance.back",compact("set","data","refund_info","refund_reason"));
    }

    /**
     * 财务确认审核
     */
    public function postConfirm()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $refund_id = decode(Input::get("refund_id"));
            if (empty($refund_id)) {
                throw new RuntimeException("参数有误");
            }
            $refund = Source_Order_OrderBack::find($refund_id);
            $refund->status = 6;
            $refund->audit_content = "财务审核通过";
            if($refund->save()){
                $backInfo['order_back_id'] = $refund->id;
                $backInfo['option_type'] = 2;
                $backInfo['option_id'] = Session::get('admin_user')['user_id'];
                $backInfo['option_name'] =Session::get('admin_user')['account'];
                $backInfo['status'] = '财务人员已经退款';
                $backInfo['remark']=Session::get('admin_user')['account']."：财务人员已经退款";
                Event::fire('item.refund', array($backInfo));
            }
        }catch(Exception $e) {
            $result["status"] = 0;
            $result["msg"] = $e->getMessage();
        }
        return json_encode($result);
    }


    /**
     * 退款详情页
     */
    public function getDetail()
    {
        $refund_id = (int)decode(Input::get("refund_id"));
        if (empty($refund_id)) {
            //todo 重定向值错误页
        }
        $refund = Source_Order_OrderBack::find($refund_id);
        $operate_log = Source_Order_OrderBackAction::where("order_back_id","=",$refund_id);

        $this->view("admin.finance.refund_detail",compact("refund","operate_log"));
    }
}