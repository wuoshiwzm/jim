<?php

class Source_Finance_AcccountHuizong extends \Eloquent{


    protected $table = 'caiwu_account_huizong';
    protected $primaryKey = 'id';
    // use SoftDeletingTrait;
    // protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $guarded = ['id'];
}
