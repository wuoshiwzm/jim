<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/3/21
 * Time: 15:35
 */
namespace woo\mapper;

abstract class SelectionFactory{
    abstract function newSelection( IdentityObject $obj);

    function buildWhere(IdentityObject $obj){
        if($obj->isVoid()){
            return array("",array());
        }
        $compstrings = array();
        $values = array();
        foreach ($obj->getComps() as $comp){
            $compstrings[] = " {$comp['name']} {$comp['operator']}";
            $values[] = $comp['value'];
        }
        $where = "WHERE ".implode("AND",$compstrings);
        return array($where,$values);
    }
}