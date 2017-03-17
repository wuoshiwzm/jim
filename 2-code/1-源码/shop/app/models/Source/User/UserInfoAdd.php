<?php

class Source_User_UserInfoAdd extends \Eloquent
{
    protected $table = 'userinfo_address';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function provinceInfo()
    {
        return $this->belongsTo('Source_Area_Province','province','provinceID');
    }

    public function cityInfo()
    {
        return $this->belongsTo('Source_Area_City','city','cityID');
    }

    public function areaInfo()
    {
        return $this->belongsTo('Source_Area_Area','district','areaID');
    }


}
