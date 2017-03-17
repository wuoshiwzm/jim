<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/10 0010
 * Time: 14:22
 */
class FriendshipLink
{

    /**
     * @param $data
     * @return bool
     * 添加
     */
    static function addLink( $data )
    {
        $res = Source_FriendshipLink_Link::firstOrCreate( $data );
        return $res? true : false;
    }

    /**
     * @param $data
     * @return bool
     * 修改
     */
    static function updateLink( $data )
    {
        $res = Source_FriendshipLink_Link::where('id',$data['id'])->update( $data );
        return $res? true : false;
    }

    /**
     * @param $pid
     * @param $cache
     * @return mixed
     * 查询友情链接
     */
    static function getLink( $pid, $cache )
    {
        $data = Source_FriendshipLink_Link::cacheTags('link')->remember( $cache  )->where(['pid'=>$pid,'status'=>1])->orderBy('sort','desc')->get();
        return $data;
    }

}