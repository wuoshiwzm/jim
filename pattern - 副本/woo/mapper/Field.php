<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/3/21
 * Time: 13:38
 */
namespace woo\mapper;

class Field{
    protected $name = null;
    protected $operator = null;
    protected $comps = [];
    protected $incomplete = false;

    function __construct($name)
    {
        $this->name = $name;
    }

    function addTest($operator , $value){
        $this->comps[] = array('name'=>$this->name,
            'operator'=>$operator,
            'value'=>$value);
    }

    function getComps(){
        return $this->comps;
    }

    function isIncomplete(){
        return empty($this->comps);
    }
}