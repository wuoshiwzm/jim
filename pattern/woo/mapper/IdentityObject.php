<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/3/21
 * Time: 13:17
 */
namespace woo\mapper;

require_once ('woo/mapper/Field.php');

class IdentityObject extends Field
{
    protected $currentfield = null;
    protected $fields = [];
    private $and = null;
    private $enforce = [];

    function __construct($field = null, array $enforce = null)
    {
        if (!is_null($enforce)) {
            $this->enforce;
        }
        if (!is_null($field)) {
            $this->field($field);
        }
    }

    function getObjectFields()
    {
        return $this->enforce;
    }

    function field($fieldname)
    {
        if (!$this->isVoid() && $this->currentfield->isIncomplete()) {
            throw new \Exception('Incomplete field');
        }
        $this->enforceField($fieldname);
        if (isset($this->fields[$fieldname])) {
            $this->currentfield = $this->fields[$fieldname];
        } else {
            $this->currentfield = new Field($fieldname);
            $this->fields[$fieldname] = $this->currentfield;
        }
        return $this;
    }

    function enforceField($fieldname)
    {
        if (!in_array($fieldname, $this->enforce) && !empty($this->enforce)) {
            $forcelist = implode(', ', $this->enforce);
            throw new \Exception("{$fieldname} not a legal field ($forcelist)");
        }
    }

    function eq($value)
    {
        return $this->operator("=", $value);
    }
    function lt($value){
        return $this->operator("<",$value);
    }
    function gt($value){
        return $this->operator(">",$value);
    }

    private function operator($symbol, $value){
        if($this->isVoid()){
            throw new \Exception('no object field defined');
        }
        $this->currentfield->addTest($symbol,$value);
        return $this;
    }

    //get comparetions
    function getComps(){
        $ret = array();
        foreach ($this->fields as $key => $field){
            $ret = array_merge($ret , $field->getComps());
        }
        return $ret;
    }

    function isVoid(){
        return empty($this->fields);
    }

}

class EventIdentityObject extends IdentityObject
{
    private $start = null;
    private $minstart = null;

    function __construct($field = null)
    {
        parent::__construct($field, array('name','id','start','duration','space'));
    }

    function setMinimumStart($minstart)
    {
        $this->minstart = $minstart;
    }

    function getMinimumStart()
    {
        return $this->minstart;
    }

    function setStart($start)
    {
        $this->start = $start;
    }

    function getStart()
    {
        return $this->start;
    }
}