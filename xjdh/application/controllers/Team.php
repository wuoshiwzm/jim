<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/27
 * Time: 9:52
 */
require_once "CommonController.php";

class Team extends CommonController
{
    private $userObj;

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();

        $bcObj = new Breadcrumb();
        $bcObj->title = '施工队管理';
        $bcObj->url = site_url("check");

        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);


        $dbObj = $this->load->database('default', TRUE);
        $data['teams'] = $dbObj->get('check_team')->result();
        //调取视图
        $scriptExtra = '';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/bootbox.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/team.js"></script>';
        $content = $this->load->view('check/team', $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '人员管理', $data);
    }


}