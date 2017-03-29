<?php

/**
 * Class CheckController
 * 审核模块页面控制器
 */
class Check extends CI_Controller
{

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

    /**
     * 跳转控制
     */
    public function index()
    {

        $this->arrange();
    }

    /**
     * 用户界面 -- 工艺
     */
    private function Check()
    {
        $check_role = $this->userObj->check_role;
        $data['check_role'] = $check_role;

        $scriptExtra = '<script src="/public/layer/layer.js"></script>';
        $scriptExtra .= '<script src="/public/js/check/approve.js"></script>';

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();
        $bcObj = new Breadcrumb();

        //public function allowRole($type, $roleAllow = null, $roleApply = null)
        //check_role:1:一级审核 2:二级审核 3:查看，只能看，不能操作
        if (Author::allowRole(4, 1, $check_role)) {
            $bcObj->title = '审核工程 - 一级审核';
            $bcObj->url = site_url("check/check");
            $bcObj->isLast = true;
            array_push($data['bcList'], $bcObj);
            $data['applys'] = $this->getApplyInfo(1);

            $content = $this->load->view("check/first_check", $data, TRUE);
            $this->mp_master->Show_Portal($content, $scriptExtra, '一级审核', $data);
        }

        if (Author::allowRole(4, 2, $check_role)) {
            $bcObj->title = '审核工程 - 二级审核';
            $bcObj->url = site_url("check/check");
            $bcObj->isLast = true;
            array_push($data['bcList'], $bcObj);
            $data['applys'] = $this->getApplyInfo(2);

            $content = $this->load->view("check/first_check", $data, TRUE);
            $this->mp_master->Show_Portal($content, $scriptExtra, '二级审核', $data);
        }

        if (Author::allowRole(4, 3, $check_role)) {
            $bcObj->title = '审核工程 - 总揽';
            $bcObj->url = site_url("check/check");
            $bcObj->isLast = true;
            array_push($data['bcList'], $bcObj);
            $data['applys'] = $this->getApplyInfo(3);

            $content = $this->load->view("check/all_check", $data, TRUE);
            $this->mp_master->Show_Portal($content, $scriptExtra, '二级审核', $data);
        }

    }

    /**
     * @param $apply_id
     * 跳转到审核页面 -- 工艺
     */
    public function approveSub($subID)
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
        $bcObj->title = '审核工程 - 工艺审核';
        $bcObj->url = site_url("check");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('substation_id', $subID);
        $res = $dbObj->get('check_apply')->row();

        $dbObj->where('substation_id', $subID);
        $data['arrange'] = $dbObj->get('check_arrange')->row();

        //无任何信息
        if (is_null($res)) {
            $data['cases'] = [];
        } else {
            //获取审核问题内容
            $contents = json_decode($res->content, true);
            ksort($contents);
            $data['cases'] = [];

            foreach ($contents as $key => $content) {

                $dbObj = $this->load->database('default', TRUE);
                $dbObj->where('id', $key);
                $res = $dbObj->get('check_question')->row();
                $case['question'] = $res;
                $case['answer'] = $content;
                $data['cases'][] = $case;
            }
        }

        $data['info'] = $this->getInfo($subID);
        $scriptExtra = '';

        $scriptExtra .= '<link rel="stylesheet" href="/public/css/easydialog.css"/>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/station_image_manage.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/easydialog.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/substation.js"></script>';

        $scriptExtra .= '<link rel="stylesheet" href="/public/css/minimalist.css"/>';
        $scriptExtra .= '<link rel="stylesheet" href="/public/css/jquery.fancybox.css"/>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/flowplayer.min.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/flowplayer.hlsjs.min.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/jquery.fancybox.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/player.js"></script>';

        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/jqthumb.js"></script>';
//        $scriptExtra = '<script src="/public/layer/layer.js"></script>';
//        $scriptExtra .= '<script src="/public/js/check/approve.js"></script>';
        $content = $this->load->view("check/approveSub", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '审核', $data);
    }


    /**
     * @param $apply_id
     * 跳转到审核页面 -- 设备
     */
    public function approveDev($subID)
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
        $bcObj->title = '审核工程 - 设备审核';
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('substation_id', $subID);
        $res = $dbObj->get('check_device')->result();

        $data['cases'] = [];
        //无任何信息
        if (is_null($res)) {
            $data['cases'] = [];
        } else {
            //data_id data_pics room_idx

            foreach ($res as $r) {
                //获取设备验收内容
                $contents = json_decode($r->content);
                foreach ($contents as $key => $content) {
                    array_push($data['cases'], [
                        'data_id' => $key,
                        'data_name' => $this->mp_extra->get_device_type_name($key),
                        'data_pics' => $content,
                        'room_id' => $r->room_id,
                        'room_name' => $this->mp_xjdh->Get_room_name($r->room_id)->name,
                    ]);
                }
            }

        }


        $dbObj->where('substation_id', $subID);
        $data['arrange'] = $dbObj->get('check_arrange')->row();

        $data['info'] = $this->getInfo($subID);
        $scriptExtra = '';

        $scriptExtra .= '<link rel="stylesheet" href="/public/css/easydialog.css"/>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/station_image_manage.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/easydialog.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/substation.js"></script>';

        $scriptExtra .= '<link rel="stylesheet" href="/public/css/minimalist.css"/>';
        $scriptExtra .= '<link rel="stylesheet" href="/public/css/jquery.fancybox.css"/>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/flowplayer.min.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/flowplayer.hlsjs.min.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/jquery.fancybox.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/player.js"></script>';

        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/jqthumb.js"></script>';
//        $scriptExtra = '<script src="/public/layer/layer.js"></script>';
//        $scriptExtra .= '<script src="/public/js/check/approve.js"></script>';
        $content = $this->load->view("check/approveDev", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '审核', $data);
    }

    /**
     * @param $apply_id '
     * 审核通过某个提交的审核
     */
    public function approveCase($subID)
    {

        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('substation_id', $subID);
        $apply = $dbObj->get('check_arrange')->row();

        //是否已经确认提交还是编辑中
        if (!$apply->is_apply) {
            die('该审核信息还在编辑中');
            return;
        }
        //判断是否已经完成审核
        if ($apply->check_tel) {
            die('该审核信息已经成功审核完成');
            return;
        }
        //一级审核未进行，则进行一级审核
        if (!$apply->check_jim) {

            $dbObj->where('substation_id', $subID);
            $dbObj->update('check_arrange', ['check_jim' => 1]);
            redirect('/check');
            return;
        }
        //二级审核
        $dbObj->where('substation_id', $subID);
        $dbObj->update('check_arrange', ['check_tel' => 1]);
        redirect('/check');
        return;
    }

    /**
     * @param $apply_id '
     * 审核不通过某个提交的审核
     */
    public function unapproveCase()
    {
        $dbObj = $this->load->database('default', TRUE);
        $subID = $this->input->post('subsID');
        $suggest = $this->input->post('suggestion');
        $dbObj->where('substation_id', $subID);
        $apply = $dbObj->get('check_arrange')->row();


        //是否已经确认提交还是编辑中
        if (!$apply->is_apply) {
            die('该审核信息还在编辑中');
        }

        //所有审核归零
        $dbObj->where('substation_id', $subID);
        $dbObj->update('check_arrange', ['check_jim' => 0, 'check_tel' => 0, 'is_apply' => 1, 'suggestion' => $suggest]);
        redirect('/check/arrange');
        return;
    }

    /**
     * @param $type 1:新建审核提交 2:打开已有审核
     */
    public function getQuestions($type = null)
    {
        //新建审核，返回新建表的问题信息
        if (is_null($type)) {
            $dbObj = $this->load->database('default', TRUE);
            $res = $dbObj->get('check_question')->result();
            return json_encode($res);
        }

        //已经提交过的审核， 返回

    }


    /**
     * @param $class 1:一级审核 2:二级审核
     * @return mixed
     * 工艺验收 - 获取审核的内容与城市用户关联的表
     */
    private function getApplyInfo($class)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->from('check_apply');
        $dbObj->join('user', 'check_apply.user_id = user.id');
        $dbObj->join('substation', 'check_apply.substation_id = substation.id');
        $dbObj->where('is_apply', 1);
        //一级审核
        if ($class == 1) {
            $dbObj->where('check_jim !=', 1);
        }
        //二级审核
        if ($class == 2) {
            $dbObj->where('check_tel !=', 1);
            $dbObj->where('check_jim', 1);
        }
        //所有审核信息
        if ($class == 3) {
            //$dbObj->where('check_tel !=', 1);
            $dbObj->where('check_jim', 1);
        }

        $dbObj->select(
            '
            user.username as username,
            user.full_name as name,
            check_apply.*,check_apply.id as check_id,
            substation.city as subs_city,
            substation.county as subs_county,
            substation.name as subs_name,
            '
        );
        return $dbObj->get()->result();
    }


    /**
     * @param $class 1:一级审核 2:二级审核
     * @return mixed
     * 设备验收 - 获取审核的内容与城市用户关联的表
     */
    private function getCheckInfo($class)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->from('check_device');
        $dbObj->join('user', 'check_apply.user_id = user.id');
        $dbObj->join('substation', 'check_apply.substation_id = substation.id');
        $dbObj->where('is_apply', 1);
        //一级审核
        if ($class == 1) {
            $dbObj->where('check_jim !=', 1);
        }
        //二级审核
        if ($class == 2) {
            $dbObj->where('check_tel !=', 1);
            $dbObj->where('check_jim', 1);
        }
        //所有审核信息
        if ($class == 3) {
            //$dbObj->where('check_tel !=', 1);
            $dbObj->where('check_jim', 1);
        }

        $dbObj->select(
            '
            user.username as username,
            user.full_name as name,
            check_device.*,check_device.id as check_id,
            substation.city as subs_city,
            substation.county as subs_county,
            substation.name as subs_name,
            '
        );
        return $dbObj->get()->result();
    }


    /**
     * @return mixed
     * 获取当前内容与城市用户关联的表
     */
    private function getInfo($subID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->from('check_arrange');
        $dbObj->join('user', 'check_arrange.user_id = user.id');
        $dbObj->join('substation', 'check_arrange.substation_id = substation.id');
        $dbObj->where('check_arrange.substation_id', $subID);

        $dbObj->select(
            '
            user.username as username,
            user.full_name as name,
            check_arrange.*,check_arrange.id as check_id,
            substation.city as subs_city,
            substation.county as subs_county,
            substation.name as subs_name,
            substation.id as substation_id,
            '
        );
        return $dbObj->get()->row();
    }

    /*---------------------------------------------------*/
    /*                  督导安排模块                      */
    /*---------------------------------------------------*/
    /**
     * 安排督导检测的页面
     */
    public function arrange()
    {
        $check_role = $this->userObj->check_role;
        //未提交问题的局站：
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
        //初始化
        $scriptExtra .= '<script src="/public/js/check/arrange.js"></script>';

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();
        $bcObj = new Breadcrumb();

        //权限判断与显示
        if (Author::allowRole(5, [3, 4, 2], $check_role)) {
            //获取督导的数据
            $bcObj->title = '审核工程 - 安排督导';
            $bcObj->url = site_url("check/arrange");
            $bcObj->isLast = true;
            array_push($data['bcList'], $bcObj);

            $dbObj = $this->load->database('default', TRUE);

            //未提交
            $emptyCheck = [];
            //已经提交了内容的局站ID
            $testArr = [];
            $res = $dbObj->get('check_apply')->result();
            foreach ($res as $k) {
                $testArr[] = $k->substation_id;
            }
            $res = $dbObj->get('check_device')->result();
            foreach ($res as $k) {
                $testArr[] = $k->substation_id;
            }

            $dbObj->where_not_in('substation_id', $testArr);
            $res = $dbObj->get('check_arrange')->result();

            foreach ($res as $k) {
                $emptyCheck[] = $k->substation_id;
            }

            //搜索
            //验收状态
            $checkStatus = $this->input->get('checkStatus');
            $data['checkStatus'] = $checkStatus;
            //吉姆督导验收时间
            $dateRangeApply = $this->input->get('dateRangeApply');
            $data['dateRangeApply'] = $dateRangeApply;
            //吉姆督查分配时间
            $dateRangeArrange = $this->input->get('dateRangeArrange');
            $data['dateRangeArrange'] = $dateRangeArrange;
            //吉姆督查审核时间
            $dateRangeJimApprove = $this->input->get('dateRangeJimApprove');
            $data['dateRangeJimApprove'] = $dateRangeJimApprove;
            //电信督查审核时间
            $dateRangeTelApprove = $this->input->get('dateRangeTelApprove');
            $data['dateRangeTelApprove'] = $dateRangeTelApprove;

            //获取现有的安排信息的数据
            //验收状态
            //1' >  已经分配
            //2' >  待验中
            //3' >  待验完成 - 提交
            //4' > 吉姆督查核查完成
            //5' > 电信督查核查完成
            if (!empty($checkStatus)) {
                switch ($checkStatus) {
                    case 1:
                        $dbObj->where('is_apply !=', 1);
                        $dbObj->where_in('substation_id', $emptyCheck);
                        break;
                    case 2:
                        $dbObj->where('is_apply !=', 1);
                        $dbObj->where_not_in('substation_id', $emptyCheck);
                        break;
                    case 3:
                        $dbObj->where('is_apply', 1);
                        $dbObj->where('check_jim !=', 1);
                        $dbObj->where('check_tel !=', 1);
                        break;
                    case 4:
                        $dbObj->where('check_jim', 1);
                        $dbObj->where('check_tel !=', 1);
                        break;
                    case 5:
                        $dbObj->where('check_tel', 1);
                        break;
                }
            }
            //吉姆督导验收时间
            if (!empty($dateRangeApply)) {
                $dateRangeArr = explode('至', $dateRangeApply);
                $dbObj->where('apply_time <=', $dateRangeArr[1]);
                $dbObj->where('apply_time >=', $dateRangeArr[0]);
            }
            //吉姆督查分配时间
            if (!empty($dateRangeArrange)) {
                $dateRangeArr = explode('至', $dateRangeArrange);
                $dbObj->where('arrange_time <=', $dateRangeArr[1]);
                $dbObj->where('arrange_time >=', $dateRangeArr[0]);
            }
            //吉姆督查审核时间
            if (!empty($dateRangeJimApprove)) {
                $dateRangeArr = explode('至', $dateRangeApply);
                $dbObj->where('check_jim_time <=', $dateRangeArr[1]);
                $dbObj->where('check_jim_time >=', $dateRangeArr[0]);
            }
            //电信督查审核时间
            if (!empty($dateRangeTelApprove)) {
                $dateRangeArr = explode('至', $dateRangeApply);
                $dbObj->where('check_tel_time <=', $dateRangeArr[1]);
                $dbObj->where('check_tel_time >=', $dateRangeArr[0]);
            }

            $arrangeSubs = [];
            $res = $dbObj->select('substation_id')
                ->get('check_arrange')
                ->result();
            foreach ($res as $r) {
                $arrangeSubs[] = $r->substation_id;
            }

            $dbObj->order_by('arrange_time', 'DESC');
            $data['arranges'] = $dbObj->get('check_arrange')->result();
            $data['subs'] = $dbObj->where_not_in('id', $arrangeSubs)->get('substation')->result();
            $dbObj->where('check_role', 1);
            $data['users'] = $dbObj->get('user')->result();
            $data['allUsers'] = $dbObj->get('user')->result();
            $data['checkRole'] = $check_role;

            $content = $this->load->view("check/arrange", $data, TRUE);
            $this->mp_master->Show_Portal($content, $scriptExtra, '安排督导', $data);
        }

        //提交结果 - 安排督导验收任务
        $userID = $this->input->get('user');
        $subID = $this->input->get('sub');
        if (($userID != 0) && ($subID != 0)) {

            //过滤掉已经存在的安排 某局站已经安排过， 不能再安排了
            $dbObj->where('substation_id', $subID);
            $res = $dbObj->get('check_arrange')->result();

            if (count($res) > 0) {
                //已经生成过此安排了，不能再生成
                redirect('check/arrange');
            }

            $substation = $this->mp_xjdh->Get_Substations(FALSE, FALSE, FALSE, FALSE, $subID);
            $subName = $substation[0]->name;

            $userInfo = User::GetUserById($userID);
            $userName = $userInfo->full_name;
            $time = date('Y-m-d H:i:s', time());

            //写入数据库
            $dbObj->set('user_id', $userID);
            $dbObj->set('user_name', $userName);
            $dbObj->set('substation_id', $subID);
            $dbObj->set('substation_name', $subName);

            $dbObj->set('arrange_time', $time);
            $dbObj->insert('check_arrange');

            redirect('check/arrange');
        }


        //提交结果 - 安排督导角色
        $roleUser = $this->input->get('roleUser');
        $role = $this->input->get('role');
        if (($roleUser != 0) && ($role != 0)) {
            $dbObj->where('id', $roleUser);
            $dbObj->set('check_role', $role);
            $dbObj->update('user');
            redirect('check/arrange');
        }


    }

    /**
     * @param $arrangeID
     * 编辑验收安排
     */
    public function editArrange($arrangeID)
    {

        $dbObj = $this->load->database('default', TRUE);

        //更新信息
        $userID = $this->input->get('user');
        $subID = $this->input->get('sub');

        if (($userID != 0) && ($subID != 0)) {
            $dbObj->where('id', $arrangeID);
            $dbObj->set('user_id', $userID);
            $dbObj->set('substation_id', $subID);
            $dbObj->set('arrange_time', date('Y-m-d H:i:s'));
            $dbObj->update('check_arrange');
        }

        //getArrange($arrangeID=NULL,$userID=NULL,$substationID=NULL,$status=NULL);
        $arrange = $this->mp_extra->getArrangeByID($arrangeID);
        $data['arrange'] = $arrange;
        $data['subs'] = $dbObj->get('substation')->result();

        $data['users'] = $dbObj->where('check_role', 1)->get('user')->result();

        $scriptExtra = '<script src="/public/layer/layer.js"></script>';
        $scriptExtra .= '<script src="/public/js/check/approve.js"></script>';
        $content = $this->load->view("check/edit_arrange", $data);
        $this->mp_master->Show_Pure($content, $scriptExtra, '编辑', $data);
    }

    /**
     *
     * 问题管理
     *
     */
    public function question()
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
        $bcObj->title = '审核工程 - 问题管理';
        $bcObj->url = site_url("check");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        $dbObj = $this->load->database('default', TRUE);
        $data['question'] = $dbObj->get('check_question')->result();

        $scriptExtra = '';
        $scriptExtra .= '<script src="/public/js/check/approve.js"></script>';

        $content = $this->load->view("check/ques_manage", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '二级审核', $data);
    }

    public function updateQuestion()
    {

        $id = $this->input->post('id');
        $order = $this->input->post('order');
        $content = $this->input->post('content');
        $desc = $this->input->post('desc');

        $dbObj = $dbObj = $this->load->database('default', TRUE);

        if ($id != 'insert') {
            $dbObj->where('id', $id);
            $dbObj->set('order', $order);
            $dbObj->set('content', $content);
            $dbObj->set('desc', $desc);
            $dbObj->update('check_question');
        } else {
            $dbObj->set('order', $order);
            $dbObj->set('content', $content);
            $dbObj->set('desc', $desc);
            $dbObj->insert('check_question');
        }
        echo 'true';
    }

    /**
     *
     * 人员管理
     *
     */
    public function people()
    {

        $dbObj = $this->load->database('default', TRUE);
        $check_role = $this->userObj->check_role;

        if (!Author::allowRole(4, [2, 3, 4], $this->userObj->check_role)) {
            redirect('/check');
        }
        //提交结果 - 安排督导角色
        $roleUser = $this->input->get('roleUser');
        $role = $this->input->get('role');

        if (($roleUser != 0) && ($role != 0)) {
            $dbObj->where('id', $roleUser);
            $dbObj->set('check_role', $role);
            $dbObj->update('user');
            redirect('check/people');
        }

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();
        $bcObj = new Breadcrumb();

        $bcObj->title = '审核工程';
        $bcObj->url = site_url("check");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程 - 人员管理';
        $bcObj->url = site_url("check");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);


        //选择所有的督导和督查，除了管理员除外
        $dbObj->where('check_role !=', '');
        $data['roleusers'] = $dbObj->where('check_role !=', 4)->get('user')->result();


        $scriptExtra = '<script src="/public/layer/layer.js"></script>';
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
        //$scriptExtra .= '<script src="/public/js/jquery.combo.select.js"></script>';
        $scriptExtra .= '<link rel="stylesheet" href="/public/css/combo.select.css"/>';

        $dbObj->order_by('arrange_time', 'DESC');
        $data['arranges'] = $dbObj->get('check_arrange')->result();
        $data['subs'] = $dbObj->get('substation')->result();
        $dbObj->where('check_role', 1);
        $data['users'] = $dbObj->get('user')->result();

        $dbObj->where('check_role is NULL', NULL, TRUE);
        $data['allUsers'] = $dbObj->get('user')->result();
        $data['checkRole'] = $check_role;


        $content = $this->load->view("check/people", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '安排督导', $data);
    }

    public function updateRole()
    {
        $userID = $this->input->post('userID');
        $role = $this->input->post('role');

        $dbObj = $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $userID);
        $dbObj->set('check_role', $role);
        $dbObj->update('user');

        echo 'true';
    }

    /**
     *
     * 督导上传模块
     *
     */

    public function upload()
    {

        if (!Author::allowRole(4, [1, 4], $this->userObj->check_role)) {
            redirect('/check');
        }

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();

        //导航栏
        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程';
        $bcObj->url = site_url("check");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '选择验收单位';
        $bcObj->url = site_url("check/upload");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);


        //工艺
        $applySubArr = [];
        $dbObj = $this->load->database('default', TRUE);

        //没有可以提交的局站
        $where = "user_id =" . $this->userObj->id . " AND(status_check!=1 OR status_device!=1)";
        $availableSub = $dbObj
            ->where($where)
            ->get('check_arrange')
            ->result();
        if (empty($availableSub)) {
            //die('no data waiting for applied!');
        }

        //获取用户的安排局站
        $applySubs = $dbObj->where('user_id', $this->userObj->id)
            ->where('status_check !=', 1)
            ->get('check_arrange')
            ->result();
        foreach ($applySubs as $sub) {
            $applySubArr[] = $sub->substation_id;
        }
        $data['subs'] = $applySubArr;

        //-----------------------------设备验收----------------------------//
        //安排的局站
        $deviceSubs = [];
        $devSubs = $dbObj->where('user_id', $this->userObj->id)
            ->where('status_device !=', 1)
            ->get('check_arrange')
            ->result();
        foreach ($devSubs as $sub) {
            $deviceSubs[] = $sub->substation_id;
        }

        //已经提交了信息的机房信息
        $appliedDevRooms = [];
        $devRooms = $dbObj->where('user_id', $this->userObj->id)
            ->where('is_apply', 1)
            ->get('check_device')
            ->result();
        foreach ($devRooms as $r) {
            $appliedDevRooms[] = $r->room_id;
        }
        //获取可以提交的的机房
        if (empty($deviceSubs)) {
            $data['rooms'] = [];
        } else {
            $dbObj->where_in('substation_id', $deviceSubs);
            if (!empty($appliedDevRooms)) {
                $dbObj->where_not_in('id', $appliedDevRooms);
            }
            $data['rooms'] = $dbObj->get('room')->result();
        }


        $scriptExtra = '';

        $content = $this->load->view("check/upload", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '审核进度', $data);
    }

    //上传工艺审核
    public function upload_apply($subID)
    {
        //权限判断与显示
        if (!Author::allowRole(4, [1, 4], $this->userObj->check_role)) {
            redirect('/check');
        }
        $dbObj = $this->load->database('default', TRUE);

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();

        //导航栏
        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程';
        $bcObj->url = site_url("check");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '提交验收';
        $bcObj->url = site_url("check/upload");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '工艺审核';
        $bcObj->url = site_url("");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        //已经提交过的问题
        $answeredQues = [];


        $answer = $dbObj->where('substation_id', $subID)->get('check_apply')->row()->content;
        $answer = json_decode($answer, true);

        foreach ($answer as $k => $ans) {
            $answeredQues[] = $k;
        }

        if (!empty($answeredQues)) {
            $dbObj->where_not_in('id', $answeredQues);
        }
        $ques = $dbObj->order_by('id')->get('check_question')->result();
        $data['questions'] = $ques;
        $data['subID'] = $subID;
        $scriptExtra = '';
        $scriptExtra .= '<script type="text/javascript" src="/public/layer/layer.js"></script>';

        $content = $this->load->view("check/upload_apply", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '审核进度', $data);
    }

    //上传设备审核
    public function upload_device($roomID)
    {

        //权限判断与显示
        if (!Author::allowRole(4, [1, 4], $this->userObj->check_role)) {
            redirect('/check');
        }
        $dbObj = $this->load->database('default', TRUE);

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();

        //导航栏
        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程';
        $bcObj->url = site_url("check");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '提交验收';
        $bcObj->url = site_url("check/upload");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '设备审核';
        $bcObj->url = site_url("");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);


        $data['questions'] = $this->getDeviceList($roomID);;
        $data['roomID'] = $roomID;

        $scriptExtra = '';
        $scriptExtra .= '<script type="text/javascript" src="/public/layer/layer.js"></script>';
        //var_dump($data['questions']);die;
        $content = $this->load->view("check/upload_device", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '审核进度', $data);
    }

    //获取设备列表
    private function getDeviceList($roomID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('room_id', $roomID);
        $apply = $dbObj->get('check_device')->row_array();

        $questionIDs = [];
        //var_dump(empty($apply));die;
        //审核表里没有对应机房的信息，说明没有提交申请，获取所有设备列表
        if (!empty($apply)) {
            //审核表里有对应机房的信息，说明已经提交了申请，过滤掉已经提交过的，
            $content = json_decode($apply['content']);
            foreach ($content as $key => $c) {
                if ($key == 'ad') {
                    $key = 'enviroment';
                }
                $questionIDs[] = $key;
            }
        }

        $devList = array();
        foreach (Constants::$devConfigList as $devConfig) {
            //返回device-room-substation 关联表
            $dataList = $this->mp_extra->Get_Room_Devs($roomID, $devConfig[0]);
            if (count($dataList) && (!in_array($devConfig[2], $questionIDs) || empty($questionIDs))) {
                $devObj = new stdClass();
                $devObj->type = $devConfig[2];
                $devObj->name = $devConfig[1];
                if ($devConfig[2] == "enviroment") {
//                    $devObj->type = "ad";
                } else if ($devConfig[2] == "smd_device") {
                    foreach ($dataList as $dataObj) {
                        $dataObj->data_id = $dataObj->device_no;
                    }
                } else if ($devConfig[2] == "door") {
                    foreach ($dataList as $dataObj) {
                        $canOpen = false;
                        if ($this->user->user_role == 'admin') {
                            $canOpen = true;
                        } else if (in_array($this->user->user_role, array("city_admin", "operator"))) {
                            if ($dataObj->city_code == $this->user->city_code)
                                $canOpen = true;
                        } else {
                            $duObj = $this->mp_xjdh->Get_DoorUser($dataObj->data_id, $this->user->id);
                            if (count($duObj) && $duObj->remote_control)
                                $canOpen = true;
                        }
                        $dataObj->can_open = $canOpen ? 1 : 0;
                    }
                }
                $devObj->devList = $dataList;
                array_push($devList, $devObj);
            }
        }


        //如果全都已经提交了，就更新状态，返回空值
        return $devList;
    }


    /**
     * @param null $type 1:局站验收 工艺  2：机房验收 设备类型
     * @param null $topicID 对应局站ID 或 机房ID
     * @param null $questionID 问题ID
     * 上传图稿页面
     */
    public function upload_img($typeID = null, $topicID = null, $questionID = null, $success = null)
    {
        $post = $this->input->post();
        //上传图稿
        if (!empty($post)) {
            $typeID = $post['typeID'];
            $topicID = $post['topicID'];
            $questionID = $post['questionID'];

            $pics = $post['pics'];
            if(empty($pics)){
                $pics = ['null.jpg'];
            }
            $dbObj = $this->load->database('default', TRUE);

            //工艺验收
            if ($typeID == 1) {
                $tableName = 'check_apply';
            }

            //设备验收
            if ($typeID == 2) {
                $tableName = 'check_device';
            }

            if ($typeID == 1) {
                $dbObj->where('substation_id', $topicID);
            }
            if ($typeID == 2) {
                $dbObj->where('room_id', $topicID);
            }
            $res = $dbObj->get($tableName)->row_array();

            //如果已经提交了审核，则不能提交
            if ($res['is_apply'] == 1) {
                echo "已经提交过，不能重复提交！";
                return;
            }

            //判断是否第一次上传，第一次上传新建一条check_apply数据
            if (empty($res)) {
                if ($typeID == 2) {
                    $dbObj->set('room_id', $topicID);
                    $dbObj->set('substation_id',
                        $this->mp_extra->getSubstationByRoom($topicID)->substation_id);
                } elseif ($typeID == 1) {
                    $dbObj->set('substation_id', $topicID);
                }

                $dbObj->set('user_id', $this->userObj->id);
                if ($questionID == 'ad') {
                    $questionID = 'enviroment';
                }

                $dbObj->set('content', json_encode([
                    $questionID => $pics,
                ]));
                $dbObj->insert($tableName);
            } else {
                //如果不是第一次上传，就找到对应的信息， 在content字段追加数据
                $applyContent = json_decode($res['content'], true);
                if(isset($applyContent[$questionID])){
                    $applyContent[$questionID] =  $pics;
                }else{
                    $applyContent[$questionID] =  $pics;
                }

                //工艺施工
                if ($typeID == 1) {
                    $dbObj->where('substation_id', $topicID);
                    $dbObj->set('content', json_encode($applyContent));
                    $dbObj->update('check_apply');
                } //设备施工
                elseif ($typeID == 2) {
                    $dbObj->where('room_id', $topicID);
                    $dbObj->set('content', json_encode($applyContent));
                    $dbObj->update('check_device');
                }
            }

            //更新对应apply状态

            $writable = $this->updateCheckAppply($typeID, $topicID);

            if ($writable) {
                echo "成功";
            };
            $success = 1;
            redirect('/check/upload_img/' . $typeID . '/' . $topicID . '/' . $questionID . '/' . $success);
        }

        //页面跳转
        $data['typeID'] = $typeID;
        $data['topicID'] = $topicID;
        $data['questionID'] = $questionID;
        $data['success'] = $success;
        //echo " typeID: ".$typeID . " topicID: " . $topicID . " questionID " . $questionID." success: ".$success;

        $this->load->view("img_upload/img_upload", $data);
    }

    /**
     * 则更新对应的check_apply表的is_apply字段 和 check_arrange 字段
     */
    private function updateCheckAppply($typeID, $id)
    {
        //施工工艺验收
        if ($typeID == 1) {
            $tableName = 'check_apply';
            $search = 'substation_id';
        }
        //设备验收
        if ($typeID == 2) {
            $tableName = 'check_device';
            $search = 'room_id';
        }
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where($search, $id);
        $applyInfo = $dbObj->get($tableName)->row();
        $content = json_decode($applyInfo->content);

        //判断是否已经完成提交
        //已经提交的问题id
        $questionIDs = [];
        foreach ($content as $key => $c) {
            $questionIDs[] = $key;
        }

        $questionAvailable = [];
        //工艺施工
        if ($typeID == 1) {

            $dbObj->where_not_in('id', $questionIDs);
            $questionAvailable = $dbObj->get('check_question')->result_array();
            //更新arrange表
            if (empty($questionAvailable)) {
                $dbObj->where('substation_id', $id);
                $dbObj->set('status_check', 1);
                $dbObj->update('check_arrange');

                //更新check_arrange表的is_apply字段
                $dbObj->where('status_device', 1);
                $dbObj->where('status_check', 1);
                $dbObj->set('is_apply', 1);
                $dbObj->update('check_arrange');
            }
        } //设备验收
        elseif ($typeID == 2) {

            //获取设备类型对应的model数组
            $model = [];
            foreach ($questionIDs as &$qid) {
                foreach (Constants::$devConfigList as $devConfig) {
                    if ($qid == $devConfig[2]) {
                        $model = array_merge($model, $devConfig[0]);
                        break;
                    }
                }
            }
            //获取还没有提交的设备数组
            $dbObj->where('room_id', $id)
                ->where_not_in('model', $model)
                ->where_not_in('model', ['motivator', 'venv'])
                ->where('active', 1);
            $questionAvailable = $dbObj->get('device')->row_array();
        }

        //更新is_apply 字段为1
        if (empty($questionAvailable)) {
            //更新is_apply状态
            if ($typeID == 1) {
                $dbObj->where('substation_id', $id);
            } elseif ($typeID == 2) {
                $dbObj->where('room_id', $id);
            }
            $dbObj->set('is_apply', 1);
            $dbObj->update($tableName);

            //更新check_arrange表
            if ($typeID == 1) {
                $subID = $id;
            } elseif ($typeID == 2) {

                $dbObj->where('id', $id);
                $subID = $room = $dbObj->get('room')->row()->substation_id;
            }
            $this->updateStatusDevice($subID);
        }

        return true;
    }

    /**
     * @param $subID局站ID
     * 更新局站对应的status_device属性
     */
    private function updateStatusDevice($subID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $rarr = [];

        //获取局站所有机房
        $dbObj->where('substation_id', $subID);
        $rids = $dbObj->get('room')->result();
        //机房id数组
        foreach ($rids as $rid) {
            $rarr[] = $rid->id;
        }

        //还有机房没有提交任何信息
        $roomApplied = [];
//        $dbObj->where_not_in('room_id', $rarr);
        $dbObj->where('substation_id', $subID)
            ->where('is_apply !=', 1);
        $res1 = $dbObj->get('check_device')->result();
        $result = TRUE;
        if (!empty($res1)) {
            foreach ($res1 as $re1) {
                $roomApplied[] = $re1->room_id;
            }
        }
        foreach ($rarr as $room) {
            if (!in_array($room->id, $roomApplied)) {
                $result = FALSE;
                break;
            }
        }


        //没有机房还没提交
        if (!$result) {
            //更新status_device
            $dbObj->set('status_device', 1);
            $dbObj->where('substation_id', $subID);
            $dbObj->update('check_arrange');
        }

        //更新check_arrange表的is_apply字段
        $dbObj->where('status_device', 1);
        $dbObj->where('status_check', 1);
        $dbObj->set('is_apply', 1);
        $dbObj->update('check_arrange');

        return true;
    }

    /**
     *
     * 督导修改模块
     *
     */
    /*
     * 修改总页面
     */
    public function editUpload()
    {
        if (!Author::allowRole(4, [1, 4], $this->userObj->check_role)) {
            redirect('/check');
        }

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();

        //导航栏
        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程';
        $bcObj->url = site_url("check");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '修改验收信息';
        $bcObj->url = site_url("check/editUpload");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        //工艺
        $dbObj = $this->load->database('default', TRUE);

        $subs = $dbObj->where('user_id', $this->userObj->id)
            ->where('is_apply !=', 1)
            ->get('check_apply')
            ->result();

        //设备
        $rooms = $dbObj->where('user_id', $this->userObj->id)
            ->where('is_apply !=', 1)
            ->get('check_device')
            ->result();

        $data['subs'] = $subs;
        $data['rooms'] = $rooms;

        $scriptExtra = '';

        $content = $this->load->view("check/edit_upload", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '审核进度', $data);

    }

    /**
     * @param $subID 修改工艺审核
     */
    public function editApply($subID)
    {
        //权限判断与显示
        if (!Author::allowRole(4, [1, 4], $this->userObj->check_role)) {
            redirect('/check');
        }
        $dbObj = $this->load->database('default', TRUE);

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();

        //导航栏
        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程';
        $bcObj->url = site_url("check");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '修改验收';
        $bcObj->url = site_url("check/editUpload");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '修改工艺审核';
        $bcObj->url = site_url("");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        //已经回答的问题的id数组
        $answeredQues = [];
        $answer = $dbObj->where('substation_id', $subID)
            ->get('check_apply')
            ->row()
            ->content;
        $answer = json_decode($answer, true);
        ksort($answer);
        foreach ($answer as $k => $ans) {
            $answeredQues[] = $k;
        }
        ksort($answer);
        if (!empty($answeredQues)) {
            $data['questions'] = $answer;
        }else{
            $data['questions'] = NULL;
        }

        $data['subID'] = $subID;

        $scriptExtra = '';
        $scriptExtra .= '<script type="text/javascript" src="/public/layer/layer.js"></script>';

        $scriptExtra .= '<link rel="stylesheet" href="/public/css/jquery.fancybox.css"/>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/jquery.fancybox.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/player.js"></script>';

        $content = $this->load->view("check/edit_apply", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '审核修改', $data);
    }

    /**
     * @param $roomID
     * 修改设备审核
     */
    public function editDevice($roomID){
        //权限判断与显示
        if (!Author::allowRole(4, [1, 4], $this->userObj->check_role)) {
            redirect('/check');
        }
        $dbObj = $this->load->database('default', TRUE);

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();

        //导航栏
        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程';
        $bcObj->url = site_url("check");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '修改验收';
        $bcObj->url = site_url("check/editUpload");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '修改设备审核';
        $bcObj->url = site_url("");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        //已经回答的问题的id数组
        $dbObj->where_in('room_id', $roomID);
        $ques = $dbObj->get('check_device')->row()->content;
        $data['questions'] = json_decode($ques,TRUE);
        $data['roomID'] = $roomID;

//        var_dump($data['questions']);die;

        $scriptExtra = '';
        $scriptExtra .= '<script type="text/javascript" src="/public/layer/layer.js"></script>';

        $scriptExtra .= '<link rel="stylesheet" href="/public/css/jquery.fancybox.css"/>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/jquery.fancybox.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/player.js"></script>';


        $content = $this->load->view("check/edit_device", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '审核修改', $data);
    }


    /**
     *
     *
     * 工程进度管理
     *
     */

    /**
     *工程进度表  对应数据：已经安排的局站数，已经验收的局站数，验收中的局站数，待验收的局站数
     */
    //图表数据
    public function process()
    {
        //权限判断与显示
        if (!Author::allowRole(4, [2, 3, 4], $this->userObj->check_role)) {
            redirect('/check');
        }

        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();

        //导航栏
        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程';
        $bcObj->url = site_url("check");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '审核工程 - 进度图表';
        $bcObj->url = site_url("check/process");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        //数据数组
        $checks = [];
        $dbObj = $this->load->database('default', TRUE);

        //从第一天安排验收起到目前的日期数组
        $minTime = $dbObj->select_min('arrange_time')->get('check_arrange')->row()->arrange_time;
        $res = $dbObj->where('arrange_time', $minTime)->get('check_arrange')->row();
        $dateStart = date('Y-m-d', strtotime($res->arrange_time));
        $dateEnd = date('Y-m-d', strtotime("now"));
        for ($i = $dateStart; $i <= $dateEnd; $i = date('Y-m-d', strtotime($i) + 3600 * 24)) {
            $checks[] = ['date' => $i];
        }

        //生成包含验收数据的数组
        foreach ($checks as &$check) {
            /**
             * 当天及之前安排的局站总数
             */
            $dbObj->where('arrange_time <', date('Y-m-d H:i:s', strtotime($check['date']) + 3600 * 24));
            $total = $dbObj->count_all_results('check_arrange');
            $check['total'] = $total;

            /**
             * 待验收(未开始验收)
             */
            //已经提交了内容的局站ID  $applyArr
            $applyArr = [];
            //对应日期下和之前安排了的局站列表
            $subsArr = [];
            $dbObj->where('arrange_time <', date('Y-m-d H:i:s', strtotime($check['date']) + 3600 * 24))
                ->select('substation_id');
            $subs = $dbObj->get('check_arrange')->result();
            foreach ($subs as $sub) {
                $subsArr[] = $sub->substation_id;
            }
            //对应check_apply表中已经提交了信息的局站
            if (!empty($subsArr)) {
                $checkInfos = $dbObj->where_in('substation_id', $subsArr)->get('check_apply')->result();
            } else {
                //对应日期下无新安排局站时
                $checkInfos = null;
            }
            foreach ($checkInfos as $k) {
                $applyArr[] = $k->substation_id;
            }
            //对应check_device表中已经提交了信息的局站
            if (!empty($subsArr)) {
                $deviceInfos = $dbObj
                    ->where_in('substation_id', $subsArr)
                    ->get('check_device')
                    ->result();
            } else {
                //对应日期下无新安排局站时
                $deviceInfos = null;
            }
            foreach ($deviceInfos as $k) {
                $applyArr[] = $k->substation_id;
            }
            if (!empty($applyArr)) {
                $dbObj->where('arrange_time <', date('Y-m-d H:i:s', strtotime($check['date']) + 3600 * 24))
                    ->where_not_in('substation_id', $applyArr);
            } else {
                $dbObj->where('arrange_time <', date('Y-m-d H:i:s', strtotime($check['date']) + 3600 * 24));
            }

            $check['uncheck'] = $dbObj->count_all_results('check_arrange');


            /**
             * 已经验收完成的局站
             */
            $dbObj->where('arrange_time <', date('Y-m-d H:i:s', strtotime($check['date']) + 3600 * 24))
                ->where('is_apply', 1);
            $check['is_apply'] = $dbObj->count_all_results('check_arrange');

            /**
             * 已经提交，待审核
             */
            $dbObj->where('arrange_time <', date('Y-m-d H:i:s', strtotime($check['date']) + 3600 * 24))
                ->where('is_apply', 1)
                ->where('check_jim !=', 1)
                ->where('check_tel !=', 1);
            $check['uncheck'] = $dbObj->count_all_results('check_arrange');

            /**
             * jim审核通过的局站
             */
            $dbObj->where('arrange_time <', date('Y-m-d H:i:s', strtotime($check['date']) + 3600 * 24))
                ->where('is_apply', 1)
                ->where('check_jim', 1)
                ->where('check_tel !=', 1);
            $check['check_jim'] = $dbObj->count_all_results('check_arrange');

            /**
             * 电信审核通过的局站
             */
            $dbObj->where('arrange_time <', date('Y-m-d H:i:s', strtotime($check['date']) + 3600 * 24))
                ->where('is_apply', 1)
                ->where('check_jim', 1)
                ->where('check_tel', 1);
            $check['check_tel'] = $dbObj->count_all_results('check_arrange');

        }

        //以地州为单位表格数据


        $scriptExtra = '';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/highcharts/highcharts.js"></script>';

        $data['checks'] = $checks;

        $content = $this->load->view("check/process", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '审核进度', $data);

    }

    /**
     *
     * 局站设备故障记录
     *
     */
    public function memo()
    {

    }


}