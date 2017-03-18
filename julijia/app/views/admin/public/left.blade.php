<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/11/9
 * Time: 19:05
 */
?>
<div class="admincp-container-left vl-sidebar tab-content">
    <div class="top-border">
        <span class="nav-side"></span>
        <span class="sub-side"></span>
    </div>
    @foreach($top as $nav_top)
        <div id="{{$nav_top->navigation_id}}"
             @if ($nav_top->title == "商城")
                class="nav-tabs tab-pane active">
             @else
                class="nav-tabs tab-pane ">
             @endif
            <ul class="tab-bar">
                @foreach($two as $nav_two)
                    @if ($nav_two->parent_id == $nav_top->navigation_id)
                        <li class="J_ToolbarItem  SZY-MENU-2" href="#{{$nav_two->navigation_id}}" data-toggle="tab">
                            <div class="wrap J_TGoldData">
                                <div class="left-line"></div>
                                <b class="iconfont iconfont_f20">{{$nav_two->icon}}</b>
                                <div class="v-text">{{$nav_two->title}}</div>
                                <b class="fa fa-caret-left"></b>
                            </div>
                            <!-- 循环收缩的二级菜单 start -->
                            <div class="submenu">
                                <ul>
                                    @foreach($three as $nav_three)
                                        @if($nav_three->parent_id == $nav_two->navigation_id)
                                            <li><a href="javascript:void(0);" onclick="openMenu('{{$nav_three->link}}',this,'')">{{$nav_three->title}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!-- 循环收缩的二级菜单 END -->
                        </li>
                    @endif
                @endforeach
            </ul>
            <ul class="toolbar J_ModuleSlides">
                @foreach($two as $nav_two)
                <!-- 循环展开的二级菜单 BEGIN -->
                    @if ($nav_two->parent_id == $nav_top->navigation_id)
                        <li id="{{$nav_two->navigation_id}}" class="slide tab-pane ">
                            <div class="product-nav-list mCustomScrollbar ">
                                <ul>
                                    @foreach($three as $nav_three)
                                        @if ($nav_three->parent_id == $nav_two->navigation_id)
                                            <li>
                                                <a href="javascript:void(0);" onclick="openMenu('{{$nav_three->link}}',this,'')">
                                                    <div class="nav-title">
                                                        {{$nav_three->title}}
                                                        <em class="arrow-icon  fa fa-angle-right"></em>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endif
                @endforeach
                <!-- 循环展开的二级菜单 END  -->
            </ul>

        </div>
    @endforeach

    <!--展开收起菜单按钮-->
    <div class="navbar-collapse" data-switch-toggle="state">
        <a class="navbar-btn">
            <i class="fa fa-outdent"></i>
        </a>
    </div>
</div>
