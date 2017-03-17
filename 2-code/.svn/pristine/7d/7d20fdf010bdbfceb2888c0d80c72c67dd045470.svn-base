<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-29
 * Time: 21:28
 * @des 退款单控制器
 */
class RefundController extends CommonController
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
        $status = (int)Input::get("status");
        //分页
        $setPage = (int)Input::get("setpage",self::$adminPage);
        $data = OrderBack::getRefund($type,$order_sn,$back_sn,$reason_type,$status,$setPage);
        //退款单信息
        $refund_info =  OrderBack::getRefundNumber();
        //退款原因
        $refund_reason = OrderBack::getReason($type);
        $set["order_sn"] = $order_sn;
        $set["status"] = $status;
        $set['setpage'] = $setPage;
        $set["back_sn"] = $back_sn;
        $this->view("admin.order.refund",compact("set","data","refund_info","refund_reason"));
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
        $status = (int)Input::get("status");

        //分页
        $setPage = (int)Input::get("setpage",self::$adminPage);
        $data = OrderBack::getRefund($type,$order_sn,$back_sn,$reason_type,$status,$setPage);
        //退款单信息
        $refund_info =  OrderBack::getRefundNumber();
        //退款原因分类
        $refund_reason = OrderBack::getReason($type);
        $set["order_sn"] = $order_sn;
        $set["status"] = $status;
        $set['setpage'] = $setPage;
        $set["back_sn"] = $back_sn;

        $this->view("admin.order.back",compact("set","data","refund_info","refund_reason"));
    }

    /**
     * 退款审核
     */
    public function postConfirm()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $refund_id = Input::get("refund_id");
            if (empty($refund_id)) {
                throw new RuntimeException("参数有误");
            }
            $is_pass = Input::get("tong");

            //审核说明
            $content = trim(Input::get("content"));
            $refund = Source_Order_OrderBack::find($refund_id);
            if ($is_pass == 1) {
                $refund->status = 2;
                $backInfo['status'] = '客服审核通过';
                $backInfo['remark'] = '用户' . Session::get('admin_user')['account']. '已经审核通过';
            }else {
                $refund->status = 1;
                $backInfo['status'] = '客服审未通过';
                $backInfo['remark'] = '用户' .Session::get('admin_user')['account']. '退款单已经审核未通过：'.$content;
            }
            $refund->audit_content = $content;
            $refund->save();
            $backInfo['order_back_id'] = $refund->id;
            $backInfo['option_type'] = 2;
            $backInfo['option_id'] = Session::get('admin_user')['user_id'];
            $backInfo['option_name'] = Session::get('admin_user')['account'];
            Event::fire('item.refund', array($backInfo));
        }catch(Exception $e) {
            $result["status"] = 0;
            $result["msg"] = $e->getMessage();
        }
        return Response::json($result);
    }

    /**
     * 退款退货审核
     */
    public function postCheck()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $refund_id = Input::get("refund_id");
            if (empty($refund_id)) {
                throw new RuntimeException("参数有误");
            }
            //联系地址
            $address = trim(Input::get("address"));
            //收货人电弧
            $phone = trim(Input::get("link_phone"));
            //收货人
            $link = trim(Input::get("link"));
            //审核说明
            $content = trim(Input::get("content"));
            empty(Input::get("is_pass"))? $status = 1 : $status = 2;
            $refund = Source_Order_OrderBack::find($refund_id);
            $refund->status = $status;
            $refund->back_delivery_address = $address;
            $refund->back_delivery_name = $link;
            $refund->back_delivery_phone = $phone;
            $refund->audit_content = $content;
            $refund->save();
            $backInfo['order_back_id'] = $refund->id;
            if($status ==1){
                $backInfo['status']='审核未通过';
                $backInfo['remark']=Session::get('admin_user')['account']."退款单审核不通过";
            }elseif ($status ==2){
                $backInfo['status']='审核已通过';
                $backInfo['remark']=Session::get('admin_user')['account']."退款单已经审核通过";
            }
            $backInfo['option_type'] = 2;
            $backInfo['option_id'] = Session::get('admin_user')['user_id'];
            $backInfo['option_name'] = Session::get('admin_user')['account'];
            Event::fire('item.refund', array($backInfo));
        }catch(Exception $e) {
            $result["status"] = 0;
            $result["msg"] = $e->getMessage();
        }
        return Response::json($result);
    }

    /**
     * 退款详情页
     */
    public function getDetail()
    {
        $refund_id = (int)Input::get("refund_id");
        if (empty($refund_id)) {
            //todo 重定向值错误页
        }
        $refund = Source_Order_OrderBack::find($refund_id);
        $operate_log = Source_Order_OrderBackAction::where("order_back_id","=",$refund_id);

        $this->view("admin.order.refund_detail",compact("refund","operate_log"));
    }

    //确认收货
    public function  getReseive($id){
        $refund = Source_Order_OrderBack::find(decode($id));
        if($refund){
            $refund->status =5;
           $res =  $refund->save();
            if($res){
                $backInfo['order_back_id'] = $refund->id;
                $backInfo['status']='客服收货成功';
                $backInfo['remark']=Session::get('admin_user')['account']."：已经收货";
                $backInfo['option_type'] = 2;
                $backInfo['option_id'] =Session::get('admin_user')['user_id'];
                $backInfo['option_name'] = Session::get('admin_user')['account'];
                return Redirect::to('/admin/refund/back')->with('msg','编辑成功');
            }
         }
        return Redirect::back()->with('msg','编辑失败');

    }

}