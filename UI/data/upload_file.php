<?php
	
// 允许上传的图片后缀
//$allowedExts = array("gif", "jpeg", "jpg", "png");
//$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
//$extension = end($temp);     // 获取文件后缀名
//if ((($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/pjpeg")||($_FILES["file"]["type"] == "image/x-png")||($_FILES["file"]["type"] == "image/png"))&&($_FILES["file"]["size"] < 20480000)&&in_array($extension, $allowedExts))
//{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
		$ywjsc = "0";
	}
	else
	{
		echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		$ywjsc = "1";
		// 判断当期目录下的 upload 目录是否存在该文件
		// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
		
			$ext=strtolower(end(explode('.',$_FILES["file"]["name"])));  
			$upload_file=md5(uniqid(microtime(true),true)).'.'.$ext;
			$destination="../upload/czscupload/".$upload_file;
			move_uploaded_file($_FILES["file"]["tmp_name"] ,$destination);
		
		
	}

//else
//{
//	echo "非法的文件格式";
//}
//if($upresult){
//	require("fhys_upload.php");	
//}
?>