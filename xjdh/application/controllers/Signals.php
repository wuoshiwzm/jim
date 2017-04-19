<?php
require_once('CommonController.php');
require('/php-excel-reader/excel_reader2.php');
require('/php-excel-reader/SpreadsheetReader.php');
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

    public function __construct()
    {
        //继承父类构造函数
        parent::__construct();

    }

    public function temp($arr,$index)
    {
        foreach($arr as $k=>$a){
            if(empty($arr[$k][$index])){
                $arr[$k][$index] = $arr[$k-1][$index];
            }
        }

        return $arr;
    }


    public function index()
    {
        //数据格式化
//        $dbObj = $this->load->database('default', TRUE);
//        $res = $dbObj->select('device_type,id')->get('signals_alert_standard')->result_array();
//
//      foreach ($res as $k=>$v){
//          if(empty($v['device_type'])){
//              echo $res[$k-1]['id'].'---';
//             // var_dump($v['id']);
//              $dbObj->where('id',$v['id'])
//                  ->set('device_type',$res[$k-1]['device_type'])
//                  ->update('signals_alert_standard');
//          }
//      }
//
//
//        $Filepath = 'lll2.xls';
//        $Filepath = 'lll.xlsx';
//
//
//        $StartMem = memory_get_usage();
//        echo '---------------------------------'.PHP_EOL;
//        echo 'Starting memory: '.$StartMem.PHP_EOL;
//        echo '---------------------------------'.PHP_EOL;
//
//        $data = [];
//
//        try
//        {
//            $Spreadsheet = new SpreadsheetReader($Filepath);
//            $BaseMem = memory_get_usage();
//            $Sheets = $Spreadsheet -> Sheets();
//
//            echo '---------------------------------'.PHP_EOL;
//            echo 'Spreadsheets:'.PHP_EOL;
//
//            echo '---------------------------------'.PHP_EOL;
//            echo '---------------------------------'.PHP_EOL;
//
//
//            foreach ($Sheets as $Index => $Name)
//            {
//                $Spreadsheet -> ChangeSheet($Index);
//                foreach ($Spreadsheet as $key => $row)
//                {
//
////                    $dbObj->set('device_type',$row[0]);
////                    $dbObj->set('logic_type',$row[1]);
////                    $dbObj->set('signal_standard_name',$row[2]);
////                    $dbObj->set('signal_type',$row[3]);
////                    $dbObj->set('unit',$row[4]);
////                    $dbObj->set('alertinfo_alert',$row[5]);
////                    $dbObj->set('alertinfo_normal',$row[6]);
////                    $dbObj->set('info_desc',$row[7]);
////                    $dbObj->set('info_exp',$row[8]);
////                    $dbObj->set('remark',$row[9]);
////
////
////                    $dbObj->set('a_signal_id',$row[10]);
////                    $dbObj->set('a_level',$row[11]);
////                    $dbObj->set('a_threshold',$row[12]);
////                    $dbObj->set('a_delay',$row[13]);
////                    $dbObj->set('a_save_time',$row[14]);
////                    $dbObj->set('a_threshold_abs',$row[15]);
////                    $dbObj->set('a_threshold_per',$row[16]);
////
////                    $dbObj->set('b_signal_id',$row[17]);
////                    $dbObj->set('b_level',$row[18]);
////                    $dbObj->set('b_threshold',$row[19]);
////                    $dbObj->set('b_delay',$row[20]);
////                    $dbObj->set('b_save_time',$row[21]);
////                    $dbObj->set('b_threshold_abs',$row[22]);
////                    $dbObj->set('b_threshold_per',$row[23]);
////
////                    $dbObj->set('c_signal_id',$row[24]);
////                    $dbObj->set('c_level',$row[25]);
////                    $dbObj->set('c_threshold',$row[26]);
////                    $dbObj->set('c_delay',$row[27]);
////                    $dbObj->set('c_save_time',$row[28]);
////                    $dbObj->set('c_threshold_abs',$row[29]);
////                    $dbObj->set('c_threshold_per',$row[30]);
////
////                    $dbObj->set('d_signal_id',$row[31]);
////                    $dbObj->set('d_level',$row[32]);
////                    $dbObj->set('d_threshold',$row[33]);
////                    $dbObj->set('d_delay',$row[34]);
////                    $dbObj->set('d_save_time',$row[35]);
////                    $dbObj->set('d_threshold_abs',$row[36]);
////                    $dbObj->set('d_threshold_per',$row[37]);
////
////                    $dbObj->insert('signals_alert_jim');
//
//                    /**
//                     * A类机房 信号ID[10] => 0131101001
//                    A类机房 告警级别[11] =>
//                    A类机房 告警门限[12] =>
//                    A类机房 告警延时（秒）[13] =>
//                    A类机房 存储周期(秒)[14] => 86400
//                    A类机房 绝对阀值[15] => 5
//                    A类机房 百分比阀值[16] =>
//                     *
//                     *
//                     *
//                    设备类型[0] =>
//                    逻辑分类[1] => 240V电池
//                    信号标准名[2] => 电池表面温度
//                    信号类型[3] => 遥测
//                    单位[4] => ℃
//                    告警信息告警时[5] =>
//                    告警信息正常时[6] =>
//                    信号说明[7] =>
//                    信号解释[8] =>
//                    备注[9] =>
//                     *
//                    A类机房 信号ID[10] => 0131101001
//                    A类机房 告警级别[11] =>
//                    A类机房 告警门限[12] =>
//                    A类机房 告警延时（秒）[13] =>
//                    A类机房 存储周期(秒)[14] => 86400
//                    A类机房 绝对阀值[15] => 5
//                    A类机房 百分比阀值[16] =>
//                     *
//                    B类机房 信号ID[17] => 0231101001
//                    B类机房 告警级别[18] =>
//                    B类机房 告警门限[19] =>
//                    B类机房 告警延时（秒）[20] =>
//                    B类机房 存储周期(秒)[21] => 86400
//                    B类机房 绝对阀值[22] => 5
//                    B类机房 百分比阀值[23] =>
//                     *
//                    C类机房  信号ID[24] => 0331101001
//                    C类机房  告警级别[25] =>
//                    C类机房  告警门限[26] =>
//                    C类机房  告警延时（秒）[27] =>
//                    C类机房  存储周期(秒)[28] => 86400
//                    C类机房  绝对阀值[29] => 5
//                    C类机房  百分比阀值[30] =>
//                     *
//                    D类机房  信号ID[31] => 0431101001
//                    D类机房  告警级别[32] =>
//                    D类机房  告警门限[33] =>
//                    D类机房  告警延时（秒）[34] =>
//                    D类机房  存储周期(秒)[35] => 86400
//                    D类机房  绝对阀值[36] => 5
//                    D类机房  百分比阀值[37] =>
//                     */
//
//
////                    echo $key.': ';
//                    if ($row)
//                    {
////                        print_r($row);
//                        array_push($data,$row);
//                    }
//                    else
//                    {
//                        var_dump($row);
//                    }
////                    $CurrentMem = memory_get_usage();
////
////                    echo 'Memory:'.($CurrentMem - $BaseMem).'current,'.$CurrentMem.'base'.PHP_EOL;
////                    echo '---------------------------------'.PHP_EOL;
////
////                    if ($Key && ($Key % 500 == 0))
////                    {
////                        echo '---------------------------------'.PHP_EOL;
////                        echo 'Time: '.(microtime(true) - $Time);
////                        echo '---------------------------------'.PHP_EOL;
////                    }
//                }
////
////                echo PHP_EOL.'---------------------------------'.PHP_EOL;
////                echo 'Time: '.(microtime(true) - $Time);
////                echo PHP_EOL;
////
////                echo '---------------------------------'.PHP_EOL;
////                echo '*** End of sheet '.$Name.' ***'.PHP_EOL;
////                echo '---------------------------------'.PHP_EOL;
//            }
//
//        }
//        catch (Exception $E)
//        {
//            echo $E -> getMessage();
//        }
//
//        $res = $this->temp($this->temp($this->temp($data,0),1),2);
//录入 告警信号列表
//        foreach ($res as $r){
//
//            $type = 0;
//           if($r[0] == '机房环境'){
//               $type = 1;
//           }else if($r[0] == '蓄电池组'){
//               $type = 2;
//           }else if($r[0] == '开关电源'){
//               $type = 3;
//           }
//            $dbObj->set('type',$type)
//                ->set('signal',$r[1])
//                ->set('alert_signal',$r[2])
//                ->insert('signals_alert_jim');
//        }
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
        $signals = $dbObj->where('type', 1)->get('signals_map')->result();
        $data['signals'] = $signals;
        //对应设备信号名配置
        $data['standard_signals'] = $dbObj->where('type', 1)
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
            ->set('type', $type)
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
        $signals = $dbObj->where('type', 2)->get('signals_map')->result();

        $data['signals'] = $signals;
        //对应设备信号名配置
        $data['standard_signals'] = $dbObj->where('type', 2)
            ->get('signals_standard')->result();

        $scriptExtra = '';
        $scriptExtra .= '<script src="/public/js/signals/signals.js"></script>';

        $content = $this->load->view("signals/alerts_map", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '二级审核', $data);
    }

    /**
     * 电信标准数据录入
     */
    public function telStandard()
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
        $bcObj->title = '电信标准信号录入';
//        $bcObj->url = site_url("signals/alertConvergence");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);

        $dbObj = $this->load->database('default', TRUE);


        $scriptExtra = '';
        $scriptExtra .= '<script src="/public/js/signals/signals.js"></script>';

        $content = $this->load->view("signals/tel_standard", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '二级审核', $data);
    }

    /**
     * 告警收敛
     */
    public function alertConvergence()
    {
        $dbObj = $this->load->database('default', TRUE);

        //配置映射关系
        $post = $this->input->post();
        if(!empty($post) ){
            if(!empty($post['jimSignal']) && !empty($post['telSignal'])){
                $jimSignal = $post['jimSignal'];
                $telSignal = $post['telSignal'];
                $dbObj->where('id',$jimSignal)
                    ->set('signal_tel_id',$telSignal)
                    ->update('signals_alert_jim');
            }
            redirect('signals/alertConvergence');
        }
        $data = array();
        $data['userObj'] = $this->userObj;
        $data['bcList'] = array();
        $bcObj = new Breadcrumb();

        $bcObj->title = '信号管理';
        $bcObj->url = site_url("signals/deviceSignals");
        $bcObj->isLast = false;
        array_push($data['bcList'], $bcObj);

        $bcObj = new Breadcrumb();
        $bcObj->title = '添加收敛规则';
        $bcObj->url = site_url("signals/alertConvergence");
        $bcObj->isLast = true;
        array_push($data['bcList'], $bcObj);


        //获取电信标准信号表
        $signals_tel = $dbObj->get('signals_alert_standard')->result();

        $data['signalsTel'] = $signals_tel;

        //获取JIM告警信号表
        $signals_jim = $dbObj->where('signal_tel_id is NULL',NULL,true)->get('signals_alert_jim')->result();
        $data['signalsJim'] = $signals_jim;

        //获得已经配置过的信号
        $signals_jim_configed = $dbObj->where('signal_tel_id is NOT NULL',NULL,false)
            ->get('signals_alert_jim')->result();
        $data['signalsConf'] = $signals_jim_configed;


        $scriptExtra = '';
        $scriptExtra .= '<script src="/public/js/signals/signals.js"></script>';

        $content = $this->load->view("signals/alert_convergence", $data, TRUE);
        $this->mp_master->Show_Portal($content, $scriptExtra, '二级审核', $data);
    }

    /**
     * 删除映射关系
     */
    public function deleteConvergence()
    {
        $post = $this->input->post();
        $id = $post['id'];

        $dbObj = $this->load->database('default', TRUE);
        $dbObj->where('id',$id)
            ->set('signal_tel_id',null)
            ->update('signals_alert_jim');

        echo 'true';

    }


}