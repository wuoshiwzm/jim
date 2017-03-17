<?php

class Source_User_UserInfoGroup extends \Eloquent
{
    protected $table = 'userinfo_group';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
}
