<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/11
 * Time: 13:42
 */

class LocationController extends CommonController{
    
    
    public function getProvince()
    {
        return Location::getProvince();
    }

    public function getCity()
    {
        $province = Input::get('province');

        return Location::getCity($province);
    }


    public function getArea()
    {
        $city = Input::get('city');
        return Location::getArea($city);
    }
}