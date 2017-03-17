<?php

// use app\controllers\user\user\LeonEvent;

class CartMemberController extends CommonController
{

    private $carts;

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

    /**
     * CartMemberController constructor.
     */
    function __construct()
    {

        $this->carts = Source_Cart_CartInfo::orderBy('created_at');
    }

    /**
     *购物车首页
     */
    function index()
    {

        //分页
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
        $set['setpage'] = $setPage;
        $data = $this->carts->paginate($setPage);
        $carts = $this->carts->get();

        return $this->view('member.cart.index', compact('carts', 'data', 'set'));
    }

    /**
     * 根据传入的购物车quoteSn数组 返回对应的折扣信息
     */
    function checkItems()
    {

        //获取对应 quoteSn数组
        $quoteSnArr = Input::get('quoteSns');

        //对应总的重量
        $weight = 0;
        //对应总的价格
        $money = 0;
        //对应对应总的折扣价格  减少的价格
        $discount = 0;

        foreach ($quoteSnArr as $item) {
            $money += $item->grand_total;
            $weight += $item->itemweight;
        }


    }


    /**
     * @param $weight
     * 总价和重量满减的确认
     */
    public function CheckDiscount($weight = 10, $money = 100)
    {


        //所有规则的数组
        /**
         * array (size=4)
         * 'type' => string 'weight' (length=6)
         * 'use_tiaojian' => string 'weight' (length=6)
         * 'yunsuanfu' => string '<' (length=1)
         * 'value' => string '20' (length=2)
         */

        //返回数组 ，如果有对应的折扣，第一个元素为生效的折扣规则，
        //第二个元素为对应的折扣金额，如果没有生效的折扣规则则为空


        $result = array();


        $allrule = Source_Salerule_FavoutableRule::whereNotNull('conditions_use')->get();

        foreach ($allrule as $rule) {

            //from_date to_date 检测
            if (time() <= strtotime($rule->from_date) || time() >= strtotime($rule->to_date)) {
                continue;
            }

            //status 状态 1生效 0 禁止
            if ($rule->status === 0) {
                continue;
            }

            //conditions_type规则类型  1满减 2 优惠券 3收银台 4 礼品

            //action_type使用类型 1 固定金额 2 百分比 3 买*件折扣

            //lssue_num 发行数量


            //use_person 使用人数
            if($rule->order->groupBy('user_id')->count() >= $rule->userd_num){
                continue;
            }

            //userd_num 使用次数
            if($rule->order->count() >= $rule->userd_num){
                continue;
            }

            //per_num 每人/每天使用
            //当天开始
            $dayStart = strtotime(date('Y-m-d',time()));
            //当天结束
            $dayEnd = date('Y-m-d H:m:s',$dayStart +24*60*60);
            //当天开始 date-time
            $dayStart = date('Y-m-d H:m:s',$dayStart);

            if($rule->order->where('use_time','>',$dayStart)
                    ->where('use_time','<',$dayEnd)
                    ->count() >= 1){
                continue;
            }

            //discount_amount 折抵金额计算

            $rul = json_decode($rule->conditions_use);
            if ($rul->type == 'weight') {

                //重量优惠
                if ($weight . "$rul->yunsuanfu" . $rul->value) {
                    $rule->mark = 'slakjhflksadhlfkjhasldkjfhlasjhfd';
                }

            } elseif ($rul->type == 'manjian') {
                //金额满减

            }


            //节省的金额 额度
//            $rul['save'] = 1;
//            $ruleArr[] = $rul;
        }


    }


    /**
     * @param $couponCode 折扣郑号码
     * 折扣卷的确认
     */
    public function checkCoupon($couponCode)
    {

    }


}
