<?php
namespace woo\domain;

require_once("woo/base/Registry.php");

class ObjectWatcher
{
    private $all = [];
    private static $instance;

    private function __construct(){}

    static function instance(){
        if(!isset(self::$instance)){
            self::$instance = new ObjectWatcher();
        }
        return self::$instance;
    }

    function globalKey(DomainObject $obj){
        $key = get_class($obj).".".$obj->getId();
        return $key;
    }

    static function add(DomainObject $obj){
        $inst = self::instance();
        $inst->all[$inst->globalKey($obj)] = $obj;
    }

    static function exists($className ,$id){
        $inst = self::instance();
        $key = "$className.$id";
        if(isset($inst->all[$key])){
            return $inst->all[$key];
        }
        return null;
    }
}
?>
