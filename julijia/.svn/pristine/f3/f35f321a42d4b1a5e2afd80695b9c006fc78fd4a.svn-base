<?php

//用户积分管理
class ConfigMemberController extends CommonController
{
    private $user_id;
    protected $layout = 'layouts.member.index';


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

    function __construct()
    {
        if (!Session::has('member')) {
            return Redirect::to('member/login');
        }
        $userInfo = Session::get('member');
        $this->user_id = $userInfo->id;
        $province = Source_Area_Province::get();
        View::share(array('province' => $province));
    }

    /**
     * 个人设置
     *
     * @return Response
     */
    public function index()
    {
        //获取当前用户信息


        $userInfo = User::getUserinfoById($this->user_id);
         $addres['province'] = Source_Area_Province::where('provinceID',$userInfo->province)->first();
         $addres['city'] = Source_Area_City::where('cityID',$userInfo->city)->first();
         $citylist  = Source_Area_City::where('parent',$userInfo->province)->get();
         $addres['area'] = Source_Area_Area::where('areaID',$userInfo->area)->first();
          $arealist  = Source_Area_Area::where('parent',$userInfo->city)->get();
          return $this->view('member.config', compact('userInfo','addres','citylist','arealist'));

    }

    /**
     * 更改用户信息
     */
    public function store()
    {

        if(csrf_token()==Input::get('_token')){
            $input = array_except(trimValue(Input::all()), ['_token']);
            $res = DB::transaction(function () use ($input) {
                Source_User_UserInfo::where('id', $this->user_id)->update($input);
            });
        }
        if (empty($res)) {
            return Redirect::to('/member/config/index')->with('msg','更新成功');
        }else{
            return Redirect::to('/member/config/index')->with('msg','更新失败');
        }

    }

    /**
     * 更改密码
     */
    public function changePass()
    {
        // 提交数据
        if (Input::all()) {

            $input = trimValue(Input::all());

            $passOld = encode($input['pass_origin']);//输入的原始密码
            $passNew = encode($input['pass_new']);//新密码

            $passNow = Session::get('member')->password;//当前的密码

            //原始密码输入正常
            if ($passOld != $passNow)
                return Redirect::back()->with('msg', '原始密码错误');

            //更新密码
            $res = Source_User_UserInfo::where('id',$this->user_id)
            ->update([
                'password'=>$passNew
            ]);

            if (!$res){
                return Redirect::back()->with('msg', '更新失败');
            }

            //修改成功， 退出重新登录
            Session::forget('member');
            Session::forget('cartCount');
            return Redirect::to('member');

        }
        return $this->view('member.config_pass');
    }

    /**
     * 测试更改密码的原始密码
     */
    public function checkPass()
    {
//        dd(Input::all());

        $passInput = encode(Input::get('param'));
        $passNow = Session::get('member')->password;


        if ($passInput != $passNow) {
            $res = [
                'info' => '原始密码错误',
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
     * 网站提醒
     */
    public function notice()
    {

        //分页
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$memberPage;
        $data = Source_User_UserInfoLog::where('user_id', $this->user_id);
        $set['setpage'] = $setPage;


        $data = $data->paginate($setPage);
        return $this->view('member.config_notice', compact('data', 'set'));

    }

    public function  UploadHeader(){
        $name =  Input::get('path');
        (new Upload())->uploadProductImage(Session::get('member')->id, $name, 'user');
        $user =  Source_User_UserInfo::find(Session::get('member')->id);
        $user->header=$name;
        $res =  $user->save();
        $obj = new stdClass();
        if($res){
            $obj->path = Config::get('tools.imagePath').'/user/'.Session::get('member')->id.'/'.$name;
            return json_encode($obj);
        }
        $obj->path='0';
        return json_encode($obj);;
    }


}
