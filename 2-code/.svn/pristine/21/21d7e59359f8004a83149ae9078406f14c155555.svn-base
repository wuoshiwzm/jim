<?php
class Source_Product_ProductEav extends \Eloquent
{
    protected $table= 'product_eav';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    /**
     * ----------------------------------
     *  一对一关联产品eav表关联eav属性表
     * ----------------------------------
     */
    public function productEavToEav()
    {
        return $this->belongsTo( 'Source_Eav_Attrbute', 'attbute_id', 'id' );
    }
}