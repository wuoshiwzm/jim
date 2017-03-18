@section('title','添加图片')
@section('admincss')
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css').'?v='.Config::get('tools.adminJsTime')}}">
@stop
@section('content')
<div class="page">
    <div class="table-content m-t-15">
        <!--步骤-->
        <ul class="add-goods-step">
            <li id="step_1">
                <i class="fa iconfont step">&#xe728;</i>
                <h6>STEP.1</h6>
                <h2>选择商品分类</h2>
                <i class="fa fa-angle-right iconfont">&#xe657;</i>
            </li>
            <li id="step_2" >
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
            <li id="step_4" class="current">
                <i class="fa fa-check-square-o step iconfont">&#xe734;</i>
                <h6>STEP.4</h6>
                <h2>商品发布成功</h2>
            </li>
        </ul>
        <div class="content">
            <div class="goods-info-four">
                <div class="issued-success">
                    <h2>
                        <i class="fa fa-check-circle-o m-r-10"></i>
                        恭喜您，商品发布成功！
                    </h2>
                    <div class="issued-success-content m-t-20" style=" font-size:14px;">
                        <p class="page-jump">
                            <a class="c-blue" href="{{url('admin/product/goods/'.encode($id).'/edit?setid='.encode($aid))}}">重新编辑刚发布的商品&gt;&gt;</a>
                        </p>
                        <h5>您还可以:</h5>
                        <ul class="">
                            <li>
                                1. 继续 "
                                <a href="{{url('admin/product/goods/create')}}" class="c-blue" >发布新商品</a>
                                "
                            </li>
                            <li>
                                2. 进入 "
                                <a href="{{url('admin/product/goods')}}" class="c-blue" >商品管理</a>
                                "
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop