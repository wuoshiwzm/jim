<?php

/**
 * Author:Tonychang
 * Date: 2017-01-02
 * Time: 10:37
 * DES:权限处理类
 */
class Privilege
{

    /**
     * 获取用户组拥有权限
     * @param $group_id 组id
     */
    public static  function getPrivilege($group_id)
    {
        $model = Source_suite_Privilege::leftJoin('navigation',"group_priv.navigation_id","=","navigation.navigation_id");
        $privileges = $model->where("group_priv.group_id",$group_id)->get();
        $user_privilege = array();
        if (! empty($privileges)){
            foreach($privileges as $privilege) {
                if (! empty($privilege->link)) {
                    //获取权限连接
                    $user_privilege[] = $privilege->link;
                }
            }
        }
        //权限和菜单放置到缓存中去
        $redis = Redis::connection();
        $key = "privileges_".$group_id;
        $redis->set($key,serialize($user_privilege));
    }

    /**
     * 获取去所有的菜单
     */
    public  static function getALLMenu()
    {
        $menus = Source_Navigation_Naviagtion::where("status",1)
            ->where("is_show",1)
            ->orderBy("hid","ASC")
            ->orderBy("sort","ASC")
            ->get();

        $nav_top = $nav_two = $nav_three = array();
        if (! empty($menus)){
            foreach($menus as $menu) {
                switch (strlen($menu->hid)) {
                    case 6: $nav_top[] = $menu; break;
                    case 11: $nav_two[] = $menu; break;
                    case 16: $nav_three[] = $menu; break;
                }
            }
        }

        $navigations['nav_top'] = $nav_top;
        $navigations['nav_two'] = $nav_two;
        $navigations['nav_three'] = $nav_three;
        return $navigations;
    }


}