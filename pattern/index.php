<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/20
 * Time: 9:23
 */
use woo\mapper\VenueMapper;
use woo\domain\Venue;

//require_once ("woo/domain/Venue.php");
require_once ('woo/base/Registry.php');
require_once ('woo/base/Request.php');
require_once ('woo/controller/AddVenueController.php');
require_once ('woo/mapper/Collection.php');

require_once ('woo/mapper/VenueMapper.php');
require_once ('woo/mapper/Mapper.php');

require_once ('woo/domain/HelperFactory.php');

$i = 'test';

class t{
    public $p = 'test2';
}
//\woo\base\ApplicationRegistry::setDSN('mysql:host=localhost;dbname=pattern');
//\woo\base\ApplicationRegistry::setDSN('mysql:username=root');
//$mapper = new VenueMapper();
//$venue = $mapper->find(12);
//
//$venue = new Venue();
//$venue->setName('test leon');
//$mapper->insert($venue);
//$venue = $mapper->find($venue->getId());
//print_r($venue);
//$venue->setName("The Bibble Beer");
//$mapper->update($venue);


class myIterator implements Iterator {
    private $position;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct() {
        $this->position = 0;
    }

    //指向表的开头
    function rewind() {

        var_dump(__METHOD__);
        $this->position = 0;
    }

    //指向表的当前指针处元素
    function current() {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    function key() {
        var_dump(__METHOD__);
        return $this->position;
    }

    function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }

    function valid() {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
}

$collection =\woo\domain\HelperFactory::getCollection('woo\domain\Venue');
$collection->add( new \woo\domain\Venue(null,'Loud and Thumping'));
$collection->add( new \woo\domain\Venue(null,'Loud and Thumpin2g'));
//var_dump($collection);

foreach ($collection as $a){
//    var_dump($a);
    print $a->getName();
}

