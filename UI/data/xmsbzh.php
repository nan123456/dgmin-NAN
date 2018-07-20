<?php
	//引入连接数据库文件
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
//		$sjcc =strtotime(".$sjc.");
//		$file=$_POST["file"];
	require("../conn.php");

	    $zh=$_POST["zh"];
	    $mm=$_POST["mm"];
        $hybjm=$_POST["hybjm"];
$sql1 = "INSERT INTO 个人信息(会员标记码,账号,密码) values ('$hybjm','$zh','$mm')";

if ($conn->query($sql1) === TRUE) {
    echo "保存成功";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

	
$conn->close();		
?>

