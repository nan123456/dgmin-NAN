<?php
//引入连接数据库文件

require ("../conn.php");
require ("upload_file.php");
$time = getdate();
$timestr = $time['year'] . "-" . $time['mon'] . "-" . $time['mday'] . "/" . $time['hours'] . ":" . $time['minutes'] . ":" . $time['seconds'];
$sjc = $timestr;
$sjcc = strtotime(".$sjc.");
$sjccc = strtotime(".$sjcc.");
$fj = $_POST["fj"];
if ($ywjsc = "1") {$kgbgfjsc1 = $_FILES["file"]["name"];
} else {$kgbgfjsc1 = $_FILES["file"]["name"];
}
$upload_filedName = $_FILES["file"]["name"];
$upload_filedDir = $upload_file;
$sql = "INSERT INTO 操作手册附件 (文件下载地址,附件类型,附件上传时间,附件名称) values ('$upload_filedDir','$fj','$sjccc','$upload_filedName')";

if ($conn -> query($sql) === TRUE) {
	echo "保存成功";
} else {
	echo "Error: " . $sql . "<br>" . $conn -> error;
}
$conn -> close();
?>
<script type="text/javascript">window.location.href = "../czsc.php";</script>