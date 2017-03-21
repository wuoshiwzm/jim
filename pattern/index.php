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

require_once ('woo/mapper/IdentityObject.php');

$idobj = new \woo\mapper\EventIdentityObject();

$idobj->field('name')
    ->eq("the good show")
    ->field('start')->gt(time())
    ->lt(time() + (24*60*60));

var_dump($idobj);
die('sdf');
