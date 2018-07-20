<?php
require("../conn.php");
require("upload_file_xx.php");
$acMess=$_POST['acMess'];
$seMess=$_POST['seMess'];
$theme=$_POST['theme'];
$textM=$_POST['textM'];
$meState=$_POST['meState'];

//附件
$fileInput=$_POST["fileInput"];
if ($ywjsc == "1") 
	{$kgbgfjsc1=$_FILES["fileInput"]["name"];
	
    $upload_filedDir = $upload_file;
	}
	else {$upload_filedDir="";}


$sql="INSERT INTO 消息(发信会员标记码,收信会员标记码,消息主题,内容,信件状态,附件路径,附件存在,发送时间) values ('$seMess','$acMess','$theme','$textM','$meState','$upload_filedDir','$fjcz','$timestr')";
if($conn->query($sql) === TRUE){
	echo "保存成功";
//	$jsonresult = "success";
	header("refresh:0;url=../xx.php");
}else{
	echo "Error: " . $sql . "<br>" . $conn->error;
//	$jsonresult = "error";
	header("refresh:0;url=../xx.php");
}
$conn->close();		

?>
