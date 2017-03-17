<?php
$targetFolder = '/media/temp';
$verifyToken = md5('unique_salt' . $_POST['timestamp']);
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$img = uniqid().'.';
	$targetFile = rtrim($targetPath,'/') . '/'.$img;
	$fileTypes = array('jpg','jpeg','gif','png');
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	//判断是不是真实的图片
	if( exif_imagetype($tempFile) == false )
	{
		return false; die;
	}
	if (in_array($fileParts['extension'],$fileTypes))
	{
		$res = move_uploaded_file($tempFile,$targetFile.$fileParts['extension']);
		if( $res )
		{
			echo $img.$fileParts['extension'];
		}else
		{
			echo false;
		}

	} else {
		echo false;
	}
}
?>