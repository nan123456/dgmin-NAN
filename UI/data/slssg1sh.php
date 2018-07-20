<?php
	require("../conn.php");
	    $shid=$_POST["shid"];
	    $shtg1=$_POST["shtg1"];
	    $shsj=$_POST["shsj"];
	    
	    $shsj=date("Y-m-d");
	$sql2 = "select * from 省绿色施工  where id='$shid'";
	$result = $conn->query($sql2);
	$sqli2 = "update 省绿色施工 set 工程状态='已受理',审核通过时间='$shsj' where id ='$shid'";
if ($conn->query($sqli2) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$conn->close();		

?>
