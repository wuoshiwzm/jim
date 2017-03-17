<?php

class Source_Cart_CartInfo extends \Eloquent
{
    protected $table = 'quote_info';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function item()
    {
        return $this->hasOne("Source_Cart_CartItem","quote_id");
    }


}
