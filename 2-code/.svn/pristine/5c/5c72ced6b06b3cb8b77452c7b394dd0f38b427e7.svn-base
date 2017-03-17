<?php
/**
 *
 * 门店
 *
 */

class Source_User_ShopInfo extends \Eloquent
{
    protected $table = 'mendian_info';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];

    /**
     *  一对一关联省表
     */
    public function productToProvince()
    {
        return $this->belongsTo( 'Source_Area_Province', 'province', 'provinceID' );
    }
    /**
     *  一对一关联城市表
     */
    public function productToCity()
    {
        return $this->belongsTo( 'Source_Area_City', 'city', 'cityID' );
    }
}