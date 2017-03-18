<?php

class CollectMemberController extends CommonController
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
        View::share('userinfo',$userInfo);

        $this->user_id = $userInfo->id;

        if (!Session::has('member')) {
            return Redirect::to('member/login');
        }
        $userInfo = Session::get('member');
        $this->user_id = $userInfo->id;
        $this->orders = Source_Order_OrderInfo::where('user_id', $this->user_id);

        //计数信息
        $numAll = Source_User_UserInfoCollect::where('user_id',$this->user_id)->count();
        $numNotShow = Source_User_UserInfoCollect::where('user_id',$this->user_id)->where('is_show',0)->count();

        $collects = Source_User_UserInfoCollect::where('user_id',$this->user_id)->get();


        View::share('numAll', $numAll);
        View::share('numNotShow', $numNotShow);
    }

    /**
     * 所有收藏
     *
     * @return Response
     */
    public function index()
    {
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$memberPage;
        //获取收藏商品
        $collects = User::getCollectByUser($this->user_id)->paginate($setPage);;
        //获取收藏商品的图片
        foreach($collects as $collect){
            $productInfo = Product::getProductById($collect->entity_id);
            $collect->pic = Config::get('tools.imagePath') . 'goods/' . $productInfo->entity_id. '/' .$productInfo->small_image;
        }
        $set['setpage'] = $setPage;
        return $this->view('member.collect', compact('collects','set'));
    }

    public function notShow()
    {
        //获取收藏商品
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$memberPage;
        $collects = User::getCollectByUser($this->user_id,false)->paginate($setPage);;

        //获取收藏商品的图片
        foreach($collects as $collect){
            $productInfo = Product::getProductById($collect->entity_id);
            $collect->pic = Config::get('tools.imagePath') . 'goods/' . $productInfo->entity_id. '/' .$productInfo->small_image;
        }
        $set['setpage'] = $setPage;
        return $this->view('member.collect_unshow', compact('collects','set'));
    }


}
