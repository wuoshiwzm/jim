<?php
namespace woo\mapper;


use woo\domain\DomainObject;
use woo\domain\ObjectWatcher;

abstract class Mapper
{
    protected static $PDO;

    function __construct()
    {
        if (!isset(self::$PDO)) {
            $dsn = \woo\base\ApplicationRegistry::getDSN();
            if (is_null($dsn)) {
                throw new \woo\base\AppException("No DSN");
            }

            self::$PDO = new \PDO($dsn);
            self::$PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
    }

    function find($id)
    {
        //objectwatcher 调用
        $old = $this->getFromMap($id);
        if($old){
            return $old;
        }

        //数据库操作
        $this->selectStmt()->execute(array($id));
        $array = $this->selectstmt()->fetch();

        $this->selectstmt()->closeCursor();
        if (!is_array($array)) {
            return null;
        }
        if (!isset($array['id'])) {
            return null;
        }
        $object = $this->createObject($array);
        return $object;
    }

    function createObject($array)
    {
        $old = $this->getFromMap($array['id']);
        if($old){
            return $old;
        }
        //数据库操作
        $obj = $this->doCreateObject($array);
        $this->addToMap($obj);
        //objectwatcher :: clean()
        $obj->markClean();
        return $obj;
    }

    function insert(\woo\domain\DomainObject $obj)
    {
        $this->addToMap($obj);
//        $this->doInsert($obj);
    }

    abstract function update(DomainObject $object);

    protected abstract function doCreateObject(array $array);
    protected abstract function doInsert(DomainObject $object);
    protected abstract function selectStmt();

    private function getFromMap($id){
        return ObjectWatcher::exists($this->targetClass(),$id);
    }

    private function addToMap(DomainObject $obj){
        return ObjectWatcher::add($obj);
    }



}

?>
