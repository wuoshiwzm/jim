<?php

/**
 * Author:Tonychang
 * Date: 2016-11-07
 * Time: 22:18
 * DES:投诉管理控制器
 */
class ComplainController extends  CommonController
{
    //投诉管理首页（所有投诉）
    public function  getIndex()
    {
        $status = 0;
        $order_sn = Input::get("order_sn","");
        $feedback_sn = Input::get("feedback_sn","");
        $reason_id = Input::get("reason_id",0);
        $data = Complain::getList($status,$order_sn,$feedback_sn,$reason_id,self::$adminPage);
        $set["order_sn"] = $order_sn;
        $set["feedback_sn"] = $feedback_sn;
        $set["reason_id"] = $reason_id;
        $set['setpage'] = self::$adminPage;
        $reasons = Source_Feedback_FeedbackReason::all();
        $this->view("admin.order.complain",compact("data","set","reasons"));
    }

    //投诉处理(平台方)页面
    public function getHandle()
    {
        $status = 1;
        $order_sn = Input::get("order_sn","");
        $feedback_sn = Input::get("feedback_sn","");
        $reason_id = Input::get("reason_id",0);
        $data = Complain::getList($status,$order_sn,$feedback_sn,$reason_id,self::$adminPage);

        $set["order_sn"] = $order_sn;
        $set["feedback_sn"] = $feedback_sn;
        $set["reason_id"] = $reason_id;
        $set['setpage'] = self::$adminPage;
        $reasons = Source_Feedback_FeedbackReason::all();
        $this->view("admin.order.chandle",compact("data","set","reasons"));
    }

    /**
     * 查看详情页
     */
    public function getDetail()
    {
        $c_id = (int)Input::get("c_id");
        $complain = Complain::getComplainById($c_id);
        $this->view("admin.order.ndetail",compact("complain"));
    }
    /**
     * 投诉回复
     */
    public function postReply()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $complain_id = (int)Input::get("c_id");
            $replay_content = trim(Input::get("content"));
            if(empty($complain_id)) {
                throw  new RuntimeException("参数有误");
            }
            $complain = Source_Feedback_FeedbackInfo::find($complain_id);
            $complain->re_content = $replay_content;
            $complain->status = 2;
            $complain->save();

            $admin_user = Session::get("admin_user");
            //写入日志
            $log = array(
                "feedback_id" => $complain_id,
                "option_type" => 2,
                "option_id" => $admin_user["user_id"],
                "option_name" => $admin_user["account"],
                "status" => 2,
                "remark" => "平台已经审核",
            );
            Source_Feedback_FeedbackAction::create($log);
        }catch(Exception $e) {
            $result["status"] = 0;
            $result["msg"] = $e->getMessage();
        }
        return Response::json($result);
    }



}