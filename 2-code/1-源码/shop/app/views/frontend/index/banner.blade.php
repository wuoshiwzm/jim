<div class="banner">
    <!-- 幻灯片 -->
    <div class="home_news_pic">
        <div class="hd">
            <ul>
                @foreach( $banner as $bk=>$br )
                    <li></li>
                @endforeach
            </ul>
        </div>
        <div class="bd">
            <ul>
                @foreach( $banner as $brow )
                    <li><a href="{{$brow->type_value}}" style="width:100%; height:357px; display:block; background:url({{getImagesUrl('ads', $brow->pid, $brow->img)}}) no-repeat center 0px;" ></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- 菜单分类 -->
    <div class="banner_nav">
        <div class="banner_right">
            <h2>下单方式</h2>
            <h3>热线<br><span>400-619-9909 转 8001</span></h3>
            <ul>
                <li>
                    <font>1.</font> 访问网站直接下订单
                </li>
                <li>
                    <font>2.</font> 支持微商城下订单关注微商城随时获取最新信息
                </li>
                <li>
                    <div class="erweima"><span class="color_red">扫描二维码</span><br><span>关注微商城</span></div>
                </li>
                <li class="pinzhi">
                    <dl>
                        <dt class="baozhang_01"></dt>
                        <dd>正品保障</dd>
                    </dl>
                    <dl>
                        <dt class="baozhang_02"></dt>
                        <dd>快速发货</dd>
                    </dl>
                    <dl>
                        <dt class="baozhang_03"></dt>
                        <dd>无忧退货</dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /banner end -->