<?php
require_once ('Test.php');
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/4/12
 * Time: 15:12
 */

class Warning extends Test2 {

    public function index()
    {

        $this->test2();

        $test1 = new Test();
        $test1->test();
//        echo 'warning2';
    }


}