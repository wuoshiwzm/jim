<?php

/**
 *  列表页控制器
 */
class ApiController extends \BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 列表页
     *
     */
    public function getJulijiahome( )
    {
        $list = Source_Product_ProductFlat::cacheTags('product')
                ->where('small_image','<>','')
                ->remember(20)
                ->orderBy('created_at','desc')->take('10')->with('productFlatToFlatDetail')->get();
        $res=array();
        foreach ($list as $key=> $val ){
             $res[$key]['entity_id']  =  $val->entity_id;
             $res[$key]['name']= $val->name;
             $res[$key]['price']=  $val->price;
             $res[$key]['cost_price']= $val->cost_price;
             $res[$key]['preferential_price']= $val->preferential_price;
             $res[$key]['small_image']= getImgSize( 'goods', $val->entity_id, $val->small_image,210,210 );
        }
       return json_encode($res);
    }

}