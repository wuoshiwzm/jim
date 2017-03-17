<?php
class Source_Product_ProductImage extends \Eloquent
{

    protected $table='product_images';
    //开启自动更新时间戳
    public  $timestamps = false;

    /**
     * 图片关联产品表
     */
    public function getImgToProductFlat()
    {
        return $this->belongsTo( 'Source_Product_ProductFlat', 'entity_id', 'entity_id' );
    }
    
}