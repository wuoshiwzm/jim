<?php

class Source_News_NewsArt extends \Eloquent
{
    protected $table = 'blog';
    protected $primaryKey = 'id';
    // use SoftDeletingTrait;
    // protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $guarded = [];

    /**
     * 对应新闻分类
     */
    public function newsCate()
    {
        return $this->belongsTo('Source_News_NewsCate', 'category_id');
    }


    /**
     * @return mixed
     * 对应新闻详情
     */
    public function detail(){
        return $this->hasOne('Source_News_NewsDetail','blog_id');
    }


}
