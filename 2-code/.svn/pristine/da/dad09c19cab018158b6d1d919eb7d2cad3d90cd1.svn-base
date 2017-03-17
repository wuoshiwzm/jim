<?php
/**
 * 控制器问价说明：
 *   1.网站管理后台控制器所有内容放置在AdminRoute.php 文件中。
 *   2.网站普通用户会员中心控制器放置在MemberRoute.php 文件中.
 *   4 前端控制器控制器存放在本文件中routes.php。
 *   3.如果需要对控制器二次分组，第二次分组以功能模块划分。会员中心放置在 /Routes/Member/file_name.php。
 *     后台以此类推.
 *  说明时间：2016.12.10
 */
Route::group(array('domain' => 'shop.julijia.cn'), function () {

    //此位置放置所有前端的控制器
    //首页
    Route::get('/', 'HomeController@GetIndex');
    //列表页或者详情页
    Route::get('/{name}.html{str?}','HomeController@ListOrDetails');
    //js检索运费
    Route::get('/get/freight','HomeController@getFreight');
    //产品搜索
    Route::get('/Search{keyword?}','HomeController@searchList');
    //收藏
    Route::post('/goods/keep','KeepAndCartController@keep');
    //加入购物车
    Route::post('/goods/collect','KeepAndCartController@shoppingCart');
    //购物车确认订单
    Route::post('/goods/settlement','AuctionBuyController@settlement');
    //购物车下订单
    Route::get('/order/confirm_order.html{order?}','AuctionBuyController@cartOrder');
    //购物车下单支付
    Route::post('/confirmorder/save','AuctionBuyController@cartOrderSave');

    //立即购买post转get
    Route::post('/goods/purchase','AuctionBuyController@purchase');
    //立即购买
    Route::get('/auction/buy_now.html{pid?}','AuctionBuyController@auctionBuyNow');
    //立即下单支付
    Route::post('/noworder/save','AuctionBuyController@nowOrderSave');

    //不登录购买
    Route::post('/goods/dontlogin/purchase','DontLogInPurchase@purchase');
    Route::get('/dontlogin/buy_now.html{pid?}','DontLogInPurchase@auctionBuyNow');
    Route::post('/dontlogin/ordersave','DontLogInPurchase@nowOrderSave');
    Route::post('/dontlogin/ordersms','DontLogInPurchase@nowOrderSms');

    //支付同步通知回调
    Route::get('/pay/return','AlipayController@pay_return');
    //支付异步通知回调
    Route::post('/pay/notify','AlipayController@pay_notify');

    //修改收货默认地址
    Route::post('/order/address','AuctionBuyController@defaultAddress');
    //添加收货地址
    Route::any('/order/saveaddress','AuctionBuyController@saveAddress');
    //修改收货地址
    Route::any('/order/editaddress','AuctionBuyController@editAddress');


    //用户登录
    Route::any('member/login/{url?}', 'MemberController@login');
    //用户登录验证
    Route::any('member/login_verify', 'MemberController@loginVerify');
    //验证用户名
    Route::any('member/login_check/ajax_check_name', 'MemberController@checkLoginName');
    //用户注册
    Route::get('member/register', 'MemberController@register');
    //用户名验证
    Route::any('member/register/check_name', 'MemberController@checkName');
    //用户手机号码验证
    Route::any('member/register/check_mobile', 'MemberController@checkMobile');
    //用户邮箱验证
    Route::any('member/register/check_email', 'MemberController@checkEmail');
    Route::post('user/store', 'MemberController@store');
    Route::get('member/logout', 'MemberController@quit');
    Route::get('member/store', 'MemberController@store');
    //发送短信
    Route::any('member/send_sms', 'MemberController@sendSms');
    //用户短信验证
    Route::any('member/register/check_sms', 'MemberController@checkSms');
    //发送短信 重置密码
    Route::any('member/send_resms', 'MemberController@sendReSms');
    //找回密码
    Route::any('member/reset_pass', 'MemberController@resetPass');
    Route::any('member/reset_pass', 'MemberController@resetPass');
    Route::any('page/{url}.html', 'CmsfrontController@PageIndex');


    //微信支付
    Route::any('/weixin/geturl','WechatController@index');
    Route::any('/weixin/notify','WechatController@notify');
    Route::get('/weixin/status/{orderId}','WechatController@getStatus');
    
    
    //获取省份信息
    Route::any('/getProvince', 'LocationController@getProvince');
    //获取城市信息
    Route::any('/getCity', 'LocationController@getCity');
    //获取区域信息
    Route::any('/getArea', 'LocationController@getArea');

    //用户中心页（会员中心）面控制器文件组
    Route::group(array('prefix' => 'member', 'before' => 'member'), function ($router) {
        //会员模块
        require(__DIR__ . '/Routes/MemberRoute.php');
    });
    
    //加前缀访问
    Route::get('/admin',function(){
        return Redirect::action('IndexController@getIndex');
    });
    //后台用户登录
    Route::get("admin/login","UserController@login");
    //退出退出
    Route::get("admin/logout","UserController@logout");
    //后台登录验证
    Route::post("admin/loginVerify","UserController@loginVerify");
    //后台管理控制器组，
    Route::group(array("prefix" => "admin",'before'=>'Authenticate' ), function ($router) {
        require(__DIR__ . '/Routes/AdminRoute.php');
    });
    //外部程序调用接口
    Route::controller('api', 'ApiController');
    //302定向
    Route::get('/error', 'ErrorController@Index');
});
