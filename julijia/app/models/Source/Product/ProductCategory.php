<?php
class Source_Product_ProductCategory extends \Eloquent
{
    protected $table= 'category';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];

    /**
     * ----------------------------------
     *  一对一关联产品eav表关联eav属性值表
     * ----------------------------------
     */
    public function categoryToProductFlat()
    {
        return $this->hasMany( 'Source_Product_ProductFlat', 'category_id', 'id' );
    }

}