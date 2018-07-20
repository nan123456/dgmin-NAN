<?php
	require("../conn.php");
	    $shid=$_POST["shid"];
	    $shsj=$_POST["shsj"];
	    $ytj="已受理";
	    
	    $shsj=date("Y-m-d");
	$sql2 = "select * from 市示范工地  where id='$shid'";
	$result = $conn->query($sql2);
	$sqli2 = "update 市示范工地  set 工程状态='$ytj',审核通过时间='$shsj'  where id ='$shid'";
if ($conn->query($sqli2) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$conn->close();		

?>
