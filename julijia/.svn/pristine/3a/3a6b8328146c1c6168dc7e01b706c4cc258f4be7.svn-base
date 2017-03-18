<?php

// use app\controllers\user\user\LeonEvent;

class MemberInfoController extends CommonController
{

    protected $layout = 'layouts.member';


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
     * @param $user_id 用户id
     * 显示会员列表
     */
    function index()
    {


        $userinfos = Source_User_UserInfo::orderBy('id', 'desc');
        /*dd($userinfos->count());*/
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;

        if (Input::get('keyword')) {
            $keyword = trim(Input::get('keyword'));
            $userinfos = $userinfos->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%')
                ->orWhere('office_phone', 'like', '%' . $keyword . '%')
                ->orWhere('mobile_phone', 'like', '%' . $keyword . '%')
                ->orWhere('home_phone', 'like', '%' . $keyword . '%')
                ->orWhere('alias', 'like', '%' . $keyword . '%');
        }

        if (Input::get('group')) {
            $group = Input::get('group');
            $lowGroup = Source_User_UserInfoGroup::orderBy('beg_points')->first();

            //普通会员
            if ($group == 1) {
                $userinfos = $userinfos->where('group_id', $lowGroup->id);
            } elseif ($group == 2) {
                $userinfos = $userinfos->where('group_id', '!=', $lowGroup->id);
            }

        }


        $data = $userinfos->paginate($setPage);
        $set['setpage'] = $setPage;

//        $userinfos = User::userlist();
        return $this->view('admin.member_info.index', compact('userinfos', 'data', 'set'));
    }


    /**
     * @param $user_id 用户id
     * 欢迎界面
     */
    function welc($user_id)
    {
        //用户详细信息
        $welc = User::getUserinfoById($user_id);
        //用户组信息
        $group = User::getGroup($user_id);

        $group_name = $group ? $group->name : '无分组Group信息';

        //用户地址信息
        $address = User::getUsingAddrByUser($user_id);
        return $this->view('admin.member_info.welc', compact('welc', 'group_name', 'address', 'user_id'));
    }


    /**
     * @param $user_id 用户id
     * 会员信息页
     */
    function info($user_id)
    {
        $user = User::getUserinfoById($user_id);
        $address = User::getUsingAddrByUser($user_id);
        //用户组信息
        $group = User::getGroup($user_id);
        $group_name = $group ? $group->name : '无分组Group信息';

        return $this->view('admin.member_info.info', compact('address', 'group_name', 'user', 'user_id'));
    }


    /**
     * @param $user_id 用户id
     * 收货地址
     */
    function address($user_id)
    {
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
//        $set['name'] = 'test';
        $set['setpage'] = $setPage;
        $user = User::getUserinfoById($user_id);
        $address = User::getAllAddrByUser($user_id);

        $data = $address->paginate($setPage);
        return $this->view('admin.member_info.address', compact('address', 'user', 'user_id', 'data', 'set'));
    }

    /**
     * @param $user_id 用户id
     * 用户订单
     */
    function orders($user_id)
    {

        $ordersInfo = User::getOrdersByUser($user_id);

        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
        $set['setpage'] = $setPage;
        $data = $ordersInfo->paginate($setPage);

        return $this->view('admin.member_info.orders', compact('user_id', 'data', 'set'));
    }

    /**
     * @param $user_id 用户id
     * 用户购物车
     */
    function cart($user_id)
    {
        //获取购物车信息
        $ordersInfo = User::getCartByUser($user_id);

        //分页
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
        $set['setpage'] = $setPage;
        $data = $ordersInfo->paginate($setPage);

        return $this->view('admin.member_info.cart', compact('user_id', 'data', 'set'));
    }

    /**,
     * @param $user_id 用户id
     * 用户收藏
     */
    function collect($user_id)
    {
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
        $list = Source_User_UserInfoCollect::where('user_id', $user_id)
            ->paginate($setPage);
        $set['setpage'] = $setPage;
        $set['user_id'] = $user_id;
        return $this->view('admin.member_info.collect', compact('list', 'user_id', 'set'));
    }

    /**
     * @param $user_id 用户id
     * 用户评价
     */
    function comment($user_id)
    {

        $comments = User::getCommentByUser($user_id);
        //分页
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
        $set['setpage'] = $setPage;
        $data = $comments->paginate($setPage);

        return $this->view('admin.member_info.comment', compact('user_id', 'data', 'set'));
    }

    /**
     * @param $user_id 用户id
     * 用户投诉
     */
    function feedback($user_id)
    {

        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
        $list = Source_Feedback_FeedbackInfo::where('user_id', $user_id)->with('user')->with('reason')
            ->paginate($setPage);
        $set['setpage'] = $setPage;
        $set['user_id'] = $user_id;
        return $this->view('admin.member_info.feedback', compact('user_id', 'list', 'set'));
    }

    /*用户导出*/
    function getUserList()
    {
        $data = Source_User_UserInfo::orderBy('id')->get();
    }



}
