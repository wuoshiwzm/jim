<?php
/**
 * Author:Tonychang
 * Date: 2017-01-03
 * Time: 22:46
 * DES:redis缓存操作
 */

class MyRedis
{
    /**
     * @param  string $key 键
     * @param  string $value 值
     */
    public static function set($key,$value)
    {
        //用户权限放置到缓存中去
        $redis = Redis::connection();
        $redis->set($key,$value);
    }

    /**
     * @param string $key 键
     */
    public static function get($key)
    {
        //用户权限放置到缓存中去
        $redis = Redis::connection();
        return $redis->get($key);
    }
}
