<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>上传图片</title>
    <style type="text/css">
        ul, li {
            list-style: none;
            padding: 0;
            margin: 0
        }

        .btn {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
            background-color: #ff8400;
            color: #fff;
            display: inline-block;
            height: 28px;
            line-height: 28px;
            text-align: center;
            width: 72px;
            transition: background-color 0.2s linear 0s;
            border: none;
            cursor: pointer;
            margin: 0 0 20px;
        }

        .btn_submit {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
            background-color: #0ec6f8;
            color: #fff;
            display: inline-block;
            height: 28px;
            line-height: 28px;
            text-align: center;
            width: 72px;
            transition: background-color 0.2s linear 0s;
            border: none;
            cursor: pointer;
            margin: 0 0 20px;
        }

        .btn_close {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
            background-color: #d40402;
            color: #fff;
            display: inline-block;
            height: 28px;
            line-height: 28px;
            text-align: center;
            width: 72px;
            transition: background-color 0.2s linear 0s;
            border: none;
            cursor: pointer;
            margin: 0 0 20px;
        }

        .demo {
            width: 700px;
            margin: 0 auto;
        }

        .progress {
            border: 1px solid #ddd;
        }

        .btn:hover {
            background-color: #e95a00;
            text-decoration: none
        }

        .ul_pics li {
            float: left;
            width: 160px;
            height: 160px;
            border: 1px solid #ddd;
            padding: 2px;
            text-align: center;
            margin: 0 5px 35px 0;
        }

        .ul_pics li .img {
            width: 160px;
            height: 160px;
            display: table-cell;
            vertical-align: middle;
        }

        .ul_pics li img {
            max-width: 160px;
            max-height: 140px;
            vertical-align: middle;
        }

        .progress {
            position: relative;
            padding: 1px;
            border-radius: 3px;
            margin: 60px 0 0 0;
        }

        .bar {
            background-color: green;
            display: block;
            width: 0%;
            height: 20px;
            border-radius: 3px;
        }

        .percent {
            position: absolute;
            height: 20px;
            display: inline-block;
            top: 3px;
            left: 2%;
            color: #fff
        }

        .demo p {
            margin: 3px 0;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="demo">
        <hr>
        <a class="btn" id="btn1">选择图片</a>最大2048KB，支持jpg，gif，png格式。
        <a class="btn" onclick="del_img()">清空图片</a>
        <div>
            <?php if ($success == 1) { ?>
                <h6>***已经上传成功，您可以重新上传，这将会覆盖之前上传的图片，或者关闭窗口</h6>
            <?php } ?>
        </div>
        <ul id="ul_pics" class="ul_pics clearfix"></ul>
    </div>

</div>
<div class="demo">
    <form action="/check/upload_img" class="upload_img" method="post"
          onsubmit="return uploadSubmit()">
        <input type="hidden" name="typeID" value="<?php echo $typeID ?>"><br>
        <input type="hidden" name="topicID" value="<?php echo $topicID ?>"><br>
        <input type="hidden" name="questionID" value="<?php echo $questionID ?>">
        <div id="img_zone">


        </div>
        <a id="add_img">
            <img style="width: 50px;height: 50px" src="/public/img_upload/add.jpg"  />
        </a>
        <?php if ($success == 1) { ?>
            <script>
                parent.window.location.reload();
                var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                parent.layer.close(index);
            </script>
        <?php }else{ ?>
        <div>
        <input type="submit" class="btn_submit" value="确认提交">
            <div>
        <?php } ?>
    </form>
</div>
</body>


<script type="text/javascript" src="/public/img_upload/jquery.js"></script>
<script type="text/javascript" src="/public/img_upload/plupload.full.min.js"></script>
<!--    layer-->
<script type="text/javascript" src="/public/layer/layer.js"></script>
<!--    ajax上传-->
<script type="text/javascript" src="/public/js/validform/validform.js"></script>

<script type="text/javascript">
    var uploader = new plupload.Uploader({ //创建实例的构造方法
        runtimes: 'html5,flash,silverlight,html4',
        //上传插件初始化选用那种方式的优先级顺序
        browse_button: ['btn1','add_img'],
        // 上传按钮
        url: "/public/img_upload/ajax.php",
        //远程上传地址
        flash_swf_url: 'plupload/Moxie.swf',
        //flash文件地址
        silverlight_xap_url: 'plupload/Moxie.xap',
        //silverlight文件地址
        filters: {
            max_file_size: '5000kb',
            //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
            mime_types: [ //允许文件上传类型
                {
                    title: "files",
                    extensions: "jpg,png,gif"
                }]
        },
        multi_selection: true,
        //true:ctrl多文件上传, false 单文件上传
        init: {
            FilesAdded: function (up, files) { //文件上传前
                if ($("#ul_pics").children("li").length > 30) {
                    alert("您上传的图片太多了！");
                    uploader.destroy();
                } else {
                    var li = '';
                    plupload.each(files,
                        function (file) { //遍历文件
                            li += "<li id='" + file['id'] + "'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></li>";
                        });
                    $("#ul_pics").append(li);
                    uploader.start();
                }
            },
            UploadProgress: function (up, file) { //上传中，显示进度条
                $("#" + file.id).find('.bar').css({
                    "width": file.percent + "%"
                }).find(".percent").text(file.percent + "%");
            },
            FileUploaded: function (up, file, info) { //文件上传成功的时候触发
                var data = JSON.parse(info.response);
                $("#" + file.id).html("<div class='imgs'><div class='img'>" +
                    "<img  src='/public/portal/Check_image/" + data.name + "'/></div><p>"
//                        + "<button class='del_img' onclick=del_img("+"'"+ data.name+"')"+
//                    ">删除</button>"
                    + "</p></div>");

                $("#img_zone").append("<input type='hidden'  name='pics[]' value='"
                    + data.name + "'></input>");
                //上传FORM创建
            },
            Error: function (up, err) { //上传出错的时候触发
                alert(err.message);
            }
        }
    });

    function del_img() {
        $('.ul_pics li').remove();
        $("#img_zone").empty();
    }
    uploader.init();


</script>
<script>
    function uploadSubmit(){
        var content = $("#img_zone");

        if(content.has("input").length == 0){
            return confirm('没有选择图稿，是否确认上传？');
        }else{
            return confirm('确认上传？');
        }
    }
</script>
</html>