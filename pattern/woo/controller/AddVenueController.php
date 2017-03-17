<?php
namespace woo\controller;

require_once ('PageController.php');
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/20
 * Time: 11:35
 */


class AddVenueController extends PageController {
    function process()
    {
        try{
            $request = $this->getRequest();
            $name = $request->getProperty('venue_name');
            if(is_null($request->getProperty('submitted'))){
                $request->addFeedback('Choose a name for the venue');
                $this->forward('add_venue.php');
                die('forward');
            }else if(is_null($name)){
                $venue = new \woo\domain\Venue(null,$name);
                $this->forward('add_venue.php');

                //创建对象便可将它添加到数据库
                $venue = new \woo\domain\Venue(null,$name);
                die('list');
                $this->forward("ListVenues.php");

            }
        }catch(\Exception $e){
            die('exception');
            $this->forward('error.php');
        }
    }

}

