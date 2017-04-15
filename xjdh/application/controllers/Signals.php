<?php
require_once('CommonController.php');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/4/13
 * Time: 9:57
 * 信号配置控制器
 */
class Signals extends CommonController
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 设备信号配置
     */
    public function deviceSignals()
    {
        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();
        $bcObj = new Breadcrumb();

        $bcObj->title = '信号管理';
        $bcObj->url = site_url("signals/deviceSignals");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '设备信号';
        $bcObj->url = site_url("signals/deviceSignals");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        $dbObj = $this->load->database('default', TRUE);

        $dbObj->get('signals_map');

        //获取对应类型的设备
        if (!empty($this->input->get('model'))) {
            $dbObj->where('model', $this->input->get('model'));
        }
        //type = 1 设备信号
        $signals = $dbObj->where('type',1)->get('signals_map')->result();
        $data['signals'] = $signals;
        //对应设备信号名配置
        $data['standard_signals'] = $dbObj->where('type',1)
            ->get('signals_standard')->result();


        //t::f($signals);
        $scriptExtra = '';
        $scriptExtra .= '<script src="/public/js/signals/signals.js"></script>';

        $content = $this->load->view("signals/signals_map", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '二级审核', $data);
    }

    /**
     * 更新信号映射关系
     */
    public function updateSignalMap()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $jim_name = $post['jim_name'];
        $tel_name_id = $post['tel_name_id'];

        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $id)
            ->set('jim_name', $jim_name);
        if (!empty($tel_name_id)) {
            $dbObj->set('tel_name_id', $tel_name_id);
        }
        $dbObj->update('signals_map');
        echo 'true';
    }

    /**
     * 删除某一信号信息 设备/告警
     */
    public function deleteSignalMap()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id', $id)->delete('signals_map');

        echo 'true';
    }

    public function addSignalMap()
    {
        $post = $this->input->post();
        $model = $post['model_add'];
        $jim_name = $post['jim_name'];
        $tel_name_id = $post['add_tel_name_id'];
        $type = $post['type'];
        $dbObj = $this->load->database('default', TRUE);

        $dbObj->set('model', $model)
            ->set('jim_name', $jim_name)
            ->set('tel_name_id', $tel_name_id)
            ->set('model', $model)
            ->set('type',$type)
            ->insert('signals_map');
        echo 'true';
    }

    /**
     * 告警信号配置
     */
    public function alertSignals()
    {
        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();
        $bcObj = new Breadcrumb();

        $bcObj->title = '信号管理';
        $bcObj->url = site_url("signals/deviceSignals");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '设备信号';
        $bcObj->url = site_url("signals/alertSignals");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        $dbObj = $this->load->database('default', TRUE);

        $dbObj->get('signals_map');

        //获取对应类型的设备
        if (!empty($this->input->get('model'))) {
            $dbObj->where('model', $this->input->get('model'));
        }
        //type = 2 设备信号
        $signals = $dbObj->where('type',2)->get('signals_map')->result();

        $data['signals'] = $signals;
        //对应设备信号名配置
        $data['standard_signals'] = $dbObj->where('type',2)
            ->get('signals_standard')->result();

        $scriptExtra = '';
        $scriptExtra .= '<script src="/public/js/signals/signals.js"></script>';

        $content = $this->load->view("signals/alerts_map", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '二级审核', $data);
    }


}