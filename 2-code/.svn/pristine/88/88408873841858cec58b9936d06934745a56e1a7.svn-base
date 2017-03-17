<!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>曼蒂商城平台管理中心</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">

    <!-- 网站头像 -->
    <link rel="icon" type="image/x-icon" href="{{url('/css/images/icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/css/images/icon.png')}}">

    <!-- ================== 框架和特效样式 ================== -->
    <link type="text/css" rel="stylesheet" href="{{url('/css/admin/iconfont.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/css/admin/bootstrap.min.css')}}">

    <!-- ================== 页面样式 ================== -->
    <link type="text/css" rel="stylesheet" href="{{url('/css/admin/loaders.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/css/admin/common.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/css/admin/index.css')}}">

    <!--[if lt IE 9]>
    <script type="text/javascript" src="/js/admin/html5shiv.min.js'"></script>
    <script type="text/javascript" src="/js/admin/respond.min.js"></script>
    <![endif]-->

    {{--<script type="text/javascript" src="/js/public/juqery/jquery-1.9.1.min.js"></script>--}}
    <script type="text/javascript" src="/js/admin/jquery.js"></script>
    <!-- ================== 下拉框样式 ================== -->
    <link rel="stylesheet" href="{{url('/js/public/layer/skin/layer.css')}}" id="layui_layer_skinlayercss">
    <link rel="stylesheet" href="{{url('/js/public/layer/skin/layer.ext.css')}}" id="layui_layer_skinlayerextcss">
</head>
<body class="pace-done" id="c1">

<!--[if IE]>
<div class="ie-warning">什么？您还在使用 Internet Explorer (IE) 浏览器？ 很遗憾，我们已不再支持IE浏览器。事实上，升级到以下支持HTML5的浏览器将获得更牛逼的操作体验：<a href="http://www.mozillaonline.com/">Firefox</a> / <a href="http://www.google.com/chrome/?hl=zh-CN">Chrome</a> / <a href="http://www.apple.com.cn/safari/">Safari</a> / <a href="http://www.operachina.com/">Opera</a>，
    赶紧升级浏览器，让操作效率提升80%-120%！
</div>
<![endif]-->
<!--顶部菜单-->
<div class="admincp-header" id="main-navbar-top">
    @include('admin.public.top')

</div>
<div class="admincp-container main-wrapper-design-mode wpst-toolbar-show fold">
    <!--左侧内容-->
    <!--PC端、Paid端导航效果-->
    @include('admin.public.left')
    <!--右侧内容-->
    <div class="admincp-container-right">

        <!--缓载div-->
        <div class="loading" id="page-load" style="display: none;">
            <div class="loader">
                <!-- 样式：ball-beat、ball-pulse-sync -->
                <div class="loader-inner ball-beat">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        @yield('right')


    </div>
</div>

<!-- ================== BEGIN BASE  STYLE ================== -->
<script type="text/javascript" src="/js/admin/jquery.cookie.js"></script>
<script type="text/javascript" src="/js/admin/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/admin/bootstrap-switch.min.js"></script>
<!-- ================== END BASE CSS STYLE ================== -->

<script type="text/javascript" src="/js/admin/main.js"></script>
</body></html>