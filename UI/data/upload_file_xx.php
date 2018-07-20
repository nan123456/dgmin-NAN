<?php
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];	
		$sjc=$timestr;
		$sjcc =strtotime(".$sjc.");
		$sjccc=strtotime(".$sjcc.");

	if ($_FILES["fileInput"]["error"] > 0)
	{
		echo "错误：: " . $_FILES["fileInput"]["error"] . "<br>";
		$ywjsc = "0";
		$fjcz="无";
	}
	else
	{
		$fjcz="有";
		$ywjsc = "1";
		echo "上传文件名: " . $_FILES["fileInput"]["name"] . "<br>";
		echo "文件类型: " . $_FILES["fileInput"]["type"] . "<br>";
		echo "文件大小: " . ($_FILES["fileInput"]["size"] / 1024) . " kB<br>";
		echo "文件临时存储的位置: " . $_FILES["fileInput"]["tmp_name"] . "<br>";
		$ywjsc = "1";
			  $ext=pathinfo($_FILES["fileInput"]["name"],PATHINFO_EXTENSION);     
			$upload_file=md5(uniqid(microtime(true),true)).'.'.$ext;
			$destination="../upload/xxupload/".$upload_file;
			move_uploaded_file($_FILES["fileInput"]["tmp_name"] ,$destination);
		
		
	}
			

?>