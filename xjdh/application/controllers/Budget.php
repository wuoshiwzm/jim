<?php

/**
 * 能耗预算
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/4/11
 * Time: 16:11
 */
class Budget extends CI_Controller {

    private $userObj;

    public function __construct()
    {
        parent::__construct();
        if (!User::IsAuthenticated()) {
            redirect('/login');
        } else {
            $this->userObj = User::GetCurrentUser();
            User::Set_UserWebOnline($this->userObj->id);
        }
    }

    public function index()
    {

        $scriptExtra = '';

        //录入预算边界
        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();
        $bcObj = new Breadcrumb();

        $bcObj->title = '预算管理';
        $bcObj->url = site_url("budget");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        $dbObj = $this->load->database('default', TRUE);

        $content = $this->load->view("portal/budget/index", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '预算管理', $data);
    }
}



