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
        array(
            'type'=>'manjian',
            'use_tiaojian'=>'manjian',
            'yunsuanfu'=>'>',
            'value'=>'25'
        );
        array(
            'type'=>'youhuiquan',
            'use_tioajian'=>'pay_medth',
            'yunsuanfu'=>'=',
            'value'=>'paypal'
        );
        array(
            'type'=>'youhuiquan',
            'use_tioajian'=>'cart_weight',
            'yunsuanfu'=>'>',
            'value'=>'35'
        );
        array(
            'type'=>'youhuiquan',
            'use_tioajian'=>'product',
            'yunsuanfu'=>'=',
            'value'=>'product'
        );
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
        $this->view("admin.report.order");
    }


    /**
     *  客户查询结果导出
     */
    public function getExportcustomer()
    {
        $this->view("admin.report.customer");
    }



    
}