<?php
//get the location info
//Source_Area_Area
//Source_Area_City
//Source_Area_Province
class Location  {
  static function getProvince(){
    return Source_Area_Province::select('id','province','provinceID')->get()->toJson();
  }

  static function getCity($province = NULL){
    if(!$province){
      return Source_Area_City::select('id','city','cityID')
      ->get()
      ->toJson();
    }
    $parent = Source_Area_Province::where('id',$province)->first()->provinceID;
    return Source_Area_City::where('parent',$parent)
    ->select('id','city','cityID')
    ->get()
    ->toJson();
  }

  static function getArea($city = NULL){
    if(!$city){
      return Source_Area_Area::select('id','area','areaID')
      ->get()
      ->toJson();
    }
    $parent = Source_Area_City::where('id',$city)->first()->cityID;
    return Source_Area_Area::where('parent',$parent)
    ->select('id','area','areaID')
    ->get()
    ->toJson();
  }


}
