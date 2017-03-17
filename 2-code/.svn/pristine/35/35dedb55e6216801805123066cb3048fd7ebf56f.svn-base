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

         $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
         $list =  Source_Order_OrderInfo::orderBy('created_at','desc');
          $input = Input::get();
          $username = Input::get('customername');

         $list->whereHas('belongsToUser', function ($q) use ($username)
         {
             if(isset($username)&& $username !=''){
                 $q->whereRaw(' name like  "%'.$username.'%"');
             }
         });
         if(isset($input['status'])&&$input['status'] !=0){
             $list ->where('status',$input['status']);
         }
         $res  =  $list->with('belongsToUser')->paginate($setPage);
         $set['setpage'] = $setPage;
         $set['customername'] = isset($username)?$username:'';
         $set['status'] = isset($input['status'])?$input['status']:'';
         return $this->view('admin.sales.list',compact('res','set'));
    }
}