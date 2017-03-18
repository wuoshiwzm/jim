<?php
//用户积分管理
class HistoryMemberController extends CommonController
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
    }

    /**
     * 我的足迹
     *
     * @return Response
     */
    public function index()
    {

        //分页
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$memberPage;
        $data = Source_System_Log_VisitorsLog::where('user_id',Session::get('member')->id)
            ->where('type',1)
            ->paginate($setPage);
        $set['setpage'] = $setPage;

        return $this->view('member.history',compact('data', 'set'));
    }



}
