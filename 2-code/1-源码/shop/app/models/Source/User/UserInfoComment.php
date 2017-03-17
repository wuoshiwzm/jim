<?php

class Source_User_UserInfoComment extends \Eloquent
{
    protected $table = 'userinfo_comment';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
}
