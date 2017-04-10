<?php

/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/4/7
 * Time: 14:04
 */
class Dk extends CI_Controller
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

    public function _Check_User_Privilege($substationObj)
    {
        if (in_array($this->userObj->user_role, array("admin", "noc"))) {
            return true;
        } else {
            if ($this->userObj->user_role == "city_admin") {
                if ($substationObj->city_code == $this->userObj->city_code) {
                    return true;
                }
            } else {
                $userPrivilegeObj = User::Get_UserPrivilege($this->userObj->id);
                if (count($userPrivilegeObj)) {
                    $substationIdArray = json_decode($userPrivilegeObj->area_privilege);
                    if (in_array($substationObj->id, $substationIdArray)) {
                        return true;
                    }
                }
            }
        }
        return false;
    }


    public function index()
    {
        die('dk-index');
    }

    public function data($roomId, $model = '', $active_data_id = '')
    {
        $this->load->driver('cache');
        $data = array();
        $data['userObj'] = $this->userObj;

        $data['actTab'] = 'rt_data';
        $data['active_data_id'] = $active_data_id;
        $data['bcList'] = array();
        $data['offset'] = $offset = intval($this->input->get('per_page'));

        $data['model'] = $model;
//      对应局站 机房 的权限
        $data['roomObj'] = $roomObj = $this->mp_xjdh->Get_Room_ById($roomId);
        $data['substationObj'] = $substationObj = $this->mp_xjdh->Get_Substation($roomObj->substation_id);

        if (!$this->_Check_User_Privilege($substationObj)) {
            redirect("/portal");
        }


        $bcObj = new Breadcrumb();
        $bcObj->title = Defines::$gCity[$substationObj->city_code];
        $bcObj->url = site_url("portal/substation_list/" . $substationObj->city_code);
        $data['subid'] = $substationObj->id;
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);
        $bcObj = new Breadcrumb();
        $bcObj->title = $substationObj->name;
        $bcObj->url = site_url("portal/room_list/" . $substationObj->id);
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);
        $bcObj = new Breadcrumb();
        $bcObj->title = $roomObj->name;
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        $scriptExtra = '<script type="text/javascript" src="/public/js/bootbox.js"></script>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/moment.min.js"></script>';
        $scriptExtra .= '<link rel="stylesheet" href="/public/css/daterangepicker-bs2.css"/>';
        $scriptExtra .= '<script type="text/javascript" src="/public/js/daterangepicker.js"></script>';

        if (in_array($_SESSION['XJTELEDH_USERROLE'], array("operator"))) {
            $deviceContentHeader = "";
            $devConfigs = array(
                array(array('temperature', 'humid', 'smoke', 'water'), "机房环境", "enviroment"),
                array(array('DoorXJL', "EmersonDoor"), "门禁系统", "door"),
            );
            foreach ($devConfigs as $devConfig) {
                $dataList = $this->mp_xjdh->Get_Room_Devices($roomId, $devConfig[0]);
                if (count($dataList)) {
                    //we need to append an item to header
                    if (empty($model)) {
                        $data['model'] = $model = $devConfig[2];
                    }

                    $deviceContentHeader .= $this->_get_realtimedata_header($devConfig[2] == $model,
                        site_url("portal/realtimedata/$roomId/$devConfig[2]"), $devConfig[1]);
                    if ($devConfig[2] == $model) {
                        //这里要分成两种，一种是集中显示的（如机房环境），一种是分列显示的,电池等
                        if ($model == "enviroment") {
                            $scriptExtra .= '<script type="text/javascript" 
                                            src="/public/portal/js/rt_data/rt_data-addi.js"></script>';
                            $data['deviceContentBody'] = $this->load->view('portal/DevicePage/enviroment',
                                array("dataList" => $dataList, "room_name" => $roomObj->name), TRUE);
                        } else {
                            $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/rt_data/rt_data-'
                                . $model . '.js"></script>';
                            foreach ($dataList as $dataObj) {
                                switch ($model) {
                                    case "door": {
                                        $devObj = $this->mp_xjdh->Get_Device($dataObj->data_id);
                                        if (count($devObj)) {
                                            if ($devObj->city_code == $this->userObj->city_code)
                                                $canOpen = true;
                                        }
                                        $tmpData = array();
                                        $tmpData['canOpen'] = $canOpen;
                                        $tmpData['desc'] = $this->mp_xjdh->Get_door_record($_SESSION['XJTELEDH_USERID']);
                                        $tmpData['dataObj'] = $dataObj;
                                        $dataObj->html = $this->load->view('portal/DevicePage/door', $tmpData, TRUE);

                                    }
                                }
                            }
                            $data["dataList"] = $dataList;
                            $data['deviceContentBody'] = $this->load->view("portal/device_data_ctrl", $data, TRUE);
                        }
                    }
                }
            }
        }
        //以后添加新显示都在这里添加配置,在单独的页面进行数据处理和显示
        //array(modelList, "display name", "compound name")

        //处理header和body的显示
        $data['userObj'] = $this->userObj;
        if (!in_array($this->userObj->user_role, array("operator"))) {
            $deviceContentHeader = "";
            $arr = array();
            foreach (Constants::$devConfigList as $devConfig) {
                $dataList = $this->mp_xjdh->Get_Room_Devices($roomId, $devConfig[0]);
                if (count($dataList)) {
                    //we need to append an item to header
                    if (empty($model)) {
                        $data['model'] = $model = $devConfig[2];
                    }
                    //权限判断
                    if ($this->userObj->user_role != 'admin' && $this->userObj->user_role != 'noc') {
                        $devModelGroup = $this->_get_device_modelGroup();
                        $devModelName = $this->_get_device_model_name();
                        $userPrivilegeObj = User::Get_UserPrivilege($this->userObj->id);
                        $userDevPrivilege = $userPrivilegeObj->dev_privilege;
                        $userDevPrivilegeArr = json_decode($userDevPrivilege);
                        for ($i = 0; $i < count($userDevPrivilegeArr); $i++) {
                            if (in_array($userDevPrivilegeArr[$i], $devConfig[0])) {
                                foreach ($devModelGroup as $key => $val) {
                                    if ($userDevPrivilegeArr[$i] == $key) {
                                        $modelGroup = $val;
                                    }
                                }
                                foreach ($devModelName as $key => $val) {
                                    if ($userDevPrivilegeArr[$i] == $key)
                                        $modelName = $val;
                                }
                                if (!in_array($modelGroup, $arr))
                                    $deviceContentHeader .= $this->_get_realtimedata_header($devConfig[2] == $model, site_url("portal/realtimedata/$roomId/$modelGroup"), $modelName);
                                array_push($arr, $modelGroup);
                            }
                        }


                    } else {
                        $deviceContentHeader .= $this->_get_realtimedata_header($devConfig[2] == $model,
                            site_url("portal/realtimedata/$roomId/$devConfig[2]"), $devConfig[1]);
                    }

                    if ($devConfig[2] == $model) {
                        //这里要分成两种，一种是集中显示的（如机房环境），一种是分列显示的,电池等
                        if ($model == "enviroment") {
                            $scriptExtra .= '<script type="text/javascript" 
                                    src="/public/portal/js/rt_data/rt_data-addi.js"></script>';
                            $data['deviceContentBody'] = $this->load->view('portal/DevicePage/enviroment',
                                array("dataList" => $dataList, "room_name" => $roomObj->name,
                                    'userObj' => $this->userObj), TRUE);
                        } else {
                            //其他 设备
                            if ($model == "sps") {
                                $data['groupList'] = $groupList = $this->mp_xjdh->Get_DevGroup($roomId, $devConfig[0]);
                            } else if ($model == 'camera') {
                                $data['groupList'] = $groupList = $this->mp_xjdh->Get_vcamera($roomId);
                            }
                            if (!in_array($model, array("ac"))) {
                                $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/rt_data/rt_data-'
                                    . $model . '.js"></script>';
                            }
                            foreach ($dataList as $dataObj) {
                                $data['dataObj'] = $dataObj;
                                //$devDcList = $this->mp_xjdh->Get_DeviceDynamicConfig($dataObj->data_id);
                                switch ($model) {
                                    case "sps": {

                                        if (Util::endsWith($dataObj->model, "ac")) {
                                            $tData = array_merge($data, Constants::$pmBusConfig[$dataObj->model]);
                                            $dataObj->html = $this->load->view('portal/DevicePage/pmbus-ac', $tData, TRUE);
                                        } else if (Util::endsWith($dataObj->model, "dc")) {
                                            $tData = array_merge($data, Constants::$pmBusConfig[$dataObj->model]);
                                            $dataObj->html = $this->load->view('portal/DevicePage/pmbus-dc', $tData, TRUE);
                                        } else if (Util::endsWith($dataObj->model, "rc")) {
                                            $tData = array_merge($data, Constants::$pmBusConfig[$dataObj->model]);
                                            $dataObj->html = $this->load->view('portal/DevicePage/pmbus-rc', $tData, TRUE);
                                        } else {
                                            $dataObj->html = $this->load->view("portal/DevicePage/" . $dataObj->model, $data, TRUE);
                                        }
                                        break;
                                    }
                                    case "liebert-ups": {

                                        if ($dataObj->model == "liebert-ups") {
                                            $dataObj->html = $this->load->view('portal/DevicePage/liebert-ups', array('liebertUpsObj' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                        }
                                        break;
                                    }
                                    case "ac": {
                                        if ($dataObj->model == "liebert-pex") {
                                            $dataObj->html = $this->load->view('portal/DevicePage/liebert-pex', array('liebertPexObj' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                            $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/rt_data/rt_data-' . $dataObj->model . '.js"></script>';
                                        } else if ($dataObj->model == "ug40") {
                                            $dataObj->html = $this->load->view('portal/DevicePage/ug40', array('ug40Obj' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                            $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/rt_data/rt_data-' . $dataObj->model . '.js"></script>';
                                        } else if ($dataObj->model == "canatal") {
                                            $dataObj->html = $this->load->view('portal/DevicePage/canatal', array('canatal' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                            $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/rt_data/rt_data-' . $dataObj->model . '.js"></script>';
                                        } else if ($dataObj->model == "datamate3000") {
                                            $dataObj->html = $this->load->view('portal/DevicePage/datamate3000', array('dataObj' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                            $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/rt_data/rt_data-' . $dataObj->model . '.js"></script>';
                                        }
                                        break;
                                    }

                                    case "pdu": {
                                        if (in_array($dataObj->model, array('aeg-ms10se', 'aeg-ms10m'))) {
                                            $dataObj->html = $this->load->view('portal/DevicePage/page-aeg', array('aegObj' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                        } else if ($dataObj->model == "vpdu") {
                                            $dataObj->html = $this->load->view('portal/DevicePage/vpdu', array('dataObj' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                        }
                                        break;
                                    }
                                    case "engine": {
                                        $dataObj->html = $this->load->view('portal/DevicePage/' . $dataObj->model, array('dataObj' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/rt_data/rt_data-' . $dataObj->model . '.js"></script>';
                                        break;
                                    }
                                    case "smd_device": {
                                        $dataObj->html = $this->_show_smd_device($dataObj);
                                        break;
                                    }
                                    case "powermeter": {
                                        if ($dataObj->model == "imem_12") {
                                            $dataObj->html = $this->load->view('portal/DevicePage/imem12', array('dataObj' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                        } else if ($dataObj->model == "power_302a") {
                                            $dataObj->html = $this->load->view('portal/DevicePage/power_302a', array('dataObj' => $dataObj, 'userObj' => $this->userObj), TRUE);
                                        }
                                        break;
                                    }
                                    case "door": {
                                        $tmpData = array();
                                        $canOpen = false;
                                        if ($this->userObj->user_role == 'admin') {
                                            $canOpen = true;
                                        } else if (in_array($this->userObj->user_role, array("city_admin", "operator"))) {
                                            $devObj = $this->mp_xjdh->Get_Device($dataObj->data_id);
                                            if (count($devObj)) {
                                                if ($devObj->city_code == $this->userObj->city_code)
                                                    $canOpen = true;
                                            }
                                        } else {
                                            $duObj = $this->mp_xjdh->Get_DoorUser($dataObj->data_id, $this->userObj->id);
                                            if (count($duObj) && $duObj->remote_control)
                                                $canOpen = true;
                                        }
                                        $tmpData['canOpen'] = $canOpen;//in_array($this->userObj->user_role, array("admin","city_admin")) && count($this->mp_xjdh->Get_DoorUser($dataObj->data_id, $this->userObj->id));
                                        $tmpData['desc'] = $this->mp_xjdh->Get_door_record($_SESSION['XJTELEDH_USERID']);
                                        $tmpData['dataObj'] = $dataObj;
                                        $dataObj->html = $this->load->view('portal/DevicePage/door', $tmpData, TRUE);
                                    }
                                    case "battery": {
                                        $extraPara = $this->mp_xjdh->Device_extra_para($dataObj->data_id);
                                        $data['extraPara'] = $extraPara = json_decode($extraPara->extra_para, true);
                                        if ($extraPara ["connection"] == "44") {
                                            $data['type'] = $type = "44"; //44代表蓄电池前4后4接法
                                        }
                                        if ($extraPara ["connection"] == "44i") {
                                            $data['type'] = $type = "44i";//前4后4接法个例第一组与第二组之间空两节
                                        }
                                        if ($extraPara ["connection"] == "11") {
                                            $data['type'] = $type = "11"; //11代表蓄电池11节接法
                                        }
                                        $dataObj->html = $this->load->view("portal/DevicePage/battery", $data, TRUE);
                                    }
                                    case "upsbattery":
                                    case "canatal":
                                    case "battery_32":
                                    case "camera":
                                    case "freshair":
                                    case "motor_battery": {
                                        $data['motorBatList'] = $this->mp_xjdh->Get_Room_Devices($dataObj->room_id, 'motor_battery');
                                        $data['pageContent'] = $this->load->view('portal/DevicePage/motor_battery', $data, TRUE);
                                    }
                                    default:
                                        $dataObj->html = $this->load->view("portal/DevicePage/$model", array("dataObj" => $dataObj, 'ExtraPara' => $a->c, 'userObj' => $this->userObj), TRUE);
                                        break;
                                }
                            }
                            $data["dataList"] = $dataList;
                            $data['deviceContentBody'] = $this->load->view("portal/device_data_ctrl", $data, TRUE);
                        }
                    }
                }
            }
        }
        $data['deviceContentHeader'] = $deviceContentHeader;
        $data['model'] = $model;

        $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/rt_data/rt_data.js"></script>';
        $bcObj = new Breadcrumb();
        $bcObj->title = '实时数据管理';
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);
        $content = $this->load->view("portal/realtimedata", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '', $data);
    }


    function _get_realtimedata_header($isActive = false, $url = '', $name = '')
    {
        return '<li ' . ($isActive ? "class='active'" : "") . '><a href="' . $url .
            '"><i class="icon-tasks"></i>' . $name . '</a></li>';
    }

}