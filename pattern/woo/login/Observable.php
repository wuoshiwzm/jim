<?php
namespace woo\login;
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/28
 * Time: 12:01
 */
interface Observable
{
    function attach(Observer $observer);

    function detach(Observer $observer);

    function notify();
}

interface Observer{
    function update(Observable $observable);
}

