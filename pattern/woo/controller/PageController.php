<?php
namespace woo\controller;
use woo\base\Request;
use woo\base\RequestRegistry;

require_once 'woo/base/Registry.php';
require_once 'woo/base/Request.php';
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/20
 * Time: 11:04
 */

abstract class PageController{
    private $request;
    function __construct()
    {
        $request = \woo\base\RequestRegistry::getRequest();
        if(is_null($request)){
            $request = new Request();
        }
        $this->request = $request;
    }
    function forward($resource){
        include ($resource);
        exit(0);
    }

    function getRequest(){
        return $this->request;
    }

    abstract function process();


}