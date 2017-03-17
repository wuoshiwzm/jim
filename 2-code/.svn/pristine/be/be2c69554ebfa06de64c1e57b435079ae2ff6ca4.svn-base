<?php
class Source_Product_ProductFlat extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $table='product_flat';

    /**
     * ----------------------------------
     *  一对一关联产品flat表关联flatdetail表
     * ----------------------------------
     */
    public function productFlatToFlatDetail()
    {
        return $this->belongsTo( 'Source_Product_ProductFlatDetail', 'entity_id', 'entity_id' );
    }
}