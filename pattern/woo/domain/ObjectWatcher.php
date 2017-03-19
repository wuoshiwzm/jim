<?php
namespace woo\domain;

require_once("woo/base/Registry.php");

class ObjectWatcher
{
    private $all = [];
    private $dirty = array();
    private $new = array();
    private $delete = array();//未使用
    private static $instance;

    private function __construct()
    {
    }

    static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new ObjectWatcher();
        }
        return self::$instance;
    }

    function globalKey(DomainObject $obj)
    {
        $key = get_class($obj) . "." . $obj->getId();
        return $key;
    }

    static function add(DomainObject $obj)
    {
        $inst = self::instance();
        $inst->all[$inst->globalKey($obj)] = $obj;
    }

    static function exists($className, $id)
    {
        $inst = self::instance();
        $key = "$className.$id";
        if (isset($inst->all[$key])) {
            return $inst->all[$key];
        }
        return null;
    }

    //write the array $delete
    static function addDelete(DomainObject $obj)
    {
        $self = self::instance();
        $self->delete[$self->globalKey($obj)] = $obj;
    }

    //
    static function addDirty(DomainObject $obj)
    {
        $inst = self::instance();
        if (!in_array($obj, $inst->new, true)) {
            $inst->dirty[$inst->globalKey($obj)] = $obj;
        }
    }

    static function addNew(DomainObject $obj)
    {
        $inst = self::instance();
        //there is no globalKey here
        $inst->new[] = $obj;
    }

    static function addClean(DomainObject $obj)
    {
        $self = self::instance();
        unset($self->delete[$self->globalKey($obj)]);
        unset($self->dirty[$self->globalKey($obj)]);
        $self->new = array_filter(
            $self->new, function ($a) use ($obj) {
            return !($a === $obj);
        });
    }

    function performOperations(){
        foreach ($this->dirty as $k=>$obj){
            //get mapper object
            $obj->finder()->update($obj);
        }
        foreach ($this->new as $key=>$obj){
            $obj->finder()->insert($obj);
        }
        $this->dirty = array();
        $this->new = array();
    }
}

?>
