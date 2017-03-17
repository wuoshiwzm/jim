<?php
//用户积分管理
class RankMemberController extends CommonController
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
     * 会员积分页面
     *
     * @return Response
     */
    public function index()
    {
        //获取当前用户信息
        $userInfo = User::getUserinfoById($this->user_id);

        //更新用户的等级
        $group = Source_User_UserInfoGroup::where('beg_points','<',$userInfo->user_points)
            ->where('end_points','>',$userInfo->user_points)->orderBy('beg_points','desc')->first();


        if($group && $group->id != $userInfo->group_id){
            Source_User_UserInfo::where('id',$userInfo->id)->update([
                'group_id'=>$group->id
            ]);
        }



        //当前对应的用户等级信息
        $memberGroupInfo = Group::getGroupById($userInfo->group_id);
        //当前可用积分
        $pointsAvailable = $userInfo->user_points - $userInfo->pay_points;






        //获取所有会员积分信息
        $allGroup = Group::getGroup();



        //确认最接近的的一个用户等级
        //目前用户的总积分
        $userPoint = $userInfo->user_points;
        $nextGroup = $allGroup->where('beg_points','>',$userPoint)
            ->orderBy('beg_points','asc')->first();
//
//        if(!empty($nextGroup)){
//            $nextGroup[] = $nextGroup->name;
//            $nextGroupGap = $nextGroup->beg_points - $userPoint;
//        }

        $allGroup = Group::getGroup()->get();

        //如果用户已经是最高等级




        return $this->view('member.rank',
            compact('pointsAvailable','nextGroup','allGroup','memberGroupInfo','userInfo'));

    }



}
