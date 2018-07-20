<?php
require("../conn.php");
$hfid1=$_POST["hfid1"];
$bzxx1=$_POST["bzxx1"];
$bzdf1=$_POST["bzdf1"];


$sql = "update 本地会员 set 评分备注='$bzxx1',备注得分='$bzdf1' where 会员标记码='$hfid1'";
if ($conn->query($sql) === TRUE) {
    echo "保存成功";
	header("refresh:0;url=../bz.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();	
?>