<?php
require("../conn.php");
$hfid1=$_POST["hfid1"];
$df1=$_POST["df1"];



$sql1 = "update 本地会员 set 其他得分='$df1' where 会员标记码='$hfid1'";	
	if($conn->query($sql1) === TRUE){
	echo "保存成功";
    
	header("refresh:0;url=../qt.php");
}else{
	echo "Error: " . $sql . "<br>" . $conn->error;

	header("refresh:0;url=../qt.php");
}

?>