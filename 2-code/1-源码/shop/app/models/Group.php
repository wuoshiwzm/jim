<?php

/**
 * Created by PhpStorm.
 * User: wuosh
 * Date: 2016/12/7
 * Time: 21:36
 */
class Group
{
    /**
     * @return mixed
     * 获取所有等级信息
     */
    static function getGroup()
    {
        return Source_User_UserInfoGroup::select('*');
    }

    /**
     * @param $data
     * @return bool
     * 验证新添加等级信息是否OK
     */
    static function validatorGroup($data)
    {
        $rules = [
            'name'=>'required',
            'beg_points'=>'required',
            'end_points'=>'required',

        ];
        $message = [];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            return true;

        } else {
            return $validator;
        }
    }

    /**
     * @param $data
     * 添加等级信息
     */
    static function addGroup($data)
    {
        $res = Source_User_UserInfoGroup::create($data);
        return $res;

    }

    /**
     * @param $groupId
     * @return mixed
     * 获取对应id的分组信息
     */
    static function getGroupById($groupId)
    {
        return Source_User_UserInfoGroup::find($groupId);
    }

    /**
     * @param $groupId
     * @param $data
     * 更新对应id的分组信息
     */
    static function updateById($groupId, $data)
    {
        $group = Source_User_UserInfoGroup::find($groupId);
        $group->name = $data['name'];
        $group->beg_points = $data['beg_points'];
        $group->end_points = $data['end_points'];
        $res = $group->save();
        return $res;

    }

    static function deleteById($groupId){
        $group = Source_User_UserInfoGroup::find($groupId);
        $res = $group->delete();
        return $res;

    }
}
