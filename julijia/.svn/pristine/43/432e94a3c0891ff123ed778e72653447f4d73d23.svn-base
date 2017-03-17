@section('title','添加图片')
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
        <!-- 温馨提示 -->
        <div class="content">
            <div class="goods-info-three">
                <div class="col-sm-9">
                    <div class="goodspic-list image-list">
                        <div class="title">
                            <h3>产品热图</h3>
                        </div>
                        <ul class="goods-pic-list">
                            <!-- 遍历图片列表 -->
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    <img src="{{url('images/admin/pic04.png')}}">
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
                                    </div>
                                </div>
                            </li>
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    <img src="{{url('images/admin/pic04.png')}}">
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
                                    </div>
                                </div>
                            </li>
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    <img src="{{url('images/admin/pic04.png')}}">
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
                                    </div>
                                </div>
                            </li>
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    <img src="{{url('images/admin/pic04.png')}}">
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
                                    </div>
                                </div>
                            </li>
                            <li class="goodspic-upload image-item">
                                <div class="upload-thumb">
                                    <img src="{{url('images/admin/pic04.png')}}">
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
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="goods-next">
                        <input type="button" id=" " value="上一步，填写商品详情" class="btn btn-primary m-r-10 btn-top"  onclick="location='add02.html'">
                        <input type="button" id="btn_submit" value="下一步，确认商品发布" class="btn btn-primary"  onclick="location='add04.html'" >
                    </div>
                </div>
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
@stop
@section('footer_js')
    <script type="text/javascript" src="/js/public/uploadify/jquery.uploadify.js"></script>
    <script>
        var settings = {
            'formData'     : {
                'timestamp' : '<?php echo time();?>',
                'token'     : '<?php echo md5('unique_salt' .time())?>'
            },
            'width': 149,
            'height':38,
            'fileSizeLimit' : '3072KB',
            'fileTypeExts': '*.jpg;*.gif;*.jpeg;*.png',
            'buttonClass' : 'uploadify-button',
            'buttonText' : '',
            'swf'      : '/js/public/uploadify/uploadify.swf',
            'uploader' : '/js/public/uploadify/uploadify.php',
            'checkExisting' : '/js/public/uploadify/check-exists.php',
            'debug':false,
            'uploadLimit':1,
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
                //$("#path").val(data);
                $(this).parents('.image-item').find('img').attr('src','/media/temp/'+data);
            },
            'itemTemplate' : '<div id="${fileID}" class="uploadify-queue-item" style="display: none">\
                               <div class="cancel">\
                                   <a href="javascript:$(\'#${instanceID}\').temp(\'cancel\', \'${fileID}\')">X</a>\
                               </div>\
                               <span class="fileName">${fileName} (${fileSize})</span><span class="data"></span>\
                            </div>'
        };

        $("#file_upload1").uploadify(settings);
        $("#file_upload2").uploadify(settings);
        $("#file_upload3").uploadify(settings);
        $("#file_upload4").uploadify(settings);
        $("#file_upload5").uploadify(settings);
    </script>
@stop