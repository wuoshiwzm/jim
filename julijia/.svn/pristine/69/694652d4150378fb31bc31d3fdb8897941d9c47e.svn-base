@section('title','添加图片')
@section('admincss')
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css').'?v='.Config::get('tools.adminJsTime')}}">
@stop
@section('content')
<div class="page">
    @if( Input::get('setid') )
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
                        <li><a href="{{url('admin/product/goods/'.encode($id).'/edit?setid='.Input::get('setid'))}}"><span>编辑商品</span></a></li>
                        <li><a class="current" href="{{url('admin/product/goodsimg/'.$id.'?setid='.Input::get('setid'))}}"><span>编辑图片</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    @else
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
                <li id="step_2" >
                    <i class="fa fa-edit step iconfont" >&#xe68e;</i>
                    <h6>STEP.2</h6>
                    <h2>填写商品详情</h2>
                    <i class="fa fa-angle-right iconfont">&#xe657;</i>
                </li>
                <li id="step_3" class="current">
                    <i class="fa fa-image step iconfont">&#xe641;</i>
                    <h6>STEP.3</h6>
                    <h2>上传商品图片</h2>
                    <i class="fa fa-angle-right iconfont">&#xe657;</i>
                </li>
                <li id="step_4" >
                    <i class="fa fa-check-square-o step iconfont">&#xe734;</i>
                    <h6>STEP.4</h6>
                    <h2>商品发布成功</h2>
                </li>
            </ul>
    @endif
        <div class="content">
            <div class="goods-info-three">
                <form class="form" action="{{url('admin/product/goodsimg/store')}}" method="post">
                    {{ Form::token() }}
                    <input type="hidden" name="entityID" value="{{$id}}">
                    <input type="hidden" name="setid" value="{{Input::get('setid')}}">
                    <input type="hidden" name="attribute_set_id" value="{{Input::get('attribute_set_id')}}">
                    <div class="col-sm-9">
                        <div class="goodspic-list image-list">
                            <div class="title">
                                <h3>产品热图</h3>
                            </div>
                            <ul class="goods-pic-list">
                                @for( $i=0; $i<=4; $i++ )
                                <li class="goodspic-upload image-item">
                                    <div class="upload-thumb">
                                        @if( isset($data[$i]['id']))
                                            <img src="{{getImagesUrl( 'goods', $id, $data[$i]['value'])}}">
                                        @else
                                            <img src="/images/admin/pic_cn.jpg">
                                        @endif
                                        <div class="show-default @if( isset($data[$i]['get_img_to_product_flat']['small_image']) && $data[$i]['get_img_to_product_flat']['small_image'] == $data[$i]['value'] ) show-default_on @endif">
                                            <p class="set-default" onclick="SetDefault( this );">
                                                <i class="fa fa-check-circle-o"></i>
                                                @if( isset($data[$i]['get_img_to_product_flat']['small_image']) && $data[$i]['get_img_to_product_flat']['small_image'] == $data[$i]['value'] )
                                                    封面图
                                                @else
                                                    设为封面
                                                @endif
                                            </p>
                                            <a href="javascript:void(0)" class="del del-image" onclick="removeImg( this )" title="移除">X</a>
                                            <input type="hidden" name="default[]" @if( isset($data[$i]['get_img_to_product_flat']['small_image']) && $data[$i]['get_img_to_product_flat']['small_image'] == $data[$i]['value'] )  value="1" @else value="0" @endif/>
                                        </div>
                                    </div>
                                    <div class="upload-info">
                                        <div class="show-sort">
                                            排序：
                                            <input type="text" class="text image-sort" name="sort[]" size="1" @if( isset($data[$i]['sort'])) value="{{$data[$i]['sort']}}" @else value="0"  @endif maxlength="1">
                                        </div>
                                        <div class="upload-btn">
                                            <a href="javascript:void(0);" onclick="getImgTemplet( this )" >
                                                <p><i class="fa fa-upload " id="uploaded"></i>上传</p>
                                            </a>
                                            <input type="hidden" name="id[]"  @if( isset($data[$i]["id"]) ) value="{{$data[$i]["id"]}}"  @endif/>
                                            <input type="hidden" name="oldvalue[]" @if( isset($data[$i]["value"]) ) value="{{$data[$i]["value"]}}" @endif />
                                            <input type="hidden" name="value[]" @if( isset($data[$i]["value"]) ) value="{{$data[$i]["value"]}}" @endif />
                                        </div>
                                    </div>
                                </li>
                                @endfor
                            </ul>
                        </div>
                        <div class="goods-next">
                            <input type="button" id="btn_submit" @if( Input::get('setid') ) value="确认" @else value="下一步，确认发布完成" @endif class="btn btn-primary">
                        </div>
                    </div>
                </form>
                <div class="col-sm-3">
                    <div class="pic-upload-request p-15">
                        <h4>上传要求：</h4>
                        <ul>
                            <li>1. 请使用jpg\jpeg\png等格式、单张大小不超过4M的正方形图片。</li>
                            <li>2. 上传图片最大尺寸将被保留为1280像素。</li>
                            <li>4. 通过更改排序数字修改商品图片的排列显示顺序。</li>
                            <li>5. 图片质量要清晰，不能虚化，要保证亮度充足。</li>
                            <li>6. 操作完成后请点下一步，否则无法在网站生效。</li>
                        </ul>
                        <h4>建议:</h4>
                        <ul>
                            <li>1. 主图为白色背景正面图。</li>
                            <li>2. 排序依次为正面图-&gt;背面图-&gt;侧面图-&gt;细节图。</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="msg" value="{{\Session::get('msg')}}">
@stop
@section('footer_js')
<script>
    /**
     * 图象上传
     */
    function getImgTemplet( index )
    {
        var i = $(index).parents('li').index();
        layer.open({
            type: 2,
            title:false,
            shadeClose: true,
            shade: 0.8,
            area: ['460px', '480px'],
            content: ['/admin/get/imgtemplet/'+i,'no']
        });
    }

    /**
     * 上传图片回调
     * @param path
     * @param index
     */
    function setPathUrl( path, index  )
    {
        $(".goods-pic-list").find("li").eq(index).find('img').attr('src','/media/temp/'+path);
        $(".goods-pic-list").find("li").eq(index).find('input[name="value[]"]').val(path);
    }

    function removeImg( index )
    {
        $(index).parents("li").find('img').attr('src','/images/admin/pic_cn.jpg');
        $(index).parents("li").find('input[name="value[]"]').val('');
    }
    
    function SetDefault( index )
    {
        $( index ).parents('.show-default').addClass('show-default_on');
        $( index ).parents('.show-default').find('input').val('1');
        $( index ).parents('li').siblings().find('.show-default').removeClass('show-default_on');
        $( index ).parents('li').siblings().find('.show-default').find('input').val('0');
    }
</script>
@stop