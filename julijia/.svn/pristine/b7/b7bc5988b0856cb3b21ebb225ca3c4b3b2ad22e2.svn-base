<?php

/**
 * Author:Tonychang
 * Date: 2016-12-24
 * Time: 13:58
 * DES: 路由工具类
 */
class RouteAdvance
{
    /**
     * @return array
     * @des 获取当前路由控制器名称和方法
     */
    static function getCurrentAction()
    {
        $action = Route::currentRouteAction();
        list($class, $method) = explode('@', $action);
        return ['controller' => $class, 'method' => $method];
    }

    /**
     * @return mixed
     * @des 获取当前控制器名称
     */
    static function getCurrentControllerName()
    {
        return self::getCurrentAction()['controller'];
    }

    /**
     * @return mixed
     * @des 获取当前控制器方法
     */
    static  function getCurrentMethodName()
    {
        return self::getCurrentAction()['method'];
    }

    /**
     * @return string
     * 获取当前访问的路由uri静态前缀
     */
    static function getCurrentRouteStaticPrefix()
    {
        $prefix = Route::current()->getCompiled()->getStaticPrefix();
        return $prefix;
    }


}