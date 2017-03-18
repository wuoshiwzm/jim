<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/12/16
 * Time: 14:54
 */

class SalesController extends CommonController
{
    protected $layout = 'layouts.member';


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


    public function __construct()
    {
        parent::__construct();
    }


    public function saleslist(){

         $list =  Source_Order_OrderInfo::orderBy('created_at','desc');
        dd($list->get());
        return $this->view('admin.sales.list');
    }
}