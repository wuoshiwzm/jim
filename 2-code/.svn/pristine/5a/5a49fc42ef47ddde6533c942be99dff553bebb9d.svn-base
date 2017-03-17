<?php

/**
 * Class ProductController
 * 后台工作台控制器
 */
class IndexController extends CommonController
{

    protected $layout = 'layouts.admin_main';
    public function __construct()
    {
        parent::__construct();
    }

    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

    /**
     *  首页 base
     */
    public function  getIndex()
    {
       $this->view('layouts.admin_index');
    }

    /**
     * @return mixed
     * 右侧主页
     */
    public function getMain()
    {
        return View::make('admin.index.index');
    }
}