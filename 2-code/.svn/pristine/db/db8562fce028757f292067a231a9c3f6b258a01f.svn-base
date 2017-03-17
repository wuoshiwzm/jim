<?php
//get the location info
//Source_Area_Area
//Source_Area_City
//Source_Area_Province
class Location
{

    /**
     * @return mixed
     */
    static function getProvince()
    {
        return Source_Area_Province::select('id', 'province', 'provinceID')->get()->toJson();
    }

    /**
     * @param null $province
     * @return mixed
     */
    static function getCity($province = NULL)
    {

        if ($province) {
            return Source_Area_City::select('id', 'city', 'cityID')
                ->where('parent',$province)
                ->get()
                ->toJson();
        }else return [];
    }


    /**
     * @param null $city
     * @return mixed
     */
    static function getArea($city = NULL)
    {
        if ($city) {
            return Source_Area_Area::select('id', 'area', 'areaID')
                ->where('parent',$city)
                ->get()
                ->toJson();
        }else return [];
    }

    /**
     * @param $id
     * @return mixed
     */
    static function getAreaNameById($id)
    {
        if (!$id) {
            return '';
        }
        return Source_Area_Area::find($id)->name;
    }


}
