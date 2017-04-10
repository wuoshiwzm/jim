<?php
namespace woo\login;

use Observer;
use Observable;
require_once ("woo/login/Observable.php");
require_once ("woo/login/Login.php");
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/28
 * Time: 12:00
 */

class Login implements Observable{
    private $observers;
    function __construct()
    {
        $this->observers = array();
    }

    function attach(Observer $observer){
        $this->observers[] = $observer;
    }

    function detach( Observer $observer){
        $newobservers = array();
        foreach($this->observers as $obs){
            if($obs !== $observer){
                $newobservers[] = $newobservers;
            }
        }
    }

    function notify(){
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }

    function handleLogin($user,$pass,$ip){
        switch (rand(1,3)){
            case 1:
                $this->setStatus(self::LOGIN_ACCESS , $user, $ip);
                $ret  = true;break;
        }
    }
}

class SecurityMonitor implements Observer{

    function update(Observable $observable){
        $status = $observable->getStatus();
        if($status[0] == LOGIN::LOGIN_WRONG_PASS){
            //handle for login wrong
            print __CLASS__.":\tsending mail to sysadmin\n";
        }
    }
}