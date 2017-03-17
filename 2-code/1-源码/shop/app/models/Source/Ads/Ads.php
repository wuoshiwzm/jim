<?php
class Source_Ads_Ads extends \Eloquent
{

    protected $table='ads';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function adstype(){
        return $this->belongsTo("Source_Ads_AdsType","pid");
    }
}