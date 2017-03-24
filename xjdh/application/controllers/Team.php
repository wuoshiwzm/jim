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
        $bcObj->title = '审核工程';
        $bcObj->url = site_url("check");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程 - 施工队管理';
        $bcObj->url = site_url("team");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        $dbObj = $this->load->database('default', TRUE);
        //搜索
        //时间
        $dateRange = $this->input->get('dateRange');
        $data['dateRange'] = $dateRange;
        $data['subs'] = $dbObj->group_by('substation_id')
            ->get('check_team')
            ->result();
        //局站
        $subSearch = $this->input->get('subSearch');
        $data['subSearch'] = $subSearch;


        if (!empty($dateRange)) {
            $dateRangeArr = explode('至', $dateRange);
            $dbObj->where('created_at <=', $dateRangeArr[1]);
            $dbObj->where('created_at >=', $dateRangeArr[0]);
        }

        if (!empty($subSearch)) {
            $dbObj->where('substation_id', $subSearch);
        }



        $data['teams'] = $dbObj->get('check_team')->result();
        //调取视图
        $scriptExtra = '';
        $scriptExtra .= '<script src="/public/layer/layer.js"></script>';
        $scriptExtra .= '<script src="/public/js/check/approve.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/tiny_mce/tinymce.min.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/jquery.validate.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/validate-extend.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/highcharts/highcharts.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/highcharts/modules/exporting.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/jstree/jstree.min.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/bootbox.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/moment.min.js"></script>';
        $scriptExtra .= '<link rel="stylesheet" href="/public/css/daterangepicker-bs2.css"/>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/daterangepicker.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/powermeter_history.js"></script>';
        $scriptExtra .= '<link rel="stylesheet" href="/public/css/combo.select.css"/>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/jqthumb.js"></script>';



        $content = $this->load->view('check/team', $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '人员管理', $data);
    }


}