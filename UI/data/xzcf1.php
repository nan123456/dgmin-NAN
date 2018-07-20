<?php
require("../conn.php");
$hfid1=$_POST["hfid1"];
$xzcf1=$_POST["xzcf1"];

$sql = "update 本地会员 set 行政处罚结果得分='$xzcf1' where 会员标记码='$hfid1'";
if ($conn->query($sql) === TRUE) {
    echo "保存成功";
	header("refresh:0;url=../zgbm.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();	
?>