<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/10
 * Time: 11:36
 */
class AdminCache {

    /**
     * 后台缓存清除
     * data['type'] 1 首页，2 菜单
     * data['userid']  用户id
     * @param array $data
     * @return boolean
     */
    public function handle( $data )
    {
        switch ($data['type'])
        {
            case  1; //首页
                 Cache::forget('admin_home');
                 return true;
                break;
             case 2; //菜单
                Cache::forget('admin_menu'.$data['userid']);
                 return true;
                break;
            default:
                return true;
                break;
        }
        return false;

    }

}
