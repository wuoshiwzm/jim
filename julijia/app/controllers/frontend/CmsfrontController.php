<?php

/**
 *  列表页控制器
 */
class CmsfrontController extends \BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 列表页
     *
     */
    public function PageIndex( $url )
    {
       $info = Source_Cms_Page::where('identifier',$url)->first();
        if($info){
            return $this->view('frontend.page.index',compact( 'info' ));
        }
        return Redirect::to('http://xian.julijia.cn/'.$url);
    }

}