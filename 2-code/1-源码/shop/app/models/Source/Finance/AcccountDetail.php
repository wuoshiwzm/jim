<?php

class Source_Finance_AcccountDetail extends \Eloquent{


    protected $table = 'caiwu_account_detail';
    protected $primaryKey = 'id';
    // use SoftDeletingTrait;
    // protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $guarded = ['id'];
}
