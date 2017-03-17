<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Source_User_UserInfo extends \Eloquent implements UserInterface,RemindableInterface{
  protected $table = 'userinfo';

  protected $primaryKey = 'id';
  // use SoftDeletingTrait;
  // protected $dates = ['deleted_at'];
  public $timestamps = true;
  protected $guarded = ['id'];

  public function getAuthIdentifier()
{
    return $this->getKey();
}

/**
 * Get the password for the user.
 *
 * @return string
 */

 public function setPasswordAttribute()
{
    $this->password = Hash::make($this->password);
}
public function getAuthPassword()
{
    return $this->password;
}

public function getAuthName()
{
    return $this->name;
}

public function getRememberToken()
{
}
public function setRememberToken($value)
{
}
public function getRememberTokenName()
{
}

/**
 * Get the e-mail address where password reminders are sent.
 *
 * @return string
 */
public function getReminderEmail()
{
    return $this->email;
}

}
