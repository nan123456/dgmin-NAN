<?php
require("../conn.php");
$hfid=$_POST["hfid"];
$bzxx=$_POST["bzxx"];
$today=date ( "Y", time () );

$sql = "update 会员评价 set 备注='$bzxx' where 会员标记码='$hfid' and 年份='$today'";
if ($conn->query($sql) === TRUE) {
    echo "保存成功";
	header("refresh:0;url=../bz.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();	
?>