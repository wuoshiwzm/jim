@section('title','添加产品')
@section('admincss')
  <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css').'?v='.Config::get('tools.adminJsTime')}}">
@stop
@section('content')
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>
                    <span class="action">商品库管理 - 填写商品详情</span>
                </h3>
            </div>
        </div>
    </div>
    <div class="table-content m-t-15">
        <!--步骤-->
        <ul class="add-goods-step">
            <li id="step_1">
                <i class="fa iconfont step">&#xe728;</i>
                <h6>STEP.1</h6>
                <h2>选择商品分类</h2>
                <i class="fa fa-angle-right iconfont">&#xe657;</i>
            </li>
            <li id="step_2"  class="current">
                <i class="fa fa-edit step iconfont" >&#xe68e;</i>
                <h6>STEP.2</h6>
                <h2>填写商品详情</h2>
                <i class="fa fa-angle-right iconfont">&#xe657;</i>
            </li>
            <li id="step_3">
                <i class="fa fa-image step iconfont">&#xe641;</i>
                <h6>STEP.3</h6>
                <h2>上传商品图片</h2>
                <i class="fa fa-angle-right iconfont">&#xe657;</i>
            </li>
            <li id="step_4">
                <i class="fa fa-check-square-o step iconfont">&#xe734;</i>
                <h6>STEP.4</h6>
                <h2>商品发布成功</h2>
            </li>
        </ul>
        <div class="content">
            <div class="goods-info-two">
                <form class="form-horizontal m-form" id="frm" accept-charset="UTF-8"  method="POST">
                    <h5 class="h5_bottom">商品基本信息</h5>
                    <div class="simple-form-field">
                        <div class="form-group">
                            <label for="text4" class="col-sm-3 control-label">
                                <span class="text-danger ng-binding">*</span>
                                <span class="ng-binding">商品分类：</span>
                            </label>
                            <div class="col-sm-9">
                                <label class="control-label pull-none" style="vertical-align: middle">{{$categoryName}}</label>
                            </div>
                            <input type="hidden" name="category_id" value="{{$categoryID}}">
                        </div>
                    </div>
                    <!-- 供应商 -->
                    <div class="simple-form-field">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <span class="ng-binding">供应商：</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-control-box">
                                    <select class="form-control valid w200">
                                        <option value="0">中国联想集团</option>
                                        <option value="1">中国石油集团</option>
                                        <option value="2">华润万家</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 线下门店 -->
                    <div class="simple-form-field">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <span class="ng-binding">线下门店：</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-control-box">
                                    <select class="form-control valid w200">
                                        <option value="0">北大明宫店</option>
                                        <option value="1">电视塔店</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop