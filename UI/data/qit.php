<?php
require("../conn.php");
$hfid=$_POST["hfid"];
$df=$_POST["df"];
$gm=$_POST["gm"];
$a="";$b="";
if($gm=="是"){$a="5";}
else{$a="0";}
$b=$df+$a;
$today=date ( "Y", time () );
$sql1 = "update 会员评价 set 其他得分='$b' where 会员标记码='$hfid' and 年份='$today'";	
	if($conn->query($sql1) === TRUE){
	echo "保存成功";
    
	header("refresh:0;url=../qt.php");
}else{
	echo "Error: " . $sql . "<br>" . $conn->error;

	header("refresh:0;url=../qt.php");
}

?>