<?php

class Source_System_Log_VisitorsLog extends \Eloquent{

    protected $table='visitors_log';
    public $timestamps = false;
    protected $primaryKey = 'id';


    public function product()
    {
        return $this->belongsTo('Source_Product_ProductFlat','vs_value','entity_id');
    }


}
