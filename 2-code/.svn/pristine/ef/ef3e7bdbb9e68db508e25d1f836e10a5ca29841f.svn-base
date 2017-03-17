<?php

/**
 * Class CacheController
 * 系统配置管理
 */
class SystemController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     *   系统配置页面
     */
    public function  getConfig()
    {
        $this->view('admin.system.config');
    }

    /**
     *  保存数据
     */
    public function  postCofnig(){

           $data  = Input::get();
           if( isset($data)){
               $model   =  new  System();
               $model->SaveConfig($data);
           }
    }

}


?>