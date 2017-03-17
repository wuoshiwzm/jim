<?php

/**
 *  列表页控制器
 */
class ListController extends \BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 列表页
     *
     */
    public function index( $name )
    {
        cache::tags('category','goodsList')->flush();
        $categoryInfo = Home::getCategoryNameByID( $name, self::$cache );
        $categoryId = $categoryInfo['id'];
        $categoryName = $categoryInfo['name'];
        $parameter = Request::getQueryString();
        $data = Home::getGoodsList( self::$cache, $categoryId, $parameter );
        return $this->view('frontend.list.index',compact( 'data','categoryName' ));
    }

}