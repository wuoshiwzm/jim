<?php

/**
 * Author:Tonychang
 * Date: 2016-12-03
 * Time: 13:38
 * DES:
 */
class Source_Feedback_FeedbackReason extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='feedback_reason';
    public $timestamps = true;
    protected $guarded = ['id'];

}