<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>商城-登录</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">

    <!-- 网站头像 -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/images/icon.png')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/admin/iconfont.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/frontend/css_all.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/frontend/login.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/frontend/layui.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/admin/layer.css')}}">


    @yield('css')
</head>
<body>
<!-- header start -->
<div class="g-header g-header02">
    <div class="m-nav">
        <div class="width_center">
            <!--切换城市-->
            <div class="m-city">
                <a href="##">商城首页</a>
            </div>
            <!--/切换城市-->
            <div class="login">
                <div class="login_div">
                    @if(Session::has('member'))
                        <span id="ge_login"><a href="{{url('member')}}"
                                               rel="nofollow">{{Session::get('member')->name}}</a></span>
                        <span><a href="{{url('member/quit')}}" rel="nofollow">退出</a></span>
                        <span><a href="{{url('member/order/all')}}" rel="nofollow">我的订单</a></span>
                        <span><a href="{{url('member')}}" rel="nofollow">个人中心</a></span>
                    @endif
                </div>
            </div>

            <div class="clear"></div>
        </div>
    </div>
    <div class="top-content">
        <div class="m-logo">
            <a href="index.html" title="logo" target="_blank" rel="nofollow"><img
                        src="{{asset('images/frontend/logo03.png')}}" alt="logo"/></a>
            <h1>养老商城</h1>
        </div>

        <!-- 搜索 -->
        <div class="list_nav_so">
            <div class="er_so">
                <form class="m-form">
                    <input type="text" placeholder="找宝贝" class="input"/>
                    <input type="button" class="u-btn" value="搜索"/>
                    <div class="clear"></div>
                </form>
                <span><a href="##" class="color_red">制氧机</a><a href="##">代步车</a><a href="##"
                                                                                   class="color_red">电动轮椅</a><a
                            href="##">血糖仪</a><a href="##">血压计</a><a href="##">木制柺杖</a><a href="##">足浴盆</a><a href="##">血糖仪</a><a
                            href="##">血压计</a><a href="##">木制柺杖</a></span>
            </div>

            <div class="er_che">
                <div class="er_che_di">
                    <font>0</font><a href="##">我的购物车</a>
                </div>
            </div>
        </div>

        <!-- 主导航 -->
        <div class="list_nav">
            <ul>
                <li><a href="##">首 页</a></li>
                <li class="current"><a href="##">出行代步</a></li>
                <li><a href="##">健康监测</a></li>
                <li><a href="##">健康护理</a></li>
                <li><a href="wen.html">常见问题</a></li>
            </ul>
        </div>
        <div class="banner_nav02">
            <div class="banner_left">
                <div class="banner_left_h2">
                    <h2>商品分类</h2>
                    <ul id="nav">
                        <li class="mainCate ">
                            <h3><font><img src="../images/img01.png"></font><a href="#">出行代步</a></h3>
                            <p><a href="#">电动轮椅</a><a href="#">手动轮椅</a></p>
                            <div class="subCate" style="display: none;">
                                <h4>出行代步</h4>
                                <ul>
                                    <li><a href="#">存储卡数</a><a href="#">池苹果</a><a href="#">电源</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">手机壳</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">周边移动</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">耳机</a><a
                                                href="#">电器手机</a><a href="#">件手机饰品</a><a href="#">耳机手</a><a href="#">机支架车</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">贴膜手机</a></li>
                                </ul>

                                <h4>电轮椅</h4>
                                <ul>
                                    <li><a href="#">手机电</a><a href="#">创意配</a><a href="#">据线充</a><a href="#">载配件</a><a
                                                href="#">拍照配件</a><a href="#">茅台</a><a href="#">蓝牙</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a></li>

                                </ul>
                            </div>
                        </li>

                        <li class="mainCate ">
                            <h3><font><img src="../images/img01.png"></font><a href="#">出行代步</a></h3>
                            <p><a href="#">电动轮椅</a><a href="#">手动轮椅</a></p>
                            <div class="subCate" style="display: none;">
                                <h4>出行代步</h4>
                                <ul>
                                    <li><a href="#">存储卡数</a><a href="#">池苹果</a><a href="#">电源</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">手机壳</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">周边移动</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">耳机</a><a
                                                href="#">电器手机</a><a href="#">件手机饰品</a><a href="#">耳机手</a><a href="#">机支架车</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">贴膜手机</a></li>
                                </ul>

                                <h4>电轮椅</h4>
                                <ul>
                                    <li><a href="#">手机电</a><a href="#">创意配</a><a href="#">据线充</a><a href="#">载配件</a><a
                                                href="#">拍照配件</a><a href="#">茅台</a><a href="#">蓝牙</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a></li>

                                </ul>
                            </div>
                        </li>

                        <li class="mainCate ">
                            <h3><font><img src="../images/img01.png"></font><a href="#">出行代步</a></h3>
                            <p><a href="#">电动轮椅</a><a href="#">手动轮椅</a></p>
                            <div class="subCate" style="display: none;">
                                <h4>出行代步</h4>
                                <ul>
                                    <li><a href="#">存储卡数</a><a href="#">池苹果</a><a href="#">电源</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">手机壳</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">周边移动</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">耳机</a><a
                                                href="#">电器手机</a><a href="#">件手机饰品</a><a href="#">耳机手</a><a href="#">机支架车</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">贴膜手机</a></li>
                                </ul>

                                <h4>电轮椅</h4>
                                <ul>
                                    <li><a href="#">手机电</a><a href="#">创意配</a><a href="#">据线充</a><a href="#">载配件</a><a
                                                href="#">拍照配件</a><a href="#">茅台</a><a href="#">蓝牙</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a><a
                                                href="#">茅台</a><a href="#">茅台</a><a href="#">茅台</a></li>

                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>


    </div>
</div>
<!-- /header end -->
@yield('content')



<!-- 底部开始 -->
<div class="g-footer">
    <div class="footer_nav">
        <div class="footer_nav_left">
            <h2>400-619-9909</h2>
            <div class="link_about_left_ul">
                <ul>
                    <li><a href="http://www.julijia.cn/website/aboutus.html" target="_blank" title="关于我们"
                           rel="nofollow">关于我们</a></li>
                    <li>|</li>
                    <li><a href="http://www.julijia.cn/website/copyright.html" target="_blank" title="版权声明"
                           rel="nofollow">版权声明</a></li>
                    <li>|</li>
                    <li><a href="http://www.julijia.cn/website/common.html" target="_blank" title="常见问题" rel="nofollow">常见问题</a>
                    </li>
                    <li>|</li>
                    <li><a href="http://www.julijia.cn/website/disclaimer.html" target="_blank" title="免责声明"
                           rel="nofollow">免责声明</a></li>
                    <li>|</li>
                    <li><a href="http://www.julijia.cn/website/contact.html" target="_blank" title="联系我们"
                           rel="nofollow">联系我们</a></li>
                    <li>|</li>
                    <li><a href="http://www.julijia.cn/website/cooperation.html" target="_blank" title="合作共赢"
                           rel="nofollow">合作共赢</a></li>
                    <li>|</li>
                    <li><a href="http://www.julijia.cn/website/agreement.html" target="_blank" title="用户协议"
                           rel="nofollow">用户协议</a></li>
                    <li>|</li>
                    <li><a href="http://www.julijia.cn/website/recruit.html" target="_blank" title="招聘岗位"
                           rel="nofollow">招聘岗位</a></li>
                </ul>
            </div>
            <div class="link_a">
                <h3>友情链接</h3>
                <ul>
                    <li><p><a href="http://www.ftxk.cn/zhuanti/ljdtdan/" target="_blank" title="老君定痛丹价格"><span
                                        style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;">老君定痛丹价格<br/></span></a>
                        </p></li>
                    <li><p><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;"><a href="http://www.julijia.cn"
                                                                                          target="_blank" title="养老网"
                                                                                          textvalue="养老网">养老网<br/></a></span>
                        </p></li>
                    <li><p><a href="http://www.chinaasta.com" target="_blank" title="天然虾青素"><span
                                        style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;">天然虾青素<br/></span></a></p>
                    </li>
                    <li><p><a href="http://www.heigaoyao88.com" target="_blank" title="黑膏药加工" textvalue="黑膏药加工"><span
                                        style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;">黑膏药加工<br/></span></a></p>
                    </li>
                    <li><p><a href="http://health.ypk.com.cn" target="_blank" title="药品库健康频道" textvalue="药品库健康频道"><span
                                        style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;">药品库健康频道<br/></span></a>
                        </p></li>
                </ul>
            </div>
        </div>
        <div class="footer_nav_right">
            <span><a href="http://www.julijia.cn/website/contact.html" target="_blank" rel="nofollow"><img
                            src="../images/abuot.png"/></a></span>
            <p><a href="javascript:;"><img src="../images/er.jpg"/></a><font>微信平台</font></p>
        </div>
    </div>
</div>
<div class="f-bottom">
    <div class="f-bottom_div">
        <p class="f-bottom_div_left"><span>邮箱: service@sxdaxin
                .com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客服热线: 400-619-9909 </span>
            <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                document.write(unescape("%3Cspan id='cnzz_stat_icon_1259915913'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259915913%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
            <a href="javascript:;" class="gongshang" target="_blank"><img src="/images/green/gs_icon.png" height="40"
                                                                          width="32" alt="西安工商"/></a>
        </p>
        <p class="f-bottom_div_right">Copyright@ 2015-2016&nbsp;&nbsp;陕西大信网络科技有限公司&nbsp;&nbsp;版权所有&nbsp;&nbsp;陕ICP备14011723号-5</p>
    </div>
</div><!-- 底部结束 -->

<link type="text/css" rel="stylesheet" href="{{asset('css/frontend/layui.css')}}">
<script type="text/javascript" src="{{url('js/public/jquery/jquery-1.9.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/public/Validform/Validform_v5.3.2_min.js')}}"></script>
<script type="text/javascript" src="{{url('js/frontend/er_admin.js')}}"></script>
<script type="text/javascript" src="{{url('js/frontend/rules.js')}}"></script>
<script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
<script type="text/javascript" src="{{url('js/frontend/layui.js')}}"></script>
<script>
    layui.use('form', function () {
        var form = layui.form(); //只有执行了这一步，部分表单元素才会修饰成功

        //……
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".spinner").hide();
    });//页面加载特效
</script>

@yield('js')

</body>


</html>