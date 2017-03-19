<?php
namespace woo\mapper;


use woo\domain\Venue;

abstract class DomainObjectFactory{
    abstract function createObject(array $array);
}

class VenueObjectFactory extends DomainObjectFactory{

    function createObject(array $array)
    {
        // TODO: Implement createObject() method.
        $obj = new Venue($array['id']);
        $obj->setName($array['name']);
        return $obj;
    }
    
}