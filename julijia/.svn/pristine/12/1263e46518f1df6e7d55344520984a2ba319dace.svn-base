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
     * 用户手机 用户名都可以登录
     */
    function login($url = null)
    {

        //$url 要跳转的页面
        $url = $url ? decode($url) : '';

        //已登录
        if (isset(Session::get('member')->id)) {
            return Redirect::to('member');
        }

        return $this->view('frontend.login', compact('url'));
    }


    public function loginVerify()
    {


        $username = Input::get('name');
        $password = Input::get('password');

        $url = Input::get('url');
        if (Input::get('_token') != csrf_token()) {
            return Redirect::back()->with('msg', '登录失败')->withInput();
        }
        $res = User::login($username, $password);
        if ($res) {

            //更新上次登录时间
            $user = User::getUserByName(Input::get('name'))
                ->orwhere('mobile_phone', Input::get('name'))
                ->first();


            $user->update(array('last_time' => date('Y-m-d h:m:s'), 'last_ip' => clientIP()));
            // 存入session
            Session::put('member', $user);

            if (empty($url)) {
                return Redirect::to('member');
            }

            return Redirect::to($url);
        }
        return Redirect::back()->with('msg', '登录失败')->withInput();
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

            if (Source_User_UserInfo::where('mobile_phone', $input['mobile_phone'])->count()) {
                $err[] = '该手机号码已经占用！';
            }

            $res = User::validatorUser($input);
            $res ?: $err = array_merge($res->all(), $err);
            if ($res === true && $err != []) {
                User::addUser($input);
                $user = User::getUserByName(Input::get('name'))->first();
                $user->update(array('last_time' => date('Y-m-d h:m:s'), 'last_ip' => clientIP()));
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
        $code = sms::create_code();
        $content = "居利家温馨提示:您注册验证码为：" . $code . "请勿向他人泄 露！";
        $res = sms::SendSms($input['phone'], $content);

        Session::put('smsCode', $code);
        if ($res == 1) {
            return '发送验证码成功';
        } else {
            return '发送验证码！请重新获取！';
        }
    }

    /**
     * 发送短信 重置密码
     */
    function sendReSms()
    {
        //确认此手机号码已经注册
        $input = trimValue(Input::all());

        $phone = $input['phone'];
        $user = Source_User_UserInfo::where('mobile_phone', $phone)->first();
        if (empty($user)) {
            return '此手机号并未注册！';
        }

        $code = sms::create_code();
        $content = "居利家温馨提示:您注册验证码为：" . $code . "请勿向他人泄 露！";
        $res = sms::SendSms($input['phone'], $content);

        Session::put('smsCode', $code);
        if ($res == 1) {
            return '发送验证码成功';
        } else {
            return '发送验证码！请重新获取！';
        }
    }

    /**
     * @return mixed
     * 验证短信验证码
     */
    function checkSms()
    {
        //判断session中是否有smsCode的信息
        if (!Session::has('smsCode')) {
            //验证失败
            $res = [
                'info' => '验证码错误',
                'status' => 'n'
            ];
            return $res;
        }

        //验证码 验证
        $smsCode = Session::get('smsCode');
        $code = Input::get('param');
        if ($code != $smsCode) {
            $res = [
                'info' => '验证码错误',
                'status' => 'n'
            ];
        } else {
            $res = [
                'info' => '验证成功！',
                'status' => 'y'
            ];
        }
        return $res;
    }


    /**
     *重设密码
     */
    function resetPass()
    {
        if (!Input::all()) {
            return $this->view('frontend.reset_pass');
        }
        //接受更新数据
        $input = trimValue(Input::all());
        $res = Source_User_UserInfo::where('mobile_phone', $input['phone'])
            ->update(['password' => encode($input['newPassword'])]);

        if ($res == true) {
            return Redirect::to('member');
        } else {
            return Redirect::back()->with('msg', '更改失败！');
        };
    }

    /**
     * 验证用户名是否被占用
     */
    public function checkName()
    {
        $sql = Source_User_UserInfo::where('name', Input::get('param'))->count();

        if ($sql < 1) {
            $res = [
                'info' => '该用户名可以使用',
                'status' => 'y'
            ];
        } else {
            $res = [
                'info' => '已经被注册',
                'status' => 'n'
            ];
        }
        return json_encode($res);
    }

    /**
     * 验证手机是否被占用
     */
    public function checkMobile()
    {
        $sql = Source_User_UserInfo::where('mobile_phone', Input::get('param'))->count();

        if ($sql < 1) {
            $res = [
                'info' => '验证成功',
                'status' => 'y'
            ];
        } else {
            $res = [
                'info' => '该手机号码已经被注册',
                'status' => 'n'
            ];
        }
        return json_encode($res);
    }

    /**
     * 验证手机是否被占用
     */
    public function checkEmail()
    {
        $sql = Source_User_UserInfo::where('email', Input::get('param'))->count();

        if ($sql < 1) {
            $res = [
                'info' => '验证成功',
                'status' => 'y'
            ];
        } else {
            $res = [
                'info' => '该邮箱已经被注册',
                'status' => 'n'
            ];
        }
        return json_encode($res);
    }

}
