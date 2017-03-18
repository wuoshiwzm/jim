<?php
/**
 * Author:Tonychang
 * Date: 2016-12-31
 * Time: 13:35
 * DES:
 */
class Navigation
{


    /**
     * @param $navigation array 添加数据
     * @return bool
     */
    public static  function addNavigation($navigation)
    {
        $res = array("status" => 0);
        try {
            //开启事务
            DB::beginTransaction();
            $nav = new Source_Navigation_Naviagtion;
            $nav->parent_id = $navigation["parent_id"];
            $nav->title = $navigation["title"];
            $nav->link = $navigation["link"];
            $nav->is_show = $navigation["is_show"];
            $nav->icon = $navigation["icon"];
            $nav->status = $navigation["status"];
            $nav->save();
            //返回主键
            $id = $nav->navigation_id;
            //更新hid
            $hid = $navigation["hid"].':' . str_pad($id, 4, 0, STR_PAD_LEFT);
            $update = Source_Navigation_Naviagtion::find($id);
            $update->hid = $hid;
            $update->save();
            DB::commit();
        }catch (\Exception $e) {
            $res["msg"] = $e->getMessage();
            DB::rollback();
        }
        return $res;
    }

    /**
     * @param $navigation array 更新数据
     * @param $n_id  string 主键
     * @return bool
     */
    public static  function updateByID($navigation,$n_id)
    {
        $nav =  Source_Navigation_Naviagtion::find((int)$n_id);
        $nav->parent_id = $navigation["parent_id"];
        $nav->title = $navigation["title"];
        $nav->link = $navigation["link"];
        $nav->is_show = $navigation["is_show"];
        $nav->icon = $navigation["icon"];
        $nav->status = $navigation["status"];
        $nav->hid = $navigation["hid"];
        return $nav->save();
    }

    /**
     * 根据菜单主键获取数据
     * @param $id
     * @return collection
     */
    public static  function getNavigation($id)
    {
        $navigation_id = (int)$id;
        return  Source_Navigation_Naviagtion::find($navigation_id);
    }

    /**
     * 获取排序后权限列表
     * @return  array
     */
    public static  function getNavigationList()
    {
        $model = Source_Navigation_Naviagtion::where("status",1)
            ->orderBy("hid","ASC")
            ->orderBy("sort","ASC");
        $navigations = $model->get()->toArray();
        if (! empty($navigations)) {
            foreach ($navigations as $k => &$v) {
                $str_padding = '';
                $level = count(explode(':', $v['hid'])) - 2;
                if ($level) {
                    for ($i = 0; $i < $level; $i++) {
                        $str_padding .= "　　";
                    }
                }
                $v['str_padding'] = $str_padding;
            }
        }
        return $navigations;
    }

    /**
     * 获取的权限列表
     */
    public static function getNavigationAll()
    {
        $model = Source_Navigation_Naviagtion::where("status",1)
            ->orderBy("hid","ASC")
            ->orderBy("sort","ASC")
            ->get();
        return $model;
    }

    /**
     *根据主键进行删除操作
     * @param $navigation_id 主键
     */
    public static  function delete($navigation_id)
    {
        $navigation =  Source_Navigation_Naviagtion::find($navigation_id);
        return $navigation->delete();
    }

}