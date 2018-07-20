<?php
require("../conn.php");

$hdmc=$_POST["hdmc"];
$hdzt=$_POST["hdzt"];
$hddd=$_POST["hddd"];
$hdsj=$_POST["hdsj"];
$hdks=$_POST["hdks"];
$hdjs=$_POST["hdjs"];
$hdlx=$_POST["hdlx"];
$hdxz=$_POST["hdxz"];
$bz=$_POST["bz"];
$bmzrs=$_POST["bmzrs"];

$sql="INSERT INTO 学习交流(活动名称,活动主题,活动地点,活动时间,报名开始时间,报名结束时间,活动路线,活动性质,备注,报名总人数) values('$hdmc','$hdzt','$hddd','$hdsj','$hdks','$hdjs','$hdlx','$hdxz','$bz','$bmzrs')";
if($conn->query($sql) === TRUE){
	echo "保存成功";
    
	header("refresh:0;url=../xxjl.php");
}else{
	echo "Error: " . $sql . "<br>" . $conn->error;

	header("refresh:0;url=../xxjl.php");
}
$conn->close();	
?>