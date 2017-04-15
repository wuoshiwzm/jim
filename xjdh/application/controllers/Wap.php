<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

const DEFAULT_PAGE_SIZE = 5;

class Wap extends CI_Controller
{

    var $user = null;

    public function __construct ()
    {
        parent::__construct();
        // Initiate the request handlerw which deals with $_GET, $_POST, etc
        $request = new League\OAuth2\Server\Util\Request();
        require "application/config/database.php";
        // Initiate a new database connection
        $conn_str = 'mysql://' . $db['default']['username'] . ":" . $db['default']['password'] . '@' . $db['default']['hostname'] . '/' .
                 $db['default']['database'];
        $db = new League\OAuth2\Server\Storage\PDO\Db($conn_str);
        
        $this->server = new League\OAuth2\Server\Resource(new League\OAuth2\Server\Storage\PDO\Session($db));
        try {
            $this->server->isValid();
            $this->user = User::GetUserById($this->server->getOwnerId());
            User::Set_UserAppOnline($this->user->id);
        } catch (League\OAuth2\Server\Exception\InvalidAccessTokenException $e) {
            redirect('welcome/error_404');
        }
    }
    
    public function loadrealtime ()
    {
        $data = array();
        $accessToken = $this->server->getAccessToken();
        
        $data_id = $this->input->get('data_id');
        $model = $this->input->get('model');
        $roomId = $this->input->get('room_code');
        $data['isMobile'] = true;
        $data['userObj' ] = $this->user;
        $scriptExtra = '<script type="text/javascript">var accessToken ="' . $accessToken . '",model = "' . $model . '";' . '</script>';
        //手机和网站的显示还有有区别，对于enviroment，手机要自己做
        if($model == "ad"){
            $roomObj = $this->mp_xjdh->Get_Room_ById($roomId);
            $dataList = $this->mp_xjdh->Get_Room_Devices($roomId, array('temperature','humid','smoke','water'));
            $scriptExtra .= '<script type="text/javascript" src="/public/portal/js/rt_data/rt_data-addi.js?v=1.1"></script>';
            $data["dataList"] = $dataList;
            $data["room_name"] = $roomObj->name;
            $data['pageContent'] = $this->load->view('portal/DevicePage/enviroment', $data, TRUE);
        }else{
            if($model == "smd_device")
            {
                $data['dataObj'] = $dataObj = $this->mp_xjdh->Get_SmdDevice($data_id);
                Realtime::GetDevicePage($model, $scriptExtra, $data, $dataObj, $this->user, $data_id);
            }else{
                $data['dataObj'] = $dataObj = $this->mp_xjdh->Get_Device($data_id);
                Realtime::GetDevicePage($model, $scriptExtra, $data, $dataObj, $this->user);
            }
        }
        $data['scriptExtra'] = $scriptExtra;
        $this->load->view('wap/master', $data);
    }

    public function onlineuser ()
    {
        $data = array();
        $data['isWap'] = true;
        $data['userList'] = User::Get_AllOnlineUser();
        $data['pageContent'] = $this->load->view('portal/online_user', $data, TRUE);
        $this->load->view('wap/master', $data);
    }

    public function feedback ()
    {
        $data = array();
        $id = $this->input->get('id');
        $data['feedbackObj'] = $this->mp_xjdh->Get_Feedback($id);
        $data['scriptExtra'] = '';
        $data['pageContent'] = $this->load->view('wap/feedback', $data, TRUE);
        $this->load->view('wap/master', $data);
    }
	function datamodel()
	{
		$data = array();
        $data['scriptExtra'] = '';
        $data['pageContent'] = $this->load->view('wap/data_model', $data, TRUE);
        $this->load->view('wap/master', $data);
	}
}
