<?php
	require("../conn.php");
	    $shid=$_POST["shid"];
	    $shsj=$_POST["shsj"];
	    
	    $shsj=date("Y-m-d");
	 
	    $ytj="已受理";
	    
	$sql2 = "select * from 省优质结构奖  where id='$shid'";
	$result = $conn->query($sql2);
	$sqli2 = "update 省优质结构奖 set 工程状态='$ytj',审核通过时间='$shsj' where id ='$shid'";
if ($conn->query($sqli2) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$conn->close();		

?>
