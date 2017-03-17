<?php

/**
 * Class Source_Eav_Attrbute
 * 产品属性类
 */
class Source_Eav_Attrbute extends \Eloquent
{

    protected $table='attribute';
    protected $primaryKey = 'id';
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $guarded = ['id'];

    /**
     * ----------------------------------
     *  一对一关联产品eav表关联eav属性值表
     * ----------------------------------
     */
    public function ButeToButeValue()
    {
        return $this->belongsTo( 'attrute_type_value', 'attributeid', 'id' );
    }

}