<?php
class Source_Screen_CategoryBrand extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $table='cagetoty_brand';
    public  $timestamps = false;

    /**
     * ----------------------------------
     *  一对一关联产品品牌
     * ----------------------------------
     */
    public function screenCategoryToBrand()
    {
        return $this->belongsTo( 'Source_Product_ProductBrand', 'brand_id', 'id' );
    }

  

}