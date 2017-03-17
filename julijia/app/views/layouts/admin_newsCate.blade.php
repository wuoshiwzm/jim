<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta content="" name="description">
    <meta content="" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/iconfont.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/bootstrap-switch.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/common.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
    @yield('admincss')
    <script type="text/javascript" src="{{url('js/public/jquery/jquery-1.9.1.min.js')}}"></script>

    <!--[if lt IE 9]>
    <script type="text/javascript" src="../js/html5shiv.min.js"></script>
    <script type="text/javascript" src="../js/respond.min.js"></script>
    <![endif]-->

</head>
<body class="pace-done">
<!-- 内容开始 -->
@yield('content')
<!-- 内容结束 -->

<!--底部-->
<div class="copyright">
    <div class="text-c">
        <p></p>
        <p>
            Copyright © 2016-2026 曼蒂税保 - 版权所有
        </p>
    </div>
</div>
<!-- 底部js -->
<script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
<script type="text/javascript" src="{{url('js/public/Validform/Validform_v5.3.2_min.js')}}"></script>
<script type="text/javascript" src="{{url('js/public/Validform/public.js')}}"></script>
<!-- 表单验证公共js -->
<script type="text/javascript" src="{{url('js/admin/adminpublic.js')}}"></script>
@yield('footer_js')
</body>
</html>
