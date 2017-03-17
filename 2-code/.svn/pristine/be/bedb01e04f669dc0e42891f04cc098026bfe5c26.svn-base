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
        $this->user_id = $userInfo->id;
    }

    /**
     * 所有收藏
     *
     * @return Response
     */
    public function index()
    {
        //获取收藏商品
        $collects = User::getCollectByUser($this->user_id)->get();

        //获取收藏商品的图片
        foreach($collects as $collect){
            $productInfo = Product::getProductById($collect->entity_id);
            $collect->pic = $productInfo->small_image;
        }
        return $this->view('member.collect', compact('collects'));
    }

    public function notShow()
    {
        //获取收藏商品
        $collects = User::getCollectByUser($this->user_id)->get();

        //获取收藏商品的图片
        foreach($collects as $collect){
            if($collect->is_show == 1){
                $collect->forget;
                continue;
            }
            $productInfo = Product::getProductById($collect->entity_id);
            $collect->pic = $productInfo->small_image;
        }
        return $this->view('member.collect_unshow', compact('collects'));
    }


}
