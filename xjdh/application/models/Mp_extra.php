<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mp_Extra extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_user_subs($userID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('user_id', $userID);
        return $arrange = $dbObj->get('check_arrange')->result();
    }

    function Get_substation_info($subID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $subID);
        return $arrange = $dbObj->get('substation')->row();
    }

    function getSubstationByRoom($roomID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $roomID);
        return $substation = $dbObj->get('room')->row();
    }

    function Get_room_info($roomID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $roomID);
        return $arrange = $dbObj->get('room')->row();
    }

    function Get_device_info($dataID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('data_id', $dataID);
        return $arrange = $dbObj->get('device')->row();
    }

    function get_device_name($data_id)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('data_id', $data_id);
        return $dbObj->get('device')->row()->name;
    }

    function getArrangeByID($arrangeID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $arrangeID);
        return $arrange = $dbObj->get('check_arrange')->row();
    }

    function get_user_id_by_name($name)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('full_name', $name);
        $dbObj->select('id');
        return $dbObj->get('user')->row();
    }

    function get_user_fullname($id)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $id);
        $dbObj->select('full_name');
        $res = $dbObj->get('user')->row();
        return empty($res) ? null : $res->full_name;
    }

    function Get_room_name($room_id)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $room_id);
        $dbObj->select('name');
        return $dbObj->get('room')->row();
    }

    function get_device_type_name($data_type)
    {
        foreach (Constants::$devConfigList as $a) {
            if ($a[2] == $data_type) {
                return $a[1];
            }
        }
        return '无此设备类型';
    }

    function Get_Room_Devs($room_id, $model)
    {
        $dbObj = $this->load->database('default', TRUE);
        //first we need to filter out smd_device
        if (is_array($model) && in_array("smd_device", $model)) {
            $dbObj->join('room', 'room.id=smd_device.room_id');
            $dbObj->join('substation', 'substation.id=room.substation_id', 'left');
            $dbObj->where('smd_device.room_id', $room_id);
            $dbObj->where('active', true);
            $dbObj->select("smd_device.*,substation.city_code");
            $ret = $dbObj->get('smd_device')->result();
            //echo $dbObj->last_query();
            return $ret;
        } else {
            //
            $dbObj->join('room', 'room.id=device.room_id');
            $dbObj->join('substation', 'substation.id=room.substation_id', 'left');
            $dbObj->where('device.room_id', $room_id);
            $dbObj->where_not_in('device.model', ['motivator', 'venv']);
            $dbObj->where('active', true);
            if (is_array($model)) {
                $dbObj->where_in('model', $model);
            } else {
                $dbObj->where('model', $model);
            }
            $dbObj->order_by('dev_group', 'ASC');
            $dbObj->order_by('name', 'ASC');
            $dbObj->select('device.*,substation.city_code,room.substation_id');
            $ret = $dbObj->get('device')->result();
            //echo $dbObj->last_query();
            return $ret;
        }
    }

    function getArrangeBySub($subID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('substation_id', $subID)
            ->get('check_arrange')
            ->row();
        return $res;
    }

    function getArrangeByRoom($roomID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('room_id', $roomID)->get('check_device')->row();
        return $res;
    }

    //判断工艺问题是否已经提交部分
    function checkApplied($subID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('substation_id', $subID)
            ->get('check_apply')
            ->row();
        return $res;
    }

    //判断设备问题是否已经提交部分
    function deviceApplied($roomID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('room_id', $roomID)
            ->get('check_device')
            ->row();
        return $res;
    }

    //获取设备类型的中文名称
    function getDeviceTypeName($typeName)
    {
        foreach (Constants::$devConfigList as $devConfig) {
            if ($devConfig[2] == $typeName) {
                return $devConfig[1];
            }
        }
    }

    //获取问题内容 通过问题ID
    function getQuestionContent($questionID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('id', $questionID)
            ->get('check_question')
            ->row();
        return $res;
    }

    //获取城市对应的局站列表 数组
    function getSubsList($cityCode)
    {
        $subs = [];
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('city_code', $cityCode)->get('substation')->result();
        foreach ($res as $re) {
            $subs[] = $re->id;
        }
        return $subs;
    }

    function Get_Device_By_SmdRoom($smdID, $roomID)
    {
        //同时机房符合 板子也符合
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('room_id', $roomID)
            ->where('smd_device_no', $smdID)
            ->order_by("dev_type", "asc")
            ->order_by("port", "asc")
            ->get('device')
            ->result();

        return $res;
    }

    //获取某个设备变量对应的标准变量名
    function GetStandardSignalName($tel_name_id)
    {
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('id', $tel_name_id)
            ->get('signals_standard')
            ->row();
        return empty($res) ? null : $res->name;
    }

    //获取吉姆报警信号对应的分类名
    public function getJimAlert($signalID)
    {
        $res = new stdClass();
        $dbObj = $this->load->database('default', TRUE);
        $signal = $dbObj->where('id', $signalID)
            ->get('signals_alert_jim')
            ->row();
        switch ($signal->type) {
            case 1:
                $res->type = '机房环境';
                break;

            case 2:
                $res->type = '蓄电池组';
                break;

            case 3:
                $res->type = '开关电源';
                break;
        }
        $res->id = $signal->id;
        $res->signal = $signal->signal;
        $res->alert_signal = $signal->alert_signal;
        return $res;
    }


    //获取吉姆报警信号对应的分类名
    public function getTelSignalStandard($id)
    {
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('id', $id)->get('signals_alert_standard')->row();

        return $res;
    }

    //
    public function getRealtimeSignalType($type)
    {
        switch ($type) {

            case  'a' :
                return 'NUL-padded string';
                break;
            case  'A' :
                return 'SPACE-padded string';
                break;
            case  'h' :
                return 'Hex string, low nibble first';
                break;
            case  'H' :
                return 'Hex string, high nibble first';
                break;
            case  'c' :
                return 'signed char';
                break;
            case  'C' :
                return 'unsigned char';
                break;
            case  's' :
                return 'signed short (always 16 bit, machine byte order)';
                break;
            case  'S' :
                return 'unsigned short (always 16 bit, machine byte order)
        ';
                break;
            case  'n' :
                return 'unsigned short (always 16 bit, big endian byte order)
        ';
                break;
            case  'v' :
                return 'unsigned short (always 16 bit, little endian byte order)
        ';
                break;
            case  'i' :
                return 'signed integer (machine dependent size and byte order)
        ';
                break;
            case  'I' :
                return 'unsigned integer (machine dependent size and byte order)
        ';
                break;
            case  'l' :
                return 'signed long (always 32 bit, machine byte order)';
                break;
            case  'L' :
                return 'unsigned long (always 32 bit, machine byte order)';
                break;
            case  'N' :
                return 'unsigned long (always 32 bit, big endian byte order)
        ';
                break;
            case  'V' :
                return 'unsigned long (always 32 bit, little endian byte order)
        ';
                break;
            case  'f' :
                return 'float (machine dependent size and representation)';
                break;
            case  'd' :
                return 'double (machine dependent size and representation)
        ';
                break;
            case  'x' :
                return 'NUL byte';
                break;
            case  'X' :
                return 'Back up one byte';
                break;
            case  '@' :
                return 'NUL-fill to absolute position';
                break;

        }
    }

    //通过dataID获取设备的对应model属性
    public function getDeviceModel($dataID)
    {
        $dbObj = $this->load->database('default', TRUE);
        $model = $dbObj->where('data_id',$dataID)
            ->get('device')
            ->row()->model;
        return $model;
    }


    /**
     * @param $id
     * @return mixed
     * 通过id获取循环体信息
     */
    public function getLoopInfoByID($id)
    {
        $dbObj = $this->load->database('default', TRUE);
        $res = $dbObj->where('id',$id)
            ->get('realtime_signals_loop')
            ->row();
        return $res;
    }

    /**
     * @param $id
     * 获取某一个循环体内所有的变量名
     */
    public function getLoopParasByID($id)
    {

    }

    /**
     * @param $id
     * 获取某一个循环体内所有的循环的变量值
     */
    public function getLoopValuesByID($id)
    {

    }


}