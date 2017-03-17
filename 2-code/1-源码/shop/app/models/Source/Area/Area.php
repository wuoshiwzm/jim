<?php
/**
 * Created by PhpStorm.
 * User: wangdingfeng
 * Date: 2015/1/14
 * Time: 12:53
 */

class Source_Area_Area extends \Eloquent {

    protected $table='area';
    //开启自动更新时间戳
    public $timestamps = true;
    //开启软删除
    protected $softDelete = true;
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
}