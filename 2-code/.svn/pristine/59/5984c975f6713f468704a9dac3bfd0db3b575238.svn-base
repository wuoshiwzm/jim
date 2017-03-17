<?php

/**
 * Author:Tonychang
 * Date: 2016-11-06
 * Time: 15:47
 * DES:
 */
class Source_Salerule_FavoutableCategory extends  \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='favoutable_category';
    public $timestamps = true;

    public function  SaleRule()
    {
        return $this->belongsTo("Source_Salerule_FavoutableRule",'rule_id');
    }

    /**
     * 关联分类表
     */
    public function favoutableCategoryToCategory()
    {
        return $this->belongsTo("Source_Product_ProductCategory",'category_id','id');
    }
}