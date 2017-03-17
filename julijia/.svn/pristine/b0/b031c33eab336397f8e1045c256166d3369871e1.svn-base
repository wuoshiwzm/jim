<?php
/**
 * Class Product|
 * 后台用户管理模型
 */

class AdminUser  {

    public static $adminPage = 10;

    static function getUserByName($username)
    {
        return Source_User_AdminUser::where('account', $username);
    }

    /**
     * @param $account 账户
     * @param $password 密码
     * @des 账号和密码是正确
     * @return bool
     */
    static function allowLogin($account,$password)
    {
        //查询启动并存在的用户
        $account = Source_User_AdminUser::where('account', $account)
            ->where('status',1)
            ->first();
        if(empty($account))
            return false;
        //加密用户输入并验证
        $encrypt = encode($password);
        if ( strcmp($account->password,$encrypt) == 0) {
            return $account;
        }
        return false;
    }

    /**
     * 获取用户列表数据
     * @param string $keyword 关键词
     * @param string $fullname 用户姓名
     * @param int $setPage
     */
    static  public  function getUserByWhere($keyword = "",$fullname = "", $setPage = 0)
    {
        if ($setPage == 0 || !is_int($setPage))
            $setPage = self::$adminPage;

        if (empty($keyword) && empty($fullname)){
            return Source_User_AdminUser::where([])->orderBy('created_at','desc')->paginate($setPage);
        }

        if (is_string($fullname) && ! empty($fullname)) {
            $model = Source_User_AdminUser::where("fullname","like","%{$fullname}%");
        }

        if (is_string($keyword) && ! empty($keyword)) {
            $model = Source_User_AdminUser::where("account","like","%{$keyword}%")
                ->orwhere("email","like","%{$keyword}%");
        }

        if (! empty($fullname) && ! empty($keyword)) {
            $model = Source_User_AdminUser::where("fullname","like","%{$fullname}%")
                ->orwhere(function($query) use ($keyword) {
                    $query->where("account","like","%{$keyword}%");
                    $query->orwhere("email","like","%{$keyword}$");
                });
        }

        return $model->orderBy("created_at","desc")->paginate($setPage);
    }

    /**
     * 获取总人数
     */
    static  function getCount()
    {
        return Source_User_AdminUser::count();
    }

}