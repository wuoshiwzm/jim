<?php

/**
 * Author:Tonychang
 * Date: 2016-11-06
 * Time: 21:24
 * DES:评论控制器
 */
class CommentController extends CommonController
{
    /**
     * 评论首页-审核通过的评价
     */
    public function getIndex()
    {
        //已审核的评论
        $status = 1;
        //订单编号
        $order_sn = trim(Input::get("order_sn"));
        //评论星级
        $rank = (int)Input::get("rank");
        //分页
        $setPage = (int)Input::get("setpage",self::$adminPage);
        $data = Review::getReview($order_sn,$status,$rank,$setPage);

        $set["order_sn"] = $order_sn;
        $set['setpage'] = $setPage;
        $set["rank"] = $rank;
        $this->view("admin.order.comment",compact("comment","set","data"));
    }
    /**
     * 待审核的评论
     */
    public function getChecking()
    {
        //待审核的评论
        $status = 0;
        //订单编号
        $order_sn = trim(Input::get("order_sn"));
        //评论星级
        $rank = (int)Input::get("rank");
        //分页
        $setPage = (int)Input::get("setpage",self::$adminPage);
        $data = Review::getReview($order_sn,$status,$rank,$setPage);
        $set["order_sn"] = $order_sn;
        $set['setpage'] = $setPage;
        $set["rank"] = $rank;

        $this->view("admin.order.checking",compact("comment","set","data"));
    }

    /**
     * 查看评论详情
     */
    public function getDetail()
    {
        //todo缺少页面
        $c_id = (int)Input::get("c_id");
        if ( empty($c_id)) {
            //todo 跳转至错误页
        }
        $comment = Review::getReviewById($c_id);
        $this->view("admin.order.cdetail",compact("comment"));
    }

    /**
     * 审核操作
     */
    public function postCheck()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $comment_id = (int)Input::get("c_id");
            $replay_content = trim(Input::get("content"));
            $is_check = (int)Input::get("tong");
            if(empty($comment_id)) {
                 throw  new RuntimeException("参数有误");
            }
            $review = Source_Order_OrderReview::find($comment_id);
            $review->replay_content = $replay_content;
            $review->status = $is_check;
            $review->save();
        }catch(Exception $e) {
            $result["status"] = 0;
            $result["msg"] = $e->getMessage();
        }
        return Response::json($result);
    }
}