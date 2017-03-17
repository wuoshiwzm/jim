<?php

/**
 * 友情链接
 */
class Source_FriendshipLink_Link extends \Eloquent
{

    protected $table='friendship_link';
    protected $primaryKey = 'id';
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $guarded = ['id'];

    /**
     * ----------------------------------
     *  一对一关联分类表
     * ----------------------------------
     */
    public function linkToCategory()
    {
        return $this->belongsTo( 'Source_Product_ProductCategory', 'pid', 'id' );
    }


}