<?php

/**
 * Class Source_Eav_AttrbuteValue
 * 产品属性字段类别
 */
class Source_Eav_AttrbuteValue extends \Eloquent
{
    protected $table='attrute_type_value';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = true;
}