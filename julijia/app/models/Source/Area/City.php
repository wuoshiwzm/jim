<?php
class Source_Area_City extends \Eloquent {

    protected $table='city';
    //开启软删除
    protected $softDelete = true;
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    //开启自动更新时间戳
    public $timestamps = true;


}