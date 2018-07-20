<?php
require("../conn.php");
$hfid=$_POST["hfid"];
$xzcf=$_POST["xzcf"];
$today=date ( "Y", time () );
$sql = "update 会员评价 set 主管部门的行政处罚='$xzcf' where 会员标记码='$hfid' and 年份='$today'";
if ($conn->query($sql) === TRUE) {
    echo "保存成功";
	header("refresh:0;url=../zgbm.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();	
?>