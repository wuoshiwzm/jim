<?php

/**
 * Author:dingefng0509@vip.qq.com
 * Date: 2016-11-06
 * Time: 21:24
 * DES:查询统计控制器
 */
class  ReportController extends CommonController
{
    /**
     *  订单查询统计
     */
    public function getOrder()
    {

        $this->view("admin.report.order");
    }


    /**
     *
     *  导出订单查询结果
     */
    public function getExportorder()
    {

    }

    /**
     *  客户列表查询统计
     */
    public function getCustomer()
    {
        $list =   Source_User_UserInfo::get();
        $this->view("admin.report.customer",compact('list'));
    }


    /**
     *  客户查询结果导出
     */
    public function getExportcustomer()
    {
        $this->view("admin.report.customer");
    }



    
}