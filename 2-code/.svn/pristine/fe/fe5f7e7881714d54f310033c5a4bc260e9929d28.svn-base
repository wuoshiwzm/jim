<?php
//评价
class ReviewMemberController extends CommonController
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
     * 我的评价
     *
     * @return Response
     */
    public function index()
    {
        //当前对应的用户评价信息
        $data = Review::getReviewByUser($this->user_id);
        $feedbackInfos = Review::getReviewByUser($this->user_id)->get();

        //获取对应商品名称
        foreach ($feedbackInfos as $feedback){
            $feedback->itemName = Order::getOrderItemsById($feedback->item_id)->product_name;
        }

        //分页
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
        $data = $data->paginate($setPage);
        $set['setpage'] = $setPage;

        //搜索条件
        if (!empty(Input::all())) {
            die('input here');
        }

        return $this->view('member.review', compact('feedbackInfos', 'data', 'set'));

    }


    /**
     * @param $orderId 订单id
     * @param $ItemId 订单商品id
     * 提交评价
     * url : 'get('/review/apply_review/{order_id}/{item_id}', 'ReviewMemberController@applyReview')'
     */
    public function applyReview($orderId, $ItemId)
    {


        $orderId = decode(trim($orderId));
        $ItemId = decode(trim($ItemId));

        $orderInfo = Order::getOrdersById($orderId);
        $orderItem = Order::getOrderItemsById($ItemId);


        return $this->view('member.order.apply_review', compact('orderItem', 'orderInfo'));

    }



    /**
     * 存储评价信息  更新表 order_review
     */
    public function createReview()
    {

        //$user = Session::get('member');
//        dd(Input::all());

        if (!Input::all())
            return Redirect::back();

        $input = trimValue(Input::all());
        $input = array_except($input, ['_token', 'method']);

        $orderId = Input::get('orderId');
        $orderItemId = Input::get('itemId');

//        dd($input);

        //判断是否已经提交过了退款
        if (Review::CheckItem($orderId, $orderItemId)) {
            die('已经提交过此商品的评论');
        }



        $review['order_id'] = $orderId;
        $review['item_id'] = $orderItemId;
        $review['user_id'] = $this->user_id;
        $review['leavel'] = 3;
        $review['content'] = Input::get('content');
        $review['status'] = 0;

        $validator = Review::validatorReview($input);

        if ($validator === true) {
            $res = Review::createReview($review);

            if ($res) {
                //添加成功

                return Redirect::to('member/review')->with('msg', '添加成功');

            } else {
                //添加失败
                return back()->with('msg', '添加失败');
            }

        } else {
            return back()->withErrors($validator);
        }
    }







}
