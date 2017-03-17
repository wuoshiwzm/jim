<?php

class CacheController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
    }




    /**
     * @param Request $request
     * 更新缓存
     *  common_cache_id  产品详情页面缓存
     *  website_index  网站首页缓存
     *  area_cache   地区缓存
     *  system_menu   菜单缓存
     *  system_priv   系统权限
     *  system_config  系统配置
     */
    public function store()
    {
        $cache_list  =  Input::get();
          foreach ($cache_list as $val) {
            if($val =="common_cache"){
                Cache::remember('common_cache', 10, function()
                {
                    return  Source_Product_ProductFlat::where('status','1')->with('productFlatToFlatDetail')->get();
                });
            }
            //首页缓存
           if($val =="website_index"){

           }
          //地区区域缓存
           if($val =="area_cache"){
               Cache::remember('area_cache', 10, function()
               {
                   return   Source_Area_Area::get();
               });
               Cache::remember('city_cache', 10, function()
               {
                   return   Source_Area_City::get();
               });
               Cache::remember('province_cache', 10, function()
               {
                   return   Source_Area_Province::get();
               });
           }
           if($val =="system_priv"){

           }
           if($val =="system_config"){

           }

        }
    }






}


?>