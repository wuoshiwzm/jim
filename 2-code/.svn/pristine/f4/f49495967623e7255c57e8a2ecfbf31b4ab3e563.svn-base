<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/3 0003
 * Time: 17:54
 */
class LocationController extends CommonController
{

    /**
     * @param $parentID
     * @return mixed
     * 获取城市
     */
    public function getProvince()
    {
      return Location::getProvince();
    }


    public function getCity()
    {
      $province = Input::get('province');
      return Location::getCity($province);
    }


    public function getArea(  )
    {
      $city = Input::get('city');

      return Location::getArea($city);
    }



}
