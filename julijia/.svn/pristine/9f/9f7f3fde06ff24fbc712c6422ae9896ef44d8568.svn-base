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
    public function clean()
    {
        $cache_list  =  Input::get();
       if($cache_list['_token'] =csrf_token()){
           $cachedata =$cache_list['codes'];
           $i=0;
           foreach ($cachedata as  $item){
               switch ($item){
                   case "common_runtime":
                       Cache::forget('admin_home');
                       $i++;
                       break;
                   case "site_index":
                       Cache::tags('goods','category','screen')->flush();
                       Cache::tags('goods','category','screen','goodsList')->flush();
                       Cache::tags('goods','comment','attrbute')->flush();
                       $i++;
                       break;
                   case "config":
                       Cache::tags('ads')->flush();
                       Cache::tags('link')->flush();
                       $i++;
                       break;
                   case "menus":
                       $i++;
                       break;
                   case "auths":
                       $i++;
                       break;
               }
           }
           return $i.'个缓存清除成功';
       }
        else
        {
            return "失败！";
        }



    }






}


?>