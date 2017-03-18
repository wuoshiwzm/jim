<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/10/31
 * Time: 19:13
 */?>

<a class="toggle-left-box">
    <i class="fa fa-bars"></i>
</a>
<!--logo信息-->
<div class="admincp-name">
    <h1 class="logo-image">
        <img src="{{url('/css/images/logo_admin.png')}}">
    </h1>
    <div id="foldSidebar" data-switch-toggle="state">
        <i class="arrow-right"></i>
    </div>
</div>
<!--顶级导航TAB-->
<div class="module-menu">
    <ul class="nav nav-tabs shop-row">

        <li class="active" data-param="product">
            <a href="index#product" data-toggle="tab">商城</a>
            <b class="arrow"></b>
        </li>

        <li class="" data-param="finance">
            <a href="index#finance" data-toggle="tab">财务</a>
            <b class="arrow"></b>
        </li>

        <li class="" data-param="supplier">
            <a href="index#supplier" data-toggle="tab">供应商</a>
            <b class="arrow"></b>
        </li>

        <li class="" data-param="app">
            <a href="index#app" data-toggle="tab">手机端</a>
            <b class="arrow"></b>
        </li>

        <li class="" data-param="system_sat">
            <a href="index#system_sat" data-toggle="tab">系统</a>
            <b class="arrow"></b>
        </li>

    </ul>
</div>

<div class="admincp-header-r animated" id="admin-cog">

    <!--提醒、主题、全部功能、清除缓存、查看店铺、退出-->
    <ul class="operate shop-row">
        <li class="top-menu" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="查看商城">
            <a href="##" class="top_icon homepage" target="_blank">
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
                                公共缓存
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="site_index">
                                网站首页
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="m_site_index">
                                微商城首页
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="shop_index">
                                店铺首页
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="m_shop_index">
                                微商城店铺首页
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="config">
                                系统配置
                            </label>
                        </li>

                        <li>
                            <label>
                                <input type="checkbox" name="codes[]" value="region">
                                地区缓存
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
            <a href="site/logout" class="top_icon login-out">
                <i></i>
                <span>退出</span>
            </a>
        </li>
    </ul>
    <!--个人信息-->
    <div id="personal_message" class="manager">
        <div class="manager-btn">
            <dl>
                <dt class="name">平台管理员</dt>
                <dd class="group">管理员</dd>
            </dl>
					<span class="avatar">
						<img src="../images/admin.jpg">
					</span>
            <i class="arrow"></i>
        </div>
        <div id="personal_message_panel" class="manager-menu dropdown-menu personal" style="display: none;">
            <span class="top-dropdown-bg"></span>
            <a class="close" title="点击关闭">×</a>
            <div class="title">
                <strong>最后登录</strong>
                <a class=" btn btn-warning btn-xs" >修改密码</a>
            </div>

            <div class="login-date">2016-09-30 17:06:09<span>（IP：100.109.222.57）</span></div>

            <div class="title" style="display: none">
                <strong>个人设置</strong>
                <a class="add-menu pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#allModal">添加菜单</a>
            </div>
            <ul class="shop-row" >
                <li>
                    <a href="javascript:void(0);">清理缓存</a>
                </li>
                <li>
                    <a href="javascript:void(0);">文章分类</a>
                </li>
                <li>
                    <a href="javascript:void(0);">文章管理</a>
                </li>
                <li>
                    <a href="javascript:void(0);">会员协议</a>
                </li>
                <li>
                    <a href="javascript:void(0);">广告管理</a>
                </li>
                <li>
                    <a href="javascript:void(0);">资讯设置</a>
                </li>
                <li>
                    <a href="javascript:void(0);">首页管理</a>
                </li>
                <li>
                    <a href="javascript:void(0);">导航管理</a>
                </li>
                <li>
                    <a href="javascript:void(0);">评论管理</a>
                </li>
            </ul>
        </div>
    </div>

</div>
<div class="clear"></div>
