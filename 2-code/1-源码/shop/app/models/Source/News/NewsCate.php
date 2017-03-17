<?php

class Source_News_NewsCate extends \Eloquent{


    protected $table = 'blog_category';
    protected $primaryKey = 'id';
    // use SoftDeletingTrait;
    // protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $guarded = ['id'];
}
