@section('title','添加图片')
@section('admincss')
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/styles.css').'?v='.Config::get('tools.adminJsTime')}}">
<style>
    .button_div_left{  filter:alpha(opacity=0); -moz-opacity:0; -khtml-opacity: 0;  cursor:pointer;  background: #f30; }
    .uploadify .swfupload{ top:0;position: absolute!important; }
</style>
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
        <!-- 温馨提示 -->
        <div class="content">
            <div class="goods-info-three">
                <form class="form" action="{{url('admin/product/goodsimg/store')}}" method="post">
                {{ Form::token() }}
                <input type="hidden" name="entityID" value="{{$id}}">
                <div class="col-sm-9">
                    <div class="goodspic-list image-list">
                        <div class="title">
                            <h3>产品热图</h3>
                        </div>
                        <ul class="goods-pic-list">
                            <!-- 遍历图片列表 -->
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    @if( isset($data[0]["value"]) )
                                        <img src="{{getImagesUrl('goods',$id,$data[0]["value"])}}">
                                    @else
                                        <img src="{{url('images/admin/pic04.png')}}">
                                    @endif
                                    <!-- 第一个为默认图片 -->
                                    <div class="show-default">
                                        <p class="set-default">
                                            <i class="fa fa-check-circle-o"></i>
                                            设为封面
                                        </p>
                                        <a href="javascript:void(0)" class="del del-image" title="移除">X</a>
                                    </div>
                                </div>
                                <div class="upload-info">
                                    <div class="show-sort">
                                        排序：
                                        <input type="text" class="text image-sort" size="1" value="0" maxlength="1">
                                    </div>
                                    <div class="upload-btn">
                                        <a href="javascript:void(0);">
                                            <p><i class="fa fa-upload" id="file_upload1"></i>上传</p>
                                        </a>
                                        <input type="hidden" name="id[]"  @if( isset($data[0]["id"]) ) value="{{$data[0]["id"]}}"  @endif/>
                                        <input type="hidden" name="oldvalue[]" @if( isset($data[0]["value"]) ) value="{{$data[0]["value"]}}" @endif />
                                        <input type="hidden" name="value[]" @if( isset($data[0]["value"]) ) value="{{$data[0]["value"]}}" @endif />
                                    </div>
                                </div>
                            </li>
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    @if( isset($data[1]["value"]) )
                                        <img src="{{getImagesUrl('goods',$id,$data[1]["value"])}}">
                                    @else
                                        <img src="{{url('images/admin/pic04.png')}}">
                                    @endif
                                    <!-- 第一个为默认图片 -->
                                    <div class="show-default">
                                        <p class="set-default">
                                            <i class="fa fa-check-circle-o"></i>
                                            设为封面
                                        </p>
                                        <a href="javascript:void(0)" class="del del-image" title="移除">X</a>
                                    </div>
                                </div>
                                <div class="upload-info">
                                    <div class="show-sort">
                                        排序：
                                        <input type="text" class="text image-sort" size="1" value="0" maxlength="1">
                                    </div>
                                    <div class="upload-btn">
                                        <a href="javascript:void(0);">
                                            <p><i class="fa fa-upload" id="file_upload2"></i>上传</p>
                                        </a>
                                        <input type="hidden" name="id[]"  @if( isset($data[1]["id"]) ) value="{{$data[1]["id"]}}"  @endif/>
                                        <input type="hidden" name="oldvalue[]" @if( isset($data[1]["value"]) ) value="{{$data[1]["value"]}}" @endif />
                                        <input type="hidden" name="value[]" @if( isset($data[1]["value"]) ) value="{{$data[1]["value"]}}" @endif />
                                    </div>
                                </div>
                            </li>
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    @if( isset($data[2]["value"]) )
                                        <img src="{{getImagesUrl('goods',$id,$data[2]["value"])}}">
                                    @else
                                        <img src="{{url('images/admin/pic04.png')}}">
                                    @endif
                                    <!-- 第一个为默认图片 -->
                                    <div class="show-default">
                                        <p class="set-default">
                                            <i class="fa fa-check-circle-o"></i>
                                            设为封面
                                        </p>
                                        <a href="javascript:void(0)" class="del del-image" title="移除">X</a>
                                    </div>
                                </div>
                                <div class="upload-info">
                                    <div class="show-sort">
                                        排序：
                                        <input type="text" class="text image-sort" size="1" value="0" maxlength="1">
                                    </div>
                                    <div class="upload-btn">
                                        <a href="javascript:void(0);">
                                            <p><i class="fa fa-upload" id="file_upload3"></i>上传</p>
                                        </a>
                                        <input type="hidden" name="id[]"  @if( isset($data[2]["id"]) ) value="{{$data[2]["id"]}}"  @endif/>
                                        <input type="hidden" name="oldvalue[]" @if( isset($data[2]["value"]) ) value="{{$data[2]["value"]}}" @endif />
                                        <input type="hidden" name="value[]" @if( isset($data[2]["value"]) ) value="{{$data[2]["value"]}}" @endif />
                                    </div>
                                </div>
                            </li>
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    @if( isset($data[3]["value"]) )
                                        <img src="{{getImagesUrl('goods',$id,$data[3]["value"])}}">
                                    @else
                                        <img src="{{url('images/admin/pic04.png')}}">
                                    @endif
                                    <!-- 第一个为默认图片 -->
                                    <div class="show-default">
                                        <p class="set-default">
                                            <i class="fa fa-check-circle-o"></i>
                                            设为封面
                                        </p>
                                        <a href="javascript:void(0)" class="del del-image" title="移除">X</a>
                                    </div>
                                </div>
                                <div class="upload-info">
                                    <div class="show-sort">
                                        排序：
                                        <input type="text" class="text image-sort" size="1" value="0" maxlength="1">
                                    </div>
                                    <div class="upload-btn">
                                        <a href="javascript:void(0);">
                                            <p><i class="fa fa-upload" id="file_upload4"></i>上传</p>
                                        </a>
                                        <input type="hidden" name="id[]"  @if( isset($data[3]["id"]) ) value="{{$data[3]["id"]}}"  @endif/>
                                        <input type="hidden" name="oldvalue[]" @if( isset($data[3]["value"]) ) value="{{$data[3]["value"]}}" @endif />
                                        <input type="hidden" name="value[]" @if( isset($data[3]["value"]) ) value="{{$data[3]["value"]}}" @endif/>
                                    </div>
                                </div>
                            </li>
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    @if( isset($data[4]["value"]) )
                                        <img src="{{getImagesUrl('goods',$id,$data[4]["value"])}}">
                                    @else
                                        <img src="{{url('images/admin/pic04.png')}}">
                                    @endif
                                    <!-- 第一个为默认图片 -->
                                    <div class="show-default">
                                        <p class="set-default">
                                            <i class="fa fa-check-circle-o"></i>
                                            设为封面
                                        </p>
                                        <a href="javascript:void(0)" class="del del-image" title="移除">X</a>
                                    </div>
                                </div>
                                <div class="upload-info">
                                    <div class="show-sort">
                                        排序：
                                        <input type="text" class="text image-sort" size="1" value="0" maxlength="1">
                                    </div>
                                    <div class="upload-btn">
                                        <a href="javascript:void(0);">
                                            <p><i class="fa fa-upload" id="file_upload5"></i>上传</p>
                                        </a>
                                        <input type="hidden" name="id[]"  @if( isset($data[4]["id"]) ) value="{{$data[4]["id"]}}"  @endif/>
                                        <input type="hidden" name="oldvalue[]" @if( isset($data[4]["value"]) ) value="{{$data[4]["value"]}}" @endif />
                                        <input type="hidden" name="value[]" @if( isset($data[4]["value"]) ) value="{{$data[4]["value"]}}" @endif/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="goods-next">
                        <input type="button"  value="上一步，填写商品详情" class="btn btn-primary m-r-10 btn-top" onclick="location='add02.html'">
                        <input type="button" id="btn_submit" value="下一步，确认商品发布" class="btn btn-primary">
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
    <script type="text/javascript" src="/js/public/uploadify/jquery.uploadify.js"></script>
    <script>
        $(".goods-pic-list").find('.fa-upload').each(function () {
            var $this = $(this);
            $this.uploadify(
            {
                'formData'     : {
                'timestamp' : '<?php echo time();?>',
                'token'     : '<?php echo md5('unique_salt' .time())?>'
                 },
                'width': 60,
                'height':30,
                'fileSizeLimit' : '3072KB',
                'fileTypeExts': '*.jpg;*.gif;*.jpeg;*.png',
                'buttonClass' : 'button_div_left',
                'buttonText' : '',  //按钮文字
                'swf'      : '/js/public/uploadify/uploadify.swf',
                'uploader' : '/js/public/uploadify/uploadify.php',
                'checkExisting' : '/js/public/uploadify/check-exists.php',
                'debug':false,
                'onUploadError': function(file, errorCode, errorMsg, errorString) {
                if( errorString != 'Cancelled' )
                {
                    layer.msg('文件上传出错了');
                }
            },
            'onUploadSuccess' : function(file, data, response) {
                if( data.length > 50 || data == false )
                {
                    layer.msg('上传失败');
                    return;
                }
                var id = $this.attr('id');
                $("#"+id).parents('.image-item').find('.upload-thumb').find('img').attr('src','/media/temp/'+data);
                $("#"+id).parents('.upload-btn').find('input[name="value[]"]').val(data);

            },
            'itemTemplate' : '<div id="${fileID}" class="uploadify-queue-item" style="display: none">\
                               <div class="cancel">\
                                   <a href="javascript:$(\'#${instanceID}\').temp(\'cancel\', \'${fileID}\')">X</a>\
                               </div>\
                               <span class="fileName">${fileName} (${fileSize})</span><span class="data"></span>\
                            </div>'
            });
        });
    </script>
@stop