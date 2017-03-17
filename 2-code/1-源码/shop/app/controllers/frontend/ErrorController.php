<?php

/**
 *  首页控制器
 */
class ErrorController extends \BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  302
     */
    public function Index()
    {
        return $this->view('frontend.public.error');
    }
}