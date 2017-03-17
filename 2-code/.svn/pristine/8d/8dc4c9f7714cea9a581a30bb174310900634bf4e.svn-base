<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="http://www.julijia.com/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;

}
</style>
</head>

<body>
	
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true" value="选择文件" style="width:60px">


	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
			     // 'queueID':'queue',
				'width': 90, //定义宽度
				'height':25,  //定义高度
				'fileSizeLimit' : '1KB',  //文件大小
				'fileTypeExts': '*.jpg;*.gif;*.jpeg;*.png',//允许的格式
			       'buttonClass' : 'uploadify-button',  //按钮样式
			      /* 'buttonImage' : '/uploadify/browse-btn.png',*/
			       'buttonText' : '选择图片',  //按钮文字
			 	'swf'      : 'uploadify.swf',
				'uploader' : 'uploadify.php',
				 'checkExisting' : 'check-exists.php',
				  //上传错误提示
                           'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                                      alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                           },
                           //文件选择错误
                           'onSelectError' : function() {
                                 alert('文件' + file.name + ' 太大了.');
                           },
                           //上传成功
                           'onAllComplete': function (event, data) { //当上传队列中的所有文件都完成上传时触发
                              alert(data.filesUploaded + ' 个文件上传成功!');
                            } 
			});
		});
	</script>
</body>
</html>