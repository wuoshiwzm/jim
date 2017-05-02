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
        $dbObj = $this->load->database('default', TRUE);

        //存入预算设备信息
        $userID = $this->userObj->id;

        //判断地点类型type 1:机房 2:局站 3:区域 4:城市 5:全缰
        //和对应的locationID
        if(!t::arrayEmpty($post)){
            if(empty($post['selCity'])){
                //城市为空
                $type = 5;
                $locationID= 999999;

            }else if(empty($post['selCounty'])){
                //区域为空
                $type = 4;
                $locationID = $post['selCity'];
            }else if(empty($post['selSubstation'])){
                //局站为空
                $type = 3;
                $locationID = $post['selCity'];
            }else if(empty($post['selRoom'])){
                //机房为空
                $type = 2;
                $locationID = $post['selSubstation'];
            }else if(!empty($post['selRoom'])){
                //有机房信息
                $type = 1;
                $locationID = $post['selRoom'];
            }

            //生成预算数组的JSON字符串
            $budget = [];
            //0点的预算为0
            $budget[0]= 0;


            //存入数据库
           $dbObj->set('type',$type)->set('location_id',$locationID)->set('user_id',$userID);

        };


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


        $content = $this->load->view("budget/index", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '预算管理', $data);
    }
}



