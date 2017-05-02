<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/22
 * Time: 15:01
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class t{
    public static function f($data)
    {
        var_dump($data);
        die();
    }

    //判断一个数组是否全为空
    public function arrayEmpty(array $array)
    {
        foreach ($array as $key=>$value){
            if(!empty($value))
                return false;
        }

        return true;
    }




}