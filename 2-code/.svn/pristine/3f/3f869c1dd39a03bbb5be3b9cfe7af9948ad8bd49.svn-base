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

        return $this->view('member.history');

        die('refund');

        //当前对应的用户退款信息
        $refundInfo = OrderBack::getRefundByUser($this->user_id);

        return $this->view('member.refund',compact('refundInfo'));




        //获取所有会员积分信息
        $allGroup = Group::getGroup();

        //确认最接近的的一个用户等级
        //目前用户的总积分
        $userPoint = $userInfo->user_points;
        $nextGroup = $allGroup->where('beg_points','>',$userPoint)
            ->orderBy('beg_points','asc')->first();
        $nextGroupName = $nextGroup->name;
        $nextGroupGap = $nextGroup->beg_points - $userPoint;

        $allGroup = Group::getGroup()->get();

        //如果用户已经是最高等级






    }



}
