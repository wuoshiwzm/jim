<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/10/31
 * Time: 19:13
 */
$admin = Session::get('admin_user');

$group = Source_User_Suite::find($admin['group_id']);
isset($group)?$group:'';
?>

<a class="toggle-left-box">
    <i class="fa fa-bars"></i>
</a>
<!--logo信息-->
<div class="admincp-name">
    <h1 class="logo-image">
        <img src="{{getConfig('core','admin_website_logo')}}">
    </h1>
    <div id="foldSidebar" data-switch-toggle="state">
        <i class="arrow-right"></i>
    </div>
</div>
<!--顶级导航TAB-->
<div class="module-menu">
    <ul class="nav nav-tabs shop-row">
        @foreach($top as $nav_top)
            <li @if($nav_top->title == "商城") class="active" @endif
                data-param="{{$nav_top->navigation_id}}">
                <a href="index#{{$nav_top->navigation_id}}" data-toggle="tab">{{$nav_top->title}}</a>
                @if($nav_top->title == "商城")
                    <b class="arrow"></b>
                @endif
            </li>
        @endforeach

    </ul>
</div>

<div class="admincp-header-r animated" id="admin-cog">

    <!--提醒、主题、全部功能、清除缓存、查看店铺、退出-->
    <ul class="operate shop-row">
        <li class="top-menu" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="查看商城">
            <a href="/" class="top_icon homepage" target="_blank">
                <i></i>
                <span>商城</span>
            </a>

        </li>
        <li id="clear_cache" class="top-menu">

            <a href="javascript:void(0);" data-menus="system|system-setting|system-setting-cache" class="top_icon clear-cache" title="点击进行深度清理">
                <i></i>
                <span>清缓存</span>
            </a>

            <div id="clear_cache_panel" class="manager-menu dropdown-menu colorbg" style="display: none;">
                <span class="top-dropdown-bg"></span>
                <a href="javascript:void(0);" class="close" title="点击关闭">×</a>
                <div class="title">
                    <strong>清理缓存</strong>
                </div>
                <form id="cacheForm" action="index.html" method="POST">
                    <input type="hidden" name="_csrf" value="ejBKRjJ5VnpLcwIsdSllTEhoBAtROCUQHGkeBEJPIks4fXkpfzJ7Mw==">
                    <ul class="clear-cache-list">

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="common_runtime">
                                后台缓存
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="site_index">
                                网站前端
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="config">
                                广告/配置/友链
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="menus">
                                系统菜单
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="auths">
                                系统权限
                            </label>
                        </li>

                    </ul>
                    <div class="skin-setttings text-r p-t-5">
                        <label class="all-check">
                            <input type="checkbox" id="cache_all">
                            全选
                        </label>
                        <input type="button" id="btn_clear_cache" value="清理缓存" class="btn btn-warning btn-sm">
                    </div>

                </form>
            </div>
        </li>
        <li class="top-menu" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="退出">
            <a href="/admin/logout" class="top_icon login-out">
                <i></i>
                <span>退出</span>
            </a>
        </li>
    </ul>
    <!--个人信息-->
    <div id="personal_message" class="manager">
        <div class="manager-btn">
            <dl>
                <dt class="name">{{$admin['account']}}</dt>
                <dd class="group">{{$group->group_name}}</dd>
            </dl>
            <i class="arrow"></i>
        </div>
        <div id="personal_message_panel" class="manager-menu dropdown-menu personal" style="display: none;">
            <span class="top-dropdown-bg"></span>
            <a class="close" title="点击关闭">×</a>
            <div class="title">
                <strong> 最后登录 </strong>
                <a class=" btn btn-warning btn-xs user_mi" >修改密码</a>
            </div>

            <div class="login-date">{{isset($admin['last_login'])?$admin['last_login']:'暂无数据'}}</div>

            <div class="title" style="display: none">
                <strong>个人设置</strong>
                <a class="add-menu pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#allModal">添加菜单</a>
            </div>

        </div>
    </div>

</div>
<div class="clear"></div>
<style>
    /* css 重置 */
    *{margin:0; padding:0; list-style:none; }
    .phone{ padding:20px 30px 0px 30px; font-family:"微软雅黑";}
    .phone h1{ height:40px; line-height:34px; font-size:16px; color:##24A0D6; border-bottom:1px solid #24A0D6; }
    .phone ul { padding:20px; }
    .phone ul li{ height:44px; line-height:44px; font-size:16px;}
    .phone ul li font{  float:left; display:block; width:100px; text-align:right;}
    .phone ul li .txt{ height:30px;width:188px; padding:0 10px; line-height:30px; font-size:16px; border:1px solid #ddd;float:left; margin-top:6px;}
    .phone ul li .txt2{ width:100px;}
     ul li .textarea{ height:120px;width:340px; padding:6px 10px; line-height:30px; font-size:16px; border:1px solid #ddd;float:left; margin-top:6px;}
    .phone .button{ width:158px; color:#fff; height:36px; line-height:36px; background:#24A0D6; border:0;  margin-top:6px;font-weight:bold; font-size:16px; margin-top:16px;}
    #order_status{height:30px;width:210px; padding:0 10px; line-height:30px; font-size:16px; border:1px solid #ddd;float:left; margin-top:6px;}
</style>
<div class="phone" style="display:none">
    <h1>修改密码</h1>
    <form id="xiugaimima"  method="post">
        <ul>
            <li><font>原始密码：</font>
                <input name="oldpassword"  type="password" class="txt" autocomplete="off">
            </li>
            <li><font>新密码：</font>
                <input name="newpassword"   type="password" class="txt" autocomplete="off">
            </li>
            <li>
                <input type="button" value="确认"   class="button baocunmima">
        </ul>
    </form>

</div>
<script type="text/javascript" src="{{url('js/public/layer/layer.js')}}"></script>
<script>
    //重置密码//
    $('.user_mi').click(function(){
        layer.open({
            type: 1,
            title:false,
            shadeClose: true,
            shade: 0.6,
            zIndex:'-100',
            area: ['444px', '300px'],
            content:$(".phone")
    })});
    $(".baocunmima").click(function () {
         var data = $("#xiugaimima").serialize();
         $.post('/admin/manage/savepassword',data,function (msg) {
              msg=eval("("+msg+")") ;
             if(msg['status']){
                  layer.alert('密码修改成功，请重新登录');
                  location.href='/admin/logout';
             }else{
                 layer.alert('原始密码不正确，请确认原始密码或者与管理员联系');
                 location.reload();
             }
         })
    })
</script>