<?php
/**
 * Author:Tonychang
 * Date: 2016-12-27
 * Time: 18:38
 * DES:后台用户组
 */
class Suite
{
    public static $adminPage = 10;

    /**
     * @param string $name 组名
     * @param int $setPage 分页数
     * @return colllection
     */
    static function getSuiteByWhere($name = "", $setPage = 0)
    {
        if ($setPage == 0 || !is_int($setPage))
            $setPage = self::$adminPage;

        if (empty($name)) {
            return Source_User_Suite::paginate($setPage);
        }
        if (!empty($name) && is_string($name)) {
            $model = Source_User_Suite::where("group_name", "like", "%{$name}%");
            return $model->paginate($setPage);
        }
    }

    /**
     * 获取用户组的数目
     */
    static function getCount()
    {
        return Source_User_Suite::count();
    }

    /**
     * @return mixed 获取所有的组
     */
    static function getAll()
    {
        return Source_User_Suite::All();
    }

    /**
     * 添加用户和权限
     * @param $data array 添加数据
     * @return array
     */
    static function addSuite($data)
    {
        try{
            //定义返回结构
            $res = array(
                "status" => 1
            );

            DB::beginTransaction();
            //组名
            $group_name = $data["group_name"];
            //privilege权限
            $privilege = $data["privilege"];
            $group = new Source_User_Suite;
            $group->group_name = $group_name;
            $group->save();
            $group_id = $group->group_id;
            //保存权限和组关联表
            $privileges = explode(",",$privilege);
            if (! empty($privileges)) {
                foreach($privileges as $pri) {
                    $pri_group = new Source_suite_Privilege;
                    $pri_group->group_id = $group_id;
                    $pri_group->navigation_id = $pri;
                    $pri_group->save();
                }
            }
            DB::commit();
        }catch(Exception $e) {
            $res["status"] = 0;
            $res["msg"] = $e->getMessage();
            DB::rollback();
        }
        return $res;
    }

    /**
     * @data array 编辑数据
     * 编辑用户和权限
     */
    static function updateSuite($data)
    {
        try{
            //定义返回结构
            $res = array(
                "status" => 1
            );
            DB::beginTransaction();
            //组名
            $group_name = $data["group_name"];
            //privilege权限
            $privilege = $data["privilege"];
            $group_id = (int)$data["group_id"];
            $group =  Source_User_Suite::find($group_id);
            $group->group_name = $group_name;
            $group->save();
            //保存权限
            $privileges = explode(",",$privilege);
            if (! empty($privileges)) {
                //先删除后添加
                Source_suite_Privilege::where("group_id",$group_id)->delete();

                foreach($privileges as $pri) {
                    $pri_group = new Source_suite_Privilege;
                    $pri_group->group_id = $group_id;
                    $pri_group->navigation_id = $pri;
                    $pri_group->save();
                }
            }
            DB::commit();
        }catch(Exception $e) {
            $res["status"] = 0;
            $res["msg"] = $e->getMessage();
            DB::rollback();
        }
        return $res;
    }

    /**
     * 获取用户组拥有的权限
     * @param $group_Id 用户组id
     * @return $group_pri 用户权限id
     */
    public static  function getNavigationByGroupId($group_Id)
    {
        $group_pri = Source_suite_Privilege::where("group_id",$group_Id)
            ->lists('navigation_id');
        return $group_pri;
    }
}