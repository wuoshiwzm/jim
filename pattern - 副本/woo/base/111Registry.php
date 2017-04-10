<?php
namespace woo\base;
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/20
 * Time: 11:45
 */
class Registry{
    private static $instance;
    private $request;

    private function __construct()
    {
    }
    static function instance(){
        if(!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    function getRequest(){
        return $this->request;
    }

    function setRequest( Request $request){
        $this->request = $request;
    }


}
