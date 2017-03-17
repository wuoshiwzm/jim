@extends('layouts.admin_right')
@section('admincss')
   <link type="text/css" rel="stylesheet" href="{{url('css/admin/welcome.css')}}">
@stop
@section('content')
   <div class="page" style="background: #f5f5f5; padding: 20px 25px;">
      <div class="row card-box">
         <div class="col-lg-3 col-sm-3">
            <div class="panel green">
               <div class="symbol">
                  <i class="iconfont iconfont_40">&#xe73a;</i>
               </div>
               <div class="value">
                  <p class="num" id="today_gains">{{$res['mount']}}</p>
                  <p class="text">今日销售总额</p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-3">
            <div class="panel purple">
               <div class="symbol">
                  <i class="iconfont">&#xe712;</i>
               </div>
               <div class="value">
                  <p class="num" id="today_shops">{{$res['new']}}</p>
                  <p class="text">今日发布资讯</p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-3">
            <div class="panel blue">
               <div class="symbol">
                  <i class="iconfont">&#xe721;</i>
               </div>
               <div class="value">
                  <p class="num" id="today_users">{{$res['user']}}</p>
                  <p class="text">今日注册会员</p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-3">
            <div class="panel orange">
               <div class="symbol">
                  <i class="iconfont">&#xe68d;</i>
               </div>
               <div class="value">
                  <p class="num" id="today_visits">{{$res['log']}}</p>
                  <p class="text">今日网站访问</p>
               </div>
            </div>
         </div>
      </div>
      <!--订单小统计-->
      <div class="row mini-stat">
         <div class="col-lg-2 col-sm-2">
            <div class="panel">
               <a href="{{url('admin/order/nopay')}}">
					<span class="mini-stat-icon orange">
						<i class="iconfont">&#xe65f;</i>
					</span>
                  <div class="mini-stat-info">
                     <span class="num" id="unpayed">{{$res['daifukuan']}}</span>
                     <span class="text">待付款订单数</span>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-lg-2 col-sm-2">
            <div class="panel">
               <a href="{{url('admin/order/waiting')}}">
					<span class="mini-stat-icon tar">
						<i class="iconfont">&#xe71a;</i>
					</span>
                  <div class="mini-stat-info">
                     <span class="num" id="unshipped">{{$res['daifahuo']}}</span>
                     <span class="text">待发货订单数</span>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-lg-2 col-sm-2">
            <div class="panel">
               <a href="{{url('admin/order/hasdeliver')}}">
					<span class="mini-stat-icon brown">
						<i class="iconfont">&#xe664;</i>
					</span>
                  <div class="mini-stat-info">
                     <span class="num" id="shipped">{{$res['fahuo']}}</span>
                     <span class="text">已发货订单数</span>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-lg-2 col-sm-2">
            <div class="panel">
               <a href="{{url('admin/refund/index')}}">
					<span class="mini-stat-icon pink">
						<i class="iconfont">&#xe667;</i>
					</span>
                  <div class="mini-stat-info">
                     <span class="num" id="backing">{{$res['tuikuan']}}</span>
                     <span class="text">退款中订单数</span>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-lg-2 col-sm-2">
            <div class="panel">
               <a href="{{url('admin/comment/index')}}">
					<span class="mini-stat-icon green">
						<i class="iconfont">&#xe6e6;</i>
					</span>
                  <div class="mini-stat-info">
                     <span class="num" id="unevaluate">{{$res['pinglun']}}</span>
                     <span class="text">待评价订单数</span>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-lg-2 col-sm-2">
            <div class="panel">
               <a href="{{url('admin/order/complete')}}">
					<span class="mini-stat-icon blue">
						<i class="iconfont">&#xe734;</i>
					</span>
                  <div class="mini-stat-info">
                     <span class="num" id="finished">{{$res['wancheng']}}</span>
                     <span class="text">已完成订单数</span>
                  </div>
               </a>
            </div>
         </div>
      </div>
      <!--中间内容-->
      <div class="row">
         <!--左侧内容-->
         <div class="col-md-8">
            <!---->
            <div class="panel">
               <div class="panel-header">
                  <h3>会员增长统计图</h3>
               </div>
               <div class="panel-body" id="container"  style="min-width: 310px; height: 400px; margin: 0 auto" >
               </div>
            </div>
         </div>
         <!--中间内容-->
         <div class="col-md-4">
            <!---->
            <div class="panel">
               <div class="panel-header">
                  <h3>运营快捷入口</h3>
               </div>
               <div class="panel-body">
                  <div class="entrance-box">
                     <dl>
                        <sub></sub>
                        <dt class="p-name">
                           <a href="/admin/order">订单列表</a>
                        </dt>
                        <dd class="p-ico">
                           <a>
                              <i class="order"></i>
                           </a>
                        </dd>
                     </dl>
                     <dl>
                        <sub></sub>
                        <dt class="p-name">
                           <a href="/admin/refund/index">退款管理</a>
                        </dt>
                        <dd class="p-ico">
                           <a>
                              <i class="return"></i>
                           </a>
                        </dd>
                     </dl>
                     <dl>
                        <sub></sub>
                        <dt class="p-name">
                           <a href="/admin/user/supplier">入驻商管理</a>
                        </dt>
                        <dd class="p-ico">
                           <a>
                              <i class="apply"></i>
                           </a>
                        </dd>
                     </dl>
                     <dl>
                        <sub></sub>
                        <dt class="p-name">
                           <a href="/admin/member/index">会员管理</a>
                        </dt>
                        <dd class="p-ico">
                           <a>
                              <i class="user"></i>
                           </a>
                        </dd>
                     </dl>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <!--系统信息-->
      <div class="row">
         <div class="col-lg-12 col-sm-12">

         </div>
      </div>

   </div>
   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script type="text/javascript">
      $(function () {
       // $.getJSON('//data.jianshukeji.com/jsonp?filename=json/usdeur.json', function (data) {
        $.getJSON('//{{Config::get('app.url')}}/admin/index/tubiao', function (data) {
         var chart=     $('#container').highcharts({
               chart: {
                  zoomType: 'x'
               },
               title: {
                  text: '用户注册统计表'
               },
               subtitle: {
                  text: document.ontouchstart === undefined ?
                          '鼠标拖动可以进行缩放' : '手势操作进行缩放'
               },
            xAxis: {
               categories:{{ json_encode(array_reverse($res['time']))}},
               tickInterval:4,
               type: 'datetime',
               dateTimeLabelFormats: { // don't display the dummy year
                  month: '%e. %b',
                  year: '%b'
               },
               labels: {
                  step: 4,
               }
            },
            tooltip: {
               dateTimeLabelFormats: {
                  millisecond: '%H:%M:%S.%L',
                  second: '%H:%M:%S',
                  minute: '%H:%M',
                  hour: '%H:%M',
                  day: '%Y-%m-%d',
                  week: '%m-%d',
                  month: '%Y-%m',
                  year: '%Y'
               }
            },
               yAxis: {
                  title: {
                     text: 'Exchange rate'
                  }
               },
               legend: {
                  enabled: false
               },
               plotOptions: {
                  area: {
                     fillColor: {
                        linearGradient: {
                           x1: 0,
                           y1: 0,
                           x2: 0,
                           y2: 1
                        },
                        stops: [
                           [0, Highcharts.getOptions().colors[0]],
                           [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                     },
                     marker: {
                        radius: 2
                     },
                     lineWidth: 1,
                     states: {
                        hover: {
                           lineWidth: 1
                        }
                     },
                     threshold: null
                  }
               },
               series: [{
                  type: 'area',
                  name: '注册人数',
                  data: data
               }],
               credits: {
                  enabled:false
               },
         });
         });

      });

   </script>
@stop
