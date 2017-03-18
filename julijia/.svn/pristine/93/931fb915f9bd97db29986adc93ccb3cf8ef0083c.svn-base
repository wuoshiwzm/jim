@section('admincss')
  <link type="text/css" rel="stylesheet" href="{{url('css/admin/loaders.css')}}">
  <!-- ================== END BASE CSS STYLE ================== -->
  <!--[if lt IE 9]>
        <script type="text/javascript" src="../js/html5shiv.min.js"></script>
        <script type="text/javascript" src="../js/respond.min.js"></script>
      <![endif]-->
  <!-- ================== BEGIN BASE JS ================== -->

  <script type="text/javascript" src="{{url('js/public/js/jquery.js')}}"></script>

  <!-- ================== END BASE CSS STYLE ================== -->
  <!--[if lt IE 9]>
        <script type="text/javascript" src="../js/html5shiv.min.js"></script>
        <script type="text/javascript" src="../js/respond.min.js"></script>
      <![endif]-->
  <!-- ================== BEGIN BASE JS ================== -->
@stop


@section('content')

<div class="page">
<div class="fixed-bar">
<div class="item-title item-title02">
  <div class="subject">
    <h3>
      <span class="action">会员 - 详情</span>
    </h3>

          <h5>
      <span class="action-span">
        <a href="vip.html" class="btn btn-warning click-loading">
          <i class="iconfont">&#xe6d4;</i>
          返回会员列表
        </a>
      </span>
    </h5>

    <ul class="tab-base shop-row">
<li><a href="{{url('user/welc')}}" >
  <span>欢迎页</span>
  </a>
</li>
<li><a  href="{{url('user/info')}}">
  <span>会员信息</span>
  </a>
</li>
<li><a   class="current" href="{{url('user/pkadd')}}">
  <span>收货地址</span>
  </a>
</li>
        <li><a href="">
  <span>订单</span>
  </a>
</li>
<li><a href="{{url('user/cart')}}" >
  <span>购物车</span>
  </a>
</li>
        <li><a href="{{url('user/collect')}}">
  <span>收藏</span>
  </a>
</li>
<li><a href="" >
  <span>评价</span>
  </a>
</li>
        <li><a href="">
  <span>投诉</span>
  </a>
</li>
</ul>
  </div>
</div>
</div>

<div class="common-title">
<div class="ftitle">
  <h3>收货地址列表</h3>

  <h5>
    (&nbsp;共
    <span data-total-record="true">309</span>
    条记录&nbsp;)
  </h5>

</div>
<div class="operate">
  <a class="reload" href="javascript:reload();" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="刷新数据">
    <i class="iconfont">&#xe6fb;</i>
  </a>
</div>
</div>

<div class="table-responsive">
  <table id="table_list" class="table table-hover">
    <thead>
      <tr>
        <!--排序样式sort默认，asc升序，desc降序-->
                  <th class="w150" style="cursor: pointer;">地址状态</th>
        <th class="w150" style="cursor: pointer;">收货人</th>
        <th class="w250" style="cursor: pointer;">手机</th>
        <th class="w250"  style="cursor: pointer;">详细地址</th>
        <th class="w150" style="cursor: pointer;">固定电话</th>
        <th class="w150" style="cursor: pointer;">邮政编码</th>
      </tr>
    </thead>
    <tbody>
      <!--以下为循环内容-->
      <tr>
                <td>
          <font style="color:#06C">默认地址</font>
        </td>
        <td>
          李四
        </td>
        <td>
                      15852631236
                  </td>
        <td>
                      西安市高科广场4-4室
                  </td>
        <td>02956354152</td>
                  <td>
                      710065
        </td>
      </tr>

              <tr>
                  <td>

        </td>
        <td>
          李四
        </td>
        <td>
                      15852631236
                  </td>
        <td>
                      西安市高科广场4-4室
                  </td>
        <td>02956354152</td>
                  <td>
                      710065
        </td>
      </tr>

    </tbody>

    </table>

        <div class="pull-right page-box">
        <div id="pagination"  class=" pull-right">

            <div class="pagination-info">
                共7条记录，每页显示：
                <select class="select m-r-5" data-page-size="10">

                    <option value="1">1</option>

                    <option value="10" selected="selected">10</option>

                    <option value="20">20</option>

                    <option value="30">30</option>

                    <option value="50">50</option>

                </select>
                条
            </div>

            <ul class="pagination">
                <li class="disabled" style="display: none;">
                    <a class="fa fa-angle-double-left" data-go-page="1" title="第一页"></a>
                </li>

                <li class="disabled">
                    <a class="iconfont" title="上一页">&#xe70a;</a>
                </li>

                <li class="active">
                    <a data-cur-page="1">1</a>
                </li>

                <li class="disabled">
                    <a class="iconfont" title="下一页">&#xe709;</a>
                </li>

                <li class="disabled" style="display: none;">
                    <a class="fa fa-angle-double-right" data-go-page="1" title="最后一页"></a>
                </li>
            </ul>

            <div class="pagination-goto">
                <input class="ipt form-control goto-input" type="text">
                <button class="btn btn-default goto-button" title="点击跳转到指定页面">GO</button>
                <a class="goto-link" data-go-page="" style="display: none;"></a>
            </div>
        </div>
  </div>


</div>

</div>


@stop
