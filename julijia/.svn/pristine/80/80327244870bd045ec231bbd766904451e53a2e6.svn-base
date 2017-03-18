<?php


class MemberController extends \BaseController
{

    protected $layout = 'layouts.frontend';


    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function view($path, $data = [])
    {
        $this->layout->content = View::make($path, $data);
    }


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 登录页
     */
    function login($url = null)
    {
        //登录验证
        if (!empty(Input::all())) {

            $username = Input::get('name');
            $password = Input::get('password');

            $url = !empty(Input::get('url'))?decode(Input::get('url')):'member';


            if (Input::get('_token') != csrf_token()) {
                return Redirect::back()->with('msg', 'failed to login')->withInput();
            }
            $res = User::login($username, $password);
            if ($res) {
                //更新上次登录时间
                $user = User::getUserByName(Input::get('name'))->first();
                $user->update(array('last_time' => date('Y-m-d h:m:s'),'last_ip' => clientIP()));
                // 存入session
                Session::put('member', $user);
                return Redirect::to($url);
            }
            return Redirect::back()->with('msg', '登录失败')->withInput();
        }

        if (isset(Session::get('member')->id)) {
            return Redirect::to('member');
        }
        return $this->view('frontend.login', compact('url'));
    }


    function index()
    {

    }

    /**
     * 注册
     */
    function register()
    {
        $this->view('frontend.register');
    }


    /**
     * @return mixed
     * 判断注册成功 存储信息
     */
    function store()
    {
        $input = Input::all();

        if ($input['_token'] = csrf_token() || isset($input['like']) && $input['like'] == 'on') {
            $err = [];
            $res = User::checkName($input['name']);
            if (!$res) {
                $err[] = '该用户名已被占用！';
            }

            if(Source_User_UserInfo::where('mobile_phone',$input['mobile_phone'])->count()){
                $err[] = '该手机号码已经占用！';
            }

            $res = User::validatorUser($input);
            $res ?: $err = array_merge($res->all(), $err);
            if ($res === true && $err != []) {
                User::addUser($input);
                $user = User::getUserByName(Input::get('name'))->first();
                $user->update(array('last_time' => date('Y-m-d h:m:s'),'last_ip' => clientIP()));
                // 存入session
                Session::put('member', $user);
                return Redirect::to('member');
            } else {
                return Redirect::back()->with('msg', '注册失败')->withInput();
            }
        }
        return Redirect::back()->with('msg', '注册失败')->withInput();
    }


    /**
     * 退出登录
     */
    function quit()
    {
        Session::forget('member');
        Session::forget('cartCount');
        return Redirect::to('member');
    }


    /**
     * @return mixed
     * 发送短信
     */
    function sendSms()
    {

        $input = trimValue(Input::all());
        //getCode( $phone, $type, $data = null );
        return sms::getCode($input['phone'], 1);
        //Session::put('smsCode',$code,5);

    }

    /**
     *
     */
    function resetPass()
    {
        if (!Input::all()) {
            return $this->view('frontend.reset_pass');
        }

        //接受更新数据

        $input = trimValue(Input::all());


        $res = Source_User_UserInfo::where('mobile_phone', $input['phone'])
            ->first()
            ->update(['password' => $input['password']]);

        if ($res == true) {
            return Redirect::to('member');
        } else {
            return Redirect::back()->with('msg', '更改失败！');
        };

    }
}
