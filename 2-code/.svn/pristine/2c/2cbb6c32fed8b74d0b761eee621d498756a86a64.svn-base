@section('title','编辑产品')
@section('admincss')
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css').'?v='.Config::get('tools.adminJsTime')}}">
@stop
@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title item-title02">
                <div class="subject">
                    <h3>
                        <span class="action">产品编辑</span>
                    </h3>
                    <h5>
                    <span class="action-span">
                        <a href="{{url('admin/product/goods')}}" class="btn btn-warning click-loading">
                            <i class="iconfont">&#xe6d4;</i>
                            返回商品列表
                        </a>
                    </span>
                    </h5>
                    <ul class="tab-base shop-row">
                        <li><a class="current" href="{{url('admin/product/goods/'.encode($id).'/edit?setid='.encode($setID))}}"><span>编辑商品</span></a></li>
                        <li><a href="{{url('admin/product/goodsimg/'.$id.'?setid='.encode($setID))}}"><span>编辑图片</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="table-content m-t-15">
            <!--步骤-->
            <div class="content">
                <div class="goods-info-two">
                    <form class="form-horizontal " accept-charset="UTF-8"  method="post" action="{{url('admin/product/goods/'.encode($id))}}">
                        {{ Form::token() }}
                        <input type="hidden" name="_method" value="PUT">
                        <h5 class="h5_bottom">商品基本信息</h5>
                        <!-- 供应商 -->
                        <div class="simple-form-field">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <span class="ng-binding">供应商：</span>
                                </label>
                                <div class="col-sm-9">
                                    <div class="form-control-box">
                                        <select class="form-control valid w200" name="supplier_id" onchange="getSupplier( this )">
                                            @foreach( $supplier as $k=>$su )
                                                <option value="{{$su->id}}" @if($flat->supplier == $su->id) selected="selected" @endif>{{$su->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="supplier_name" value="{{$flat->productFlatToSupplier->supplier_name}}">
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
                                        <select class="form-control valid w200" name="shop">
                                            @foreach( $shop as $sh )
                                                <option value="{{$sh->id}}" @if($flat->shop == $sh->id) selected="selected" @endif>{{$sh->m_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simple-form-field">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <span class="ng-binding">警戒库存：</span>
                                </label>
                                <div class="col-sm-9">
                                    <div class="form-control-box">
                                        <input type="text" class="form-control" name="jingjie" value="{{$flat->productFlatToStock->jingjie}}" datatype="n1-5"  errormsg="警戒库存为1-5位数字" tipsrmsg="请输入警戒库存" >
                                        <span class="Validform_checktip"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simple-form-field">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <span class="ng-binding">库存：</span>
                                </label>
                                <div class="col-sm-9">
                                    <div class="form-control-box">
                                        <input type="text" class="form-control" name="stock" value="{{$flat->kc_qty}}" datatype="n1-5"  errormsg="库存为1-5位数字" tipsrmsg="请输入库存" >
                                        <span class="Validform_checktip"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.product.getEav.editattbute',array('data'=>$data))
                        <div class="goods-next">
                            <input type="submit" id="btn_submit" value="确认提交" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer_js')
    <script charset="utf-8" src="/js/public/kindeditor/kindeditor.js"></script>
    <script charset="utf-8"src="/js/public/kindeditor/lang/zh_CN.js"></script>
    <script type="text/javascript" src="/js/admin/product.js?v={{Config::get('tools.adminJsTime')}}"></script>
@stop