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

        $provinceInfo = Source_Area_Province::where('province',$province)->first();

        if ($province) {
            return Source_Area_City::select('id', 'city', 'cityID')
                ->where('parent',$provinceInfo->provinceID)
                ->get()
                ->toJson();
        }
        $parent = Source_Area_Province::where('province', $province)->first()->provinceID;
        return Source_Area_City::where('parent', $parent)
            ->select('id', 'city', 'cityID')
            ->get()
            ->toJson();
    }


    /**
     * @param null $city
     * @return mixed
     */
    static function getArea($city = NULL)
    {

        $cityInfo = Source_Area_City::where('city',$city)->first();

        if ($city) {
            return Source_Area_Area::select('id', 'area', 'areaID')
                ->where('parent',$cityInfo->cityID)
                ->get()
                ->toJson();
        }
        $parent = Source_Area_City::where('city', $city)->first()->cityID;
        return Source_Area_Area::where('parent', $parent)
            ->select('id', 'area', 'areaID')
            ->get()
            ->toJson();
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
