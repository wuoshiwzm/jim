<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mp_extra extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_user_subs($userID){
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('user_id',$userID);
        return $arrange = $dbObj->get('check_arrange')->result();
    }

    function Get_substation_info($subID){
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id',$subID);
        return $arrange = $dbObj->get('substation')->row();
    }

    function Get_room_info($roomID){
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id',$roomID);
        return $arrange = $dbObj->get('room')->row();
    }

    function Get_device_info($dataID){
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('data_id',$dataID);
        return $arrange = $dbObj->get('device')->row();
    }

    function get_device_name($data_id){
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('data_id',$data_id);
        return $dbObj->get('device')->row()->name;
    }

    function getArrangeByID($arrangeID){
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id',$arrangeID);
        return $arrange = $dbObj->get('check_arrange')->row();
    }

    function get_user_id_by_name($name)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('full_name',$name);
        $dbObj->select('id');
        return $dbObj->get('user')->row();
    }

    function get_user_fullname($id){
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id',$id);
        $dbObj->select('full_name');
        return $dbObj->get('user')->row()->full_name;
    }

    function Get_room_name($room_id)
    {
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $room_id);
        $dbObj->select('name');
        return $dbObj->get('room')->row();
    }

    function get_device_type_name($data_type){
        foreach (Constants::$devConfigList as $a){
            if($a[2] == $data_type){
                return $a[1];
            }
        }
        return '无此设备类型';
    }

}