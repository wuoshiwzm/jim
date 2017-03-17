<?php

/**
 * Author:Tonychang
 * Date: 2016-11-06
 * Time: 15:47
 * DES:
 */
class Source_Salerule_FavoutableProduct extends  \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='favoutable_product';
    public $timestamps = true;


    public function  SaleRule()
    {
        return $this->belongsTo("Source_Salerule_FavoutableRule",'rule_id');
    }


    /**
     * @return mixed
     * 关联产品表
     */
    public function favoutableProductToProductFlat()
    {
        return $this->belongsTo("Source_Product_ProductFlat",'product_id','entity_id');
    }

}