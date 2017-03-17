<?php
class CommonController extends \Controller
{
    static protected  $adminPage;
    static protected  $memberPage;
    //定义主模板
    protected $layout = 'layouts.admin_right';
    public function __construct()
    {
        self::$adminPage = Config::get('tools.adminPage');
        self::$memberPage = Config::get('tools. memberPage');
    }

    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

    public function view($path, $data = [])
    {
        $this->layout->content = View::make( $path, $data );
    }
}
