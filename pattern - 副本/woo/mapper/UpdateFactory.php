<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/3/21
 * Time: 14:54
 */
namespace woo\mapper;

use woo\domain\DomainObject;

abstract class UpdateFactory{
    abstract function newUpdate(DomainObject $obj);

    protected function buildStatement($table, array $fields, array $conditions =null){
        $terms = [];
        if(!is_null($conditions)){
            $query = "UPDATE{$table} SET ";
            $query .= implode(" =? ,", array_keys($fields))." =?";

            $terms = array_values($fields);
            $cond = array();
            $query .= " WHERE ";

            foreach ($conditions as $key=>$val){
                $cond[] = "$key =?";
                $terms[] = $val;
             }
             $query.= implode(" AND ", $cond);
        }else{
            $query = "INSERT INTO {$table} (";
            $query .= implode(",", array_keys($fields));
            $query .=") VALUES (";
            $qs = [];
            foreach ($fields as $name => $value){
                $terms[] = $value;
                $qs[] = '?';
            }
            $query .= implode(",", $qs);
            $query .= ")";
        }
        return array($query , $terms);
    }
}

class VenueUpdateFactory extends UpdateFactory{
    function newUpdate(DomainObject $obj)
    {
        // TODO: Implement newUpdate() method.
        $id = $obj->getId();
        $cond = null;
        $values['name'] = $obj->getName();
        if($id >1){
            $cond['id'] = $id;
        }
        return $this->buildStatement("venue", $values, $cond);
    }
}