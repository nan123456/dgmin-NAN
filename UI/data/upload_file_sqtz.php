<?php
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];	
		$sjc=$timestr;
		$sjcc =strtotime(".$sjc.");
		$sjccc=strtotime(".$sjcc.");
// 允许上传的图片后缀
//$allowedExts = array("gif", "jpeg", "jpg", "png");
//$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
//$extension = end($temp);     // 获取文件后缀名
//if ((($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/pjpeg")||($_FILES["file"]["type"] == "image/x-png")||($_FILES["file"]["type"] == "image/png"))&&($_FILES["file"]["size"] < 20480000)&&in_array($extension, $allowedExts))
//{
	if ($_FILES["fileInput3"]["error"] > 0)
	{
		echo "错误：: " . $_FILES["fileInput"]["error"] . "<br>";
		$ywjsc=false;
		$fjcz="无";
	}
	else
	{
		echo "上传文件名: " . $_FILES["fileInput"]["name"] . "<br>";
		echo "文件类型: " . $_FILES["fileInput"]["type"] . "<br>";
		echo "文件大小: " . ($_FILES["fileInput"]["size"] / 1024) . " kB<br>";
		echo "文件临时存储的位置: " . $_FILES["fileInput"]["tmp_name"] . "<br>";
		$ywjsc = "1";
		$fjcz="有";
		// 判断当期目录下的 upload 目录是否存在该文件
		// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
		if (file_exists("../upload/qcupload/" . $_FILES["fileInput"]["name"]))
		{
			echo $_FILES["fileInput"]["name"] . " 文件已经存在。 ";
		}
		else
		{
		$upload_file= iconv("UTF-8", "GB2312//TRANSLIT", $_FILES["fileInput"]["name"]);
			// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
			move_uploaded_file($_FILES["fileInput"]["tmp_name"],"../upload/qcupload/". (strtotime(".$sjcc."))."(_)".$upload_file);
			echo "文件存储在: " . "../upload/qcupload/" . $_FILES["fileInput"]["name"];
		}
	}
	
	

//else
//{
//	echo "非法的文件格式";
//}
//if($upresult){
//	require("fhys_upload.php");	
//}
?>