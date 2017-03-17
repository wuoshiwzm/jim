<?php

class Source_Cart_CartItem extends \Eloquent
{
    protected $table = 'quote_item';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo('Source_Product_ProductFlat','product_id','entity_id');
    }
}
